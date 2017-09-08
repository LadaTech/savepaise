<?php

//error_reporting(E_ALL);
//ini_set("display_errors", 1);
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {

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

    public function index() {
//        $data['categories'] = $this->category_model->display_categories()->result();
//        $data['sub_categories'] = $this->subcategory_model->display_sub_categories()->result();
//        $data['stores'] = $this->store_model->display_store()->result();
//        $data['brands'] = $this->brand_model->display_brands()->result();
        $this->load->library('Headerincludes');
        $data = $this->headerincludes->allHeaderIncludes();
        $this->load->view('index', $data);
    }

    public function login() {
        $this->load->view('admin/login');
    }

    public function logout() {
        $this->load->view('admin/logout');
    }

    public function sign_in() {

        $result = $this->login_model->sign_in();

        if (!$result) {
            $this->session->set_flashdata('msg', '<font color=red>Invalid username and/or password.</font><br />');
            redirect(base_url() . 'index');
//            $this->load->view(base_url() . 'index');
        } else {
            if ($_SESSION['usertype'] == 2 || $_SESSION['usertype'] == 1) {

                redirect(base_url() . 'admin/dashboard');
            }
            if ($_SESSION['usertype'] == 3 || !empty($_POST['urlValue'])) {
                redirect(base_url() . 'index');
            }
            if (empty($_POST['urlValue'])) {
                redirect('/');
            }
        }
    }

    public function sign_up() {
        $this->load->library('email');
        $result = $this->login_model->email_check();
        if (isset($result) && ($result != TRUE)) {
            if (isset($_POST["sign_up"]) == 'submit' || !empty($_POST)) {
                $this->email->from('ladatech121@gmail.com');
                $this->email->to($_POST['email']);
                $this->email->subject('Email Test');
                $this->email->message('Testing the email class');
                $config = Array(
                    'protocol' => 'smtp',
                    'smtp_host' => 'ssl://smtp.googlemail.com',
                    'smtp_port' => 465,
                    'smtp_user' => 'ladatechnology@gmail.com',
                    'smtp_pass' => 'ladatechnology121',
                    'mailtype' => 'html',
                    'charset' => 'iso-8859-1',
                    'wordwrap' => TRUE
                );
                if ($this->email->send()) {
                    $udata = array(
                        'firstname' => $_POST['firstname'],
                        'lastname' => $_POST['lastname'],
                        'email' => $_POST['email'],
                        'password' => base64_encode($_POST['password']),
                        'pnumber' => $_POST['pnumber'],
                        'usertype' => 3,
                        'status' => 1,
//                        'created_by' => $_SESSION['id'],
                        'created_date' => date('Y-m-d H:i:s')
                    );

                    if ($result = $this->login_model->sign_up($udata)) {
//               $_SESSION['msg'] = '<font color=green>Registred Sucessfully</font><br />';
                        $this->session->set_flashdata('msg', '<font color=green>Registred Sucessfully</font><br />');
                        redirect(base_url() . 'index');
//               $this->load->view(echo baseurl().'index',$msg);
                    }
                } else {
//             $msg = '<font color=red>Registration failed</font><br />';
                    $this->session->set_flashdata('msg', '<font color=red>Registration failed.Email id not exist..</font><br />');
                    redirect(base_url() . 'index');
                }
            }
        } else {
            $this->session->set_flashdata('msg', '<font color=red>Email already exist</font><br />');
            redirect(base_url() . 'index');
        }
    }

    public function edit_profile() {
        if (isset($_POST["edit_profile"]) == 'submit' || !empty($_POST)) {
            $uid = $_SESSION['id'];
            $usereditdata = array(
//                'id' => $_SESSION['id'],
                'firstname' => trim($_POST['firstname']),
                'lastname' => trim($_POST['lastname']),
                'email' => trim($_POST['email']),
                'pnumber' => $_POST['pnumber'],
                'usertype' => $_SESSION['usertype'],
                'updated_date' => date('Y-m-d H:i:s')
            );
            if ($result = $this->login_model->edit_profile($uid, $usereditdata)) {
                $this->session->set_flashdata('msg', '<font color=green>Profile Updated Successfully</font><br />');
                redirect(base_url());
            } else {
                $this->session->set_flashdata('msg', '<font color=red>Profile Updated Fail </font><br />');
                redirect(base_url());
            }
//            $uid = $_GET['id'];            
//            $data['utdata'] = $this->login_model->edit_profile($uid);
////         echo "<pre>";
////        print_r($data);exit;
//            $this->load->view('admin/usertype/edit_usertype', $data);
        }
    }

    public function change_password() {
        if (isset($_POST['change_password'])) {
            $old_password = base64_encode($_POST['old_password']);
            $new_password = base64_encode($_POST['new_password']);
//            echo "<pre>";
//            echo $old_password." ".$new_password;
//            print_r($_SESSION);exit;
            $result = $this->login_model->change_password($old_password, $new_password);
            if ($result == TRUE) {
                $this->session->set_flashdata('msg', '<font color=green>password updated successfully</font><br />');
                redirect(base_url());
            } else {
                $this->session->set_flashdata('msg', '<font color=red>error while updating password </font><br />');
                redirect(base_url());
            }
        }
    }

    public function home() {
        $this->load->library('Headerincludes');
        $data = $this->headerincludes->allHeaderIncludes();
// Load our view to be displayed        
        $this->load->view('home', $data);
    }

    //To Send  users login page data to database and checking Authentication
    public function process() {
        // Load the model        
        $this->load->model('login_model');
// Validate the user can login
        $result = $this->login_model->validate();
// Now we verify the result
        if (!$result) {
//$this->index();
// If user did not validate, then show them login page again
            $this->session->set_flashdata('errormsg', '<font color=red>Invalid username and/or password.</font><br />');
            redirect(base_url() . 'index');
//            $msg = '<font color=red>Invalid username and/or password.</font><br />';
//            redirect(base_url().'index',$msg);
//            $this->load->view(base_url(),$msg);
        } else {
// If user did validate, 
// Send them to members area
            if ($_SESSION['utype'] == 2 || $_SESSION['utype'] == 1) {
                redirect(base_url() . 'admin');
            }
            if ($_SESSION['utype'] == 3 && !empty($_POST['urlValue'])) {
                redirect($_POST['urlValue']);
            }
            if (empty($_POST['urlValue'])) {
                redirect('/');
            }
        }
    }

//    public function category_deals() {
//        $this->load->view('category-deals');
//    }
//    public function amazon_deals() {
//        $this->load->view('store-deals');
//    }
//    public function online_store() {
//        
//    }

    public function contact_us() {
        $this->load->library('Headerincludes');
        $data = $this->headerincludes->allHeaderIncludes();
        $this->load->view('contact-us', $data);
    }

    public function getDeals() {
//        print_r($_POST);
        $storeId = $this->input->post('store');
        $categoryId = $this->input->post('category');
        $subcatId = $this->input->post('subcat');
        $type = $this->input->post('type');
        $limit = $this->input->post('limit');
        $data['type'] = $type;
        $data['couponsList'] = $this->coupons_model->getcoupons($storeId, $categoryId, $subcatId, $type, $limit);
//        print_r($data['couponsList']);
        $this->load->view('ajaxdeals', $data);
//        exit;
    }

    public function getCoupons() {
//        print_r($_POST);
        $storeName = $this->input->post('store_name');
//        $categoryId = $this->input->post('category');
//        $subcatId = $this->input->post('subcat');
        $type = $this->input->post('type');
        $category_type = $this->input->post('category_type');
//        echo $category_type .' '.$type.' '.$storeName;exit;
        if ($type == 'all') {
            $type = '';
        }
//        $limit = $this->input->post('limit');
        if ($category_type == 'store') {
            $data['type'] = $type;
            $data['couponsList'] = $this->store_model->view_store1($storeName, $type);
//        print_r($data['couponsList']);
            $this->load->view('ajaxCoupons', $data);
        } else {
//            $config['base_url'] = base_url() . 'index/subcategories/' . str_replace(' ', '-', $storeName);
//            $config['total_rows'] = count($this->subcategory_model->view_subcategory($storeName));
////            echo $config['total_rows'];exit;
//            $config['per_page'] = 10;
//            $config['uri_segment'] = 4;
//            $config['num_links'] = 2;
//            $config['full_tag_open'] = '<ul class = "page-pagination">';
//            $config['full_tag_close'] = '</ul>';
//            $config['first_link'] = 'First';
//            $config['first_tag_open'] = '<li>';
//            $config['first_tag_close'] = '</li>';
//            $config['last_link'] = 'Last';
//            $config['last_tag_open'] = '<li>';
//            $config['last_tag_close'] = '</li>';
//            $config['next_link'] = ' &gt;';
//            $config['next_tag_open'] = '<li class="page-numbers next">';
//            $config['next_tag_close'] = '</li>';
//            $config['prev_link'] = '&lt;';
//            $config['Previous_tag_open'] = '<li class = "page-numbers previous">';
//            $config['Previous_tag_close'] = '</li>';
//            $config['cur_tag_open'] = '<li><span class="page-numbers current">';
//            $config['cur_tag_close'] = '</span></li>';
//            $config['num_tag_open'] = '<li class = "page-numbers">';
//            $config['num_tag_close'] = '</li>';
////        $config['display_pages'] = FALSE;
//            $config['attributes'] = array('class' => 'page-numbers');
//            $this->pagination->initialize($config);
//        echo $q;exit;
//            $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
            $data['type'] = $type;
            $data['couponsList'] = $this->subcategory_model->view_subcategory($storeName, '', '', $type);
//            $data['links'] = $this->pagination->create_links();
//            echo "<pre>";
//            print_r($data);exit;
            $this->load->view('ajaxCoupons', $data);
        }
//        exit;
    }

    public function deals() {
        $this->load->library('Headerincludes');
        $data = $this->headerincludes->allHeaderIncludes();
//        $confg = array();
        $config['base_url'] = base_url() . 'index/deals';
        $config['total_rows'] = count($this->coupons_model->get_deals_rows());
//        echo $config['total_rows'];exit;
        $config['per_page'] = 15;
        $config['uri_segment'] = 3;
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
//        $config['anchor_class'] = 'class="page-numbers previous" ';

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : $config['per_page'];

        $data['all_deals'] = $this->coupons_model->get_deals($config['per_page'], $page);
//        echo"<pre>";
//        print_r($data['all_deals']);exit;
        $data['links'] = $this->pagination->create_links();



        $this->load->view('store-deals', $data);
    }

    public function coupons() {
        $this->load->library('Headerincludes');
        $data = $this->headerincludes->allHeaderIncludes();
        $config['base_url'] = base_url() . 'index/coupons';
        $config['total_rows'] = count($this->coupons_model->get_coupons_rows());
//        echo $config['total_rows'];exit;
        $config['per_page'] = 15;
        $config['uri_segment'] = 3;
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
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['all_coupons'] = $this->coupons_model->get_coupons($config['per_page'], $page);
        $data['links'] = $this->pagination->create_links();
//                echo "<pre>";
//        print_r($data['all_coupons']);exit;
        $this->load->view('coupons', $data);
    }

    public function stores() {
        $this->load->library('Headerincludes');
        $data = $this->headerincludes->allHeaderIncludes();
//        $q = $this->uri->segment(3);  
//        $link_value = $_GET['link'];
//        echo $q.'  ' .$link_value;exit;
//        $storeName = $this->input->post('storeName');
//        if (isset($q)) {
//            $config['base_url'] = base_url() . 'index/stores/' . $q;
//            $config['total_rows'] = $this->store_model->get_specific_store_rows($q);
////        $config['total_rows'] = count($this->store_model->view_store($q));
////        echo $config['total_rows'];exit;
//            $config['per_page'] = 10;
//            $config['uri_segment'] = 4;
//            $config['num_links'] = 2;
//            $config['full_tag_open'] = '<ul class = "page-pagination">';
//            $config['full_tag_close'] = '</ul>';
//            $config['first_link'] = 'First';
//            $config['first_tag_open'] = '<li>';
//            $config['first_tag_close'] = '</li>';
//            $config['last_link'] = 'Last';
//            $config['last_tag_open'] = '<li>';
//            $config['last_tag_close'] = '</li>';
//            $config['next_link'] = ' &gt;';
//            $config['next_tag_open'] = '<li class="page-numbers next">';
//            $config['next_tag_close'] = '</li>';
//            $config['prev_link'] = '&lt;';
//            $config['Previous_tag_open'] = '<li class = "page-numbers previous">';
//            $config['Previous_tag_close'] = '</li>';
//            $config['cur_tag_open'] = '<li><span class="page-numbers current">';
//            $config['cur_tag_close'] = '</span></li>';
//            $config['num_tag_open'] = '<li class = "page-numbers">';
//            $config['num_tag_close'] = '</li>';
////        $config['display_pages'] = FALSE;
//            $config['attributes'] = array('class' => 'page-numbers');
//            $this->pagination->initialize($config);
////        echo $q;exit;
//            $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
////        $page = $config['per_page'];
//            $data['specific_item_deals'] = $this->store_model->view_store($q, $config['per_page'], $page);
//
//            $data['links'] = $this->pagination->create_links();
//            $this->load->view('store-deals', $data);
//        } else {
//            $a = $this->input->post('id');
//            exit;
        $char_value = isset($_POST['id']);
//        echo $char_value;exit;
        $data['all_stores'] = $this->store_model->view_store('', '', '', '', $char_value);
//            echo "<pre>";
//            print_r($data['all_stores']);exit;
        $this->load->view('stores', $data);
//        }
    }
   

    public function category() {
        $this->load->library('Headerincludes');
        $data = $this->headerincludes->allHeaderIncludes();
        $q = str_replace('-', ' ', $this->uri->segment(3));
        $data['storeName'] = $q;
        if ((isset($_POST['type']) && ($_POST['type'] == 'Coupon')) || (isset($_POST['type']) && ($_POST['type'] == 'Promotion'))) {
//            echo "hi";exit;
            $config['base_url'] = base_url() . 'index/category/' . str_replace(' ', '-', $q);
            $config['total_rows'] = count($this->subcategory_model->view_subcategory($q));
//        $config['total_rows'] = count($this->store_model->view_store($q));
            echo $config['total_rows'];
            exit;
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
            $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
//            $data['specific_item_deals'] = $this->store_model->view_store1($q, $_POST['type']);
            $data['specific_item_deals'] = $this->subcategory_model->view_subcategory($q, $config['per_page'], $page, $_POST['type']);
//        echo "<pre>";
//        print_r($data);exit;
            $data['links'] = $this->pagination->create_links();
            $this->load->view('store-deals', $data);
        } else {
            $config['base_url'] = base_url() . 'index/category/' . str_replace(' ', '-', $q);
            $config['total_rows'] = count($this->subcategory_model->view_subcategory1($q));
//            echo $config['total_rows'];exit;
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
//            $this->store_model->view_store($q, $config['per_page'], $page); 
            $data['specific_item_deals'] = $this->subcategory_model->view_subcategory1($q, $config['per_page'], $page);
//            echo "<pre>";
//            print_r($data['specific_item_deals']);exit;
            $data['links'] = $this->pagination->create_links();
            $this->load->view('store-deals', $data);
        }
    }

    public function get_categories() {
        $this->load->library('Headerincludes');
        $data = $this->headerincludes->allHeaderIncludes();
        $this->load->view('category-deals', $data);
    }

    public function search_suggestion() {
        $this->load->library('Headerincludes');
        $data = $this->headerincludes->allHeaderIncludes();
        echo "<pre>";
        print_r($data);
        exit;
        $q = $_REQUEST["q"];
        $hint = "";
// lookup all hints from array if $q is different from "" 
        if ($q !== "") {
            $q = strtolower($q);
            $len = strlen($q);
            foreach ($a as $name) {
                if (stristr($q, substr($name, 0, $len))) {
                    if ($hint === "") {
                        $hint = $name;
                    } else {

                        $hint = $hint . "<br>" . $name;
                    }
                }
            }
        }
    }

    public function store_deals_coupons() {
        $type = $_POST['type'];
        $store_name = $_POST['store_name'];
//        echo $type;
//        echo $store_name;
        $data['specific_item_deals'] = $this->store_model->view_store1($store_name, $type);
        echo "<pre>";
        print_r($data);
        exit;
//        echo $type;
//        echo $store_name;
//        exit;
    }

    public function gotostore() {
        $data["rUrl"] = $_REQUEST["r"];
        $data["logo"] = $_REQUEST["img"];
        $this->load->view('gotostore', $data);
    }
}
