
<?PHP
$this->load->view('admin/common/header', true);

// echo "<pre>";
// print_r($categories);exit;
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

                    <li class="active">Add Banners</li>
                </ul><!-- /.breadcrumb -->

            </div>

            <div class="page-content">
                <div class="page-header">
                    <h1>
                        HOME BANNERS
                        <small>
                            <i class="ace-icon fa fa-angle-double-right"></i>
                            Add Banners
                        </small>
                    </h1>
                    <center><p><h6>NOTE:   Please Enter Width = 800 and Height =500 Images Only </h6></p></center>

                </div><!-- /.page-header -->
                <div class="row">
                    <div class="col-xs-12">               
                        <!-- PAGE CONTENT BEGINS -->
                        
                        <form method="post" id="banners" name="banners" class="form-horizontal" action="<?php echo base_url() . "banners/add_banner" ?>" enctype="multipart/form-data" >
                            <?php
//                            echo $_SESSION['firstname'];exit;
                            if ((isset($message)) && (!empty($message))) {
                                echo $message;
                            }
                            ?>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Image <span class="text-danger">*</span></label>
                                <div class="col-sm-6">
                                    <input type="file" name="image_c" id="image_c" size="20" >
                                </div>
                            </div>  
                            <div class="form-group">
                                <label class="col-sm-3 control-label capitalize">Title<span class="text-danger">*</span></label>
                                <div class="col-sm-6">
                                    <input type="text" id="title" name="title" class="form-control capitalize" placeholder="Enter title" >
                                </div>
                            </div> 
                            <div class="form-group">
                                <label class="col-sm-3 control-label capitalize">Discription<span class="text-danger">*</span></label>
                                <div class="col-sm-6">
                                    <textarea id="dicription" name="dicription" class="form-control capitalize" ></textarea>
                                </div>
                            </div>  
                            <div class="form-group">
                                <label class="col-sm-3 control-label capitalize">link<span class="text-danger">*</span></label>
                                <div class="col-sm-6">
                                    <input type="text" id="link" name="link" class="form-control capitalize" placeholder="Enter link" />
                                </div>
                            </div>  
                            <div class="form-group">
                                <label class="col-sm-3 control-label capitalize">Rating<span class="text-danger">*</span></label>
                                <div class="col-sm-6">                                                                           
                                    <select name="rating" id="rating" class="form-control cat" style="width: 100%">
                                        <option value="select">select</option> 
                                        <option value="1">1</option> 
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>                                        
                                    </select>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-sm-9 col-sm-offset-3">
                                    <button type="submit" id="submit"  name="sc_submit" value="submit"  class="btn btn-success btn-quirk btn-wide mr5">Submit</button>
                                    <button type="reset" class="btn btn-quirk btn-wide btn-default">Reset</button>
                                </div>
                            </div>

                        </form>  <!-- panel-body -->  
                    </div>
                </div>


            </div>	 
        </div>
    </div><!-- /.main-content -->
</div><!-- /.main-container -->

<?php $this->load->view('admin/common/footer', true); ?>

<script src="<?php echo base_url(); ?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap -->
<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/jquery.validate.min.js"></script>
<script type='text/javascript' src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.js"></script>
<script type='text/javascript' src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/additional-methods.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
//        custom validation method for usertype
        $.validator.addMethod("valueNotEquals", function (value, element, arg) {
            return arg !== value;
        }, "Value must not equal arg.");
//        custom validation method for email
        $.validator.addMethod('customemail', function (value, element) {
            var re = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            return re.test(value);
        },
                'Sorry, I`ve enabled very strict email validation'
                );
//        custom validation method for password
        $.validator.addMethod('custompass', function (value, element) {
            var re = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/;
            return re.test(value);
        },
                'Sorry, I`ve enabled very strict password validation'
                );
        $("#banners").validate({
            rules: {
                image_c: {
                    required: true,
                    extension: "jpeg" | "jpg" | "gif" | "png"
                },
                title: "required",
                dicription: "required",
                link: "required",
                rating: {
                    valueNotEquals: "select"
                }
            },
            messages: {
                title: "Please enter title",
                dicription: "Please write discription",
                link: "Please enter link",
                image_c: "Please upload jpeg,png,gif,jpg files only",
                rating: {
                    valueNotEquals: "Please select an item!"
                }
            },
            submitHandler: function (form) {
                form.submit();
            }
        });

    });
</script>


