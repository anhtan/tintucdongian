<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Post extends MY_Controller
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
    
    public function postDetail($category,$post)
    {
        $where_category = array(
          'article_category_alias' => $category
        );
        $get_category = $this->article_category_info->getAll('*',$where_category);
        $where_article = array(
          'article_alias' => $post
        );
        $get_article = $this->article_info->getAll('*',$where_article);
        $where_relation = array(
            'article_category_id' => $get_category[0]->article_category_id,
            'article_id !=' => $get_article[0]->article_id
        );
        $get_ralation = $this->article_info->getAll('*',$where_relation);
        $data['category_info'] = $get_category;
        $data['article_info'] = $get_article;
        $data['article_relation'] = $get_ralation;

        $this->layoutClient('client/post/details',$data);
    }
}