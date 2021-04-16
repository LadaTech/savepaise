<?PHP
session_start();
session_destroy();
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);
$headerTitle = 'APPLICATION FOR MERIT AWARD / SCHOLARSHIP ';
include_once 'common/header.php';
if ($_REQUEST['a'] == 'merit') {
    require_once 'meritpdf.php';
    $thanksTitle = "Thank you for Submitting Merit Award Application";
    $headertext = "VYSPRO-INDIA APPLICATION FOR MERIT AWARD";
} else if ($_REQUEST['a'] == 'both') {
    $thanksTitle = "Thank you for Submitting Merit Award Application & Scholorship";
} else if ($_REQUEST['a'] == 'scholarship') {
    require_once 'scholarshippdf.php';
    $thanksTitle = "Thank you for Submitting scholarship Application";
    $headertext = "VYSPRO-INDIA APPLICATION FOR SCHOLARSHIP";
}
?>
<style type="text/css">
    li{
        margin-left: 30px;
    }
</style>
<section class="page">  
    <div class="container">
        <h3 style="color: #D70000;"><?php echo $headertext; ?></h3>
        <div class="row formContainer"> 
            <div  style="font-size: 16px; "><?PHP echo $thanksTitle; ?><br />
                Your Application reference no. <span style="font-weight:bold;color:#D70000;"><?PHP echo $_REQUEST['id']; ?></span>  and please keep for your future reference. 
                <!--The application form filled by you has been sent to your email id, as provided by you.--> 
                Kindly send the downloaded copy of the application along with the following documents, duly attested, to the undermentioned address:
            </div>
            <br />
            <p>Please download the application here <a target="_blank" href="/pdf/<?PHP echo $_REQUEST['id'];?>.pdf"><img src="/images/pdf.png" /></a>
            <ul>
                <li>Signed copy of the application</li>
                <li>Address Proof</li>     
                <li>Latest passport size photo</li>
                <?PHP
                if ($_REQUEST['a'] == 'merit') {
                    ?>
                    <li>Copy of Marks List Duly Attested by School / College Principal / any Office bearer of Vyspro organisation with stamp</li>
                    <?PHP
                } else {
                    ?>
                    <li>Duly attested Latest Marks list</li>
                    <li>Proof of studying Professional course</li>
                    <li>Parent / Guardian income Proof</li>
                    <?PHP
                }
                ?>
                <br />
                <br />
                <h6>Please send the above documents to the Project Chairman Address given below:</h6><br />
                <p style="font-weight: bold; padding-left: 40px">CA Ramesh Babu Kollipara,<br />
                    Flat No. 101, Kolan Laxmi Nivas,<br />
                    Motinagar Extension Road,<br />
                    Opp. Chinnari Kids Play School Road,<br />
                    Motinagar,<br />
                    Hyderabad - 500 018.<br /><br />Phone Number: 970 191 1117</p>
            </ul>
            </p>
        </div>
    </div>
</section>
<?PHP
include_once 'common/footer.php';
?>