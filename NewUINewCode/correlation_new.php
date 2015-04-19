<!DOCTYPE html>
<html>
<body>
<?php

// correlation.php

$errors         = array();      // array to hold validation errors
$data           = array();      // array to pass back data
$adata          = array();      // This array contains the data of the all the countries
$c1             = array();
$c2             = array();
$c3             = array();
$c4             = array();
$c5             = array();

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
    echo "Here";
        // if there are items in our errors array, return those errors
    $data['success'] = false;
    $data['errors']  = $errors;

} else {

        // $topic1 = $_POST['topic1'];
        // $topic2 = $_POST['topic2'];
        // $indx = $_POST['indx'];
        // $indy = $_POST['indy'];
        // $country1 = $_POST['country1'];
        // $country2 = $_POST['country2'];
        // $country3 = $_POST['country3'];
        // $country4 = $_POST['country4'];
        // $country5 = $_POST['country5'];
        // $syear = $_POST['syear'];
        // $eyear = $_POST['eyear'];
        // $topic1 = "ENERGY_MINING";
        // $indx = "EG.USE.COMM.FO.ZS";
        // $country1 = "ARM";

        // $syear = "1991";
        // $eyear = "1995";
    // $yearString = "ROUND(Y" . $syear . ", 2)";
    // for($i = $syear+1; $i<=$eyear; $i++)
    // {

    //     $yearString = $yearString . ", ROUND(Y";
    //         $yearString = $yearString .  $i . ", 2)";
}
        // echo $yearString;


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