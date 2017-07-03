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
<div class="service-area inner-padding7">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-12 col-xs-12">                
            </div>
            <div class="col-md-4 col-sm-12 col-xs-12 well" style="margin-top: 50px;">
                <div class="adminLogin">
                    <h3>  Login to Admin</h3>
                </div>
                <?PHP               
                if($this->session->flashdata() != '' || $this->session->flashdata() != NULL) {
                    echo $this->session->flashdata('errormsg');
                }
//                if (isset($msg) && $msg != '') echo $msg;   
                ?>           
                <form id="login" name="login" method="post" enctype="multipart/form-data" action="<?PHP echo base_url()?>index/process">
                    <div class="form-group">
                        <label for="Email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="password">
                    </div>    
                    <div class="forgot">
                        <label>
                            <a href="#">Forgot Password?</a>
                        </label>
                    </div>
                    <button type="submit" id="log_in" name="log_in" class="btn btn-info">submit</button>                     
                    <div class="form-group">
                        <div class="col-md-12 control">
                            <div style="border-top: 1px solid#888; margin-top:15px; font-size:85%" >
                                Don't have an account! 
                                <a href="#" onClick="$('#loginbox').hide();
                                        $('#signupbox').show()">
                                    Sign Up Here
                                </a>
                            </div>
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

