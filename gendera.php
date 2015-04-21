<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <title>Data | The World Bank</title>

    <style>
    body{
      min-height: 2000px;
      padding-top: 70px;
  }
    .navbar-custom {
    color: #FF0000;
    background-color: black;
}
  </style>
</head>
<body>
    <!-- Fixed Nav Bar -->
    <nav class="navbar navbar-default navbar-fixed-top navbar-custom">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.html">Dbms Project</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                     <li >
                        <a href="index.html" ><font  color="FFFFFF">Home</font></a>
                  
                    </li>
                    <li >
                        <a href="correlationa.php"><font color="FFFFFF">Correlation Analysis </font></a>
                    </li>
                    <li class="active">
                        <a href=""><font color="FFFFFF">Gender Based Analysis</font></a>
                    </li>
                    <li >
                        <a href="countrya.php"><font color="FFFFFF">Country Based Analysis</font></a>
                    </li>
                    
                    <li >
                        <a href='adddata.html'><font color="FFFFFF">Add Data</font></a>
                    </li>
                    <li>
                        <a href='display.php'><font color="FFFFFF">Tuple Count</font></a>
                    </li>  
                     <li >
                        <a href='aboutUs.html'><font color="FFFFFF">About Us</font></a>
                    </li>                   
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <ul class="nav nav-tabs" data-tabs="tabs">
            <li class="active">
                <a data-toggle="tab" href="#correlation" id="correlationtab">
                    Execute
                </a>
            </li>
            <li>
                <a data-toggle="tab" href="#example1" id="example1tab">
                    Example
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade in active" id="correlation">
                <div class="col-md-12">
                    <h2>Gender Based Analysis</h2>
                    <!-- OUR FORM -->
                    <form action="gender.php" method="POST" id="genderform">
                        <div class="row">
                            <!-- Indicator to Compare -->
                            <div id="ind-group" class="form-group">
                                <!-- Topic -->
                                <div class="col-md-4">
                                    <label for="topic">Topic</label>

                                    <select type="text" class="form-control input-medium" onchange="doGo('topic', 'indx')" name="topic" id="topic">

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
$STATEMENT = oci_parse($conn,"SELECT * from TOPICS");
oci_execute($STATEMENT);
echo '<option value="SEL">Select</option>'; 

while( ($res = oci_fetch_array($STATEMENT))) {

echo '<option value="'.$res['CODE']. '"\>' .$res['SHORT_NAME'] . '</option>';                                     
}     }  
?>  
                                    </select>

                                </div>
                                <div class="col-md-6">
                                    <!-- Indicator - Make it Chained -->
                                    <label for="indx">Indicator</label>
                                    <select type="text" class="form-control input-medium" name="indx" id="indx">

                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Country1 -->
                        <div class="row">
                        <div id="country-group" class="form-group col-md-5">
                            <label for="country1">Country1</label>
                            <select type="text" class="form-control" name="country1" id="country1">
<?php

$STATEMENT = oci_parse($conn,"SELECT * from Country order by SHORT_NAME asc" );
oci_execute($STATEMENT);
echo '<option value="SEL">Select</option>'; 

while( ($res = oci_fetch_array($STATEMENT))) {

echo '<option value="'.$res['CODE']. '"\>' .$res['SHORT_NAME'] . '</option>';                                     
}   
?>  

                            </select>  
                            <!-- errors will go here -->
                        </div>

                        <div id="country-group" class="form-group col-md-5">
                            <label for="country2">Country2</label>
                            <select type="text" class="form-control" name="country2" id="country2">
<?php

$STATEMENT = oci_parse($conn,"SELECT * from Country order by SHORT_NAME asc" );
oci_execute($STATEMENT);
echo '<option value="SEL">Select</option>'; 

while( ($res = oci_fetch_array($STATEMENT))) {

echo '<option value="'.$res['CODE']. '"\>' .$res['SHORT_NAME'] . '</option>';                                     
}   
?>  

                             </select>  
                            <!-- errors will go here -->
                        </div>
                        </div>
                        <div class="row">
                        <div id="country-group" class="form-group col-md-5">
                            <label for="country3">Country3</label>
                            <select type="text" class="form-control" name="country3" id="country3">
<?php

$STATEMENT = oci_parse($conn,"SELECT * from Country order by SHORT_NAME asc" );
oci_execute($STATEMENT);
echo '<option value="SEL">Select</option>'; 

while( ($res = oci_fetch_array($STATEMENT))) {

echo '<option value="'.$res['CODE']. '"\>' .$res['SHORT_NAME'] . '</option>';                                     
}   
?>  

                             </select>  
                            <!-- errors will go here -->
                        </div>

                        <div id="country-group" class="form-group col-md-5">
                            <label for="country4">Country4</label>
                            <select type="text" class="form-control" name="country4" id="country4">
<?php

$STATEMENT = oci_parse($conn,"SELECT * from Country order by SHORT_NAME asc" );
oci_execute($STATEMENT);
echo '<option value="SEL">Select</option>'; 

while( ($res = oci_fetch_array($STATEMENT))) {

echo '<option value="'.$res['CODE']. '"\>' .$res['SHORT_NAME'] . '</option>';                                     
}   
?>  

                         </select>  
                            <!-- errors will go here -->
                        </div>
                        </div>

<!--                         <div id="country-group" class="form-group">
                            <label for="country5">Country5</label>
                            <select type="text" class="form-control" name="country5" id="country5">
                            </select> -->
                            <!-- errors will go here -->
                        <!-- </div> -->

                        <div id="year-group" class="form-group">
                            <label for="year">Year</label>
                            <select type="text" class="form-control" name="syear" id="year">
<?php

$STATEMENT = oci_parse($conn,"SELECT * from Year" );
oci_execute($STATEMENT);
echo '<option value="SEL">Select</option>'; 

while( ($res = oci_fetch_array($STATEMENT))) {

echo '<option value="'.$res['CODE']. '"\>' .$res['VALUE'] . '</option>';                                     
}    
?>  

                             </select> 
                            <!-- errors will go here -->
                        </div>
                        <button type="submit" class="btn btn-primary">Submit <span class="fa fa-arrow-right"></span></button>
                    </form>
                </div> 
                <div class="col-md-8" id="ajax"></div>
            </div>
            <div class="tab-pane fade" id="example1">
                <div>This is where the example content will be</div>

                 <video width="800" height="500" controls>
                 <source src="untitled.mov" type="video/mp4">

                </video>
      
        </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

    <script src="gender.js"></script> <!-- load our javascript file -->
    <script src="jquery.chained.js"></script>
    <!-- HighCharts Charting Framework -->
    <script src="http://code.highcharts.com/highcharts.js"></script>
</body>
</html>