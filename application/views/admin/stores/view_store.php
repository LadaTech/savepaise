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

                    <li class="active">View Stores</li>
                </ul><!-- /.breadcrumb -->
            </div>

            <div class="page-content">
                <div class="page-header">
                    <h1>
                        Stores
                        <small>
                            <i class="ace-icon fa fa-angle-double-right"></i>
                            View Stores
                        </small>
                    </h1>
                </div><!-- /.page-header -->

                <div class="row">
                    <div class="col-xs-12">
                        <!-- PAGE CONTENT BEGINS -->
                        <table id="simple-table" class="table  table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="center">ID</th>                                    
                                    <th class="center">Store Name </th>                               
                                    <th class="center">Store URL</th>
                                    <th class="center">Offer ID</th>
                                    <th class="center">Offer Name</th>
                                    <th class="center">Store Image</th>
                                    <th class="center">Store Link</th>
                                    <th class="center">Status</th>                                     
                                    <th class="center">Created_By</th> 
                                    <th class="center">Created_Date</th>                                    
                                    <th>Action</th>                            
                                </tr> 
                            </thead>
                            <tbody>

                                <?php foreach ($records as $store_data) { ?>
                                    <tr>
                                        <td><?php echo $store_data->id ?></td>
                                        <td><?php echo $store_data->store_name ?></td>
                                        <td><?php echo $store_data->store_url ?></td>                                        
                                        <td><?php echo $store_data->offer_id ?></td>
                                        <td><?php echo $store_data->offer_name ?></td>
                                        <td><?php echo $store_data->store_image ?></td>
                                        <td><?php echo $store_data->store_link ?></td>
                                        <!--<td><?php // echo $store_data->status       ?></td>-->
                                        <td><i id="<?php echo $store_data->id; ?>" onClick="changeStatus('<?php echo $store_data->id; ?>', '<?PHP echo $store_data->status; ?>')" class="status_checks1 btn <?php echo ($store_data->status) ? 'btn-success' : 'btn-danger'
                                    ?>"><?php echo ($store_data->status) ? 'Active' : 'Inactive' ?>
                                            </i></td>   
                                        <td><?php echo $store_data->created_by ?></td>
                                        <td><?php echo $store_data->created_date ?></td>                                          
                                        <td>
                                            <div class="hidden-sm hidden-xs btn-group">	                                                                
                                                <a href="<?php echo base_url() ?>admin/edit_store?sid=<?php echo $store_data->id; ?>"><i class="ace-icon fa fa-pencil bigger-120"></i></a>                                                
                                                <a href="<?php echo base_url() ?>stores/delete_store?sid=<?php echo $store_data->id; ?>" id="deletetag" class="deletetag" onclick="return confirm('Are you sure you want to delete this item?');" > <i class="ace-icon fa fa-trash-o bigger-120"></i></a>
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
    </div><!-- /.main-content -->
    <?php $this->load->view('admin/common/footer', true); ?>
</div><!-- /.main-container -->


<script src="<?php echo base_url(); ?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
Bootstrap 
<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/jquery.validate.min.js"></script>
<script type='text/javascript' src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.js"></script>
<script type='text/javascript' src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/additional-methods.js"></script>
<script type="text/javascript">



                                                function changeStatus(id, status) {
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
                                                            url: '<?php echo base_url() . "category/changeStatus" ?>',
                                                            data: {
                                                                id: id,
                                                                status: msg,
                                                            },
                                                            success: function (data)
                                                            {
                                                                alert(data);
                                                                $(this).hasClass("btn-success");
                                                                if (status == 'Inactive') {
                                                                    status = 'Active';
                                                                    $('#' + id).addClass("btn-success");
                                                                    $('#' + id).removeClass("btn-danger");
                                                                } else {
                                                                    alert('fail');
                                                                    status = 'Inactive';
                                                                    $('#' + id).addClass("btn-danger");
                                                                    $('#' + id).removeClass("btn-success");
                                                                }
                                                                $('#' + id).text(status);
                                                            }
                                                        });
                                                    }

                                                }



</script>

