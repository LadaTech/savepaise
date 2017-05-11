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
        $query=$this->db->get('adduser')->result();
        return $query;
    }

}
