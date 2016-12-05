<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class m_route extends MY_Model
{
    // truong du lieu
    public $route_id;
	public $route_name;
	public $route_old;
	public $route_new;
	public $route_type;
	public $route_status;
	public $route_object;

    public $tbl_name;

    // ten hien thi
    public $route_id_alias='Mã';
	public $route_name_alias='Tên route';
	public $route_old_alias='Đường dẫn gốc';
	public $route_new_alias='Đường dẫn mới';
	public $route_type_alias='Loại route';
	public $route_status_alias='Trạng thái';
	public $route_object_alias='Đối tượng route';

    function __construct()
    {
        parent::__construct();
        $this->tbl_name = 'route';
    }

}
?>