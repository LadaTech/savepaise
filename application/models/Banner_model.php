<?PHP 
class Banner_model extends CI_Model{
    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('form', 'url', 'session');
    }
    
    public function add_banner($banner_data){
        $query = $this->db->insert('home_banners',$banner_data);
        if($query){
            return TRUE;
        }else{
            return FALSE;
        }            
    }
    
    public function view_banner($id = '',$limit = '', $start=''){
        if($id != ''){
            $this->db->where('b_id',$id);
//            $query = $this->db->get('home_banners');
//            return $query->result();
        }
        $this->db->select('*');
        $this->db->limit($limit,$start);
        $query = $this->db->get('home_banners');
        return $query->result();
    }
    
    public function update_banner($banner_data,$id){
//        echo "<pre>";
//        echo $id;
//        print_r($banner_data);exit;
        $this->db->where('b_id',$id);
       $query = $this->db->update('home_banners',$banner_data);
        if($query){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }
    
    public function changeStatus(){
        $this->db->set('status',$_POST['status']);
        $this->db->where('b_id',$_POST['id']);
        $query = $this->db->update('home_banners');
        if($query){
            return true;
        }else{
            return false;
        }
    }
    
    public function banner_sorting($sorting_data, $id){
        $this->db->where('b_id', $id);
        $query = $this->db->update('home_banners', $sorting_data);
        if($query){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }
    
    public function delete_banner($id){
        $this->db->where('b_id',$id);
        $this->db->delete('home_banners');
        $query = $this->db->get('home_banners');
        if($query){
            return TRUE;
        }else{
            return FALSE;
            }           
    }
    

    
}
?>
