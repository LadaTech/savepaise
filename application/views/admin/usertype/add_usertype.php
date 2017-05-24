<?PHP $this->load->view('admin/common/header', true); ?>
<div class="main-container ace-save-state" id="main-container">		
    <?PHP $this->load->view('admin/common/sidebar', true);  ?>
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
                        <form class="form-horizontal"  id="addtypeuserform" name="addusertypeform" role="form" action="<?php echo base_url() ?>users/addusertype" method="post">
                            <?php
                            $this->load->library('form_validation');
                            echo validation_errors();
                            ?>
                            <div class="form-group">
                                <label class="col-sm-3 control-label capitalize">UserType Name <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" id="utypename"  name="utypename" placeholder="user type name" class="col-xs-10 col-sm-5" />
                                </div>
                            </div>                                
                            <hr>
                            <div class="row">
                                <div class="col-sm-9 col-sm-offset-3">
                                    <button type="submit" id="addusertype"  name="addusertype" value="submit"  class="btn btn-success btn-quirk btn-wide mr5">ADD USER TYPE</button>
                                    <button type="reset" class="btn btn-quirk btn-wide btn-default">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>	 
        </div>
    </div><!-- /.main-content -->
</div><!-- /.main-container -->
<?php $this->load->view('admin/common/footer', true); ?>
<script src="<?php echo base_url(); ?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap -->
<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/jquery.validate.min.js"></script>
<script type='text/javascript' src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.js"></script>
<script type='text/javascript' src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/additional-methods.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#addtypeuserform').validate({
            rules:{
                utypename:"required"
            },
            messages:{
                utypename:"please enter user type"
            }
        });
    });
    </script>