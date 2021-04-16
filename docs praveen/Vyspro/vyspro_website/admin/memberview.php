<?PHP
include_once '../common/functions.php';
$commonfunction = new commonfunction();
//include_once '../common/db.php';


if (isset($_REQUEST['id']) && $_REQUEST['id'] != '') {
    $id = $_REQUEST['id'];
} else if (isset($_POST)) {
//    echo "<pre>";
//    print_r($_POST);
//    echo "</pre>";
    $id = $_POST['membershipIds'];
    $newid = $_POST['membershipId'];
    $check = $commonfunction->getLifeMembers($newid);
    if (is_array($check) && sizeof($check) >= 1) {
        $message = 'Membership Id already provided to other Member';
    } else {
        $status = $commonfunction->updateMemberStatus($_POST, $id);
    }
//    echo "<pre>";
//    print_r($check);
//    echo "</pre>";
}
//exit;
include_once '../common/adminheader.php';
$memberdetails = $commonfunction->getLifeMembers($id);
$memberid = $id;
$memberdetail = $memberdetails[0];
?>
<div id="fh5co-contact">
    <div class="container">
        <div class="row">
            <div class="col-md-12 animate-box">
                <h3>Member</h3>
                <form action="memberview.php" method="post" id="memberview" name="memberview" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-4 text-center">
                            <input type="hidden" id="membershipIds" name="membershipIds" value="<?PHP echo $memberid; ?>" />
                            <img src="../images/lifemembers/<?PHP echo $memberdetail['photo']; ?>" />
                        </div>
                        <div class="col-md-8">
                            <div class="row form-group">
                                <div class="col-md-4">
                                    <label for="fname">Surname</label> 
                                    <?PHP echo $memberdetail['sur_name']; ?>
                                </div>
                                <div class="col-md-4">
                                    <label for="lname">First Name</label> 
                                    <?PHP echo $memberdetail['firstname']; ?>
                                </div>

                            </div>
                            <div class="row form-group">
                                <div class="col-md-4">
                                    <label for="lname">Last Name</label> 
                                    <?PHP echo $memberdetail['lastname']; ?>
                                </div>
                                <div class="col-md-4">
                                    <label for="email">Email</label> 
                                    <?PHP echo $memberdetail['email_id']; ?>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-4">
                                    <label for="subject">Mobile Number</label> 
                                    <?PHP echo $memberdetail['mobile_number']; ?>
                                </div>
                                <div class="col-md-4">
                                    <label for="subject">Gowtram</label> 
                                    <?PHP echo $memberdetail['gowtram']; ?>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-4">
                                    <label for="email">Father Name</label> 
                                    <?PHP echo $memberdetail['fathername']; ?>
                                </div>
                                <div class="col-md-4">
                                    <label for="email">Date of Birth</label> 
                                    <?PHP echo $memberdetail['date_of_join']; ?>
                                </div>

                            </div>
                            <div class="row form-group">
                                <div class="col-md-4">
                                    <label for="subject">Date of Marriage</label> 
                                    <?PHP echo $memberdetail['date_of_birth']; ?>
                                </div>
                                <div class="col-md-4">
                                    <label for="email">Address line 1</label> 
                                    <?PHP echo $memberdetail['address1']; ?>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-4">
                                    <label for="email">Address line 2</label> 
                                    <?PHP echo $memberdetail['address2']; ?>
                                </div>
                                <div class="col-md-4">
                                    <label for="email">Street Name</label> 
                                    <?PHP echo $memberdetail['street_name']; ?>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-4">
                                    <label for="email">city</label> 
                                    <?PHP echo $memberdetail['city']; ?>
                                </div>

                                <div class="col-md-4">
                                    <label for="email">State</label> 
                                    <?PHP echo $memberdetail['state']; ?>
                                </div>

                            </div>
                            <div class="row form-group">
                                <div class="col-md-4">
                                    <label for="email">Country</label> 
                                    <?PHP echo $memberdetail['country']; ?>
                                </div>
                                <div class="col-md-4">
                                    <label for="subject">Referred by</label> 
                                    <?PHP echo $memberdetail['firstname']; ?>
                                </div>
                            </div>
                            <div class="row form-group">

                                <div class="col-md-4">
                                    <label for="subject">Qualification</label> 
                                    <?PHP echo $memberdetail['qualification']; ?>
                                </div>
                                <div class="col-md-4">
                                    <label for="subject">Profession</label> 
                                    <?PHP echo $memberdetail['profession']; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-4">
                            <label for="subject">Certificate:</label> 
                            <?PHP echo $memberdetail['certificate']; ?>
                        </div>
                        <div class="col-md-4">
                            <label for="subject">Payment Received in:</label> 
                            <?PHP echo $memberdetail['payment_received_by']; ?>
                        </div>
                        <div class="col-md-4">
                            <label for="subject">Comments:</label>
                            <?PHP echo $memberdetail['comments']; ?>
                        </div>


                    </div>
                    <?PHP
                    if ($memberdetail['status'] != "Approved") {
                        ?>
                        <div class="row form-group">
                            <div class="col-md-4">
                                <label for="subject">Staus:</label>
                                <select id="memberstatus" name="memberstatus" class="form-control">
                                    <option value="">--Select--</option>
                                    <option value="Approved">Approved</option>
                                    <option value="Rejected">Rejected</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="subject">Membership ID provided:</label>
                                <input type="text" name="membershipId" id="membershipId" class="form-control" placeholder="Membership ID provided" />
                            </div>

                            <div class="col-md-4">
                                <label for="subject">Comments:</label>
                                <textarea id="comments" name="comments" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Update" class="btn btn-primary">
                        </div>
                        <?PHP
                    } else {
                        ?>
                        <div class="row form-group">
                            <div class="form-group">
                                <label for="subject">Status:</label>
                                <?PHP echo $memberdetail['status']; ?>
                            </div>
                        </div>
                        <?PHP
                    }
                    ?>
                </form>		
            </div>
        </div>

    </div>
</div>
<?PHP
$customJsFooter = '<script src="/js/jquery.validate.min.js?v=1" type="text/javascript"></script>'
        . '<script src="/js/custom.js?v=1" type="text/javascript"></script>';
include_once '../common/adminfooter.php';
?>