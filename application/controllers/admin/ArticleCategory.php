<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ArticleCategory extends MY_Controller
{
    public $article_category_info;
    public $upload_info ;
    function __construct()
    {
        parent::__construct();
        $this->article_category_info = new m_article_category();
        $this->load->library('UploadFile');
        $this->upload_info = new UploadFile();
    }
    public function listArticleCategory()
    {
        $this->author->check_login('users_id');
        // lay tat ca nguoi dung
        $get_all_article_category = $this->article_category_info->getAllOrderArray('*','1=1','article_category_id');
        $pre_generate_table = $this->createDataTable($get_all_article_category);    // chuyen du lieu da xu ly thanh dang mang roi truyen sang view

        // xu ly select action
        $btn_action = $this->input->post('btn_action');
        $list_action = $this->input->post('list_action');
        if(isset($btn_action))
        {
            if($list_action == 'delete')
            {
                $id = $this->input->post('id');
                $status = $this->article_category_info->deleteRecord('article_category_id',$id);
                $this->session->set_flashdata('status_action',$status);
                if($status['type'] == 'success')
                    redirect(base_url_admin().'articlecategory/listArticleCategory');
            }else if($list_action == 'publish')
            {
                $id = $this->input->post('id');
                $data = array(
                    'article_category_active' => 1
                );
                $status = $this->article_category_info->updateRecordIn($id,$data,'article_category_id');
                $this->session->set_flashdata('status_action',$status);
                if($status['type'] == 'success')
                    redirect(base_url_admin().'articlecategory/listArticleCategory');
            }else if($list_action == 'unpublish')
            {
                $id = $this->input->post('id');
                $data = array(
                    'article_category_active' => 0
                );
                $status = $this->article_category_info->updateRecordIn($id,$data,'article_category_id');
                $this->session->set_flashdata('status_action',$status);
                if($status['type'] == 'success')
                    redirect(base_url_admin().'articlecategory/listArticleCategory');

            }
        }
        // thong tin chung truyen sang view
        $this->generateTable($pre_generate_table);
        $data['title_page'] = "Quản lý danh mục tin";
        $data['title_table'] = "Danh sách danh mục tin";
        $data['link_form_process'] = base_url_admin().'articlecategory/listArticleCategory';
        $this->layoutCommon('admin/layouts/tables',$data);
    }
    public function editArticleCategory($id)
    {
        $this->author->check_login('users_id');
        $submit_form = $this->input->post('submit_form');
        if(isset( $submit_form))
            $this->checkForm();
        $where = array(
            'article_category_id' => $id
        );
        $data['article_category_info'] = $this->article_category_info->getAll('*',$where);
        $where_parent = array(
            'article_category_parent_id' => 0
        );
        $data['article_category_parent'] = $this->article_category_info->getAll('*',$where_parent); // lay cac danh muc cha
        $data['title_page'] = "Sửa danh mục";
        $data['title_form'] = "Thông tin danh mục";
        if($this->form_validation->run($this) == false)
        {
            $this->layoutCommon('admin/article_category/edits',$data);
        }else
        {
            $data_pre_form = $this->dataPreActionForm();
            $this->article_category_info->field_check = array(
                'article_category_name' => $this->input->post('article_category_name'),
                'article_category_id !=' => $this->input->post('article_category_id')
            );
            $query = $this->article_category_info->updateRecord($id,$data_pre_form,'article_category_id');
            $this->session->set_flashdata('mess_manufact',$query);
            if($query['type'] == 'success')
            {
                redirect(base_url_admin().'articlecategory/listArticleCategory');
            }else
            {
                $this->session->set_flashdata('mess_manufact',$query);
                $this->layoutCommon('admin/article_category/edits',$data);
            }

        }
    }


    // xoa 1 ban ghi
    public function deleteOne($id)
    {
        $query = $this->article_category_info->deleteRecord('article_category_id',$id);
        $this->session->set_flashdata('mess_manufact',$query);
        redirect(base_url_admin().'articlecategory/listArticleCategory');
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
            'article_category_active' => $status
        );
        $this->article_category_info->updateNormal($id,$data_update,'article_category_id');
    }

    public function addArticleCategory()
    {
        $this->author->check_login('users_id');
        $this->url_upload_error = 'admin/article_category/adds';            // layout load khi co loi
        $this->url_upload_success = 'admin/article_category/adds';          // layout load khi upload thanh cong
        $type_upload = 'gif|jpg|png';                                       // loai file cho phep
        $this->upload_info->alowed_types = $type_upload;                    // gan bien xac dinh loai file
        $data['upload_info'] = $this->upload_info->upload('userfile');      // thuc hien upload voi name input file duoc truyen vao
        if($data['upload_info'])
            $data['path_file_upload'] = "uploads/".@$data['upload_info']['upload_data']['file_name'];       // gan bien duong dan
        $submit_form = $this->input->post('submit_form');
        if(isset( $submit_form))
            $this->checkForm();
        $where_parent = array(
            'article_category_parent_id' => 0
        );
        $data['article_category_parent'] = $this->article_category_info->getAll('*',$where_parent); // lay cac danh muc cha
        $data['title_page'] = "Thêm mục tin";
        $data['title_form'] = "Thông tin danh mục tin";
        if($this->form_validation->run($this) == false)
        {
            $this->layoutCommon('admin/article_category/adds',$data);
        }else
        {
            $data_pre_form = $this->dataPreActionForm();
            $this->article_category_info->field_check = array(
                'article_category_name' => $this->input->post('article_category_name')
            );
            $query = $this->article_category_info->insertRecord($data_pre_form);
            $this->session->set_flashdata('mess_manufact',$query);
            if($query['type'] == 'success')
            {
                redirect(base_url_admin().'articlecategory/listArticleCategory');
            }else
            {
                $this->session->set_flashdata('mess_manufact',$query);
                $this->layoutCommon('admin/article_category/adds',$data);
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
                'article_category_id' => $id
            );
            $get_all_article_category = $this->article_category_info->getAllArray('*',$where);
            $where_parent = array(
                'article_category_id' => $get_all_article_category[0]['article_category_parent_id']
            );
            $get_parent = $this->article_category_info->getAllArray('*',$where_parent);
//            echo "<pre>"; print_r($get_parent);  echo "</pre>";
//            echo @$get_parent[0]['article_category_name'];
            $get_all_article_category[0]['article_category_parent_id'] = @$get_parent[0]['article_category_name'];
        }
        $data['info_all'] = $get_all_article_category;
        $this->load->view('admin/article_category/views',$data);
    }

    // check form
    public function checkForm()
    {
        $this->form_validation->set_rules('article_category_name','Tên mục tin','required|min_length[4]|max_length[40]');
        $this->form_validation->set_rules('article_category_alias','Bí danh','required|min_length[4]|max_length[40]');
//        $this->form_validation->set_rules('userfile','Tên file','required|callback_checkFileExtension');
        $this->form_validation->set_message('required','%s không được để trống');
        $this->form_validation->set_message('min_length','%s phải có ít nhất %s ký tự');
        $this->form_validation->set_message('max_length','%s chỉ được tối đa %s ký tự');
    }

    public function dataPreActionForm()
    {
        $data_pre_action_form = array(
            'article_category_name' => $this->input->post('article_category_name'),
            'article_category_alias' =>  $this->input->post('article_category_alias'),
            'article_category_image' => $this->input->post('article_category_image'),
            'article_category_parent_id' => $this->input->post('article_category_parent_id'),
            'article_category_active' => $this->input->post('article_category_active'),
        );
        return $data_pre_action_form;
    }

    // gan cac du lieu xu ly tu du lieu lay duoc vao mot mang de gui sang view
    public function createDataTable($query)
    {
        $list_data_table = array();
        for($i = 0 ; $i < count($query);$i++)
        {
            $list_data_table[$i]['article_category_id'] =  $query[$i]['article_category_id'];
            if($query[$i]['article_category_active'] == 1)
                $list_data_table[$i]['article_category_active'] = "<button type='button' url='".base_url_admin()."articlecategory/changeStatus' class='btn btn-success btn-xs btn_change_status' id='".$query[$i]['article_category_id']."' status='".$query[$i]['article_category_active']."' >Kích hoạt</button>";
            else
                $list_data_table[$i]['article_category_active'] = "<button type='button' url='".base_url_admin()."articlecategory/changeStatus' class='btn btn-warning btn_change_status btn-xs'  id='".$query[$i]['article_category_id']."' status='".$query[$i]['article_category_active']."' >Bị khóa</button>";
            $list_data_table[$i]['article_category_name'] = $query[$i]['article_category_name'];
            $list_data_table[$i]['article_category_alias'] = $query[$i]['article_category_alias'];
            $list_data_table[$i]['article_category_image'] = "<p style='margin-left:20px' class='fa ".$query[$i]['article_category_image']." fa-2x'></p>";
            // lay id category parent truy van lay ten danh muc cha
            if($query[$i]['article_category_parent_id'] != 0)
            {
                $where_category_parent = array(
                  'article_category_id' => $query[$i]['article_category_parent_id']
                );
                $query_category_parent = $this->article_category_info->getAll('*',$where_category_parent);
                $query[$i]['article_category_parent_id'] = $query_category_parent[0]->article_category_name;
            }else
            {
                $query[$i]['article_category_parent_id'] = "";
            }
            $list_data_table[$i]['article_category_parent_id'] = $query[$i]['article_category_parent_id'];
        }
        return $list_data_table;
    }

    // ham gen nut action
    public function generateTable($data)
    {
        $this->table->set_heading(array('<input type="checkbox" name="" />','Ảnh','Tên danh mục','Bí danh','Danh mục cha','Trạng thái','Hành động'));
        foreach($data as $s_data)
        {
            if($_SESSION['list_permiss'][0]['users_group_view'] == 1)
                $view_detail_button = '<button  class="btn btn-info btn-xs viewDetail" link-ajax="'.base_url_admin().'articlecategory/viewDetail" id-send="'.$s_data['article_category_id'].'" type="button" data-target="#viewDetail" data-toggle="modal" > Chi tiết</button> ';
            else
                $view_detail_button = '';
            if($_SESSION['list_permiss'][0]['users_group_edit'] == 1)
                $edit_button = '<a href="'.base_url_admin().'articlecategory/editArticleCategory/'.$s_data['article_category_id'].'"><button class="btn btn-warning btn-xs" type="button">Sửa</button></a> ';
            else
                $edit_button = "";
            if($_SESSION['list_permiss'][0]['users_group_delete_mem'])
                $delete_button ='<button link-id="'.base_url_admin().'articlecategory/deleteOne/'.$s_data['article_category_id'].'" name-del="'.$s_data['article_category_name'].'" class="btn_delOne btn btn-danger btn-xs " data-target="#confirmDelete" data-toggle="modal"  type="button">Xóa</button> ';
            else
                $delete_button="";
            $list_button = $view_detail_button.
                $edit_button.
                $delete_button;
            $this->table->add_row(array('<input type="checkbox" name="id[]" value="'.$s_data['article_category_id'].'"/>',  $s_data['article_category_image'],$s_data['article_category_name'],$s_data['article_category_alias'],$s_data['article_category_parent_id'],$s_data['article_category_active'],$list_button));
        }
    }

    
}