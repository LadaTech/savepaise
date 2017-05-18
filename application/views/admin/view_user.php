<?PHP $this->load->view('admin/common/header', true); 
//echo "<pre>";
//print_r($utype);exit;?>
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
                                    <th class="center">ID</th>                                    
                                    <th class="center">First Name </th>                               
                                    <th class="center">Last Name</th>
                                    <th class="center">User Type</th>                                     
                                    <th class="center">Email</th> 
                                    <th>Phone Number</th>                                    
                                    <th>Action</th>                            
                                </tr> 
                            </thead>
                            <tbody>
                                <?php foreach ($records as $udata) { ?>
                                    <tr>
                                        <td><?php echo $udata->id ?></td>
                                        <td><?php echo $udata->firstname ?></td>
                                        <td><?php echo $udata->lastname ?></td>
                                        <td><?php foreach ($utype as $uty) { ?><?php
                                                                    if (isset($uty->id) && $uty->id != '')
                                                                        if ($uty->id == $udata->usertype)
                                                                            echo $uty->user_type;
                                                                    ?></a>
                                                                <?php } ?></td>
                                        <td><?php echo $udata->email ?></td>
                                        <td><?php echo $udata->pnumber ?></td>                                          
                                        <td>
                                            <div class="hidden-sm hidden-xs btn-group">															 

<!--                                                <button class=" edituser btn btn-xs btn-info" href="#my-modal" role="button" data-toggle="modal" id="edituser" data-id="<?php echo $udata->id; ?>">-->
                                                
                                                    <a href="<?php echo base_url() ?>admin/edit_user?uid=<?php echo $udata->id; ?>"><i class="ace-icon fa fa-pencil bigger-120"></i></a>
                                                
                                                <!--</button>-->
                                                <button class="btn btn-xs btn-danger" href="#my-modal1" role="button" data-toggle="modal">
                                                    <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                                </button>
                                            </div>
                                        </td>  

                                        
                                <!--DELETE CLASS MODEL DIV OPEN-->

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

 
<!--<script src="<?php echo base_url(); ?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
 Bootstrap 
<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/jquery.validate.min.js"></script>
<script type='text/javascript' src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.js"></script>
<script type='text/javascript' src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/additional-methods.js"></script>
<script type="text/javascript">

</script>-->
