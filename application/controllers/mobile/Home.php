<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends MY_Controller
{
    public $mod_navigation;
    public $module_info;
    public $article_info;
    public $article_category_info;

    function __construct()
    {
        parent::__construct();
        // load model article
        $this->load->model('m_article');
        $this->article_info = new m_article();
        // load model article category
        $this->load->model('m_article_category');
        $this->article_category_info = new m_article_category();
        $this->output->cache(5);

    }

    public function display()
    {
        $where_all_article = array(
            'article_active' => 1
        );
        $get_all_article = $this->article_info->getAllOrderArray('*',$where_all_article,'article_id','DESC');        // get bai viet moi nhat
        $get_all_article_read = $this->article_info->getAllOrder('*',$where_all_article,'article_id','RANDOM');        // get bai viet doc nhieu nhat
        $where_đienan = array(
           'article_category_id' => 14
        );
        $get_all_diendan = $this->article_info->getAllOrder('*',$where_đienan,'article_id','DESC');        // get bai viet dien dan
        $where_thethao = array(
           'article_category_id' => 5
        );
        $get_all_thethao = $this->article_info->getAllOrder('*',$where_thethao,'article_id','DESC');        // get bai viet the thao
        $where_congnghe = array(
           'article_category_id' => 7
        );
        $get_all_congnghe = $this->article_info->getAllOrder('*',$where_congnghe,'article_id','DESC');        // get bai viet the thao
        $obj_article = $this->article_info;
        $data['list_article'] = $get_all_article;
        $data['list_article_read'] = $get_all_article_read;
        $data['list_diendan'] = $get_all_diendan;
        $data['list_thethao'] = $get_all_thethao;
        $data['list_congnghe'] = $get_all_congnghe;
        $this->layoutMobile('mobile/home/display',$data);
    }



}