<?php

session_start();
$headerTitle = 'login';
include_once '../common/logs.php';
include_once '../common/header.php';
$log = "insert payu details. " . PHP_EOL;
insertlogs($log);
?>
<section class="page">  
    <div class="container">
        <h3 style="color: #D70000;">Vyspro-India Vidhya Bharati 2019</h3>
        <div class="row">     
            <div class="col-md-12 formContainer clearfix">
                <div class="payuform">
                    <h4 style="color: #d70000;">Login</h4>
                    <form id="payuform" name="payuform" method="post" action="../admin/loginaction.php" >
                        <div class="form-group">
                            <label class="textleft">User Name:</label>
                            <input class="form-control" type="text" name="name" id="name" /> 
                        </div>
                        <div class="form-group">
                            <label class="textleft">Password:</label>
                            <input class="form-control" type="password" name="password" id="password" /> 
                        </div>                       

                        <div class="form-group">
                            <input class="btn btn-default" type ="submit" name="submit" value="Login" id="submit">
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>    
</section>
<?PHP
include_once '../common/footer.php';
?>