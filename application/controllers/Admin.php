<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends CI_Controller {

    function __construct() {

        parent::__construct();
        $this->load->library('session','form_validation', 'email');
        $this->load->helper('url', 'form', 'html');
        $this->load->library('pagination');
        $this->load->database();
        $this->load->model('addusers_model');
        $this->load->model('category_model');
        $this->load->model('subcategory_model');
        $this->load->model('brand_model');
    }

    public function index() {
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
//         print_r($data);exit;//
//        $data['group'] = $this->Category_model->cat_group();
        $this->load->view('admin/category/view_category', $data);
    }

    public function category_edit() {
        $data['edit'] = $this->category_model->edit_category();
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
        $data['brandNames'] = $this->brand_model->brandslist();
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

        $data['sublist'] = $this->subcategory_model->subcat_view1( '', $this->uri->segment(3));        
        
        $data['categories'] = $this->category_model->view_category();
        $data['group'] = $this->category_model->cat_group();
        $data['sublist'] = $this->subcategory_model->subcat_view();
    
        $this->load->view('admin/subcategory/view_subcategory',$data);
         
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
    public function addbrandAction($msg = NULL) {
        if (isset($_POST["submit_c"]) == 'submit' || !empty($_POST)) {
            $image_path = time() . "_" . $_POST['brand_name'] . '_' . $_FILES['logo']['name'];
            $allowed_ext = array("jpeg", "jpg", "gif", "png", "zip");
            $tmp_ext = explode(".", $_FILES["logo"]["name"]); //for dividing purpose
            $ext = strtolower(end($tmp_ext)); //for converting capital to small
            if ((($_FILES["logo"]["type"] == "image/jpeg") || ($_FILES["logo"]["type"] == "image/jpg") || ($_FILES["logo"]["type"] == "image/gif") || ($_FILES["logo"]["type"] == "image/png")) && in_array($ext, $allowed_ext)) {
                $target_path = $_SERVER['DOCUMENT_ROOT'] . '/assets/img/';
                // echo $target_path = base_url() . 'assets/img/';

                $target_path = $target_path . basename($image_path);
                if (!file_exists($target_path)) {
                    if (move_uploaded_file($_FILES['logo']['tmp_name'], $target_path)) {
                        $image = $target_path;
                        $maxHeight = 50;
                        $maxWidth = 50;
                        //  echo "The file " . basename($_FILES['image_c']['name']) . " has been uploaded";exit;
                    }
                }
            }
            $cat_data = array(
                'brand_name' => $_POST['brand_name'],
                'logo' => $image_path,
                'status' => 1,
//                'created_by' => $_SESSION['uid'],
                'created_date' => date('Y-m-d H:i:s')
            );
            $this->load->model('brand_model');
            $result = $this->brand_model->add($cat_data);
            if ($result != '') {
                redirect('admin/addBrands');
            } else {
                redirect('admin/addBrands');
            }
        }
    }

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
        $this->load->view('admin/brands/listbrand', $data);
       
    }
    public function brandedit() {
        $data['edit'] = $this->brand_model->brandedit();
        $this->load->view('admin/brands/editbrand', $data);
    }


}

?>