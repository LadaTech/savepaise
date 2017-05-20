<?php
class Category_model extends CI_Model{
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function index(){
        $this->load->database();
        $this->load->helper('form', 'url', 'session');
    }
    public function add_category($cat_data){
        $this->db->set($cat_data);
        $query = $this->db->insert('categories', $cat_data);
        if ($query) {
            return true;
        } else {
            return FALSE;
        }
    }   
    
    public function view_category(){
        $query = $this->db->get('categories');
        $result = $query->result_array();
        return $result;
    }
    
     public function edit_category() {
        //data is retrive from this query 
        $this->db->where('cat_id', $_GET['catid']);
        $query = $this->db->get('categories')->result();
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
    
     public function delete_category($id){
        $data = array(
            'status' => 0,
        );
        $this->db->where('cat_id', $id);
        $query1 = $this->db->delete('categories');
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
    
   
}

