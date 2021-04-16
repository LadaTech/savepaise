<?PHP
session_start();
$pageTitle = 'Events';
include_once 'common/header.php';
//include_once 'common/config.php';
include_once 'common/functions.php';
$commonfunction = new commonfunction();

$events = $commonfunction->getEvents();
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
                                <h1 class = "heading-section">Events</h1>
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
            <?PHP
            if (is_array($events)) {
                $i = 0;
                foreach ($events as $event) {
//                    print_r($event);
                    $eventDateD = date("d", strtotime($event['event_starttime']));
                    $eventDateM = date("M", strtotime($event['event_starttime']));
                    ?>
                    <div class="col-md-6 animate-box">
                        <div class="fh5co-event">
                            <div><img src="/uploads/<?PHP echo $event['main_photo']; ?>" width="400" /></div>
                            <div class="date text-center"><span><?PHP echo $eventDateD; ?><br /><?PHP echo $eventDateM; ?>.</span></div>
                            <h3><a href="/gallery.php?id=<?PHP echo $event['id']; ?>"><?PHP echo $event['event_name']; ?></a></h3>
                            <?PHP echo $event['description']; ?>
                            <p><a href="/gallery.php?id=<?PHP echo $event['id']; ?>">Read More</a></p>
                        </div>
                    </div>
                    <?PHP
                    $i++;
                    if ($i == 2) {
                        echo '</div><div class="row">';
                        $i = 0;
                    }
                }
            }
            ?>
        </div>

    </div>
</div>
<!--<div id = "fh5co-register" style = "background-image: url(images/img_bg_2.jpg);">
    <div class = "overlay"></div>
    <div class = "row">
        <div class = "col-md-8 col-md-offset-2 animate-box">
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