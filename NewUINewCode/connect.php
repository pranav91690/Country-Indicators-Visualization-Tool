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

            $indx = "EG.USE.COMM.FO.ZS";
            $indy = "NE.IMP.GNFS.ZS";
            $topic2 = "ENG";
            $topic1 = "ENM";
            $syear = "1991";
            $eyear = "1995"; 
            $country1 = "NOR";
            $country2 = "RUS";
            $country3 = "ESP";
            $country4 = "AUS";
            $country5 = "DNK";

            $yearString = "ROUND(Y" . $syear . ", 2)";
            for($i = $syear+1; $i<$eyear; $i++){
                $yearString = $yearString . ", ROUND(Y" .$i . ", 2)" ;
            }
            $yearString = $yearString . ", ROUND(Y". $eyear . ", 2)";

            $query1 = "SELECT * FROM TOPICS WHERE CODE='$topic1' ";
            $value1 = oci_parse($conn, $query1);
            oci_execute($value1);
            while (($row = oci_fetch_array($value1, OCI_BOTH)) != false) {
                $table1 = $row['SHORT_NAME'];    
            }
            echo $table1;

            $query2 = "SELECT * FROM TOPICS WHERE CODE='$topic2' ";
            $value2 = oci_parse($conn, $query2); 
            oci_execute($value2);
            while (($row = oci_fetch_array($value2, OCI_BOTH)) != false) {
                $table2 = $row['SHORT_NAME'];    
            }

            echo $table2;

            echo $indx;

            echo $yearString;

// UNION SELECT I_CODE, C_CODE, $yearString FROM $table2 WHERE
//             I_CODE='$indy' AND ( C_CODE='$country1' AND C_CODE='$country2' AND
//             C_CODE='$country3' AND C_CODE='$country4' AND
//             C_CODE='$country5' ) "

            // $query3 = "SELECT I_CODE, C_CODE, $yearString FROM $table1 WHERE
            // I_CODE='$indx' AND ( C_CODE='$country1' AND C_CODE='$country2' AND
            // C_CODE='$country3' AND C_CODE='$country4' AND C_CODE='$country5' )";

            $query3 = "SELECT I_CODE, C_CODE, $yearString FROM $table1 WHERE
            I_CODE='$indx' AND ( C_CODE='$country1' OR C_CODE='$country2' OR
            C_CODE='$country3' OR C_CODE='$country4' OR C_CODE='$country5' ) 
            UNION SELECT I_CODE, C_CODE, $yearString FROM $table2 WHERE
            I_CODE='$indy' AND ( C_CODE='$country1' OR C_CODE='$country2' OR
            C_CODE='$country3' OR C_CODE='$country4' OR
            C_CODE='$country5' ) ";

            $values = oci_parse($conn, $query3);
            oci_execute($values);

            while (($row = oci_fetch_array($values, OCI_BOTH)) != false) {
            // Each iteartion is for a row
                echo $row[0]."<br>".$row[1]."<br>".$row[2]."<br>".$row[3]."<br>".$row[4]."<br>".$row[5]."<br>".$row[6]."<br>"."<br>\n";
            // This loop is to access the individual values of the returned columns
                    switch($row['C_CODE']){
                        case $country1:
                    //         // We break as per the Indicator and then loop and store the value fpr each country
                            switch($row['I_CODE']){
                                // Cathing all the X Values
                                case $indx:
                                    for ($j=2;$j<=$eyear-$syear+2;$j++){
                                      array_push($wa1, $row[$j]); // Push all the X values into this workarea
                                    }
                                    $c1['xind'] = $wa1;
                                    break;
                                // Catching all the y values
                                case $indy:
                                    for ($j=2;$j<=$eyear-$syear+2;$j++){
                                      array_push($wa2, $row[$j]); // Push all the Y values into this workarea
                                    }
                                    $c1['yind'] = $wa2;                                
                                    break;
                            }
                            break;
                        case $country2:
                    //         // We break as per the Indicator and then loop and store the value fpr each country
                            switch($row['I_CODE']){
                                // Cathing all the X Values
                                case $indx:
                                    for ($j=2;$j<=$eyear-$syear+2;$j++){
                                       array_push($wa3, $row[$j]); // Push all the X values into this workarea
                                    }
                                    $c2['xind'] = $wa3;
                                    break;
                                // Catching all the y values
                                case $indy:
                                    for ($j=2;$j<=$eyear-$syear+2;$j++){
                                       array_push($wa4, $row[$j]); // Push all the Y values into this workarea
                                    }
                                    $c2['yind'] = $wa4;                                
                                    break;
                            }
                            break;
                        case $country3:
                    //         // We break as per the Indicator and then loop and store the value fpr each country
                            switch($row['I_CODE']){
                                // Cathing all the X Values
                                case $indx:
                                    for ($j=2;$j<=$eyear-$syear+2;$j++){
                                        array_push($wa5, $row[$j]); // Push all the X values into this workarea
                                    }
                                    $c3['xind'] = $wa5;
                                    break;
                                // Catching all the y values
                                case $indy:
                                    for ($j=2;$j<=$eyear-$syear+2;$j++){
                                       array_push($wa6, $row[$j]); // Push all the Y values into this workarea
                                    }
                                    $c3['yind'] = $wa6;                                
                                    break;
                            }
                            break;
                        case $country4:
                    //         // We break as per the Indicator and then loop and store the value fpr each country
                            switch($row['I_CODE']){
                                // Cathing all the X Values
                                case $indx:
                                    for ($j=2;$j<=$eyear-$syear+2;$j++){
                                        array_push($wa7, $row[$j]); // Push all the X values into this workarea
                                    }
                                    $c4['xind'] = $wa7;
                                    break;
                                // Catching all the y values
                                case $indy:
                                    for ($j=2;$j<=$eyear-$syear+2;$j++){
                                        array_push($wa8, $row[$j]); // Push all the Y values into this workarea
                                    }
                                    $c4['yind'] = $wa8;                                
                                    break;
                            }
                            break;                                                                       
                        case $country5:
                    //         // We break as per the Indicator and then loop and store the value fpr each country
                            switch($row['I_CODE']){
                                // Cathing all the X Values
                                case $indx:
                                    for ($j=2;$j<=$eyear-$syear+2;$j++){
                                        array_push($wa9, $row[$j]); // Push all the X values into this workarea
                                    }
                                    $c5['xind'] = $wa9;
                                    break;
                                // Catching all the y values
                                case $indy:
                                    for ($j=2;$j<=$eyear-$syear+2;$j++){
                                        array_push($wa10, $row[$j]); // Push all the Y values into this workarea
                                    }
                                    $c5['yind'] = $wa10;                                
                                    break;
                            }
                            break;
                    } // End of Country Switch Statement
            } // End of Whiile Loop

            

            oci_close($conn);
		}
// Close the Oracle connection
oci_close($conn);
        ?>
    </body>
</html>
