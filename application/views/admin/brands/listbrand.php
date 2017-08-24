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

                    <li class="active">View Brand</li>
                </ul><!-- /.breadcrumb -->
            </div>

            <div class="page-content">
                <div class="page-header">
                    <h1>
                        BRANDS                        
                        <small>
                            <i class="ace-icon fa fa-angle-double-right"></i>
                            View brands
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
                                    <th>Name</th>
                                    <th>Logo</th>                                    
                                    <th>Status</th>
                                    <th>Sort</th>
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
                                            <td><img src = "<?php echo base_url() ?>assets/images/icons/<?php echo $ind['logo']; ?>" alt="" width="50px" /></td>

                                            <td><i id="<?php echo $ind['brand_id']; ?>" onClick="changeStatus('<?php echo $ind['brand_id']; ?>', '<?PHP echo $ind['status']; ?>')" class="status_checks1 btn <?php echo ($ind['status']) ? 'btn-success' : 'btn-danger'
                                            ?>"><?php echo ($ind['status']) ? 'Active' : 'Inactive' ?>
                                                </i></td>    
                                            <td style="width:15%;">
                                                <input type="text" name="subsortId" class="sortW" id="sortid_<?php echo $ind['brand_id']; ?>" value="<?php echo $ind['sort']; ?>">
                                                <input type="hidden" name="subcatid" value="<?php echo $ind['brand_id']; ?>">
                                                <button type="button" onClick="sortFunction('<?php echo $ind['brand_id']; ?>', 'sortid_<?php echo $ind['brand_id']; ?>');" id="catsorting" value="save" name="save" class="sorting_value btn btn-success btn-quirk btn-wide mr5">Save</button>
                                            </td>
                                            <td><?php echo $ind['created_date']; ?> </td>
                                            <td><a href="<?php echo base_url() ?>admin/brandedit?id=<?php echo $ind['brand_id']; ?>"><i class="ace-icon fa fa-pencil bigger-120"></i></a><?php // if ($_SESSION['utype'] == 1) {     ?><a href="<?php echo base_url() ?>brands/branddelete?id=<?php echo $ind['brand_id']; ?>" onclick="return confirm('Are you sure you want to delete this Brand?')"><i class="ace-icon fa fa-trash-o bigger-120"></i></a><?php // }     ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>	 
        </div>
         <?PHP echo $links ;?>
    </div><!-- /.main-content -->
   
    <?php $this->load->view('admin/common/footer', true); ?>
</div><!-- /.main-container -->

<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script type="text/javascript">
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
                url: '<?php echo base_url() . "brands/status" ?>',
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
    
    function sortFunction(subCatId, sortItemId) {
        var id = $('#' + sortItemId).val();
        var successMessage = 'Sorting value ' + id + ' Updated succesfully';
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() . "brands/brand_name_sorting" ?>',
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
</script>