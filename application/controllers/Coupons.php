<?PHP

defined('BASEPATH') OR exit('No direct script access allowed');

class Coupons extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation', 'email');
        $this->load->helper('url', 'form', 'html');
        $this->load->model('Coupons_model');
        $this->load->library('pagination');
        $this->load->model('login_model');
        $this->load->model('category_model');
        $this->load->model('addusers_model');
        $this->load->model('store_model');
        $this->load->model('brand_model');
        $this->load->model('vcommision_model');
        $this->load->model('subcategory_model');
    }

    public function index() {
        
    }

    public function add_coupon() {
        if (isset($_POST["coupon_add"]) == 'submit' || !empty($_POST)) {
            $coupon_data = array(
                'promo_id' => $_POST['promo_id'],
                'store_id' => $_POST['store_id'],
                'title' => $_POST['title'],
                'category_id' => $_POST['category_id'],
                'subcategory_id' => $_POST['subcategory_id'],
                'description' => $_POST['description'],
                'type' => $_POST['type'],
                'code' => $_POST['code'],
                'ref_id' => $_POST['ref_id'],
                'link' => $_POST['link'],
//                'created_by' => $_SESSION['uid'],
                'created_date' => date('Y-m-d H:i:s')
            );
            $result = $this->Coupons_model->insert($coupon_data);
            if ($result != '') {
                $data['message'] = "coupon added successfully";
                $data['store_data'] = $this->store_model->view_store();
                $data['subcategory_data'] = $this->subcategory_model->view_subcat()->result();
                $this->load->view('admin/coupons/add_coupon', $data);
            } else {
                $data['message'] = "Error occured while adding coupon";
                $data['store_data'] = $this->store_model->view_store();
                $data['subcategory_data'] = $this->subcategory_model->view_subcat()->result();
                $this->load->view('admin/coupons/add_coupon', $data);
            }
        }
    }

    public function edit_coupon() {
        if (isset($_POST["coupon_edit"]) == 'submit' || !empty($_POST)) {
            $coupon_data = array(
                'c_id' => $_POST['id'],
                'promo_id' => $_POST['promo_id'],
                'store_id' => $_POST['store_id'],
                'title' => $_POST['title'],
                'category_id' => $_POST['category_id'],
                'subcategory_id' => $_POST['subcategory_id'],
                'description' => $_POST['description'],
                'type' => $_POST['type'],
                'code' => $_POST['code'],
                'ref_id' => $_POST['ref_id'],
                'link' => $_POST['link'],
//                'updated_by' => $_SESSION['uid'],
                'updated_date' => date('Y-m-d H:i:s')
            );
            $result = $this->Coupons_model->update_coupon($coupon_data);
            if ($result != '') {
                redirect('admin/view_coupon');
            } else {
                redirect('admin/coupons/edit_coupon');
            }
        }
    }

    public function delete_coupon() {
        $id = $_GET['sid'];
        $data = $this->Coupons_model->delete_coupon($id);
        redirect('admin/view_coupon', $data);
    }

//    public function display_store(){
////        $data['records'] = $this->store_model->view_store()->result();
//        $data['records'] = $this->Store_model->dispaly_store()->result();
//        print_r($data);exit;
//        $this->load->view(base_url().'index',$data);
//    }
    //To update the status of the subcategories list
    public function changeStatus() {
        $updateStatus = $this->Coupons_model->changeStatus();
        return $updateStatus;
    }

    public function coupon_sorting() {
        $id = $_POST['sortvalue'];
        $sorting_data = array(
            'c_sort' => $_POST['txtboxvalue'],
        );
        $result = $this->Coupons_model->coupon_sorting($sorting_data, $id);
        redirect('admin/view_coupon');
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

    public function category() {
        $this->load->library('Headerincludes');
        $data = $this->headerincludes->allHeaderIncludes();
        $q = str_replace('-', ' ', $this->uri->segment(3));
        $data['storeName'] = $q;
        if ((isset($_POST['type']) && ($_POST['type'] == 'Coupon')) || (isset($_POST['type']) && ($_POST['type'] == 'Promotion'))) {
//            echo "hi";exit;
            $config['base_url'] = base_url() . 'coupons/category/' . str_replace(' ', '-', $q);
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
            $config['base_url'] = base_url() . 'coupons/category/' . str_replace(' ', '-', $q);
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

}

?>
