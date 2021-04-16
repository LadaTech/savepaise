<?PHP
//session_destroy();
session_start();
$pageTitle = 'Cheeyuta';
include_once 'common/functions.php';
$commonfunction = new commonfunction();
$lifeMembers = $commonfunction->getLifeMembers('', 'approved', '1100');
$showVIFLogo = 1;
$message = '';
unset($_SESSION['dataPost']);
$customCSS = '<link href="/css/select2.css" rel="stylesheet" type="text/css">';
if (!empty($_POST)) {
//    echo "<pre>";
//    print_r($_POST);
    $dataPost = $_POST;
//    print_r($_FILES);
    $dataPost['photo'] = $commonfunction->uploadFiles($_FILES['photo'], 'photo', 'uploads/cheeyuta');
    $dataPost['bincomeproof'] = $commonfunction->uploadFiles($_FILES['bincomeproof'], 'bincomeproof', 'uploads/cheeyuta');
    $dataPost['bproofupload'] = $commonfunction->uploadFiles($_FILES['bproofupload'], 'bproofupload', 'uploads/cheeyuta');
//    print_r($dataPost);
//    echo "</pre>";
//    exit;
    $_SESSION['dataPost'] = $dataPost;
    $_SESSION['firstScreen'] = 'yes';
    header('Location:cheyuthaotp');
    exit;
//     echo "</pre>";
}
include_once 'common/header.php';
?>

