<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
/**
 * Created by PhpStorm.
 * User: tan
 * Date: 10/25/2015
 * Time: 10:44 AM
 */
class Users extends MY_Controller
{
    protected $user_group;
    protected $id_user;
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_users_group');
        $this->user_group = new m_users_group();
    }

    // danh sach user
    public function listUser()
    {
        $this->author->check_login('users_id');
        // lay danh sach hien thi users group
        $where_users_group = array(
          'users_group_id' => $_SESSION['users_group_id']
        );
        $get_users_group = $this->user_group_info->getAllArray('*',$where_users_group);
        // lay tat ca nguoi dung
        $this->user_info->tbl_name_join = "users_group";
        $where_in_user = explode(',',$get_users_group[0]['users_group_display']);
        $condition_join = 'users.users_group_id = users_group.users_group_id';
        $get_all_user = $this->user_info->getAllJoinArrayIn('users_id,users_name,users_fullname,users_group_name,users_active',$where_in_user,$condition_join,'left','users_id','DESC','users.users_group_id');
        $pre_generate_table = $this->createDataTable($get_all_user);    // chuyen du lieu da xu ly thanh dang mang roi truyen sang view

        // xu ly select action
        $btn_action = $this->input->post('btn_action');
        $list_action = $this->input->post('list_action');
        if(isset($btn_action))
        {
            if($list_action == 'delete')            // neu xoa
            {
                $id = $this->input->post('id');
                $status = $this->user_info->deleteRecord('users_id',$id);
                $this->session->set_flashdata('status_action',$status);
                if($status['type'] == 'success')
                    redirect(base_url_admin().'users/listUser');
            }else if($list_action == 'publish')     // kich hoat
            {
                $id = $this->input->post('id');
                $data = array(
                   'users_active' => 1
                );
                $status = $this->user_info->updateRecordIn($id,$data,'users_id');
                $this->session->set_flashdata('status_action',$status);
                if($status['type'] == 'success')
                    redirect(base_url_admin().'users/listUser');
            }else if($list_action == 'unpublish')   // khoa
            {
                $id = $this->input->post('id');
                $data = array(
                    'users_active' => 0
                );
                $status = $this->user_info->updateRecordIn($id,$data,'users_id');
                $this->session->set_flashdata('status_action',$status);
                if($status['type'] == 'success')
                    redirect(base_url_admin().'users/listUser');

            }
        }
        // thong tin chung truyen sang view
        $this->generateTable($pre_generate_table);
        $data['title_page'] = "Quản lý thành viên";
        $data['title_table'] = "Danh sách thành viên";
        $data['link_form_process'] = base_url_admin().'users/listUser';
        $this->layoutCommon('admin/layouts/tables',$data);
    }

    public function addUser()
    {
        $this->author->check_login('users_id');                             // kiem tra dang nhap
        $submit_form = $this->input->post('submit_form');
        if(isset( $submit_form))
            $this->checkForm();                                             // kiem tra form nhap du lieu
        $data['users_group_info'] = $this->user_group->getAll();
        $data['title_page'] = "Thêm thành viên";
        $data['title_form'] = "Thông tin thành viên";
        if($this->form_validation->run($this) == false)
        {
            $this->layoutCommon('admin/users/adds',$data);
        }else
        {
            $data_pre_form = $this->dataPreActionForm();                    // goi cac bien va truyen du lieu truoc khi them
            $this->user_info->field_check = array(
              'users_name' => $this->input->post('users_name')
            );
            $query = $this->user_info->insertRecord($data_pre_form);            // goi ham chen ban ghi , neu thanh cong --> bao
            $this->session->set_flashdata('mess_manufact',$query);
            if($query['type'] == 'success')
            {
                redirect(base_url_admin().'users/listUser');
            }else
            {
                $this->session->set_flashdata('mess_manufact',$query);
                $this->layoutCommon('admin/users/adds',$data);
            }
        }

    }
    public function userInfo()
    {
        $id = $_SESSION['users_id'];
        $where_info = array(
            'users_id' => $id
        );
        $get_info_user = $this->user_info->getAll('*',$where_info);

        /*------------update info------------*/
        $btn_update = $this->input->post('submit_form');
        if(isset($btn_update))
        {
            $this->form_validation->set_rules('users_pass','Mật khẩu','required|min_length[4]|max_length[30]');
            $this->form_validation->set_rules('users_repeatpass','Xác nhận mật khẩu','required|matches[users_pass]|min_length[4]|max_length[30]');
            $this->form_validation->set_rules('users_fullname','Tên đầy đủ','required|min_length[3]|max_length[30]');
            $this->form_validation->set_rules('users_email','Thư điện tử','required|valid_email');
            $this->form_validation->set_rules('users_address','Địa chỉ','required|min_length[4]|max_length[30]');
            $this->form_validation->set_message('required','%s không được để trống');
            $this->form_validation->set_message('valid_email','%s không đúng định dạng (abc@gmail.com)');
            $this->form_validation->set_message('min_length','%s phải có ít nhất %s ký tự');
            $this->form_validation->set_message('max_length','%s chỉ được tối đa %s ký tự');
            $this->form_validation->set_message('matches','%s và %s phải khớp nhau');
        }
        $data['info_user'] = $get_info_user;
        $data['title_page'] = "Chỉnh sửa tài khoản";
        $data['title_form'] = "Thông tin chi tiết";

        if($this->form_validation->run($this) == false)
        {
            $this->layoutCommon('admin/users/info',$data);
        }else
        {
            $arr_column_del = array('users_group_id','users_active','users_name');
            $preUpdateInfo = $this->removeElementArray($arr_column_del,$this->dataPreActionForm());
            $query = $this->user_info->updateNormal($id,$preUpdateInfo,'users_id');
            $this->session->set_flashdata('update_user_info',$query);
            redirect(base_url_admin().'users/userInfo');
        }
    }

    // sua 
    public function editUser($id)
    {
        $this->author->check_login('users_id');
        $submit_form = $this->input->post('submit_form');
        if(isset( $submit_form))
            $this->checkForm();
        $where = array(
          'users_id' => $id
        );
        $data['users_info'] = $this->user_info->getAll('*',$where);
        $data['users_group_info'] = $this->user_group->getAll();
        $data['title_page'] = "Sửa thành viên";
        $data['title_form'] = "Thông tin thành viên";
        if($this->form_validation->run($this) == false)
        {
            $this->layoutCommon('admin/users/edits',$data);
        }else
        {
            $data_pre_form = $this->dataPreActionForm();
            $this->user_info->field_check = array(
              'users_name' => $this->input->post('users_name'),
               'users_id !=' => $this->input->post('users_id')
            );
            $query = $this->user_info->updateRecord($id,$data_pre_form,'users_id');     // cap nhat du lieu
            $this->session->set_flashdata('mess_manufact',$query);
            if($query['type'] == 'success')
            {
                redirect(base_url_admin().'users/listUser');
            }else
            {
                $this->session->set_flashdata('mess_manufact',$query);
                $this->layoutCommon('admin/users/edits',$data);
            }

        }
    }
    // xoa 1 ban ghi
    public function deleteOne($id)
    {
        $query = $this->user_info->deleteRecord('users_id',$id);
        $this->session->set_flashdata('mess_manufact',$query);
        redirect(base_url_admin().'users/listUser');
    }

    // ham thay doi trang thai cua mot ban ghi
    public function changeStatus()
    {
        $id = $this->input->post('id');
        $status = $this->input->post('status');
        if($status == 0)
        {
            $status = 1;
        }else
        {
            $status = 0;
        }
        $data_update = array(
          'users_active' => $status
        );
        $this->user_info->updateNormal($id,$data_update,'users_id');
    }
    // xem chi tiet
    public function viewDetail()
    {
        $id = $this->input->post('id');
        if(isset($id))
        {
            $where = array(
              'users_id' => $id
            );
            $this->user_info->tbl_name_join = "users_group";
            $condition_join = 'users.users_group_id = users_group.users_group_id';
            $get_all_user = $this->user_info->getAllJoinArray('*',$where,$condition_join,'left');
        }
        $data['info_all'] = $get_all_user;
        $this->load->view('admin/users/views',$data);
    }
    // check form
    public function checkForm()
    {
        $this->form_validation->set_rules('users_name','Tên đăng nhập','required|callback_checkName|min_length[4]|max_length[30]');
        $this->form_validation->set_rules('users_pass','Mật khẩu','required|min_length[4]|max_length[30]');
        $this->form_validation->set_rules('users_repeatpass','Xác nhận mật khẩu','required|matches[users_pass]|min_length[4]|max_length[30]');
        $this->form_validation->set_rules('users_fullname','Tên đầy đủ','required|min_length[3]|max_length[30]');
        $this->form_validation->set_rules('users_email','Thư điện tử','required|valid_email');
        $this->form_validation->set_rules('users_address','Địa chỉ','required|min_length[4]|max_length[30]');
        $this->form_validation->set_rules('users_group_id','Quyền hạn','required|callback_checkSelectDefault');
        $this->form_validation->set_rules('users_active','Trạng thái','required|callback_checkSelectDefault');
        $this->form_validation->set_message('required','%s không được để trống');
        $this->form_validation->set_message('valid_email','%s không đúng định dạng (abc@gmail.com)');
        $this->form_validation->set_message('min_length','%s phải có ít nhất %s ký tự');
        $this->form_validation->set_message('max_length','%s chỉ được tối đa %s ký tự');
        $this->form_validation->set_message('matches','%s và %s phải khớp nhau');
    }

    // chuan bi du lieu khi thao tac them , sua 
    public function dataPreActionForm()
    {
        $data_pre_action_form = array(
            'users_name' => $this->input->post('users_name'),
            'users_pass' => md5( $this->input->post('users_pass')),
            'users_fullname' => $this->input->post('users_fullname'),
            'users_email' => $this->input->post('users_email'),
            'users_address' => $this->input->post('users_address'),
            'users_group_id' => $this->input->post('users_group_id'),
            'users_active' => $this->input->post('users_active'),
            'users_hint' => $this->input->post('users_pass')
        );
        return $data_pre_action_form;
    }
    // gan cac du lieu xu ly tu du lieu lay duoc vao mot mang de gui sang view
    public function createDataTable($query)
    {
        $list_data_table = array();
        for($i = 0 ; $i < count($query);$i++)
        {
            $list_data_table[$i]['users_id'] =  $query[$i]['users_id'];
            if($query[$i]['users_active'] == 1)
                $list_data_table[$i]['users_active'] = "<button type='button' url='".base_url_admin()."users/changeStatus' class='btn btn-success btn-xs btn_change_status' id='".$query[$i]['users_id']."' status='".$query[$i]['users_active']."' >Kích hoạt</button>";
            else
                $list_data_table[$i]['users_active'] = "<button type='button' url='".base_url_admin()."users/changeStatus' class='btn btn-warning btn_change_status btn-xs'  id='".$query[$i]['users_id']."' status='".$query[$i]['users_active']."' >Bị khóa</button>";
            $list_data_table[$i]['users_name'] = $query[$i]['users_name'];
            $list_data_table[$i]['users_fullname'] = $query[$i]['users_fullname'];
            $list_data_table[$i]['users_group_name'] = $query[$i]['users_group_name'];
        }
        return $list_data_table;
    }

    // ham gen nut action , ham nay gen ca bang du lieu gom , set heading (gen dong dau cua bang) , add_row them cac dong du lieu cho bang
    public function generateTable($data)
    {
        $this->table->set_heading(array('<input type="checkbox" name="" />','Tên thành viên','Tên đầy đủ','Quyền hạn','Trạng thái','Hành động'));
        foreach($data as $s_data)
        {
            if($_SESSION['list_permiss'][0]['users_group_view'] == 1)
                $view_detail_button = '<button  class="btn btn-info btn-xs viewDetail" link-ajax="'.base_url_admin().'users/viewDetail" id-send="'.$s_data['users_id'].'" type="button" data-target="#viewDetail" data-toggle="modal" > Chi tiết</button> ';
            else
                $view_detail_button = '';
            if($_SESSION['list_permiss'][0]['users_group_edit'] == 1)
                $edit_button = '<a href="'.base_url_admin().'users/editUser/'.$s_data['users_id'].'"><button class="btn btn-warning btn-xs" type="button">Sửa</button></a> ';
            else
                $edit_button = "";
            if($_SESSION['list_permiss'][0]['users_group_delete_mem'])
                $delete_button ='<button link-id="'.base_url_admin().'users/deleteOne/'.$s_data['users_id'].'" name-del="'.$s_data['users_name'].'" class="btn_delOne btn btn-danger btn-xs " data-target="#confirmDelete" data-toggle="modal"  type="button">Xóa</button> ';
            else
                $delete_button="";
            $list_button = $view_detail_button.
                            $edit_button.
                            $delete_button;
            $this->table->add_row(array('<input type="checkbox" name="id[]" value="'.$s_data['users_id'].'"/>',  $s_data['users_name'],$s_data['users_fullname'],$s_data['users_group_name'],$s_data['users_active'],$list_button));
        }
    }


}