<?PHP
session_start();
$pageTitleDisplay = 'Office Bearers';
$customCSS = "<style type='text/css'>"
        . ".staff .staff-img img{"
        . "width:150px !important;"
        . "height:150px;"
        . "}"
        . ".staff .staff-img{"
        . "height:100%;"
        . "}"
        . "</style>";

include_once 'common/header.php';
?>

<aside id = "fh5co-hero">
    <div class = "flexslider">
        <ul class = "slides">
            <li style = "background-image: url(images/img_bg_4.jpg);">
                <div class = "overlay-gradient"></div>
                <div class = "container">
                    <div class = "row">
                        <div class = "col-md-6 offset-md-3 text-center slider-text">
                            <div class = "slider-text-inner">
                                <h1 class = "heading-section">OFFICE BEARERS</h1>
                                <!--<h2>Free html5 templates Made by <a href = "http://freehtml5.co/" target = "_blank">freehtml5.co</a></h2>-->
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</aside>

<div id="fh5co-staff">
    <div class="container">
        <div class="row">
            <div class="col-md-3 text-center">
                <div class="staff">                    
                    <div class="staff-img">
                        <img src="/images/committe/beldi-sridhar.jpg" alt="CA Beldi Sridhar" />                        
                    </div>
                    <h3><a href="#">CA Beldi Sridhar</a></h3>
                </div>
            </div>
            <div class="col-md-3 text-center">
                <div class="staff">                    
                    <div class="staff-img">  
                        <img src="/images/committe/b-chakrapani.jpg" alt="CA. B Chakrapani" />
                    </div>
                    <h3><a href="#">CA. B Chakrapani</a></h3>
                </div>
            </div>
            <div class="col-md-3 text-center">
                <div class="staff">
                    <div class="staff-img">
                        <img src="/images/committe/Rajeswara-Rao-Padarthi.jpg" alt="CA. P Rajeswara Rao" />
                    </div>
                    <h3><a href="#">CA. P Rajeswara Rao</a></h3>
                </div>
            </div>

            <div class="col-md-3 animate-box text-center">
                <div class="staff">
                    <div class="staff-img">
                        <img src="/images/committe/dayakar-gelli.jpg" alt="CA Dayakar Gelli" />  
                    </div>
                    <h3><a href="#">CA Dayakar Gelli</a></h3>
                </div>
            </div>
            <div class="col-md-3 text-center">
                <div class="staff">
                    <div class="staff-img">
                        <img src="/images/committe/Chandra-Sekharaiah-Narahari.jpg" alt="CA. N. Chandra Sekharaiah" />
                    </div>
                    <h3><a href="#">CA. N. Chandra Sekharaiah</a></h3>
                </div>
            </div>
            <div class="col-md-3 text-center">
                <div class="staff">
                    <div class="staff-img">
                        <img src="/images/committe/Amrit-Kota.jpg" alt="CA. Amrith Kumar Kota" />
                    </div>
                    <h3><a href="#">CA. Amrith Kumar Kota</a></h3>
                </div>
            </div>

            <div class="col-md-3 animate-box text-center">
                <div class="staff">
                    <div class="staff-img">
                        <img src="/images/committe/CH-RSSrinivas-Kumar.jpg" alt="CA. CH. R S Srinivas Kumar" />  
                    </div>
                    <h3><a href="#">CA. CH. R S Srinivas Kumar</a></h3>
                </div>
            </div>
            <div class="col-md-3 animate-box text-center">
                <div class="staff">
                    <div class="staff-img">
                        <img src="/images/committe/Samba-sivarao.jpg" alt="CA. S Samba Siva Rao" />  
                    </div>
                    <!--<span>TREASURER</span>-->
                    <h3><a href="#">CA. S Samba Siva Rao</a></h3>
                </div>
            </div>
        </div>
    </div>
</div>

<?PHP
include_once 'common/footer.php';
?>

