<?PHP
$this->load->view('admin/common/header', true);
//echo "<pre>";
//print_r($sublist);exit;
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

                    <li class="active">View subcategories</li>
                </ul><!-- /.breadcrumb -->
            </div>

            <div class="page-content">
                <div class="page-header">
                    <h1>
                        SUBCATEGORY
                        <small>
                            <i class="ace-icon fa fa-angle-double-right"></i>
                            View Subcategories
                        </small>
                    </h1>
                </div><!-- /.page-header -->

                <div class="row">
                    <div class="col-xs-12">
                        <p align="center" id="success" class="text-success"></p>
                        <!-- PAGE CONTENT BEGINS -->
                        <table id="dataTable1" class="table table-bordered table-striped-col">
                            <thead>
                                <tr>
                                    <th>Serial No</th>
                                    <th>Category Name</th>
                                    <th>Category Group Name</th>
                                    <th>Subcategory Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                    <th>Sorting</th>                                    
                                    <th>Created Date</th>
                                </tr>
                            </thead>                            
                            <tbody>

                                <?php
                                //echo '<pre>';print_r($sublist);exit;
//                                    $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
//                                    preg_match("/[^\/]+$/", $actual_link, $matches);
//                                    $digit = $matches[0];
//                                    if ($sublist):                                        
                                $j = 1;
//                                        if (ctype_digit($digit)) {
//                                            $j = $digit + 1;
//                                        }
//                                echo "<pre>";
//                                print_r($sublist);exit;
                                foreach ($sublist as $ind):
//                                            echo "<pre>";
//                                            print_r($ind);exit;
                                    ?>
                                    <tr> <td><?php echo $j++; ?></td>                                                        
                                        <td><?php echo $ind['cat_name']; ?></td> 
                                        <td><?php echo $ind['group_name']; ?></td>
                                        <td><?php echo $ind['scat_name']; ?></a></td> 
                                        <td><i id="<?php echo $ind['scat_id']; ?>" onClick="changeStatus('<?php echo $ind['scat_id']; ?>', '<?PHP echo $ind['scStatus']; ?>')" class="status_checks1 btn <?php echo ($ind['scStatus']) ? 'btn-success' : 'btn-danger'
                                    ?>"><?php echo ($ind['scStatus']) ? 'Active' : 'Inactive' ?>
                                            </i></td>                                                       
                                        <td><a href="<?php echo base_url(); ?>admin/subcat_edit?subid=<?php echo $ind['scat_id']; ?>&cid=<?php echo $ind['category_id']; ?>"><i class="ace-icon fa fa-pencil bigger-120"></i></a><?php // if ($_SESSION['utype'] == 1) {   ?><a  href="<?php echo base_url() ?>subcategories/subcategory_delete?subid=<?php echo $ind['scat_id']; ?>" onclick="return confirm('Are you sure you want to delete this SubCategory?')" ><i class="ace-icon fa fa-trash-o bigger-120"></i></a><?php // }   ?></td>
                                        <td style="width:15%;">
                                            <input type="text" name="subsortId" class="sortW" id="sortid_<?php echo $ind['scat_id']; ?>" value="<?php echo $ind['scSort']; ?>">
                                            <input type="hidden" name="subcatid" value="<?php echo $ind['scat_id']; ?>">
                                            <button type="button" onClick="sortFunction('<?php echo $ind['scat_id']; ?>', 'sortid_<?php echo $ind['scat_id']; ?>');" id="catsorting" value="save" name="save" class="sorting_value btn btn-success btn-quirk btn-wide mr5">Save</button>
                                        </td>

                                        <td><?php echo $ind['createdDate']; ?> </td>
                                    </tr>
                                <?php endforeach; ?>
                                <?php // endif;  ?>  

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>	 
        </div>
    </div><!-- /.main-content -->
    <?php $this->load->view('admin/common/footer', true); ?>
