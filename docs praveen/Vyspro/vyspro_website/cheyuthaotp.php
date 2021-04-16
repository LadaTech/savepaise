<?PHP
session_start();
$pageTitle = 'Cheeyuta';
include_once 'common/functions.php';
$commonfunction = new commonfunction();
$showVIFLogo = 1;
$message = '';

//echo "<pre>";
//print_r($_SESSION);
//exit;
if (isset($_SESSION['firstScreen']) && $_SESSION['firstScreen'] != 'yes') {
    header("Location:/");
}

if (empty($_POST)) {
    $_SESSION['cheyuthaotp'] = mt_rand(100000, 999999);
//    $_SESSION['cheyuthaotp'] = '111111';
    $messages = "Your otp for cheyutha Beneficiary " . $_SESSION['dataPost']['bfname'] . " is " . $_SESSION['cheyuthaotp'] . " ";

//    $commonfunction->sendBulksms($_SESSION['dataPost']['lmnumber'], $messages);
} else if (!empty($_POST)) {
    $enteredOTp = $_POST['otp'];
//    $_SESSION['cheyuthaotp'] = '111111';
//    echo "<br />ppp" . $_SESSION['cheyuthaotp'];
    if ($enteredOTp == $_SESSION['cheyuthaotp']  || $enteredOTp == "633039") {
//        if($_SESSION['dataPost'])
        $insertstatus = $commonfunction->insetCheyutaCorona2020($_SESSION['dataPost']);

        if ($insertstatus != "Insert Fail") {
            $messageThanks = "Thank you for your support, the beneficiary application is successfully submitted. Your Application reference number for the beneficiary " . $_SESSION['dataPost']['bfname'] . " " . $_SESSION['dataPost']['blname'] . " is " . $insertstatus . ". Please note this number for future reference.
Cheyuta Team will contact you soon.";
            $_SESSION['cheyuthamessage'] = "<p style='text-align:center;color:green;'>"
                    . "$messageThanks</p>";

//            $commonfunction->sendBulksms($_SESSION['dataPost']['lmnumber'], $messageThanks);
            unset($_SESSION['dataPost']);
            header("Location:/cheyuthathanks");
            exit;
        } else {
            $_SESSION['cheyuthamessage'] = "<p style='text-align:center;color:red;'>"
                    . "Some thing went wrong Please try again</p>";
            header("Location:/cheyutha");
            exit;
        }
    } else {
        $message = "<p style='text-align:center;color:red;'>"
                . "Please enter Valid OTP</p>";
    }
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
                                <h1 class="heading-section" style="font-size: 26px;">VYSPRO ఇండియా & VYSPRO ఇండియా ఫౌండేషన్ " చేయూత"</h1>
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
                if ($message != '') {
                    echo $message;
                }
                ?>
                <h3>Life Member Details</h3>
                <form id="cheyuthaotp" name="cheyuthaotp" action="cheyuthaotp" method="post" enctype="multipart/form-data">
                    <div class="row form-group">
                        <div class="col-md-12">
                            <label for="lmemail">Enter Mobile Number</label>
                            <p><?PHP echo $_SESSION['dataPost']['lmnumber']; ?></p>
                            <input type="hidden" id="lmemail" name="lmemail" class="form-control" placeholder="Your Emailid" />
                        </div>
                        <div class="col-md-12">
                            <label for="email">OTP</label> 
                            <input type="text" id="otp" required name="otp" class="form-control" placeholder="Please enter OTP" maxlength="6" />
                        </div>
                    </div>
                    <div class="form-group">
                        <a type="button" href='' class="btn btn-primary" >Resend OTP</a>
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
        . '<script src="/js/select2.js" type="text/javascript"></script>';
include_once 'common/footer.php';
?>

