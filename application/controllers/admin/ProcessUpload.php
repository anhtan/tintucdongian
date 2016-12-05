<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: tan
 * Date: 11/1/2015
 * Time: 10:45 AM
 */
class ProcessUpload extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
    }
    
    public function unset_session()
    {
        $name = $this->input->post('name');
        if(isset($_SESSION[$name]))
        {
            unset($_SESSION[$name]);
        }
    }
    
}