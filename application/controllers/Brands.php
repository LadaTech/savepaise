<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Brands extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('form_validation', 'email');
        $this->load->helper('url', 'form', 'html');
        $this->load->model('Category_model');
        $this->load->model('Login_model');
        $this->load->model('brand_model');
        $this->load->library('upload');
    }

    public function add_brand($msg = NULL) {
        if (isset($_POST["submit_c"]) == 'submit' || !empty($_POST)) {
            $image_path = time() . "_" . $_POST['brand_name'] . '_' . $_FILES['logo']['name'];
            $allowed_ext = array("jpeg", "jpg", "gif", "png", "zip");
            $tmp_ext = explode(".", $_FILES["logo"]["name"]); //for dividing purpose
            $ext = strtolower(end($tmp_ext)); //for converting capital to small
            if ((($_FILES["logo"]["type"] == "image/jpeg") || ($_FILES["logo"]["type"] == "image/jpg") || ($_FILES["logo"]["type"] == "image/gif") || ($_FILES["logo"]["type"] == "image/png")) && in_array($ext, $allowed_ext)) {
                $target_path = $_SERVER['DOCUMENT_ROOT'] . '/assets/images/icons/';
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
                'created_by' => $_SESSION['firstname'],
                'created_date' => date('Y-m-d H:i:s')
            );
            $this->load->model('brand_model');
            $result = $this->brand_model->add($cat_data);
            if ($result != '') {
                $data1['message'] = "Brand added successfully";
                $this->load->view("admin/brands/addbrand", $data1);
//                redirect('admin/addBrands');
            } else {
                $data1['message'] = "error occured while adding";
                $this->load->view("admin/brands/addbrand", $data1);
//                redirect('admin/addBrands');
            }
        }
    }

    public function brandedit() {
        if (isset($_POST["edit_brand"]) == 'submit' || !empty($_POST)) {
            $id = $_POST['id'];
            $edit_data = array(
                'brand_name' => $_POST['edit_brandname'],
                'status' => 1,
                'updated_by' => $_SESSION['firstname'],
                'updated_date' => date('Y-m-d H:i:s')
            );
            if (!empty($_FILES) && $_FILES["image_c"]["name"] != '') {
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
                $image_name = $image_path;
                $edit_data['logo'] = $image_name;
            }
            if ($result = $this->brand_model->brandupdate($edit_data, $id))
                redirect('admin/brandslist');
        }
    }

    public function branddelete() {

        $id = $_GET['id'];
        $data = $this->brand_model->deletebrand($id);
        redirect('admin/brandslist');
    }

    public function status() {
        $updateStatus = $this->brand_model->status();
        return $updateStatus;
    }

    public function brand_name_sorting() {
        $id = $_POST['sortvalue'];
        $sorting_data = array(
            'sort' => $_POST['txtboxvalue']);
        $result = $this->brand_model->update_brand_sorting($sorting_data, $id);
        redirect('admin/brandslist');
    }

    //To logout the admin panel
    function logout() {
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('');
    }

}
