<?PHP
$this->load->view('admin/common/header', true);
//echo "<pre>";
//print_r($utype);exit;
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

                    <li class="active">View coupons</li>
                </ul><!-- /.breadcrumb -->
            </div>

            <div class="page-content">
                <div class="page-header">
                    <h1>
                        Stores
                        <small>
                            <i class="ace-icon fa fa-angle-double-right"></i>
                            View coupons
                        </small>
                    </h1>
                </div><!-- /.page-header -->

                <div class="row">
                    <div class="col-xs-12">
                        <p align="center" id="success" class="text-success"></p>
                        <!-- PAGE CONTENT BEGINS -->
                        <table id="simple-table" class="table  table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="center">ID</th>                                    
                                    <th class="center">Promo ID </th>                               
                                    <th class="center">Store Name</th>
                                    <th class="center">Title</th>
                                    <th class="center">Category ID</th>
                                    <th class="center">SubCategory Name</th>
                                    <th class="center">Description</th>
                                    <th class="center">Type</th>
                                    <th class="center">code</th>                                     
                                    <!--<th class="center">Ref_ID</th>--> 
                                    <th class="center">Link</th>  
                                    <th class="center">Expiry Date</th>
                                    <th class="center">Added Date</th>
                                    <th class="center">Status</th>                                    
                                    <th class="center">sort</th>                                   
                                    <th class="center">Created By</th>
                                    <th class="center">Created Date</th>
                                    <th>Action</th>                            
                                </tr> 
                            </thead>
                            <tbody>

                                <?php foreach ($records as $coupons_data) { ?>
                                    <tr>
                                        <td><?php echo $coupons_data->c_id ?></td>
                                        <td><?php echo $coupons_data->promo_id ?></td>
                                        <td><?php echo $coupons_data->store_name ?></td>                                        
                                        <td><?php echo $coupons_data->title ?></td>
                                        <td><?php echo $coupons_data->category_id ?></td>
                                        <td><?php echo $coupons_data->scat_name ?></td>
                                        <td><?php echo $coupons_data->description ?></td>
                                        <td><?php echo $coupons_data->type ?></td>                                        
                                        <td><?php echo $coupons_data->code ?></td>
                                        <!--<td><?php // echo $coupons_data->ref_id             ?></td>-->
                                        <td><a href="<?php echo $coupons_data->link ?>" class="glyphicon glyphicon-link"></a> </td>
                                        <td> <?php echo $coupons_data->expiry_date ?></td>
                                        <td><?php echo $coupons_data->added_date ?></td>
                                        <td><i id="<?php echo $coupons_data->c_id; ?>" onClick="changeStatus('<?php echo $coupons_data->c_id; ?>', '<?PHP echo $coupons_data->cStatus; ?>')" class="status_checks1 btn <?php echo ($coupons_data->cStatus) ? 'btn-success' : 'btn-danger'
                                    ?>"><?php echo ($coupons_data->cStatus) ? 'Active' : 'Inactive' ?>
                                            </i></td> 
                                        <td style="width:15%;">
                                            <input type="text" name="subsortId" class="sortW" id="sortid_<?php echo $coupons_data->c_id; ?>" value="<?php echo $coupons_data->c_sort; ?>">
                                            <input type="hidden" name="subcatid" value="<?php echo $coupons_data->c_id; ?>">
                                            <button type="button" onClick="sortFunction('<?php echo $coupons_data->c_id; ?>', 'sortid_<?php echo $coupons_data->c_id; ?>');" id="catsorting" value="save" name="save" class="sorting_value btn btn-success btn-quirk btn-wide mr5">Save</button>
                                        </td>
                                        <td><?php echo $coupons_data->created_by ?></td>
                                        <td><?php echo $coupons_data->created_date ?></td>
                                        <td>
                                            <div class="hidden-sm hidden-xs btn-group">	                                                                
                                                <a href="<?php echo base_url() ?>admin/edit_coupon?sid=<?php echo $coupons_data->c_id; ?>"><i class="ace-icon fa fa-pencil bigger-120"></i></a>                                                
                                                <a href="<?php echo base_url() ?>coupons/delete_coupon?sid=<?php echo $coupons_data->c_id; ?>" id="deletetag" class="deletetag" onclick="return confirm('Are you sure you want to delete this item?');" > <i class="ace-icon fa fa-trash-o bigger-120"></i></a>
                                            </div>
                                        </td>                                     
                                    </tr>
                                    <?php
                                }
                                ?>  
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>	 
        </div>
        <?PHP echo $links; ?> 
    </div><!-- /.main-content -->
    <?php $this->load->view('admin/common/footer', true); ?>
