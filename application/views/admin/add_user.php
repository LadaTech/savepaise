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
                        <form class="form-horizontal" role="form">
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
                                    <input type="text" id="pnumber" name="pnumber" placeholder="Phone Number" class="col-xs-10 col-sm-5" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> User Type </label>

                                <div class="col-sm-9">
                                    <select class="col-xs-10 col-sm-5" id="usertype" name="usertype">
                                        <option value="">Select User</option>
                                        <option value="1">Super Admin</option>
                                        <option value="2">Admin</option>
                                        <option value="3">User</option>                                        
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

<script src="<?php echo base_url(); ?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap -->
<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/jquery.validate.min.js"></script>
<script type='text/javascript' src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.js"></script>
<script type='text/javascript' src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/additional-methods.js"></script>
<script type="text/javascript">
    
</script>