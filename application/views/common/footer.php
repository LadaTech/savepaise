<section class="footer-top-area pt-20 pb-10 pos-r bg-blue">
    <div class="container">
        <div class="row row-tb-20">
            <div class="col-sm-12 col-md-12">
                <div class="row row-tb-20">
                    <div class="footer-col col-sm-12">
                        <div class="footer-about text-center">
                            <div class="col-sm-12 ftr-logo">
                                <img class="mb-10" src="/assets/images/logo_light.png" width="250" alt="">
                                <p class="color-light">All discount codes identified as "EXCLUSIVE" may not be republished in any medium without express written consent from SavePaise.com. 
                                </p>									
                            </div>		

                        </div>

                    </div>
                    <div class="footer-col col-sm-12">
                        <div class="footer-links text-center">
                            <h2 class="color-lighter ">Free Online Shopping Coupons From Online Stores In India</h2>
                            <hr />
                            <ul>
                                <?PHP foreach ($stores as $store) { ?>
                                    <li><a href="<?PHP echo base_url() ?>store/<?PHP echo $store->store_name ?>" target="_blank"><?PHP echo $store->store_name ?> Offers</a></li>
                                <?PHP } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- –––––––––––––––[ FOOTER ]––––––––––––––– -->
<footer id="mainFooter" class="main-footer">
    <div class="container">
        <div class="row">
            <p>Copyright &copy; 2017 . All rights reserved.</p>
            <ul class="social">
                <li><a href="http://facebook.com/savepaise/" target="_blank"><i class="fa fa-facebook"></i></a></li>
                <li> <a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
            </ul>
            <span class="pull-right" style="margin-top:15px; margin-right:25px;"><a href="index.php">Home | <a href="site-map.php">Site Map</a></span>
        </div>
    </div>
</footer>
<!-- –––––––––––––––[ END FOOTER ]––––––––––––––– -->

</div>
<!-- ––––––––––––––––––––––––––––––––––––––––– -->
<!-- END WRAPPER                               -->
<!-- ––––––––––––––––––––––––––––––––––––––––– -->


<!-- ––––––––––––––––––––––––––––––––––––––––– -->
<!-- BACK TO TOP                               -->
<!-- ––––––––––––––––––––––––––––––––––––––––– -->
<div id="backTop" class="back-top is-hidden-sm-down">
    <i class="fa fa-angle-up" aria-hidden="true"></i>
</div>


<!------ header signin and signup ------->

