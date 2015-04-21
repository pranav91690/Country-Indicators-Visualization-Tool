
<?php

// correlation.php

$errors         = array();      // array to hold validation errors
$data           = array();      // array to pass back data
$actualdata     = array();


  
// if there are any errors in our errors array, return a success boolean of false
if ( ! empty($errors)) {
$data['success'] = false;
$data['errors']  = $errors;
} else {
$data['success'] = true;
$data['errors']  = $errors;



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

$query4 = " ( Select count(*) from );
$query4 = " ( Select count(*) from );
$query4 = " ( Select count(*) from );
$query4 = " ( Select count(*) from );
$query4 = " ( Select count(*) from );
$query4 = " ( Select count(*) from );
$query4 = " ( Select count(*) from );
$query4 = " ( Select count(*) from );
$query4 = " ( Select count(*) from );
$query4 = " ( Select count(*) from );
$query4 = " ( Select count(*) from );
$query4 = " ( Select count(*) from );

$query4 = " ( Select count(*) from );
$query4 = " ( Select count(*) from );
$query4 = " ( Select count(*) from );

$values = oci_parse($conn,"$query5");
oci_execute($values);
$cval = array();
$c = 0;
while (($row = oci_fetch_array($values, OCI_BOTH)) != false) {
$ind = array();
$ind['cty']   = $row['SHORT_NAME'];
$ind['area1'] = $row['AREA1'];
$ind['data1'] = $row['DATA1'];
if (isset($row['AREA2'])){$ind['area2'] = $row['AREA2'];}
if (isset($row['DATA2'])){$ind['data2'] = $row['DATA2'];}
if (isset($row['AREA3'])){$ind['area3'] = $row['AREA3'];}
if (isset($row['DATA3'])){$ind['data3'] = $row['DATA3'];}
if (isset($row['AREA4'])){$ind['area4'] = $row['AREA4'];}
if (isset($row['DATA4'])){$ind['data4'] = $row['DATA4'];}
$actualdata[$c] = $ind;

// Limiting to the First 12 Countries  
if ($c == 4){
  break;
}
$c = $c + 1; // Increase the Counter
}

$data['actualdata'] = $actualdata;
    
oci_close($conn);      
}

} 

// return all our data to an AJAX call
echo json_encode($data);
?>
