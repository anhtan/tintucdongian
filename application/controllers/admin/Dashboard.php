<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: tan
 * Date: 10/23/2015
 * Time: 9:50 AM
 */
class Dashboard extends MY_Controller
{
    public $config_info;
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_configs');
        $this->config_info = new m_configs();
    }


    public function login()
    {
        $btn_login =$this->input->post('btn_login');
        if(isset($btn_login))
        {
            /*-------check form----------*/
            $config = array(
              array(
                    'field' => 'users_name',
                    'rules' => 'required',
                    'errors' => array(
                        'required' => 'Tên đăng nhập không được để trống'
                    )
              ),
                array(
                    'field' => 'users_pass',
                    'rules' => 'required',
                    'errors' => array(
                        'required' => 'Mật khẩu không được để trống'
                    )
                )
            );
            $this->user_info->users_name = $this->input->post('users_name');
            $this->user_info->users_pass = md5( $this->input->post('users_pass'));
            $error = $this->user_info->login();
            $this->form_validation->set_rules(@$config);
            if($this->form_validation->run() == true )
            {
                if($error['type'] == 'error')
                    $data['error_mess'] = @$error['mess'];
                else
                    redirect(base_url_admin().'dashboard/display');
            }
        }
        $this->load->view('admin/layouts/login',@$data);
    }

    public function display()
    {
       $this->author->check_login('users_id');
       $session_user_id = $this->session->userdata('users_id');
       /*------link cac muc------*/
       $where = array( 'users_id' => $session_user_id);
       $condition_join = 'users.users_group_id = users_group.users_group_id';
       $this->user_info->tbl_name_join = 'users_group';
       $info_user = $this->user_info->getAllJoin('*',$where,$condition_join,'left');
       /*-------lay thong tin menu -----------*/
       $_SESSION['permiss'] = $info_user[0]->users_group_name;
       $_SESSION['users_name'] = $info_user[0]->users_name;
       $data['list_menu'] = $this->menu;
       $data['title_dashboard'] = "Tổng quan";
       $data['link_menu_1'] = 'article/listArticle';
       $data['link_menu_2'] = 'users/listUser';
       $data['link_menu_3'] = 'articlecategory/listArticleCategory';
       $data['link_menu_4'] = 'menus/listMenu';
       $this->layoutCommon('admin/layouts/display',$data);
    }

    public function configSystem()
    {
        $where_config = array(
          'config_id' => 1
        );
        $btn_config= $this->input->post('submit_form');
        if(isset($btn_config))
        {
            $data_update = $this->dataPreActionForm();
            $query = $this->config_info->updateNormal(1,$data_update,'config_id');
            $this->session->set_flashdata('config_system',$query);
        }
        $get_all_config = $this->config_info->getAll('*',$where_config);
        $data['config_info'] = $get_all_config;
        $data['obj_config'] = $this->config_info;
        $data['title_page'] = "Chỉnh sửa cấu hình hệ thống";
        $data['title_form'] = "Thông tin cấu hình";
        $this->layoutCommon('admin/layouts/configs',$data);
    }

    // chuan bi du lieu khi thao tac them , sua
    public function dataPreActionForm()
    {
        $data_pre_action_form = array(
            'config_name' => $this->input->post('config_name'),
            'config_address' => $this->input->post('config_address'),
            'config_phone' => $this->input->post('config_phone'),
            'config_fax' => $this->input->post('config_fax'),
            'config_email_send' => $this->input->post('config_email_send'),
            'config_email_receive' => $this->input->post('config_email_receive'),
            'config_website' => $this->input->post('config_website'),
            'config_banner' => $this->input->post('config_banner'),
            'config_title' => $this->input->post('config_title'),
            'config_meta_title' => $this->input->post('config_meta_title'),
            'config_meta_description' => $this->input->post('config_meta_description'),
            'config_meta_content' => $this->input->post('config_meta_content'),
            'config_meta_author' => $this->input->post('config_meta_author'),
            'config_status_website' => $this->input->post('config_status_website'),
            'config_temp_close' => $this->input->post('config_temp_close'),
            'config_instroduce' => $this->input->post('config_instroduce'),
            'config_rule_register' => $this->input->post('config_rule_register')
        );
        return $data_pre_action_form;
    }


    public function logOut()
    {
        unset($_SESSION['users_id']);
        unset($_SESSION['permiss']);
        unset($_SESSION['users_name']);
        redirect(base_url_admin().'dashboard/login');
    }

}