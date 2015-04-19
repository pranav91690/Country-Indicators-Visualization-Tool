<?php
// correlation.php
$errors         = array();      // array to hold validation errors
$data           = array();      // array to pass back data
$actualdata     = array();

$c1             = array();
$c2             = array();
$c3             = array();
$c4             = array();
$c5             = array();
// validate the variables ======================================================
    // if any of these variables don't exist, add an error to our $errors array
    if (empty($_POST['topic1']))
        $errors['topic1'] = 'Topic1 is required.';
    if (empty($_POST['topic2']))
        $errors['topic2'] = 'Topic2 is required.';
    if (empty($_POST['indx']))
        $errors['indx'] = 'Indicator X is required.';
    if (empty($_POST['indy']))
        $errors['indy'] = 'Indicator Y is required.';
    if (empty($_POST['country1']))
        $errors['country1'] = 'Country1 is required.';
    if (empty($_POST['country1']))
        $errors['country2'] = 'Country2 is required.';
    if (empty($_POST['country1']))
        $errors['country3'] = 'Country3 is required.';
    if (empty($_POST['country1']))
        $errors['country4'] = 'Country4 is required.';
    if (empty($_POST['country1']))
        $errors['country5'] = 'Country5 is required.';
    if (empty($_POST['syear']))
        $errors['syear'] = 'Start Year is required.';
    if (empty($_POST['eyear']))
        $errors['eyear'] = 'End Year is required.';
// return a response ===========================================================
    // if there are any errors in our errors array, return a success boolean of false
    if ( ! empty($errors)) {
        // if there are items in our errors array, return those errors
        $data['success'] = false;
        $data['errors']  = $errors;
    } else {

        // if there are no errors process our form, then return a message


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
            $topic2 = $_POST['topic2'];
            $indx = $_POST['indx'];
            $indy = $_POST['indy'];
            $country1 = $_POST['country1'];
            $country2 = $_POST['country2'];
            $country3 = $_POST['country3'];
            $country4 = $_POST['country4'];
            $country5 = $_POST['country5'];
            $syear = $_POST['syear'];
            $eyear = $_POST['eyear'];

            $data['success'] = true;
            $data['errors']  = $errors;
            

            // Hard Coded Data

            // $indx = "EG.USE.COMM.FO.ZS";
            // $country1 = "ARM";
            // $topic1 = "ENERGY_MINING";
            // $syear = "1991";
            // $eyear = "1995";   

            $yearString = "ROUND(Y" . $syear . ", 2)";
            for($i = $syear+1; $i<=$eyear; $i++){
                $yearString = $yearString . ", ROUND(Y";
            }

            $query = "SELECT SHORT_NAME FROM TOPICS WHERE CODE='$topic1'";
            $value1 = oci_parse($conn, '$query');
            while (($row = oci_fetch_array($value1, OCI_BOTH)) != false) {
                $actualdata['table1'] = $row['SHORT_NAME'];    
            }

            // $query = "SELECT SHORT_NAME FROM TOPICS WHERE CODE='$topic2';";
            // $value2 = oci_parse($conn, '$query'); 
            // while (($row = oci_fetch_array($value2, OCI_BOTH)) != false) {
            //     $actualdata['table2'] = $row['SHORT_NAME'];    
            // }
            
            $data['actualdata']  = $actualdata;

            //while (($row = oci_fetch_array($value1, OCI_BOTH)) != false) {
            // The Actual SQL Query
            // $query = "SELECT I_CODE, C_CODE, $yearString FROM $topic1 WHERE
            // I_CODE='$indx'AND ( C_CODE='$country1' AND C_CODE='$country2' AND
            // C_CODE='$country3' AND C_CODE='$country4' AND C_CODE='$country5')
            // UNION SELECT I_CODE, C_CODE, $yearString FROM $topic2 WHERE
            // I_CODE='$indy'AND ( C_CODE='$country1' AND C_CODE='$country2' AND
            // C_CODE='$country3' AND C_CODE='$country4' AND
            // C_CODE='$country5')";

            

            // $values = oci_parse($conn, '$query');
            // oci_execute($values);



            oci_close($conn);
        }
        // DO ALL YOUR FORM PROCESSING HERE
        // THIS CAN BE WHATEVER YOU WANT TO DO (LOGIN, SAVE, UPDATE, WHATEVER)
        // show a message of success and provide a true success variable
    }
    // return all our data to an AJAX call
    echo json_encode($data);
?>