<aside id="fh5co-hero">
    <div class="flexslider">
        <ul class="slides">
            <li style="background-image: url(images/img_bg_4.jpg);">
                <div class="overlay-gradient"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 offset-md-3 text-center slider-text">
                            <div class="slider-text-inner" style="width: 600px;">
                                <h1 class="heading-section" style="font-size: 26px;">VYSPRO ఇండియా & VYSPRO ఇండియా ఫౌండేషన్  "చేయూత"</h1>
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
            <div class="col-md-12 animate-box">
                <?PHP
                if (isset($_SESSION['cheyuthamessage']) && $_SESSION['cheyuthamessage'] != '') {
                    echo $_SESSION['cheyuthamessage'];
                }
                ?>
                <h3>Life Member Details</h3>
                <form id="cheyutha" name="cheyutha" action="cheyutha" method="post" enctype="multipart/form-data">
                    <div class="row form-group">
                        <div class="col-md-4">
                            <label for="fname">Name</label> 
                            <select id="fname" name="fname" class="form-control" onchange="updateLMNameCheyutha();">
                                <option value="">--Select Name--</option>
                                <?PHP
                                foreach ($lifeMembers as $lifeMember) {
//                                    print_r($lifeMember);
                                    $memberName = $lifeMember[member_id] . " - " . $lifeMember[sur_name] . " " . $lifeMember[firstname] . " " . $lifeMember[lastname];
                                    echo "<option value='$memberName'>$memberName</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="lmemail">Email ID</label> 
                            <input type="text" id="lmemail" name="lmemail" class="form-control" placeholder="Your Email Id" />
                            <small id="lmemail" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="col-md-4">
                            <label for="lmnumber">Phone Number</label> 
                            <input type="text" id="lmnumber" name="lmnumber" class="form-control" placeholder="Your Phone Number" maxlength="10" />
                            <small id="lmnumberHelp" class="form-text text-muted">Please enter Valid mobile number for OTP confirmation, We'll never share your number with anyone else.</small>
                        </div>
                    </div>
                    <h4>Beneficiary Details</h4>
                    <div class="row form-group">
                        <div class="col-md-4">
                            <label for="bfname">Beneficiary First Name</label> 
                            <input type="text" id="bfname" name="bfname" class="form-control" placeholder="Beneficiary First Name" />
                        </div>
                        <div class="col-md-4">
                            <label for="blname">Beneficiary last Name</label> 
                            <input type="text" id="blname" name="blname" class="form-control" placeholder="Beneficiary Last Name" />
                        </div>
                        <div class="col-md-4">
                            <label for="photo">Photo</label> 
                            <input type="file" id="photo" name="photo" class="form-control" placeholder="Beneficiary Photo" accept="image/gif, image/jpg, image/jpeg, image/png,image/png" />
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-4">
                            <label for="bfathername">Father / Husband Name</label> 
                            <input type="text" id="bfathername" name="bfathername" class="form-control" placeholder="Beneficiary Father / Husband Name" />
                        </div>
                        <div class="col-md-4">
                            <label for="bnumber">Phone Number</label> 
                            <input type="text" id="bnumber" name="bnumber" class="form-control" placeholder="Beneficiary Phone Number" maxlength="10" />
                        </div>
                        <div class="col-md-4">
                            <label for="bcaste">Caste</label> 
                            <input type="text" id="bcaste" name="bcaste" class="form-control" placeholder="Beneficiary Caste" />
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-4">
                            <label for="boccupation">Occupation</label> 
                            <input type="text" id="boccupation" name="boccupation" class="form-control" placeholder="Beneficiary Occupation" />
                        </div>
                        <div class="col-md-4">
                            <label for="bdependents">Total Dependents in the Family</label> 
                            <input type="text" id="bdependents" name="bdependents" class="form-control" placeholder="Beneficiary Total Dependents in the Family" maxlength="3" />
                        </div>

                        <div class="col-md-4">
                            <label for="baddress">Address</label> 
                            <input type="text" id="baddress" name="baddress" class="form-control" placeholder="Beneficiary Address" />
                        </div>
                        <div class="col-md-4">
                            <label for="bcity">City</label> 
                            <select type="text" id="bcity" name="bcity" class="form-control">
                                <option value="">--Select City--</option>
                                <option value="Hyderabad">Hyderabad</option>
                                <option value="Secunderabad">Secunderabad</option>
                            </select>
                            <!--<input type="text" id="bcity" name="bcity" class="form-control" placeholder="Beneficiary City" />-->
                        </div>
                        <!--<div class="col-md-4">
                            <label for="bcity">State</label> 
                            <select id="bstate" name="bstate" class="form-control">
                                <option value="">--Select state--</option>
                                <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                <option value="Andra Pradesh">Andra Pradesh</option>
                                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                <option value="Assam">Assam</option>
                                <option value="Bihar">Bihar</option>
                                <option value="Chandigarh">Chandigarh</option>
                                <option value="Chhattisgarh">Chhattisgarh</option>
                                <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                                <option value="Daman and Diu">Daman and Diu</option>
                                <option value="Delhi">Delhi</option>
                                <option value="Goa">Goa</option>
                                <option value="Gujarat">Gujarat</option>
                                <option value="Haryana">Haryana</option>
                                <option value="Himachal Pradesh">Himachal Pradesh</option>
                                <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                <option value="Jharkhand">Jharkhand</option>
                                <option value="Karnataka">Karnataka</option>
                                <option value="Kerala">Kerala</option>
                                <option value="Lakshadeep">Lakshadeep</option>
                                <option value="Madhya Pradesh">Madhya Pradesh</option>
                                <option value="Maharashtra">Maharashtra</option>
                                <option value="Manipur">Manipur</option>
                                <option value="Meghalaya">Meghalaya</option>
                                <option value="Mizoram">Mizoram</option>
                                <option value="Nagaland">Nagaland</option>
                                <option value="Orissa">Orissa</option>
                                <option value="Pondicherry">Pondicherry</option>
                                <option value="Punjab">Punjab</option>
                                <option value="Rajasthan">Rajasthan</option>
                                <option value="Sikkim">Sikkim</option>
                                <option value="Tamil Nadu">Tamilnadu</option>
                                <option value="Telagana">Telagana</option>
                                <option value="Tripura">Tripura</option>
                                <option value="Uttaranchal">Uttaranchal</option>
                                <option value="Uttar Pradesh">Uttar Pradesh</option>
                                <option value="West Bengal">West Bengal</option>
                            </select>
                        </div>-->
                        <div class="col-md-4">
                            <label for="bannualincome">Annual Income</label> 
                            <input type="text" id="bannualincome" name="bannualincome" class="form-control" placeholder="Beneficiary Annual Income" maxlength="10" />
                        </div>
                        <div class="col-md-4">
                            <label for="bincomeproof">Income proof</label> 
                            <input type="file" id="bincomeproof" name="bincomeproof" class="form-control" accept="image/gif, image/jpg, image/jpeg, image/png,image/png,application/pdf" />
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-4">
                            <label for="boccupation">Address Proof</label> 
                            <select type="text" id="bproof" name="bproof" class="form-control">
                                <option value="">--Select Proof Type--</option>
                                <option value="Aadharcard">Aadhar card</option>
                                <option value="Drivinglicence">Driving Licence</option>
                                <option value="Voterid">Voter Id</option>
                                <option value="rationcard">Ration Card</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="photo">Address proof Reference number</label> 
                            <input type="text" id="bproofnumber" name="bproofnumber" class="form-control" maxlength="100" placeholder="Address proof Reference number" />
                        </div>
                        <div class="col-md-4">
                            <label for="photo">Upload Address Proof</label> 
                            <input type="file" id="bproofupload" name="bproofupload" class="form-control" accept="image/gif, image/jpg, image/jpeg, image/png,image/png,application/pdf" />
                        </div>
                    </div>
                    <div class="form-group">
                        <p>I <span id="lmnamedisplay" style="text-decoration: underline; font-weight: bold;">________</span>  do hereby confirm that the above referred beneficiary is personally known to me and he/she is eligible for the benefit of Cheyutha.</p>
                        <p style="font-style: italic; font-weight: bold;">Disclaimer: The ultimate selection of beneficiary for the cheyutha project  is solely at the discretion of Vyspro-India and Vyspro-India Foundation core committee.</p>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Submit" class="btn btn-primary" />
                    </div>
                </form>		
            </div>
        </div>
    </div>
</div>
<?PHP
$customJsFooter = '<script src="/js/jquery.validate.min.js?v=1" type="text/javascript"></script>'
        . '<script src="/js/custom.js?v=1" type="text/javascript"></script>'
        . '<script src="/js/select2.js" type="text/javascript"></script>'
        . '<script>
            $(document).ready(function(){ 
                    // Initialize select2
                    $("#fname").select2();

                    // Read selected option
                    $("#but_read").click(function(){
                    var username = $("#selUser option:selected").text();
                    var userid = $("#selUser").val();
                    $("#result").html("id : " + userid + ", name : " + username);
              });
            });
        </script>';
include_once 'common/footer.php';
?>

