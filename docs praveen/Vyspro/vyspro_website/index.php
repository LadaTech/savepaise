<?PHP
session_start();
$pageTitle = 'Home';
include_once 'common/functions.php';
$commonfunction = new commonfunction();
$eventsDisplay = $commonfunction->getEvents('', 3);
$bulletins = $commonfunction->getbulletin('', 3);
$_SESSION['eventsDisplay'] = $eventsDisplay;
include_once 'common/header.php';
?>
<div id="fh5co-blog">
    <div class="container">
        <div class="row">
            <div class="col-md-3 animate-box committee-animate">

                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="/images/committe/madhu-mohan.jpeg" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <div class="carouselname">Madhu Mohan G</div>
                                <div class="carouseldesig">PRESIDENT</div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="/images/committe/Rachuri-srinivas.jpg" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <div class="carouselname">Er R. Srinivasa Rao</div>
                                <div class="carouseldesig">GENERAL SECRETARY</div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="/images/committe/gururaj.jpg" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <div class="carouselname">CA. Gururaj Guggal</div>
                                <div class="carouseldesig">TREASURER</div>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="col-md-6 animate-box home-gallery">
                <div id="carouselphotos" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselphotos" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselphotos" data-slide-to="1"></li>
                        <li data-target="#carouselphotos" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <iframe width="535" height="270" src="https://www.youtube.com/embed/neM04AWlhk0?controls=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                        <!--<div class="carousel-item active">
                            <img src="/images/5.jpeg" class="d-block img-fluid img-thumbnail" style="width:100%; height: 275px;" alt="...">
                        </div>
                        <div class="carousel-item active">
                            <img src="/images/vidhyabharathi.jpeg" class="d-block img-fluid img-thumbnail" style="width:100%; height: 275px;" alt="vidhyabharathi">
                        </div>
                        
                        <div class="carousel-item">
                            <img src="/images/1.jpg" class="d-block img-fluid img-thumbnail" style="width:100%; height: 275px;" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="/images/2.jpg" class="d-block img-fluid img-thumbnail" style="width:100%; height: 275px;" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="/images/4.jpg" class="d-block img-fluid img-thumbnail" style="width:100%; height: 275px;" alt="...">
                        </div>-->
                    </div>
                    <a class="carousel-control-prev" href="#carouselphotos" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselphotos" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="col-md-3 animate-box home-top-ad">
                <div style="border:1px solid; width: 100%; height: 260px; font-size: 1.5em; font-weight: bold; text-align: justify; padding: 5px;">
                    <p>  To advertise in this place, Please contact Vyspro-India<br />+91 868 882 8969 </p>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="fh5co-staff">
    <div class="container" style="border:1px solid; background-color: #DDD;">
        <div class="row" style=" margin-top: 15px;">
            <div class="col-md-4">
                <div class="text-center">
                   <p> <img src="/images/ads/HANSAEQUITYPARTNERS.png" /></p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="text-center">
                    <img src="/images/ads/KVENKATESHGUPTA.png" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="text-center">
                    <img src="/images/ads/goodwill-Rajanikath.png" />
                </div>
            </div>
        </div>
    </div>
