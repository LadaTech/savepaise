<?PHP

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Brand_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function index() {
        $this->load->database();
        $this->load->helper('form', 'url', 'session');
    }

    public function getCount() {
        $this->db->select('count(*) countbrands');
        $this->db->from('brands');
        $query = $this->db->get();
        return $result = $query->result_array();
    }

    //To Add  categories to Admin Panel 

    public function add($data) {
        $this->db->set($data);
        $query = $this->db->insert('brands', $data);
        if ($query) {
            return true;
        } else {
            return FALSE;
        }
    }
    public function brandedit() {
        //data is retrive from this query 
        $this->db->where('brand_id', $_GET['id']);
        $query = $this->db->get('brands')->result_array();
        return $query[0];
    }
    
    public function brandupdate($edit_data, $id) {
        $this->db->where('brand_id', $id);
        $query = $this->db->update('brands', $edit_data);
        if ($query) {
            return true;
        } else {
            return FALSE;
        }
    }

    //End of the Funtion 
    // To view list of categories of Admin Panel 

    public function brandslist() {
         $this->db->where('status', 1);
        $this->db->order_by("brand_name", "asc");
        $this->db->where ('brand_name!=','');
        $query = $this->db->get('brands');
//        echo "<pre>";
//        print_r($this->db);
//        echo "</pre>";
//        exit;
        $result = $query->result_array();
        return $result;
    }

    // To view list of categories of Admin Panel with pagination

    public function brandslist1($isAll = '', $segment = '') {
//        if ($isAll == '') {
//            $this->db->limit($perPage, $page);
//        }
//        $this->db->where('status', 1);
        $this->db->order_by("brand_name", "asc");
        $query = $this->db->get('brands');        
        $result = $query->result_array();
        return $result;
    }

    // To dalete the  category of Admin Panel 
    public function deletebrand($id) {
        $data = array(
            'status' => 0,
        );
        $this->db->where('brand_id', $id);
        $query1 = $this->db->update('brands', $data);
        $query = $this->db->get('brands');
        $result = $query->result_array();

        if ($result) {
            return $result;
        } else {
            return FALSE;
        }
    }
    //End of the Funtion
    
    public function display_brands(){
        $this->db->where('status',1);
        $this->db->order_by('brand_name');
        $query = $this->db->get('brands');
        return $query;
    }
    public function status() {
        $this->db->set('status', $_POST['status']);
        $this->db->where('brand_id', $_POST['id']);
        $query = $this->db->update('brands');
        if ($query) {
            return true;
        } else {
            return FALSE;
        }
    }
    public function update_brand_sorting($sorting_id, $id) {
        $this->db->where('brand_id', $id);
        $query = $this->db->update('brands', $sorting_id);
        if ($query) {
            return true;
        } else {
            return FALSE;
        }
    }
    
}

?>
