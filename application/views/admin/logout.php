<?PHP 
session_start();
session_destroy();
redirect(base_url().'index');
?>

