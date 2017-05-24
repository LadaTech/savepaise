<?php

class Subcategories extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->library('session', 'form_validation', 'email');
        $this->load->helper('url', 'form', 'html');
        $this->load->model('subcategory_model');
        $this->load->model('category_model');
//        $this->load->model('Login_model');
    }
    public function index(){
        $this->load->view('admin/subcategory/add_subcatgory');
    }
    
    //To Add Subcategory to admin panel
    public function subcat_add($msg = NULL) {
        // Load our view to be displayed
        if (isset($_POST["sc_submit"]) == 'submit' || !empty($_POST)) {
            //$image_path = $_POST['subname'] . '_' . $_FILES['image_c']['name'];
            $allowed_ext = array("jpeg", "jpg", "gif", "png", "zip");
            $tmp_ext = explode(".", $_FILES["image_c"]["name"]); //for dividing purpose
            $ext = strtolower(end($tmp_ext)); //for converting capital to small
            $image_path = $_SERVER['REQUEST_TIME'] . '.' . $ext;
            if ((($_FILES["image_c"]["type"] == "image/jpeg") || ($_FILES["image_c"]["type"] == "image/jpg") || ($_FILES["image_c"]["type"] == "image/gif") || ($_FILES["image_c"]["type"] == "image/png")) && in_array($ext, $allowed_ext)) {
                $target_path = $_SERVER['DOCUMENT_ROOT'] . '/assets/img/';
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
            $subcat_data = array(
                'category_id' => $_POST['cat_names'],
                'category_group' => $_POST['cat_group'],
                'scat_name' => $_POST['subname'],                
                'logo' => $image_path,
                'status' => 1,
//                'created_by' => $_SESSION['uid'],
                'created_date' => date('Y-m-d H:i:s')
            );
            $this->load->model('subcategory_model');
            if ($result = $this->subcategory_model->subcat_add($subcat_data)) {
                redirect('admin/view_subcategory');
            } else {
                redirect('admin/add_subcategory');
            }
        }
    }
    //To update the status of the subcategories list
     public function status() {

        //print_r($_POST);exit;
        $this->load->model('Subcategory_model');
        $updateStatus = $this->Subcategory_model->status();
        return $updateStatus;
    }
    
     //To search in categories list of the admin panel
    public function search_subcat() {
        $this->load->model('Category_model');
        $subcat_name = $_POST['search_sub'];
        if (isset($subcat_name) && !empty($subcat_name)) {
            $data['categories'] = $this->Category_model->category_list();
            $data['sublist'] = $this->Subcategory_model->search_subcat($subcat_name);
            $this->load->view('admin/subcategories/subcat_list', $data);
        } else {
            redirect('admin/subcat_view');
        }
    }

}
?>