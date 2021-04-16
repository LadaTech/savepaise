<?php
session_start();
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);
if (!isset($_SESSION['adminusername'])) {
    header("location:/admin/login.php");
    exit;
}
$headerTitle = 'Students';
include_once '../common/logs.php';
include_once '../common/db.php';
include_once '../common/header.php';
unset($_SESSION['search']);
if (isset($_POST)) {
    $_SESSION['search'] = $_POST;
    
    $applicationNumber = $_POST['application_number'];
    $name = $_POST['studentname'];
    $surname = $_POST['studentsurname'];
    $applicationType = $_POST['type'];
    $emailid = $_POST['email'];

    if ($applicationNumber != '') {
        $whereCondition = " and application_number like '$applicationNumber'";
    }
    if ($name != '') {
        $whereCondition .= " and name like '$name'";
    }
    if ($surname != '') {
        $whereCondition .= " and surname like '$surname'";
    }
    if ($applicationType != '') {
        $whereCondition .= " and applying_for like '$applicationType'";
    }
    if ($emailid != '') {
        $whereCondition .= " and email like '$emailid'";
    }
}
if ($_REQUEST["type"] != '') {
    $applicationType = $_REQUEST["type"];
    $whereCondition .= " and applying_for like '$applicationType'";
}
$select = "select * from vb_users where 1=1 and applying_for in ('merit','scholarship') and approval_status !='Duplicate' $whereCondition order by id desc";
$result = $conn->query($select);
?>
<section class="page">  
    <div class="container">
        <h3 style="color: #D70000;">Vyspro-India Vidhya Bharati 2019 Applications</h3>
        <div class="row">     
            <div class="col-md-12 formContainer clearfix">
                <div class="payuform">
                    <h4 style="color: #d70000;">Students details applied</h4>
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
                        <div class="form-group">
                            <label for="studentname">Email ID:</label>
                            <input type="text" class="form-control" id="email" name="email" value="<?PHP
                            if ($_POST["email"] != '') {
                                echo $_POST["email"];
                            }
                            ?>" />
                        </div>
                        <div class="checkbox">
                            <select id="type" name="type" class="form-control">
                                <option value="">Both</option>
                                <option value="merit">Merit</option>
                                <option value="scholarship">Scholarship</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success">Submit</button>
                        <a href="/admin/export.php" class="btn btn-primary pull-right" style="margin:10px 5px;">Excel export</a>
                        
                    </form>
                    <br />

                    <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="th-sm">Reference Number</th>
                                <th class="th-sm">Name</th>                                                                
                                <th class="th-sm">DOB</th>
                                <th class="th-sm">Email Id</th>
                                <th class="th-sm">Father/Guardian Details </th>
                                <th class="th-sm">Gothram</th>
                                <th class="th-sm">Latest class completed</th>
                                <th class="th-sm">Class</th>
                                <th class="th-sm">Total Maximum Marks</th>
                                <th class="th-sm">Total Marks Obtained</th> 
                                <th class="th-sm">Marks Obtained in subject</th>
                                <th class="th-sm">Status</th>
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
                                        <td><a href="/admin/<?PHP echo $row["applying_for"];
                                    ?>status.php?id=<?PHP echo $row["application_number"]; ?>" target="_blank"><?PHP echo $row["application_number"]; ?></a><br /><?PHP echo ucwords($row["applying_for"]); ?></td>
                                        <td><img src='<?PHP echo "../uploads/" . $row["photo"]; ?>' width="50px;" /> <br /><?PHP echo $row["surname"] . ' ' . $row["name"]; ?></td>
                                        <td><?PHP echo $row["dob"]; ?></td>
                                        <td><?PHP echo $row["email"]; ?> <br /><?PHP echo $row["phone_number"]; ?></td>
                                        <td><?PHP echo $row["parent_name"]; ?> <br /> <?PHP echo $row["occupation"]; ?> <br /> <?PHP echo $row["parent_phone"]; ?></td>
                                        <td><?PHP echo $row["gothram"]; ?></td>
                                        <td><?PHP echo $row["latest_class_completed"]; ?> <br /> <?PHP echo $row["month"]; ?> - <?PHP echo $row["year"]; ?></td>
                                        <td><?PHP echo $row["classname"]; ?></td>
                                        <td><?PHP echo $row["totalmarks"]; ?></td>
                                        <td><?PHP echo $row["totalmarksobtained"]; ?></td>
                                        <td><?PHP echo $row["marksinsubject"]; ?></td>
                                        <td><?PHP echo $row["approval_status"]; ?></td>
                                    </tr> 
                                    <?PHP
                                }
                            } else {
                                echo " <tr>
                                        <td colspan='13'>0 results</td></tr>";
                            }
                            ?>

                        </tbody>
                        <tfoot>
                            <tr>
                                <th class="th-sm">Reference Number<br />Applied for</th>
                                <th class="th-sm">Name</th>                                                                
                                <th class="th-sm">DOB</th>
                                <th class="th-sm">Email Id</th>
                                <th class="th-sm">Father/Guardian Details </th>
                                <th class="th-sm">Gothram</th>
                                <th class="th-sm">Latest class completed</th>
                                <th class="th-sm">Class</th>
                                <th class="th-sm">Total Maximum Marks</th>
                                <th class="th-sm">Total Marks Obtained</th> 
                                <th class="th-sm">Marks Obtained in subject</th>
                                <th class="th-sm">Status</th>
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
