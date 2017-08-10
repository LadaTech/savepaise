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
        $insert_id = $this->db->insert_id();
        if ($query) {
            return $insert_id;
        } else {
            return FALSE;
        }
    }

    public function view_store($store_name = '', $limit = '', $start = '') {
//        $this->db->select('id,store_name,store_url,status,created_by,created_date');
        if ($store_name != '') {
            $this->db->select('*');
//            $this->db->from('coupons as c');
//           
//            $this->db->where('store_name',$store_name);
//            $this->db->where('type','Promotion');
//            $this->db->join('subcategories as subcat','c.subcategory_id = subcat.scat_id','left');
//             $this->db->limit($limit);
//            $this->db->order_by('added_date DESC')
            $this->db->where('store_name', $store_name);
            $this->db->where('type', 'Promotion');
            $this->db->limit($limit, $start);
            $this->db->order_by('added_date DESC');
            $this->db->join('coupons', 'stores.id = coupons.store_id ', 'left');
            return $this->db->get('stores')->result();
        } 
        
            $this->db->select('*'); 
//            $this->db->join('coupons', 'stores.id = coupons.store_id ', 'left');
            $this->db->order_by('store_name');
            return $this->db->get('stores')->result();
//        $this->db->from('stores');
//        $this->db->limit($limit);
//        $this->db->order_by('store_name');
       
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

    public function display_store() {
        $this->db->where('status', 1);
        $this->db->order_by('store_name');
        $query = $this->db->get('stores');
        return $query;
    }

    public function getStoreinfobyfield($field = '', $fieldValue = '') {
        if ($field == "offer_id") {
            $this->db->where('offer_id', $fieldValue);
        }
        $query = $this->db->get('stores');
//        echo "<pre>";
//        print_r($this->db);
//        echo "</pre>";
//        exit;
        $row = $query->result_array();
        return $row;
    }

    public function updateStoreByField($store_data, $field = 'id') {
        $id = $store_data[$field];
        $this->db->where($field, $id);
        $query = $this->db->update("stores", $store_data);
        if ($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function get_stores_rows() {
        $this->db->select('*');
        $this->db->order_by('store_name');
        return $this->db->get('stores')->result();
    }

    public function get_specific_store_rows($store_name = '') {
        if ($store_name != '') {
            $this->db->select('*');
            $this->db->where('store_name', $store_name);
            $this->db->where('type', 'Promotion');
//            $this->db->limit($limit);
            $this->db->join('coupons', 'stores.id = coupons.store_id ', 'left');
            $query = $this->db->get('stores');
            return $query->num_rows();
        }
    }

}

?>
