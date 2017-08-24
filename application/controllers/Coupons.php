<?PHP

defined('BASEPATH') OR exit('No direct script access allowed');

class Coupons extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation', 'email');
        $this->load->helper('url', 'form', 'html');
        $this->load->model('Coupons_model');
        $this->load->model('store_model');
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

}

?>
