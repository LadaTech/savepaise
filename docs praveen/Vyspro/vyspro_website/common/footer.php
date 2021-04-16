<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div id="fh5co-gallery" class="fh5co-bg-section">
    <div class="row text-center" style="display:block;">
        <h2><span>Gallery</span></h2>
    </div>
    <div class="row">
        <div class="col-md-3 col-padded">
            <a href="#" class="gallery" style="background-image: url(images/1.jpg);"></a>
        </div>
        <div class="col-md-3 col-padded">
            <a href="#" class="gallery" style="background-image: url(images/2.jpg);"></a>
        </div>
        <div class="col-md-3 col-padded">
            <a href="#" class="gallery" style="background-image: url(images/3.jpeg);"></a>
        </div>
        <div class="col-md-3 col-padded">
            <a href="#" class="gallery" style="background-image: url(images/4.jpg);"></a>
        </div>
    </div>
</div>
<p></p>
<footer id="fh5co-footer" role="contentinfo" style="background-image: url(images/img_bg_4.jpg);">
    <div class="overlay"></div>
    <div class="container">
        <div class="row row-pb-md">
            <div class="col-md-4 fh5co-widget">
                <h3>About Vyspro-India</h3>
                <p>Vysya Professional Association (VYSPRO) came into existences after a VANA MAHOTSAVAM Meet at the Chacha Nehru Park in 1998. The members then decided to formalize this vision into a society in November 1998 which was formally done with the name "VYSPRO - INDIA"</p>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-6 col-md-push-1 fh5co-widget">
                <h3>Contact</h3>
                <ul class="fh5co-footer-links">
                    <li class="address">#flat No 4, Topaz Plaza, CM Camp office exit Road, <br />Panjjagutta, Hyderabad - 500082</li>
                    <li class="phone"><a href="tel://8688828969">+91 868 882 8969</a></li>
                    <li class="email"><a href="mailto:database.vysproindia@gmail.com">database.vysproindia@gmail.com</a></li>
                </ul>
            </div>


            <div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1 fh5co-widget">
                <h3>Religion</h3>
                <ul class="fh5co-footer-links">
                    <li><a href="#">Story of Vasavi Matha</a></li>
                    <li><a href="arya-vysya-gotrams">Arya vysya Gotrams</a></li>
                    <li><a href="#">Arya vysya Satrams</a></li>
                    <!--<li><a href="#">Terms</a></li>-->
                </ul>
            </div>

            <div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1 fh5co-widget">
                <h3>About Us</h3>
                <ul class="fh5co-footer-links">
                    <li><a href="/spirit">Spirit of VysPro-India</a></li>
                    <li><a href="/about">About Vyspro</a></li>
                    <li><a href="#">Committee Members</a></li>
                    <li><a href="#">President Message</a></li>
                    <li><a href="#">Past Presidents</a></li>
                    <li><a href="#">Committee</a></li>
                </ul>
            </div>
        </div>
        <div class="row copyright">
            <div class="col-md-12 text-center">
                <p>
                    <small class="block">&copy; <?PHP echo date('Y'); ?> Vypro-India. All Rights Reserved.</small> 
                    <small class="block">Designed & Maintained by <a href="http://ladatechnologies.com" target="_blank">Lada Technologies</a> &nbsp; For Technical support Contact: <a href="tel:9441820017" target="_blank">9441820017</a></small>
                </p>
            </div>
        </div>

    </div>
</footer>
</div>

<div class="gototop js-top">
    <a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
</div>

<!-- jQuery -->
<script src="/js/jquery.min.js"></script>
<!-- jQuery Easing -->
<script src="/js/jquery.easing.1.3.js"></script>
<!-- Bootstrap -->
<!--<script src="/js/bootstrap.min.js"></script>-->
<script async src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<!-- Waypoints -->
<script src="/js/jquery.waypoints.min.js"></script>
<!-- Stellar Parallax -->
<script src="/js/jquery.stellar.min.js"></script>
<!-- Carousel -->
<script src="/js/owl.carousel.min.js"></script>
<!-- Flexslider -->
<script src="/js/jquery.flexslider-min.js"></script>
<!-- countTo -->
<script src="/js/jquery.countTo.js"></script>
<!-- Magnific Popup -->
<script src="/js/jquery.magnific-popup.min.js"></script>
<script src="/js/magnific-popup-options.js"></script>
<!-- Count Down -->
<script src="/js/simplyCountdown.js"></script>
<!-- Main -->
<script src="/js/main.js"></script>

<?PHP
if (isset($customJsFooter)) {
    echo $customJsFooter;
}
?>

<script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCefOgb1ZWqYtj7raVSmN4PL2WkTrc-KyA&sensor=false"></script>
<script async src="/js/google_map.js"></script>
<script>
    var d = new Date(new Date().getTime() + 1000 * 120 * 120 * 2000);

    // default example
    simplyCountdown('.simply-countdown-one', {
        year: d.getFullYear(),
        month: d.getMonth() + 1,
        day: d.getDate()
    });

    //jQuery example
    $('#simply-countdown-losange').simplyCountdown({
        year: d.getFullYear(),
        month: d.getMonth() + 1,
        day: d.getDate(),
        enableUtc: false
    });
</script>
</body>
</html>

