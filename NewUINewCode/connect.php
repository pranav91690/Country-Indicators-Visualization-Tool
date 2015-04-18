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
	echo "reaches here";
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
	$countries = oci_parse($conn,"SELECT name from COUNTRY");
	oci_execute($countries);

	$nrows = oci_fetch_all($countries, $res);

	for($x = 0; $x <= $nrows; $x++)
	{	
		echo '<li role="presentation"><a role="menuitem" tabindex="-1" href="#">'.$res["NAME"][$x];
		echo '</a></li>';
	}
}		
?>
</body>
</html>
