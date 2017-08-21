<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends CI_Controller {

    function __construct() {

        parent::__construct();

        $this->load->library('form_validation', 'email');
        $this->load->helper('url', 'form', 'html');
        $this->load->library('pagination');
        $this->load->database();
        $this->load->model('addusers_model');
        $this->load->model('category_model');
        $this->load->model('subcategory_model');
        $this->load->model('brand_model');
        $this->load->model('login_model');
        $this->load->model('store_model');
        $this->load->model('coupons_model');
    }

    public function index() {
        if ((isset($_SESSION['uemail'])) && ($_SESSION['utype'] == 2 || $_SESSION['utype'] == 1)) {
            $this->load->view('admin/dashboard');
        } else {
            redirect(base_url() . 'index');
        }
    }

    public function dashboard() {
        $this->load->view('admin/index');
    }

    public function add_user() {
        $this->load->database();
        $data['utype'] = $this->addusers_model->view_usertype()->result();
//        print_r($this->session);
//        $data['session']= $this->session;
//        echo "<pre>";
//        print_r($data);exit;
        $this->load->view('admin/add_user', $data);
    }

    public function view_user() {
        $this->load->database();
        $data['records'] = $this->addusers_model->view_user()->result();
        $data['utype'] = $this->addusers_model->view_usertype()->result();
//        echo "<pre>";
//        print_r($data);exit;
        $this->load->view('admin/view_user', $data);
    }

    public function edit_user() {
        $uid = $_GET['uid'];
        $this->load->database();
        $data['utdata'] = $this->addusers_model->view_usertype()->result();

        $data['udata'] = $this->addusers_model->edit_user($uid);
//         echo "<pre>";
//        print_r($data);exit;
        $this->load->view('admin/edit_user', $data);
    }

    public function add_usertype() {
        
        $this->load->view('admin/usertype/add_usertype');
    }

    public function view_usertype() {
        $this->load->database();
        $data['utype'] = $this->addusers_model->view_usertype()->result();

        $this->load->view('admin/usertype/view_usertype', $data);
    }

    public function edit_usertype() {
        $uid = $_GET['uid'];
        $this->load->database();
        $data['utdata'] = $this->addusers_model->edit_usertype($uid);
//         echo "<pre>";
//        print_r($data);exit;
        $this->load->view('admin/usertype/edit_usertype', $data);
    }

    public function add_category() {

        $this->load->view('admin/category/add_category');
//        $this->load->view('admin/footer');
    }

    public function view_category() {
        //$config['base_url'] = site_url("admin/category_list/" . $this->uri->segment(3) . "/" . $this->uri->segment(4));
        //$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
//        $config['base_url'] = site_url("admin/category_list/");
//
//        //$config['base_url'] = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
//        $config['per_page'] = "10";
//        $data['per_page'] = $config['per_page'];
//        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
//        $data['allRecords'] = $this->Category_model->category_list1('all', $config["per_page"], $data['page'], $this->uri->segment(3));
//
//        $config['total_rows'] = sizeof($data['allRecords']);
//        $data['total_rows'] = $config['total_rows'];
//        $config["uri_segment"] = 3;
////        $choice = $config["total_rows"] / $config["per_page"];
//        $choice = 10;
//        $config["num_links"] = floor($choice);
//
//        // integrate bootstrap pagination
//        $config['full_tag_open'] = '<ul class="pagination">';
//        $config['full_tag_close'] = '</ul>';
//        $config['first_link'] = false;
//        $config['last_link'] = false;
//        $config['first_tag_open'] = '<li>';
//        $config['first_tag_close'] = '</li>';
//        $config['prev_link'] = '«';
//        $config['prev_tag_open'] = '<li class="prev">';
//        $config['prev_tag_close'] = '</li>';
//        $config['next_link'] = '»';
//        $config['next_tag_open'] = '<li>';
//        $config['next_tag_close'] = '</li>';
//        $config['last_tag_open'] = '<li>';
//        $config['last_tag_close'] = '</li>';
//        $config['cur_tag_open'] = '<li class="active"><a href="#">';
//        $config['cur_tag_close'] = '</a></li>';
//        $config['num_tag_open'] = '<li>';
//        $config['num_tag_close'] = '</li>';
//        $this->pagination->initialize($config);
//        $data['pagination'] = $this->pagination->create_links();
//
        $data['cat_list'] = $this->category_model->view_category();
//        echo "<pre>";
//         print_r($data);exit;
//        $data['group'] = $this->Category_model->cat_group();
        $this->load->view('admin/category/view_category', $data);
    }

    public function category_edit() {
        $data['edit'] = $this->category_model->edit_category();
//        echo "<pre>";
//        print_r($data);exit;
        $this->load->view('admin/category/edit_category', $data);
    }

    public function add_category_group() {
        $data['category'] = $this->category_model->view_category();
//        echo "<pre>";
//        print_r($data);exit;
        $this->load->view('admin/category/add_category_group', $data);
//        $this->load->view('admin/footer');
    }

    public function view_category_group() {
        //$config['base_url'] = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
//        $config['base_url'] = site_url("admin/categorygroup_list");
//        $config['per_page'] = "10";
//        $data['per_page'] = $config['per_page'];
//        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
//        $data['allRecords'] = $this->Category_model->getcat_group1('all', $config["per_page"], $data['page'], $this->uri->segment(3));
//
//        $config['total_rows'] = sizeof($data['allRecords']);
//        $data['total_rows'] = $config['total_rows'];
//        $config["uri_segment"] = 3;
////        $choice = $config["total_rows"] / $config["per_page"];
//        $choice = 10;
//
//        $config["num_links"] = floor($choice);
//
//        // integrate bootstrap pagination
//        $config['full_tag_open'] = '<ul class="pagination">';
//        $config['full_tag_close'] = '</ul>';
//        $config['first_link'] = false;
//        $config['last_link'] = false;
//        $config['first_tag_open'] = '<li>';
//        $config['first_tag_close'] = '</li>';
//        $config['prev_link'] = '«';
//        $config['prev_tag_open'] = '<li class="prev">';
//        $config['prev_tag_close'] = '</li>';
//        $config['next_link'] = '»';
//        $config['next_tag_open'] = '<li>';
//        $config['next_tag_close'] = '</li>';
//        $config['last_tag_open'] = '<li>';
//        $config['last_tag_close'] = '</li>';
//        $config['cur_tag_open'] = '<li class="active"><a href="#">';
//        $config['cur_tag_close'] = '</a></li>';
//        $config['num_tag_open'] = '<li>';
//        $config['num_tag_close'] = '</li>';
//        $this->pagination->initialize($config);
//        $data['pagination'] = $this->pagination->create_links();
//
        $data['list'] = $this->category_model->getcat_group1('', $this->uri->segment(3));

        $data['category'] = $this->category_model->view_category();
        $data['catgroup'] = $this->category_model->getCatGroups();
//        echo "<pre>";
//        print_r($data);exit;
        $this->load->view('admin/category/view_category_group', $data);
    }

    public function add_subcategory() {
        $data['categories'] = $this->category_model->view_category();

        $data['catgroup'] = $this->category_model->getcat_group();
//        $data['brandNames'] = $this->brand_model->brandslist();
//         echo "<pre>";
//        print_r($data);exit;
        $this->load->view('admin/subcategory/add_subcategory', $data);
    }

    public function view_subcategory() {
//        $config['base_url'] = site_url("admin/subcat_view");
//        $config['per_page'] = "10";
//        $data['per_page'] = $config['per_page'];
//        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
//        $data['allRecords'] = $this->subcategory_model->subcat_view1('all', $config["per_page"], $data['page'], $this->uri->segment(3));
////        echo "<pre>";
////        print_r($data['allRecords']);
////        echo "</pre>";exit;
//        $config['total_rows'] = sizeof($data['allRecords']);
//        $data['total_rows'] = $config['total_rows'];
//        $config["uri_segment"] = 3;
////        $choice = $config["total_rows"] / $config["per_page"];
//        $choice = 10;
//
//        $config["num_links"] = floor($choice);
//
//        // integrate bootstrap pagination
//        $config['full_tag_open'] = '<ul class="pagination">';
//        $config['full_tag_close'] = '</ul>';
//        $config['first_link'] = false;
//        $config['last_link'] = false;
//        $config['first_tag_open'] = '<li>';
//        $config['first_tag_close'] = '</li>';
//        $config['prev_link'] = '«';
//        $config['prev_tag_open'] = '<li class="prev">';
//        $config['prev_tag_close'] = '</li>';
//        $config['next_link'] = '»';
//        $config['next_tag_open'] = '<li>';
//        $config['next_tag_close'] = '</li>';
//        $config['last_tag_open'] = '<li>';
//        $config['last_tag_close'] = '</li>';
//        $config['cur_tag_open'] = '<li class="active"><a href="#">';
//        $config['cur_tag_close'] = '</a></li>';
//        $config['num_tag_open'] = '<li>';
//        $config['num_tag_close'] = '</li>';
//        $this->pagination->initialize($config);
//        $data['pagination'] = $this->pagination->create_links();

        $data['sublist'] = $this->subcategory_model->subcat_view1('', $this->uri->segment(3));

        $data['categories'] = $this->category_model->view_category();
        $data['group'] = $this->category_model->cat_group();
        $data['sublist'] = $this->subcategory_model->subcat_view();

        $this->load->view('admin/subcategory/view_subcategory', $data);
    }

    public function editcategory_group() {
        $data['catGroup'] = $this->category_model->cat_group($_REQUEST['catid']);
        $data['categories'] = $this->category_model->view_category();
//        echo "<pre>";
//        print_r($data);exit;
        $this->load->view('admin/category/edit_category_group', $data);
    }

    //To display the subcategory_edit for the Admin Panel
    public function subcat_edit() {
        $data['subedit'] = $this->subcategory_model->getsubcategory();
        $data['categories'] = $this->category_model->view_category();
        $data['catgroup'] = $this->category_model->getcat_group();
//        echo "<pre>";
//        print_r($data);exit;
        //$data['sublist'] = $this->subcategory_model->subcat_view();       
        $this->load->view('admin/subcategory/edit_subcategory', $data);
    }

    //End of the Function 
    //To add brands 
    public function addBrands() {
        $this->load->view('admin/brands/addbrand');
    }

    //To Add category to admin panel
    //End of the Function 
    //To display the Brands_list for the Admin Panel
    public function brandslist() {
        //$config['base_url'] = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
//        $config['base_url'] = site_url("admin/brandslist");
//        $config['per_page'] = "10";
//        $data['per_page'] = $config['per_page'];
//        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
//        $totalRecords = $this->Brand_model->getCount();
//
//        $config['total_rows'] = $totalRecords[0]['countbrands'];
//        $data['total_rows'] = $config['total_rows'];
//        $config["uri_segment"] = 3;
////        $choice = $config["total_rows"] / $config["per_page"];
//        $choice = 10;
//
//        $config["num_links"] = floor($choice);
//
//        // integrate bootstrap pagination
//        $config['full_tag_open'] = '<ul class="pagination">';
//        $config['full_tag_close'] = '</ul>';
//        $config['first_link'] = false;
//        $config['last_link'] = false;
//        $config['first_tag_open'] = '<li>';
//        $config['first_tag_close'] = '</li>';
//        $config['prev_link'] = '«';
//        $config['prev_tag_open'] = '<li class="prev">';
//        $config['prev_tag_close'] = '</li>';
//        $config['next_link'] = '»';
//        $config['next_tag_open'] = '<li>';
//        $config['next_tag_close'] = '</li>';
//        $config['last_tag_open'] = '<li>';
//        $config['last_tag_close'] = '</li>';
//        $config['cur_tag_open'] = '<li class="active"><a href="#">';
//        $config['cur_tag_close'] = '</a></li>';
//        $config['num_tag_open'] = '<li>';
//        $config['num_tag_close'] = '</li>';
//        $this->pagination->initialize($config);
//        $data['pagination'] = $this->pagination->create_links();

        $data['list'] = $this->brand_model->brandslist1('', $this->uri->segment(3));

        //$data['list'] = $this->Brand_model->brandslist();
        $data['group'] = $this->category_model->cat_group();
//        echo "<pre>";
//        print_r($data);exit;
        $this->load->view('admin/brands/listbrand', $data);
    }

    public function brandedit() {
        $data['edit'] = $this->brand_model->brandedit();
        $this->load->view('admin/brands/editbrand', $data);
    }

    public function add_store() {
        $this->load->view('admin/stores/addstore');
    }

    public function view_store() {
      $config['base_url'] = base_url() . 'admin/view_store';
        $config['total_rows'] = count($this->store_model->get_stores_rows());
//       echo $config['total_rows'];exit;
//        echo $config['total_rows'];exit;
        $config['per_page'] = 10;
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
//         echo  $this->uri->segment(2);exit;
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
//        echo $page."   ".$config['per_page'];exit;
        $data['records'] = $this->store_model->view_store('',$config['per_page'],$page);
//               echo "<pre>";
//        print_r($data['records']);exit;
        $data['links'] = $this->pagination->create_links();

       

        $this->load->view('admin/stores/view_store', $data);
    }

    public function edit_store() {
        $this->load->database();
        $uid = $_GET['sid'];
        $data['store_data'] = $this->store_model->edit_store($uid);
//         echo "<pre>";
//        print_r($data);exit;
        $this->load->view('admin/stores/edit_store', $data);
    }

    public function view_coupon() {
        //$config['base_url'] = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
//        $config['base_url'] = site_url("admin/categorygroup_list");
//        $config['per_page'] = "10";
//        $data['per_page'] = $config['per_page'];
//        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
//        $data['allRecords'] = $this->Category_model->getcat_group1('all', $config["per_page"], $data['page'], $this->uri->segment(3));
//
//        $config['total_rows'] = sizeof($data['allRecords']);
//        $data['total_rows'] = $config['total_rows'];
//        $config["uri_segment"] = 3;
////        $choice = $config["total_rows"] / $config["per_page"];
//        $choice = 10;
//
//        $config["num_links"] = floor($choice);
//
//        // integrate bootstrap pagination
//        $config['full_tag_open'] = '<ul class="pagination">';
//        $config['full_tag_close'] = '</ul>';
//        $config['first_link'] = false;
//        $config['last_link'] = false;
//        $config['first_tag_open'] = '<li>';
//        $config['first_tag_close'] = '</li>';
//        $config['prev_link'] = '«';
//        $config['prev_tag_open'] = '<li class="prev">';
//        $config['prev_tag_close'] = '</li>';
//        $config['next_link'] = '»';
//        $config['next_tag_open'] = '<li>';
//        $config['next_tag_close'] = '</li>';
//        $config['last_tag_open'] = '<li>';
//        $config['last_tag_close'] = '</li>';
//        $config['cur_tag_open'] = '<li class="active"><a href="#">';
//        $config['cur_tag_close'] = '</a></li>';
//        $config['num_tag_open'] = '<li>';
//        $config['num_tag_close'] = '</li>';
//        $this->pagination->initialize($config);
//        $data['pagination'] = $this->pagination->create_links();     
//$data['records'] = $this->addusers_model->view_user()->result();
        $data['records'] = $this->coupons_model->view_coupon();
//        echo "<pre>";
//        print_r($data);exit;
        $this->load->view('admin/coupons/view_coupons', $data);
    }

    public function edit_coupon() {
        $id = $_GET['sid'];

//         echo "<pre>";
//        print_r($data['store']);exit;
        $data['coupon_data'] = $this->coupons_model->edit_coupon($id);
        $data['subcategory_data'] = $this->subcategory_model->view_subcat()->result();
        $data['store_data'] = $this->store_model->view_store();
//           echo "<pre>";
//        print_r($data);exit;
        $this->load->view('admin/coupons/edit_coupon', $data);
    }

    public function add_coupon() {
         $data['store_data'] = $this->store_model->view_store();
        $data['subcategory_data'] = $this->subcategory_model->view_subcat()->result();
//        echo "<pre>";
//        print_r($data);exit;
        $this->load->view('admin/coupons/add_coupon',$data);
    }

}

?>