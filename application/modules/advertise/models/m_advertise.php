<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class m_advertise extends MY_Model
{
    // truong du lieu
    public $advertise_id;
    public $advertise_name;
    public $advertise_link;
    public $advertise_image;
    public $advertise_active;
    public $advertise_position;


    public $tbl_name;

    // ten hien thi
    public $advertise_id_alias = "Mã";
    public $advertise_name_alias = "Tên hiển thị";
    public $advertise_link_alias = "Đường dẫn ";
    public $advertise_image_alias = "Ảnh ";
    public $advertise_active_alias = "Trạng thái";
    public $advertise_position_alias = "Vị trí";

    function __construct()
    {
        parent::__construct();
        $this->tbl_name = 'advertise';
    }

}
?>