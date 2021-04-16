<?PHP
session_start();
$pageTitle = 'Be a Member';
$customCSS = '<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">';
include_once 'common/header.php';
ini_set('upload_max_filesize', '0');
?>

<aside id="fh5co-hero">
    <div class="flexslider">
        <ul class="slides">
            <li style="background-image: url(images/img_bg_4.jpg);">
                <div class="overlay-gradient"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 text-center slider-text">
                            <div class="slider-text-inner">
                                <h1 class="heading-section">Become a Member of Vyspro-India</h1>
                                <!--<h2>Free html5 templates Made by <a href="http://freehtml5.co/" target="_blank">freehtml5.co</a></h2>-->
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</aside>

<div id="fh5co-contact">
    <div class="container">
        <div class="row">
            <!--            <div class="col-md-5 col-md-push-1 animate-box">
            
                            <div class="fh5co-contact-info">
                                <h3>Contact Information</h3>
                                <ul>
                                    <li class="address">#flat No 4, Topaz Plaza, CM Camp office exit Road, <br />Panjjagutta, Hyderabad - 500082</li>
                                    <li class="phone"><a href="tel://8688828969">+91 868 882 8969</a></li>
                                    <li class="email"><a href="mailto:database.vysproindia@gmail.com">database.vysproindia@gmail.com</a></li>
                                    <li class="url"><a href="http://freehtml5.co">freeHTML5.co</a></li>
                                </ul>
                            </div>
            
                        </div>-->
            <div class="col-md-12 animate-box">
                <h3>Become a Member</h3>
                <form action="memberaction.php" method="post" id="beamember" name="beamember" enctype="multipart/form-data">
                    <div class="row form-group">
                        <div class="col-md-4">
                            <label for="fname">Surname</label> 
                            <input type="text" id="surname" name="surname" class="form-control" placeholder="Your Surname">
                        </div>
                        <div class="col-md-4">
                            <label for="lname">First Name</label> 
                            <input type="text" id="fullname" name="fullname" class="form-control" placeholder="Your First Name">
                        </div>
                        <div class="col-md-4">
                            <label for="lname">Last Name</label> 
                            <input type="text" id="lastname" name="lastname" class="form-control" placeholder="Your Last Name">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-4">
                            <label for="email">Email</label> 
                            <input type="email" id="email" name="email" class="form-control" placeholder="Your email address">
                        </div>
                        <div class="col-md-4">
                            <label for="subject">Mobile Number</label> 
                            <input type="text" id="mobilenumber" name="mobilenumber" class="form-control" placeholder="Your Mobile Number">
                        </div>
                        <div class="col-md-4">
                            <label for="subject">Qualification</label> 
                            <select  id="qualification" name="qualification" class="form-control">
                                <option value="">--Select qualification--</option>
                                <option value="CA">CA</option>
                                <option value="ICWA">ICWA</option>
                                <option value="CS">CS</option>
                                <option value="MBBS">MBBS</option>
                                <option value="B.Tech">B.Tech</option>
                                <option value="Layer">Layer</option>
                                <option value="MBA">MBA</option>
                                <option value="MCA">MCA</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="subject">Profession</label> 
                            <input type="text" id="profession" name="profession" class="form-control" placeholder="Your Profession">
                        </div>

                        <div class="col-md-4">
                            <label for="subject">Gowtram</label> 
                            <input type="text" id="gowtram" name="gowtram" class="form-control" placeholder="Your Gowtram" />
                        </div>
                        <div class="col-md-4">
                            <label for="subject">Uncle's Gowtram</label> 
                            <input type="text" id="unclesgowtram" name="unclesgowtram" class="form-control" placeholder="Your Uncle's Gowtram" />
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-4">
                            <label for="email">Father Name</label> 
                            <input type="text" id="fathername" name="fathername" class="form-control" placeholder="Your Father name">
                        </div>
                        <div class="col-md-4">
                            <label for="email">Date of Birth</label> 
                            <input type="text" id="dob" name="dob" class="form-control" placeholder="Your Date of Birth">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-4">
                            <label for="subject">Date of Marriage</label> 
                            <input type="text" id="domarriage" name="domarriage" class="form-control" placeholder="Your Date of Marriage" />
                        </div>
                        <div class="col-md-4">
                            <label for="subject">Spouse Name (If married) </label> 
                            <input type="text" id="spousename" name="spousename" class="form-control" placeholder="Your Spouse Name" />
                        </div>
                        <div class="col-md-4">
                            <label for="subject">Spouse occupation (If married) </label> 
                            <input type="text" id="spouseoccupation" name="spouseoccupation" class="form-control" placeholder="Your Spouse Occupation" />
                        </div>

                        <div class="col-md-4">
                            <label for="subject">First Child Name </label> 
                            <input type="text" id="firstchildname" name="firstchildname" class="form-control" placeholder="Your First Child Name" />
                        </div>

                        <div class="col-md-4">
                            <label for="subject">First Child Age </label> 
                            <input type="text" id="firstchildage" name="firstchildage" class="form-control" placeholder="Your First Child Age" />
                        </div>

                        <div class="col-md-4">
                            <label for="subject">Second Child Name </label> 
                            <input type="text" id="secondchildname" name="secondchildname" class="form-control" placeholder="Your Second Child Name" />
                        </div>

                        <div class="col-md-4">
                            <label for="subject">Second Child Age </label> 
                            <input type="text" id="secondchildage" name="secondchildage" class="form-control" placeholder="Your Second Child Age" />
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-4">
                            <b>Permanent address</b>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-4">
                            <label for="email">Address line 1</label> 
                            <input type="text" id="address1" name="address1" class="form-control" placeholder="Your Address line 1">
                        </div>
                        <div class="col-md-4">
                            <label for="email">Address line 2</label> 
                            <input type="text" id="address2" name="address2" class="form-control" placeholder="Your Address line 2">
                        </div>
                        <div class="col-md-4">
                            <label for="email">Street Name</label> 
                            <input type="text" id="street" name="street" class="form-control" placeholder="Your Street Name">
                        </div>
                    </div>
                    <div class="row form-group">

                        <div class="col-md-4">
                            <label for="email">city</label> 
                            <input type="text" id="city" name="city" class="form-control" placeholder="Your City">
                        </div>

                        <div class="col-md-4">
                            <label for="email">State</label> 
                            <input type="text" id="state" name="state" class="form-control" placeholder="Your State">
                        </div>
                        <div class="col-md-4">
                            <label for="email">Country</label> 
                            <input type="text" id="country" name="country" class="form-control" placeholder="Your Country">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-4">
                            <b>Communication address</b>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-4">
                            <label for="email">Address line 1</label> 
                            <input type="text" id="address1" name="address1" class="form-control" placeholder="Your Address line 1">
                        </div>
                        <div class="col-md-4">
                            <label for="email">Address line 2</label> 
                            <input type="text" id="address2" name="address2" class="form-control" placeholder="Your Address line 2">
                        </div>
                        <div class="col-md-4">
                            <label for="email">Street Name</label> 
                            <input type="text" id="street" name="street" class="form-control" placeholder="Your Street Name">
                        </div>
                    </div>
                    <div class="row form-group">

                        <div class="col-md-4">
                            <label for="email">city</label> 
                            <input type="text" id="city" name="city" class="form-control" placeholder="Your City">
                        </div>

                        <div class="col-md-4">
                            <label for="email">State</label> 
                            <input type="text" id="state" name="state" class="form-control" placeholder="Your State">
                        </div>
                        <div class="col-md-4">
                            <label for="email">Country</label> 
                            <input type="text" id="country" name="country" class="form-control" placeholder="Your Country">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-4">
                            <label for="subject">Introduced by</label> 
                            <input type="text" id="referredby" name="referredby" class="form-control" placeholder="Your Introduced by">
                        </div>


                        <div class="col-md-4">
                            <label for="subject">Membership No. (if any)</label> 
                            <input type="text" id="othermemebrship" name="othermemebrship" class="form-control" placeholder="Your Membership No. (if any)">
                        </div>                       
                        <div class="col-md-4">
                            <label for="subject">Blood Group</label> 
                            <select id="bloodgroup" name="bloodgroup" class="form-control">
                                <option value="">--Select--</option>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>                                
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="subject">Spouse Blood Group</label> 
                            <select id="spousebloodgroup" name="spousebloodgroup" class="form-control">
                                <option value="">--Select--</option>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>                                
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="subject">Activities in other Vysya Organisations, if any</label> 
                            <input type="text" id="activities" maxlength="100" name="activities" class="form-control" placeholder="Activities if any">
                        </div>


                    </div>
                    <div class="row form-group">
                        <div class="col-md-6">
                            <label for="subject">Upload Photo</label> 
                            <input type="file" id="photo" name="photo" class="form-control" />
                        </div>

                        <div class="col-md-6">
                            <label for="subject">Upload Certificate</label> 
                            <input type="file" id="certificate" name="certificate" class="form-control" />
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12 checkbox">
                            <!--<label for="subject">Upload Certificate</label>--> 
                            <label> <input type="checkbox" id="tnc" name="tnc" class="" />I agree that I may be enrolled as a Life Member of VYSPRO-INDIA. Details of my Personal & family particulars are given as above. I will abide by the rules and regulations of VYSPRO-INDIA as they exist from time to time. I agree to pay Rs. 1000/- (2% payment gateway charges + 18% tax on charges extra) to VYSPRO-INDIA. I will intimate the association in writing about the change of my address if any. 
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Proceed to Payment" class="btn btn-primary">
                    </div>

                </form>		
            </div>
        </div>

    </div>
</div>
<?PHP
$customJsFooter = '<script src="/js/jquery.validate.min.js?v=1" type="text/javascript"></script>'
        . '<script src="/js/custom.js?v=1" type="text/javascript"></script>'
        . '<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>'
        . '<script>
                $( function() {
                  $( "#dob" ).datepicker({changeMonth: true,
      changeYear: true});
                  $( "#dob" ).datepicker( "option", "dateFormat", "dd MM, yy" );
                  $( "#domarriage" ).datepicker({changeMonth: true,
      changeYear: true});
                  $( "#domarriage" ).datepicker( "option", "dateFormat", "dd MM, yy" );
                } );
            </script>';
include_once 'common/footer.php';
?>

