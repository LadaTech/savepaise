<?PHP
session_start();
$pageTitle = 'Life Members';
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
                                <h1 class = "heading-section">Life Members</h1>
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
            <!-- Section: Team v.2 -->
            <section class="team-section text-center">
                <!-- Section description -->
                <p class="grey-text w-responsive mx-auto mb-5">Our Life Members</p>

                <!-- Grid row -->
                <div class="row text-center">
                    <?PHP
                    if ($result) {
                        while ($members = $result->fetch_assoc()) {
                            ?>
                            <!-- Grid column -->
                            <div class="col-md-3 mb-md-0 mb-5">
                                <div class="avatar mx-auto">
                                    <img src="/images/lifemembers/<?PHP echo $members['photo']; ?>" class="rounded img-thumbnail z-depth-1-half" style="width: 150px; height: 150px;"  alt="Sample avatar">
                                </div>
                                <div class="font-weight-bold dark-grey-text text-danger"><?PHP echo $members['member_id']; ?> : <?PHP echo $members['sur_name'].' '.$members['firstname']; ?></div>
                                <div class="text-uppercase grey-text mb-3"><strong><?PHP echo $members['qualification']; ?></strong></div>
                            </div>
                            <!-- Grid column -->
                            <?PHP
                        }
                    }
                    ?>

                </div>
                <!-- Grid row -->

            </section>
            <!-- Section: Team v.2 -->
        </div>

    </div>
</div>

<!--<div id = "fh5co-register" style = "background-image: url(images/img_bg_2.jpg);">
    <div class = "overlay"></div>
    <div class = "row">
        <div class = "col-md-6 offset-md-3 animate-box">
            <div class = "date-counter text-center">
                <h2>Get 400 of Online Courses for Free</h2>
                <h3>By Mike Smith</h3>
                <div class = "simply-countdown simply-countdown-one"></div>
                <p><strong>Limited Offer, Hurry Up!</strong></p>
                <p><a href = "#" class = "btn btn-primary btn-lg btn-reg">Register Now!</a></p>
            </div>
        </div>
    </div>
</div>-->

<?PHP
include_once 'common/footer.php';
?>

