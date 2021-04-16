<?PHP
ini_set('upload_max_filesize', '0');
//include_once '../common/config.php';
include_once '../common/functions.php';
$commonfunction = new commonfunction();
$message = '';
$customCSS = '<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">'
        . '<link rel="stylesheet" href="../css/jquery-ui-timepicker-addon.css">';
include_once '../common/adminheader.php';
$eventId = $_REQUEST['id'];
if (!empty($_POST)) {
//    echo "<pre>";
//    print_r($_POST);
//    print_r($_FILES);
//    echo "</pre>";
//    exit;
    $eventId = $_POST['eventid'];
    $error = false;
    if (isset($_FILES['upload']) === true) {
        define('DESTINATION', '../uploads/events/');
        define('RESIZEBY', 'w');
        define('RESIZETO', 500);
        define('QUALITY', 100);
        for ($i = 0; $i < count($_FILES['upload']['name']); $i++) {
            if (is_file($_FILES['upload']['tmp_name'][$i])) {
                require_once '../common/Image.php';
                $txnid = rand(1, 100000000) . rand(10, 2000);

                $image = new Image($_FILES['upload']['tmp_name'][$i]);
                echo $files = $txnid . '_' . $_FILES['upload']['name'][$i];
                $filesuploaded[] = $files;
                $image->destination = DESTINATION . $files;
                $image->constraint = RESIZEBY;
                $image->size = RESIZETO;
                $image->quality = QUALITY;
                $image->render();
            }
        }
//        echo '<br/>';
//        echo 'Image successfully resize and upload to folder';
    }

    $commonfunction->insertgalleryPhotos($filesuploaded, $eventId, 'event');
    $message = 1;
//    $commonfunction->insertlogs("event added successfully " . PHP_EOL);
    //    echo "</pre>";
    //    exit;
}
?>
<div id="fh5co-staff">
    <div class="container">
        <div class="row">
            <div class="page-header">          
                <ul class="breadcrumb hidden-xs">            
                    <li>
                        <a href="dashboard.php">Dashboard</a>
                    </li>            
                    <li class=""><a href="events.php">Events</a>
                    </li>
                    <li class="active">Add Events
                    </li>
                </ul>
            </div>        
            <div class="container">
                <div class="row">   
                    <?PHP
                    if ($message == 1) {
                        ?>
                        <div class="alert alert-success" role="alert">
                            Photos created successfully
                        </div>
                        <?PHP
                    } else if ($message == 2) {
                        ?>
                        <div class="alert alert-danger" role="alert">
                            Something went wrong
                        </div>
                        <?PHP
                    }
                    ?>
                    <form action="addphotos.php" method="post" id="addevent" name="addevent" enctype="multipart/form-data">
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="fname">Upload Photos</label> 
                                <input type="hidden" id="eventid" name="eventid" value="<?PHP echo $eventId; ?>" />
                                <input type="file" id="upload" name="upload[]" multiple="multiple" class="form-control" accept="image/*" />
                            </div>                                                      
                        </div>

                        <div class="form-group">
                            <input type="submit" value="Add Event" id="addevent" name="addevent" class="btn btn-primary">
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<?PHP
$customJsFooter = '<script src="/js/jquery.validate.min.js?v=1" type="text/javascript"></script>'
        . '<script src="/js/custom.js?v=1" type="text/javascript"></script>'
        . '<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>';
include_once '../common/adminfooter.php';
?>