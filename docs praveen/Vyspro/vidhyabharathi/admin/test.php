<?php

/* * *****EDIT LINES 3-8****** */
include_once '../common/db.php';
$filename = "excelfilename";         //File Name
/* * *****YOU DO NOT NEED TO EDIT ANYTHING BELOW THIS LINE****** */
//create MySQL connection   
$select = "select * from vb_users where 1=1 and applying_for like 'merit'";
$result = $conn->query($select);
$file_ending = "xls";
//header info for browser
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=$filename.xls");
header("Pragma: no-cache");
header("Expires: 0");
/* * *****Start of Formatting for Excel****** */
//define separator (defines columns in excel & tabs in word)
$sep = "\t"; //tabbed character
//start of printing column names as names of MySQL fields
for ($i = 0; $i < $result->num_field; $i++) {
    echo $result -> fetch_field() . "\t";
}
print("\n");
//end of printing column names  
//start while loop to get data
while ($row = $result->fetch_row()) {
    $schema_insert = "";
    for ($j = 0; $j < $result->fetch_fields; $j++) {
        if (!isset($row[$j]))
            $schema_insert .= "NULL" . $sep;
        elseif ($row[$j] != "")
            $schema_insert .= "$row[$j]" . $sep;
        else
            $schema_insert .= "" . $sep;
    }
    $schema_insert = str_replace($sep . "$", "", $schema_insert);
    $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
    $schema_insert .= "\t";
    print(trim($schema_insert));
    print "\n";
}
?>