</div>
<div id="fh5co-staff">
    <div class="container">
        <div class="row">
            <div class="col-md-6 animate-box">
                <div class="text-justify fh5co-heading">
                    <h2>Welcome To Vyspro - India</h2>
                    <p> 
                        Vysya Professional Association (VYSPRO) came into existences after a VANA MAHOTSAVAM Meet at the Chacha Nehru Park in 1998. The members then decided to formalize this vision into a society in November 1998 which was formally done with the name "VYSPRO - INDIA" <br />
                        The VYSPRO-India is an association of Professionals from 8 professions. These are Chartered Accountants, Company Secretaries, Cost Accountants, Doctors, Advocates, Engineers,MBA’s and MCAs.<br />
                        The initial membership started with a base of about 150 members and since then it has now touched about 850 members in about 15 years and is fast growth path with a target of more than 2500 members in next few years.
                    </p>
                </div>
            </div>
            <div class="col-md-6 animate-box">
                <div class="text-justify fh5co-heading">
                    <h2>President Message</h2>
                    <p> 
                        The world stands at the brink of a technological revolution and the scale, scope, and complexity of the transformation will be unlike anything humankind has experienced ever before. Digitalisation and Automation of manual and routine tasks are taking place at an accelerated pace as standardisation of processes and cloud-based accounting and data capturing systems has made data more easily available, easier to move between systems, simple to analyse, and also less susceptible for errors. This would help us to focus on more on value-added activities and deliver qualitative services by providing real-time, forward-looking insights to the members and other stakeholders.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="fh5co-course-categories">
    <div class="container">
        <div class="row animate-box">
            <div class="col-md-6 offset-md-3 text-center fh5co-heading">
                <h2>Our Services</h2>
                <!--<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>-->
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 col-sm-6 text-center animate-box">
                <div class="services">
                    <span class="icon">
                        <i class="icon-banknote"></i>
                    </span>
                    <div class="desc">
                        <h3><a href="#">Scholarships to Students</a></h3>
                        <!--<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>-->
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 text-center animate-box">
                <div class="services">
                    <span class="icon">
                        <i class="icon-banknote"></i>
                    </span>
                    <div class="desc">
                        <h3><a href="#">Merit Awards</a></h3>
                        <!--<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>-->
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 text-center animate-box">
                <div class="services">
                    <span class="icon">
                        <i class="icon-lab2"></i>
                    </span>
                    <div class="desc">
                        <h3><a href="#">Water Camps</a></h3>
                        <!--<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>-->
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 text-center animate-box">
                <div class="services">
                    <span class="icon">
                        <i class="icon-shop"></i>
                    </span>
                    <div class="desc">
                        <h3><a href="#">Social Service</a></h3>
                        <!--<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>-->
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div id="fh5co-counter" class="fh5co-counters" style="background-image: url(images/img_bg_4.jpg);" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-1">
                <div class="row">
                    <div class="col-md-3 col-sm-6 text-center animate-box">

                        <span class="icon"><i class="icon-head"></i></span>
                        <span class="fh5co-counter js-counter" data-from="0" data-to="1012" data-speed="5000" data-refresh-interval="50"></span>
                        <span class="fh5co-counter-label">Life Member</span>
                    </div>                    
                    <div class="col-md-3 col-sm-6 text-center animate-box">
                        <span class="icon"><i class="icon-bulb"></i></span>
                        <span class="fh5co-counter js-counter" data-from="0" data-to="1200" data-speed="5000" data-refresh-interval="50"></span>
                        <span class="fh5co-counter-label">Scholarships to Students</span>
                    </div>
                    <div class="col-md-3 col-sm-6 text-center animate-box">
                        <span class="icon"><i class="icon-study"></i></span>
                        <span class="fh5co-counter js-counter" data-from="0" data-to="20" data-speed="5000" data-refresh-interval="50"></span>
                        <span class="fh5co-counter-label">Executive Team</span>
                    </div>
                    <div class="col-md-3 col-sm-6 text-center animate-box">
                        <span class="icon"><i class="icon-world"></i></span>
                        <span class="fh5co-counter js-counter" data-from="0" data-to="15" data-speed="5000" data-refresh-interval="50"></span>
                        <span class="fh5co-counter-label">Advisors</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="fh5co-testimonial" style="background-image: url(images/school.jpg);">
    <div class="overlay"></div>
    <div class="container">
        <div class="row animate-box">
            <div class="col-md-12 col-md-offset-4 text-center fh5co-heading">
                <h2><span>Testimonials</span></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-md-offset-1">
                <div class="row animate-box">
                    <div class="owl-carousel owl-carousel-fullwidth">
                        <div class="item">
                            <div class="testimony-slide active text-center">
                                <div class="user" style="background-image: url(images/person1.jpg);"></div>
                                <span>Mary Walker<br><small>Students</small></span>
                                <blockquote>
                                    <p>&ldquo;Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.&rdquo;</p>
                                </blockquote>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-slide active text-center">
                                <div class="user" style="background-image: url(images/person2.jpg);"></div>
                                <span>Mike Smith<br><small>Students</small></span>
                                <blockquote>
                                    <p>&ldquo;Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.&rdquo;</p>
                                </blockquote>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-slide active text-center">
                                <div class="user" style="background-image: url(images/person3.jpg);"></div>
                                <span>Rita Jones<br><small>Teacher</small></span>
                                <blockquote>
                                    <p>&ldquo;Far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.&rdquo;</p>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--<div id="fh5co-course">
    <div class="container">
        <div class="row animate-box">
            <div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
                <h2>Our Course</h2>
                <p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 animate-box">
                <div class="course">
                    <a href="#" class="course-img" style="background-image: url(images/project-1.jpg);">
                    </a>
                    <div class="desc">
                        <h3><a href="#">Web Master</a></h3>
                        <p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
                        <span><a href="#" class="btn btn-primary btn-sm btn-course">Take A Course</a></span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 animate-box">
                <div class="course">
                    <a href="#" class="course-img" style="background-image: url(images/project-2.jpg);">
                    </a>
                    <div class="desc">
                        <h3><a href="#">Business &amp; Accounting</a></h3>
                        <p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
                        <span><a href="#" class="btn btn-primary btn-sm btn-course">Take A Course</a></span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 animate-box">
                <div class="course">
                    <a href="#" class="course-img" style="background-image: url(images/project-3.jpg);">
                    </a>
                    <div class="desc">
                        <h3><a href="#">Science &amp; Technology</a></h3>
                        <p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
                        <span><a href="#" class="btn btn-primary btn-sm btn-course">Take A Course</a></span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 animate-box">
                <div class="course">
                    <a href="#" class="course-img" style="background-image: url(images/project-4.jpg);">
                    </a>
                    <div class="desc">
                        <h3><a href="#">Health &amp; Psychology</a></h3>
                        <p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
                        <span><a href="#" class="btn btn-primary btn-sm btn-course">Take A Course</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>-->

