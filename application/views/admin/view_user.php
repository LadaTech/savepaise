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
                                <?php foreach ($records as $udata) { ?>
                                    <tr>
                                        <td><?php echo $udata->id ?></td>
                                        <td><?php echo $udata->firstname ?></td>
                                        <td><?php echo $udata->lastname ?></td>
                                        <td><?php echo $udata->usertype ?></td>
                                        <td><?php echo $udata->email ?></td>
                                        <td><?php echo $udata->pnumber ?></td>                                          
                                        <td>
                                            <div class="hidden-sm hidden-xs btn-group">															 

                                                <button class=" edituser btn btn-xs btn-info" href="#my-modal" role="button" data-toggle="modal" id="edituser" data-id="<?php echo $udata->id; ?>">
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
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h3 class="smaller lighter blue no-margin">Edit Member</h3>
                                            </div>

                                            <div class="modal-body">
                                                <div class="col-xs-12">
                                                    <!-- PAGE CONTENT BEGINS -->
                                                    <div class="row">
                                                        <div class="col-xs-12">

                                                            <form class="form-horizontal" role="form" id="edit_user" name="edit_user" method="post">
                                                                <div class="form-group">                                                                   
                                                                    <input type="hidden"  id="user_id" name="user_id" class="col-xs-8 col-sm-6" id="form-input-readonly" >
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-sm-6 control-label" for="form-field-1" value="" />Frist Name</label>
                                                                    <input type="text" class="col-xs-8 col-sm-6" name="editfirstname"  />
                                                                </div>
                                                                <div class="clearleft"></div>
                                                                <div class="form-group">
                                                                        <label class="col-sm-6 control-label" for="form-field-1" value="" />Last Name</label>
                                                                        <input type="text" class="col-xs-8 col-sm-6" id="form-input-readonly"  >
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="col-sm-6 control-label" for="form-field-1" value="" />User Type</label>
                                                                        <input type="text" class="col-xs-8 col-sm-6" id="form-input-readonly" >
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="col-sm-6 control-label" for="form-field-1">Email ID</label>
                                                                        <input type="text" class="col-xs-8 col-sm-6" id="form-input-readonly" value=""/>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="col-sm-6 control-label" for="form-field-1">Phone Number</label>
                                                                        <input type="text" class="col-xs-8 col-sm-6" id="form-input-readonly" value="" />
                                                                    </div>
                                                                    <div class="clearboth"></div>
                                                            </form>		
                                                        </div><!-- /.span --> 
                                                    </div><!-- /.row -->
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-sm btn-info" type="button">
                                                    <i class="ace-icon fa fa-check bigger-110"></i>
                                                    Save
                                                </button>
                                                <button class="btn btn-sm btn-danger pull-right" data-dismiss="modal">
                                                    <i class="ace-icon fa fa-times"></i>
                                                    Close
                                                </button>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div>

                                <!--EDIT CLASS MODEL DIV CLOSE-->F
                                        
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

 
<script src="<?php echo base_url(); ?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap -->
<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/jquery.validate.min.js"></script>
<script type='text/javascript' src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.js"></script>
<script type='text/javascript' src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/additional-methods.js"></script>
<script type="text/javascript">
//                                                    function edit_user(id){
//    alert(id);
//    $(".firstname .firstname").val(id);
//                                                    $.ajax
//                                                            ({
//                                                            url   : "<?php // echo site_url('view_user/ajax_edit_user');   ?>",
//                                                                    type  : 'POST',
//                                                                    data  :{id : id},                                                                    
//                                                                    success: function(data)
//                                                                    {
//                                                                    $('#my-modal').html(data);
//                                                                            $('#my-modal').modal({
//                                                                    backdrop: 'static',
//                                                                            keyboard: false
//                                                                    });
//                                                                    }
//                                                            });
//                                                            } 
//                                                            
//                                                    $("body").on("click", ".my-modal", function () {
//                                                        var id = $(this).parent("td").data('id');
//                                                        alert (id);exit;
//                                                        var title = $(this).parent("td").prev("td").prev("td").text();
//                                                        var description = $(this).parent("td").prev("td").text();
//
//                                                        $("#edit-item").find("input[name='title']").val(title);
//                                                        $("#edit-item").find("textarea[name='description']").val(description);
//                                                        $("#edit-item").find("form").attr("action", url + '/update/' + id);
//
//                                                    });


//                                                $(document).on("click", ".my-modal", function () {
//                                                    var id = $(this).parent("td").data('id');
//                                                    var firstname = $(this).parent("td").prev("td").prev("td").text();
////                                                    var description = $(this).parent("td").prev("td").text();
//                                                    $("#my-modal").find("input[name='firstname']").val(firstname);
////                                                    $("#edit-item").find("textarea[name='description']").val(description);
////                                                    $("#edit-item").find("form").attr("action", url + '/update/' + id);
//
//
////                                                    $(".firstname #firstname").val(myBookId);
//                                                    // As pointed out in comments, 
//                                                    // it is superfluous to have to manually call the modal.
//                                                    // $('#addBookDialog').modal('show');
//                                                });

//$(document).ready(function(){
//
//    $(document).on('click', '#edituser', function(e){
//  
//     e.preventDefault();
//  
//     var id = $(this).data('id'); // get id of clicked row
//     
//     alert(id);
//     $('#dynamic-content').html(''); // leave this div blank
//     $('#modal-loader').show();      // load ajax loader on button click
// 
//     $.ajax({
//          url: 'viewuser.php',
//          type: 'POST',
//          data: 'id='+id,
//          dataType: 'html'
//     })
//     .done(function(data){
//          console.log(data); 
//          $('#dynamic-content').html(''); // blank before load.
//          $('#dynamic-content').html(data); // load here
//          $('#modal-loader').hide(); // hide loader  
//     })
//     .fail(function(){
//          $('#dynamic-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
//          $('#modal-loader').hide();
//     });
//
//    });
//});
//$(document).ready(function(){
////$('.edituser').on('click', function() {
//$(document).on('click', '#edituser', function(e){
//        // Get the record's ID via attribute
////        var id = $(this).attr('data-id');
//        var id = $(this).data('id');
//        alert (id);
//        $.ajax({
//            url: <?php // echo site_url('view_user/ajax_edit_user'); ?>+ id,
//            method: 'post'
//        }).success(function(response) {
//            // Populate the form fields with the data returned from server
//            $('#edit_user')
//                .find('[name="firstname"]').val(response.firstname).end()
////                .find('[name="name"]').val(response.name).end()
////                .find('[name="email"]').val(response.email).end()
////                .find('[name="website"]').val(response.website).end();
//
//            // Show the dialog
//            bootbox
//                .dialog({
//                    title: 'Edit the user profile',
//                    message: $('#userForm'),
//                    show: false // We will show it manually later
//                })
//                .on('shown.bs.modal', function() {
//                    $('#userForm')
//                        .show()                             // Show the login form
//                        .formValidation('resetForm'); // Reset form
//                })
//                .on('hide.bs.modal', function(e) {
//                    // Bootbox will remove the modal (including the body which contains the login form)
//                    // after hiding the modal
//                    // Therefor, we need to backup the form
//                    $('#userForm').hide().appendTo('body');
//                })
//                .modal('show');
//        });
//    });
//});

    $(document).ready(function () {
        $(document).on('click', '#edituser', function (e) {
//        $('.edituser').on('click', function () {
//            $("#edituser").click(function(){
            var id = $(this).attr('data-id');            
            alert(id);
            $('#firedModal').modal('show');
            $.ajax({
                url: '<?php echo base_url() . "users/edituser" ?>' + id,
                method: "post"
            }).success(function (response) {
//                // Populate the form fields with the data returned from server
                $('#edit_user')
                        $(this).find('[name="editfirstname"]').val(response.editfirstname).end();
                        .find('[name="editlastname"]').val(response.editlastname).end()
                        .find('[name="editusertype"]').val(response.email).end()
                        .find('[name="email"]').val(response.email).end()
                        .find('[name="website"]').val(response.website).end();
//                show the dialogue
//                bootbox
                        .dialog({
                            title: 'Edit the user profile',
                            message: $('#edit_user'),
                            show: false        // We will show it manually later
                        })
                        .on('shown.bs.modal', function () {
                            $('#edit_user')
                                    .show()                             // Show the login form
                                    .formValidation('resetForm'); // Reset form
                        })
                        .on('hide.bs.modal', function (e) {
//                             Bootbox will remove the modal (including the body which contains the login form)
//                             after hiding the modal
//                             Therefor, we need to backup the form
                            $('#edit_user').hide().appendTo('body');
                        })
                        .modal('show')
//
            });
        });

    });

//$(document).ready(function(){
//       $("#edituser").click(function(){
//         $("#user_id").val($(this).attr('data-id')); 
//         $('#my-modal').modal('show');
//       });
//    });
</script>
