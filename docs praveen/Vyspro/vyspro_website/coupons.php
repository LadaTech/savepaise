<?PHP
session_start();
$pageTitle = 'Bens';
include_once 'common/functions.php';
$commonfunction = new commonfunction();
$bens = $commonfunction->getBeneficiaryFields();
//echo "<pre>";
//print_r($bens);
?>

<table style="">
    <tr>
        <?PHP
        $i = 0;
        foreach ($bens as $ben) {
            ?>

            <td style="border:1px solid; font-size:15px; width: 350px; padding: 3px; margin-left: 1px;">
                <?PHP
                echo '<img src = "/images/vyspro-emblem.png" width ="75" /> <img src = "/images/vysproindia-logo.png" width ="175" /> <img src = "/images/viflogo.jpeg" width ="75" /> ';
                echo "<br />";
                echo "<hr />";
                echo "<b>Beneficiary Name:</b> <span >" . $ben['application_number'] . ' - ' . $ben['bname'] . ' ' . $ben['blastname'].'</span>';
                echo "<br />";
                echo "<br />";
                echo "<b>LM Name:</b> " . $ben['lifemember'];
                echo "<br />";
                echo "<hr />";
                ?>
                <table>
                    <tr>
                        <td>
                            Rice Bag 
                        </td>
                        <td style="border: 1px solid black; width: 17px;">
                            &nbsp;&nbsp;
                        </td>
                        <td>
                            &nbsp;&nbsp;&nbsp;&nbsp;Groceries
                        </td>
                        <td style="border: 1px solid black; width: 17px;">
                            &nbsp;&nbsp;
                        </td>
                        <td>
                            &nbsp;&nbsp;&nbsp;&nbsp;Oil and others
                        </td>
                        <td style="border: 1px solid black; width: 17px;">
                            &nbsp;&nbsp;
                        </td>
                    </tr>
                </table>
            </td>
            
            <?PHP
            
            $i++;
            if ($i % 2 == 0) {
                echo '</tr>
                        <tr>
                            <td style="margin-top: 0px; margin-left:5px;"> ';

                if ($i % 8 == 0 && $i != 1) {
//                    echo $i;
                    echo "&nbsp;";
                    echo '<p style="page-break-before: always"></p>';
                }
                echo '&nbsp;</td></tr>';
            }else{
                echo '<td style="margin-left: 150px; ">&nbsp;</td>';
            }
        }
        ?>
    </tr>
</table>