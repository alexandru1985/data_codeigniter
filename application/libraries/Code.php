<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Code extends CI_Controller
{

   private $CI;

    function __construct()
    {
        parent::__construct();

        $this->CI = &get_instance(); 
    }

    function test($value)
    {
        echo "You passed $value"."<br />";
        $this->CI->load->library('config');
        echo "Your language is:".$this->CI->config->item('language');
    }

}
