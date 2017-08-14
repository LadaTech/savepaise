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
                                            <th>Name</th>
                                            <th>Logo</th>
                                            <th>Created Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>                                                         
                                            <?php
                                            if ($list):
                                                $i = 1;
                                                foreach ($list as $ind):
                                                    ?>
                                                    <td><?php echo $i++; ?></td>
                                                    <td><?php echo $ind['brand_name']; ?></a></td>
                                                    <td><img src = "<?php echo base_url() ?>assets/img/<?php echo $ind['logo']; ?>" alt="" width="50px" /></td>
                                                    <td><?php echo $ind['created_date'];
                                                    ?> </td>
                                                    <td><a href="<?php echo base_url() ?>admin/brandedit?id=<?php echo $ind['brand_id']; ?>"><i class="ace-icon fa fa-pencil bigger-120"></i></a><?php // if ($_SESSION['utype'] == 1) { ?><a href="<?php echo base_url() ?>brands/branddelete?id=<?php echo $ind['brand_id']; ?>" onclick="return confirm('Are you sure you want to delete this Brand?')"><i class="ace-icon fa fa-trash-o bigger-120"></i></a><?php // } ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                    </div>
                </div>
            </div>	 
        </div>
    </div><!-- /.main-content -->
    <?php $this->load->view('admin/common/footer', true); ?>
</div><!-- /.main-container -->

