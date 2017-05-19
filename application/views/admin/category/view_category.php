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
                      <table id="dataTable1" class="table table-bordered table-striped-col">
                                <thead>
                                    <tr>
                                        <th>Serial No</th>
                                        <th>Category Name</th>
                                        <th>Group Name</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                        <th>Sorting</th>
                                        <th>Show in header?</th>
                                        <th>Created Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>	 
        </div>
    </div><!-- /.main-content -->
    <?php $this->load->view('admin/common/footer', true); ?>
</div><!-- /.main-container -->



