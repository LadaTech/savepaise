<?php
session_start();
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);
if(!isset($_SESSION['adminusername']))
{
    header("location:/admin/login.php");
    exit;
}
$headerTitle = 'Students';
include_once '../common/logs.php';
include_once '../common/db.php';
include_once '../common/header.php';

if(isset($_POST)){
    $applicationNumber = $_POST['application_number'];
    $name = $_POST['studentname'];
    $surname=$_POST['studentsurname'];
    $applicationType=$_POST['type'];
    
    if($applicationNumber!=''){
        $whereCondition = " and application_number like '$applicationNumber'";
    }
    if($name!=''){
        $whereCondition .= " and name like '$name'";
    }
    if($surname!=''){
        $whereCondition .= " and surname like '$surname'";
    }
    if($applicationType!=''){
        $whereCondition .= " and applying_for like '$applicationType'";
    }
}
$select = "select * from vb_users where 1=1 $whereCondition";
$result = $conn->query($select);
?>

<section class="page">  
    <div class="container">
        <h3 style="color: #D70000;">Vyspro-India Vidhya Bharati 2019 Applications</h3>
        <div class="row">     
            <div class="col-md-12 formContainer clearfix">
                <div class="payuform">
                    <h4 style="color: #d70000;">Students Details</h4>
                    <form class="form-inline" method="post" action="/admin/users.php">
                        <div class="form-group">
                            <label for="email">Reference Number:</label>
                            <input type="application_number" class="form-control" id="application_number" name="application_number">
                        </div>
                        <div class="form-group">
                            <label for="studentsurname">sur Name:</label>
                            <input type="text" class="form-control" id="studentsurname" name="studentsurname">
                        </div>
                        <div class="form-group">
                            <label for="studentname">Name:</label>
                            <input type="text" class="form-control" id="studentname" name="studentname">
                        </div>
                        <div class="checkbox">
                            <select id="type" name="type" class="form-control">
                                <option value="">Both</option>
                                <option value="merit">Merit</option>
                                <option value="scholarship">Scholarship</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                    <br />

                    <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="th-sm">Reference Number</th>
                                <th class="th-sm">Applied for</th>
                                <th class="th-sm">Name</th>                                                                
                                <th class="th-sm">Date of Birth</th>
                                <th class="th-sm">Email Id</th>
                                <th class="th-sm">Phone Number</th>
                                <th class="th-sm">Father/Guardian Name</th>
                                <th class="th-sm">Occupation</th>
                                <th class="th-sm">Father/Guardian Phone Number</th>
                                <th class="th-sm">Gothram</th>
                                <th class="th-sm">How you now this event?</th>
                                <th class="th-sm">Person Name</th>
                                <th class="th-sm">Address</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?PHP
                            if ($result->num_rows > 0) {
                                // output data of each row
                                while ($row = $result->fetch_assoc()) {
//                                    echo "id: " . $row["id"] . " - Name: " . $row["firstname"] . " " . $row["lastname"] . "<br>";
                                    ?>
                                    <tr>
                                        <td><?PHP echo $row["application_number"]; ?></td>
                                        <td><?PHP echo ucwords($row["applying_for"]); ?></td>
                                        <td><img src='<?PHP echo "../uploads/" . $row["photo"]; ?>' width="50px;" /> <br /><?PHP echo $row["surname"].' '.$row["name"]; ?></td>
                                        <td><?PHP echo $row["dob"]; ?></td>
                                        <td><?PHP echo $row["email"]; ?></td>
                                        <td><?PHP echo $row["phone_number"]; ?></td>
                                        <td><?PHP echo $row["parent_name"]; ?></td>
                                        <td><?PHP echo $row["occupation"]; ?></td>
                                        <td><?PHP echo $row["parent_phone"]; ?></td>
                                        <td><?PHP echo $row["gothram"]; ?></td>
                                        <td><?PHP echo $row["referer"]; ?></td>
                                        <td><?PHP echo $row["referername"]; ?></td>
                                        <td><?PHP echo $row["address"]; ?>, <?PHP echo $row["street"]; ?>,<br /> <?PHP echo $row["city"]; ?>, <?PHP echo $row["state"]; ?> - <?PHP echo $row["pincode"]; ?></td>
                                    </tr> 
                                    <?PHP
                                }
                            } else {
                                echo "0 results";
                            }
                            ?>

                        </tbody>
                        <tfoot>
                            <tr>
                                <th class="th-sm">Reference Number</th>
                                <th class="th-sm">Applied for</th>
                                <th class="th-sm">Name</th>                                                                
                                <th class="th-sm">Date of Birth</th>
                                <th class="th-sm">Email Id</th>
                                <th class="th-sm">Phone Number</th>
                                <th class="th-sm">Father/Guardian Name</th>
                                <th class="th-sm">Occupation</th>
                                <th class="th-sm">Father/Guardian Phone Number</th>
                                <th class="th-sm">Gothram</th>
                                <th class="th-sm">How you now this event?</th>
                                <th class="th-sm">Person Name</th>
                                <th class="th-sm">Address</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<?PHP
include_once '../common/footer.php';
?>
