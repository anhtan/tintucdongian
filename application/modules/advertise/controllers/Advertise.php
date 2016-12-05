<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Advertise extends MY_Controller
{
//  public $upload_info ;
    public $m_advertise_info;
    function __construct()
    {
      parent::__construct();
//    $this->load->library('UploadFile');
//    $this->upload_info = new UploadFile();
      $this->load->model('m_advertise');
      $this->m_advertise_info = new m_advertise();
    }

    public function display()
    {
       echo "Xin chao ban";
       $this->layoutCommon('display');
    }

    // xem chi tiet
    public function viewDetail()
    {
        $id = $this->input->post('id');
        if(isset($id))
        {
            $where = array(
                'advertise_id' => $id
            );
            $get_all_advertise = $this->m_advertise_info->getAllArray('*',$where);
            $position_module = position_module();
        }
        $data['position_module'] = $position_module;
        $data['info_all'] = $get_all_advertise;
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
            'advertise_active' => $status
        );
        $this->m_advertise_info->updateNormal($id,$data_update,'advertise_id');
    }

    public function processUpload()
    {
        $type_upload = 'gif|jpg|png|jpeg';                                       // loai file cho phep
        $this->upload_info->alowed_types = $type_upload;                    // gan bien xac dinh loai file
        $data['upload_info'] = $this->upload_info->upload('userfile');      // thuc hien upload voi name input file duoc truyen vao
        if($data['upload_info'])
        {
            $_SESSION['path_file_upload'] = "uploads/".@$data['upload_info']['upload_data']['file_name'];       // gan bien duong dan
        }
        return $data['upload_info'];
    }
    // sua
    public function editAdvertise($id)
    {
        $this->author->check_login('users_id');
        $submit_form = $this->input->post('submit_form');
        if(isset( $submit_form))
            $this->checkForm();
        $where = array(
            'advertise_id' => $id
        );
        $data['position_module'] = position_module();
        $data['update_info'] = $this->m_advertise_info->getAll('*',$where);
        $data['back_home'] = $this->customOption('fa-list-alt','Danh sách','advertise/listAdvertise');
        $data['class_form'] = "advertise_info";
        $data['title_page'] = "Sửa quảng cáo";
        $data['title_form'] = "Thông tin quảng cáo";
        if($this->form_validation->run($this) == false)
        {
            $this->layoutCommon('edits',$data);
        }else
        {
            $data_pre_form = $this->dataPreActionForm();
            $this->m_advertise_info->field_check = array(
                'advertise_name' => $this->input->post('advertise_name'),
                'advertise_id !=' => $this->input->post('advertise_id')
            );
            $query = $this->m_advertise_info->updateRecord($id,$data_pre_form,'advertise_id');     // cap nhat du lieu
            $this->session->set_flashdata('mess_manufact',$query);
            if($query['type'] == 'success')
            {
                unset($_SESSION['path_file_upload']);
                redirect(base_url_admin().'advertise/listAdvertise');
            }else
            {
                $this->session->set_flashdata('mess_manufact',$query);
                $this->layoutCommon('edits',$data);
            }

        }
    }

    public function addAdvertise()
    {
        $this->author->check_login('users_id');                             // kiem tra dang nhap
        $submit_form = $this->input->post('submit_form');
        if(isset( $submit_form))
            $this->checkForm();                                             // kiem tra form nhap du lieu
        $data['title_page'] = "Thêm quảng cáo";
        $data['link_form_process'] = base_url_admin().'advertise/listAdvertise';
        $data['title_form'] = "Thông tin quảng cáo";
        $data['class_form'] = "advertise_info";
        $data['position_module'] = position_module();
        $data['back_home'] = $this->customOption('fa-list-alt','Danh sách','advertise/listAdvertise');
        if($this->form_validation->run($this) == false)
        {
            $this->layoutCommon('adds',$data);
        }else
        {
            $data_pre_form = $this->dataPreActionForm();                    // goi cac bien va truyen du lieu truoc khi them
            $this->m_advertise_info->field_check = array(
                'advertise_name' => $this->input->post('advertise_name')
            );
            $query = $this->m_advertise_info->insertRecord($data_pre_form);            // goi ham chen ban ghi , neu thanh cong --> bao
            $this->session->set_flashdata('mess_manufact',$query);
            if($query['type'] == 'success')
            {
                unset($_SESSION['path_file_upload']);
                redirect(base_url_admin().'advertise/listAdvertise');
            }else
            {
                $this->session->set_flashdata('mess_manufact',$query);
                $this->layoutCommon('adds',$data);
            }
        }

    }

    // danh sach user
    public function listAdvertise()
    {
        $this->author->check_login('users_id');
        // lay danh sach hien thi users group
        $get_advertise = $this->m_advertise_info->getAllArray('');
        $pre_generate_table = $this->createDataTable($get_advertise);    // chuyen du lieu da xu ly thanh dang mang roi truyen sang view

        // xu ly select action
        $btn_action = $this->input->post('btn_action');
        $list_action = $this->input->post('list_action');
        if(isset($btn_action))
        {
            if($list_action == 'delete')            // neu xoa
            {
                $id = $this->input->post('id');
                $status = $this->m_advertise_info->deleteRecord('advertise_id',$id);
                $this->session->set_flashdata('status_action',$status);
                if($status['type'] == 'success')
                    redirect(base_url_admin().'advertise/listAdvertise');
            }else if($list_action == 'publish')     // kich hoat
            {
                $id = $this->input->post('id');
                $data = array(
                    'advertise_active' => 1
                );
                $status = $this->m_advertise_info->updateRecordIn($id,$data,'advertise_id');
                $this->session->set_flashdata('status_action',$status);
                if($status['type'] == 'success')
                    redirect(base_url_admin().'advertise/listAdvertise');
            }else if($list_action == 'unpublish')   // khoa
            {
                $id = $this->input->post('id');
                $data = array(
                    'advertise_active' => 0
                );
                $status = $this->m_advertise_info->updateRecordIn($id,$data,'advertise_id');
                $this->session->set_flashdata('status_action',$status);
                if($status['type'] == 'success')
                    redirect(base_url_admin().'advertise/listAdvertise');

            }
        }
        // thong tin chung truyen sang view
        $this->generateTable($pre_generate_table);
        $data['option_add'] = $this->customOption('fa-plus','Thêm quảng cáo','advertise/addAdvertise');
        $data['title_page'] = "Quản lý quảng cáo";
        $data['title_table'] = "Danh sách quảng cáo";
        $data['link_form_process'] = base_url_admin().'advertise/listAdvertise';
        $this->layoutCommon('admin/layouts/tables',$data);
    }
    // xoa 1 ban ghi
    public function deleteOne($id)
    {
        $query = $this->m_advertise_info->deleteRecord('advertise_id',$id);
        $this->session->set_flashdata('mess_manufact',$query);
        redirect(base_url_admin().'advertise/listAdvertise');
    }
    // check form
    public function checkForm()
    {
        $this->form_validation->set_rules('advertise_name','Tiêu đề','required|min_length[4]|max_length[60]');
//        $this->form_validation->set_rules('advertise_path','Đường dẫn','required');
        $this->form_validation->set_message('required','%s không được để trống');
        $this->form_validation->set_message('min_length','%s phải có ít nhất %s ký tự');
        $this->form_validation->set_message('max_length','%s chỉ được tối đa %s ký tự');
    }
    // chuan bi du lieu khi thao tac them , sua
    public function dataPreActionForm()
    {
        $data_pre_action_form = array(
            'advertise_name' => $this->input->post('advertise_name'),
            'advertise_link' =>  $this->input->post('advertise_link'),
            'advertise_image' => $this->input->post('advertise_image'),
            'advertise_active' => $this->input->post('advertise_active'),
            'advertise_position' => $this->input->post('advertise_position')
        );
        return $data_pre_action_form;
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


    // gan cac du lieu xu ly tu du lieu lay duoc vao mot mang de gui sang view
    public function createDataTable($query)
    {
        $list_data_table = array();
        for($i = 0 ; $i < count($query);$i++)
        {
            $list_data_table[$i]['advertise_id'] =  $query[$i]['advertise_id'];
            if($query[$i]['advertise_active'] == 1)
                $list_data_table[$i]['advertise_active'] = "<button type='button' url='".base_url_admin()."advertise/changeStatus' class='btn btn-success btn-xs btn_change_status' id='".$query[$i]['advertise_id']."' status='".$query[$i]['advertise_active']."' >Kích hoạt</button>";
            else
                $list_data_table[$i]['advertise_active'] = "<button type='button' url='".base_url_admin()."advertise/changeStatus' class='btn btn-warning btn_change_status btn-xs'  id='".$query[$i]['advertise_id']."' status='".$query[$i]['advertise_active']."' >Bị khóa</button>";
            $list_data_table[$i]['advertise_name'] = $query[$i]['advertise_name'];
            $list_data_table[$i]['advertise_link'] = $query[$i]['advertise_link'];
            $list_data_table[$i]['advertise_image'] = "<img src='".base_url().$query[$i]['advertise_image']."' class='img_tab_post' />" ;
            $position_module = position_module();
            $list_data_table[$i]['advertise_position'] = $position_module[$query[$i]['advertise_position']];
        }
        return $list_data_table;
    }

    // ham gen nut action , ham nay gen ca bang du lieu gom , set heading (gen dong dau cua bang) , add_row them cac dong du lieu cho bang
    public function generateTable($data)
    {
        $this->table->set_heading(array('<input type="checkbox" name="" />',$this->m_advertise_info->advertise_image_alias,$this->m_advertise_info->advertise_name_alias,$this->m_advertise_info->advertise_link_alias,$this->m_advertise_info->advertise_position_alias,$this->m_advertise_info->advertise_active_alias,'Hành động'));
        foreach($data as $s_data)
        {
            if($_SESSION['list_permiss'][0]['users_group_view'] == 1)
                $view_detail_button = '<button  class="btn btn-info btn-xs viewDetail" link-ajax="'.base_url_admin().'advertise/viewDetail" id-send="'.$s_data['advertise_id'].'" type="button" data-target="#viewDetail" data-toggle="modal" > Chi tiết</button> ';
            else
                $view_detail_button = '';
            if($_SESSION['list_permiss'][0]['users_group_edit'] == 1)
                $edit_button = '<a href="'.base_url_admin().'advertise/editAdvertise/'.$s_data['advertise_id'].'"><button class="btn btn-warning btn-xs" type="button">Sửa</button></a> ';
            else
                $edit_button = "";
            if($_SESSION['list_permiss'][0]['users_group_delete_mem'])
                $delete_button ='<button link-id="'.base_url_admin().'advertise/deleteOne/'.$s_data['advertise_id'].'" name-del="'.$s_data['advertise_name'].'" class="btn_delOne btn btn-danger btn-xs " data-target="#confirmDelete" data-toggle="modal"  type="button">Xóa</button> ';
            else
                $delete_button="";
            $list_button = $view_detail_button.
                $edit_button.
                $delete_button;
            $this->table->add_row(array('<input type="checkbox" name="id[]" value="'.$s_data['advertise_id'].'"/>',  $s_data['advertise_image'],  $s_data['advertise_name'],$s_data['advertise_link'],$s_data['advertise_position'],$s_data['advertise_active'],$list_button));
        }
    }



}
?>