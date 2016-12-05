<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class m_article_category extends MY_Model
{
    public $article_category_id;            // ma danh muc tin
    public $article_category_name;          // ten danh muc tin
    public $article_category_alias;         // bi danh
    public $article_category_image;         // anh
    public $article_category_active;        // kich hoat
    public $article_category_parent_id;     // danh muc cha

    public $article_alias_category_id;            // ma danh muc tin
    public $article_alias_category_name;          // ten danh muc tin
    public $article_alias_category_alias;         // bi danh
    public $article_alias_category_image;         // anh
    public $article_alias_category_active;        // kich hoat
    public $article_alias_category_parent_id;     // danh muc cha


    function __construct()
    {
        parent::__construct();
        $this->tbl_name = 'article_category';
    }



    
}