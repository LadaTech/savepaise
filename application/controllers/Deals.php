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

    public function store() {
        $this->load->library('Headerincludes');
        $data = $this->headerincludes->allHeaderIncludes();
        $q = $this->uri->segment(3);
        $data['storeName'] = $q;
//        echo $q;exit;
        if ((isset($_POST['type']) && ($_POST['type'] == 'Coupon')) || (isset($_POST['type']) && ($_POST['type'] == 'Promotion'))) {
            $data['specific_item_deals'] = $this->store_model->view_store1($q, $_POST['type']);
//            echo "<pre>";
//            print_r($data['specific_item_deals']);exit;
//            $data['links'] = $this->pagination->create_links();
            $this->load->view('store-deals', $data);
        } else {
//        if (isset($q)) {
            $config['base_url'] = base_url() . 'store/' . $q;
//            echo "else block";exit;
            $config['total_rows'] = count($this->store_model->view_store($q));
//        $config['total_rows'] = count($this->store_model->view_store($q));
//        echo $config['total_rows'];exit;
            $config['per_page'] = 10;
            $config['uri_segment'] = 4;
            $config['num_links'] = 2;
            $config['full_tag_open'] = '<ul class = "page-pagination">';
            $config['full_tag_close'] = '</ul>';
            $config['first_link'] = 'First';
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['last_link'] = 'Last';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';
            $config['next_link'] = ' &gt;';
            $config['next_tag_open'] = '<li class="page-numbers next">';
            $config['next_tag_close'] = '</li>';
            $config['prev_link'] = '&lt;';
            $config['Previous_tag_open'] = '<li class = "page-numbers previous">';
            $config['Previous_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li><span class="page-numbers current">';
            $config['cur_tag_close'] = '</span></li>';
            $config['num_tag_open'] = '<li class = "page-numbers">';
            $config['num_tag_close'] = '</li>';
//        $config['display_pages'] = FALSE;
            $config['attributes'] = array('class' => 'page-numbers');
            $this->pagination->initialize($config);
//        echo $q;exit;
            $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
//        $page = $config['per_page'];
            $data['specific_item_deals'] = $this->store_model->view_store($q, $config['per_page'], $page);
//            echo "<pre>";
//            print_r($data['specific_item_deals']);exit;

            $data['links'] = $this->pagination->create_links();
            $this->load->view('store-deals', $data);
        }
    }

}

?>