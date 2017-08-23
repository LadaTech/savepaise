<?PHP

defined('BASEPATH') OR exit('No direct script access allowed');

class stores extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation', 'email');
        $this->load->helper('url', 'form', 'html');
        $this->load->model('store_model');
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
                $target_path = $_SERVER['DOCUMENT_ROOT'] . '/assets/images/icons/';
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
                'created_by' => $_SESSION['firstname'],
                'created_date' => date('Y-m-d H:i:s')
            );
            $result = $this->store_model->add_store($store_data);
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
            $id = $_POST['id'];
            $store_data = array(                
                'store_name' => $_POST['store_name'],
                'store_url' => $_POST['store_url'],
                'store_url' => $_POST['offer_name'],
//            'store_image' => $image_name,
                'updated_by' => $_SESSION['firstname'],
                'updated_date' => date('Y-m-d H:i:s')
            );
            if ($_FILES["store_image"]["name"] != ''){
                $allowed_ext = array("jpeg", "jpg", "gif", "png");
                $tmp_ext = explode(".", $_FILES["store_image"]["name"]); //for dividing purpose
                $ext = strtolower(end($tmp_ext)); //for converting capital to small
                $image_path = $_SERVER['REQUEST_TIME'] . '.' . $ext;
                if ((($_FILES["store_image"]["type"] == "image/jpeg") || ($_FILES["store_image"]["type"] == "image/jpg") || ($_FILES["store_image"]["type"] == "image/gif") || ($_FILES["store_image"]["type"] == "image/png")) && in_array($ext, $allowed_ext)) {
                    $target_path = $_SERVER['DOCUMENT_ROOT'] . 'assets/images/icons/';
                    // echo $target_path = base_url() . 'assets/img/'; 

                    $target_path = $target_path . basename($image_path);
                    if (!file_exists($target_path)) {
                        if (move_uploaded_file($_FILES['image_c']['tmp_name'], $target_path)) {
                            $image = $target_path;
                            $maxHeight = 50;
                            $maxWidth = 50;
                            //  echo "The file " . basename($_FILES['image_c']['name']) . " has been uploaded";exit;
                        }
                    }
                }
                $image_name = $image_path;
                $store_data['store_image'] = $image_name;
            }
//                    echo "<pre>";
//        print_r( $store_data);exit;
            
            $result = $this->store_model->update_store($store_data,$id);
            redirect('admin/view_store');
            
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
    public function changeStatus() {
        $this->load->model('store_model');
        $updateStatus = $this->store_model->changeStatus();
        return $updateStatus;
    }

    public function store_name_sorting() {
        $id = $_POST['sortvalue'];
        $sorting_data = array(
            'sort' => $_POST['txtboxvalue']);
        $result = $this->store_model->update_store_sorting($sorting_data, $id);
        redirect('admin/view_subcategory');
    }

}
?>

