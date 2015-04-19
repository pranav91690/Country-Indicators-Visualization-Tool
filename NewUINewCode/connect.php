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
            $country1 = "ARM";
            $topic1 = "ENERGY_MINING";
            $syear = "1991";
            $eyear = "1995";   

            $yearString = "ROUND(Y" . $syear . ", 2)";
            for($i = $syear+1; $i<=$eyear; $i++){
                $yearString = $yearString . ", ROUND(Y" .$i .",2)";
            }

            // $query = "SELECT $ICODE $C_CODE $yearString FROM $topic1 
            // WHERE ( I_CODE='$indx' AND I_CODE='$indy') 
            // AND ( C_CODE='$country1' AND C_CODE='$country2' AND C_CODE='$country3' AND C_CODE='$country4' AND C_CODE='$country5')";

// SELECT I_CODE, C_CODE, ROUND(Y1991,2) ,ROUND(Y1992,2), ROUND(Y1993,2), ROUND(Y1994,2), ROUND(Y1995,2) 
//             FROM $topic1 WHERE I_CODE='$indx' AND C_CODE='$country1'")

            $query = "SELECT I_CODE, C_CODE, $yearString FROM $topic1 WHERE I_CODE='$indx' AND C_CODE='$country1'";

            $values = oci_parse($conn, "$query");

            

            oci_execute($values);



            oci_close($conn);
		}
// Close the Oracle connection
oci_close($conn);
        ?>
    </body>
</html>