<div class="modal fade get-coupon-area" tabindex="-1" role="dialog"  style="display: none;" id="signIn">

    <div class="modal-dialog modal-lg">
        <div class="modal-content panel">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <section class="sign-area panel">
                    <h3 class="sign-title">Sign In</h3>
                    <div class="row row-rl-0">
                        <div class="col-sm-6 col-md-7 col-left">
                            <form class="p-40"  id="sign_in" name="sign_in" action="<?PHP echo base_url() ?>index/sign_in" method="post">
                                <div class="form-group">
                                    <label class="sr-only">Email</label>
                                    <input type="text"  id="email" name="email" class="form-control input-lg" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only">Password</label>
                                    <input type="password" id="password" name="password" class="form-control input-lg" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <a href="#" class="forgot-pass-link color-green">Forget Youe Password ?</a>
                                </div>
                                <div class="custom-checkbox mb-20">
                                    <input type="checkbox" id="remember_account" checked>
                                    <label class="color-mid" for="remember_account">Keep me signed in on this computer.</label>
                                </div>
                                <button type="submit"  id="sign_in" name="sign_in" class="btn btn-block btn-lg">Sign In</button>
                            </form>
                            <span class="ortxt">Or</span>
                        </div>
                        <div class="col-sm-6 col-md-5 col-right">
                            <div class="social-login p-40">
                                <div class="mb-20">
                                    <button class="btn btn-lg btn-block btn-social btn-facebook"><i class="fa fa-facebook-square"></i>Sign In with Facebook</button>
                                </div>
                                <div class="mb-20">
                                    <button class="btn btn-lg btn-block btn-social btn-twitter"><i class="fa fa-twitter"></i>Sign In with Twitter</button>
                                </div>
                                <div class="mb-20">
                                    <button class="btn btn-lg btn-block btn-social btn-google-plus"><i class="fa fa-google-plus"></i>Sign In with Google</button>
                                </div>
                                <!--<div class="custom-checkbox mb-20">
                                        <input type="checkbox" id="remember_social" checked>
                                        <label class="color-mid" for="remember_social">Keep me signed in on this computer.</label>
                                </div> -->
                                <div class="text-center color-mid">
                                    <!--Need an Account ?  <button type="button" data-toggle="modal" href="#signUp" class="btn btn-danger">Create Account</button>-->
                                    Need an Account ? <a data-toggle="modal"  href="#signUp"  class="color-green">Create Account</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="modal-footer footer-info t-center ptb-20 prl-30">
                <h4 class="mb-15">Subscribe to Mail</h4>
                <p class="color-mid mb-20">Get our Daily email newsletter with Special Services, Updates, Offers and more!</p>
                <div id="msg">
                    <?PHP
                    if ($this->session->flashdata('subscribe_msg') != '') {
                        echo $this->session->flashdata('subscribe_msg');
                    }
                    ?>
                </div>
                <form  id="subscribe_form" method="post" name="subscribe_form" action="<?PHP echo base_url() . 'email_controller/get_subscribe' ?>">


                    <div class="input-group">
                        <input type="email" name="subscribe_email" id="subscribe_email" class="form-control bg-white" placeholder="Your Email Address" required="required">
                        <span class="input-group-btn">
                            <button class="btn" name="subscribe_submit"  id="subscribe_submit" type="submit">Sign Up</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<div class="modal fade get-coupon-area" tabindex="-1" role="dialog" style="display: none;" id="signUp">
    <div class="modal-dialog modal-lg">
        <div class="modal-content panel">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <section class="sign-area panel">
                    <h3 class="sign-title">Sign Up</h3>
                    <div class="row row-rl-0">
                        <div class="col-sm-6 col-md-7 col-left">
                            <form class="p-40 pt-10" id="sign_up" name="sign_up" action="<?PHP echo base_url() . 'index/sign_up' ?>" method="post">
                                <div class="form-group">
                                    <label class="sr-only">First Name</label>
                                    <input type="text" class="form-control input-lg"  id="firstname"  name="firstname" placeholder="First Name">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only">Last Name</label>
                                    <input type="text" class="form-control input-lg"  id="lastname" name="lastname" placeholder="Last Name">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only">Email</label>
                                    <input type="email" class="form-control input-lg" id="email" name="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only">Password</label>
                                    <input type="password" class="form-control input-lg" id="password" name="password" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only">Phone Number</label>
                                    <input type="number" class="form-control input-lg"  id="pnumber" name="pnumber" placeholder="Phone Number">
                                </div>
                                <div class="custom-checkbox mb-20">
                                    <input type="checkbox" id="agree_terms">
                                    <label class="color-mid" for="agree_terms">I agree to the <a href="#" class="color-green">Terms of Use</a> and <a href="#" class="color-green">Privacy Statement</a>.</label>
                                </div>
                                <button type="submit" id="sign_up" name="sign_up" class="btn btn-block btn-lg">Sign Up</button>
                            </form>
                            <span class="ortxt">Or</span>
                        </div>
                        <div class="col-sm-6 col-md-5 col-right">
                            <div class="social-login p-40">
                                <div class="mb-20">
                                    <button class="btn btn-lg btn-block btn-social btn-facebook"><i class="fa fa-facebook-square"></i>Sign Up with Facebook</button>
                                </div>
                                <div class="mb-20">
                                    <button class="btn btn-lg btn-block btn-social btn-twitter"><i class="fa fa-twitter"></i>Sign Up with Twitter</button>
                                </div>
                                <div class="mb-20">
                                    <button class="btn btn-lg btn-block btn-social btn-google-plus"><i class="fa fa-google-plus"></i>Sign Up with Google</button>
                                </div>
                                <!--<div class="custom-checkbox mb-20">
                                        <input type="checkbox" id="remember_social" checked>
                                        <label class="color-mid" for="remember_social">Keep me signed in on this computer.</label>
                                </div>-->
                                <div class="text-center color-mid">
                                    Already have an Account ? <a href="#signIn" data-toggle="modal" class="color-green">Login</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="modal-footer footer-info t-center ptb-20 prl-30">
                <h4 class="mb-15">Subscribe to Mail</h4>
                <p class="color-mid mb-20">Get our Daily email newsletter with Special Services, Updates, Offers and more!</p>
                <form method="post" id="subscribe_form1" name="subscribe_form1" action="<?PHP echo base_url() . 'email_controller/get_subscribe' ?>">
                    <?PHP // if ($this->session->flashdata != NULL) {  ?>
