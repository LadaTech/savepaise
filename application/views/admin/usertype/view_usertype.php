<?PHP $this->load->view('admin/common/header', true); ?>
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
                        <table id="simple-table" class="table  table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="center"> Sl No</th>                                    
                                    <th class="center">User Type Name </th>                               
                                    <th class="hidden-480">Created By</th>
                                    <th>Created Date</th>                                     
                                    <th class="hidden-480">Updated By</th> 
                                    <th>Updated Date</th>                                    
                                    <th>Action</th>                            
                                </tr> 
                            </thead>
                            <tbody>
                                <?php
                                foreach ($utype as $udata) {
                                    echo "<tr>";
                                    echo "<td>" . $udata->id . "</td>";
                                    echo "<td>" . $udata->user_type . "</td>";
                                    echo "<td>" . $udata->created_by . "</td>";
                                    echo "<td>" . $udata->created_date . "</td>";
                                    echo "<td>" . $udata->updated_by . "</td>";
                                    echo "<td>" . $udata->updated_date . "</td>";
                                    ?>
                                <td>
                                    <div class="hidden-sm hidden-xs btn-group">											 
                                        <div class="hidden-sm hidden-xs btn-group">	                                                                
                                            <a href="<?php echo base_url() ?>admin/edit_usertype?uid=<?php echo $udata->id; ?>"><i class="ace-icon fa fa-pencil bigger-120"></i></a>                                                
                                            <a href="<?php echo base_url() ?>users/delete_usertype?uid=<?php echo $udata->id; ?>" id="deletetag" class="deletetag" onclick="return confirm('Are you sure you want to delete this item?');" > <i class="ace-icon fa fa-trash-o bigger-120"></i></a>
                                        </div>
                                    </div>
                                </td>                               
                                <?php
                                echo "<tr>";
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

