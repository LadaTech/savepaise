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

    public function view_store1($store_name = '', $type = '', $limit = '10', $start = '0') {
//        echo $store_name;
//        echo $type;
        $this->db->select('*');
        $this->db->join('coupons', 'stores.id = coupons.store_id ', 'left');
        if ($store_name != '') {
            $this->db->where('stores.store_name', $store_name);
        }
        if ($type != '') {
            $this->db->where('coupons.type', $type);
        }
        $this->db->order_by('added_date DESC');
//        $this->db->limit($limit, $start);
        $query = $this->db->get('stores');
//        print_r($this->db);
        return $query->result();
    }

    public function view_store($store_name = '', $limit = '', $start = '', $type = '', $char_value = '') {

        if ($store_name != '') {
            $this->db->select('*');
            $this->db->where('store_name', $store_name);
            $this->db->limit($limit, $start);
            $this->db->order_by('stores.status desc');
            $this->db->join('coupons', 'stores.id = coupons.store_id ', 'left');
            return $this->db->get('stores')->result();
        }
//        if ($store_name != '' && $type == 'deals' ) {
//            $this->db->select('*');
//            $this->db->where('store_name', $store_name);
//            $this->db->where('type','Promotion');
//            $this->db->limit($limit, $start);
//            $this->db->order_by('added_date DESC');
//            $this->db->join('coupons', 'stores.id = coupons.store_id ', 'left');
//            return $this->db->get('stores')->result();
//        }
//        if ($store_name != '' && $type == 'coupons' ) {
//            $this->db->select('*');
//            $this->db->where('store_name', $store_name);
//            $this->db->where('type','Coupon');
//            $this->db->limit($limit, $start);
//            $this->db->order_by('added_date DESC');
//            $this->db->join('coupons', 'stores.id = coupons.store_id ', 'left');
//            return $this->db->get('stores')->result();
//        }
        if (($limit != '') || ($start != '')) {
            $this->db->select('*');
            $this->db->order_by('status DESC');
            $this->db->limit($limit, $start);
            return $this->db->get('stores')->result();
        }
//        if($char_value != ''){
//        $this->db->select('*,count(coupons.store_id) as offers'); 
//        $this->db->where('store_name','like'.$char_value.'%');
//        $this->db->join('coupons', 'stores.id = coupons.store_id ', 'left');
//        $this->db->order_by('store_name', 'asc');
//        $this->db->group_by('id');
////        $this->db->limit($limit, $start);
//        return $this->db->get('stores')->result();   
//        }

        $this->db->select('*,count(coupons.store_id) as offers');
        $this->db->join('coupons', 'stores.id = coupons.store_id ', 'left');
        $this->db->order_by('store_name', 'asc');
        $this->db->group_by('id');
//        $this->db->limit($limit, $start);
        return $this->db->get('stores')->result();
    }

    public function number_of_offers() {
        $this->db->select('*');
        $this->db->join('coupons', 'stores.id = coupons.store_id ', 'left');
    }

    public function edit_store($uid) {
        $this->db->where('id', $uid);
        $query = $this->db->get('stores')->result();
        return $query[0];
    }

    public function update_store($store_data, $id) {
//        $id = $store_data['id'];
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
        $this->db->select('*,count(coupons.store_id) as offers');
//        $this->db->where('store.status', 1);
        $this->db->order_by('stores.sort', 'asc');
//        $query = $this->db->get('stores');
//        return $query;

        $this->db->join('coupons', 'stores.id = coupons.store_id ', 'left');
//        $this->db->order_by('store_name', 'asc');
        $this->db->group_by('stores.id');
        $this->db->where('stores.status', 1);
//        $this->db->limit($limit, $start);
        return $this->db->get('stores');
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

    public function changeStatus() {
        $this->db->set('status', $_POST['status']);
        $this->db->where('id', $_POST['id']);
        $query = $this->db->update('stores');
        if ($query) {
            return true;
        } else {
            return FALSE;
        }
    }

    public function update_store_sorting($sorting_id, $id) {
        $this->db->where('id', $id);
        $query = $this->db->update('stores', $sorting_id);
        if ($query) {
            return true;
        } else {
            return FALSE;
        }
    }

}

?>