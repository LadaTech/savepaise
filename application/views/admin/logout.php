<?PHP 
session_start();
$this->session->sess_destroy();
redirect(base_url().'index');
die;
?>

