<?PHP
$this->load->view('admin/common/header', true);

// echo "<pre>";
// print_r($categories);exit;
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
                     <form method="post" id="subcategories"  class="form-horizontal" action="<?php echo base_url() . "subcategories/subcat_add" ?>" enctype="multipart/form-data" >

                        <div class="form-group">
                            <label class="col-sm-3 control-label capitalize">Category Name <span class="text-danger">*</span></label>
                            <div class="col-sm-6">                                                                           
                                <select name="cat_names" id="cat_names" class="form-control cat" style="width: 100%">
                                    <option value="">select</option>                                           
                                    <?php foreach ($categories as $ind) { ?>
                                        <option value="<?php echo $ind['cat_id']; ?>"><?php echo $ind['cat_name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label capitalize">Category Group Name <span class="text-danger">*</span></label>
                            <div class="col-sm-6">                                                                           
                                <select name="cat_group" id ="cat_group" class="form-control" style="width: 100%" data-placeholder="Basic Select2 Box">
                                    <option value="">select</option>                                             
                                    <?php foreach ($catgroup as $g) {  ?>
                                    <option value="<?php echo $g->g_id;         ?>"><?php echo $g->group_name;        ?></option>
                                    <?php }  ?>                                         
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label capitalize">Subcategory Name <span class="text-danger">*</span></label>
                            <div class="col-sm-6">
                                <input type="text" name="subname" class="form-control capitalize" placeholder="Enter Subcategory" required/>
                            </div>
                        </div>                        
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Image <span class="text-danger">*</span></label>
                            <div class="col-sm-6">
                                <input type="file" name="image_c" id="image_c" size="20" required />
                            </div>
                        </div>
                        <!--div class="form-group">
                            <label class="col-sm-3 control-label">Image <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <input type="file" name="image" width="32px" height="32px"  />
                            </div>
                        </div-->
                        <hr>
                        <div class="row">
                            <div class="col-sm-9 col-sm-offset-3">
                                <button type="submit" id="submit"  name="sc_submit" value="submit"  class="btn btn-success btn-quirk btn-wide mr5">Submit</button>
                                <button type="reset" class="btn btn-quirk btn-wide btn-default">Reset</button>
                            </div>
                        </div>

                    </form>  <!-- panel-body -->  
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
                            $("#subcategories").validate({
                                rules: {
                                    cat_names: "required",
                                    cat_group: "required",
                                    subname: "required",
                                    image_c: {
                                        required: true,
                                        extension: "jpeg" | "jpg" | "gif" | "png"
                                    },
                                    agree: "required"
                                },
                                messages: {
                                    cat_names: "Please Select category Name",
                                    cat_group: "Please Select category Group Name",
                                    subname: "Please Enter Subcategory Name",
                                    image_c: "Please upload jpeg,png,gif,jpg files only",
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
    <script type="text/javascript">
        $(document).ready(function ()
        {
            $(".cat").change(function ()
            {
                var groupid = $(this).val();

                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url() . "subcategories/categorygroup" ?>',
                    data: "group=" + groupid,
                    dataType: 'html',
                    success: function (output_str)
                    {
                        // alert(output_str);
                        $('#cat_group').html(output_str);
                        //var result = data;
                        // $('#cat_group').append(result);
                    }
                });
            });
        });

        $(document).ready(function ()
        {
            $.ajax({
                type: "POST",
                url: '<?php echo base_url() . "admin/getBrands" ?>',
                dataType: 'html',
                success: function (output_str)
                {
                    $('#brandId').html(output_str);
                    $('#loadingBrands').html("");

                    //var result = data;
                    // $('#cat_group').append(result);
                }
            });
        });

    </script>

