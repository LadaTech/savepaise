<?PHP

defined('BASEPATH') OR exit('No direct script access allowed');

class stores extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation', 'email');
        $this->load->helper('url', 'form', 'html');
        $this->load->model('Store_model');
    }

    public function index() {
        
    }

    public function add_store() {
        if (isset($_POST["store_submit"]) == 'submit' || !empty($_POST)) {
            $store_data = array(
                'store_name' => $_POST['store_name'],
                'store_url' => $_POST['store_url'],
                'status' => 1,
                'created_by'=>$_SESSION['uid'],
                'created_date' => date('Y-m-d H:i:s')
            );
            $result = $this->Store_model->add_store($store_data);
            if ($result != '') {
                $data['message'] = "stores added successfully";
                $this->load->view("admin/stores/addstore", $data);
            } else {
                $data['message'] = "error occured while adding";
                $this->load->view("admin/stores/addstore", $data);
            }
        }
    }

    public function edit_store() {
        if (isset($_POST["store_edit"]) == 'submit' || !empty($_POST)) {
            $store_data = array(
                'id' => $_POST['id'],
                'store_name' => $_POST['store_name'],
                'store_url' => $_POST['store_url'],
                'updated_by' => $_SESSION['uid'],
                'updated_date' => date('Y-m-d H:i:s')
            );            
            $result = $this->Store_model->update_store($store_data);
            if ($result != '') {
                redirect('admin/view_store');
            } else {
                redirect('admin/edit_store'); 
            }
        }
    }
    
    public function delete_store(){
        $id = $_GET['sid'];
       $data = $this->Store_model->delete_store($id);
        redirect('admin/view_store',$data);
    }
}
    ?>

