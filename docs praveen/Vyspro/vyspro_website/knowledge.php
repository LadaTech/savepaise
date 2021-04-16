<?PHP
session_start();
$pageTitle = 'Knowledge Corner';
include_once 'common/header.php';
include_once 'common/db.php';
$sql = "select * from members";
$result = $conn->query($sql);
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
                                <h1 class = "heading-section">Knowledge Corner</h1>
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
            <!-- Section: Team v.2 -->
            <section class="team-section text-center">
                <!-- Grid row -->
                <div class="row text-center" style="height: 200px;">
                    
                </div>
                <!-- Grid row -->
            </section>
            <!-- Section: Team v.2 -->
        </div>

    </div>
</div>
<?PHP
include_once 'common/footer.php';
?>

