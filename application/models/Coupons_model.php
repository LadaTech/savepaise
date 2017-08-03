<?PHP

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Coupons_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function index() {
        $this->load->database();
        $this->load->helper('form', 'url', 'session');
    }

    //To Add  coupons

    public function insert($data) {
        $this->db->set($data);
        $query = $this->db->insert('coupons', $data);
        if ($query) {
            return true;
        } else {
            return FALSE;
        }
    }

    public function brandupdate($edit_data, $id) {
        $this->db->where('brand_id', $id);
        $query = $this->db->update('coupons', $edit_data);
        if ($query) {
            return true;
        } else {
            return FALSE;
        }
    }

    public function getCouponinfobyfield($field = '', $fieldValue = '') {
        if ($field == "promo_id") {
            $this->db->where('promo_id', $fieldValue);
        }
        $query = $this->db->get('coupons');
//        echo "<pre>";
//        print_r($this->db);
//        echo "</pre>";
//        exit;
        $row = $query->result_array();
        return $row;
    }

    public function updateCouponByField($data, $field = 'id') {
        $id = $data[$field];
        $this->db->where($field, $id);
        $query = $this->db->update("coupons", $data);
        if ($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function getcoupons($storeId = '', $categoryId = '', $subcatId = '', $type = '', $limit = 10) {
        if ($storeId != "") {
            $this->db->where('store_id', $storeId);
        }
        if ($categoryId != "") {
            $this->db->where('category_id', $categoryId);
            $this->db->join('categories as cat', 'cat.cat_id=c.category_id');
        }
        if ($subcatId != "") {
            $this->db->where('store_id', $subcatId);
        }
        if ($type != "") {
            $this->db->where('type', $type);
        }

        $expiryDate = date('Y-m-d');
        $this->db->where('expiry_date >=', $expiryDate);
        $this->db->order_by('added_date DESC');

        $this->db->select('*');
        $this->db->from('coupons as c');
        $this->db->join('stores as s', 's.id=c.store_id');

        $this->db->join('subcategories as subcat', 'subcat.scat_id=c.subcategory_id');
        $this->db->limit($limit);
        $query = $this->db->get();
//        echo "<pre>";
//        print_r($this->db);
//        echo "</pre>";
//        exit;
        $row = $query->result_array();
        return $row;
    }

    public function get_deals() {
        $this->db->select('*');
        $this->db->where('type', 'Promotion');        
        return $this->db->get('coupons');
    }
    public function get_coupons() {
        $this->db->select('*');
        $this->db->where('type', 'Coupon');        
        return $this->db->get('coupons');
    }

}

?>