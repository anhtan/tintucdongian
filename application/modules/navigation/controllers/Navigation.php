<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Navigation extends MY_Controller
{
//  public $upload_info ;
    public $m_menu_client_info;
    function __construct()
    {
      parent::__construct();
//    $this->load->library('UploadFile');
//    $this->upload_info = new UploadFile();
      $this->load->model('m_menu_client');
      $this->load->model('m_article_category');
      $this->m_menu_client_info = new m_menu_client();
      $this->m_article_category_info = new m_article_category();

    }

    public function display()
    {
      $this->load->view('display');
    }
    public function addNavigation()
    {
        $this->author->check_login('users_id');                             // kiem tra dang nhap
        $submit_form = $this->input->post('submit_form');
        if(isset( $submit_form))
            $this->checkForm();                                             // kiem tra form nhap du lieu
        $data['title_page'] = "Thêm menu";
        $data['title_form'] = "Thông tin menu";
        $data['class_form'] = "navigation_info";
        $data['dialog_form'] = 1;
        $data['back_home'] = $this->customOption('fa-list-alt','Danh sách','navigation/listNavigation');
        $where_parent = array(
          'menu_client_parent' => 0
        );
        $where_sub_category = array(
          'article_category_parent_id !=' => 0
        );
        $data['list_parent'] = $this->m_menu_client_info->getAll('*',$where_parent);
        $data['list_article_category'] = $this->m_article_category_info->getAll('*');
        $data['list_sub_article_category'] = $this->m_article_category_info->getAll('*',$where_sub_category);
        if($this->form_validation->run($this) == false)
        {
            $this->layoutCommon('adds',$data);
        }else
        {
            $data_pre_form = $this->dataPreActionForm();                    // goi cac bien va truyen du lieu truoc khi them
            $this->m_menu_client_info->field_check = array(
                'menu_client_name' => $this->input->post('menu_client_name')
            );
            $query = $this->m_menu_client_info->insertRecord($data_pre_form);            // goi ham chen ban ghi , neu thanh cong --> bao
            $this->session->set_flashdata('mess_manufact',$query);
            if($query['type'] == 'success')
            {
                redirect(base_url_admin().'navigation/listNavigation');
            }else
            {
                $this->session->set_flashdata('mess_manufact',$query);
                $this->layoutCommon('adds',$data);
            }
        }

    }
    // sua
    public function editNavigation($id)
    {
        $this->author->check_login('users_id');
        $submit_form = $this->input->post('submit_form');
        if(isset( $submit_form))
            $this->checkForm();
        $where = array(
            'menu_client_id' => $id
        );
        $data['update_info'] = $this->m_menu_client_info->getAll('*',$where);
        $data['back_home'] = $this->customOption('fa-list-alt','Danh sách','navigation/listNavigation');
        $data['title_page'] = "Sửa menu";
        $data['class_form'] = "navigation_info";
        $data['title_form'] = "Thông tin menu";
        $where_parent = array(
            'menu_client_parent' => 0
        );
        $where_sub_category = array(
            'article_category_parent_id !=' => 0
        );
        $data['list_parent'] = $this->m_menu_client_info->getAll('*',$where_parent);
        $data['list_article_category'] = $this->m_article_category_info->getAll('*');
        $data['list_sub_article_category'] = $this->m_article_category_info->getAll('*',$where_sub_category);
        if($this->form_validation->run($this) == false)
        {
            $this->layoutCommon('edits',$data);
        }else
        {
            $data_pre_form = $this->dataPreActionForm();
            $this->m_menu_client_info->field_check = array(
                'menu_client_name' => $this->input->post('menu_client_name'),
                'menu_client_id !=' => $this->input->post('menu_client_id')
            );
            $query = $this->m_menu_client_info->updateRecord($id,$data_pre_form,'menu_client_id');     // cap nhat du lieu
            $this->session->set_flashdata('mess_manufact',$query);
            if($query['type'] == 'success')
            {
                redirect(base_url_admin().'navigation/listNavigation');
            }else
            {
                $this->session->set_flashdata('mess_manufact',$query);
                $this->layoutCommon('edits',$data);
            }

        }
    }

    // xem chi tiet
    public function viewDetail()
    {
        $id = $this->input->post('id');
        if(isset($id))
        {
            $where = array(
                'menu_client_id' => $id
            );
            $get_all_menu = $this->m_menu_client_info->getAllArray('*',$where);
            if($get_all_menu[0]['menu_client_parent'] == 0)
            {
                $get_all_menu[0]['menu_client_parent'] = "";
            }else
            {
                $where_parent = array(
                  'menu_client_id' => $get_all_menu[0]['menu_client_parent']
                );
                $get_menu_detail = $this->m_menu_client_info->getAllArray('*',$where_parent);
                $get_all_menu[0]['menu_client_parent'] = $get_menu_detail[0]['menu_client_name'];
            }

        }
        $data['info_all'] = $get_all_menu;
        $this->load->view('views',$data);
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
            'menu_client_status' => $status
        );
        $this->m_menu_client_info->updateNormal($id,$data_update,'menu_client_id');
    }



    // danh sach user
    public function listNavigation()
    {
        $this->author->check_login('users_id');
        // lay danh sach hien thi users group
        $get_navigation = $this->m_menu_client_info->getAllArray('');
        $pre_generate_table = $this->createDataTable($get_navigation);    // chuyen du lieu da xu ly thanh dang mang roi truyen sang view
//        $a = $this->createDataTableTest($get_navigation);

//        echo "<pre>"; print_r($a);  echo "</pre>";
/*        foreach($get_navigation as $key=>$value)
        {
             foreach($value as $key1=>$value1)
             {
                 echo $key1.":".$value1."<br>";
             }
        }*/
        // xu ly select action
        $btn_action = $this->input->post('btn_action');
        $list_action = $this->input->post('list_action');
        if(isset($btn_action))
        {
            if($list_action == 'delete')            // neu xoa
            {
                $id = $this->input->post('id');
                $status = $this->m_menu_client_info->deleteRecord('menu_client_id',$id);
                $this->session->set_flashdata('status_action',$status);
                if($status['type'] == 'success')
                    redirect(base_url_admin().'navigation/listNavigation');
            }else if($list_action == 'publish')     // kich hoat
            {
                $id = $this->input->post('id');
                $data = array(
                    'menu_client_status' => 1
                );
                $status = $this->m_menu_client_info->updateRecordIn($id,$data,'menu_client_id');
                $this->session->set_flashdata('status_action',$status);
                if($status['type'] == 'success')
                    redirect(base_url_admin().'navigation/listNavigation');
            }else if($list_action == 'unpublish')   // khoa
            {
                $id = $this->input->post('id');
                $data = array(
                    'menu_client_status' => 0
                );
                $status = $this->m_menu_client_info->updateRecordIn($id,$data,'menu_client_id');
                $this->session->set_flashdata('status_action',$status);
                if($status['type'] == 'success')
                    redirect(base_url_admin().'navigation/listNavigation');

            }
        }
        // thong tin chung truyen sang view
        $this->generateTable($pre_generate_table);
        $data['option_add'] = $this->customOption('fa-plus','Thêm menu mới','navigation/addNavigation');
        $data['title_page'] = "Quản lý menu điều hướng";
        $data['title_table'] = "Danh sách menu";
        $data['link_form_process'] = base_url_admin().'navigation/listNavigation';
        $this->layoutCommon('admin/layouts/tables',$data);
    }
    public function customOption($icon,$name_menu,$path_menu)
    {
        $custom_option = '<div class="wrap_top_option">';
        $custom_option .= '<a href="'.base_url_admin().$path_menu.'">';
        $custom_option .= '<button class="btn btn-success btn_del_session" type="button">';
        $custom_option .= '<i class="fa '.$icon.'"></i> '.$name_menu.' ';
        $custom_option .= '</button>';
        $custom_option .= '</a> ';
        $custom_option.='</div>';
        return $custom_option;
    }
    // check form
    public function checkForm()
    {
        $this->form_validation->set_rules('menu_client_name','Tên menu','required|min_length[4]|max_length[60]');
//        $this->form_validation->set_rules('menu_client_path','Đường dẫn','required');
        $this->form_validation->set_message('required','%s không được để trống');
        $this->form_validation->set_message('min_length','%s phải có ít nhất %s ký tự');
        $this->form_validation->set_message('max_length','%s chỉ được tối đa %s ký tự');
    }

    // chuan bi du lieu khi thao tac them , sua
    public function dataPreActionForm()
    {
        $data_pre_action_form = array(
            'menu_client_name' => $this->input->post('menu_client_name'),
            'menu_client_alias' =>  $this->input->post('menu_client_alias'),
            'menu_client_path' => $this->input->post('menu_client_path'),
            'menu_client_parent' => $this->input->post('menu_client_parent'),
            'menu_client_status' => $this->input->post('menu_client_status')
        );
        return $data_pre_action_form;
    }

    // gan cac du lieu xu ly tu du lieu lay duoc vao mot mang de gui sang view
    public function createDataTable($query)
    {
        $list_data_table = array();
        for($i = 0 ; $i < count($query);$i++)
        {
            $list_data_table[$i]['menu_client_id'] =  $query[$i]['menu_client_id'];
            if($query[$i]['menu_client_status'] == 1)
                $list_data_table[$i]['menu_client_status'] = "<button type='button' url='".base_url_admin()."navigation/changeStatus' class='btn btn-success btn-xs btn_change_status' id='".$query[$i]['menu_client_id']."' status='".$query[$i]['menu_client_status']."' >Kích hoạt</button>";
            else
                $list_data_table[$i]['menu_client_status'] = "<button type='button' url='".base_url_admin()."navigation/changeStatus' class='btn btn-warning btn_change_status btn-xs'  id='".$query[$i]['menu_client_id']."' status='".$query[$i]['menu_client_status']."' >Bị khóa</button>";
            $list_data_table[$i]['menu_client_name'] = $query[$i]['menu_client_name'];
            $list_data_table[$i]['menu_client_alias'] = $query[$i]['menu_client_alias'];
            $list_data_table[$i]['menu_client_path'] = $query[$i]['menu_client_path'];
            $list_data_table[$i]['menu_client_order'] = $query[$i]['menu_client_order'];
            if($query[$i]['menu_client_parent'] == 0)
            {
                $list_data_table[$i]['menu_client_parent'] = "";
            }else
            {
                $where_parent = array(
                   'menu_client_id' => $query[$i]['menu_client_parent']
                );
                $query_parent = $this->m_menu_client_info->getAll('*',$where_parent);
                $list_data_table[$i]['menu_client_parent'] = $query_parent[0]->menu_client_name;
            }
        }
        return $list_data_table;
    }

    // xoa 1 ban ghi
    public function deleteOne($id)
    {
        $query = $this->m_menu_client_info->deleteRecord('menu_client_id',$id);
        $this->session->set_flashdata('mess_manufact',$query);
        redirect(base_url_admin().'navigation/listNavigation');
    }

    // ham gen nut action , ham nay gen ca bang du lieu gom , set heading (gen dong dau cua bang) , add_row them cac dong du lieu cho bang
    public function generateTable($data)
    {
        $this->table->set_heading(array('<input type="checkbox" name="" />','Tên menu','Đường dẫn','Menu cha','Thứ tự','Trạng thái','Hành động'));
        foreach($data as $s_data)
        {
            if($_SESSION['list_permiss'][0]['users_group_view'] == 1)
                $view_detail_button = '<button  class="btn btn-info btn-xs viewDetail" link-ajax="'.base_url_admin().'navigation/viewDetail" id-send="'.$s_data['menu_client_id'].'" type="button" data-target="#viewDetail" data-toggle="modal" > Chi tiết</button> ';
            else
                $view_detail_button = '';
            if($_SESSION['list_permiss'][0]['users_group_edit'] == 1)
                $edit_button = '<a href="'.base_url_admin().'navigation/editNavigation/'.$s_data['menu_client_id'].'"><button class="btn btn-warning btn-xs" type="button">Sửa</button></a> ';
            else
                $edit_button = "";
            if($_SESSION['list_permiss'][0]['users_group_delete_mem'])
                $delete_button ='<button link-id="'.base_url_admin().'navigation/deleteOne/'.$s_data['menu_client_id'].'" name-del="'.$s_data['menu_client_name'].'" class="btn_delOne btn btn-danger btn-xs " data-target="#confirmDelete" data-toggle="modal"  type="button">Xóa</button> ';
            else
                $delete_button="";
            $list_button = $view_detail_button.
                $edit_button.
                $delete_button;
            $this->table->add_row(array('<input type="checkbox" name="id[]" value="'.$s_data['menu_client_id'].'"/>',  $s_data['menu_client_name'],$s_data['menu_client_path'],$s_data['menu_client_parent'],$s_data['menu_client_order'],$s_data['menu_client_status'],$list_button));
        }
    }






}
?>