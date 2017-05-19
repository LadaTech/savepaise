<?PHP
$this->load->view('admin/common/header', true);
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
                       <form method="post" id="categories"  class="form-horizontal" action="<?php echo base_url() . "categories/add_category" ?>" enctype="multipart/form-data" >

                                <div class="form-group">
                                    <label class="col-sm-3 control-label capitalize">Category Name <span class="text-danger">*</span></label>
                                    <div class="col-sm-6">
                                        <input type="text" name="catname" class="form-control capitalize" placeholder="Enter Category" required/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Image <span class="text-danger">*</span></label>
                                    <div class="col-sm-6">
                                        <input type="file" name="image_c" id="image_c" size="20" required />
                                    </div>
                                </div>                                
                                <hr>
                                <div class="row">
                                    <div class="col-sm-9 col-sm-offset-3">
                                        <button type="submit" id="submit_c"  name="submit_c" value="submit"  class="btn btn-success btn-quirk btn-wide mr5">Submit</button>
                                        <button type="reset" class="btn btn-quirk btn-wide btn-default">Reset</button>
                                    </div>
                                </div>

                            </form> <!-- panel-body -->
                    </div>
                </div>


            </div>	 
        </div>
    </div><!-- /.main-content -->
</div><!-- /.main-container -->

<?php $this->load->view('admin/common/footer', true); ?>
<!--end of form application-->
<!--add user form validations-->