<!--                            <script>
                            $(document).ready(function () {
                                $("#signUp").modal();
                            });
                        </script>-->

                    <?PHP // }
                    ?>
                    <div class="input-group">
                        <input type="email"  name="subscribe_email1" id="subscribe_email1" class="form-control bg-white" placeholder="Your Email Address" required="required">
                        <span class="input-group-btn">
                            <button class="btn" name="subscribe_submit1"  id="subscribe_submit1" type="submit">Sign Up</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--for change password-->

<div class="modal fade get-coupon-area" tabindex="-1" role="dialog"  style="display: none;" id="changepassword">

    <div class="modal-dialog modal-lg">
        <div class="modal-content panel">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <section class="sign-area panel">
                    <h3 class="sign-title">CHANGE PASSWORD</h3>
                    <div class="row row-rl-0">
                        <div class="col-sm-6 col-md-7 col-left">
                            <form class="p-40"  id="change_password" name="change_password" action="<?PHP echo base_url() ?>index/change_password" method="post">
                                <div class="form-group">
                                    <label class="sr-only">Old Password</label>
                                    <input type="password" id="old_password" name="old_password" class="form-control input-lg" placeholder="Old Password">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only">New PAssword</label>
                                    <input type="password" id="new_password" name="new_password" class="form-control input-lg" placeholder="New Password">
                                </div>                             

                                <button type="submit"  id="change_password" name="change_password" class="btn btn-block btn-lg">SUBMIT</button>
                            </form>

                        </div>

                    </div>
                </section>
            </div>

        </div>
    </div>
</div>


<div class="modal fade get-coupon-area" tabindex="-1" role="dialog"  style="display: none;" id="edit_profile">
    <div class="modal-dialog modal-lg">
        <div class="modal-content panel">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <section class="sign-area panel">
                    <h3 class="sign-title">EDIT PROFILE</h3>
                    <div class="row row-rl-0">
                        <div class="col-sm-6 col-md-7 col-left">
                            <form class="p-40"  id="change_password" name="change_password" action="<?PHP echo base_url() ?>index/edit_profile" method="post">
                                <div class="form-group">
                                    <label class="sr-only">Firstname</label>
                                    <input type="text" id="firstname" name="firstname" class="form-control input-lg" value="<?PHP echo $_SESSION['firstname'] ?>">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only">Lastname</label>
                                    <input type="text" id="lastname" name="lastname" class="form-control input-lg" value="<?PHP echo $_SESSION['lastname'] ?>">
                                </div> 
                                <div class="form-group">
                                    <label class="sr-only">Email</label>
                                    <input type="email" id="email" name="email" class="form-control input-lg" value="<?PHP echo $_SESSION['email'] ?>">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only">Phone Number</label>
                                    <input type="number" id="pnumber" name="pnumber" class="form-control input-lg" value="<?PHP echo $_SESSION['pnumber'] ?>">
                                </div>                             

                                <button type="submit"  id="edit_profile" name="edit_profile" class="btn btn-block btn-lg">SUBMIT</button>
                            </form>

                        </div>

                    </div>
                </section>
            </div>

        </div>
    </div>
</div>

<!-- header signin and signup ends -------->

<!-- ––––––––––––––––––––––––––––––––––––––––– -->
<!-- SCRIPTS                                   -->
<!-- ––––––––––––––––––––––––––––––––––––––––– -->

<!-- (!) Placed at the end of the document so the pages load faster -->

<!-- ––––––––––––––––––––––––––––––––––––––––– -->
<!-- Initialize jQuery library                 -->
<!-- ––––––––––––––––––––––––––––––––––––––––– -->
<script src="<?php echo base_url(); ?>assets/js/jquery-1.12.3.min.js"></script>

<!-- ––––––––––––––––––––––––––––––––––––––––– -->
<!-- Latest compiled and minified Bootstrap    -->
<!-- ––––––––––––––––––––––––––––––––––––––––– -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>

