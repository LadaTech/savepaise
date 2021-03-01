<?php
session_start();
include_once 'logs.php';
include_once 'header.php';
$log = "insert payu details. " . PHP_EOL;
insertlogs($log);
?>
<section class="page">  
    <div class="container">
        <h3 style="color: #D70000;">Vyspro-India KVB 2019 Invite</h3>
        <div class="row">     
            <div class="col-md-12 formContainer clearfix">
                <div class="payuform">
                    <h4 style="color: #d70000;">Login</h4>
                    <form id="payuform" name="payuform" method="post" action="loginaction.php" >
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
            
                <?PHP
                include_once 'footer.php';
                ?>