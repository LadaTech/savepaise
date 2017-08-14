<?PHP $this->load->view('admin/common/header', true); 
//echo "<pre>";
//print_r($cat_list);exit;
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
                                        <th>Category Name</th>                                       
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                        <th>Sorting</th>                                        
                                        <th>Created Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php  foreach($cat_list as $cat){?>
                                    <tr>                                       
                                        <td><?php echo $cat['cat_id'] ?></td> 
                                        <td><?php echo $cat['cat_name']  ?></td>
                                        <td> <img src = "<?php echo base_url() ?>assets/images/nav-icons/<?php echo $cat['image']; ?>" alt="" width="30px" height="30px" />  </td>
                                        
                                        <td><i id="<?php echo $cat['cat_id']; ?>" onClick="changeStatus('<?php echo $cat['cat_id']; ?>', '<?PHP echo $cat['status']; ?>')" class="status_checks1 btn <?php echo ($cat['status']) ? 'btn-success' : 'btn-danger'
                                                    ?>"><?php echo ($cat['status']) ? 'Active' : 'Inactive' ?>
                                                    </i></td>  
                                                     <td><a href="<?php echo base_url() ?>admin/category_edit?catid=<?php echo $cat['cat_id']; ?>"><i class="ace-icon fa fa-pencil bigger-120"></i></a><a  href="<?php echo base_url() ?>category/category_delete?catid=<?php echo $cat['cat_id']; ?>" onclick="return confirm('Are you sure you want to delete this Category?')" ><i class="ace-icon fa fa-trash-o bigger-120"></i></a> </td>
                                        <td style="width:15%;">
                                                    <input type="text" class="sortW" name="sortId" id="sortid_<?php echo $cat['cat_id']; ?>" value="<?php echo $cat['sorting']; ?>">
                                                    <input type="hidden" name="catid" value="<?php echo $cat['cat_id']; ?>">
                                                    <button type="button" onClick="sortFunction('<?php echo $cat['cat_id']; ?>', 'sortid_<?php echo $cat['cat_id']; ?>');" id="catsorting" value="save" name="save" class="sorting_value btn btn-success btn-quirk btn-wide mr5">Save</button>
                                                </td>   
                                                <td><?php echo $cat['created_date'] ?> </td>                                      

                                    </tr>
                                  <?php }?>
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
<!-- Bootstrap -->
<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/jquery.validate.min.js"></script>
<script type='text/javascript' src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.js"></script>
<script type='text/javascript' src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/additional-methods.js"></script>
    <script type="text/javascript">
                                                            $(document).ready(function () {
                                                                $('.capitalize').keyup(function (evt) {
                                                                    var text = $(this).val();
                                                                    $(this).val(text.replace(/^(.)|\s(.)/g, function (data) {
                                                                        return data.toUpperCase();
                                                                    }));
                                                                });
                                                            });

                                                            function sortFunction(catId, sortItemId) {
                                                                var id = $('#' + sortItemId).val();
                                                                var successMessage = 'Sorting value ' + id + ' Updated succesfully';
                                                                $.ajax({
                                                                    type: "POST",
                                                                    url: '<?php echo base_url() . "categories/category_name_sorting" ?>',
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

                                                            function checkboxFunction(id, checkval) {
                                                                $('#' + checkval).change(function () {
                                                                    if ($(this).is(":checked")) {
                                                                        var checkValue = '1';
                                                                    } else {
                                                                        var checkValue = '0';
                                                                    }
                                                                    $.ajax({
                                                                        type: "POST",
                                                                        url: '<?php echo base_url() . "category/category_checked" ?>',
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
                                                            function changeStatus(id, status) {
                                                            var id = id;
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
    </script>
    
