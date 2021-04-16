<?PHP
include_once '../common/adminheader.php';
include_once '../common/functions.php';
$commonfunction = new commonfunction();
$events = $commonfunction->getLifeMembers();
//echo "<pre>";
//print_r($events);
//echo "</pre>";
?>
<div id="fh5co-staff">
    <div class="container">
        <div class="row">
             <div class="col-md-12"> 
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Events</a></li>
                        <li class="breadcrumb-item active left" aria-current="page"><a href="addevent.php">Add Event</a></li>
                    </ol>
                </nav>     

            </div>        
            <div class="container">
                <div class="row">                   
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Member Id</th>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Email Id</th>
                                <th>qualification</th>
                                <th>mobile_number</th>
                                <th>Date of Join</th>
                                <th>Address</th>   
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?PHP
                            foreach ($events as $event) {
                                ?>
                                <tr>
                                    <!--<td><?PHP //echo date("d-M-Y H:i", strtotime($event['event_starttime']));  ?></td>-->
                                    <td><?PHP echo $event['member_id']; ?></td>
                                    <td><img src="../images/lifemembers/<?PHP echo $event['photo']; ?>" width="75" /></td>
                                    <td><?PHP echo $event['sur_name'] . ' ' . $event['firstname'] . ' ' . $event['lastname']; ?></td>
                                    <td><?PHP echo $event['email_id']; ?></td>
                                    <td><?PHP echo $event['qualification']; ?></td>                                     
                                    <td><?PHP echo $event['mobile_number']; ?></td>
                                    <td><?PHP echo date("d-M-Y", strtotime($event['date_of_join'])); ?></td>
                                    <td><?PHP echo $event['address1']; ?></td>
                                    <td>
                                        <a type="button" href="memberview.php?id=<?PHP echo $event['id']; ?>" target="_blank">View</a>
    <!--                                        <a type="button" href="addevent.php?edit=<?PHP echo $event['id']; ?>"><span class="fas fa-edit" style="font-size: 2em; color: #1933A1;" ></span></a>-->
                                        <a type="button"><i class="far fa-trash-alt"></i></a>
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