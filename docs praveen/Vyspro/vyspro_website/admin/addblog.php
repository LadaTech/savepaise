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
    $eventname = $conn->real_escape_string($_POST['title']);
    $starttime = date("Y-m-d H:i:00", strtotime($conn->real_escape_string($_POST['starttime'])));
    $location = $conn->real_escape_string($_POST['location']);
    $description = $conn->real_escape_string($_POST['description']);
    $txnid = rand(1, 100000000) . rand(10, 2000);
    $photo = $txnid . '_photo_' . $conn->real_escape_string($_FILES['photo']['name']);

    uploadFiles($_FILES['photo'], $txnid . '_photo');

    $sql = "INSERT INTO bulletin (title,description,bulletin_date, location,photo,created_by,created_date)
                    VALUES ('$eventname','$description','$starttime','$location','$photo',$_SESSION[adminuserid],now())";
    $querylog = "inserted query - " . $sql . PHP_EOL;
    insertlogs($querylog);
    if ($conn->query($sql) === TRUE) {
        insertlogs("New record created successfully" . PHP_EOL);
        $message = "1";
    } else {
        insertlogs("Error: " . $sql . "<br>" . $conn->error . PHP_EOL);
        $message = "2";
    }
    insertlogs("event added successfully " . PHP_EOL);
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
            <div class="col-md-12">          
                <ul class="breadcrumb hidden-xs">            
                    <li class="breadcrumb-item">
                        <a href="dashboard.php">Dashboard</a>
                    </li>            
                    <li class="breadcrumb-item"><a href="blogs.php">Bulletin</a>
                    </li>
                    <li class="active breadcrumb-item">Add Bulletin
                    </li>
                </ul>
            </div>        
            <div class="container">
                <div class="row">   
                    <?PHP
                    if ($message == 1) {
                        ?>
                        <div class="alert alert-success" role="alert">
                            New bulletin created successfully
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
                    <form action="addblog.php" method="post" id="addevent" name="addevent" enctype="multipart/form-data">
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="fname">Title</label> 
                                <input type="text" id="title" name="title" class="form-control" placeholder="Your Title">
                            </div>                                                      
                        </div>
                        <div class="row form-group">
                            <div class="col-md-4">
                                <label for="location">Location</label> 
                                <input type="text" id="location" name="location" class="form-control" placeholder="Location">
                            </div>
                            <div class="col-md-4">
                                <label for="starttime">Event Start Date</label> 
                                <input type="text" id="starttime" name="starttime" class="form-control" placeholder="Event Start Date">
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
                            <input type="submit" value="Add Bulletin" id="addevent" name="addevent" class="btn btn-primary">
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
                  $( "#starttime" ).datepicker();
                  $( "#starttime" ).datepicker( "option", "dateFormat", "dd-mm-yy" );
                } );
            </script>';
include_once '../common/adminfooter.php';
?>