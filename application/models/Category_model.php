<?php

class Category_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function index() {
        $this->load->database();
        $this->load->helper('form', 'url', 'session');
    }

    public function add_category($cat_data) {
        $this->db->set($cat_data);
        $query = $this->db->insert('categories', $cat_data);
        if ($query) {
            return true;
        } else {
            return FALSE;
        }
    }

    public function view_category() {
        $query = $this->db->get('categories');
        $result = $query->result_array();
        return $result;
    }

    public function edit_category() {
        //data is retrive from this query 
        $this->db->where('cat_id', $_GET['catid']);
        $query = $this->db->get('categories')->result_array();
        return $query[0];
    }

    public function update_category($edit_data, $id) {
        $this->db->where('cat_id', $id);
        $query = $this->db->update('categories', $edit_data);
        if ($query) {
            return true;
        } else {
            return FALSE;
        }
    }

    public function delete_category($id) {
       $data = array(
            'status' => 0,
        );
        $this->db->where('cat_id', $id);
        $query1 = $this->db->update('categories', $data);
        $query = $this->db->get('categories');
        $result = $query->result_array();

        if ($result) {
            return $result;
        } else {
            return FALSE;
        }
    }

    public function changeStatus() {
        $this->db->set('status', $_POST['status']);
        $this->db->where('cat_id', $_POST['id']);
        $query = $this->db->update('categories');
        if ($query) {
            return true;
        } else {
            return FALSE;
        }
    }

    public function add_catgroup($catg_data) {
        $this->db->set($catg_data);
        $query = $this->db->insert('category_group', $catg_data);
        if ($query) {
            return true;
        } else {
            return FALSE;
        }
    }

    public function getcat_group() {
        //data is retrive from this query         
        $query = $this->db->get('category_group')->result_array();

        return $query;
    }

    public function getCatGroups($catGroupId = '', $catId = '') {
        if ($catGroupId != '') {
            $this->db->where('g_id', $catGroupId);
        }
        if ($catId != '') {
            $this->db->where('cate_id', $catId);
        }
        $this->db->select('categories.cat_name,category_group.*');
        $this->db->from('categories');
        $this->db->join('category_group', 'category_group.cate_id = categories.cat_id');
        $query = $this->db->get();
        //echo "<pre>";
//        print_r($this->db);
//        echo "</pre>";
//        exit;
        return $result = $query->result_array();
    }

    public function getcat_group1($isAll = '', $perPage = '25', $page = '1', $segment = '') {
        //data is retrive from this query    
        if ($isAll == '') {
            $this->db->limit($perPage, $page);
        }
        //$query = $this->db->get('category_group')->result();
        $this->db->select('categories.cat_name,category_group.*');
        $this->db->from('categories');
        $this->db->join('category_group', 'category_group.cate_id = categories.cat_id');
        $this->db->where('categories.status', 1);
        $this->db->where('category_group.status', 1);
        $this->db->order_by('created_date', 'desc');
        $query = $this->db->get();
        return $result = $query->result_array();
        //return $query 
    }

    // To Edit category of Admin Panel 
    public function cat_group($catGroupId = '', $catId = '') {
        if ($catGroupId != '') {
            $this->db->where('g_id', $catGroupId);
        }
        if ($catId != '') {
            $this->db->where('cate_id', $catId);
        }
        //data is retrive from this query         
        $query = $this->db->get('category_group')->result();
        return $query;
    }

    
    public function group_update($edit_data, $id) {
        $this->db->where('g_id', $id);
        $query = $this->db->update('category_group', $edit_data);
        if ($query) {
            return true;
        } else {
            return FALSE;
        }
    }
    
    public function display_categories(){
        $this->db->where('status',1);
        $this->db->order_by('cat_name');
        $query = $this->db->get('categories');
        return $query;
    }

}
