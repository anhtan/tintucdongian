<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: tan
 * Date: 10/23/2015
 * Time: 10:54 AM
 */
class m_users extends MY_Model
{
    public $users_id;                   // ma user
    public $users_name;                 // ten thanh vien
    public $users_pass;                 // mat khau thanh vien
    public $users_fullname;             // ten day du thanh vien
    public $users_email;                // thu dien tu
    public $users_address;              // dia chi thanh vien
    public $users_group_id;             // ma quyen han cua thanh vien (truong nay khoa ngoai voi bang users group)
    public $users_active;               // trang thai cua thanh vien
    public $users_image;                // anh thanh vien
    public $users_created;              // ngay tao
    public $users_hint;                 // goi y mat khau

    public $users_alias_id = "Id";
    public $users_alias_name = "Tên thành viên";
    public $users_alias_pass = "Mật khẩu";
    public $users_alias_fullname = "Tên đầy đủ";
    public $users_alias_email = "Thư điện tử";
    public $users_alias_address = "Địa chỉ";
    public $users_alias_group_id = "Quyền hạn";
    public $users_alias_active = "Kích hoạt";
    public $users_alias_image = "Ảnh";
    public $users_alias_created = "Ngày tạo";
    public $users_alias_hint = "Gợi ý";



    function __construct()
    {
        parent::__construct();
        $this->tbl_name = 'users';                  // khai bao ten bang , truong tbl_name nam ben MY_Model (core)
    }


    // check rong form dang nhap
    public function checkNullLogin()
    {
        $mess_empty = array();
        if($this->users_name == "")
        {
            $mess_empty['users_name'] = "Tên tài khoản không được để trống";
        }
        if($this->users_pass == "")
        {
            $mess_empty['users_pass'] = "Mật khẩu không được để trống";
        }
        return $mess_empty;
    }

    // ham thuc hien login gom cac thao tac
    /*
    *   - Kiem tra ten nguoi dung co ton tai hay khong , khong --> thong bao
    *   - Truy van ten dang nhap , mat khau , trang thai , neu co ---> tao session roi chuyen trang
    */

    public function login()
    {
        $where_exist = array(
          'users_name' => $this->users_name
        );
        $this->getAll('*',$where_exist);
        $status_exist = $this->db->affected_rows();
        if($status_exist > 0 && $status_exist != "")
        {
            $where = array(
              'users_name'=>$this->users_name,
              'users_pass'=>$this->users_pass,
                'users_active' => 1
            );
            $query = $this->getAll('*',$where);
            $status = $this->countAllQuery('*',$where);
            if($status > 0 && $status != "")
            {
                $data_user = array(
                    'users_id' => $query[0]->users_id,
                    'users_group_id' => $query[0]->users_group_id,
                    'logged_in' => true
                );
                $this->session->set_userdata($data_user);
                return $this->createNotify('success','Đăng nhập thành công');
            }
            else
            {
                return $this->createNotify('error','Sai tên tài khoản hoặc mật khẩu');
            }
        }else
        {
            return $this->createNotify('error','Tài khoản không tồn tại');
        }
    }


    
}