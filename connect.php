<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
$errors         = array();      // array to hold validation errors
$data           = array();      // array to pass back data
$actualdata     = array();
$c1             = array();
$c2             = array();
$c3             = array();
$c4             = array();
$c5             = array();
$wa1            = array();
$wa2            = array();
$wa3            = array();
$wa4            = array();
$wa5            = array();
$wa6            = array();
$wa7            = array();
$wa8            = array();
$wa9            = array();
$wa10            = array();


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
            print "Connected to Oracle!";

//             $indx = "EG.USE.COMM.FO.ZS";
//             $indy = "NE.IMP.GNFS.ZS";
//             $topic2 = "ENG";
//             $topic1 = "ENM";
//             $syear = "1991";
//             $eyear = "1995"; 
//             $country1 = "NOR";
//             $country2 = "RUS";
//             $country3 = "ESP";
//             $country4 = "AUS";
//             $country5 = "DNK";

//             $yearString = "ROUND(Y" . $syear . ", 2)";
//             for($i = $syear+1; $i<$eyear; $i++){
//                 $yearString = $yearString . ", ROUND(Y" .$i . ", 2)" ;
//             }
//             $yearString = $yearString . ", ROUND(Y". $eyear . ", 2)";

//             $query1 = "SELECT * FROM TOPICS WHERE CODE='$topic1' ";
//             $value1 = oci_parse($conn, $query1);
//             oci_execute($value1);
//             while (($row = oci_fetch_array($value1, OCI_BOTH)) != false) {
//                 $table1 = $row['SHORT_NAME'];    
//             }
//             echo $table1;

//             $query2 = "SELECT * FROM TOPICS WHERE CODE='$topic2' ";
//             $value2 = oci_parse($conn, $query2); 
//             oci_execute($value2);
//             while (($row = oci_fetch_array($value2, OCI_BOTH)) != false) {
//                 $table2 = $row['SHORT_NAME'];    
//             }

//             echo $table2;

//             echo $indx;

//             echo $yearString;

// // UNION SELECT I_CODE, C_CODE, $yearString FROM $table2 WHERE
// //             I_CODE='$indy' AND ( C_CODE='$country1' AND C_CODE='$country2' AND
// //             C_CODE='$country3' AND C_CODE='$country4' AND
// //             C_CODE='$country5' ) "

//             // $query3 = "SELECT I_CODE, C_CODE, $yearString FROM $table1 WHERE
//             // I_CODE='$indx' AND ( C_CODE='$country1' AND C_CODE='$country2' AND
//             // C_CODE='$country3' AND C_CODE='$country4' AND C_CODE='$country5' )";

//             $query3 = "SELECT I_CODE, C_CODE, $yearString FROM $table1 WHERE
//             I_CODE='$indx' AND ( C_CODE='$country1' OR C_CODE='$country2' OR
//             C_CODE='$country3' OR C_CODE='$country4' OR C_CODE='$country5' ) 
//             UNION SELECT I_CODE, C_CODE, $yearString FROM $table2 WHERE
//             I_CODE='$indy' AND ( C_CODE='$country1' OR C_CODE='$country2' OR
//             C_CODE='$country3' OR C_CODE='$country4' OR
//             C_CODE='$country5' ) ";

//             $values = oci_parse($conn, $query3);
//             oci_execute($values);

