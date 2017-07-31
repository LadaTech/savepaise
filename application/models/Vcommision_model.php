<?PHP

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Vcommision_model extends CI_Model {

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

}

?>
