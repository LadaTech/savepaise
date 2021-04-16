<?php

include_once 'logs.php';

class CommonFunctions {

    function __construct() {
        include_once ROOTPATH . '/db.php';
        $this->conn = $conn;
    }

    public function getbanks($bankName = '', $state = '', $district = '', $branch = '', $ifsc = '') {
        $whereCond = '';
        $groupBy = '';
        $group = '';
        $orderBy = '';
        if ($bankName != '') {
            $whereCond .= " and bank_name like '$bankName'";
            $groupBy .= ", bank_name";
            $orderBy .=", bank_name asc";
        }
        if ($state != '') {
            $whereCond .= " and state like '$state'";
            $groupBy .= ", state";
            $orderBy .=", state asc";
        }
        if ($district != '') {
            $whereCond .= " and district_name like '$district'";
            $groupBy .= ", district_name";
            $orderBy .=", district_name asc";
        }
        if ($branch != '') {
            $whereCond .= " and branch_name like '$branch'";
            $groupBy .= ", branch_name";
            $orderBy .=", branch_name asc";
        }
        if ($ifsc != '') {
            $whereCond .= " and ifsc_code like '$ifsc'";
            $groupBy .= ", ifsc_code";
            $orderBy .=", ifsc_code asc";
        }
        if ($groupBy != '') {
            $group = " group by $groupBy";
        }
        
        if($orderBy!=''){
            $order = " order by ".$orderBy;
        }
        echo $select = "select * from ifsc where 1=1 $whereCond $group  $order";
    }

}
