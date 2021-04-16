<?PHP
session_start();
$pageTitle = 'Cheeyuta';
$showVIFLogo = 1;
if(isset($_SESSION['firstScreen']) && $_SESSION['firstScreen']!='yes'){
    header("Location:/");
}
$_SESSION['cheyuthaotp'] = '';
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
                            <div class="slider-text-inner" style="width: 600px; height: 200px;">
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
                echo $_SESSION['cheyuthamessage'];
                unset($_SESSION['cheyuthamessage']);
                ?>
            </div>
        </div>
    </div>
</div>
<?PHP
include_once 'common/footer.php';
?>