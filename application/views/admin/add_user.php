<?PHP include_once('common/header.php'); ?>

<div class="main-container ace-save-state" id="main-container">		
    <?PHP include_once('common/sidebar.php'); ?>

    <div class="main-content">
        <div class="main-content-inner">
            <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                <ul class="breadcrumb">
                    <li>
                        <i class="ace-icon fa fa-home home-icon"></i>
                        <a href="#">Home</a>
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
                                    <input type="text" id="form-field-1" placeholder="First Name" class="col-xs-10 col-sm-5" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Last Name </label>

                                <div class="col-sm-9">
                                    <input type="text" id="form-field-1" placeholder="Last Name" class="col-xs-10 col-sm-5" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Password </label>

                                <div class="col-sm-9">
                                    <input type="password" id="form-field-2" placeholder="Password" class="col-xs-10 col-sm-5" />											 
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Email ID </label>

                                <div class="col-sm-9">
                                    <input type="text" id="form-field-1" placeholder="Email ID" class="col-xs-10 col-sm-5" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Phone Number </label>

                                <div class="col-sm-9">
                                    <input type="text" id="form-field-1" placeholder="Phone Number" class="col-xs-10 col-sm-5" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> User Type </label>

                                <div class="col-sm-9">
                                    <select class="col-xs-10 col-sm-5" id="form-field-select-1">
                                         
                                        <option value="AL">Alabama</option>
                                        <option value="AK">Alaska</option>
                                        <option value="AZ">Arizona</option>
                                        <option value="AR">Arkansas</option>
                                        <option value="CA">California</option>
                                    </select>
                                </div>
                            </div>   
                            <div class="center col-md-10">
                                <button class="btn btn-primary">Save</button>
                            </div>


                        </form>
                    </div>
                </div>


            </div>	 
        </div>
    </div><!-- /.main-content -->

    <?php include_once('common/footer.php') ?>

</div><!-- /.main-container -->
 