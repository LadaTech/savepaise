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
            //$image_path = $_SERVER['REQUEST_TIME'].'_'. $_FILES['image_c']['name'];
            $allowed_ext = array("jpeg", "jpg", "gif", "png");
            $tmp_ext = explode(".", $_FILES["store_image"]["name"]); //for dividing purpose
            $ext = strtolower(end($tmp_ext)); //for converting capital to small
            $image_path = $_SERVER['REQUEST_TIME'] . '.' . $ext;
            if ((($_FILES["store_image"]["type"] == "image/jpeg") || ($_FILES["store_image"]["type"] == "image/jpg") || ($_FILES["store_image"]["type"] == "image/gif") || ($_FILES["store_image"]["type"] == "image/png")) && in_array($ext, $allowed_ext)) {
                $target_path = $_SERVER['DOCUMENT_ROOT'] . 'assets/images/icons/';
                // echo $target_path = base_url() . 'assets/img/'; 

                $target_path = $target_path . basename($image_path);
                if (!file_exists($target_path)) {
                    if (move_uploaded_file($_FILES['store_image']['tmp_name'], $target_path)) {
                        $image = $target_path;
                        $maxHeight = 50;
                        $maxWidth = 50;
                        //  echo "The file " . basename($_FILES['image_c']['name']) . " has been uploaded";exit;
                    }
                }
            }
            $store_data = array(
                'store_name' => $_POST['store_name'],
                'store_url' => $_POST['store_url'],
                'offer_name' => $_POST['offer_name'],
                'store_image' => $image_path,
                'status' => 1,
                'created_by' => $_SESSION['usertype'],
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

    public function delete_store() {
        $id = $_GET['sid'];
        $data = $this->Store_model->delete_store($id);
        redirect('admin/view_store', $data);
    }

//    public function display_store(){
////        $data['records'] = $this->store_model->view_store()->result();
//        $data['records'] = $this->Store_model->dispaly_store()->result();
//        print_r($data);exit;
//        $this->load->view(base_url().'index',$data);
//    }
    //To update the status of the subcategories list
    public function status() {   
//        alert($_POST['status']);
//        alert($_POST['id']);
        $updateStatus = $this->store_model->status();
        return $updateStatus;
    }

}
?>

