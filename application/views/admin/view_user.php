<?PHP include_once('common/header.php'); ?> 
<div class="main-container ace-save-state" id="main-container">		
    <?PHP include_once('common/sidebar.php'); ?>
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
                                    <th class="center">First Name </th>                                      
                                    <th>Last Name</th>                                    
                                    <th class="hidden-480">Email ID</th>				 
                                    <th class="hidden-480">Phone Number</th>   
                                    <th>User Type</th>
                                    <th>Action</th>                            
                                </tr> 
                            </thead>
                            <tbody>
                                <?php
                                foreach ($records as $udata) {
                                    echo "<tr>";
                                    echo "<td>" . $udata->id . "</td>";
                                    echo "<td>" . $udata->firstname . "</td>";
                                    echo "<td>" . $udata->lastname . "</td>";
                                    echo "<td>" . $udata->email . "</td>";
                                    echo "<td>" . $udata->pnumber . "</td>";
                                    echo "<td>" . $udata->usertype . "</td>";
                                    ?>
                                <td>
                                    <div class="hidden-sm hidden-xs btn-group">															 

                                        <button class="btn btn-xs btn-info" href="#my-modal" role="button" data-toggle="modal">
                                            <i class="ace-icon fa fa-pencil bigger-120"></i>
                                        </button>

                                        <button class="btn btn-xs btn-danger" href="#my-modal1" role="button" data-toggle="modal">
                                            <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                        </button>
                                    </div>
                                </td>                               

                                <!--EDIT MODEL DIV CALL-->

                                <div id="my-modal" class="modal fade" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form class="form-horizontal useredit" role="form" id="useredit" action="<?php echo base_url() ?>users/edituser" method="post"></form>
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h3 class="smaller lighter blue no-margin">Edit Member</h3>
                                            </div>

                                            <div class="modal-body">
                                                <div class="col-xs-12">
                                                    <!-- PAGE CONTENT BEGINS -->
                                                    <div class="row">
                                                        <div class="col-xs-12">
                                                            
                                                                <div class="form-group">                                                                
                                                                    <input type="hidden" class="col-xs-8 col-sm-6" id="id" name="id" value="<?php echo $udata->id ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-sm-6 control-label" for="form-field-1">Frist Name</label>
                                                                    <input type="text" class="col-xs-8 col-sm-6" id="firstname" name="firstname" value="<?php echo $udata->firstname ?>">
                                                                </div>
                                                                <div class="clearleft"></div>
                                                                <div class="form-group">
                                                                    <label class="col-sm-6 control-label" for="form-field-1">Last Name</label>
                                                                    <input type="text" class="col-xs-8 col-sm-6" id="lastname" name="lastname" value="<?php echo $udata->lastname ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-sm-6 control-label" for="form-field-1">User Type</label>
                                                                    <input type="text" class="col-xs-8 col-sm-6" id="usertype" name="usertype" value="<?php echo $udata->usertype ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-sm-6 control-label" for="form-field-1">Email ID</label>
                                                                    <input type="text" class="col-xs-8 col-sm-6" id="email" name="email" value="<?php echo $udata->email ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-sm-6 control-label" for="form-field-1">Phone Number</label>
                                                                    <input type="text" class="col-xs-8 col-sm-6" id="pnumber" name="pnumber" value="<?php echo $udata->pnumber ?>">
                                                                </div>
                                                                <div class="clearboth"></div>
                                                        </div><!-- /.span --> 
                                                    </div><!-- /.row -->
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-sm btn-info" type="button" id="edituser" name="edituser">
                                                    <i class="ace-icon fa fa-check bigger-110"></i>EDIT USER
                                                </button>

                                                <button class="btn btn-sm btn-danger pull-right" data-dismiss="modal">
                                                    <i class="ace-icon fa fa-times"></i>
                                                    Close
                                                </button>
                                                	

                                            </div></form>
                                        </div><!-- /.modal-content -->
                                        
                                    </div><!-- /.modal-dialog -->
                                </div>

                                <!--EDIT CLASS MODEL DIV CLOSE-->
                                <!--DELETE CLASSMODEL DIV OPEN-->

                                <div id="my-modal1" class="modal fade" tabindex="-1">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h3 class="smaller lighter blue no-margin">Delete This Item</h3>
                                            </div>

                                            <div class="modal-body">
                                                <div class="col-xs-12">
                                                    <!-- PAGE CONTENT BEGINS -->
                                                    <div class="alert alert-info bigger-110">
                                                        These items will be permanently deleted and cannot be recovered.
                                                    </div>
                                                    <div class="space-6"></div>
                                                    <p class="bigger-110 bolder center grey">
                                                        <i class="ace-icon fa fa-hand-o-right blue bigger-120"></i>
                                                        Are you sure?
                                                    </p>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-sm btn-info" type="button">
                                                    <i class="ace-icon fa fa-trash-o bigger-110"></i>
                                                    Delete
                                                </button>
                                                <button class="btn btn-sm btn-danger pull-right" data-dismiss="modal">
                                                    <i class="ace-icon fa fa-times"></i>
                                                    Close
                                                </button>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div>
                                <!--DELETE MODEL CLASS CLOSE-->
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
    <?php include_once('common/footer.php') ?>
</div><!-- /.main-container -->
