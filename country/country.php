
<?php

// correlation.php

$errors         = array();      // array to hold validation errors
$data           = array();      // array to pass back data
$actualdata     = array();
$ind = array();

// return a response ===========================================================

    // if there are any errors in our errors array, return a success boolean of false
if ( ! empty($errors)) {
        // if there are items in our errors array, return those errors
    $data['success'] = false;
    $data['errors']  = $errors;

} else {
    $topic1 = $_POST['topic1'];
    $ind1 = $_POST['ind1'];
    $cond1 = $_POST['cond1'];
    $val1 = floatval($_POST['val1']);
    $topic2 = $_POST['topic2'];
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

// query to join all above 4 sub queries.
/*  For EX
select * from ( 
( Select C_CODE, Y2009 as data1, I_CODE as area1 from FINANCIAL_SECTOR where I_CODE = 'FB.BNK.CAPA.ZS'  and  Y2009 < '50' ) T1 
JOIN 
( Select C_CODE, Y2009 as data2, I_CODE as area1 from EDUCATION where I_CODE = 'SE.XPD.TOTL.GD.ZS'  and  Y2009 < '56' ) T2 
ON 
T1.C_CODE = T2.C_CODE 
JOIN 
( Select C_CODE, Y2009 as data3, I_CODE as area3 from AGRICULTURE_RURAL_DVP where I_CODE = 'AG.LND.IRIG.AG.ZS'  and  Y2009 < '50' ) T3
ON T1.C_CODE= T3.C_CODE 
JOIN 
( Select C_CODE, Y2009 as data4, I_CODE as area4 from AGRICULTURE_RURAL_DVP where I_CODE = 'AG.LND.IRIG.AG.ZS'  and  Y2009 < '50' ) T4
ON T1.C_CODE= T4.C_CODE );

*/


$query5 = "select * from ("
   . $query1 . "JOIN" . $query2 ."ON T1.C_CODE = T2.C_CODE " . 
   "JOIN" . $query3 . "ON T1.C_CODE= T3.C_CODE" 
   . " JOIN" . $query4 . "ON T1.C_CODE= T4.C_CODE "  ."JOIN (select CODE,SHORT_NAME  from Country) Cty
 on T1.C_CODE = cty.CODE
 )"  ;

// error_log($query5);
$values = oci_parse($conn,"$query5");
oci_execute($values);

            while (($row = oci_fetch_array($values, OCI_BOTH)) != false) {
                $ind['cty'] = $row['C_CODE'];
                $ind['area1'] = $row['AREA1'];
                $ind['data1'] = $row['DATA1'];
                $ind['area2'] = $row['AREA2'];
                $ind['data2'] = $row['DATA2'];
                $ind['area3'] = $row['AREA3'];
                $ind['data3'] = $row['DATA3'];
                $ind['area4'] = $row['AREA4'];
                $ind['data4'] = $row['DATA4'];
                $ind['cty'] = $row['SHORT_NAME'];
                array_push($actualdata, $ind);
            }

            $data['actualdata'] = $actualdata;

oci_close($conn);      
}

} 

// return all our data to an AJAX call
echo json_encode($data);
?>
