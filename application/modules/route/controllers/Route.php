<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Route extends MY_Controller
{
//  public $upload_info ;
    public $m_route_info;
    function __construct()
    {
      parent::__construct();
//    $this->load->library('UploadFile');
//    $this->upload_info = new UploadFile();
      $this->load->model('m_route');
      $this->m_route_info = new m_route();
    }

    public function display()
    {
       echo "Xin chao ban";
       $this->layoutCommon('display');
    }
    // ham thay doi trang thai cua mot ban ghi
    public function changeStatus()
    {
        $id = $this->input->post('id');
        $status = $this->input->post('status');
        $where = array(
          'route_id' => $id
        );
        $get_route_info = $this->m_route_info->getAll('*',$where);
        $route_path_old = $get_route_info[0]->route_old;
        $route_path_new = $get_route_info[0]->route_new;
        $file_route = "routes_custom";
        if($status == 0)
        {
            $status = 1;
            $this->unPublishRoutes($file_route,$route_path_new,$route_path_old);
        }else
        {
            $status = 0;
            $this->publishRoutes($file_route,$route_path_new,$route_path_old);
        }
        $data_update = array(
            'route_status' => $status
        );
        $this->m_route_info->updateNormal($id,$data_update,'route_id');
    }

    // xem chi tiet
    public function viewDetail()
    {
        $id = $this->input->post('id');
        if(isset($id))
        {
            $where = array(
                'route_id' => $id
            );
            $type_route = type_route();
            $get_all_route = $this->m_route_info->getAllArray('*',$where);
            $get_all_route[0]['route_type'] = $type_route[$get_all_route[0]['route_type']];
            $position_module = position_module();
        }
        $data['position_module'] = $position_module;
        $data['info_all'] = $get_all_route;
        $this->load->view('views',$data);
    }

    // danh sach m_route
    public function listRoute()
    {
        $this->author->check_login('users_id');
        // lay danh sach hien thi m_route
        $get_route = $this->m_route_info->getAllArray('');
        $pre_generate_table = $this->createDataTable($get_route);    // chuyen du lieu da xu ly thanh dang mang roi truyen sang view

        // xu ly select action
        $btn_action = $this->input->post('btn_action');
        $list_action = $this->input->post('list_action');
        if(isset($btn_action))
        {
            if($list_action == 'delete')            // neu xoa
            {
                $id = $this->input->post('id');
                $status = $this->m_route_info->deleteRecord('route_id',$id);
                $this->session->set_flashdata('status_action',$status);
                if($status['type'] == 'success')
                    redirect(base_url_admin().'route/listRoute');
            }else if($list_action == 'publish')     // kich hoat
            {
                $id = $this->input->post('id');
                $data = array(
                    'route_status' => 1
                );
                $status = $this->m_route_info->updateRecordIn($id,$data,'route_id');
                $this->session->set_flashdata('status_action',$status);
                if($status['type'] == 'success')
                    redirect(base_url_admin().'route/listRoute');
            }else if($list_action == 'unpublish')   // khoa
            {
                $id = $this->input->post('id');
                $data = array(
                    'route_status' => 0
                );
                $status = $this->m_route_info->updateRecordIn($id,$data,'route_id');
                $this->session->set_flashdata('status_action',$status);
                if($status['type'] == 'success')
                    redirect(base_url_admin().'route/listRoute');

            }
        }
        // thong tin chung truyen sang view
        $this->generateTable($pre_generate_table);
        $list_button = array(
          array(
            'path_menu' => 'route/addRoute',
              'icon' => 'fa-plus',
              'name_button' => 'Thêm route'
          ),
            array(
                'path_menu' => 'route/loadRoute',
                'icon' =>'fa-ticket',
                'name_button' => 'Load module'
            )
        );
        $data['option_add'] = $this->customOption(2,$list_button);
        $data['title_page'] = "Quản lý route";
        $data['title_table'] = "Danh sách route";
        $data['link_form_process'] = base_url_admin().'route/listRoute';
        $this->layoutCommon('admin/layouts/tables',$data);
    }
    public function addRoute()
    {
        $this->author->check_login('users_id');                             // kiem tra dang nhap
        $submit_form = $this->input->post('submit_form');
        if(isset( $submit_form))
            $this->checkForm();                                             // kiem tra form nhap du lieu
        $data['title_page'] = "Thêm route";
        $data['link_form_process'] = base_url_admin().'route/listRoute';
        $data['title_form'] = "Thông tin route";
        $data['class_form'] = "route_info";
        $data['type_route'] = type_route();
        $list_menu = array(
            array(
                'path_menu'=>'route/listRoute',
                'icon' => 'fa-list-alt',
                'name_button' => 'Danh sách'
            )
        );
        $data['back_home'] = $this->customOption(2,$list_menu);
        if($this->form_validation->run($this) == false)
        {
            $this->layoutCommon('adds',$data);
        }else
        {
            $data_pre_form = $this->dataPreActionForm();                    // goi cac bien va truyen du lieu truoc khi them
            $this->m_route_info->field_check = array(
                'route_name' => $this->input->post('route_name')
            );
            $query = $this->m_route_info->insertRecord($data_pre_form);            // goi ham chen ban ghi , neu thanh cong --> bao
            $this->session->set_flashdata('mess_manufact',$query);
            if($query['type'] == 'success')
            {
                $file_route = "routes_custom";
                $this->makeRoutes($file_route,$this->input->post("route_old"),$this->input->post("route_new")); // ham tao route
                redirect(base_url_admin().'route/listRoute');
            }else
            {
                $this->session->set_flashdata('mess_manufact',$query);
                $this->layoutCommon('adds',$data);
            }
        }

    }
    // sua
    public function editRoute($id)
    {
        $this->author->check_login('users_id');
        $submit_form = $this->input->post('submit_form');
        if(isset( $submit_form))
            $this->checkForm();
        $where = array(
            'route_id' => $id
        );
        $get_info_route = $this->m_route_info->getAll('*',$where);
        $data['update_info'] = $get_info_route;
        $data['type_route'] = type_route();
        $list_menu = array(
            array(
                'path_menu'=>'route/listRoute',
                'icon' => 'fa-list-alt',
                'name_button' => 'Danh sách'
            )
        );
        $data['back_home'] = $this->customOption(2,$list_menu);
        $data['class_form'] = "route_info";
        $data['title_page'] = "Sửa route";
        $data['title_form'] = "Thông tin route";
        $route_path_new = $get_info_route[0]->route_new;                                    // duong dan route moi
        $route_path_old = $get_info_route[0]->route_old;                                          // duong dan route cu
        if($this->form_validation->run($this) == false)
        {
            $this->layoutCommon('edits',$data);
        }else
        {
            $data_pre_form = $this->dataPreActionForm();
            $this->m_route_info->field_check = array(
                'route_name' => $this->input->post('route_name'),
                'route_id !=' => $this->input->post('route_id')
            );
            $query = $this->m_route_info->updateRecord($id,$data_pre_form,'route_id');     // cap nhat du lieu
            $this->session->set_flashdata('mess_manufact',$query);
            if($query['type'] == 'success')
            {
                $route_change_new = $this->input->post('route_new');
                $route_change_old = $this->input->post('route_old');
                $file_route = "routes_custom";
                $this->updateRoutes($file_route,$route_path_new,$route_path_old,$route_change_new,$route_change_old);
                redirect(base_url_admin().'route/listRoute');
            }else
            {
                $this->session->set_flashdata('mess_manufact',$query);
                $this->layoutCommon('edits',$data);
            }

        }
    }

    // xoa 1 ban ghi
    public function deleteOne($id)
    {
        $where = array(
          'route_id'=>$id
        );
        $get_route_info = $this->m_route_info->getAll('*',$where);
        $file_route = "routes_custom";
        $route_path_new = $get_route_info[0]->route_new;
        $route_path_old = $get_route_info[0]->route_old;
        $this->manufactDelRoutes($file_route,$route_path_new,$route_path_old);
        $query = $this->m_route_info->deleteRecord('route_id',$id);
        $this->session->set_flashdata('mess_manufact',$query);
        redirect(base_url_admin().'route/listRoute');
    }

    // cac nut them , option khác
    public function customOption($type_option=1,$array_option="",$icon="",$name_menu="",$path_menu="")
    {
        $custom_option = "";
        if($type_option == 1)
        {
            $custom_option = '<div class="wrap_top_option">';
            $custom_option .= '<a href="'.base_url_admin().$path_menu.'">';
            $custom_option .= '<button class="btn btn-success btn_del_session" type="button">';
            $custom_option .= '<i class="fa '.$icon.'"></i> '.$name_menu.' ';
            $custom_option .= '</button>';
            $custom_option .= '</a> ';
            $custom_option.='</div>';
            return $custom_option;

        }else if($type_option == 2)
        {
            $custom_option .= '<div class="wrap_top_option">';
            foreach($array_option as $key=>$value)
            {
                foreach($value as $skey => $svalue)
                {
                    if($skey == 'path_menu')
                        $custom_option .= ' <a href="'.base_url_admin().$svalue.'">';
                    else if($skey == 'icon')
                        $custom_option .= '<button class="btn btn-success btn_del_session" type="button"><i class="fa '.$svalue.'"></i> ';
                    else if($skey == 'name_button')
                        $custom_option .= $value['name_button'].'</button>'.'</a>';
                }
            }
            $custom_option.='</div>';
            return $custom_option;
        }
    }
    // check form
    public function checkForm()
    {
        $this->form_validation->set_rules('route_name','Tiêu đề','required|min_length[4]|max_length[60]');
        $this->form_validation->set_rules('route_old','Đường dẫn gốc','required|min_length[4]|max_length[60]');
        $this->form_validation->set_rules('route_new','Đường dẫn mới','required|min_length[4]|max_length[60]');
//        $this->form_validation->set_rules('route_path','Đường dẫn','required');
        $this->form_validation->set_message('required','%s không được để trống');
        $this->form_validation->set_message('min_length','%s phải có ít nhất %s ký tự');
        $this->form_validation->set_message('max_length','%s chỉ được tối đa %s ký tự');
    }
    // chuan bi du lieu khi thao tac them , sua
    public function dataPreActionForm()
    {
        $data_pre_action_form = array(
            'route_name' => $this->input->post('route_name'),
            'route_old' =>  $this->input->post('route_old'),
            'route_new' => $this->input->post('route_new'),
            'route_type' => $this->input->post('route_type'),
            'route_status' => $this->input->post('route_status'),
            'route_object' => $this->input->post('route_object')
        );
        return $data_pre_action_form;
    }

    public function createDataTable($query)
    {
        $list_data_table = array();
        $type_route = type_route();
        foreach($query as $key=>$value)
        {
            foreach($value as $key_sub=>$value_sub)
            {
                if(strpos($key_sub,'_type'))
                    $value_sub = $type_route[''.$value_sub.''];
                if(strpos($key_sub,'_id'))
                    $id = $value_sub;
                if(strpos($key_sub, '_status'))
                {
                    if($value_sub == 1)
                        $list_data_table[$key][$key_sub] = "<button type='button' url='".base_url_admin()."route/changeStatus' class='btn btn-success btn-xs btn_change_status' id='".$id."' status='".$value_sub."' >Kích hoạt</button>";
                    else
                        $list_data_table[$key][$key_sub] = "<button type='button' url='".base_url_admin()."route/changeStatus' class='btn btn-warning btn-xs btn_change_status' id='".$id."' status='".$value_sub."' >Bị khóa</button>";
                }
                else
                    $list_data_table[$key][$key_sub] = $value_sub;
            }
        }
        return $list_data_table;
    }

    public function generateTable($data)
    {
        $this->table->set_heading(array('<input type="checkbox" name="" />','Đối tượng route','Đường dẫn gốc','Đường dẫn mới','Trạng thái','Hành động'));
        foreach($data as $s_data)
        {
            if($_SESSION['list_permiss'][0]['users_group_view'] == 1)
                $view_detail_button = '<button  class="btn btn-info btn-xs viewDetail" link-ajax="'.base_url_admin().'route/viewDetail" id-send="'.$s_data['route_id'].'" type="button" data-target="#viewDetail" data-toggle="modal" > Chi tiết</button> ';
            else
                $view_detail_button = '';
            if($_SESSION['list_permiss'][0]['users_group_edit'] == 1)
                $edit_button = '<a href="'.base_url_admin().'route/editRoute/'.$s_data['route_id'].'"><button class="btn btn-warning btn-xs" type="button">Sửa</button></a> ';
            else
                $edit_button = "";
            if($_SESSION['list_permiss'][0]['users_group_delete_mem'])
                $delete_button ='<button link-id="'.base_url_admin().'route/deleteOne/'.$s_data['route_id'].'" name-del="'.$s_data['route_name'].'" class="btn_delOne btn btn-danger btn-xs " data-target="#confirmDelete" data-toggle="modal"  type="button">Xóa</button> ';
            else
                $delete_button="";
            $list_button = $view_detail_button.
                $edit_button.
                $delete_button;
            $this->table->add_row(array('<input type="checkbox" name="id[]" value="'.$s_data['route_id'].'"/>',$s_data["route_object"],$s_data["route_old"],$s_data["route_new"],$s_data["route_status"]  ,$list_button));
        }
    }

    /*------------------nhom ham xu ly them route-------------------*/
    // tạo route
    public function makeRoutes($file_route,$route_path_old,$route_path_new)
    {
        $structure = "application/config/".$file_route.".php";                        // cau truc file route
        $content_file = file_get_contents($structure);                                // noi dung file route
        $string_route = $content_file."\n".'$route["'.$route_path_new.'"] = "'.$route_path_old.'";';         // noi route ghi vao file
        $open_file_route = fopen($structure,'w');                                 // mo file ra
        fwrite($open_file_route,$string_route);                                   // ghi file
    }

    // cap nhat route
    public function updateRoutes($file_route,$route_path_new,$route_path_old,$route_change_new,$route_change_old)
    {
        $structure = "application/config/".$file_route.".php";                        // cau truc file route
        $content_file = file_get_contents($structure);                                // noi dung file route
        $str_route_current = str_replace('$route["'.$route_path_new.'"] = "'.$route_path_old.'";','$route["'.$route_change_new.'"] = "'.$route_change_old.'";',$content_file);
        $open_file_route = fopen($structure,'w');                                 // mo file ra
        fwrite($open_file_route,$str_route_current);                                   // ghi file

    }

    // kich hoat route
    public function publishRoutes($file_route,$route_path_new,$route_path_old)
    {
        $structure = "application/config/".$file_route.".php";                        // cau truc file route
        $content_file = file_get_contents($structure);                                // noi dung file route
        $str_route_current = str_replace('$route["'.$route_path_new.'"] = "'.$route_path_old.'";','//$route["'.$route_path_new.'"] = "'.$route_path_old.'";',$content_file);
        $open_file_route = fopen($structure,'w');                                 // mo file ra
        fwrite($open_file_route,$str_route_current);                                   // ghi file
    }
    // khong kich hoat
    public function unPublishRoutes($file_route,$route_path_new,$route_path_old)
    {
        $structure = "application/config/".$file_route.".php";                        // cau truc file route
        $content_file = file_get_contents($structure);                                // noi dung file route
        $str_route_current = str_replace('//$route["'.$route_path_new.'"] = "'.$route_path_old.'";','$route["'.$route_path_new.'"] = "'.$route_path_old.'";',$content_file);
        $open_file_route = fopen($structure,'w');                                 // mo file ra
        fwrite($open_file_route,$str_route_current);                                   // ghi file
    }
    // xoa route
    public function manufactDelRoutes($file_route,$route_path_new,$route_path_old)
    {
        $structure = "application/config/".$file_route.".php";                        // cau truc file route
        $content_file = file_get_contents($structure);                                // noi dung file route
        if(strpos($content_file,'$route["'.$route_path_new.'"] = "'.$route_path_old.'";') != false)
        {
            $str_route_current = str_replace('$route["'.$route_path_new.'"] = "'.$route_path_old.'";','',$content_file);
        }else if(strpos($content_file,'//$route["'.$route_path_new.'"] = "'.$route_path_old.'";') != false){
            $str_route_current = str_replace('//$route["'.$route_path_new.'"] = "'.$route_path_old.'";','',$content_file);
        }
        $str_route_current = str_replace('$route["'.$route_path_new.'"] = "'.$route_path_old.'";','',$content_file);
        $open_file_route = fopen($structure,'w');                                 // mo file ra
        fwrite($open_file_route,$str_route_current);                                   // ghi file
    }

    public function loadRoute()
    {
        $data['class_form'] = "loadRoute";
        $data['title_page'] = "Thêm route";
        $data['link_form_process'] = base_url_admin().'route/listRoute';
        $data['title_form'] = 'Thông tin route';
        $submit_form = $this->input->post('submit_form');
        $name_of_module = $this->input->post('name_of_module');
        $list_menu = array(
            array(
                'path_menu'=>'route/listRoute',
                'icon' => 'fa-list-alt',
                'name_button' => 'Danh sách'
            )
        );
        $data['back_home'] = $this->customOption(2,$list_menu);
        if($submit_form)
        {
            $this->m_route_info->insertMutil(autoAddRoute($name_of_module));
            $this->loadRouteModule('route','routes_custom',$name_of_module,ucfirst($name_of_module));
            $mess = array(
              'type' => 'success',
                'mess' => 'load thanh công'
            );
            $this->session->set_flashdata('mess_manufact',$mess);
        }
        $this->layoutCommon('load_route',$data);
    }
    public function loadRouteModule($file_name,$file_route,$obj_module,$name_controller)
    {
        $structure = "patern_file/config/".$file_name.'.txt';
        $content_file = file_get_contents($structure);
        $content_file1 = str_replace('$obj_module',$obj_module,$content_file);
        $content_file2 = str_replace('$name_controller',$name_controller,$content_file1);
        $structure = "application/config/".$file_route.".php";                        // cau truc file route
        $content_last = file_get_contents($structure);
        $string_last = $content_last."\n".$content_file2;
        $open_file = fopen($structure,'w');
        fwrite($open_file,$string_last);
    }


}
?>