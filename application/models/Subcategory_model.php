<?php 
class Subcategory_model extends CI_Model{
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function index(){
         $this->load->helper('form', 'url', 'session');
    }
    //To Add sub categories to Admin Panel 
    public function subcat_add($subcat_data) {
        $this->db->set($subcat_data);
        $query = $this->db->insert('subcategories', $subcat_data);
        if ($query) {
            return true;
        } else {
            return FALSE;
        }
    }
    
    //To get the all subcategories list of Admin Panel 
    public function subcat_view($catId='') {
        if($catId!=''){
            $this->db->where('category_id', $catId);
        }
        //$this->db->where('status', 1);
//         $this->db->order_by("scat_name");
//        $query = $this->db->get('subcategories');
//        $rows = $query->result_array();
//        return $rows;
        
        $this->db->select('*, sc.status scStatus,sc.created_date createdDate');
        $this->db->from('subcategories sc');
        $this->db->join('category_group cg', 'cg.g_id = sc.category_group', 'LEFT');
        $this->db->join('categories c', 'sc.category_id = c.cat_id', 'LEFT');
//        $this->db->where('c.status', 1);
//        $this->db->where('sc.status', 1);
//        $this->db->where('cg.status', 1);
        $query = $this->db->get();
        return $result = $query->result_array();
    }
    //End of the Function 
    //To get the all subcategories list of Admin Panel with pagination
    public function subcat_view1($isAll = '', $perPage = '25', $page = '1', $segment = '') {
        if ($isAll == '') {
            $this->db->limit($perPage, $page);
        }
//        $this->db->where('cate_id', $id);
        $this->db->select('*, sc.status scStatus,sc.created_date createdDate');
        $this->db->from('subcategories sc');
        $this->db->join('category_group cg', 'cg.g_id = sc.category_group', 'LEFT');
        $this->db->join('categories c', 'sc.category_id = c.cat_id', 'LEFT');
        $this->db->where('c.status', 1);
        $this->db->where('sc.status', 1);
        $this->db->where('cg.status', 1);
        $query = $this->db->get();
//        print_r($this->db);
        return $result = $query->result_array();
//        $query = $this->db->get('')->result();
//        return $query;
    }

    //End of the Function 
    // To Edit subcategory of Admin Panel 
    
    
    public function getgroup($id) {
        //data is retrive from this query 
        $this->db->where('cate_id', $id);
        $query = $this->db->get('category_group');
        $result = $query->result_array();
        return $result;
    }
     // To Update the Edit category of Admin Panel 
    public function status() {

        $this->db->set('status', $_POST['status']);
        $this->db->where('scat_id', $_POST['id']);
        $query = $this->db->update('subcategories');
        if ($query) {
            return true;
        } else {
            return FALSE;
        }
    }     
    
   
/**
     * Function to update sorting value in subcategories table 
     * @param type $sorting_id
     * @param type $id
     * @return boolean
     */
    public function update_subcategory_sorting($sorting_id, $id) {
        $this->db->where('scat_id', $id);
        $query = $this->db->update('subcategories', $sorting_id);
        if ($query) {
            return true;
        } else {
            return FALSE;
        }
    }
    //To search in categories list of the admin panel
    public function search_subcat($subcat_name) {
        $this->db->select('*');
        $this->db->from('subcategories');
        $this->db->like('scat_name', $subcat_name);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            //must use "return $query->result();" to avoid the error when we don't have data like you serached 
            return $query->result();
        }
    }
    /**
     * Get values for subcategories
     * @param type $id
     * @return type
     */
    public function getSubcat($id) {
        $this->db->where('category_id', $id);
        $query = $this->db->get('subcategories');
        $result = $query->result_array();
        return $result;
    }
    /**
     * Function to get onchange category group in sub category list page
     * @param type $id
     * @return type
     */
    public function seachSubcategory($catId = '', $groupId = '', $subCat = '') {
        if ($catId) {
            $this->db->where('category_id', $catId);
        }
        if ($groupId) {
            $this->db->where('category_group', $groupId);
        }
        if ($subCat) {
            $this->db->like('scat_name', $subCat);
        }
        $this->db->select('subcategories.*, categories.cat_id, categories.cat_name, category_group.g_id, category_group.group_name');
        $this->db->from('subcategories');
        $this->db->join('categories', 'categories.cat_id = subcategories.category_id');
        $this->db->join('category_group', 'subcategories.category_group = category_group.g_id');
        $query = $this->db->get();
        //print_r($this->db);
        $result = $query->result_array();
        return $result;
    }

    
     public function getSubcatCookie($id) {
        $this->db->where('category_group', $id);
        $query = $this->db->get('subcategories');
        $result = $query->result_array();
        return $result;
    }

}

?>
