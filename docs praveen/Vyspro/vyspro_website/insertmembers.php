<?php

include_once 'common/db.php';
require_once('common/spreadsheet-reader-master/php-excel-reader/excel_reader2.php');
require_once('common/spreadsheet-reader-master/SpreadsheetReader.php');
echo "<pre>";
$allowedFileType = ['application/vnd.ms-excel', 'text/xls', 'text/xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
print_r($allowedFileType);

if (in_array('text/xls', $allowedFileType)) {

    $targetPath = 'uploads/MembersList.xls';
//      $targetPath = 'uploads/book3.xlsx';

    $Readers = new SpreadsheetReader($targetPath);

    $sheetCount = count($Readers->sheets());

    for ($i = 0; $i < $sheetCount; $i++) {
        $Readers->ChangeSheet($i);

        foreach ($Readers as $Row) {
            print_r($Readers);

            $name = "";
            if (isset($Row[0])) {
                $name = mysqli_real_escape_string($conn, $Row[0]);
            }

            $description = "";
            if (isset($Row[1])) {
                $description = mysqli_real_escape_string($conn, $Row[1]);
            }

            if (!empty($name) || !empty($description)) {
                $query = "insert into tbl_info(name,description) values('" . $name . "','" . $description . "')";
                $result = mysqli_query($conn, $query);

                if (!empty($result)) {
                    $type = "success";
                    $message = "Excel Data Imported into the Database";
                } else {
                    $type = "error";
                    $message = "Problem in Importing Excel Data";
                }
            }
        }
    }
} else {
    $type = "error";
    $message = "Invalid File Type. Upload Excel File.";
}
?>