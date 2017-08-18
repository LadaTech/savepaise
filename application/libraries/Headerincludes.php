<?PHP

class Headerincludes {

    public function __construct() {
        
    }

    public function allHeaderIncludes() {
        $CI = & get_instance();
        $CI->load->model('login_model');
        $CI->load->model('category_model');
        $CI->load->model('addusers_model');
        $CI->load->model('store_model');
        $CI->load->model('brand_model');
        $CI->load->model('vcommision_model');
        $CI->load->model('coupons_model');
        $CI->load->model('subcategory_model');
        if (isset($_SESSION['uid'])) {
            $data['userdata'] = $CI->addusers_model->getusers($_SESSION['uid']);
        }
        $data['categories'] = $CI->category_model->display_categories()->result();
        $data['sub_categories'] = $CI->subcategory_model->display_sub_categories()->result();
        $data['stores'] = $CI->store_model->display_store()->result();
//        $data['brands'] = $CI->brand_model->display_brands()->result();
        $data['coupons'] = $CI->coupons_model->getcoupons();
        return $data;
    }

}
?>