<!-- ––––––––––––––––––––––––––––––––––––––––– -->
<!-- JavaScript Plugins                        -->
<!-- ––––––––––––––––––––––––––––––––––––––––– -->
<!-- (!) Include all compiled plugins (below), or include individual files as needed -->

<!-- Modernizer JS -->
<script src="<?php echo base_url(); ?>assets/vendors/modernizr/modernizr-2.6.2.min.js"></script>

<!-- Owl Carousel -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/vendors/owl-carousel/owl.carousel.min.js"></script>

<!-- FlexSlider -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/vendors/flexslider/jquery.flexslider-min.js"></script>

<!-- Coutdown -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/vendors/countdown/jquery.countdown.js"></script>

<!-- ––––––––––––––––––––––––––––––––––––––––– -->
<!-- Custom Template JavaScript                   -->
<!-- ––––––––––––––––––––––––––––––––––––––––– -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/main.js"></script>
<!--<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/tooltip.min.js"></script>-->

<script src="<?php echo base_url(); ?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap -->
<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/jquery.validate.min.js"></script>
<script type='text/javascript' src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.js"></script>
<script type='text/javascript' src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/additional-methods.js"></script>
<!--<script type="text/javascript" src="<?PHP echo base_url() ?>assets/js/tooltip.js"></script>-->
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
        $("#sign_up").validate({
            rules: {
                firstname: "required",
                lastname: "required",
                email: {
                    required: true,
                    email: true,
                    customemail: true
                },
                password: {
                    required: true,
                    custompass: true
                },
                pnumber: {
                    required: true,
                    number: true,
                    maxlength: 10,
                    minlength: 10
                }
            },
            messages: {
                firstname: "Please Enter First Name",
                lastname: "Please Enter Last Name",
                email: {
                    required: "Please Enter Your Email",
                    email: "Enter Correct Email Id ",
                    customemail: "Enter Valid Email"
                },
                password: {
                    required: "Please Provide Password",
                    custompass: "your password should least one number, one lowercase,one uppercase letter and minimum 6 letters"
                },
                pnumber: {
                    required: "please enter mobile number",
                    maxlength: "Please enter valid Phone number",
                    minlength: "Please enter valid Phone number"
                }
            },
            submitHandler: function (form) {
                form.submit();
            }
        });
    });
    $(document).ready(function () {
        //        custom validation method for email
        $.validator.addMethod('customemail', function (value, element) {
            var re = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            return re.test(value);
        },
                'Sorry, I`ve enabled very strict email validation'
                );
        $.validator.addMethod('custompass', function (value, element) {
            var re = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/;
            return re.test(value);
        },
                'Sorry, I`ve enabled very strict password validation'
                );
        $("#sign_in").validate({
            rules: {
                email: {
                    required: true,
                    email: true,
                    customemail: true
                },
                password: {
                    required: true,
                    custompass: true
                }
            },
            messages: {
                email: {
                    required: "Please Enter Your Email",
                    email: "Enter Correct Email Id ",
                    customemail: "Enter Valid Email"
                },
                password: {
                    required: "Please Provide Password",
                    custompass: "your password should least one number, one lowercase,one uppercase letter and minimum 6 letters"
                }
            }
        });
    });
    $(document).ready(function () {
        //        custom validation method for email
        $.validator.addMethod('customemail', function (value, element) {
            var re = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            return re.test(value);
        },
                'Sorry, I`ve enabled very strict email validation'
                );
        $('#subscribe_form').validate({
            rules: {
                subscribe_email: {
                    required: true,
                    email: true,
                    customemail: true
                }
            },
            messages: {
                subscribe_email: {
                    required: "please enter Email",
                    email: "Enter valid Email",
                    customemail: "Enter valid Email"
                }
            }
        });
    });
    $(document).ready(function () {
        //        custom validation method for email
        $.validator.addMethod('customemail', function (value, element) {
            var re = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            return re.test(value);
        },
                'Sorry, I`ve enabled very strict email validation'
                );
        $('#subscribe_form1').validate({
            rules: {
                subscribe_email1: {
                    required: true,
                    email: true,
                    customemail: true
                }
            },
            messages: {
                subscribe_email1: {
                    required: "please enter Email",
                    email: "Enter valid Email",
                    customemail: "Enter valid Email"
                }
            }
        });
    });
    $(document).ready(function () {
        $.validator.addMethod('custompass', function (value, element) {
            var re = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/;
            return re.test(value);
        },
                'Sorry, I`ve enabled very strict password validation'
                );
        $('#change_password').validate({
            rules: {
                old_password: "required",
                new_password: {
                    required: true,
                    custompass: true
                }
            },
            messages: {
                old_password: "please Enter Old Password",
                new_password: {
                    required: "Please Provide Password",
                    custompass: "your password should least one number, one lowercase,one uppercase letter and minimum 6 letters"
                }
            }
        });
    });

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

        $("#edit_profile").validate({
            rules: {
                firstname: "required",
                lastname: "required",
                email: {
                    required: true,
                    email: true,
                    customemail: true
                },
                pnumber: {
                    required: true,
                    number: true,
                    maxlength: 10,
                    minlength: 10
                }
            },
            messages: {
                firstname: "Please Enter First Name",
                lastname: "Please Enter Last Name",
                email: {
                    required: "Please Enter Your Email",
                    email: "Enter Correct Email Id ",
                    customemail: "Enter Valid Email"
                },
                pnumber: {
                    required: "please enter mobile number",
                    maxlength: "Please enter valid Phone number",
                    minlength: "Please enter valid Phone number"
                }
            },
            submitHandler: function (form) {
                form.submit();
            }
        });
    });

