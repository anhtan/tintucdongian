<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Article extends MY_Controller
{
    public $article;
    public $upload_info ;
    public $article_category_info;
    public $m_article_category_info;
    function __construct()
    {
        parent::__construct();
        $this->article = new m_article();
        $this->article_category_info = new m_article_category();
        $this->load->library('UploadFile');
        $this->upload_info = new UploadFile();
        $this->m_article_category_info = new m_article_category();
    }
    public function listArticle()
    {
        $this->author->check_login('users_id');
        // lay tat ca nguoi dung
        $get_all_article = $this->article->getAllOrderArray('*','1=1','article_id','DESC');
        $pre_generate_table = $this->createDataTable($get_all_article);    // chuyen du lieu da xu ly thanh dang mang roi truyen sang view

        // get all category
        $get_all_category = $this->article_category_info->getAll('article_category_name');
        // xu ly select action
        $btn_action = $this->input->post('btn_action');
        $list_action = $this->input->post('list_action');
        if(isset($btn_action))
        {
            if($list_action == 'delete')
            {
                $id = $this->input->post('id');
                $status = $this->article->deleteRecord('article_id',$id);
                $this->session->set_flashdata('status_action',$status);
                if($status['type'] == 'success')
                    redirect(base_url_admin().'article/listArticle');
            }else if($list_action == 'publish')
            {
                $id = $this->input->post('id');
                $data = array(
                    'article_active' => 1
                );
                $status = $this->article->updateRecordIn($id,$data,'article_id');
                $this->session->set_flashdata('status_action',$status);
                if($status['type'] == 'success')
                    redirect(base_url_admin().'article/listArticle');
            }else if($list_action == 'unpublish')
            {
                $id = $this->input->post('id');
                $data = array(
                    'article_active' => 0
                );
                $status = $this->article->updateRecordIn($id,$data,'article_id');
                $this->session->set_flashdata('status_action',$status);
                if($status['type'] == 'success')
                    redirect(base_url_admin().'article/listArticle');

            }
        }
        // thong tin chung truyen sang view

        $this->generateTable($pre_generate_table);
        $data['custom_option'] = $this->customOption($get_all_category);
//        echo "<pre>"; print_r($this->customOption($get_all_category));  echo "</pre>";

        $data['title_page'] = "Quản lý bài viết";
        $data['title_table'] = "Danh sách bài viết";
        $data['link_form_process'] = base_url_admin().'article/listArticle';
        $this->layoutCommon('admin/layouts/tables',$data);
    }
    public function editArticle($id)
    {
        $this->author->check_login('users_id');
        $submit_form = $this->input->post('submit_form');
        if(isset( $submit_form))
            $this->checkForm();
        $where = array(
            'article_id' => $id
        );
        $where_sub_category = array(
            'article_category_parent_id !=' => 0
        );
        $get_info_article = $this->article->getAllArray('*',$where);
        $path_category = str_replace("/".$get_info_article[0]['article_alias'].".html","",$get_info_article[0]['article_path']);
        $data['article'] = $get_info_article;             // du lieu ban ghi
        $data['path_category'] = $path_category;             // du lieu ban ghi
        $data['list_article_category'] = $this->m_article_category_info->getAll('*');               // lay danh muc bai viet
        $data['list_sub_article_category'] = $this->m_article_category_info->getAll('*',$where_sub_category);
        $data['article_category_info'] = $this->article_category_info->getAll('*'); // lay cac danh muc cha
        $data['class_form'] = "article_info";
        $data['title_page'] = "Sửa bài viết";
        $data['title_form'] = "Thông tin bài viết";
        if($this->form_validation->run($this) == false)
        {
            $this->layoutCommon('admin/article/edits',$data);
        }else
        {
            $data_pre_form = $this->dataPreActionForm();
            $this->article->field_check = array(
                'article_title' => $this->input->post('article_title'),
                'article_id !=' => $this->input->post('article_id')
            );
            $query = $this->article->updateRecord($id,$data_pre_form,'article_id');
            $this->session->set_flashdata('mess_manufact',$query);
            if($query['type'] == 'success')
            {
                redirect(base_url_admin().'article/listArticle');
            }else
            {
                $this->session->set_flashdata('mess_manufact',$query);
                $this->layoutCommon('admin/article/edits',$data);
            }

        }
    }


    public function customOption($data)
    {
        $custom_option = '<div class="wrap_custom_select"><select id="select_val" name="select_val" class="form-control">';
        $custom_option .= '<option value="">Chọn danh mục</option>';
        foreach($data as $s_data)
        {
            $custom_option.= '<option value="'.$s_data->article_category_name.'">'.$s_data->article_category_name.'</option>';
        }
        $custom_option.='</select></div>';
        return $custom_option;
    }
    // xoa 1 ban ghi
    public function deleteOne($id)
    {
        $query = $this->article->deleteRecord('article_id',$id);
        $this->session->set_flashdata('mess_manufact',$query);
        redirect(base_url_admin().'article/listArticle');
    }
    // ham thay doi trang thai cua mot ban ghi
    public function changeStatus()
    {
        $id = $this->input->post('id');
        $status = $this->input->post('status');
        if($status == 0)
        {
            $status = 1;
        }else
        {
            $status = 0;
        }
        $data_update = array(
            'article_active' => $status
        );
        $this->article->updateNormal($id,$data_update,'article_id');
    }

    public function uploadTest()
    {
        $this->load->view('admin/upload_test');
    }

    public function processUpload()
    {
        $this->url_upload_error = 'admin/article_category/adds';            // layout load khi co loi
        $this->url_upload_success = 'admin/article_category/adds';          // layout load khi upload thanh cong
        $type_upload = 'gif|jpg|png|jpeg';                                       // loai file cho phep
        $this->upload_info->alowed_types = $type_upload;                    // gan bien xac dinh loai file
        $data['upload_info'] = $this->upload_info->upload('userfile');      // thuc hien upload voi name input file duoc truyen vao
        if($data['upload_info'])
        {
            $_SESSION['path_file_upload'] = "uploads/".@$data['upload_info']['upload_data']['file_name'];       // gan bien duong dan
        }
        return $data['upload_info'];
    }
    public function addArticle()
    {
        $this->author->check_login('users_id');
        $submit_form = $this->input->post('submit_form');
        if(isset( $submit_form))
            $this->checkForm();
        $where_parent = array(
            'article_category_id' => 0
        );
        $where_sub_category = array(
            'article_category_parent_id !=' => 0
        );
        $where_category_article = array(
          'article_category_active' => 1
        );
        $data['list_article_category'] = $this->m_article_category_info->getAll('*',$where_category_article);
        $data['list_sub_article_category'] = $this->m_article_category_info->getAll('*',$where_sub_category);
        $data['article_category_info'] = $this->article_category_info->getAll('*'); // lay cac danh muc cha
        $data['title_page'] = "Thêm bài viết";
        $data['class_form'] = "article_info";
        $data['title_form'] = "Thông tin bài viết";
        if($this->form_validation->run($this) == false)
        {
            $this->layoutCommon('admin/article/adds',$data);
        }else
        {
            $data_pre_form = $this->dataPreActionForm();
            $this->article->field_check = array(
                'article_title' => $this->input->post('article_title')
            );
            $query = $this->article->insertRecord($data_pre_form);
            $this->session->set_flashdata('mess_manufact',$query);
            if($query['type'] == 'success')
            {
                unset($_SESSION['path_file_upload']);
                redirect(base_url_admin().'article/listArticle');
            }else
            {
                $this->session->set_flashdata('mess_manufact',$query);
                $this->layoutCommon('admin/article/adds',$data);
            }
        }

    }
    // xem chi tiet
    public function viewDetail()
    {
        $id = $this->input->post('id');
        if(isset($id))
        {
            $where = array(
                'article_id' => $id
            );
            $get_all_article = $this->article->getAllArray('*',$where);
            $where_parent = array(
              'article_category_id' => $get_all_article[0]['article_category_id']
            );
            $query_parent = $this->article_category_info->getAllArray('*',$where_parent);
            $get_all_article[0]['article_category_id'] = $query_parent[0]['article_category_name'];
//            echo "<pre>"; print_r($get_parent);  echo "</pre>";
//            echo @$get_parent[0]['article_name'];
//            $get_all_article[0]['article_parent_id'] = @$get_parent[0]['article_category_name'];
        }
        $data['info_all'] = $get_all_article;
        $this->load->view('admin/article/views',$data);
    }

    // check form
    public function checkForm()
    {
        $this->form_validation->set_rules('article_title','Tên mục tin','required|min_length[4]');
        $this->form_validation->set_rules('article_alias','Bí danh','required|min_length[4]');
//        $this->form_validation->set_rules('userfile','Tên file','required|callback_checkFileExtension');
        $this->form_validation->set_message('required','%s không được để trống');
        $this->form_validation->set_message('min_length','%s phải có ít nhất %s ký tự');
        $this->form_validation->set_message('max_length','%s chỉ được tối đa %s ký tự');
    }

    public function dataPreActionForm()
    {
        $data_pre_action_form = array(
            'article_title' => $this->input->post('article_title'),
            'article_alias' =>  $this->input->post('article_alias'),
            'article_path' =>  $this->input->post('article_path'),
            'article_content' => $this->input->post('article_content'),
            'article_active' => $this->input->post('article_active'),
            'article_category_id' => $this->input->post('article_category_id'),
            'article_title_tag' => $this->input->post('article_title_tag'),
            'article_userid_create' => $this->input->post('article_userid_create'),
            'article_userid_update' => $this->input->post('article_userid_update'),
            'article_userid_delete' => $this->input->post('article_userid_delete'),
            'article_summary' => $this->input->post('article_summary'),
            'article_active' => $this->input->post('article_active')
        );
        if(isset($_SESSION['path_file_upload']))
            $data_pre_action_form['article_image'] = $_SESSION['path_file_upload'];
        return $data_pre_action_form;
    }

    // gan cac du lieu xu ly tu du lieu lay duoc vao mot mang de gui sang view
    public function createDataTable($query)
    {
        $list_data_table = array();
        for($i = 0 ; $i < count($query);$i++)
        {
            $list_data_table[$i]['article_id'] =  $query[$i]['article_id'];
            if($query[$i]['article_active'] == 1)
                $list_data_table[$i]['article_active'] = "<button type='button' url='".base_url_admin()."article/changeStatus' class='btn btn-success btn-xs btn_change_status' id='".$query[$i]['article_id']."' status='".$query[$i]['article_active']."' >Kích hoạt</button>";
            else
                $list_data_table[$i]['article_active'] = "<button type='button' url='".base_url_admin()."article/changeStatus' class='btn btn-warning btn_change_status btn-xs'  id='".$query[$i]['article_id']."' status='".$query[$i]['article_active']."' >Bị khóa</button>";
            $list_data_table[$i]['article_title'] =   $query[$i]['article_title'];
            $list_data_table[$i]['article_alias'] = $query[$i]['article_alias'];
            $list_data_table[$i]['article_content'] = $query[$i]['article_content'];
            // lay id category parent truy van lay ten danh muc cha
            $list_data_table[$i]['article_image'] = "<img src='".base_url().$query[$i]['article_image']."' class='img_tab_post' />" ;
            $where_category = array(
              'article_category_id' => $query[$i]['article_category_id']
            );
            $query_category = $this->article_category_info->getAllArray('*',$where_category);
            $list_data_table[$i]['article_category_id'] = $query_category[0]['article_category_name'];
            $list_data_table[$i]['article_title_tag'] = $query[$i]['article_title_tag'];
            $list_format_date = listFormatDate();
            getTimeNow();
            $list_data_table[$i]['article_created'] = date($list_format_date[1],strtotime( $query[$i]['article_created'])) ;
            $list_data_table[$i]['article_userid_create'] =  $query[$i]['article_userid_create'];
            $list_data_table[$i]['article_path'] =  $query[$i]['article_path'];
            $list_data_table[$i]['article_userid_update'] = $query[$i]['article_userid_update'];
            $list_data_table[$i]['article_userid_delete'] = $query[$i]['article_userid_delete'];
            $list_data_table[$i]['article_summary'] = $query[$i]['article_summary'];
        }
        return $list_data_table;
    }

    // ham gen nut action
    public function generateTable($data)
    {

        $this->table->set_heading(array('<input type="checkbox" name="" />','Ảnh','Tên bài viết','Danh mục ','Ngày tạo','Trạng thái','Hành động'));
        foreach($data as $s_data)
        {
            if($_SESSION['list_permiss'][0]['users_group_view'] == 1)
                $view_detail_button = '<button  class="btn btn-info btn-xs viewDetail" link-ajax="'.base_url_admin().'article/viewDetail" id-send="'.$s_data['article_id'].'" type="button" data-target="#viewDetail" data-toggle="modal" > Chi tiết</button> ';
            else
                $view_detail_button = '';
            if($_SESSION['list_permiss'][0]['users_group_edit'] == 1)
                $edit_button = '<a href="'.base_url_admin().'article/editArticle/'.$s_data['article_id'].'"><button class="btn btn-warning btn-xs" type="button">Sửa</button></a> ';
            else
                $edit_button = "";
            if($_SESSION['list_permiss'][0]['users_group_delete_mem'])
                $delete_button ='<button link-id="'.base_url_admin().'article/deleteOne/'.$s_data['article_id'].'" name-del="'.$s_data['article_title'].'" class="btn_delOne btn btn-danger btn-xs " data-target="#confirmDelete" data-toggle="modal"  type="button">Xóa</button> ';
            else
                $delete_button="";
            $list_button = $view_detail_button.
                $edit_button.
                $delete_button;
            $this->table->add_row(array('<input type="checkbox" name="id[]" value="'.$s_data['article_id'].'"/>', $s_data['article_image'],"<span class='custom_tooltip' data-placement='top' data-toggle = 'tooltip' title='".$s_data['article_title']."'>".strim_title($s_data['article_title'],50)."</span>",$s_data['article_category_id'],@$s_data['article_created'],$s_data['article_active'],$list_button));
        }
    }

    
}