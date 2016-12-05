<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
/**
 * Created by PhpStorm.
 * User: tan
 * Date: 10/26/2015
 * Time: 9:55 AM
 */
class m_users_group extends MY_Model
{
    public $users_group_id;                 // ma quyen han
    public $users_group_name;               //ten quyen han
    public $users_group_view;               // quyen xem 
    public $users_group_add;                // quyen them
    public $users_group_edit;               // quyen sua
    public $users_group_delete;             // quyen xoa
    public $users_group_delete_mem;         // quyen xoa thanh vien
    public $tbl_name;                       // ten bang
    function __construct()
    {
        parent::__construct();
        $this->tbl_name = 'users_group';        // ten bang 
    }


    
}