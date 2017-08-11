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
                        <!-- PAGE CONTENT BEGINS -->
                        <table id="simple-table" class="table  table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="center">ID</th>                                    
                                    <th class="center">Promo ID </th>                               
                                    <th class="center">Store ID</th>
                                    <th class="center">Title</th>
                                    <th class="center">Category ID</th>
                                    <th class="center">SubCategory ID</th>
                                    <th class="center">Description</th>
                                    <th class="center">Type</th>
                                    <th class="center">code</th>                                     
                                    <th class="center">Ref_ID</th> 
                                    <th class="center">Link</th>  
                                    <th class="center">Expiry Date</th>
                                    <th class="center">Added Date</th>
                                    <th class="center">Status</th>
                                    <th class="center">Created Date</th>
                                    <th class="center">Created By</th>
                                    <th>Action</th>                            
                                </tr> 
                            </thead>
                            <tbody>

                                <?php foreach ($records as $coupons_data) { ?>
                                    <tr>
                                        <td><?php echo $coupons_data->id ?></td>
                                        <td><<?php echo $coupons_data->promo_id ?></td>
                                        <td><?php echo $coupons_data->store_id ?></td>                                        
                                        <td><?php echo $coupons_data->title ?></td>
                                        <td><?php echo $coupons_data->category_id ?></td>
                                        <td><?php echo $coupons_data->subcategory_id ?></td>
                                        <td><?php echo $coupons_data->description ?></td>
                                        <td><?php echo $coupons_data->type ?></td>                                        
                                        <td><?php echo $coupons_data->code ?></td>
                                        <td><?php echo $coupons_data->ref_id ?></td>
                                        <td><?php echo $coupons_data->link ?></td>
                                        <td> <?php echo $coupons_data->expiry_date ?></td>
                                        <td><?php echo $coupons_data->added_date ?></td>
                                        <td><?php echo $coupons_data->status ?></td>
                                        <td><?php echo $coupons_data->created_by ?></td>
                                        <td><?php echo $coupons_data->created_date ?></td>
                                        <td>
                                            <div class="hidden-sm hidden-xs btn-group">	                                                                
                                                <a href="<?php // echo base_url() ?>admin/edit_coupon?sid=<?php echo $coupons_data->id; ?>"><i class="ace-icon fa fa-pencil bigger-120"></i></a>                                                
                                                <a href="<?php // echo base_url() ?>admin/delete_coupon?sid=<?php echo $coupons_data->id; ?>" id="deletetag" class="deletetag" onclick="return confirm('Are you sure you want to delete this item?');" > <i class="ace-icon fa fa-trash-o bigger-120"></i></a>
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

