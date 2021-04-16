<?PHP
include_once '../common/adminheader.php';
include_once '../common/functions.php';
$commonfunction = new commonfunction();
$events = $commonfunction->getbulletin();
//echo "<pre>";
//print_r($events);
//echo "</pre>";
?>
<div id="fh5co-staff">
    <div class="container">
        <div class="row">
            <div class="col-md-12">          
                <ul class="breadcrumb hidden-xs">            
                    <li class="breadcrumb-item">
                        <a href="dashboard.php">Home</a>
                    </li>            
                    <li class="active breadcrumb-item">Bulletin
                    </li>
                    <li class="pull-right  breadcrumb-item"><a href="addblog.php">Add bulletin</a>
                    </li>
                </ul>          

            </div>        
            <div class="container">
                <div class="row">                   
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Bulletin Date</th>
                                <th>Photo</th>
                                <th>Title</th>
                                <th>Location</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?PHP
                            foreach ($events as $event) {
                                ?>
                                <tr>
                                    <td><?PHP echo date("d-M-Y", strtotime($event['bulletin_date'])); ?></td>
                                    <td><img src="../uploads/<?PHP echo $event['photo']; ?>" width="75" /></td>
                                    <td><?PHP echo $event['title']; ?></td>
                                    <td><?PHP echo $event['location']; ?></td>
                                    <td><?PHP echo $event['description']; ?></td>
                                    <td>
                                        <!--<a type="button" class="btn btn-primary" href="/bulletin.php?id=<?PHP echo $event['id']; ?>" target="_blank">View</a>-->
                                        <a type="button" class="btn btn-info" href="/admin/addblog.php?edit=<?PHP echo $event['id']; ?>">Edit</a>
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