<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
class Tag extends MY_Controller
{
    public $article_info;
    public $article_category_info;
    function __construct()
    {
        parent::__construct();
        $this->article_info = new m_article();
        $this->article_category_info = new m_article_category();
    }
    
    public function display()
    {

        $data['title_tag'] = $this->input->post('title_tag');
        $this->layoutClient('client/tag/tags',$data);
    }
}