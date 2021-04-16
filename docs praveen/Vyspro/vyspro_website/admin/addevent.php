<?PHP
ini_set('upload_max_filesize', '0');
//include_once '../common/config.php';
include_once '../common/functions.php';
$commonfunction = new commonfunction();
$message = '';
$customCSS = '<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">'
        . '<link rel="stylesheet" href="../css/jquery-ui-timepicker-addon.css">';
include_once '../common/adminheader.php';
if ($_POST) {
    $eventname = $_POST['eventname'];
    $starttime = date("Y-m-d H:i:00", strtotime($_POST['starttime']));
    $endtime = date("Y-m-d H:i:00", strtotime($_POST['endtime']));
    $location = $_POST['location'];
    $chiefguest = $_POST['chiefguest'];
    $goh = $_POST['goh'];
    $description = $_POST['description'];
    $txnid = rand(1, 100000000) . rand(10, 2000);
    $photo = str_replace("/", "", str_replace("'", "", str_replace(" ", "_", $eventname))) . '_' . $txnid . '_photo_' . $_FILES['photo']['name'];

    $commonfunction->uploadFiles($_FILES['photo'], str_replace("/", "", str_replace("'", "", str_replace(" ", "_", $eventname))) . '_' . $txnid . '_photo');

    $sql = "INSERT INTO events (event_name,description,event_starttime,event_endtime, location,chief_guest,
                             guest_of_honour,main_photo,created_by,created_date)
                    VALUES ('$eventname','$description','$starttime', '$endtime', '$location','$chiefguest',"
            . "'$goh','$photo',$_SESSION[adminuserid],now())";
    $querylog = "inserted query - " . $sql . PHP_EOL;
    $commonfunction->insertlogs($querylog);
    if ($conn->query($sql) === TRUE) {
        $commonfunction->insertlogs("New record created successfully" . PHP_EOL);
        $message = "1";
    } else {
        $commonfunction->insertlogs("Error: " . $sql . "<br>" . $conn->error . PHP_EOL);
        $message = "2";
    }
    $commonfunction->insertlogs("event added successfully " . PHP_EOL);
//    echo "</pre>";
//    exit;
}

if (isset($_REQUEST['edit']) && $_REQUEST['edit'] != '') {
    $event = $commonfunction->getEvents('', $_REQUEST['edit']);
//    print_r($event);
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
                            New Event created successfully
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
                    <form action="addevent.php" method="post" id="addevent" name="addevent" enctype="multipart/form-data">
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="fname">Event Name</label> 
                                <input type="text" id="eventname" name="eventname" class="form-control" placeholder="Your Event Name">
                            </div>                                                      
                        </div>
                        <div class="row form-group">
                            <div class="col-md-4">
                                <label for="starttime">Event Start Date / Time</label> 
                                <input type="text" id="starttime" name="starttime" class="form-control" placeholder="Event Start Date / Time">
                            </div>
                            <div class="col-md-4">
                                <label for="endtime">Event End Date / Time</label> 
                                <input type="text" id="endtime" name="endtime" class="form-control" placeholder="Event End Date / Time">
                            </div>

                        </div>

                        <div class="row form-group">
                            <div class="col-md-4">
                                <label for="location">Location</label> 
                                <input type="text" id="location" name="location" class="form-control" placeholder="Location">
                            </div>
                            <div class="col-md-4">
                                <label for="chiefguest">Chief Guest</label> 
                                <input type="text" id="chiefguest" name="chiefguest" class="form-control" placeholder="Chief Guest">
                            </div>
                            <div class="col-md-4">
                                <label for="goh">Guest of Honour</label> 
                                <input type="text" id="goh" name="goh" class="form-control" placeholder="Guest of Honour">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="description">Description</label> 
                                <textarea class="ckeditor" cols="80" id="description" name="description" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-6">
                                <label for="photo">Photo / Invitation</label> 
                                <input type="file" id="photo" name="photo" class="form-control" />
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
        . '<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>'
        . '<script src="/js/jquery-ui-timepicker-addon.js?v=1" type="text/javascript"></script>'
        . '<script type="text/javascript" src="../ckeditor/_source/ckeditor.js"></script>'
        . '<script>
                $( function() {
                  $( "#starttime" ).datetimepicker();
                  $( "#starttime" ).datetimepicker( "option", "dateFormat", "dd-mm-yy" );
                  $( "#endtime" ).datetimepicker();
                  $( "#endtime" ).datetimepicker( "option", "dateFormat", "dd-mm-yy" );
                } );
            </script>';
include_once '../common/adminfooter.php';
?>