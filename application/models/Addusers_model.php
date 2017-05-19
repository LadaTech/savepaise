<?php

class Addusers_model extends CI_Model {

    function __construct() {
        parent::__construct();       
    }

    public function index() {
        $this->load->databse();
        $this->load->helper('form', 'url', 'session');
    }

//function for adduser
    public function add_user($userdata) {
        $this->load->database();
        $query = $this->db->insert("adduser", $userdata);
        if ($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

//function for view user
    public function view_user() {
        $this->db->select('id, firstname, lastname, email, pnumber, usertype');        
        return $this->db->get('adduser');
    }
    
    public function edit_user($uid){
//        $id=$usereditdata['id'];
//        echo $id;exit;
        $this->db->where('id',$uid);
        $query = $this->db->get('adduser')->result();
        return $query[0];
    }
    public function update_user($usereditdata){
         $this->load->database();
        $id=$usereditdata['id'];
//        echo $id;exit;
        $this->db->where('id',$id);
        $query = $this->db->update("adduser",$usereditdata);
        if ($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    public function delete_user($id) {
        $this->load->database();
        $this->db->where('id', $id);
        $query1 = $this->db->delete('adduser');
        $query = $this->db->get('adduser');
        $result = $query->result_array();

        if ($result) {
            return $result;
        } else {
            return FALSE;
        }
    }
    
    public function add_usertype($usertypedata){
        $this->load->database();
        $query = $this->db->insert("usertypes", $usertypedata);
        if ($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
     public function view_usertype() {                
        return $this->db->get('usertypes');
    }
    public function edit_usertype($uid){
//        $id=$usereditdata['id'];
//        echo $id;exit;
        $this->db->where('id',$uid);
        $query = $this->db->get('usertypes')->result();
        return $query[0];
    }
    public function update_usertype($usertypeeditdata){
//        echo "<pre>";
//        print_r($usertypeeditdata);exit;
         $this->load->database();
        $id=$usertypeeditdata['id'];
    $usertype=$usertypeeditdata['user_type'];
//        echo $id;exit;
        $this->db->where('id',$id);
        $this->db->set('user_type',$usertype);                
        $query = $this->db->update("usertypes",$usertypeeditdata);
        if ($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    public function delete_usertype($id) {
        $this->load->database();
        $this->db->where('id', $id);
        $query1 = $this->db->delete('usertypes');
        $query = $this->db->get('usertypes');
        $result = $query->result_array();
        if ($result) {
            return $result;
        } else {
            return FALSE;
        }
    }

}
