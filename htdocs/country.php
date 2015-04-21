<!DOCTYPE html>
<html>
<body>
<?php

$errors         = array();      // array to hold validation errors
$data           = array();      // array to pass back data
$adata          = array();      // This array contains the data of the all the countries
$c1             = array();
$c2             = array();
$c3             = array();
$c4             = array();
$c5             = array();


   if (empty($_POST['topic1']))
        $errors['topic1'] = 'Topic is required.';

// validate the variables ======================================================
    // if any of these variables don't exist, add an error to our $errors array

    // if (empty($_POST['name']))
    //     $errors['name'] = 'Name is required.';

    // if (empty($_POST['email']))
    //     $errors['email'] = 'Email is required.';

    // if (empty($_POST['superheroAlias']))
    //     $errors['superheroAlias'] = 'Superhero alias is required.';

// return a response ===========================================================

    // if there are any errors in our errors array, return a success boolean of false
if ( ! empty($errors)) {
        // if there are items in our errors array, return those errors
    $data['success'] = false;
    $data['errors']  = $errors;

} else {
    

$dbstr1 ="(DESCRIPTION =(ADDRESS = (PROTOCOL = TCP)(HOST = oracle.cise.ufl.edu)(PORT = 1521)) 
    (CONNECT_DATA = 
        (SERVER = DEDICATED) 
        (SERVICE_NAME = orcl) 
        (INSTANCE_NAME = orcl)))"; 
