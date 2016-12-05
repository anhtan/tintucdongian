<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: tan
 * Date: 10/23/2015
 * Time: 1:09 PM
 */
/* load the MX_Router class */
require APPPATH."third_party/MX/Controller.php";
class MY_Controller extends MX_Controller
{
    public $menu;
    public $user_info;
    public $module_info;
    public $menu_client_info;
    public $user_group_info;
    public $author;
    public $list_permiss;
    public $advertise_info;
    function __construct()
    {
        parent::__construct();
        $this->user_info = new m_users();                   // goi model users
        $this->menu_info = new m_menus();                   // goi model menu
        $this->user_group_info = new m_users_group();       // goi model users group (quyen han)
        $this->load->library('pagination');                 // load thu vien phan trang
        $this->load->library('Authenticate');               // load thu vien xac thuc
        $this->load->library('table');                      // loat thu vien danh cho bang
        // load model module
        $this->load->model('blocks/m_modules');
        $this->module_info = new m_modules();
        // load model menu client
        $this->load->model('navigation/m_menu_client');
        $this->menu_client_info = new m_menu_client();
        // load model menu advertise
        $this->load->model('advertise/m_advertise');
        $this->advertise_info = new m_advertise();
        // kiem tra session quyen han tai khoan
        if(isset ($_SESSION['users_group_id']))
        {
            $this->menu =  $this->menu_info->getAllLike('*','1=1','menu_display',$_SESSION['users_group_id']);      // lay menu
            $where_permiss = array(
              'users_group_id' => $_SESSION['users_group_id']
            );
            // lay cac quyen thuc hien action gan vao session
            $_SESSION['list_permiss'] = $this->user_group_info->getAllArray('*',$where_permiss);
        }
        $this->author = new Authenticate();
    }

    // load cac layout chung (admin)
    public function layoutCommon($url,$data='')
    {
        $data['list_menu'] = $this->menu;
        $this->load->view('admin/layouts/head_admin',$data);
        $this->load->view('admin/layouts/menu_left_admin',$data);
        $this->load->view($url,$data);
        $this->load->view('admin/layouts/foot_admin',$data);
    }

    /*--------------------check form---------------------------*/

    // ham check select duoc chon hay chua , neu chua duoc chon se thong bao
    public function checkSelectDefault($post_string)
    {
        if($post_string == '0')
            return false;
        else
            return true;
    }

    /*
     * p+ : chuoi chua it nhat 1 ky tu p
     * p* : chuoi chua 0 den nhieu hon p
     * p$ : khop voi chuoi co p o cuoi
     * ^p : khop voi chuoi co p o dau
     * */
    public function checkName($post_string)
    {
        $regular_string = '/^\w+$/';
        if(preg_match($regular_string,$post_string))
            return true;
        else
            return false;
    }
    public function checkPass($post_string)
    {
        $regular_string = '/^\w+$/';
        if(preg_match($regular_string,$post_string))
            return true;
        else
            return false;
    }
    public function checkFullName($post_string)
    {
        $regular_string = '/^[a-zA-Z0-9\s]+$/';
        if(preg_match($regular_string,$post_string))
            return true;
        else
            return false;
    }

    public function checkMatchPass($string_patern,$post_string)
    {
        if($post_string == $string_patern)
            return true;
        else
            return false;
    }


