<?php
// correlation.php
$errors         = array();      // array to hold validation errors
$data           = array();      // array to pass back data
$actualdata     = array();
$ind = array();

$c1             = array();
$c2             = array();
$c3             = array();
$c4             = array();
$c5             = array();
// validate the variables ======================================================
    // if any of these variables don't exist, add an error to our $errors array
    if (empty($_POST['topic1']))
        $errors['topic1'] = 'Topic is required.';

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

            $data['success'] = true;
            $data['errors']  = $errors;
            
           
            $STATEMENT = oci_parse($conn,"SELECT * from INDICATORS where TOPIC_CODE='$topic1' ");
            oci_execute($STATEMENT);

            while (($row = oci_fetch_array($STATEMENT, OCI_BOTH)) != false) {
                $ind['code'] = $row['CODE'];
                $ind['name'] = $row['NAME'];
                array_push($actualdata, $ind);
            }

            $data['actualdata'] = $actualdata;

            oci_close($conn);
        }

    }
    // return all our data to an AJAX call
    echo json_encode($data);
?>