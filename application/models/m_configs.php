<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: tan
 * Date: 10/23/2015
 * Time: 10:54 AM
 */
class m_configs extends MY_Model
{

    public $config_id;
    public $config_name;
    public $config_address;
    public $config_phone;
    public $config_fax;
    public $config_email_send;
    public $config_email_receive;
    public $config_website;
    public $config_banner;
    public $config_title;
    public $config_meta_title;
    public $config_meta_description;
    public $config_meta_content;
    public $config_meta_author;
    public $config_status_website;
    public $config_temp_close;
    public $config_instroduce;
    public $config_rule_register;

    public $config_alias_id="Mã";                // mã
    public $config_alias_name="Tên tổ chức";              // Tên đơn vị
    public $config_alias_address="Địa chỉ ";           // địa chỉ đơn vị
    public $config_alias_phone="Điện thoại";             // điện thoại
    public $config_alias_fax="Fax ";               // fax
    public $config_alias_email_send = "Hòm thư gửi tin";        // mail nhận
    public $config_alias_email_receive = "Hòm thư nhận tin ";     // mail gui
    public $config_alias_website="Tên website ";           // tên website
    public $config_alias_banner="Banner";            // banner
    public $config_alias_title="Tiêu đề";             //tiêu đề website
    public $config_alias_meta_title="Tiêu đề meta ";        // tiêu đề thẻ meta
    public $config_alias_meta_description="Thẻ description";  // miêu tả meta
    public $config_alias_meta_content="Nội dung ";      // noi dung thẻ meta
    public $config_alias_meta_author="Tác giả";       // tác giả
    public $config_alias_status_website="Trạng thái";     // trạng thái website
    public $config_alias_temp_close="Thông báo tạm đóng website";        // thông báo tạm đóng
    public $config_alias_instroduce="Hướng dẫn";        // huong dan
    public $config_alias_rule_register="Quy định tham gia";     // quy dinh dang ky


    function __construct()
    {
        parent::__construct();
        $this->tbl_name = 'config';                  // khai bao ten bang , truong tbl_name nam ben MY_Model (core)
    }



}