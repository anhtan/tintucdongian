<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Blocks extends MY_Controller
{
    public $module_info;
    public $obj_title;
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_modules');
        $this->module_info = new m_modules();
    }
    
    public function listBlocks()
    {
        $this->author->check_login('users_id');
        // lay danh sach hien thi modules group
        $get_all_module = $this->module_info->getAllOrderArray('*','1=1','modules_id');
        $pre_generate_table = $this->createDataTable($get_all_module);    // chuyen du lieu da xu ly thanh dang mang roi truyen sang view

        // xu ly select action
        $btn_action = $this->input->post('btn_action');
        $list_action = $this->input->post('list_action');
        if(isset($btn_action))
        {
            if($list_action == 'delete')            // neu xoa
            {
                $id = $this->input->post('id');
                $status = $this->module_info->deleteRecord('modules_id',$id);
                $this->session->set_flashdata('status_action',$status);
                if($status['type'] == 'success')
                    redirect(base_url_admin().'blocks/listBlocks');
            }else if($list_action == 'publish')     // kich hoat
            {
                $id = $this->input->post('id');
                $data = array(
                    'modules_status' => 1
                );
                $status = $this->module_info->updateRecordIn($id,$data,'modules_id');
                $this->session->set_flashdata('status_action',$status);
                if($status['type'] == 'success')
                    redirect(base_url_admin().'blocks/listBlocks');
            }else if($list_action == 'unpublish')   // khoa
            {
                $id = $this->input->post('id');
                $data = array(
                    'modules_status' => 0
                );
                $status = $this->module_info->updateRecordIn($id,$data,'modules_id');
                $this->session->set_flashdata('status_action',$status);
                if($status['type'] == 'success')
                    redirect(base_url_admin().'blocks/listBlocks');

            }
        }
        // thong tin chung truyen sang view
        $this->generateTable($pre_generate_table);
        $data['option_add'] = $this->customOption();
//        $data['custom_option'] = $this->customOption();
        $data['title_page'] = "Quản lý block";
        $data['title_table'] = "Danh sách block";
        $data['link_form_process'] = base_url_admin().'blocks/listBlocks';
        $this->layoutCommon('admin/layouts/tables',$data);
    }
    public function addBlocks()
    {
        $this->author->check_login('users_id');                             // kiem tra dang nhap
        $submit_form = $this->input->post('submit_form');
        if(isset( $submit_form))
            $this->checkForm();                                             // kiem tra form nhap du lieu
        $data['list_position'] = position_module();
        $data['title_page'] = "Thêm module";
        $data['title_form'] = "Thông tin module";
        $data['obj_title'] = $this->module_info;
        if($this->form_validation->run($this) == false)
        {
            $this->layoutCommon('adds',$data);
        }else
        {
            $data_pre_form = $this->dataPreActionForm();                    // goi cac bien va truyen du lieu truoc khi them
            $this->module_info->field_check = array(
                'modules_name' => $this->input->post('modules_name')
            );
            $query = $this->module_info->insertRecord($data_pre_form);            // goi ham chen ban ghi , neu thanh cong --> bao
            $this->session->set_flashdata('mess_manufact',$query);
            if($query['type'] == 'success')
            {
                $full_model = 'm_'.$this->input->post('modules_name_model');
                $this->makeDirectory($this->input->post('modules_name'),$full_model,$this->input->post("field_model"),$this->input->post("name_display_model"),$this->input->post('modules_name_model'),$this->input->post('name_display_del'));
                redirect(base_url_admin().'blocks/listBlocks');
            }else
            {
                $this->session->set_flashdata('mess_manufact',$query);
                $this->layoutCommon('adds',$data);
            }
        }

    }
    // sua
    public function editBlocks($id)
    {
        $this->author->check_login('users_id');
        $submit_form = $this->input->post('submit_form');
        if(isset( $submit_form))
            $this->checkForm();
        $where = array(
            'modules_id' => $id
        );
        $data['modules_info'] = $this->module_info->getAll('*',$where);
        $data['title_page'] = "Sửa module";
        $data['title_form'] = "Thông tin module";
        $data['obj_title'] = $this->module_info;
        $data['list_position'] = position_module();
        if($this->form_validation->run($this) == false)
        {
            $this->layoutCommon('edits',$data);
        }else
        {
            $data_pre_form = $this->dataPreActionForm();
            $this->module_info->field_check = array(
                'modules_symbol' => $this->input->post('modules_symbol'),
                'modules_id !=' => $this->input->post('modules_id')
            );
            $query = $this->module_info->updateRecord($id,$data_pre_form,'modules_id');     // cap nhat du lieu
            $this->session->set_flashdata('mess_manufact',$query);
            if($query['type'] == 'success')
            {
                redirect(base_url_admin().'blocks/listBlocks');
            }else
            {
                $this->session->set_flashdata('mess_manufact',$query);
                $this->layoutCommon('edits',$data);
            }

        }
    }

    // check form
    public function checkForm()
    {
        $this->form_validation->set_rules('modules_symbol','Tên đại diện','required|min_length[4]|max_length[130]');
        $this->form_validation->set_rules('modules_name','Tên module','required|min_length[4]|max_length[130]');
        $this->form_validation->set_rules('modules_position','Vị trí','callback_checkSelectDefault');
        $this->form_validation->set_rules('modules_path','Đường dẫn','required');
        $this->form_validation->set_rules('modules_order','Thứ tự','callback_checkSelectDefault');
        $this->form_validation->set_message('required','%s không được để trống');
        $this->form_validation->set_message('min_length','%s phải có ít nhất %s ký tự');
        $this->form_validation->set_message('max_length','%s chỉ được tối đa %s ký tự');
    }

    // chuan bi du lieu khi thao tac them , sua
    public function dataPreActionForm()
    {
        $data_pre_action_form = array(
            'modules_symbol' => $this->input->post('modules_symbol'),
            'modules_name' => $this->input->post('modules_name'),
            'modules_position' => $this->input->post('modules_position'),
            'modules_path' => $this->input->post('modules_path'),
            'modules_icon' => $this->input->post('modules_icon'),
            'modules_alias' => $this->input->post('modules_alias'),
            'modules_order' => $this->input->post('modules_order'),
            'modules_status' => $this->input->post('modules_status'),
            'modules_name_model' => $this->input->post('modules_name_model')
        );
        return $data_pre_action_form;
    }

    public function customOption()
    {
        $custom_option = '<div class="wrap_top_option">';
        $custom_option .= '<a href="'.base_url_admin().'blocks/addBlocks">';
        $custom_option .= '<button class="btn btn-success" type="button">';
        $custom_option .= '<i class="fa fa-plus"></i> Thêm module mới';
        $custom_option .= '</button>';
        $custom_option .= '</a> ';
        $custom_option .= '<a href="'.base_url_admin().'generation/genModel">';
        $custom_option .= '<button class="btn btn-success" type="button">';
        $custom_option .= '<span class="glyphicon glyphicon-floppy-disk"></span> Tạo model';
        $custom_option .= '</button>';
        $custom_option .= '</a> ';
        $custom_option .= '<a href="'.base_url_admin().'generation/genView">';
        $custom_option .= '<button class="btn btn-success" type="button">';
        $custom_option .= '<span class="glyphicon glyphicon-eye-open"></span> Tạo view';
        $custom_option .= '</button>';
        $custom_option .= '</a> ';
        $custom_option .= '<a href="'.base_url_admin().'generation/genController">';
        $custom_option .= '<button class="btn btn-success" type="button">';
        $custom_option .= '<span class="glyphicon glyphicon-flash "></span> Tạo controller';
        $custom_option .= '</button>';
        $custom_option .= '</a>';
        $custom_option.='</div>';
        return $custom_option;
    }

    // ham load order theo position
    public function listOrderByPosition()
    {
        $position = $this->input->post('position');
        if(isset($position))
        {
            $where_with_order = array(
               'modules_position' => $position
            );
            $count_position = $this->module_info->countAllQuery('*',$where_with_order);
        }
        $data['count_position'] = $count_position;
        $this->load->view('order_by_position',$data);
    }

    // xem chi tiet
    public function viewDetail()
    {
        $id = $this->input->post('id');
        if(isset($id))
        {
            $where = array(
                'modules_id' => $id
            );
            $get_all_modules = $this->module_info->getAllArray('*',$where);
        }
        $data['info_all'] = $get_all_modules;
        $data['obj_title'] = $this->module_info;
        $data['list_position'] = position_module();
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
            'modules_status' => $status
        );
        $this->module_info->updateNormal($id,$data_update,'modules_id');
    }

    // gan cac du lieu xu ly tu du lieu lay duoc vao mot mang de gui sang view
    public function createDataTable($query)
    {
        $list_data_table = array();
        $count_modules = $this->module_info->countAllQuery('*');
        $list_position = position_module();
        for($i = 0 ; $i < count($query);$i++)
        {
            $list_data_table[$i]['modules_id'] =  $query[$i]['modules_id'];
            if($query[$i]['modules_status'] == 1)
                $list_data_table[$i]['modules_status'] = "<button type='button' url='".base_url_admin()."blocks/changeStatus' class='btn btn-success btn-xs btn_change_status' id='".$query[$i]['modules_id']."' status='".$query[$i]['modules_status']."' >Kích hoạt</button>";
            else
                $list_data_table[$i]['modules_status'] = "<button type='button' url='".base_url_admin()."blocks/changeStatus' class='btn btn-warning btn_change_status btn-xs'  id='".$query[$i]['modules_id']."' status='".$query[$i]['modules_status']."' >Bị khóa</button>";
            $list_data_table[$i]['modules_name'] ="<div title='Thêm các thành phần khác' add-controller='".base_url_admin()."generation/genController/".$query[$i]['modules_name']."/".$query[$i]['modules_name_model']."' add-view-detail='".base_url_admin()."generation/genViewDetail/".$query[$i]['modules_name']."' add-view='".base_url_admin()."generation/genView/".$query[$i]['modules_name']."'  add-model='".base_url_admin()."generation/genModel/".$query[$i]['modules_name']."/".$query[$i]['modules_name_model']."' class='wrap_name'>". $query[$i]['modules_name']."  "."<span  class='manuface_module glyphicon glyphicon-wrench fa-1x'></span>"."</div>";
            $list_data_table[$i]['modules_position'] = $list_position[$query[$i]['modules_position']] ;
            $list_data_table[$i]['modules_symbol'] = "<a href='".base_url_admin().$query[$i]['modules_path']."'>".$query[$i]['modules_symbol']."</a>";
            $list_data_table[$i]['modules_path'] = $query[$i]['modules_path'];
            $list_data_table[$i]['modules_icon'] = "<p class='fa ".$query[$i]['modules_icon']." fa-2x icon_list'></p>";

            /*-----------create module order -------------*/
            $list_data_table[$i]['modules_order'] = "<select name='orders[]' class='list_order_block'>";
            $list_data_table[$i]['modules_order'] .= "<option value='".$query[$i]['modules_order']."'>".$query[$i]['modules_order']."</option>";
            for($j=1;$j<=$count_modules;$j++)
            {
                if($j != $query[$i]['modules_order'])
                    $list_data_table[$i]['modules_order'] .= "<option value='".$j."'>".$j."</option>";
            }
            $list_data_table[$i]['modules_order'] .= "</select>";

            $list_data_table[$i]['modules_userid_create'] = $query[$i]['modules_userid_create'];
            $list_data_table[$i]['modules_userid_update'] = $query[$i]['modules_userid_update'];
            $list_data_table[$i]['modules_userid_delete'] = $query[$i]['modules_userid_delete'];
            $list_data_table[$i]['modules_create'] = $query[$i]['modules_create'];
            $list_data_table[$i]['modules_alias'] = $query[$i]['modules_alias'];
        }
        return $list_data_table;
    }

    // ham gen nut action , ham nay gen ca bang du lieu gom , set heading (gen dong dau cua bang) , add_row them cac dong du lieu cho bang
    public function generateTable($data)
    {
        $this->table->set_heading(array('<input type="checkbox" name="" />','Ảnh','Tên đại diện','Tên module','Vị trí','Sắp xếp','Trạng thái','Hành động'));
        foreach($data as $s_data)
        {
            if($_SESSION['list_permiss'][0]['users_group_view'] == 1)
                $view_detail_button = '<button  class="btn btn-info btn-xs viewDetail" link-ajax="'.base_url_admin().'blocks/viewDetail" id-send="'.$s_data['modules_id'].'" type="button" data-target="#viewDetail" data-toggle="modal" > Chi tiết</button> ';
            else
                $view_detail_button = '';
            if($_SESSION['list_permiss'][0]['users_group_edit'] == 1)
                $edit_button = '<a href="'.base_url_admin().'blocks/editBlocks/'.$s_data['modules_id'].'"><button class="btn btn-warning btn-xs" type="button">Sửa</button></a> ';
            else
                $edit_button = "";
            if($_SESSION['list_permiss'][0]['users_group_delete_mem'])
                $delete_button ='<button link-id="'.base_url_admin().'blocks/deleteOne/'.$s_data['modules_id'].'" name-del="'.$s_data['modules_name'].'" class="btn_delOne btn btn-danger btn-xs " data-target="#confirmDelete" data-toggle="modal"  type="button">Xóa</button> ';
            else
                $delete_button="";
            $list_button = $view_detail_button.
                $edit_button.
                $delete_button;
            $this->table->add_row(array('<input type="checkbox" name="id[]" value="'.$s_data['modules_id'].'"/>',  $s_data['modules_icon'],$s_data['modules_symbol'],$s_data['modules_name'],$s_data['modules_position'],$s_data['modules_order'],$s_data['modules_status'],$list_button));
        }
    }
    // xoa 1 ban ghi
    public function deleteOne($id)
    {
        $where_del_directory = array(
          'modules_id' => $id
        );
        $del_directory = $this->module_info->getAll('*',$where_del_directory);
        $path_directory = "application/modules/".$del_directory[0]->modules_name;
        if(is_dir($path_directory) == true )
        {
            if($this->deleteDir($path_directory)==true)
            {
                $query = $this->module_info->deleteRecord('modules_id',$id);
                $this->session->set_flashdata('mess_manufact',$query);
                redirect(base_url_admin().'blocks/listBlocks');
            }else
            {
                $error_del = array(
                  'type' => 'error',
                  'mess' => 'Không xóa được'
                );
                $this->session->set_flashdata('mess_manufact',$error_del);
                redirect(base_url_admin().'blocks/listBlocks');
            }
        }else
        {
            $error_del = array(
                'type' => 'error',
                'mess' => 'Không có thư mục đó'
            );
            $this->session->set_flashdata('mess_manufact',$error_del);
            redirect(base_url_admin().'blocks/listBlocks');

        }
    }

    public function makeDirectory($name_module,$name_of_model,$field_model ="",$name_display_model="",$obj_model="",$name_display_del)
    {
        $name_modules = $name_module;     // ten module
        $ext_file = '.php';
        $pre_suffic = "m_";
        $listIcon = "listIcon";
        $display_file = "display";
        /*------------ten nguon file----------*/
//        $patern_file_controller = "patern_file/controllers/name_controller.txt";
        $patern_file_model = "patern_file/models/name_model.txt";
        $patern_file_view_listIcon = "patern_file/views/listIcon.txt";
        // khai bao ten cac thu muc
        $structure_module = 'application/modules/'.$name_modules.'';
        $structure_controller = 'application/modules/'.$name_modules.'/controllers';
        $structure_model = 'application/modules/'.$name_modules.'/models';
        $structure_view = 'application/modules/'.$name_modules.'/views';

        // khai bao ten cac file di kem
//        $file_controller = $structure_controller."/".ucfirst($name_modules).$ext_file;
        $file_model = $structure_model."/".$pre_suffic.$name_modules.$ext_file;
        $file_view_listIcon = $structure_view."/".$listIcon.$ext_file;
        $file_view_display_file = $structure_view."/".$display_file.$ext_file;


        if($structure_module  && $structure_model && $structure_view)
        {

            // tao thu muc module , controller , view , model
            if(@mkdir(@$structure_module,0777) == 1 &&mkdir(@$structure_model,0777) == 1 &&mkdir(@$structure_controller,0777) == 1 &&mkdir(@$structure_view,0777) == 1  )
            {
                if(isset($patern_file_view_listIcon) )
                {
                    /*-----------khai bao doc cac file goc --------------*/
                    $resource_file_listIcon = file_get_contents($patern_file_view_listIcon);                // lay noi dung file goc listIcon txt
//                    $resource_file_controllers = file_get_contents($patern_file_controller);                // lay noi dung file controller
                    // create file
//                    $create_file_controller = fopen($file_controller,'w');                                  // tao file controller theo duong dan
                    $create_file_view_add_listIcon = fopen($file_view_listIcon,'w');                        // tao file view list icon theo duogn dan
                    $create_file_view_add_display_file = fopen($file_view_display_file,'w');                // tao file display của hàm display
                    // write file
                    $title_page = "article_image";

                    /*------------bien file controller------------------*/
                    fwrite($create_file_view_add_listIcon,$resource_file_listIcon);                         // ghi noi dung load tu listIcon txt
//                    fwrite($create_file_controller,$resource_file_controllers);                             // ghi noi dung load tu file controller
                    // ghi cac bien vao file controller
//                    $content_file_controller = file_get_contents($file_controller);                         // lay noi dung file controller da khai bao
//                    $this->replace_in_file($file_controller,'$name_controller',ucfirst($name_modules));     // chen cac bien vao file controller
//                    $this->replace_in_file($file_controller,'$model_info',$name_of_model);
                    /*-------------- gen action createDataTable--------------------*/
//                    $this->replace_in_file($file_controller,'$obj_module',$name_modules);
//                    $this->replace_in_file($file_controller,'$obj_model',$obj_model);

                    /*-----------------gen action genTable------------------------*/
//                    $this->genActionGenTable($file_controller,$field_model,$name_display_model,$name_display_del);
//                    $this->replace_in_file($file_controller,'$obj_model',$name_modules);

                    $content_file_view_add = file_get_contents($file_view_listIcon);
                    $this->replace_in_file($file_view_listIcon,'$ten',$title_page);
                    // gan cac bien vao file
                    if($content_file_view_add != ""  )
                    {
                        echo "ghi thanh cong";
                    }
                    fclose($create_file_view_add_listIcon);

                }else
                {
                    echo "khong co file";
                }
            }else
            {
                echo "khong thanh cong";
            }

/*            if (mkdir($structure_module, 0777) == true && mkdir($structure_model, 0777) == true &&mkdir($structure_controller, 0777) == true &&mkdir($structure_view, 0777) == true &&mkdir($structure_module, 0777) == true) {
                echo "tao thanh cong thu module";
            }else
            {
                echo "khong tao thanh cong";
            }*/

        }else
        {
            echo "Thiếu tên thư mục";
        }

//        rmdir('abc'); // xoa thu muc
    }




}