</div><!-- /.main-container -->
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<!-- jQuery 2.1.4 -->
<script type="text/javascript">
                                                $(document).ready(function ()
                                                {
                                                    $('.searchDb').keyup(function () {
                                                        var searchValue = $(this).val();
                                                        $.ajax({
                                                            type: "POST",
                                                            url: '<?php echo base_url() . "admin/subCategorySearch" ?>',
                                                            data: {
                                                                searchValue: searchValue
                                                            },
                                                            success: function (data)
                                                            {

                                                            }
                                                        });
                                                    });
                                                    $('.capitalize').keyup(function (evt) {
                                                        var text = $(this).val();
                                                        $(this).val(text.replace(/^(.)|\s(.)/g, function (data) {
                                                            return data.toUpperCase();
                                                        }));
                                                    });
                                                });
                                                //$(".status_checks1").click(function () {
                                                function changeStatus(id, status) {
                                                    //var status = ($(this).hasClass("btn-success")) ? '0' : '1';
                                                    //                                                                        alert(status);
                                                    var msg = (status == '0') ? '1' : '0';
                                                    if (status == '0') {
                                                        status = 'Inactive';
                                                    } else {
                                                        status = 'Active';
                                                    }
                                                    if (confirm("Are you sure to " + status)) {
                                                        //                                                                            var id = $(this).attr('id');
                                                        //                                                                            alert(id);
                                                        //                                                                            alert(status);
                                                        $.ajax({
                                                            type: "POST",
                                                            url: '<?php echo base_url() . "subcategories/status" ?>',
                                                            data: {
                                                                id: id,
                                                                status: msg,
                                                            },
                                                            success: function (data)
                                                            {
                                                                $(this).hasClass("btn-success");
                                                                if (status == 'Inactive') {
                                                                    status = 'Active';
                                                                    $('#' + id).addClass("btn-success");
                                                                    $('#' + id).removeClass("btn-danger");
                                                                } else {
                                                                    status = 'Inactive';
                                                                    $('#' + id).addClass("btn-danger");
                                                                    $('#' + id).removeClass("btn-success");
                                                                }
                                                                $('#' + id).text(status);
                                                            }
                                                        });
                                                    }

                                                }
                                                //                                                                    });
                                                /**
                                                 * Function to update sorting value in subcategories
                                                 */

                                                function sortFunction(subCatId, sortItemId) {
                                                    var id = $('#' + sortItemId).val();
                                                    var successMessage = 'Sorting value ' + id + ' Updated succesfully';
                                                    $.ajax({
                                                        type: "POST",
                                                        url: '<?php echo base_url() . "subcategories/subcategory_name_sorting" ?>',
                                                        data: {
                                                            txtboxvalue: id,
                                                            sortvalue: subCatId
                                                        },
                                                        success: function (data)
                                                        {
                                                            $('#success').html(successMessage);
                                                        }
                                                    });
                                                }

                                                function checkboxFunction(id, checkval) {
                                                    //        alert(id);
                                                    $('#' + checkval).change(function () {
                                                        if ($(this).is(":checked")) {
                                                            var checkValue = '1';
                                                        } else {
                                                            var checkValue = '0';
                                                        }
                                                        $.ajax({
                                                            type: "POST",
                                                            url: '<?php echo base_url() . "subcategories/subCategory_checked" ?>',
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

                                                function getsubcategories(ctype) {
                                                    if (ctype == 'catId') {
                                                        var catid = $('#cat_names').val();
                                                    } else {
                                                        var catid = '';
                                                    }
                                                    if (ctype == 'groupId') {
                                                        var groupId = $('#cat_groups').val();
                                                    } else {
                                                        var groupId = '';
                                                    }
                                                    var subcat = '';
                                                    subcat = $('#subcat').val();
                                                    $.ajax({
                                                        type: "POST",
                                                        url: '<?php echo base_url() . "subcategories/getSubcategory" ?>',
                                                        data: {catid: catid, groupId: groupId, subcat: subcat},
                                                        dataType: 'html',
                                                        success: function (output_str)
                                                        {
                                                            $('#cat_group').html(output_str);
                                                            $('#success').hide();
                                                        }
                                                    });

                                                }
                                                $(document).ready(function ()
                                                {
                                                    $(".changeCategory").change(function ()
                                                    {
                                                        var groupid = $(this).val();
                                                        $.ajax({
                                                            type: "POST",
                                                            url: '<?php echo base_url() . "subcategories/categorygroup" ?>',
                                                            data: "group=" + groupid,
                                                            dataType: 'html',
                                                            success: function (output_str)
                                                            {
                                                                $('#cat_groups').html(output_str);
                                                                $('#success').hide();
                                                            }
                                                        });
                                                    });
                                                });

</script>



