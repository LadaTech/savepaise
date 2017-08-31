<?PHP

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Coupons_model extends CI_Model {

    public function __construct() {
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

    public function view_coupon($limit = '', $start='') {
        $this->db->select('*,c.status cStatus,s.status stStatus,sc.status scStatus');        
        $this->db->from('coupons c');
//        $this->db->order_by('c.status,s.store_name desc');
//        $this->db->from('stores');
        $this->db->join('subcategories sc','sc.scat_id = c.subcategory_id','left');
        $this->db->join('stores s','s.id = c.store_id','left');
        $this->db->order_by('c.status desc,s.store_name');
        $this->db->limit($limit,$start);
//        $this->db->order_by('added_date DESC');
        return $this->db->get()->result();
    }
    
    public function edit_coupon($id){
        $this->db->where('c_id',$id);
        $query = $this->db->get('coupons')->result();
        return $query[0];        
    }
     public function update_coupon($coupon_data){
        $id = $coupon_data['id'];
        $this->db->where('c_id', $id);
        $query = $this->db->update("coupons", $coupon_data);
        if ($query) {
            return TRUE;
        } else {
            return FALSE;
        }       
    }
    
    public function changeStatus(){
        $id = $_POST['id'];
        $status = $_POST['status'];
        $this->db->set('status',$status);
        $this->db->where('c_id',$id);
        $query = $this->db->update('coupons');
        if($query){
            return true;
        }else{
            return false;
        }
    }
    
    public function coupon_sorting($sorting_data, $id){
        $this->db->where('c_id', $id);
        $query = $this->db->update('coupons', $sorting_data);
        if($query){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }
    
    public function delete_coupon($id){
        $this->db->where('c_id',$id);
        $this->db->delete('coupons');
        $query = $this->db->get('coupons');
        $result = $query->result_array();
        if ($result) {
            return $result;
        } else {
            return false;
        }
        
    }

    public function getcoupons($storeId = '', $categoryId = '', $subcatId = '', $type = '', $limit = 10, $id = '') {
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
//        if ($id != "") {            
//            $this->db->where('id', $id);
//           $query = $this->db->get('coupons')->result();
////           echo "<pre>";
////           print_r($query);exit;
//           return $query[0];
//           }

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

    public function get_deals($limit, $start) {
        $this->db->select('*');
        $this->db->where('type', 'Promotion');
        $this->db->limit($limit, $start);
        $this->db->join('stores', 'stores.id = coupons.store_id', 'left');
        return $this->db->get('coupons')->result();
    }

    public function get_coupons($limit, $start) {
        $this->db->select('*');
        $this->db->where('type', 'Coupon');
        $this->db->limit($limit, $start);
        $this->db->join('stores', 'coupons.store_id = stores.id', 'left');
        return $this->db->get('coupons')->result();
    }

    public function get_deals_rows() {
        $this->db->select('*');
        $this->db->where('type', 'Promotion');
        return $this->db->get('coupons')->result();
    }

    public function get_coupons_rows() {
        $this->db->select('*');
        $this->db->where('type', 'Coupon');
        return $this->db->get('coupons')->result();
    }

}

?>
