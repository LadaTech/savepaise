<?PHP
include_once '../common/adminheader.php';
include_once '../common/functions.php';
$commonfunction = new commonfunction();
$events = $commonfunction->getEvents();
//echo "<pre>";
//print_r($events);
//echo "</pre>";
?>
<div id="fh5co-staff">
    <div class="container">
        <div class="row">
           <div class="col-md-12">          
                <ol class="breadcrumb">        
                    <li class="breadcrumb-item">
                        <a href="dashboard.php">Home</a>
                    </li>            
                    <li class="active breadcrumb-item">Events
                    </li>
                    <li class="pull-right breadcrumb-item"><a href="addevent.php">Add Event</a>
                    </li>
                </ul>          

            </div>        
            <div class="container">
                <div class="row">                   
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Event Start time</th>
                                <th>Event End time</th>
                                <th>Event Name</th>
                                <th>Location</th>
                                <th>Chief Guest</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?PHP
                            foreach ($events as $event) {
                                ?>
                                <tr>
                                    <td><?PHP echo date("d-M-Y H:i", strtotime($event['event_starttime'])); ?></td>
                                    <td><?PHP echo date("d-M-Y H:i", strtotime($event['event_endtime'])); ?></td>
                                    <td><?PHP echo $event['event_name']; ?></td>
                                    <td><?PHP echo $event['location']; ?></td>
                                    <td><?PHP echo $event['chief_guest']; ?></td>
                                    <td>
                                        <a type="button" class="btn btn-primary" href="/admin/addphotos.php?id=<?PHP echo $event['id'];?>">Add Photos / Add Videos</a>
                                        <a type="button" class="btn btn-primary" href="/gallery.php?id=<?PHP echo $event['id'];?>" target="_blank">View</a>
                                        <a type="button" class="btn btn-info" href="/admin/addevent.php?edit=<?PHP echo $event['id'];?>">Edit</a>
                                        <a type="button" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                                <?PHP
                            }
                            ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
<?PHP
include_once '../common/adminfooter.php';
?>