//             while (($row = oci_fetch_array($values, OCI_BOTH)) != false) {
//             // Each iteartion is for a row
//                 echo $row[0]."<br>".$row[1]."<br>".$row[2]."<br>".$row[3]."<br>".$row[4]."<br>".$row[5]."<br>".$row[6]."<br>"."<br>\n";
//             // This loop is to access the individual values of the returned columns
//                     switch($row['C_CODE']){
//                         case $country1:
//                     //         // We break as per the Indicator and then loop and store the value fpr each country
//                             switch($row['I_CODE']){
//                                 // Cathing all the X Values
//                                 case $indx:
//                                     for ($j=2;$j<=$eyear-$syear+2;$j++){
//                                       array_push($wa1, $row[$j]); // Push all the X values into this workarea
//                                     }
//                                     $c1['xind'] = $wa1;
//                                     break;
//                                 // Catching all the y values
//                                 case $indy:
//                                     for ($j=2;$j<=$eyear-$syear+2;$j++){
//                                       array_push($wa2, $row[$j]); // Push all the Y values into this workarea
//                                     }
//                                     $c1['yind'] = $wa2;                                
//                                     break;
//                             }
//                             break;
//                         case $country2:
//                     //         // We break as per the Indicator and then loop and store the value fpr each country
//                             switch($row['I_CODE']){
//                                 // Cathing all the X Values
//                                 case $indx:
//                                     for ($j=2;$j<=$eyear-$syear+2;$j++){
//                                        array_push($wa3, $row[$j]); // Push all the X values into this workarea
//                                     }
//                                     $c2['xind'] = $wa3;
//                                     break;
//                                 // Catching all the y values
//                                 case $indy:
//                                     for ($j=2;$j<=$eyear-$syear+2;$j++){
//                                        array_push($wa4, $row[$j]); // Push all the Y values into this workarea
//                                     }
//                                     $c2['yind'] = $wa4;                                
//                                     break;
//                             }
//                             break;
//                         case $country3:
//                     //         // We break as per the Indicator and then loop and store the value fpr each country
//                             switch($row['I_CODE']){
//                                 // Cathing all the X Values
//                                 case $indx:
//                                     for ($j=2;$j<=$eyear-$syear+2;$j++){
//                                         array_push($wa5, $row[$j]); // Push all the X values into this workarea
//                                     }
//                                     $c3['xind'] = $wa5;
//                                     break;
//                                 // Catching all the y values
//                                 case $indy:
//                                     for ($j=2;$j<=$eyear-$syear+2;$j++){
//                                        array_push($wa6, $row[$j]); // Push all the Y values into this workarea
//                                     }
//                                     $c3['yind'] = $wa6;                                
//                                     break;
//                             }
//                             break;
//                         case $country4:
//                     //         // We break as per the Indicator and then loop and store the value fpr each country
//                             switch($row['I_CODE']){
//                                 // Cathing all the X Values
//                                 case $indx:
//                                     for ($j=2;$j<=$eyear-$syear+2;$j++){
//                                         array_push($wa7, $row[$j]); // Push all the X values into this workarea
//                                     }
//                                     $c4['xind'] = $wa7;
//                                     break;
//                                 // Catching all the y values
//                                 case $indy:
//                                     for ($j=2;$j<=$eyear-$syear+2;$j++){
//                                         array_push($wa8, $row[$j]); // Push all the Y values into this workarea
//                                     }
//                                     $c4['yind'] = $wa8;                                
//                                     break;
//                             }
//                             break;                                                                       
//                         case $country5:
//                     //         // We break as per the Indicator and then loop and store the value fpr each country
//                             switch($row['I_CODE']){
//                                 // Cathing all the X Values
//                                 case $indx:
//                                     for ($j=2;$j<=$eyear-$syear+2;$j++){
//                                         array_push($wa9, $row[$j]); // Push all the X values into this workarea
//                                     }
//                                     $c5['xind'] = $wa9;
//                                     break;
//                                 // Catching all the y values
//                                 case $indy:
//                                     for ($j=2;$j<=$eyear-$syear+2;$j++){
//                                         array_push($wa10, $row[$j]); // Push all the Y values into this workarea
//                                     }
//                                     $c5['yind'] = $wa10;                                
//                                     break;
//                             }
//                             break;
//                     } // End of Country Switch Statement
//             } // End of Whiile Loop

            

//             oci_close($conn);



$topic1 = "CLIMATE_CHANGE";
$topic2 = NULL;
$topic3 = NULL;
$topic4 = NULL;
// $topic2 = "CLIMATE_CHANGE";
// $topic3 = "CLIMATE_CHANGE";
// $topic4 = "CLIMATE_CHANGE";
$ind1   = "SP.URB.TOTL.IN.ZS";
$ind2 = NULL;
$ind3 = NULL;
$ind4 = NULL;
// $ind2   = "NV.AGR.TOTL.ZS";
// $ind3   = "SP.URB.TOTL.IN.ZS";
// $ind4   = "EN.ATM.CO2E.PC";
$cond1  = "ge";
$cond2  = null;
$cond3  = null;
$cond4  = null;
// $cond2  = "ge";
// $cond3  = "ge";
// $cond4  = "ge";
$val1   = floatval(10);
$val2   = null;
$val3   = null;
$val4   = null;
// $val2   = floatval(1);
// $val3   = floatval(10);
// $val4   = floatval(1);
$syear  = "2005";

$yearString = "Y" . $syear;

$set2 = false;
$set3 = false;
$set4 = false;

echo "<br>\n".$set2."<br>\n".$set3."<br>\n".$set4;

// Check if Optional Conditions are Filled:
if ((isset($topic2)) and (isset($ind2)) and (isset($cond2)) and (isset($val2))){
  $set2 = true;
} 
if ((isset($topic3)) and (isset($ind3)) and (isset($cond3)) and (isset($val3))){
  $set3 = true;
} 
if ((isset($topic4)) and (isset($ind4)) and (isset($cond4)) and (isset($val4))){
  $set4 = true;
} 
echo "test before";
echo "<br>\n".$set2."<br>\n".$set3."<br>\n".$set4;
echo "test after";
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


// $yearString = "Y" . $syear;

// $dbstr1 ="(DESCRIPTION =(ADDRESS = (PROTOCOL = TCP)(HOST = oracle.cise.ufl.edu)(PORT = 1521)) 
//         (CONNECT_DATA = 
//             (SERVER = DEDICATED) 
//             (SERVICE_NAME = orcl) 
//             (INSTANCE_NAME = orcl)))"; 
// $conn = oci_connect("mayuri", "Poolsweet!", $dbstr1);
// if (!$conn) {
//     $m = oci_error();
//     echo $m['message'], "\n";
//     exit;
// }
// else {


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

echo "\n".$query5;
// error_log($query5);
$values = oci_parse($conn,"$query5");
oci_execute($values);
$cval = array();
$c = 0;
while (($row = oci_fetch_array($values, OCI_BOTH)) != false) {
$ind = array();
$ind['cty']   = $row['SHORT_NAME'];
$ind['area1'] = $row['AREA1'];
$ind['data1'] = $row['DATA1'];
echo $row['SHORT_NAME'];
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
}//End of If
$c = $c + 1; // Increase the Counter
}// End of WHile

$data['actualdata'] = $actualdata;
}
// Close the Oracle connection
oci_close($conn);
        ?>
    </body>
</html>