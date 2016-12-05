<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Category extends MY_Controller
{
    public $article_category_info;
    public $article_info;
    function __construct()
    {
        parent::__construct();
        // load model m_article_category
        $this->load->model('m_article_category');
        $this->article_category_info = new m_article_category();
        // load model m_article
        $this->load->model('m_article');
        $this->article_info = new m_article();
        $this->output->cache(5);

    }
    
    public function listCategory($alias_category,$page=1)
    {
        $where_category = array(
          'article_category_alias' => $alias_category
        );
        $get_info_category = $this->article_category_info->getAll('*',$where_category);
        $where_article = array(
          'article_category_id' => $get_info_category[0]->article_category_id,
            'article_active' => 1
        );
        /*----------phan trang------------*/

        $where_count = array(
            'article_active' => 1,
            'article_category_id' => $get_info_category[0]->article_category_id
        );
        $count_total_row = $this->article_info->countAllQuery('*',$where_count);
        $per_page = 10;
        $per_row = ($page -1)*$per_page;
        $total_page = ceil((int)$count_total_row%(int)$per_page);
        if($page < $total_page)
            $page = $page;
        else
            $page  = 1;

        $get_all_article = $this->article_info->getAllOrder('*',$where_article,'article_id','DESC',$per_row,$per_page);
        $data['next_page'] = ($page+1);
        $data['list_article_by_category'] = $get_all_article;
        $data['article_category_info'] = $get_info_category;
        $this->layoutMobile('mobile/category/lists',$data);
    }
}