<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class UsersGroup extends MY_Controller
{
//    public $users_group_info ;
    function __construct()
    {
        parent::__construct();
    }
    // danh sach quyen han
    public function listUserGroup()
    {
        $this->author->check_login('users_id');
        // lay tat ca nguoi dung
        $get_all_user_group = $this->user_group_info->getAllOrderArray('*','1=1','users_group_id');
        $pre_generate_table = $this->createDataTable($get_all_user_group);    // chuyen du lieu da xu ly thanh dang mang roi truyen sang view

        // xu ly select action
        $btn_action = $this->input->post('btn_action');
        $list_action = $this->input->post('list_action');
        if(isset($btn_action))
        {
            if($list_action == 'delete')
            {
                $id = $this->input->post('id');
                $status = $this->user_group_info->deleteRecord('users_group_id',$id);
                $this->session->set_flashdata('status_action',$status);
                if($status['type'] == 'success')
                    redirect(base_url_admin().'usersgroup/listUserGroup');
            }else if($list_action == 'publish')
            {
                $id = $this->input->post('id');
                $data = array(
                    'users_group_active' => 1
                );
                $status = $this->user_group_info->updateRecordIn($id,$data,'users_group_id');
                $this->session->set_flashdata('status_action',$status);
                if($status['type'] == 'success')
                    redirect(base_url_admin().'usersgroup/listUserGroup');
            }else if($list_action == 'unpublish')
            {
                $id = $this->input->post('id');
                $data = array(
                    'users_group_active' => 0
                );
                $status = $this->user_group_info->updateRecordIn($id,$data,'users_group_id');
                $this->session->set_flashdata('status_action',$status);
                if($status['type'] == 'success')
                    redirect(base_url_admin().'usersgroup/listUserGroup');

            }
        }
        // thong tin chung truyen sang view
        $this->generateTable($pre_generate_table);
        $data['title_page'] = "Quản lý quyền hạn";
        $data['title_table'] = "Danh sách quyền hạn";
        $data['link_form_process'] = base_url_admin().'usersgroup/listUserGroup';
        $this->layoutCommon('admin/layouts/tables',$data);
    }
    public function editUserGroup($id)
    {
        $this->author->check_login('users_id');
        $submit_form = $this->input->post('submit_form');
        if(isset( $submit_form))
            $this->checkForm();
        $where = array(
          'users_group_id' => $id
        );
        $data['users_group_info'] = $this->user_group_info->getAll('*',$where);
        $data['title_page'] = "Sửa quyền hạn";
        $data['title_form'] = "Thông tin quyền hạn";
        if($this->form_validation->run($this) == false)
        {
            $this->layoutCommon('admin/users_group/edits',$data);
        }else
        {
            $data_pre_form = $this->dataPreActionForm();
            $this->user_group_info->field_check = array(
                'users_group_name' => $this->input->post('users_group_name'),
                'users_group_id !=' => $this->input->post('users_group_id')
            );
            $query = $this->user_group_info->updateRecord($id,$data_pre_form,'users_group_id');
            $this->session->set_flashdata('mess_manufact',$query);
            if($query['type'] == 'success')
            {
                redirect(base_url_admin().'usersgroup/listUserGroup');
            }else
            {
                $this->session->set_flashdata('mess_manufact',$query);
                $this->layoutCommon('admin/users_group/edits',$data);
            }

        }
    }

    public function addUserGroup()
    {
        $this->author->check_login('users_id');
        $submit_form = $this->input->post('submit_form');
        if(isset( $submit_form))
            $this->checkForm();
        $data['title_page'] = "Thêm quyền";
        $data['title_form'] = "Thông tin quyền hạn";
        if($this->form_validation->run($this) == false)
        {
            $this->layoutCommon('admin/users_group/adds',$data);
        }else
        {
            $data_pre_form = $this->dataPreActionForm();
            $this->user_group_info->field_check = array(
                'users_group_name' => $this->input->post('users_group_name')
            );
            $query = $this->user_group_info->insertRecord($data_pre_form);
            $this->session->set_flashdata('mess_manufact',$query);
            if($query['type'] == 'success')
            {
                redirect(base_url_admin().'usersgroup/listUserGroup');
            }else
            {
                $this->session->set_flashdata('mess_manufact',$query);
                $this->layoutCommon('admin/usersgroup/adds',$data);
            }
        }

    }
    // ham thay doi quyen han nhu xem , xoa , sua , them 
    public function changePermiss()
    {
        $id = $this->input->post('id');
        $typePermiss = $this->input->post('typePermiss');
        $valPermiss = $this->input->post('valPermiss');
        $valPermiss == 1 ? $valPermiss = 0 : $valPermiss = 1;
        $data_update = array(
          'users_group_'.$typePermiss => $valPermiss
        );
        $this->user_group_info->updateNormal($id,$data_update,'users_group_id');
        $this->load->view('admin/users_group/changePermiss');
    }
    // xoa 1 ban ghi
    public function deleteOne($id)
    {
        $query = $this->user_group_info->deleteRecord('users_group_id',$id);
        $this->session->set_flashdata('mess_manufact',$query);
        redirect(base_url_admin().'usersgroup/listUserGroup');
    }


    public function viewDetail()
    {
        $id = $this->input->post('id');
        if(isset($id))
        {
            $where = array(
                'users_group_id' => $id
            );
            $get_all_user_group = $this->user_group_info->getAllArray('*',$where);
        }
        $data['info_all'] = $get_all_user_group;
        $this->load->view('admin/users_group/views',$data);
    }

    // check form
    public function checkForm()
    {
        $this->form_validation->set_rules('users_group_name','Tên quyền','required|min_length[4]|max_length[30]');
        $this->form_validation->set_message('required','%s không được để trống');
        $this->form_validation->set_message('valid_email','%s không đúng định dạng (abc@gmail.com)');
        $this->form_validation->set_message('min_length','%s phải có ít nhất %s ký tự');
        $this->form_validation->set_message('max_length','%s chỉ được tối đa %s ký tự');
    }

    public function dataPreActionForm()
    {
        $data_pre_action_form = array(
            'users_group_name' => $this->input->post('users_group_name'),
            'users_group_view' => $this->input->post('users_group_view'),
            'users_group_add' => $this->input->post('users_group_add'),
            'users_group_edit' => $this->input->post('users_group_edit'),
            'users_group_delete' => $this->input->post('users_group_delete'),
            'users_group_delete_mem' => $this->input->post('users_group_delete_mem')
        );
        return $data_pre_action_form;
    }
    // gan cac du lieu xu ly tu du lieu lay duoc vao mot mang de gui sang view
    public function createDataTable($query)
    {
        $list_data_table = array();
        for($i = 0 ; $i < count($query);$i++)
        {
            $list_data_table[$i]['users_group_id'] =  $query[$i]['users_group_id'];
            $list_data_table[$i]['users_group_name'] = $query[$i]['users_group_name'];
            if($query[$i]['users_group_view'] == 1)
                $list_data_table[$i]['users_group_view'] = $this->generateButton($query[$i]['users_group_id'],$query[$i]['users_group_view'],base_url_admin().'usersgroup/changePermiss','view') ;
            else
                $list_data_table[$i]['users_group_view'] = $this->generateButton($query[$i]['users_group_id'],$query[$i]['users_group_view'],base_url_admin().'usersgroup/changePermiss','view') ;
            if($query[$i]['users_group_add'] == 1)
                $list_data_table[$i]['users_group_add'] = $this->generateButton($query[$i]['users_group_id'],$query[$i]['users_group_add'],base_url_admin().'usersgroup/changePermiss','add') ;
            else
                $list_data_table[$i]['users_group_add'] = $this->generateButton($query[$i]['users_group_id'],$query[$i]['users_group_add'],base_url_admin().'usersgroup/changePermiss','add') ;
            if($query[$i]['users_group_edit'] == 1)
                $list_data_table[$i]['users_group_edit'] = $this->generateButton($query[$i]['users_group_id'],$query[$i]['users_group_edit'],base_url_admin().'usersgroup/changePermiss','edit') ;
            else
                $list_data_table[$i]['users_group_edit'] = $this->generateButton($query[$i]['users_group_id'],$query[$i]['users_group_edit'],base_url_admin().'usersgroup/changePermiss','edit') ;
            if($query[$i]['users_group_delete'] == 1)
                $list_data_table[$i]['users_group_delete'] = $this->generateButton($query[$i]['users_group_id'],$query[$i]['users_group_delete'],base_url_admin().'usersgroup/changePermiss','delete') ;
            else
                $list_data_table[$i]['users_group_delete'] = $this->generateButton($query[$i]['users_group_id'],$query[$i]['users_group_delete'],base_url_admin().'usersgroup/changePermiss','delete') ;
            if($query[$i]['users_group_delete_mem'] == 1)
                $list_data_table[$i]['users_group_delete_mem'] = $this->generateButton($query[$i]['users_group_id'],$query[$i]['users_group_delete_mem'],base_url_admin().'usersgroup/changePermiss','delete_mem') ;
            else
                $list_data_table[$i]['users_group_delete_mem'] = $this->generateButton($query[$i]['users_group_id'],$query[$i]['users_group_delete_mem'],base_url_admin().'usersgroup/changePermiss','delete_mem') ;

        }
        return $list_data_table;
    }

    public function generateButton($id,$permiss,$url,$typePermiss)
    {
        if($permiss == 1)
        {
            $type_btn = "btn-success";
            $mess = "Kích hoạt";
        }else
        {
            $type_btn = "btn-warning";
            $mess = "Khóa";
        }
        $generate_btn = "<button type='button'  id='".$id."' valPermiss='".$permiss."' typePermiss='".$typePermiss."' url='".$url." ' class='btn ".$type_btn." btn-xs btn_change_permiss btn_change_status'>".$mess."</button>";
        return $generate_btn;
    }

    // ham gen nut action
    public function generateTable($data)
    {
        $this->table->set_heading(array('<input type="checkbox" name="" />','Tên quyền hạn','Xem','Thêm','Sửa','Xóa','Xóa thành viên','Hành động'));
        foreach($data as $s_data)
        {
            if($_SESSION['list_permiss'][0]['users_group_view'] == 1)
                $view_detail_button ='<button  class="btn btn-info btn-xs viewDetail" link-ajax="'.base_url_admin().'usersgroup/viewDetail" id-send="'.$s_data['users_group_id'].'" type="button" data-target="#viewDetail" data-toggle="modal" > Chi tiết</button> ';
            else
                $view_detail_button = "";
            if($_SESSION['list_permiss'][0]['users_group_edit'] == 1)
                $edit_button ='<a href="'.base_url_admin().'usersgroup/editUserGroup/'.$s_data['users_group_id'].'"><button class="btn btn-warning btn-xs" type="button">Sửa</button></a> ';
            else
                $edit_button = "";
            $delete_button = '<button link-id="'.base_url_admin().'usersgroup/deleteOne/'.$s_data['users_group_id'].'" name-del="'.$s_data['users_group_name'].'" class="btn_delOne btn btn-danger btn-xs " data-target="#confirmDelete" data-toggle="modal"  type="button">Xóa</button>';
            $list_button = $view_detail_button.
                            $edit_button.
                            $delete_button;
            $this->table->add_row(array('<input type="checkbox" name="id[]" value="'.$s_data['users_group_id'].'"/>',  $s_data['users_group_name'],$s_data['users_group_view'],$s_data['users_group_add'],$s_data['users_group_edit'],$s_data['users_group_delete'],$s_data['users_group_delete_mem'],$list_button));
        }
    }


}