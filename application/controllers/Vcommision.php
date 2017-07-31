<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Vcommision extends CI_Controller {

    function __construct() {

        parent::__construct();

        $this->load->library('form_validation', 'email');
        $this->load->helper('url', 'form', 'html');
        $this->load->library('pagination');
        $this->load->database();
        $this->load->model('addusers_model');
        $this->load->model('category_model');
        $this->load->model('subcategory_model');
        $this->load->model('brand_model');
        $this->load->model('login_model');
        $this->load->model('store_model');
        $this->load->model('vcommision_model');
    }

    function getCurlCoupons() {
        $url = 'https://tools.vcommission.com/api/coupons.php?apikey=605169ce14f3ee4e676135c706d675a7f96290a8854b408f433419621f275129';
        $headers[] = "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8";
        $agent = 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_USERAGENT, $agent);
        $exec = curl_exec($curl);
//print_r($exec);
        curl_close($curl);
//        echo "<pre>";
        $result = json_decode($exec);
//        print_r($result);
        if (sizeof($result) > 0) {
            foreach ($result as $deals) {
//                print_r($deals);
                $storeId = $deals->offer_id;
                if (trim($deals->preview_url)) {
                    $parseUrl = parse_url($deals->preview_url);
                    $previewUrl = "http://" . $parseUrl['host'];
                } else {
                    $previewUrl = '';
                }
                $storedata = array(
                    "offer_id" => $storeId,
                    'offer_name' => $deals->offer_name,
                    'store_url' => $previewUrl,
                    'store_image' => $deals->store_image,
                    'store_link' => $deals->store_link);
                $storeDetails = $this->store_model->getStoreinfobyfield('offer_id', $storeId);
//                print_r($storeDetails);
                if (sizeof($storeDetails) > 0) {
                    $storedata['updated_date'] = date('Y-m-d H:i:s');
                    $this->store_model->updateStoreByField($storedata, 'offer_id');
                    $storeId = $storeDetails[0]['id'];
                } else {
                    $storedata['created_date'] = date('Y-m-d H:i:s');
                    $storeAdd = $this->store_model->add_store($storedata);
                    if ($storeAdd) {
                        $storeId = $storeAdd;
                    } else {
                        $storeId = 0;
                    }
                }

                $subCategory = trim($deals->category);
                if (trim($subCategory)) {
                    $subCatDetails = $this->subcategory_model->search_subcat($subCategory);
                    print_r($subCatDetails);
                    $subCatData = array('scat_name' => $subCategory);
                    if (sizeof($subCatDetails) > 0) {
                        $subCatData['scat_id'] = $subCatDetails[0]->scat_id;
                        print_r($subCatData);
                        $this->subcategory_model->subcat_update($subCatData);
                        $subcatId = $subCatDetails[0]->scat_id;
                    } else {
                        $subcat = $this->subcategory_model->subcat_add($subCatData);
                        if ($subcat) {
                            $subcatId = $subcat;
                        } else {
                            $subcatId = 0;
                        }
                    }
                } else {
                    $subcatId = 0;
                }
                $promoId = trim($deals->promo_id);
                if ($promoId) {
                    $promoDetails = $this->vcommision_model->getCouponinfobyfield('promo_id', $promoId);
                    print_r($promoDetails);
                    $couponData = array(
                        "promo_id" => $promoId,
                        "store_id" => $storeId,
                        "title" => trim($deals->coupon_title),
                        "subcategory_id" => $subcatId,
                        "description" => trim($deals->coupon_description),
                        "type" => trim($deals->coupon_type),
                        "code" => trim($deals->coupon_code),
                        "ref_id" => trim($deals->ref_id),
                        "link" => trim($deals->link),
                        "expiry_date" => trim($deals->coupon_expiry),
                        "added_date" => trim($deals->added),
                        "created_date" => date('Y-m-d H:i:s')
                    );
                    if (sizeof($promoDetails) > 0) {
                        $this->vcommision_model->updateCouponByField($couponData,'promo_id' );
                    } else {
                        $this->vcommision_model->insert($couponData);
                    }
                }
            }
        }
        exit;
    }

}

?>