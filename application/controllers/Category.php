<?php

class Category extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('form_validation', 'email');
        $this->load->helper('form', 'url', 'html');
        $this->load->library('upload');
        $this->load->model('category_model');
    }

    public function index() {
        $this->load->view('admin/category/add_category');
    }

    public function add_category() {
        if (isset($_POST['addcategory']) || !empty($_POST)) {
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
            $cat_data = array(
                'cat_name' => $_POST['catname'],
                'image' => $image_path,
                'status' => 1,
                'created_by' => $_SESSION['firstname'],
                'created_date' => date('Y-m-d H:i:s')
            );
            $this->load->model('Category_model');
            $result = $this->category_model->add_category($cat_data);
            if ($result != '') {
                $data1['message'] = "category added successfully";
                $this->load->view("admin/category/add_category", $data1);
//                redirect('admin/add_category');
            } else {
                $data1['message'] = "error occured while adding"; //                    
                $this->load->view("admin/category/add_category", $data1);
//                redirect('admin/add_category');
            }
        }
    }

    

    public function category_edit() {

        $id = $_POST['id'];
        if (isset($_POST["edit_category"]) == 'submit' || !empty($_POST)) {
            $edit_data = array(
                'cat_name' => $_POST['edit_catname'],
//                'status' => 1,
                'updated_by' => $_SESSION['firstname'],
                'updated_date' => date('Y-m-d H:i:s')
            );
            if (!empty($_FILES) && $_FILES["image_c"]["name"] != '') {
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
                //echo $image_name;exit; 
                $edit_data['image'] = $image_name;
            }
            if ($result = $this->category_model->update_category($edit_data, $id))
                redirect('admin/view_category');
        }
    }

    public function category_delete() {
        $id = $_GET['catid'];

        $data['list'] = $this->category_model->delete_category($id);

        $data['group'] = $this->category_model->cat_group();
        redirect('admin/view_category');
    }

    public function add_catgroup() {
//        echo "<pre>";
//        print_r($_POST); exit;
        if (isset($_POST["submit_g"]) == 'submit' || !empty($_POST)) {
            $allowed_ext = array("jpeg", "jpg", "gif", "png");
            $tmp_ext = explode(".", $_FILES["group_image"]["name"]); //for dividing purpose
            $ext = strtolower(end($tmp_ext)); //for converting capital to small
            $image_path = $_SERVER['REQUEST_TIME'] . '.' . $ext;
            if ((($_FILES["group_image"]["type"] == "image/jpeg") || ($_FILES["group_image"]["type"] == "image/jpg") || ($_FILES["group_image"]["type"] == "image/gif") || ($_FILES["group_image"]["type"] == "image/png")) && in_array($ext, $allowed_ext)) {
                $editImage = 1;
                $target_path = $_SERVER['DOCUMENT_ROOT'] . '/assets/images/icons/';
                // echo $target_path = base_url() . 'assets/img/'; 

                $target_path = $target_path . basename($image_path);
                if (!file_exists($target_path)) {
                    if (move_uploaded_file($_FILES['group_image']['tmp_name'], $target_path)) {
                        $image = $target_path;
                        $maxHeight = 50;
                        $maxWidth = 50;
                        //  echo "The file " . basename($_FILES['image_c']['name']) . " has been uploaded";exit;
                    }
                }
            }
            $image_name = $image_path;
            $catg_data = array(
                'cate_id' => $_POST['catg_names'],
                'group_name' => $_POST['c_group'],
                'image' => $image_path,
                'status' => 1,
                'created_by' => $_SESSION['firstname'],
                'created_date' => date('Y-m-d H:i:s')
            );

            $result = $this->category_model->add_catgroup($catg_data);

            if ($result != '') {
                $data['message'] = "category gruop added successfully";
                $data['category'] = $this->category_model->view_category();
                $this->load->view("admin/category/add_category_group", $data);
//                redirect('admin/categorygroup_list?mes=1');
//                redirect('admin/add_category_group');
            } else {
                $data['message'] = "error occured while adding";
                $data['category'] = $this->category_model->view_category();
                $this->load->view("admin/category/add_category_group", $data);
//              redirect('admin/add_category_group');
            }
        }
    }

    public function edit_catgroup() {
        $id = $_POST['editgroupId'];        
        if (isset($_POST["submit_g"]) == 'submit' || !empty($_POST)) {
             $catg_data = array(
                'cate_id' => $_POST['catg_names'],
                'group_name' => $_POST['c_group'],

//                'status' => 0,
                'updated_by' => $_SESSION['firstname'],
                'updated_date' => date('Y-m-d H:i:s')
            );
            if (!empty($_FILES) && $_FILES["group_image"]["name"] != '') {
                $allowed_ext = array("jpeg", "jpg", "gif", "png");
                $tmp_ext = explode(".", $_FILES["group_image"]["name"]); //for dividing purpose
                $ext = strtolower(end($tmp_ext)); //for converting capital to small
                $image_path = $_SERVER['REQUEST_TIME'] . '.' . $ext;
                if ((($_FILES["group_image"]["type"] == "image/jpeg") || ($_FILES["group_image"]["type"] == "image/jpg") || ($_FILES["group_image"]["type"] == "image/gif") || ($_FILES["group_image"]["type"] == "image/png")) && in_array($ext, $allowed_ext)) {
//                $editImage = 1;
                    $target_path = $_SERVER['DOCUMENT_ROOT'] . '/assets/images/icons/';
                    // echo $target_path = base_url() . 'assets/img/'; 

                    $target_path = $target_path . basename($image_path);
                    if (!file_exists($target_path)) {
                        if (move_uploaded_file($_FILES['group_image']['tmp_name'], $target_path)) {
                            $image = $target_path;
                            $maxHeight = 50;
                            $maxWidth = 50;
                            //  echo "The file " . basename($_FILES['image_c']['name']) . " has been uploaded";exit;
                        }
                    }
                }
                  $image_name = $image_path;
                //echo $image_name;exit; 
                $catg_data['image'] = $image_name;
            }
            if ($result = $this->category_model->group_update($catg_data, $id))                  
                redirect('admin/view_category_group');
        }
    }
          

            
  

    /**
     * Function to update sorting value in categories
     */
    public function category_name_sorting() {
        $id = $_POST['sortvalue'];
        $sorting_data = array(
            'sorting' => $_POST['txtboxvalue']);
        $result = $this->category_model->update_category_sorting($sorting_data, $id);
        redirect('admin/view_category');
    }
    
    public function change_cat_Status() {        
        $updateStatus = $this->category_model->changeStatus();
        return $updateStatus;
    }

    public function category_group_sorting() {
        $id = $_POST['sortvalue'];
        $sorting_data = array(
            'sorting' => $_POST['txtboxvalue']);
        $result = $this->category_model->update_categorygroup_sorting($sorting_data, $id);
        redirect('admin/view_category');
    }

    public function change_cat_group_Status() {
        $updateStatus = $this->category_model->change_cat_group_Status();
        return $updateStatus;
    }

}

?>
