
<?php

// correlation.php

$errors         = array();      // array to hold validation errors
$data           = array();      // array to pass back data
$actualdata     = array();


// return a response ===========================================================
// if there are items in our errors array, return those errors
if (empty($_POST['topic1']))
    $errors['topic1'] = 'Topic1 is required.';
if (empty($_POST['ind1']))
    $errors['ind1'] = 'Indicator 1 is required.';
if (empty($_POST['cond1']))
    $errors['cond1'] = 'Condition 1 is required.';
if (empty($_POST['val1']))
    $errors['val1'] = 'Value 1 is required.';
  
// if there are any errors in our errors array, return a success boolean of false
if ( ! empty($errors)) {
$data['success'] = false;
$data['errors']  = $errors;
} else {
$data['success'] = true;
$data['errors']  = $errors;

$topic1 = $_POST['topic1'];
$ind1   = $_POST['ind1'];
$cond1  = $_POST['cond1'];
$val1   = floatval($_POST['val1']);

$ind2 = $_POST['ind2'];
$cond2 = $_POST['cond2'];
$val2 = floatval($_POST['val2']);
$topic3 = $_POST['topic3'];
$ind3 = $_POST['ind3'];
$cond3 = $_POST['cond3'];
$val3 = floatval($_POST['val3']);
$topic4 = $_POST['topic4'];
$ind4 = $_POST['ind4'];
$cond4 = $_POST['cond4'];
$val4 = floatval($_POST['val4']);
$syear = $_POST['syear'];


// Check if Optional Conditions are Filled:
if ((empty($topic2)) or (empty($ind2)) or (empty($cond2)) or (empty($val2))){
  $set2 = false;
} 
if ((empty($topic3)) or (empty($ind3)) or (empty($cond3)) or (empty($val3))){
  $set3 = false;
} 
if ((empty($topic4)) or (empty($ind4)) or (empty($cond4)) or (empty($val4))){
  $set4 = false;
} 


// Hard Coded Values for Testing...
// $topic1 = "CLIMATE_CHANGE";
// $topic2 = "CLIMATE_CHANGE";
// $topic3 = "CLIMATE_CHANGE";
// $topic4 = "CLIMATE_CHANGE";
// $ind1   = "SP.URB.TOTL.IN.ZS";
// $ind2   = "NV.AGR.TOTL.ZS";
// $ind3   = "SP.URB.TOTL.IN.ZS";
// $ind4   = "EN.ATM.CO2E.PC";
// $cond1  = "ge";
// $cond2  = "ge";
// $cond3  = "ge";
// $cond4  = "ge";
// $val1   = floatval(10);
// $val2   = floatval(1);
// $val3   = floatval(10);
// $val4   = floatval(1);
// $syear  = "2005";


$yearString = "Y" . $syear;

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


$query1 = " ( Select C_CODE, $yearString as data1, I_CODE as area1 from $topic1 where I_CODE = '$ind1' ";

if(strcmp($cond1, "lt") == 0) {
  $query1 .= " and  $yearString < '$val1' ) T1 "; 

} else if(strcmp($cond1, "eq") == 0) {
  $query1 .= " and  $yearString = '$val1' ) T1 "; 

} else if(strcmp($cond1, "le") == 0) {
  $query1 .= " and  $yearString <= '$val1' ) T1 "; 

} else if(strcmp($cond1, "gt") == 0) {
  $query1 .= " and  $yearString > '$val1' ) T1 "; 

} else if(strcmp($cond1, "ge") == 0) {
  $query1 .= " and  $yearString >= '$val1' ) T1 "; 

} else if(strcmp($cond1, "ne") == 0) {
  $query1 .= " and  $yearString <> '$val1' ) T1 "; 

}

if($set2){
$query2 = " ( Select C_CODE, $yearString as data2, I_CODE as area2 from $topic2 where I_CODE = '$ind2' ";

if(strcmp($cond2, "lt") == 0) {
  $query2 .= " and  $yearString < '$val2' ) T2 "; 

} else if(strcmp($cond2, "eq") == 0) {
  $query2 .= " and  $yearString = '$val2' ) T2 "; 

} else if(strcmp($cond2, "le") == 0) {
  $query2 .= " and  $yearString <= '$val2' ) T2 "; 

} else if(strcmp($cond2, "gt") == 0) {
  $query2 .= " and  $yearString > '$val2' ) T2 "; 

} else if(strcmp($cond2, "ge") == 0) {
  $query2 .= " and  $yearString >= '$val2' ) T2 "; 

} else if(strcmp($cond2, "ne") == 0) {
  $query2 .= " and  $yearString <> '$val2' ) T2 "; 
}
}
if($set3){
$query3 = " ( Select C_CODE, $yearString as data3, I_CODE as area3 from $topic3 where I_CODE = '$ind3' ";

if(strcmp($cond3, "lt") == 0) {
  $query3 .= " and  $yearString < '$val3' ) T3 "; 

} else if(strcmp($cond3, "eq") == 0) {
  $query3 .= " and  $yearString = '$val3' ) T3 "; 

} else if(strcmp($cond3, "le") == 0) {
  $query3 .= " and  $yearString <= '$val3' ) T3 "; 

} else if(strcmp($cond3, "gt") == 0) {
  $query3 .= " and  $yearString > '$val3' ) T3 "; 

} else if(strcmp($cond3, "ge") == 0) {
  $query3 .= " and  $yearString >= '$val3' ) T3 "; 

} else if(strcmp($cond3, "ne") == 0) {
  $query3 .= " and  $yearString <> '$val3' ) T3 "; 
}
}
if($set4){
$query4 = " ( Select C_CODE, $yearString as data4, I_CODE as area4 from $topic3 where I_CODE = '$ind3' ";

if(strcmp($cond4, "lt") == 0) {
        $query4 .= " and  $yearString < '$val4' ) T4 "; 

} else if(strcmp($cond4, "eq") == 0) {
  $query4 .= " and  $yearString = '$val4'  ) T4 "; 

} else if(strcmp($cond4, "le") == 0) {
  $query4 .= " and  $yearString <= '$val4'  ) T4 "; 

} else if(strcmp($cond4, "gt") == 0) {
  $query4 .= " and  $yearString > '$val4'  ) T4 "; 

} else if(strcmp($cond4, "ge") == 0) {
  $query4 .= " and  $yearString >= '$val4'  ) T4 "; 

} else if(strcmp($cond4, "ne") == 0) {
  $query4 .= " and  $yearString <> '$val4'  ) T4 "; 
}
} // End of IF Query

$query5 = "select * from (" . $query1;
if($set2){
  $query5 = $query5 . "JOIN" . $query2 . "ON T1.C_CODE = T2.C_CODE "; 
}  
if($set3){
  $query5 = $query5 . "JOIN" . $query3 . "ON T1.C_CODE = T3.C_CODE ";
}
if($set4){ 
  $query5 = $query5 . "JOIN" . $query4 . "ON T1.C_CODE = T4.C_CODE ";
}
$query5 = $query5  . "JOIN (select CODE,SHORT_NAME  from Country) Cty on T1.C_CODE = Cty.CODE)"  ;


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
