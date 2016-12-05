<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: tan
 * Date: 10/23/2015
 * Time: 10:54 AM
 */
class m_article extends MY_Model
{
    public $article_id;                   // ma user
    public $article_title;                 // ten thanh vien
    public $article_alias;                 // bi danh
    public $article_content;             // noi dung
    public $article_image;                // anh bai viet
    public $article_category_id;              // danh muc bai viet
    public $article_title_tag;             // the tag
    public $article_active;               // trang thai cua thanh vien
    public $article_userid_create;                //  thanh vien tao
    public $article_userid_update;                //  thanh vien cap nhat
    public $article_userid_delete;                // thanh vien xoa
    public $article_summary;                // tom tat bai viet

    public $article_alias_id;                   // ma user
    public $article_alias_title;                 // ten thanh vien
    public $article_alias_alias;                 // mat khau thanh vien
    public $article_alias_content;             // ten day du thanh vien
    public $article_alias_image;                // thu dien tu
    public $article_alias_category_id;              // dia chi thanh vien
    public $article_alias_title_tag;             // ma quyen han cua thanh vien (truong nay khoa ngoai voi bang article_alias group)
    public $article_alias_active;               // trang thai cua thanh vien
    public $article_alias_userid_create;                //  thanh vien tao
    public $article_alias_userid_update;                //  thanh vien cap nhat
    public $article_alias_userid_delete;                // thanh vien xoa
    public $article_alias_summary;                // tom tat bai viet




    function __construct()
    {
        parent::__construct();
        $this->tbl_name = 'article';                  // khai bao ten bang , truong tbl_name nam ben MY_Model (core)
    }




    
}