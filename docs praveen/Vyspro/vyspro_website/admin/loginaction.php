<?PHP

session_start();
include_once '../common/db.php';
//echo "<pre>";
//session_destroy();
//print_r($_REQUEST);
$username = $conn->real_escape_string($_POST['username']);
$password = $conn->real_escape_string($_POST['password']);
$select = "select * from users where username = '$username' and password = '$password'";
//exit;
$result = $conn->query($select);
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $_SESSION['adminusername'] = $row['username'];
        $_SESSION['adminusertype'] = $row['user_type'];
        $_SESSION['adminfullName'] = $row['name'];
        $_SESSION['adminuserid'] = $row['id'];
    }
//    print_r($_SESSION);
    echo "<script>window.location.href='dashboard.php';</script>";
    exit;
//    header("location: /users.php");
    exit;
} else {
    echo "<script>window.location.href='login.php?e=fail';</script>";
    exit;
}
?>