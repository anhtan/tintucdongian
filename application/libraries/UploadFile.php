<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: tan
 * Date: 10/30/2015
 * Time: 11:30 AM
 */
class UploadFile
{

    protected $CI;
    public $alowed_types;
    public function __construct()
    {
        $this->CI =& get_instance();

    }
    // thuc hien upload , nhan vao name cua input file
    public function upload($post_name)
    {
        $config['upload_path'] = 'uploads';
        $config['allowed_types'] = $this->alowed_types;
        $config['max_size'] = 600;
/*        $config['max_width'] = 1024;
        $config['max_height'] = 768;*/
        $this->CI->load->library('upload',$config);
        $this->CI->upload->initialize($config);
        $_FILES[$post_name]['name'] = getTimeNow()."_".@$_FILES[$post_name]['name'];
        $_FILES[$post_name]['tmp_name'] = @$_FILES[$post_name]['tmp_name'];
        if(!$this->CI->upload->do_upload($post_name))
        {
            $error = array('error'=>$this->CI->upload->display_errors());
            return $error;
        }else
        {
            $data = array('upload_data'=>$this->CI->upload->data());
            return $data;
        }

    }


    

    
}