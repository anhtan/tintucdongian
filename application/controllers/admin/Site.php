<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Site extends MY_Controller
{
//    public $upload_info ;
      public $m_site_info;
      function __construct()
      {
        parent::__construct();
//      $this->load->library('UploadFile');
//      $this->upload_info = new UploadFile();
        $this->load->model('m_site');
        $this->m_site_info = new m_site();
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
          if($status == 0)
          {
              $status = 1;
          }else
          {
              $status = 0;
          }
          $data_update = array(
              'site_status' => $status
          );
          $this->m_site_info->updateNormal($id,$data_update,'site_id');
      }

      // xem chi tiet
      public function viewDetail()
      {
          $id = $this->input->post('id');
          if(isset($id))
          {
              $where = array(
                  'site_id' => $id
              );
              $get_all_site = $this->m_site_info->getAllArray('*',$where);
              $position_module = position_module();
          }
          $data['position_module'] = $position_module;
          $data['info_all'] = $get_all_site;
          $data['type_site'] = type_site();
          $this->load->view('admin/site/views',$data);
      }
          // sua
      public function editSite($id)
      {
          $this->author->check_login('users_id');
          $submit_form = $this->input->post('submit_form');
          if(isset( $submit_form))
              $this->checkForm();
          $where = array(
              'site_id' => $id
          );
          $data['position_module'] = position_module();
          $data['update_info'] = $this->m_site_info->getAll('*',$where);
          $obj_back_home = array(
             array(
                 'path_menu' => 'site/listSite',
                 'icon' => 'fa-list-alt',
                 'name_button' => 'Danh sách'
             )
          );
          $data['back_home'] = $this->customOption(2,$obj_back_home);
          $data['type_site'] = type_site();
          $data['class_form'] = "site_info";
          $data['title_page'] = "Sửa site";
          $data['title_form'] = "Thông tin site";
          if($this->form_validation->run($this) == false)
          {
              $this->layoutCommon('admin/site/edits',$data);
          }else
          {
              $data_pre_form = $this->dataPreActionForm();
              $this->m_site_info->field_check = array(
                  'site_name' => $this->input->post('site_name'),
                  'site_id !=' => $this->input->post('site_id')
               );
               $query = $this->m_site_info->updateRecord($id,$data_pre_form,'site_id');     // cap nhat du lieu
               $this->session->set_flashdata('mess_manufact',$query);
               if($query['type'] == 'success')
               {
                   unset($_SESSION['path_file_upload']);
                   redirect(base_url_admin().'site/listSite');
               }else
               {
                   $this->session->set_flashdata('mess_manufact',$query);
                   $this->layoutCommon('admin/site/edits',$data);
               }
            }
      }
      public function addSite()
      {
          $this->author->check_login('users_id');                             // kiem tra dang nhap
          $submit_form = $this->input->post('submit_form');
          if(isset( $submit_form))
              $this->checkForm();                                             // kiem tra form nhap du lieu
          $data['title_page'] = "Thêm site";
          $data['link_form_process'] = base_url_admin().'site/listSite';
          $data['title_form'] = "Thông tin quảng cáo";
          $data['class_form'] = "site_info";
          $data['position_module'] = position_module();
          $data['type_site'] = type_site();
          $obj_back_home = array(
             array(
                 'path_menu' => 'site/listSite',
                 'icon' => 'fa-list-alt',
                 'name_button' => 'Danh sách'
             )
          );
          $data['back_home'] = $this->customOption(2,$obj_back_home);
          if($this->form_validation->run($this) == false)
          {
              $this->layoutCommon('admin/site/adds',$data);
          }else
          {
              $data_pre_form = $this->dataPreActionForm();                    // goi cac bien va truyen du lieu truoc khi them
              $this->m_site_info->field_check = array(
                  'site_name' => $this->input->post('site_name')
              );
              $query = $this->m_site_info->insertRecord($data_pre_form);            // goi ham chen ban ghi , neu thanh cong --> bao
              $this->session->set_flashdata('mess_manufact',$query);
              if($query['type'] == 'success')
              {
                  redirect(base_url_admin().'site/listSite');
              }else
              {
                  $this->session->set_flashdata('mess_manufact',$query);
                  $this->layoutCommon('admin/site/adds',$data);
              }
          }

      }

      // danh sach m_site
      public function listSite()
      {
          $this->author->check_login('users_id');
          // lay danh sach hien thi m_site
          $get_site = $this->m_site_info->getAllArray('');
          $pre_generate_table = $this->createDataTable($get_site);    // chuyen du lieu da xu ly thanh dang mang roi truyen sang view

          // xu ly select action
          $btn_action = $this->input->post('btn_action');
          $list_action = $this->input->post('list_action');
          if(isset($btn_action))
          {
              if($list_action == 'delete')            // neu xoa
              {
                  $id = $this->input->post('id');
                  $status = $this->m_site_info->deleteRecord('site_id',$id);
                  $this->session->set_flashdata('status_action',$status);
                  if($status['type'] == 'success')
                      redirect(base_url_admin().'site/listSite');
              }else if($list_action == 'publish')     // kich hoat
              {
                  $id = $this->input->post('id');
                  $data = array(
                      'site_status' => 1
                  );
                  $status = $this->m_site_info->updateRecordIn($id,$data,'site_id');
                  $this->session->set_flashdata('status_action',$status);
                  if($status['type'] == 'success')
                      redirect(base_url_admin().'site/listSite');
              }else if($list_action == 'unpublish')   // khoa
              {
                  $id = $this->input->post('id');
                  $data = array(
                      'site_status' => 0
                  );
                  $status = $this->m_site_info->updateRecordIn($id,$data,'site_id');
                  $this->session->set_flashdata('status_action',$status);
                  if($status['type'] == 'success')
                      redirect(base_url_admin().'site/listSite');

              }
          }
          // thong tin chung truyen sang view
          $this->generateTable($pre_generate_table);
          $data['title_page'] = "Quản lý site";
          $data['title_table'] = "Danh sách site";
          $data['link_form_process'] = base_url_admin().'site/listSite';
          $this->layoutCommon('admin/layouts/tables',$data);
      }
      // xoa 1 ban ghi
      public function deleteOne($id)
      {
          $query = $this->m_site_info->deleteRecord('site_id',$id);
          $this->session->set_flashdata('mess_manufact',$query);
          redirect(base_url_admin().'site/listSite');
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
        $this->form_validation->set_rules('site_name','Tiêu đề','required|min_length[4]|max_length[60]');
//        $this->form_validation->set_rules('site_path','Đường dẫn','required');
          $this->form_validation->set_message('required','%s không được để trống');
          $this->form_validation->set_message('min_length','%s phải có ít nhất %s ký tự');
          $this->form_validation->set_message('max_length','%s chỉ được tối đa %s ký tự');
      }


      // chuan bi du lieu khi thao tac them , sua
      public function dataPreActionForm()
      {
        $data_pre["site_name"] = $this->input->post("site_name");
        $data_pre["site_type"] = $this->input->post("site_type");
        $data_pre["site_link"] = $this->input->post("site_link");
        $data_pre["site_status"] = $this->input->post("site_status");

          return $data_pre;
      }


      public function createDataTable($query)
      {
          $list_data_table = array();
          foreach($query as $key=>$value)
          {
              foreach($value as $key_sub=>$value_sub)
              {
                  if(strpos($key_sub,'_id'))
                      $id = $value_sub;
                  if(strpos($key_sub, '_status'))
                  {

                      if($value_sub == 1)
                          $list_data_table[$key][$key_sub] = "<button type='button' url='".base_url_admin()."site/changeStatus' class='btn btn-success btn-xs btn_change_status' id='".$id."' status='".$value_sub."' >Kích hoạt</button>";
                      else
                          $list_data_table[$key][$key_sub] = "<button type='button' url='".base_url_admin()."site/changeStatus' class='btn btn-warning btn-xs btn_change_status' id='".$id."' status='".$value_sub."' >Bị khóa</button>";
                  }if(strpos($key_sub,'_name'))
                  {

                      $list_data_table[$key]['site_name'] = "<a href='".$value['site_link']."'>".$value_sub."</a>";
                  }
                  else
                      $list_data_table[$key][$key_sub] = $value_sub;


              }
          }
          return $list_data_table;
      }

      public function generateTable($data)
      {
          $this->table->set_heading(array('<input type="checkbox" name="" />','Mã','Tên site','Đường dẫn','Trạng thái','Hành động'));
          foreach($data as $s_data)
          {
              if($_SESSION['list_permiss'][0]['users_group_view'] == 1)
                  $view_detail_button = '<button  class="btn btn-info btn-xs viewDetail" link-ajax="'.base_url_admin().'site/viewDetail" id-send="'.$s_data['site_id'].'" type="button" data-target="#viewDetail" data-toggle="modal" > Chi tiết</button> ';
              else
                  $view_detail_button = '';
              if($_SESSION['list_permiss'][0]['users_group_edit'] == 1)
                  $edit_button = '<a href="'.base_url_admin().'site/editSite/'.$s_data['site_id'].'"><button class="btn btn-warning btn-xs" type="button">Sửa</button></a> ';
              else
                  $edit_button = "";
              if($_SESSION['list_permiss'][0]['users_group_delete_mem'])
                  $delete_button ='<button link-id="'.base_url_admin().'site/deleteOne/'.$s_data['site_id'].'" name-del="'.$s_data['site_name'].'" class="btn_delOne btn btn-danger btn-xs " data-target="#confirmDelete" data-toggle="modal"  type="button">Xóa</button> ';
              else
                  $delete_button="";
              $list_button = $view_detail_button.
                  $edit_button.
                  $delete_button;
              $this->table->add_row(array('<input type="checkbox" name="id[]" value="'.$s_data['site_id'].'"/>',$s_data["site_id"],$s_data["site_name"],$s_data["site_link"],$s_data["site_status"]  ,$list_button));
          }
      }



}
?>