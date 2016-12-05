<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
/**
 * Created by PhpStorm.
 * User: tan
 * Date: 10/25/2015
 * Time: 10:26 AM
 */
class Authenticate
{
    public function check_login($session_user)
    {
        if(!isset( $_SESSION[$session_user]))
            redirect(base_url_admin().'dashboard/login','refresh');
        else
            return true;
    }
    public function check_permiss($type_permiss)
    {
        if(isset($_SESSION['list_permiss']))
        {
            $list_permiss = $_SESSION['list_permiss'][0];
            if($type_permiss == 'view'&& $list_permiss['users_group_view'] == 0)
                show_error('Tài khoản không có quyền truy cập',500);
            else
                return true;
        }
    }
}