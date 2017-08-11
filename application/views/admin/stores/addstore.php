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

                    <li class="active">Add Store</li>
                </ul><!-- /.breadcrumb -->

            </div>

            <div class="page-content">
                <div class="page-header">
                    <h1>
                        Stores
                        <small>
                            <i class="ace-icon fa fa-angle-double-right"></i>
                            Add stores
                        </small>
                    </h1>
                </div><!-- /.page-header -->

                <div class="row">
                    <div class="col-xs-12">               
                        <!-- PAGE CONTENT BEGINS -->
                        <form method="post" id="stores"  class="form-horizontal" action="<?php echo base_url() ?>stores/add_store" enctype="multipart/form-data" >
                            <?php
                            if ((isset($message)) && (!empty($message))) {
                                print_r($message);
                            }
                            ?>

                            <div class="form-group">
                                <label class="col-sm-3 control-label capitalize">Store Name <span class="text-danger">*</span></label>
                                <div class="col-sm-6">
                                    <input type="text" name="store_name" id="store_name" class="form-control capitalize" placeholder="Enter Store Name" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Store URL<span class="text-danger">*</span></label>
                                <div class="col-sm-6">
                                    <input type="text" name="store_url" id="store_url" class="form-control capitalize"  placeholder="Enter Store URL" required />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Offer Name<span class="text-danger">*</span></label>
                                <div class="col-sm-6">
                                    <input type="text" name="offer_name" id="offer_name" class="form-control capitalize"  placeholder="Enter offername" required />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Store_Image <span class="text-danger">*</span></label>
                                <div class="col-sm-6">
                                    <input type="file" name="store_image" id="store_image" size="20" required />
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-9 col-sm-offset-3">
                                    <button type="submit" id="store_submit"  name="store_submit" value="submit"  class="btn btn-success btn-quirk btn-wide mr5">Submit</button>
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
<<script src="<?php echo base_url(); ?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/jquery.validate.min.js"></script>
<script type='text/javascript' src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.js"></script>
<script type='text/javascript' src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/additional-methods.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#stores").validate({
            rules: {
                store_name: "required",
                store_url: "required",
                offer_name: "required",
                store_image: {
                    required: true,
                    extension: "jpeg" | "jpg" | "gif" | "png"
                }
            },
            messages: {
                store_name: "Please enter Store Name",
                store_url: "Please Enter Store URL",
                offer_name: "please enter offer name",
                store_image: "Please upload jpeg | png | gif | jpg files only",
            }
        });
    });
</script>