<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class m_site extends MY_Model
{
    // truong du lieu
    public $site_id;
	public $site_name;
	public $site_link;
	public $site_type;
	public $site_status;
	
    public $tbl_name;

    // ten hien thi
    public $site_id_alias='Mã';
	public $site_name_alias='Tên site';
	public $site_link_alias='Đường dẫn';
	public $site_type_alias='Loại site';
	public $site_status_alias='Trạng thái';
	
    function __construct()
    {
        parent::__construct();
        $this->tbl_name = 'site';
    }

}
?>