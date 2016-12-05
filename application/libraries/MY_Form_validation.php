<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
/**
 * Created by PhpStorm.
 * User: tan
 * Date: 11/3/2015
 * Time: 11:15 AM
 */
class MY_Form_validation extends CI_Form_validation
{
    function run($module ='',$group='')
    {
        (is_object($module)) AND $this->CI=&$module;
        return parent::run($group);
    }
}