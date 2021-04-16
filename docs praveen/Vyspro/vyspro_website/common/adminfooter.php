<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?PHP
if (!isset($noHeader)) {
    ?>

    <p></p>
    <footer id="fh5co-footer" role="contentinfo" style="background-image: url(images/img_bg_4.jpg);">
        <div class="overlay"></div>
        <div class="container">
            <div class="row copyright">
                <div class="col-md-12 text-center">
                    <p>
                        <small class="block">&copy; <?PHP echo date('Y'); ?> Vypro-India. All Rights Reserved.</small> 
                        <!--<small class="block">Designed by <a href="http://freehtml5.co/" target="_blank">FreeHTML5.co</a> Demo Images: <a href="http://unsplash.co/" target="_blank">Unsplash</a> &amp; <a href="https://www.pexels.com/" target="_blank">Pexels</a></small>-->
                    </p>
                </div>
            </div>

        </div>
    </footer>
    </div>
    <?PHP
}
?>
<div class="gototop js-top">
    <a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
</div>

<!-- jQuery -->
<script src="/js/jquery.min.js"></script>
<!-- jQuery Easing -->
<script src="/js/jquery.easing.1.3.js"></script>
<!-- Bootstrap -->
<!--<script src="/js/bootstrap.min.js"></script>-->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

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
<!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCefOgb1ZWqYtj7raVSmN4PL2WkTrc-KyA&sensor=false"></script>
<script src="/js/google_map.js"></script>-->
<?PHP
if (isset($customJsFooter)) {
    echo $customJsFooter;
}
?>
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

