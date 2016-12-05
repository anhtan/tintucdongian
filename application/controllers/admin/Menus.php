<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
class Menus extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_menus');
        $this->load->model('m_users_group');
        $this->menus = new m_menus();
        $this->user_group_info = new m_users_group();
    }

    public function listMenu()
    {
        $this->author->check_login('users_id');
        // lay tat ca menu
        $get_all_menu = $this->menus->getAllOrderArray('menu_display,menu_id,menu_name,menu_path,menu_parent,menu_active,menu_has_child,menu_icon','1=1','menu_id');
        $pre_generate_table = $this->createDataTable($get_all_menu);    // chuyen du lieu da xu ly thanh dang mang roi truyen sang view

        // xu ly select action
        $btn_action = $this->input->post('btn_action');
        $list_action = $this->input->post('list_action');
        if(isset($btn_action))
        {
            if($list_action == 'delete')
            {
                $id = $this->input->post('id');
                $status = $this->menus->deleteRecord('menu_id',$id);
                $this->session->set_flashdata('status_action',$status);
                if($status['type'] == 'success')
                    redirect(base_url_admin().'menus/listMenu');
            }else if($list_action == 'publish')
            {
                $id = $this->input->post('id');
                $data = array(
                    'menu_active' => 1
                );
                $status = $this->menu_info->updateRecordIn($id,$data,'menu_id');
                $this->session->set_flashdata('status_action',$status);
                if($status['type'] == 'success')
                    redirect(base_url_admin().'menus/listMenu');
            }else if($list_action == 'unpublish')
            {
                $id = $this->input->post('id');
                $data = array(
                    'menu_active' => 0
                );
                $status = $this->menu_info->updateRecordIn($id,$data,'menu_id');
                $this->session->set_flashdata('status_action',$status);
                if($status['type'] == 'success')
                    redirect(base_url_admin().'menus/listMenu');

            }
        }
        // thong tin chung truyen sang view
        $this->generateTable($pre_generate_table);
        $data['title_page'] = "Quản lý menu";
        $data['title_table'] = "Danh sách menu";
        $data['link_form_process'] = base_url_admin().'menus/listMenu';
        $this->layoutCommon('admin/layouts/tables',$data);

    }
    public function editMenu($id)
    {
        $this->author->check_login('users_id');
        $submit_form = $this->input->post('submit_form');
        if(isset( $submit_form))
            $this->checkForm();
        $where = array(
            'menu_id' => $id
        );
        $where_list_parent = array(
            'menu_parent' => 0
        );
        $list_parent_menu = $this->menu_info->getAll('*',$where_list_parent);
        $list_users_group = $this->user_group_info->getAll('*');
        $data['list_users_group'] = $list_users_group;
        $data['list_parent_menu'] = $list_parent_menu;
        $data['menu_info'] = $this->menu_info->getAll('*',$where);
        $data['title_page'] = "Sửa menu";
        $data['title_form'] = "Thông tin menu";
        if($this->form_validation->run($this) == false)
        {
            $this->layoutCommon('admin/menus/edits',$data);
        }else
        {
            $data_pre_form = $this->dataPreActionForm();
            $this->menu_info->field_check = array(
                'menu_name' => $this->input->post('menu_name'),
                'menu_id !=' => $this->input->post('menu_id')
            );
            $query = $this->menu_info->updateRecord($id,$data_pre_form,'menu_id');
            $this->session->set_flashdata('mess_manufact',$query);
            if($query['type'] == 'success')
            {
                redirect(base_url_admin().'menus/listMenu');
            }else
            {
                $this->session->set_flashdata('mess_manufact',$query);
                $this->layoutCommon('admin/menus/edits',$data);
            }

        }
    }

    public function addMenu()
    {
        $this->author->check_login('users_id');
        $submit_form = $this->input->post('submit_form');
        if(isset( $submit_form))
            $this->checkForm();
        $where_list_parent = array(
          'menu_parent' => 0
        );
        $list_parent_menu = $this->menu_info->getAll('*',$where_list_parent);
        $list_users_group = $this->user_group_info->getAll('*');
        $data['list_users_group'] = $list_users_group;
        $data['list_parent_menu'] = $list_parent_menu;
        $data['title_page'] = "Thêm menu";
        $data['title_form'] = "Thông tin menu";
        if($this->form_validation->run($this) == false)
        {
            $this->layoutCommon('admin/menus/adds',$data);
        }else
        {
            $data_pre_form = $this->dataPreActionForm();
            $this->menu_info->field_check = array(
                'menu_name' => $this->input->post('menu_name')
            );
            $query = $this->menu_info->insertRecord($data_pre_form);
            $this->session->set_flashdata('mess_manufact',$query);
            if($query['type'] == 'success')
            {
                redirect(base_url_admin().'menus/listMenu');
            }else
            {
                $this->session->set_flashdata('mess_manufact',$query);
                $this->layoutCommon('admin/menus/adds',$data);
            }
        }

    }

    // xoa 1 ban ghi
    public function deleteOne($id)
    {
        $query = $this->menu_info->deleteRecord('menu_id',$id);
        $this->session->set_flashdata('mess_manufact',$query);
        redirect(base_url_admin().'menus/listMenu');
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
            'menu_active' => $status
        );
        $this->menu_info->updateNormal($id,$data_update,'menu_id');
    }

    public function viewDetail()
    {
        $id = $this->input->post('id');
        if(isset($id))
        {
            $where = array(
                'menu_id' => $id
            );
            $get_all_menu = $this->menu_info->getAllArray('*',$where);
        }
        // thong tin chi tiet
        $after_all_menu = $this->createDataTable($get_all_menu);
        $data['info_all'] = $after_all_menu;
        $this->load->view('admin/menus/views',$data);
    }
    // check form
    public function checkForm()
    {
        $this->form_validation->set_rules('menu_name','Tên menu','required|min_length[4]|max_length[30]');
//        $this->form_validation->set_rules('menu_active','Trạng thái','required|callback_checkSelectDefault');
        $this->form_validation->set_message('required','%s không được để trống');
        $this->form_validation->set_message('min_length','%s phải có ít nhất %s ký tự');
        $this->form_validation->set_message('max_length','%s chỉ được tối đa %s ký tự');
    }

    public function dataPreActionForm()
    {
        $data_pre_action_form = array(
            'menu_name' => $this->input->post('menu_name'),
            'menu_path' =>  $this->input->post('menu_path'),
            'menu_parent' => $this->input->post('menu_parent'),
            'menu_has_child' => $this->input->post('menu_has_child'),
            'menu_icon' => $this->input->post('menu_icon'),
            'menu_display' => implode(',' ,$this->input->post('menu_display')),
            'menu_active' => $this->input->post('menu_active')
        );
        return $data_pre_action_form;
    }

    // gan cac du lieu xu ly tu du lieu lay duoc vao mot mang de gui sang view
    public function createDataTable($query)
    {
        $list_data_table = array();
        for($i = 0 ; $i < count($query);$i++)
        {
            $list_data_table[$i]['menu_id'] =  $query[$i]['menu_id'];
            $list_data_table[$i]['menu_icon'] = "<p class='fa ".$query[$i]['menu_icon']." icon_list'></p>" ;
            if($query[$i]['menu_active'] == 1)
                $list_data_table[$i]['menu_active'] = "<button type='button' url='".base_url_admin()."menus/changeStatus' class='btn btn-success btn-xs  btn_change_status' id='".$query[$i]['menu_id']."' status='".$query[$i]['menu_active']."'>Kích hoạt</button>";
            else
                $list_data_table[$i]['menu_active'] = "<button type='button' url='".base_url_admin()."menus/changeStatus' class='btn btn-warning btn-xs  btn_change_status' id='".$query[$i]['menu_id']."' status='".$query[$i]['menu_active']."'>Bị khóa</button>";
//            $list_data_table[$i]['menu_active'] = $query[$i]['menu_active'];
            $list_data_table[$i]['menu_name'] = $query[$i]['menu_name'];
            $list_data_table[$i]['menu_path'] = $query[$i]['menu_path'];
            // goi thong tin menu con
            if($query[$i]['menu_has_child'] == 1)
                $list_data_table[$i]['menu_has_child'] = "Có";
            else
                $list_data_table[$i]['menu_has_child'] = "Không";
            if($query[$i]['menu_parent'] == 0)
            {

                $list_data_table[$i]['menu_parent'] = "";
            }
            else
            {
                $where_parent = array(
                    'menu_id' => $query[$i]['menu_parent']
                );
                $info_menu_parent = $this->menus->getAll('*',$where_parent);
                $list_data_table[$i]['menu_parent'] = $info_menu_parent[0]->menu_name;
            }

            $arr_menu_display = explode(',',$query[$i]['menu_display'] );
            $query_menu_display = $this->user_group_info->getAllIn('*',$arr_menu_display,'users_group_id' );
            $str_menu_display = "";
            foreach($query_menu_display as $s_query_menu_display)
            {
                $str_menu_display .= $s_query_menu_display->users_group_name.",";
            }
            $list_data_table[$i]['menu_display'] = $str_menu_display;
            // lay thong tin menu cha
        }
        return $list_data_table;
    }

    // ham gen nut action
    public function generateTable($data)
    {
        $this->table->set_heading(array('<input type="checkbox" name="" />','Ảnh','Tên menu','Đường dẫn','Menu cha','Menu con','Trạng thái','Hành động'));
        foreach($data as $s_data)
        {
            if($_SESSION['list_permiss'][0]['users_group_view'] == 1)
                $view_detail_button ="<input  class='btn btn-info btn-xs viewDetail' link-ajax='".base_url_admin()."menus/viewDetail' data-send='' id-send='".$s_data['menu_id']."' type='button' data-target='#viewDetail' data-toggle='modal'  value='Chi tiết'  /> ";
            else
                $view_detail_button = "";
            if($_SESSION['list_permiss'][0]['users_group_edit'] == 1)
                $edit_button = '<a href="'.base_url_admin().'menus/editMenu/'.$s_data['menu_id'].'"><button class="btn btn-warning btn-xs" type="button">Sửa</button></a> ';
            else
                $edit_button = "";
            $list_button = $view_detail_button.
                            $edit_button.
                            '<button link-id="'.base_url_admin().'menus/deleteOne/'.$s_data['menu_id'].'" name-del="'.$s_data['menu_name'].'" class="btn_delOne btn btn-danger btn-xs " data-target="#confirmDelete" data-toggle="modal"  type="button">Xóa</button>';
            $this->table->add_row(array('<input type="checkbox" name="id[]" value="'.$s_data['menu_id'].'"/>',$s_data['menu_icon'] , $s_data['menu_name'],$s_data['menu_path'],$s_data['menu_parent'],$s_data['menu_has_child'],$s_data['menu_active'],$list_button));
        }
    }



}