<?PHP

class Store_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function index() {
        $this->load->helper('form', 'url');
//        $this->load->library('session');
    }

    public function add_store($data) {
        $this->db->set($data);
        $query = $this->db->insert('stores', $data);
        if ($query) {
            return true;
        } else {
            return FALSE;
        }
    }

    public function view_store() {
        $this->db->select('id,store_name,store_url,status,created_by,created_date');
        return $this->db->get('stores');
    }

    public function edit_store($uid) {
        $this->db->where('id', $uid);
        $query = $this->db->get('stores')->result();
        return $query[0];
    }

    public function update_store($store_data) {
        $id = $store_data['id'];
        $this->db->where('id', $id);
        $query = $this->db->update("stores", $store_data);
        if ($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function delete_store($id) {
        $this->db->where('id', $id);
        $this->db->delete('stores');
        $query = $this->db->get('stores');
        $result = $query->result_array();
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }
    
    public function display_store(){
        $this->db->where('status',1);
        $this->db->order_by('store_name');
        $query = $this->db->get('stores');       
        return $query;
    }

}

?>
