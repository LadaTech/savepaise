<?PHP

//echo '<pre>';
//print_r($couponsList);
//echo '</pre>';
get_instance()->load->helper('my');
echo $grid = GridDeals($couponsList);
?>
