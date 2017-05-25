<?PHP
$this->load->view('admin/common/header', true);
//echo "<pre>";
//print_r($list);exit;
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

                    <li class="active">View Users</li>
                </ul><!-- /.breadcrumb -->
            </div>

            <div class="page-content">
                <div class="page-header">
                    <h1>
                        Users
                        <small>
                            <i class="ace-icon fa fa-angle-double-right"></i>
                            View Users
                        </small>
                    </h1>
                </div><!-- /.page-header -->

                <div class="row">
                    <div class="col-xs-12">
                        <!-- PAGE CONTENT BEGINS -->
                        <table id="dataTable1" class="table table-bordered table-striped-col">
                            <thead>
                                <tr>
                                    <th>Serial No</th>
                                    <th>Category Name</th>
                                    <th>Category Group Name</th>
                                    <th>Image</th>
                                    <th>Created Date</th>
                                    <th>Action</th>
                                    <th>Sorting</th>                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $j = 1;
                                foreach ($catgroup as $catGroup) {
//                                    echo "<pre>";
//                                    print_r($catGroup1);
//                                    exit;
                                    ?>
                                    <tr><td><?php echo $j++; ?></td>
                                        <td><?php echo $catGroup['cat_name']; ?></td>
                                        <td><?php echo $catGroup['group_name']; ?></td>

                                        <td><img style="object-fit:contain; width:100px; height: 100px;" src="<?php echo base_url() . "/assets/images/nav-icons/" . $catGroup['image']; ?>" alt="<?php echo $catGroup['group_name']; ?>" /></td>
                                        <td><?php echo $catGroup['created_date']; ?> </td>
                                        <td><a href="<?php echo base_url() ?>admin/editcategory_group?catid=<?php echo $catGroup['g_id']; ?>">Edit</a><?php // if ($_SESSION['utype'] == 1) {   ?>/<a  href="<?php echo base_url() ?>category/category_delete?catid=<?php echo $catGroup['g_id']; ?>" onclick="return confirm('Are you sure you want to delete this Category?')" >Delete</a> <?php // }   ?></td>
                                        <td style="width:15%;">
                                            <input type="text" class="sortW" name="sortId" id="sortid_<?php echo $catGroup['g_id']; ?>" value="<?php echo $catGroup['sorting']; ?>">
                                            <input type="hidden" name="catid" value="<?php echo $catGroup['g_id']; ?>">
                                            <button type="button" onClick="sortFunction('<?php echo $catGroup['g_id']; ?>', 'sortid_<?php echo $catGroup['g_id']; ?>');" id="catsorting" value="save" name="save" class="sorting_value btn btn-success btn-quirk btn-wide mr5">Save</button>
                                        </td></tr>

                                <?php } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>	 
        </div>
    </div><!-- /.main-content -->
    <?php $this->load->view('admin/common/footer', true); ?>
</div><!-- /.main-container -->

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
                                agree: "required"
                            },
                            messages: {
                                cat_names: "Please Select category Name",
                                cat_group: "Please Select category Group Name",
                                subname: "Please Enter Subcategory Name",
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
                url: '<?php echo base_url() . "categories/categorygroup" ?>',
                data: "group=" + groupid,
                dataType: 'html',
                success: function (output_str)
                {
                    $('#cat_group').html(output_str);
                    $('#success').hide();
                }
            });
        });
    });

    function sortFunction(catId, sortItemId) {
        var id = $('#' + sortItemId).val();
        var successMessage = 'Sorting value ' + id + ' Updated succesfully';
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() . "categories/category_group_sorting" ?>',
            data: {
                txtboxvalue: id,
                sortvalue: catId
            },
            success: function ()
            {
                $('#success').html(successMessage);
            }
        });
    }

    function checkboxFunction(id, checkval) {
        $('#' + checkval).change(function () {
            if ($(this).is(":checked")) {
                var checkValue = '1';
            } else {
                var checkValue = '0';
            }
            $.ajax({
                type: "POST",
                url: '<?php echo base_url() . "categories/category_group_checked" ?>',
                data: {
                    catId: id,
                    checkVal: checkValue
                },
                success: function (data)
                {
                    //alert(data);
                }
            });

        });
    }
</script>