$conn = oci_connect("mayuri", "Poolsweet!", $dbstr1);
if (!$conn) {
    $m = oci_error();
    echo $m['message'], "\n";
    exit;
}
else {

$topic1 = $_POST['topic1'];
    $ind1 = $_POST['ind1'];
    $cond1 = $_POST['cond1'];
    $val1 = $_POST['val1'];
    $topic2 = $_POST['topic2'];
    $ind2 = $_POST['ind2'];
    $cond2 = $_POST['cond2'];
    $val2 = $_POST['val2'];
    $topic3 = $_POST['topic3'];
    $ind3 = $_POST['ind3'];
    $cond3 = $_POST['cond3'];
    $val3 = $_POST['val3'];
    $topic4 = $_POST['topic4'];
    $ind4 = $_POST['ind4'];
    $cond4 = $_POST['cond4'];
    $val4 = $_POST['val4'];
    $syear = $_POST['syear']
    
    $yearString = "Y".$syear;
 
    echo $yearString;

$query = CREATE GLOBAL TEMPORARY TABLE Temp
ON COMMIT DELETE ROWS
AS
Select C_CODE, $yearstring, I_CODE from $topic1 where I_CODE = 'ind1';

if(strcmp($cond1, "Less Than") !== 0) {
    $query . = " and  $yearstring < $val1;"; 

}else if(strcmp($cond1, "Equals") !== 0) {
      $query . = " and  $yearstring = $val1;"; 

}else if(strcmp($cond1, "Less Than Equals") !== 0) {
      $query . = " and  $yearstring <= $val1;"; 
    
}else if(strcmp($cond1, "Greater Than") !== 0) {
      $query . = " and  $yearstring > $val1;"; 
    
}else if(strcmp($cond1, "Greater Than Equals") !== 0) {
      $query . = " and  $yearstring >= $val1;"; 
    
}else if(strcmp($cond1, "Not Equals") !== 0) {
      $query . = " and  $yearstring <> $val1;"; 
    
}

 $values = oci_parse($conn,"$query");
 oci_execute($values);
 


//             $query = "SELECT $ICODE $C_CODE $yearString FROM $topic1 
//             WHERE ( I_CODE='$indx' AND I_CODE='$indy') 
//             AND ( C_CODE='$country1' AND C_CODE='$country2' AND C_CODE='$country3' AND C_CODE='$country4' AND C_CODE='$country5')";

//             $values = oci_parse($conn,"$query");
//             oci_execute($values);


//             while (($row = oci_fetch_array($values, OCI_BOTH)) != false) {
//             // Each iteartion is for a roq

//             // This loop is to access the individual values of the returned columns
//                     switch($row['C_CODE']){
//                         case $country1:
//                             // We break as per the Indicator and then loop and store the value fpr each country
//                             switch($row['I_CODE']){
//                                 // Cathing all the X Values
//                                 case $indx:
//                                     for ($j=0;$j<=$eyear-$syear+2;$j++){
//                                         $c1[$j-2]['x'] = $row[$j];// This puts a value in the year element of the country
//                                     }
//                                     break;
//                                 // Catching all the y values
//                                 case $indy:
//                                     for ($j=0;$j<=$eyear-$syear+2;$j++){
//                                         $c1[$j-2]['y'] = $row[$j];// This puts a value in the year element of the country
//                                     }                                
//                                     break;
//                             }
//                             break;
//                         case $country2:
//                             // We break as per the Indicator and then loop and store the value fpr each country
//                             switch($row['I_CODE']){
//                                 // Cathing all the X Values
//                                 case $indx:
//                                     for ($j=0;$j<=$eyear-$syear+2;$j++){
//                                         $c2[$j-2]['x'] = $row[$j];// This puts a value in the year element of the country
//                                     }
//                                     break;
//                                 // Catching all the y values
//                                 case $indy:
//                                     for ($j=0;$j<=$eyear-$syear+2;$j++){
//                                         $c2[$j-2]['y'] = $row[$j];// This puts a value in the year element of the country
//                                     }                                
//                                     break;
//                             }                        
//                             break;
//                         case $country3:
//                             // We break as per the Indicator and then loop and store the value fpr each country
//                             switch($row['I_CODE']){
//                                 // Cathing all the X Values
//                                 case $indx:
//                                     for ($j=0;$j<=$eyear-$syear+2;$j++){
//                                         $c3[$j-2]['x'] = $row[$j];// This puts a value in the year element of the country
//                                     }
//                                     break;
//                                 // Catching all the y values
//                                 case $indy:
//                                     for ($j=0;$j<=$eyear-$syear+2;$j++){
//                                         $c3[$j-2]['y'] = $row[$j];// This puts a value in the year element of the country
//                                     }                                
//                                     break;
//                             }                       
//                             break;
//                         case $country4:
//                             // We break as per the Indicator and then loop and store the value fpr each country
//                             switch($row['I_CODE']){
//                                 // Cathing all the X Values
//                                 case $indx:
//                                     for ($j=0;$j<=$eyear-$syear+2;$j++){
//                                         $c4[$j-2]['x'] = $row[$j];// This puts a value in the year element of the country
//                                     }
//                                     break;
//                                 // Catching all the y values
//                                 case $indy:
//                                     for ($j=0;$j<=$eyear-$syear+2;$j++){
//                                         $c4[$j-2]['y'] = $row[$j];// This puts a value in the year element of the country
//                                     }                                
//                                     break;
//                             }                       
//                             break;                                                                        
//                         case $country5:
//                             // We break as per the Indicator and then loop and store the value fpr each country
//                             switch($row['I_CODE']){
//                                 // Cathing all the X Values
//                                 case $indx:
//                                     for ($j=0;$j<=$eyear-$syear+2;$j++){
//                                         $c5[$j-2]['x'] = $row[$j];// This puts a value in the year element of the country
//                                     }
//                                     break;
//                                 // Catching all the y values
//                                 case $indy:
//                                     for ($j=0;$j<=$eyear-$syear+2;$j++){
//                                         $c5[$j-2]['y'] = $row[$j];// This puts a value in the year element of the country
//                                     }                                
//                                     break;
//                             }                        
//                             break;
//                     }
}

//             array_push($adata, $c1, $c2, $c3, $c4, $c5);
}      

$data['success'] = true;
$data['errors']  = $errors;
        // $data['adata']   = $adata;
// return all our data to an AJAX call
echo json_encode($data);
?>

</body>
</html>