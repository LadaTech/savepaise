<?PHP include_once('common/header.php'); ?>
<!-- –––––––––––––––[ PAGE CONTENT ]––––––––––––––– -->
<main id="mainContent" class="main-content">
    <!-- Page Container -->
    <div class="page-container ptb-20">
        <div class="container">
            <section class="stores-area stores-area-v2">
                <h3 class="mb-40 t-uppercase">Contact Us</h3>			 
            </section>
            <div class="contact-area contact-area-v1 panel">
<!--                <div class="row row-tb-20">
                    <div class="col-xs-12">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d409238.13468062127!2d34.24871928853258!3d36.7424200891376!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1527f4a4c0be6e9f%3A0x4dbef2b1f81e7d77!2sMersin%2C+Mesudiye+Mahallesi%2C+Akdeniz%2FMersin+Province%2C+Turkey!5e0!3m2!1sen!2sin!4v1498211246146" width="100%" height="160" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>-->
                <div class="ptb-30 prl-30">
                    <div class="row row-tb-20">
                        <div class="col-xs-12 col-md-6">
                            <div class="contact-area-col contact-info">
                                <div class="contact-info">
                                    <h3 class="t-uppercase h-title mb-20">Contact informations</h3>

                                    <ul class="contact-list mb-40">
                                        <li>
                                            <span class="icon lnr lnr-map-marker"></span>
                                            <h5>Address</h5>
                                            <p class="color-mid">#501, Hi-Tech City, Madhapur, Hyd.</p>
                                        </li>
                                        <li>
                                            <span class="icon lnr lnr-envelope"></span>
                                            <h5>Email</h5>
                                            <p class="color-mid">info@savepaise.com</p>
                                        </li>
                                        <li>
                                            <span class="icon lnr lnr-phone-handset"></span>
                                            <h5>Our phone</h5>
                                            <p class="color-mid">(+212) 584-241-654</p>
                                        </li>
                                    </ul>
                                    <ul class="social-icons social-icons--colored list-inline">
                                        <li class="social-icons__item">
                                            <a href="#"><i class="fa fa-facebook"></i></a>
                                        </li>
                                        <li class="social-icons__item">
                                            <a href="#"><i class="fa fa-twitter"></i></a>
                                        </li>
                                        <li class="social-icons__item">
                                            <a href="#"><i class="fa fa-linkedin"></i></a>
                                        </li>
                                        <li class="social-icons__item">
                                            <a href="#"><i class="fa fa-google-plus"></i></a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <div class="contact-area-col contact-form">
                                <h3 class="t-uppercase h-title mb-20">Get in touch</h3>
                                <form id="contact_details" name="contact_details" method="post" action="<?PHP echo base_url() . 'email_controller/contact_us' ?>">

                                    <?PHP
                                    if($this->session->flashdata() != NULL){
                                    echo $this->session->flashdata('email_sent');
                                    }
                                    
                                    ?>
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" id="user_name" name="user_name" class="form-control" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label>Email Address</label>
                                        <input type="text" id="email" name="email"class="form-control" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input type="number" id="pnumber" name="pnumber"class="form-control" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label>Message</label>
                                        <textarea rows="5" class="form-control" id="message" name="message"required="required"></textarea>
                                    </div>
                                    <button class="btn" id="contact_us" name="contact_us">Send Message</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Contact Us Area -->
        </div>
    </div>
    <!-- End Page Container -->


</main>

<!-- –––––––––––––––[ END PAGE CONTENT ]––––––––––––––– -->
<?PHP include_once('common/footer.php') ?>
<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/jquery.validate.min.js"></script>
<script type='text/javascript' src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.js"></script>
<script type='text/javascript' src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/additional-methods.js"></script>
<script type="text/javascript">

    $(document).ready(function () {
        //        custom validation method for email
        $.validator.addMethod('customemail', function (value, element) {
            var re = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            return re.test(value);
        },
                'Sorry, I`ve enabled very strict email validation'
                );
//        custom validation method for password
        $("#contact_details").validate({
            rules: {
                user_name: "required",
                email: {
                    required: true,
                    email: true,
                    customemail: true
                },
                pnumber: {
                    required: true,
                    maxlength: 10,
                    minlength: 10
                },
                messgae: "required"
            },
            messages: {
                user_name: "please enter your name",
                message: "please enter a messgae",
                email: {
                    required: "Please Enter Your Email",
                    email: "Enter Correct Email Id ",
                    customemail: "Enter Valid Email"
                },
                pnumber: {
                    required: "Please Enter Your  Mobile Number",
                    maxlength: "Enter 10 Digit Number",
                    minlength: "Enter The 10 Digit Number"
                }
            }
        })
    });
</script>