//    $("#copy_code").click(function(){
//  var holdtext = $("#copy_text").innerText;
//  Copied = holdtext.createTextRange();
//  Copied.execCommand("Copy");
//});
</script>
<script type="text/javascript">


    function copyToClipboard(e, element) {
        var field = document.getElementById('copy_' + element);
//        alert(field);
        field.focus()
        field.setSelectionRange(0, field.value.length)
        copySelectionText()
//        var copysuccess = copySelectionText()
//        if (copysuccess) {
//            showtooltip(e)
//
//        }
    }
    function copySelectionText() {
        var copysuccess // var to check whether execCommand successfully executed
        try {
            document.execCommand("copy") // run command to copy selected text to clipboard
        } catch (e) {
            copysuccess = false
        }
        return copysuccess
    }

//    var tooltip, // global variables oh my! Refactor when deploying!
//            hidetooltiptimer
//
//    function createtooltip() { // call this function ONCE at the end of page to create tool tip object
//        tooltip = document.createElement('div')
//        tooltip.style.cssText =
//                "position:absolute; background:black; color:white; padding:4px;z-index:10000;"
//                + 'border-radius:2px; font-size:12px;box-shadow:3px 3px 3px rgba(0,0,0,.4);'
//                + 'opacity:0;transition:opacity 0.3s'
//        tooltip.innerHTML = 'Copied!'
//        document.body.appendChild(tooltip)
//    }
//
//    function showtooltip(e) {
//        var evt = e || event
//        clearTimeout(hidetooltiptimer)
//        tooltip.style.left = evt.pageX - 10 + 'px'
//        tooltip.style.top = evt.pageY + 15 + 'px'
//        tooltip.style.opacity = 1
//        hidetooltiptimer = setTimeout(function () {
//            tooltip.style.opacity = 0
//        }, 500)
//    }

</script>
<script>
//    $(document).ready(function(){
//    $('#subscribe_form').on('load', function () {
//        $('#signIn').modal('show');
//    });
//    });
//$('#signIn').click(function () {
//        setTimeout(function () {
//          $('.btn').trigger('click');
//        }, 1000);
//      });

//    $('#signIn').click(function () {
//        setTimeout(function () {
//            $('.btn').trigger('click');
//        }, 7000);
//    });
//$('#subscribe_submit').click(function(){
//    setTimeout(function () {
//            $('.btn').trigger('click');
//        }, 7000);
//})

//$("#signIn").bind("hide", function() {
//        // remove event listeners on the buttons
//        $("#signIn a.btn").unbind();
//    });

//$('.btn').click(function(){
//    setTimeout(function () {
//           $('#signIn').trigger('click');
//       }, 7000);
//})

    $('#subscribe_submit').submit(function (e) {
        e.preventDefault();
        // Coding
        $('#signIn').modal('toggle'); //or  $('#IDModal').modal('hide');
        return false;
    });
</script>
<?PHP
if (isset($extraSript)) {
    echo $extraSript;
}
?>
</body>

</html>
