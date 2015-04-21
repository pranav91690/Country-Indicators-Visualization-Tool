<html>
<head>
<meta charset="UTF-8">
<title></title>
</head>
<body>
<?php
// Connects to the XE service (i.e. database) on the "localhost" machine
$conn = oci_connect('cshilpa', 'Gelupuneedhe12', 'oracle.cise.ufl.edu:1521/orcl');
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}
else {
        print "Connetion Succesfull";
}
oci_close($conn);
;?>
</body>
</html>