<?PHP 
class Subscribe_model extends CI_Model{
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function index(){
        
    }
    public function add_subscribe_email($data){
         $this->db->set($data);
        $query = $this->db->insert('subscribe', $data);
        if ($query) {
            return true;
        } else {
            return FALSE;
        }    
    }
    
    
}
?>

