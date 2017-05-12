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
    
    public function edit_user($usereditdata){
        $id=$usereditdata['id'];
        echo $id;exit;
        $this->db->where('id',$id);
        $query=  $this->db->update('adduser',$usereditdata);
        if ($query) {
            return TRUE;
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

}
