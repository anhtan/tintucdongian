<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Category extends MY_Controller
{
    public $article_info;
    public $article_category_info;
    function __construct()
    {
        parent::__construct();
        $this->article_info = new m_article();
        $this->article_category_info = new m_article_category();
        $this->output->cache(5);
    }

    public function listCategory($alias,$num=1)
    {
        // lay id category theo alias
        $where_category = array(
          'article_category_alias' => $alias
        );
        $get_category_article = $this->article_category_info->getAll('*',$where_category);
        $where_menu = array(
          'menu_client_alias' => $alias
        );
        $get_menu_client = $this->menu_client_info->getAll('*',$where_menu);
        // lay bai viet theo category id
        $where_article = array(
          'article_category_id' => $get_category_article[0]->article_category_id
        );
        $per_page = 6;
        $per_row = ($num -1)*$per_page;
        $get_list_article = $this->article_info->getAll('*',$where_article,$per_row,$per_page);
        $total_row = $this->article_info->countAllQuery('*',$where_article);
        /*-------phan trang ----------*/
        $config = frontend_pagination($total_row,$per_page,base_url().$get_menu_client[0]->menu_client_path);
        $this->pagination->initialize($config);
        $data['list_article_by_category'] = $get_list_article;
        $this->layoutClient('client/category/list',$data);
    }
    

    
}