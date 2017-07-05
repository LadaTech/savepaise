<?PHP $this->load->view('admin/common/header', true); 
//echo "<pre>";
//print_r($udata);
?>
<div class="main-container ace-save-state" id="main-container">		
    <?PHP $this->load->view('admin/common/sidebar', true); ?>
    <div class="main-content">
        <div class="main-content-inner">
            <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                <ul class="breadcrumb">
                    <li>
                        <i class="ace-icon fa fa-home home-icon"></i>
                        <a href="<?php echo base_url() ?>admin/index">Home</a>
                    </li>

                    <li class="active">Edit Store</li>
                </ul><!-- /.breadcrumb -->

            </div>

            <div class="page-content">
                <div class="page-header">
                    <h1>
                        Stores
                        <small>
                            <i class="ace-icon fa fa-angle-double-right"></i>
                            Edit Stores
                        </small>
                    </h1>
                </div><!-- /.page-header -->

                <div class="row">
                    <div class="col-xs-12">               
                        <!-- PAGE CONTENT BEGINS -->
                        <form class="form-horizontal"  id="editstroe" name="editstore" role="form" action="<?php echo base_url() ?>stores/edit_store" method="post">
                            <?php
                            $this->load->library('form_validation');
                            echo validation_errors();
                            ?>
                            <div class="form-group">
                                <input type="hidden" name="id" id="id" value="<?php echo $_GET['sid']; ?>" >
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Store Name </label>
                                <div class="col-sm-9">
                                    <input type="text" id="store_name" name="store_name"  class="form-control capitalize" value="<?php echo $store_data->store_name; ?>" required/>
                                </div>                                
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1" > Store URL </label>

                                <div class="col-sm-9">
                                    <input type="text" id="store_url"  name="store_url"  class="form-control capitalize" value="<?php echo $store_data->store_url; ?>" required/>
                                </div>
                            </div>
                            
                            <div class="center col-md-10">
                                <button class="btn btn-primary" id="store_edit" name="store_edit">Update</button>
                            </div>
                        </form>
                    </div>
                </div>


            </div>	 
        </div>
    </div><!-- /.main-content -->
</div><!-- /.main-container -->

<?php $this->load->view('admin/common/footer', true); ?>
<!--end of form application-->
<!--add user form validations-->
<script src="<?php echo base_url(); ?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap -->
<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/jquery.validate.min.js"></script>
<script type='text/javascript' src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.js"></script>
<script type='text/javascript' src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/additional-methods.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#editstore").validate({
            rules: {
                store_name: "required",
                store_url: "required"                
                },
            
            messages: {
                store_name: "Please Enter Store Name",
                store_url: "Please Enter Store URL"           
            
            }
        });

    });
</script>

