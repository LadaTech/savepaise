<?PHP include_once('common/header.php'); ?>

<div class="main-container ace-save-state" id="main-container">		
    <?PHP include_once('common/sidebar.php'); ?>
    <div class="main-content">
        <div class="main-content-inner">
            <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                <ul class="breadcrumb">
                    <li>
                        <i class="ace-icon fa fa-home home-icon"></i>
                        <a href="<?php echo base_url() ?>admin/index">Home</a>
                    </li>

                    <li class="active">Add User</li>
                </ul><!-- /.breadcrumb -->

            </div>

            <div class="page-content">
                <div class="page-header">
                    <h1>
                        Users
                        <small>
                            <i class="ace-icon fa fa-angle-double-right"></i>
                            Add Users
                        </small>
                    </h1>
                </div><!-- /.page-header -->

                <div class="row">
                    <div class="col-xs-12">               
                        <!-- PAGE CONTENT BEGINS -->
                        <form class="form-horizontal"  id="adduserform" name="adduserform" role="form" action="<?php echo base_url() ?>users/adduser" method="post">
                            <?php
                            $this->load->library('form_validation');
                            echo validation_errors();
                            ?>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> First Name </label>
                                <div class="col-sm-9">
                                    <input type="text" id="firstname" name="firstname" placeholder="First Name" class="col-xs-10 col-sm-5" />
                                </div>                                
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Last Name </label>

                                <div class="col-sm-9">
                                    <input type="text" id="lastname"  name="lastname" placeholder="Last Name" class="col-xs-10 col-sm-5" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Email ID </label>

                                <div class="col-sm-9">
                                    <input type="text" id="email"  name="email" placeholder="Email ID" class="col-xs-10 col-sm-5" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Password </label>

                                <div class="col-sm-9">
                                    <input type="password" id="password" name="password" placeholder="Password" class="col-xs-10 col-sm-5" />											 
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Phone Number </label>

                                <div class="col-sm-9">
                                    <input type="number" id="pnumber" name="pnumber" placeholder="Phone Number" class="col-xs-10 col-sm-5" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> User Type </label>
                                <div class="col-sm-9">                                      
                                    <select class="col-xs-10 col-sm-5" id="usertype" name="usertype">

                                        <option value="">Select User</option>
                                        <?php foreach ($utype as $ind) { ?>                                
                                            <option value="<?php echo $ind->id; ?>">
                                                <?php echo $ind->user_type; ?>                                      
                                            </option><?php } ?> 
                                    </select>
                                </div>
                            </div>   
                            <div class="center col-md-10">
                                <button class="btn btn-primary" id="adduser" name="adduser">Add User</button>
                            </div>
                        </form>
                    </div>
                </div>


            </div>	 
        </div>
    </div><!-- /.main-content -->
</div><!-- /.main-container -->

<?php include_once('common/footer.php') ?>
<!--end of form application-->
<!--add user form validations-->
<script src="<?php echo base_url(); ?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap -->
<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/jquery.validate.min.js"></script>
<script type='text/javascript' src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.js"></script>
<script type='text/javascript' src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/additional-methods.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
//        custom validation method for usertype
        $.validator.addMethod("valueNotEquals", function (value, element, arg) {
            return arg !== value;
        }, "Value must not equal arg.");
//        custom validation method for email
        $.validator.addMethod('customemail', function (value, element) {
            var re = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            return re.test(value);
        },
                'Sorry, I`ve enabled very strict email validation'
                );
//        custom validation method for password
        $.validator.addMethod('custompass', function (value, element) {
            var re = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/;
            return re.test(value);
        },
                'Sorry, I`ve enabled very strict password validation'
                );
        $("#adduserform").validate({
            rules: {
                firstname: "required",
                lastname: "required",
                email: {
                    required: true,
                    email: true,
                    customemail: true
                },
                password: {
                    required: true,
                    custompass: true
                },
                pnumber: {
                    required: true,
                    maxlength: 10,
                    minlength: 10
                },
                usertype: {
                    valueNotEquals: ""
                }
            },
            messages: {
                firstname: "Please Enter First Name",
                lastname: "Please Enter Last Name",
                email: {
                    required: "Please Enter Your Email",
                    email: "Enter Correct Email Id ",
                    customemail: "Enter Valid Email"
                },
                password: {
                    required: "Please Provide Password",
                    custompass: "your password should least one number, one lowercase,one uppercase letter and minimum 6 letters"
                },
                pnumber: {
                    required: "Please Enter Your  Mobile Number",
                    maxlength: "Enter 10 Digit Number",
                    minlength: "Enter The 10 Digit Number"
                },
                usertype: {
                    valueNotEquals: "Please select an item!"
                }

            },
            submitHandler: function (form) {
                form.submit();
            }
        });

    });
</script>