<?PHP $this->load->view('admin/common/header', true); 
//echo "<pre>";
//print_r($edit);exit;;
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

                    <li class="active">Edit Category</li>
                </ul><!-- /.breadcrumb -->

            </div>

            <div class="page-content">
                <div class="page-header">
                    <h1>
                        CATEGORY
                        <small>
                            <i class="ace-icon fa fa-angle-double-right"></i>
                            Edit Category
                        </small>
                    </h1>
                </div><!-- /.page-header -->

                <div class="row">
                    <div class="col-xs-12">               
                        <!-- PAGE CONTENT BEGINS -->
                         <form method="post" id="editcategory"  class="form-horizontal" action="<?php echo base_url() . "category/category_edit" ?>" enctype="multipart/form-data" >

                                <div class="form-group">
                                    <label class="col-sm-3 control-label capitalize">Category Name <span class="text-danger">*</span></label>
                                    <div class="col-sm-6">
                                        <input type="text" name="edit_catname" class="form-control capitalize" placeholder="Enter Category"  value="<?php echo $edit['cat_name']; ?>" required/>                                        
                                    </div>
                                </div>
                               <div class="form-group">
                                    <label class="col-sm-3 control-label">Image <span class="text-danger">*</span></label>
                                    <div class="col-sm-6">
                                        <input type="file" name="image_c" id="image_c" size="20"  /><br/>
                                        <?PHP // echo $edit['image']; ?> 
                                        <img src="<?PHP echo base_url()?>assets/images/icons/<?PHP echo $edit['image']; ?>" width="50px"/>                        
                                    </div>
                                    
                                </div>                                
                                
                                <div class="row">
                                    <div class="col-sm-9 col-sm-offset-3">
                                        <input type="hidden" name="id" value="<?php echo $_GET['catid']; ?>" >
                                 
                                        <button type="submit" id="edit_category"  name="edit_category" value="submit"  class="btn btn-success btn-quirk btn-wide mr5">Submit</button>
                                        
                                    </div>
                                </div>

                            </form> <
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
    $(document).ready(function ()
    {
        $('.capitalize').keyup(function (evt) {
            var text = $(this).val();
            $(this).val(text.replace(/^(.)|\s(.)/g, function (data) {
                return data.toUpperCase( );
            }));
        });
    });
</script>
<script type="text/javascript">
    /**
     * Basic jQuery Validation Form Demo Code
     * Copyright Sam Deering 2012
     * Licence: http://www.jquery4u.com/license/
     */
    (function ($, W, D)
    {
        var JQUERY4U = {};

        JQUERY4U.UTIL =
                {
                    setupFormValidation: function ()
                    {
                        //form validation rules
                        $("#editcategory").validate({
                            rules: {
                                catname: "required",                               
//	          	    image_c:{
//				required:true,
//				extension: "jpeg"|"jpg"| "gif"|"png"
//			    },                           
  			        agree: "required"
                                  },
                            messages: {
                                catname: "Please enter category Name",
//                                image_c:"Please upload jpeg | png | gif | jpg files only",                                
                                agree: "Please accept our policy"
                            },
                            submitHandler: function (form) {
                                form.submit();
                            }
                        });
                    }
                }
        //when the dom has loaded setup form validation rules
        $(D).ready(function ($) {
            JQUERY4U.UTIL.setupFormValidation();
        });

    })(jQuery, window, document);
    $(document).ready(function ()
    {
        $('.capitalize').keyup(function (evt) {
            var text = $(this).val();
            $(this).val(text.replace(/^(.)|\s(.)/g, function (data) {
                return data.toUpperCase( );
            }));
        });
    });

    //only characters it will allow

    function allLetter(inputtxt)
    {
        var letters = /^[A-Za-z]+$/;
        if (inputtxt.value.match(letters))
        {
            alert('Your name have accepted : you can try another');
            return true;
        } else
        {
            alert('Please input alphabet characters only');
            return false;
        }
    }
</script>
