<?PHP
session_start();
$pageTitle = 'Contact Us';

include_once 'common/functions.php';
$commonfunction = new commonfunction();
$message = '';
if (!empty($_POST)) {
//    print_r($_POST);
    $commonfunction->insetContactus($_POST);
//    exit;
    $message = "Thanks for your message, our team will contact you soon";
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
                            <div class="slider-text-inner">
                                <h1 class="heading-section">Contact us</h1>
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
            <div class="col-md-5 col-md-push-1 animate-box">

                <div class="fh5co-contact-info">
                    <h3>Contact Information</h3>
                    <ul>
                        <li class="address">#flat No 4, Topaz Plaza, CM Camp office exit Road, <br />Panjjagutta, Hyderabad - 500082</li>
                        <li class="phone"><a href="tel://8688828969">+91 868 882 8969</a></li>
                        <li class="email"><a href="mailto:database.vysproindia@gmail.com">database.vysproindia@gmail.com</a></li>
                    </ul>
                </div>

            </div>
            <div class="col-md-6 animate-box">
                <?PHP
                if ($message != '') {
                    echo $message;
                }
                ?>
                <h3>Get In Touch</h3>
                <form id="contactus" name="contactus" action="contact" method="post">
                    <div class="row form-group">
                        <div class="col-md-6">
                            <label for="fname">First Name</label> 
                            <input type="text" id="fname" name="fname" class="form-control" placeholder="Your First Name">
                        </div>
                        <div class="col-md-6">
                            <label for="lname">Last Name</label> 
                            <input type="text" id="lname" name="lname" class="form-control" placeholder="Your Last Name">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <label for="email">Email</label> 
                            <input type="text" id="email" name="email" class="form-control" placeholder="Your Email">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <label for="subject">Subject</label> 
                            <input type="text" id="subject" name="subject" class="form-control" placeholder="Your subject of this message">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <label for="message">Message</label> 
                            <textarea name="message" id="message" cols="30" rows="10" class="form-control" placeholder="Say something about us"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Send Message" class="btn btn-primary">
                    </div>

                </form>		
            </div>
        </div>

    </div>
</div>
<div class="fh5co-map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3806.639194781757!2d78.45200241487694!3d17.429094488053575!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xc2fa4fff14cca1d5!2sVyspro-India%20(Vyspro%20Professional%20Association)!5e0!3m2!1sen!2sin!4v1584209995270!5m2!1sen!2sin" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

</div>

<?PHP
$customJsFooter = '<script src="/js/jquery.validate.min.js?v=1" type="text/javascript"></script>'
        . '<script src="/js/custom.js?v=1" type="text/javascript"></script>';
include_once 'common/footer.php';
?>