</div><!-- /.main-container -->

<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<!--<script src="<?PHP // echo base_url()?>assets/js/bootstrap.min.js"></script>
<script src="<?PHP // echo base_url()?>assets/js/main.min.js"></script>-->
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script type="text/javascript">
//                                                    function changeStatus(id, status) {
////                                                        alert(id);
////                                                        alert(status);
//                                                        var msg = (status == '0') ? '1' : '0';
//                                                        if (status == 0) {
//                                                            status = 'InActive';
//                                                        } else {
//                                                            status = 'Active';
//                                                        }
//                                                        if (confirm("Are you sure to" + status)) {
//                                                            $.ajax({
//                                                                type: "post",
//                                                                url: '<?PHP // echo base_url() . "coupons/changeStatus" ?>',
//                                                                data: {
//                                                                    id: id,
//                                                                    status: msg,
//                                                                },
//                                                                success: function (data) {
//                                                                    $(this).hasClass("btn-success");
//                                                                    if (status == 'InActive') {
//                                                                        status = 'Active';
//                                                                        $('#' + id).addClass("btn-success");
//                                                                        $('#' + id).removeClass("btn-danger");
//                                                                    }
//                                                                    else {
//                                                                        status = "InActive";
//                                                                        $('#' + id).addclass("btn-danger");
//                                                                        ('#' + id).removeClass("btn-success");
//                                                                    }
//                                                                    $('#' + id).text(status);
//                                                                }
//                                                            });
//                                                        }
//                                                    }
                                                    function changeStatus(id, status) {
//                                                        alert(id);
//                                                        alert(status);
//                                                            var id = id;
                                                        //var status = ($(this).hasClass("btn-success")) ? '0' : '1';
                                                        //                                                                        alert(status);
                                                        var msg = (status == '0') ? '1' : '0';
                                                        if (status == '0') {
                                                            status = 'Active';
                                                        } else {
                                                            status = 'Inactive';
                                                        }
                                                        if (confirm("Are you sure to " + status)) {
//                                                                                                                                                var id = $(this).attr('id');
//                                                                                                                                                alert(id);
//                                                                                                                                                alert(status);
                                                            $.ajax({
                                                                type: "POST",
                                                                url: '<?php echo base_url() . "coupons/changeStatus" ?>',
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

//                                                    function sortFunction(coupons_id, sortitem_id) {
//                                                        var id = $('#' + sortitem_id).val();
//                                                        alert(id);
//                                                        var successMessage = 'sorting' + id + 'Updated successfully';
//                                                        $.ajax({
//                                                            type: "post",
//                                                            url: '<?PHP // echo base_url() . "coupons/coupon_sorting"  ?>',
//                                                            data: {
//                                                                txtboxvalue: id,
//                                                                sortvalue: coupons_id,
//                                                            },
//                                                                    success:function(data){
//                                                                        $('#success').html(successMessage);
//                                                                    }
//                                                        });
//
//                                                    }

                                                    function sortFunction(catId, sortItemId) {
                                                        var id = $('#' + sortItemId).val();
                                                        var successMessage = 'Sorting value ' + id + ' Updated succesfully';
                                                        $.ajax({
                                                            type: "POST",
                                                            url: '<?php echo base_url() . "coupons/coupon_sorting" ?>',
                                                            data: {
                                                                txtboxvalue: id,
                                                                sortvalue: catId
                                                            },
                                                            success: function (data)
                                                            {
                                                                $('#success').html(successMessage);
                                                            }
                                                        });
                                                    }
</script>