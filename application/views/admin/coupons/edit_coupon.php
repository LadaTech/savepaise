
<?PHP
$this->load->view('admin/common/header', true);
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

                    <li class="active">Edit coupons</li>
                </ul><!-- /.breadcrumb -->

            </div>

            <div class="page-content">
                <div class="page-header">
                    <h1>
                        Coupons
                        <small>
                            <i class="ace-icon fa fa-angle-double-right"></i>
                            Edit Coupons
                        </small>
                    </h1>
                </div><!-- /.page-header -->

                <div class="row">
                    <div class="col-xs-12">               
                        <!-- PAGE CONTENT BEGINS -->
                        <form class="form-horizontal"  id="editstroe" name="editstore" role="form" action="<?php echo base_url() ?>coupons/edit_coupon" method="post">
                            <?php
                            $this->load->library('form_validation');
                            echo validation_errors();
                            ?>
                            <div class="form-group">
                                <input type="hidden" name="id" id="id" value="<?php echo $_GET['sid']; ?>" >
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> promo_id </label>
                                <div class="col-sm-9">
                                    <input type="text" id="promo_id" name="promo_id"  class="form-control capitalize" value="<?php echo $coupon_data->promo_id; ?>" required/>
                                </div>                                
                            </div>


                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1" > store_id </label>
                                <select id="store_id" name="store_id"  class="form-control cat"  data-placeholder="Basic Select2 Box">
                                    <option value="">select</option>                                           
                                    <?php foreach ($store_data as $ind) { ?>
                                        <option value="<?php echo $ind->id; ?>"<?php
                                        if (isset($ind->id) && $ind->id != '')
                                            if ($ind->id == $coupon_data->store_id)
                                                echo "selected"
                                                ?>>
                                            <?php echo $ind->store_name; ?></option>
                                    <?php } ?>                                            
                                </select>
                            </div>

                            <div class="form-group">                                
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> title </label>
                                <div class="col-sm-9">
                                    <input type="text" id="title" name="title"  class="form-control capitalize" value="<?php echo $coupon_data->title; ?>" required/>
                                </div>                                
                            </div>
                            <div class="form-group">                              
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> category_id </label>
                                <div class="col-sm-9">
                                    <input type="text" id="category_id" name="category_id"  class="form-control capitalize" value="<?PHP echo $coupon_data->category_id ?>" required/>                                    
                                </div>                                
                            </div>
                            <div class="form-group">                                
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> subcategory_id </label>
                                <select id="store_id" name="store_id"  class="form-control cat"  data-placeholder="Basic Select2 Box">
                                    <option value="">select</option>                                           
                                    <?php foreach ($subcategory_data as $ind) { ?>
                                        <option value="<?php echo $ind->scat_id; ?>"<?php
                                        if (isset($ind->scat_id) && $ind->scat_id != '')
                                            if ($ind->scat_id == $coupon_data->subcategory_id)
                                                echo "selected"
                                                ?>>
                                            <?php echo $ind->scat_name; ?></option>
                                    <?php } ?>                                            
                                </select>                               
                            </div>
                            <div class="form-group">                                
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> description </label>
                                <div class="col-sm-9">
                                    <textarea id="description" name="description"  class="form-control capitalize"  required/><?php echo $coupon_data->description; ?></textarea>
                                </div>                                
                            </div>                            
                            <div class="form-group">                                
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> type </label>
                                <div class="col-sm-9">
                                    <input type="text" id="type" name="type"  class="form-control capitalize" value="<?php echo $coupon_data->type; ?>" required/>
                                </div>                                
                            </div>
                            <div class="form-group">                                
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> code </label>
                                <div class="col-sm-9">
                                    <input type="text" id="code" name="code"  class="form-control capitalize" value="<?php echo $coupon_data->code; ?>" required/>
                                </div>                                
                            </div>
                            <div class="form-group">                                
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> ref_id</label>
                                <div class="col-sm-9">
                                    <input type="text" id="ref_id" name="ref_id"  class="form-control capitalize" value="<?php echo $coupon_data->ref_id; ?>" />
                                </div>                                
                            </div>
                            <div class="form-group">                                
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">link</label>
                                <div class="col-sm-9">
                                    <input type="text" id="link" name="link"  class="form-control capitalize" value="<?php echo $coupon_data->link; ?>" required/>
                                </div>                                
                            </div>


                            <div class="center col-md-10">
                                <button class="btn btn-primary" id="coupon_edit" name="coupon_edit">Update</button>
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
                promo_id: "required",
                store_id: "required",
                title: "required",
//                category_id: "required",
                subcategory_id: "required",
                description: "required",
                type: "required",
                code: "required",
//                ref_id:"required",
                link: "required"
            },
            messages: {
                promo_id: "Please Enter promo_id",
                store_id: "Please Enter store_id",
                title: "please Enter title",
                subcategory_id: "please Enter subcategory_id",
                description: "please Enter description",
                type: "please Enter type",
                code: "please Enter code",
                link: "please Enter link"
            }
        });

    });
</script>




