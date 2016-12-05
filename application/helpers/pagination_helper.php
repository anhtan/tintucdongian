<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if(!function_exists('frontend_pagination'))
{
    function backend_pagination($total_rows='',$per_page='',$base_url='')
    {
        // config backend
        $config['total_rows']=$total_rows;//tong so ban ghi
        $config['per_page']=$per_page;//so ban ghi moi trang
//        $config['uri_segment']=$uri_segment;// segment thay may link cua page phan trang
//        $config['num_links']=$num_links;//
        $config['use_page_numbers'] = TRUE; //trang
        $config['base_url']=$base_url;//duong dan co ban
        $config['full_tag_open']='<div class="pagination">';// html khai bao phan trang
        $config['full_tag_close']='</div>';// html bao sau phan trangs
        $config['next_link']='';// nhan nut next
        $config['prev_link']='';// truoc
        $config['first_link']='&laquo; ??u';// nhan dau trang
        $config['last_link']='Cu?i &raquo;';// nhan cuoi trang
        $config['cur_tag_open'] = '';
        $config['cur_tag_close'] = '';
/*        $config['cur_tag_open'] = '<a href="'.$base_url.'" class="number current" >';
        $config['cur_tag_close'] = '</a>';*/
        return $config;
    }
    function frontend_pagination($total_rows='',$per_page='',$base_url='')
    {
        // ch?a config c?a ph?n trang ? frontend
        $config['num_links']='10';
        $config['total_rows']=$total_rows;//tong so bang ghi
        $config['per_page']=$per_page;// so ban ghi mot trang
        $config['attributes'] = array('class' => 'number');
/*        $config['num_tag_open'] = '<div>';  // html the
        $config['num_tag_close'] = '</div>';  // html the*/

/*        $config['uri_segment']='';// segment th? m?y l? c?a page ph?n trang
        $config['num_links']='';//*/
        $config['use_page_numbers'] = TRUE; //page l? s? . m?c ??nh l? ($page-1)*$per_page
        $config['base_url']=$base_url;//???ng d?n t?i PT
        $config['full_tag_open']='<div id="pagination">';// html bao tr??c ph?n trang
        $config['full_tag_close']='</div>';// html bao sau ph?n trang
        $config['next_link']='';// Nh?n t?n c?a n?t Next
        $config['prev_link']='';// Nh?n t?n c?a n?t Previous
        $config['first_link']='';// Nh?n t?n c?a n?t trang ??u
        $config['last_link']='';// Nh?n t?n c?a n?t trang cu?i
        $config['cur_tag_open'] = '<a class="number active">';
        $config['cur_tag_close'] = '</a>';
        return $config;
    }
}
if(!function_exists('validation_page'))
{
    function validation_page($page=1,$per_page='',$total_rows='')
    {
        //Validation cho $page
        $page=($page<1)?1:$page;
        $page=($page > ceil($total_rows/$per_page))?ceil($total_rows/$per_page):$page;//25 b?n ghi , 10 b?n ghi tr?n 1 trang=>3 page
        return $page;
    }
}

