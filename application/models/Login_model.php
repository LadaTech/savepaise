<?PHP

class Login_model extends CI_Model {

    public function __construct() {
        parent::__construct();
//        $this->load->library('session');
    }

    public function index() {
        $this->load->databse();
        $this->load->helper('form', 'url');
        $this->load->library('session');
    }

    //calling a function to login with authorized user details
    public function validate() {
        //  print_r(base64_decode($_POST['upassword']));exit;
        // grab user input
        
        // Prep the query
        $this->db->where('email', $username);
        $this->db->where('password', $pwd);
        // Run the query
        $query = $this->db->get('adduser');
//           $row = $query->result_array();
//           print_r($row);exit;
        $row = $query->row();

        // Let's check if there are any results
        if (count($row) > 0) {
            // If there is a user, then create session data
            $row = $query->row();

            $data = array(
                'uid' => $row->id,
                'uname' => $row->firstname,
                'utype' => $row->usertype,
                'uemail' => $row->email,
                'validated' => true
            );
//            $ci = & get_instance();
//            $ci->session->set_userdata($data);
            $this->session->set_userdata($data);
            return $row;
        }
        // If the previous process did not validate
        // then return false.
        return $row;
    }

    public function sign_up($udata) {
        $this->db->set($udata);
        $query = $this->db->insert('adduser', $udata);
        $query1 = $this->db->get('adduser');
        $row = $query1->result_array();
        if ($row) {
            return $row;
        } else {
            return FALSE;
        }
    }

    public function sign_in() {         
        $username = $this->security->xss_clean($this->input->post('email'));
        $password = $this->security->xss_clean($this->input->post('password'));
        $pwd = base64_encode($password);        
        $this->db->where('email', $username);
        $this->db->where('password', $pwd);
        $query = $this->db->get('adduser');        
        $row = $query->row(); 
//        print_r($row);exit;
        if (count($row) > 0) {
            $data = array(
                'id' => $row->id,
                'firstname' => $row->firstname,
                'lastname' => $row->lastname,
                'email' => $row->email,
                'password' => $row->password,
                'pnumber' => $row->pnumber,
                'usertype' => $row->usertype
            );
           
            $this->session->set_userdata($data);
            return $row;
        }
        // If the previous process did not validate
        // then return false.
        else {
            return FALSE;
        }
    }

}

?>
