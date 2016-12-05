<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class m_menu_client extends MY_Model
{
    // truong du lieu
    public $menu_client_id;
	public $menu_client_name;
	public $menu_client_alias;
	public $menu_client_path;
	public $menu_client_status;
	public $menu_client_parent;
	public $menu_client_order;

    public $tbl_name;

    // ten hien thi
    public $menu_client_id_alias='Mã';
	public $menu_client_name_alias='Tên menu';
	public $menu_client_alias_alias='Bí danh';
	public $menu_client_path_alias='Đường dẫn';
	public $menu_client_status_alias='Trạng thái';
	public $menu_client_parent_alias='Menu cha';
	public $menu_client_order_alias='Thứ tự';

    function __construct()
    {
        parent::__construct();
        $this->tbl_name = 'menu_client';
    }

}
?>