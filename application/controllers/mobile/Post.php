<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Post extends MY_Controller
{
    public $article_info;
    public $article_category_info;
    function __construct()
    {
        parent::__construct();
        // load model m_article
        $this->load->model('m_article');
        $this->article_info = new m_article();
        // load model m_article_category
        $this->load->model('m_article_category');
        $this->article_category_info = new m_article_category();
        $this->output->cache(5);

    }
    
    public function detail($alias_category,$alias_post)
    {
        $where_category = array(
            'article_category_alias' => $alias_category
        );
        $get_category_info = $this->article_category_info->getAll('*',$where_category);
        $where_article = array(
          'article_alias' => $alias_post
        );
        $get_article_info = $this->article_info->getAll('*',$where_article);
        $where_relation = array(
            'article_alias!=' => $alias_post,
            'article_category_id' => $get_category_info[0]->article_category_id
        );
        $get_relation = $this->article_info->getAll('*',$where_relation);
        $data['article_info'] = $get_article_info;
        $data['article_category_info'] = $get_category_info;
        $data['article_relation'] = $get_relation;
        $this->layoutMobile('mobile/post/detail',$data);
    }
}