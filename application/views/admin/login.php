<?PHP

?>
 <!-- bootstrap & fontawesome -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/font-awesome/4.5.0/css/font-awesome.min.css" />

        <!-- page specific plugin styles -->

        <!-- text fonts -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/fonts.googleapis.com.css" />

        <!-- ace styles -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

        <!--[if lte IE 9]>
                <link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
        <![endif]-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ace-skins.min.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ace-rtl.min.css" />
<div class="service-area inner-padding7 bg">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-12 col-xs-12">                
            </div>
            <div class="col-md-4 col-sm-12 col-xs-12 well" style="margin-top: 100px;">
                <div class="admin-logo"><img src="assets/images/sp-logo.png" /></div>
                <div class="adminLogin">
                    <h3>  Login to Admin</h3>
                </div>
                <?PHP               
                if($this->session->flashdata() != '' || $this->session->flashdata() != NULL) {
                    echo $this->session->flashdata('errormsg');
                }
//                if (isset($msg) && $msg != '') echo $msg;   
                ?>           
                <form id="login" name="login" class="form-horizontal" method="post" enctype="multipart/form-data" action="<?PHP echo base_url()?>index/process">
                    <div class="form-group">
                        <label for="Email" class="col-sm-4 control-label">Email</label>
                        <div class="col-sm-8">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-sm-4 control-label">Password</label>
                        <div class="col-sm-8">
                        <input type="password" class="form-control" id="password" name="password" placeholder="password">
                        </div>
                    </div>    
                    <div class="form-group">
                        <label class="col-sm-4 control-label">
                            
                        </label>
                        <div class="col-sm-8">
                            <a href="#">Forgot Password?</a>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-sm-4 control-label"></label>
                        <div class="col-sm-8">
                    <button type="submit" id="log_in" name="log_in" class="btn btn-info">submit</button>  
                        </div>
                    </div>
                     
                </form>

            </div>

        </div>
    </div>
</div>
<!-- End Service Section -->



<!-- End Service Section -->


<script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script type="text/javascript" src="js/jquery.validate.js"></script>
<script type='text/javascript' src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.js"></script>
<script type='text/javascript' src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/additional-methods.js"></script>

<script type="text/javascript">
                                    $(document).ready(function () {        
                                        $("#login").validate({
                                            rules: {
                                                email: {
                                                    required: true,
                                                    email: true
                                                },
                                                password: {
                                                    required: true
                                                }
                                            },
                                            messages: {
                                                email: {
                                                    required: "Please Enter Your Contact Email",
                                                    email: "Enter Correct Email Id "
                                                },
                                                password: {
                                                    required: "Please Provide Password"
                                                }

                                            },
                                        });
                                    })
</script>

