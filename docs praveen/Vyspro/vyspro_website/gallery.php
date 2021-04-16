<?PHP
include_once 'common/functions.php';
$commonfunction = new commonfunction();
if (isset($_REQUEST['id']) && $_REQUEST['id'] != '') {
    $id = $_REQUEST['id'];
    $event = $commonfunction->getEvents($id);
} else {
    header("Location:/events.php");
}
$customCSS = "
    <style>.gallery_product
{
    margin-bottom: 30px;
}</style>";
include_once 'common/header.php';
//echo "<pre>";
//print_r($event);
//echo "</pre>";
?>
<div id="fh5co-staff">
    <div class="container">
        <div class="row">
            <div class="page-header">          
                <ul class="breadcrumb hidden-xs">            
                    <li>
                        <a href="https://vysproindia.org/index.php">Home</a>
                    </li>            
                    <li class="active">Photo Gallery
                    </li>          
                </ul>          
                <h1 class="pageTitle">Gallery</h1>        
            </div>        
            <div class="container">
                <div class="row">
                    <?PHP
                    $eventDateD = date("d", strtotime($event[0]['event_starttime']));
                    $eventDateM = date("M", strtotime($event[0]['event_starttime']));
                    ?>
                    <div class="col-md-12 animate-box">
                        <div class="fh5co-event">
                            <div class="row">
                                <div class="date text-center"><span><?PHP echo $eventDateD; ?><br /><?PHP echo $eventDateM; ?>.</span></div>
                                <div class="col-md-6">                                    
                                    <div><img src="/uploads/<?PHP echo $event[0]['main_photo']; ?>" width="100%" /></div>

                                </div>
                                <div class="col-md-6">                                    
                                    <h3><a href="/gallery.php?id=<?PHP echo $event[0]['id']; ?>"><?PHP echo $event[0]['event_name']; ?></a></h3>
                                    <table class="table table-striped">                                        
                                        <tbody>
                                            <tr>
                                                <th scope="row">Start Date:</th>
                                                <td><?PHP echo $event[0]['event_starttime']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">End Date:</th>
                                                <td><?PHP echo $event[0]['event_endtime']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Location:</th>
                                                <td><?PHP echo $event[0]['location']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Chief Guest:</th>
                                                <td><?PHP echo $event[0]['chief_guest']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Guest of Honour:</th>
                                                <td><?PHP echo $event[0]['guest_of_honour']; ?></td>
                                            </tr>

                                        </tbody>
                                    </table>                                    
                                </div>
                            </div>
                            <div class="row">
                                <div><?PHP echo $event[0]['description']; ?></div>
                            </div>
                        </div>
                        <h1 class="pageTitle">Photos</h1> 
                        <div class="row">
                            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter hdpe">
                                <img src="http://fakeimg.pl/365x365/" class="img-responsive">
                            </div>

                            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter sprinkle">
                                <img src="http://fakeimg.pl/365x365/" class="img-responsive">
                            </div>

                            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter hdpe">
                                <img src="http://fakeimg.pl/365x365/" class="img-responsive">
                            </div>

                            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter irrigation">
                                <img src="http://fakeimg.pl/365x365/" class="img-responsive">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?PHP
include_once 'common/footer.php';
?>

