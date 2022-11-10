<?php
    //Connecting the header
    require_once("header.php");
/** Error reporting */
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Europe/London');
require_once 'PHPExcel-1.8/Classes/PHPExcel.php';
// getting excel spreadsheet
$excel = PHPExcel_IOFactory::load('pricelist.xls');
Foreach($excel ->getWorksheetIterator() as $worksheet) {
    $lists[] = $worksheet->toArray();
}
foreach($lists as $list){
    echo '<table border="1">';
    // Iterating over lines
    foreach($list as $row){
        echo '<tr>';
        // Looping through columns
        foreach($row as $col){
            echo '<td>'.$col.'</td>';
        }
        echo '</tr>';
    }
    echo '</table>';
}
    //Connecting the footer
    require_once("footer.php");
?>