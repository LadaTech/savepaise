<?PHP 
defined('BASEPATH') OR exit('No direct script access allowed');

class Banners extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('form_validation', 'email');
        $this->load->helper('url', 'form', 'html');        
        $this->load->model('Login_model');
        $this->load->model('banner_model');
        $this->load->library('upload');
    }
    
    public function add_banner(){
//        echo "<pre>";
//        print_r($_SESSION);        
         if (isset($_POST['sc_submit']) || !empty($_POST)) {
            //$image_path = $_SERVER['REQUEST_TIME'].'_'. $_FILES['image_c']['name'];
            $allowed_ext = array("jpeg", "jpg", "gif", "png");
            $tmp_ext = explode(".", $_FILES["image_c"]["name"]); //for dividing purpose
            $ext = strtolower(end($tmp_ext)); //for converting capital to small
            $image_path = $_SERVER['REQUEST_TIME'] . '.' . $ext;
            if ((($_FILES["image_c"]["type"] == "image/jpeg") || ($_FILES["image_c"]["type"] == "image/jpg") || ($_FILES["image_c"]["type"] == "image/gif") || ($_FILES["image_c"]["type"] == "image/png")) && in_array($ext, $allowed_ext)) {
                $target_path = $_SERVER['DOCUMENT_ROOT'] . '/assets/images/icons/';
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
            $banner_data = array(
                'image' => $image_path,
                'title' => $_POST['title'],
                'description' => $_POST['dicription'],
                'link' => $_POST['link'],
                'rating' => $_POST['rating'],
                'status' => 1,
                'created_by' => $_SESSION['firstname'],
                'created_date' => date('Y-m-d H:i:s')
            );      
            $result = $this->banner_model->add_banner($banner_data);
            if ($result != '') {
                $data['message'] = "banner added successfully";
                $this->load->view("admin/Banners/add_banners", $data);
//                redirect('admin/add_category');
            } else {
                $data['message'] = "error occured while adding";                
                $this->load->view("admin/Banners/add_banners", $data);
//                redirect('admin/add_category');
            }
        }
    }
    
    public function edit_banner(){
        if (isset($_POST['sc_submit']) || !empty($_POST)) {
            $id = $_POST['id'];
//            echo $id;exit;
           $banner_data = array(               
                'title' => $_POST['title'],
                'description' => $_POST['dicription'],
                'link' => $_POST['link'],
                'rating' => $_POST['rating'],                
                'updated_by' => $_SESSION['firstname'],
                'updated_date' => date('Y-m-d H:i:s')
            );  
           if($_FILES["image_c"]["name"] != ''){
            $allowed_ext = array("jpeg", "jpg", "gif", "png");
            $tmp_ext = explode(".", $_FILES["image_c"]["name"]); //for dividing purpose
            $ext = strtolower(end($tmp_ext)); //for converting capital to small
            $image_path = $_SERVER['REQUEST_TIME'] . '.' . $ext;
            if ((($_FILES["image_c"]["type"] == "image/jpeg") || ($_FILES["image_c"]["type"] == "image/jpg") || ($_FILES["image_c"]["type"] == "image/gif") || ($_FILES["image_c"]["type"] == "image/png")) && in_array($ext, $allowed_ext)) {
                $target_path = $_SERVER['DOCUMENT_ROOT'] . '/assets/images/icons/';
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
            $banner_data['image']= $image_name;
           }
//           echo "<pre>";
//           print_r($banner_data);exit;
           if($result = $this->banner_model->update_banner($banner_data,$id))
                redirect('admin/view_banner');
        }
        
    }
    
    public function changeStatus(){
      $updateStatus =  $this->banner_model->changeStatus();
      return $updateStatus;        
    }
    public function banner_sorting(){
        $id = $_POST['sortvalue'];
        $sorting_data = array(
            'sorting' => $_POST['txtboxvalue']);
        $result = $this->banner_model->banner_sorting($sorting_data, $id);
        redirect('admin/view_banner');
    }
    
    public function delete_banner(){
        $id = $_GET['sid'];
        $data = $this->banner_model->delete_banner($id);
        redirect('admin/view_banner');
                
    }
}

?>

