<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: tan
 * Date: 10/24/2015
 * Time: 11:10 PM
 */
class m_modules extends MY_Model
{
    public $modules_id;
    public $modules_symbol;
    public $modules_name;
    public $modules_position;
    public $modules_path;
    public $modules_icon;
    public $modules_order;
    public $modules_status;
    public $modules_userid_create;
    public $modules_userid_update;
    public $modules_userid_delete;
    public $modules_create;
    public $modules_alias;
    public $modules_name_model;

    public $modules_alias_id = "Mã module";
    public $modules_alias_symbol = "Tên đại điện";
    public $modules_alias_name = "Tên module";
    public $modules_alias_position = "Vị trí";
    public $modules_alias_path = "Đường dẫn";
    public $modules_alias_icon = "Ảnh";
    public $modules_alias_order = "Thứ tự";
    public $modules_alias_status = "Trạng thái";
    public $modules_alias_userid_create = "Người tạo";
    public $modules_alias_userid_update = "Người sửa";
    public $modules_alias_userid_delete = "Người xóa";
    public $modules_alias_create = "Ngày tạo";
    public $modules_alias_alias = "Bí danh";
    public $modules_alias_name_model = "Tên model";


    public $tbl_name;


    function __construct()
    {
        parent::__construct();
        $this->tbl_name = 'modules';
    }



}