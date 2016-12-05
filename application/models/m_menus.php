<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: tan
 * Date: 10/24/2015
 * Time: 11:10 PM
 */
class m_menus extends MY_Model
{
    public $menu_id;                // ma menu 
    public $menu_name;              // ten menu
    public $menu_path;              // duong dan menu
    public $menu_parent;            // menu cha
    public $menu_active;            // trang thai menu
    public $menu_icon;              // icon menu 
    public $menu_has_child;         // menu nay co danh mục con hay khong , truong nay de hien thi danh muc con
    public $menu_display;           // luu id cac quyen duoc thay menu
    public $tbl_name;

    // khai bao mang cot de goi ben bang
    public $menu_alias_id;
    public $menu_alias_name;
    public $menu_alias_path;
    public $menu_alias_parent;
    public $menu_alias_active;
    public $menu_alias_icon;
    public $menu_alias_has_child;
    public $menu_alias_display;

    function __construct()
    {
        parent::__construct();
        $this->tbl_name = 'menus';
    }
    

    
}