<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Generation extends MY_Controller
{
  function __construct()
  {
      parent::__construct();
  }

  public function display()
  {

  }

  public function genController($name_of_module="",$name_of_model="")
  {
      $submit_form = $this->input->post("submit_form");
      if($submit_form)
      {
          $name_controller = $this->input->post('name_of_controller');
          $name_display_del = $this->input->post('name_display_del');
          $name_module = $this->input->post('name_module');
          $name_model = $this->input->post('name_model');
          $field_model = $this->input->post('field_model');
          $name_display_model = $this->input->post('name_display_model');
          $full_name_model = "m_".$name_model;
          if(isset($name_controller))
              $name_controller = $name_controller;
          else
              $name_controller = "";
          $this->makeController($name_module,$full_name_model,$field_model,$name_display_model,$name_model,$name_display_del,$name_controller);
          $arr_mess = array(
            'type' => 'success',
              'mess' => 'Tạo controller thành công'
          );
          $this->session->set_flashdata('mess_manufact',$arr_mess);
      }
      $data['name_of_module'] = $name_of_module;
      $data['name_of_model'] = $name_of_model;
      $data['title_page'] = "Tạo controller";
      $data['title_form'] = "Thông tin controller";
      $data['class_form'] = "genController";
      $this->layoutCommon('gen_controller',$data);
  }
  // tao model
  public function genModel($name_of_module="",$name_module_model="")
  {
    $submit_form = $this->input->post('submit_form');
    if($submit_form)
    {
      $name_model = $this->input->post('name_model');
      $name_module = $this->input->post('name_module');
      $field_model = $this->input->post('field_model');
      $name_display_model = $this->input->post('name_display_model');
      $this->dataPreOfForm($field_model);
//      echo $name_model;
      $this->makeModel($name_model,$name_module,$field_model,$name_display_model);
    }
    $data['title_page'] = "Tạo model";
    $data['title_form'] = "Thông tin model";
    if($name_of_module != "")
      $data['name_of_module'] = $name_of_module;
    if($name_module_model != "")
      $data['name_module_model'] = $name_module_model;
    $this->layoutCommon('gen_model',$data);
  }

  public function genView($name_of_module="")
  {
    $submit_form = $this->input->post('submit_form');
    if($submit_form)
    {
      $link_form = $this->input->post('link_form');
      $name_view = $this->input->post('name_view');
      $name_module = $this->input->post('name_module');
      $field_model = $this->input->post('field_model');
      $name_display_model = $this->input->post('name_display_model');
      $type_item = $this->input->post('type_item');
      $this->makeView($name_view,$name_module,$field_model,$name_display_model,$type_item,$link_form);
    }
    $data['title_page'] = "Tạo view";
    $data['title_form'] = "Thông tin view";
    if($name_of_module != "")
      $data['name_of_module'] = $name_of_module;
    $this->layoutCommon('gen_view',$data);
  }



  public function loadPaternFile($type_patern)
  {
    /*---------------ten cac file-------------*/
    $patern_text_input = "patern_file/views/text_input.txt";
    $patern_category_image = "patern_file/views/category_image.txt";
    $patern_image = "patern_file/views/image.txt";
    $patern_mutil_select = "patern_file/views/mutil_select.txt";
    $patern_select_option = "patern_file/views/select_option.txt";
    $patern_tag = "patern_file/views/tag.txt";
    $patern_text_area = "patern_file/views/text_area.txt";
    $patern_text_area_advance = "patern_file/views/text_area_advance.txt";
    $patern_select_option_status = "patern_file/views/select_option_status.txt";
    $patern_hidden_input = "patern_file/views/hidden_input.txt";

    /*----------kiem tra dk roi tra ve file -----------*/
    switch($type_patern)
    {
      case 1 :
            return file_get_contents($patern_text_input);
            break;
      case 2 :
            return file_get_contents($patern_select_option);
            break;
      case 3 :
            return file_get_contents($patern_category_image);
            break;
      case 4 :
            return file_get_contents($patern_image);
            break;
      case 5 :
            return file_get_contents($patern_text_area);
            break;
      case 6 :
            return file_get_contents($patern_text_area_advance);
            break;
      case 7 :
            return file_get_contents($patern_tag);
            break;
      case 8 :
            return file_get_contents($patern_mutil_select);
            break;
      case 9 :
            return file_get_contents($patern_select_option_status);
            break;
      case 10 :
            return file_get_contents($patern_hidden_input);
            break;
    }
  }

  public function makeView($name_view,$name_module ="",$field_name="",$field_alias_name="",$type_item="",$link_form="")
  {
    $ext_file = '.php';
    /*------------ten nguon file----------*/
    $patern_body_form = "patern_file/views/body_form.txt";
    // khai bao ten cac thu muc
    if($name_module == "")
      $structure_view = 'application/views/admin';
    else
      $structure_view = 'application/modules/'.$name_module.'/views';
    // khai bao ten cac file di kem
    $file_view = $structure_view."/".$name_view.$ext_file;
    if($structure_view)
    {
      if(isset($file_view))
      {
        /*-----------khai bao doc cac file goc --------------*/
        $resource_body_form = file_get_contents($patern_body_form);
        $str_content_common = "";
        // create file
        $create_file_view = fopen($file_view,'w');
        $create_file_view_listIcon = fopen($file_view,'w');
        if($create_file_view)
        {
        }else
        {
          echo "chua";
        }
        /*------------bien gan vao file ------------------*/
        fwrite($create_file_view,$resource_body_form);

        $str_image = "";  // noi luu item anh
        $str_hidden_image = "";  // noi luu biên duoi dang input hidden
        $str_list_icon = "";
        /*
         *  Đoạn này sẽ dùng 3 vòng lặp với điều kiện có key 1 phần tử 3 mảng bằng nhau thì bắt đầu lọc
         * - nếu loại có value type item tức chọn ảnh thì sinh ra thành phần : 1) item image  , phần tử này đặt ngoài form
         *                                                                      2) item hidden input có name , phần tử naỳ dặt trong form
         * - nếu loại có value type item khác 4 thì lấy file gốc rồi chèn vào view
         * */
        foreach($type_item as $key_type_item=>$value_type_item)
        {
          foreach($field_name as $key_field_name=>$value_field_name)
          {
              foreach($field_alias_name as $key_field_alias_name=>$value_field_alias_name)
              {
                if($key_field_alias_name == $key_field_name && $key_field_alias_name == $key_type_item  )
                {
                    $str_change  = str_replace('$label_item',$value_field_alias_name,$this->loadPaternFile($type_item[$key_type_item]));
                    $str_change_2  = str_replace('$name_of_field',$value_field_name,$str_change);
                    $str_content_common .= $str_change_2."\n";
                }
/*                else
                {
                  $str_image = $this->loadPaternFile($type_item[$key_type_item]);
                  $str_change_image = $this->loadPaternFile(10);
                  $str_hidden_image  = str_replace('$name_of_field',$value_field_name,$str_change_image);

                }*/
              }
          }
        }
        replace_in_file($file_view,'$obj_model',$name_module);
        replace_in_file($file_view,'$content_form',$str_content_common);
        replace_in_file($file_view,'$process_form',$link_form);
        replace_in_file($file_view,'$str_image',$str_image);
        replace_in_file($file_view,'$str_hidden_image',$str_hidden_image);
        $content_file_view = file_get_contents($file_view);
        $str_field_alias_name = "";
        if($content_file_view != "")
        {
          $this->session->set_flashdata('create_success','Tạo view thành công');
          fclose($create_file_view);
        }

      }
    }
  }
  /**
   * @param $name_model : tên của model
   * @param string $name_module : tên của module
   * @param string $field_name  : tên trường
   * @param string $field_alias_name : tên hiển thị
     */
  public function makeModel($name_model,$name_module="",$field_name="",$field_alias_name="")
  {
    $pre_suffic = "m_";
    $ext_file = '.php';
    /*------------ten nguon file----------*/
    $patern_file_model = "patern_file/models/name_model.txt";

    // khai bao ten cac thu muc
    if($name_module == "")
      $structure_model = 'application/models';
    else
      $structure_model = 'application/modules/'.$name_module.'/models';

    // khai bao ten cac file di kem
    $file_model = $structure_model."/".$pre_suffic.$name_model.$ext_file;
    if($structure_model)
    {
      if(isset($file_model))
      {
        /*-----------khai bao doc cac file goc --------------*/
        $resource_file_model = file_get_contents($patern_file_model);
        // create file
        $create_file_model = fopen($file_model,'w');
        if($create_file_model)
        {
//          echo "ghi duoc";
        }else
        {
//          $this->session->set_flashdata('error')
          echo "chua";
        }
        /*------------bien gan vao file ------------------*/
        fwrite($create_file_model,$resource_file_model);
        $content_file_model = file_get_contents($file_model);
        $str_field_name = "";
        $str_field_alias_name = "";

        foreach($field_name as $s_field_name )
        {
           $str_field_name .= "public $".$s_field_name.";\n\t";
        }
        foreach($field_name as $key_field_name=>$value_field_name)
        {
          foreach($field_alias_name as $key_field_alias_name=>$value_field_alias_name)
          {
            if($key_field_name == $key_field_alias_name)
              $str_field_alias_name .= "public $".$value_field_name."_alias='".$value_field_alias_name."';\n\t";
          }
        }

        // tim va thay doi gia tri cho cac bien
        replace_in_file($file_model,'$name_model',$pre_suffic.$name_model);
        replace_in_file($file_model,'$table_name',$name_model);
        replace_in_file($file_model,'$field_model',$str_field_name);
        replace_in_file($file_model,'$name_display_model',$str_field_alias_name);
        if($content_file_model != "")
        {
           $this->session->set_flashdata('create_success','Tạo model thành công');
           fclose($create_file_model);

        }

      }
    }
  }

  public function genViewDetail($name_of_module="")
  {
      $submit_form = $this->input->post('submit_form');
      if($submit_form)
      {
          $name_view = $this->input->post('name_view');
          $name_module = $this->input->post('name_module');
          $field_model = $this->input->post('field_model');
          $name_display_model = $this->input->post('name_display_model');
          $type_item = $this->input->post('type_item');
          $this->makeViewDetail($name_module,$name_view,$field_model,$name_display_model,$type_item);
      }
      $data['title_page'] = "Tạo view";
      $data['title_form'] = "Thông tin view";
      if($name_of_module != "")
          $data['name_of_module'] = $name_of_module;
      $this->layoutCommon('gen_view_detail',$data);

  }
  /*-----------------dung view detail -----------------------*/
  public function loadPaternViewDetail($type_detail)
  {
      $patern_detail_text = "patern_file/views/view_detail/text.txt";
      $patern_detail_image = "patern_file/views/view_detail/image.txt";
      $patern_detail_status = "patern_file/views/view_detail/status.txt";
      switch($type_detail)
      {
          case 1:
              return file_get_contents($patern_detail_text);
              break;
          case 2:
              return file_get_contents($patern_detail_image);
              break;
          case 3:
              return file_get_contents($patern_detail_status);
              break;
      }
  }
  public function makeViewDetail($name_module="",$name_view="",$field_name="",$field_name_alias="",$type_item="")
  {
      $ext_file = '.php';
      /*------------ten nguon file----------*/
      // khai bao ten cac thu muc
      if($name_module == "")
          $structure_view = 'application/views/admin';
      else
          $structure_view = 'application/modules/'.$name_module.'/views';
      // khai bao ten cac file di kem
      $file_view = $structure_view."/".$name_view.$ext_file;
      if($structure_view)
      {
          if(isset($file_view))
          {
              /*-----------khai bao doc cac file goc --------------*/
              $str_content_common = "";
              // create file
              $create_file_view = fopen($file_view,'w');
              $create_file_view_listIcon = fopen($file_view,'w');
              if($create_file_view)
              {
              }else
              {
                  echo "chua";
              }
              /*------------bien gan vao file ------------------*/
              $str_content_detail = "";  // noi luu item anh
              /*
               *  Đoạn này sẽ dùng 3 vòng lặp với điều kiện có key 1 phần tử 3 mảng bằng nhau thì bắt đầu lọc
               * - nếu loại có value type item tức chọn ảnh thì sinh ra thành phần : 1) item image  , phần tử này đặt ngoài form
               *                                                                      2) item hidden input có name , phần tử naỳ dặt trong form
               * - nếu loại có value type item khác 4 thì lấy file gốc rồi chèn vào view
               * */
              $str_content_common2 = "";
              foreach($type_item as $key_type_item=>$value_type_item)
              {
                  foreach($field_name as $key_field_name=>$value_field_name)
                  {
                      foreach($field_name_alias as $key_field_alias_name=>$value_field_alias_name)
                      {
                          if($key_field_alias_name == $key_field_name && $key_field_alias_name == $key_type_item  )
                          {
                              $str_change  = str_replace('$label_detail_item',$value_field_alias_name,$this->loadPaternViewDetail($type_item[$key_type_item]));
                              $str_change_2  = str_replace('$name_detail_field',$value_field_name,$str_change);
                              $str_content_common2 .= $str_change_2."\n";
                          }
                      }
                  }
              }
              fwrite($create_file_view,$str_content_common2);
              $content_file_view = file_get_contents($file_view);
              $str_field_alias_name = "";
              if($content_file_view != "")
              {
                  $this->session->set_flashdata('create_success','Tạo view thành công');
                  fclose($create_file_view);
              }

          }
      }

  }

    public function dataPreOfForm($arr_model)
    {
        $str_data_pre = "";
        $data_pre = array();
        $file_name = 'data_pre';
        $structure_test = 'patern_file/models/'.$file_name.'.txt';
        foreach($arr_model as $s_arr_model)
        {
            if(!strpos($s_arr_model,'_id'))
                $str_data_pre .= '$data_pre["'.$s_arr_model.'"] = $this->input->post("'.$s_arr_model.'");'."\n";
        }
        $open_file = fopen($structure_test,'w');
        fwrite($open_file,$str_data_pre);
    }

    public function test()
    {
        $field_model = array('video_name','video_status');
        $name_display_del = array('Tên video','Trạng thái');
        $full_model = 'm_'.'video';
        $this->makeController('video',$full_model,$field_model,$name_display_del,'video','video_name');
    }

    public function makeController($name_module="",$name_of_model,$field_model ="",$name_display_model="",$obj_model="",$name_display_del="",$name_controller="")
    {
        $name_modules = $name_module;     // ten module
        $ext_file = '.php';
        $pre_suffic = "m_";
        $display_file = "display";
        /*------------ten nguon file----------*/
        $patern_file_controller = "patern_file/controllers/name_controller.txt";                // nguon file controller
        $patern_file_data_pre = "patern_file/models/data_pre.txt";                              // nguon file data pre
        if($name_module == "")
        {
            $structure_controller = 'application/controllers/admin';            // cua truc controller
            $name_modules = $name_controller;
        }
        else
            $structure_controller = 'application/modules/'.$name_modules.'/controllers';            // cua truc controller
        if($name_controller == "")
            $file_controller = $structure_controller."/".ucfirst($name_controller).$ext_file;          // khai bao cac file di kem
        else
            $file_controller = $structure_controller."/".ucfirst($name_controller).$ext_file;          // khai bao cac file di kem
        if(isset( $file_controller) )
        {
            $resource_file_controllers = file_get_contents($patern_file_controller);                // lay noi dung file controller
            $resource_file_data_pre = file_get_contents($patern_file_data_pre);                // lay noi dung file data pre
            $create_file_controller = fopen($file_controller,'w');                                  // tao file controller theo duong dan
            fwrite($create_file_controller,$resource_file_controllers);                             // ghi noi dung load tu file controller
            // ghi cac bien vao file controller
            $content_file_controller = file_get_contents($file_controller);                         // lay noi dung file controller da khai bao
            $this->replace_in_file($file_controller,'$name_controller',ucfirst($name_modules));     // chen cac bien vao file controller
            $this->replace_in_file($file_controller,'$model_info',$name_of_model);
            /*-------------- gen action createDataTable--------------------*/
            $this->replace_in_file($file_controller,'$obj_module',$name_modules);
            $this->replace_in_file($file_controller,'$obj_model',$obj_model);

            /*--------------gen action dataPre-------------------------------*/
            $this->replace_in_file($file_controller,'$data_array_pre',$resource_file_data_pre);

            /*-----------------gen action genTable------------------------*/
            $this->genActionGenTable($file_controller,$field_model,$name_display_model,$name_display_del);
            $this->replace_in_file($file_controller,'$obj_model',$name_modules);
            if($content_file_controller != ""  )
            {
//                echo "ghi thanh cong";
            }

        }

    }

    public function genActionGenTable($file_controller,$field_model="",$name_display_model="",$name_display_del)
    {
        if(is_array($field_model) && is_array($name_display_model))
        {
            $list_field_model = "";
            $list_name_display_model = "";
            foreach($field_model as $s_field_model)
            {
                $list_field_model = $list_field_model.",".'$s_data["'.$s_field_model.'"]';
            }
            foreach($name_display_model as $s_name_display_model)
            {
                $list_name_display_model = $list_name_display_model.","."'".$s_name_display_model."'";
            }
            $this->replace_in_file($file_controller,'$list_name_field',$list_field_model);
            $this->replace_in_file($file_controller,'$field_data_table',$list_name_display_model);
            $this->replace_in_file($file_controller,'$name_display_del',$name_display_del);

        }
    }



}
?>