<div id="fh5co-blog">
    <div class="container">
        <div class="row animate-box">
            <div class="col-md-6 offset-md-3 text-center fh5co-heading">
                <h2>Blog &amp; Events</h2>
                <!--<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>-->
            </div>
        </div>

        <div class="row row-padded-mb">
            <?PHP
            if (is_array($eventsDisplay)) {
                foreach ($eventsDisplay as $event) {
//                    print_r($event);
                    $eventDateD = date("d", strtotime($event['event_starttime']));
                    $eventDateM = date("M", strtotime($event['event_starttime']));
                    ?>
                    <div class="col-md-4 animate-box">
                        <div class="fh5co-event">
                            <div class="date text-center"><span><?PHP echo $eventDateD; ?><br><?PHP echo $eventDateM; ?>.</span></div>
                            <h3><a href="/events.php?id=<?PHP echo $event['id']; ?>"><?PHP echo $event['event_name']; ?></a></h3>
                            <?PHP echo $event['description']; ?>
                            <p><a href="/events.php?id=<?PHP echo $event['id']; ?>">Read More</a></p>
                        </div>
                    </div>
                    <?PHP
                }
            }
            ?>
        </div>
        <?PHP
        if (is_array($bulletins) && sizeof($bulletins) >= 1) {
            ?>

            <div class = "row animate-box">
                <div class = "col-md-6 offset-md-3 text-center fh5co-heading">
                    <h2>Bulletin</h2>
                    <!--<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p> -->
                </div>
            </div>
            <div class = "row">
                <?PHP
                foreach ($bulletins as $bulletin) {
                    ?>
                    <div class="col-lg-4 col-md-4">                
                        <div class="fh5co-blog animate-box">
                            <a href="#" class="blog-img-holder" style="background-image: url(uploads/<?PHP echo $bulletin['photo']; ?>);"></a>
                            <div class="blog-text">
                                <h3><a href="#"><?PHP echo $bulletin['title']; ?></a></h3>
                                <span class="posted_on"><?PHP echo date('M d', strtotime($bulletin['bulletin_date'])); ?></span>
                                <!--<span class="comment"><a href="">21<i class="icon-speech-bubble"></i></a></span>-->
                                <?PHP echo $bulletin['description']; ?>
                            </div> 
                        </div>
                    </div>
                    <?PHP
                }
                ?>
            </div>
            <?PHP
        }
        ?>
    </div>
</div>

<?PHP
include_once 'common/footer.php';
?>

