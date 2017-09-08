<?php

//error_reporting(E_ALL);
//ini_set("display_errors", 1);
defined('BASEPATH') OR exit('No direct script access allowed');

class Deals extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('form_validation', 'email');
        $this->load->helper('url', 'form', 'html', 'cookie');
        $this->load->library('pagination');
//        $this->load->library('Ajax_pagination');
        $this->load->model('login_model');
        $this->load->model('category_model');
        $this->load->model('addusers_model');
        $this->load->model('store_model');
        $this->load->model('brand_model');
        $this->load->model('vcommision_model');
        $this->load->model('coupons_model');
        $this->load->model('subcategory_model');
    }

    

}

?>