    public function deleteDir($dirPath) {
        if (! is_dir($dirPath)) {
            throw new InvalidArgumentException("$dirPath must be a directory");
            return false;
        }else
        {
            if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
                $dirPath .= '/';
            }
            $files = glob($dirPath . '*', GLOB_MARK);
            foreach ($files as $file) {
                if (is_dir($file)) {
                    self::deleteDir($file);
                } else {
                    unlink($file);
                }
            }
            rmdir($dirPath);
            return true;
        }
    }

    public function replace_in_file($FilePath, $OldText, $NewText)
    {
        $Result = array('status' => 'error', 'message' => '');
        if(file_exists($FilePath)===TRUE)
        {
            if(is_writeable($FilePath))
            {
                try
                {
                    $FileContent = file_get_contents($FilePath);
                    $FileContent = str_replace($OldText, $NewText, $FileContent);
                    if(file_put_contents($FilePath, $FileContent) > 0)
                    {
                        $Result["status"] = 'success';
                    }
                    else
                    {
                        $Result["message"] = 'Error while writing file';
                    }
                }
                catch(Exception $e)
                {
                    $Result["message"] = 'Error : '.$e;
                }
            }
            else
            {
                $Result["message"] = 'File '.$FilePath.' is not writable !';
            }
        }
        else
        {
            $Result["message"] = 'File '.$FilePath.' does not exist !';
        }
        return $Result;
    }



    public function removeElementArray($element,$array_partern)
    {
        if(is_array($element))
        {
            foreach($array_partern as $key=>$value)
            {
                foreach($element as $s_element)
                {
                    if($s_element == $key)
                    {
                        unset($array_partern[$key]);
                    }
                }
            }
        }else
        {
            if(($key = array_search($element,$array_partern)) != false)
            {
                unset($array_partern[$key]);
            }
        }
        return $array_partern;
    }
   /*------------------------Phan client------------------*/
    // load layout client
    public function layoutClient($url_view,$data='',$type_page=0)
    {
        $data['mod_info'] = $this->module_info->getAll();               // lay tat ca cac module
        $where = array(
            'menu_client_status' => 1,
            'menu_client_parent' => 0
        );
        $where_sub = array(
            'menu_client_parent !=' => 0
        );
        $where_diendan = array(
            'article_category_id' => 14
        );
        $get_all_diendan = $this->article_info->getAll('*',$where_diendan);                             // lay tat ca bai viet muc dien dan tri thuc
        $get_all_menu = $this->menu_client_info->getAllOrder('*',$where,'menu_client_order','asc');    // lay menu cha
        $get_all_sub_menu = $this->menu_client_info->getAll('*',$where_sub);                    // lay menu con
        $get_all_category_article = $this->article_category_info->getAll();                     // lay danh muc bai viet
        $get_all_article = $this->article_info->getAll();                                       // lay tat ca bai viet
        // lay danh sach quang cao
        $where_advertise = array(
            'advertise_active' => 1
        );
        $data['list_advertise'] = $this->advertise_info->getAll('*',$where_advertise);
//        echo "<pre>"; print_r($data['list_advertise']);  echo "</pre>";

        $data['list_article'] = $get_all_article ;                      // lay list menu
        $data['list_category_article'] = $get_all_category_article ;                      // lay list menu
        $data['list_navigation'] = $get_all_menu ;                      // lay list menu
        $data['list_sub_navigation'] = $get_all_sub_menu ;                      // lay list menu
        $data['list_article_order'] = $this->article_info->getAllOrder('*','1=1','article_id','DESC') ;                      // lay list menu
        $data['list_article_random'] = $this->article_info->getAllOrder('*','1=1','article_id','RANDOM') ;                      // lay list menu
        $data['list_article_diendan'] = $get_all_diendan ;                      // lay list menu
        $this->load->view('client/layouts/head_client',$data);
        $this->load->view($url_view,$data);
        $this->load->view('client/layouts/midle',$data);
        if($type_page !=0)
            $this->load->view('client/layouts/content_foot',$data);
        $this->load->view('client/layouts/footer_client',$data);
    }

    /*-------------------layout mobile -------------*/
    public function layoutMobile($url,$data)
    {
        $where = array(
            'menu_client_status' => 1,
            'menu_client_parent' => 0
        );
        $where_category = array(
          'article_category_active'=>1
        );
        $get_all_category_article = $this->article_category_info->getAll('*',$where_category);                     // lay danh muc bai viet
        $get_all_menu = $this->menu_client_info->getAllOrder('*',$where,'menu_client_order','asc');    // lay menu cha
        $data['list_category_article'] = $get_all_category_article ;                      // lay list menu
        $data['list_navigation'] = $get_all_menu ;                      // lay list menu
        $this->load->view('mobile/layouts/head_mobile',$data);
        $this->load->view('mobile/layouts/menu_mobile',$data);
        $this->load->view($url,$data);
        $this->load->view('mobile/layouts/footer_mobile',$data);
    }


}
