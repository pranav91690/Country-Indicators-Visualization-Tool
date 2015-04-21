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

    <title>Look I'm AJAXing!</title>

    <style>
    body{
      min-height: 2000px;
      padding-top: 70px;
  }
  </style>
</head>
<body>
    <!-- Fixed Nav Bar -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.html">Dbms Project</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index.html">Home</a>
                    </li>
                    <li>
                        <a href="correlation.html">Correlation Analysis</a>
                    </li>
                    <li>
                        <a href="gender.html">Gender Based Analysis</a>
                    </li>
                    <li class="active">
                        <a href="">Country Based Analysis</a>
                    </li>
                    <li>
                        <a href='group.html'>Group Based Analysis</a>
                    </li>
                    <li>
                        <a href='adddata.html'>Add Data</a>
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
                <div class="col-md-8 col-md-offset-2">
                    <h2>Country Based Analysis</h2>
                    <!-- OUR FORM -->

                    <form action="country.php" method="POST" id="countryform" name="myform">
                         <div id="errorMsg"></div>
                        <div class="row">
                            <!-- Indicator to Compare -->
                            <div id="ind-group" class="form-group">
                                <!-- Topic -->
                                <div class="col-md-4">

                                    <label for="topic1">Please select Topic</label>
                                    <select type="text" onchange="doGo('topic1', 'ind1')" class="form-control input-medium" name="topic1" id="topic1">
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
                                <div class="col-md-4">
                                    <!-- Indicator - Make it Chained -->
                                    <label for="ind1">Indicator</label>
                                    <select type="text" class="form-control input-medium" name="ind1" id="ind1">

                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label for="cond1">Condition</label>
                                    <select type="text" class="form-control input-medium" name="cond1" id="cond1">
                                        <option value="eq">Equals</option>
                                        <option value="lt">Less Than</option>
                                        <option value="le">Less Than Equals</option>
                                        <option value="gt">Greater Than</option>
                                        <option value="ge">Greater Than Equals</option>
                                        <option value="ne">Not Equals</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label for="value1">Value</label>
                                    <input type="text" class="form-control" name="value1" id="value1">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div id="ind-group" class="form-group">
                                <!-- Topic -->
                                <div class="col-md-4">
                                    <label for="topic2">Please select Topic</label>
                                    <select type="text" onchange="doGo('topic2', 'ind2')" class="form-control input-medium" name="topic2" id="topic2">
                                <?php
                                 oci_execute($STATEMENT);
                                 echo '<option value="SEL">Select</option>'; 
                                while( ($res = oci_fetch_array($STATEMENT)) != false) {
                                 
                                 echo '<option value="'.$res['CODE']. '"\>' .$res['SHORT_NAME'] . '</option>';                                     
                                            }     
                                            ?>  
                                    </select>

                                </div>
                                <div class="col-md-4">
                                    <!-- Indicator - Make it Chained -->
                                    <label for="ind2">Indicator</label>
                                    <select type="text" class="form-control input-medium" name="ind2" id="ind2">

                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label for="cond2">Condition</label>
                                    <select type="text" class="form-control input-medium" name="cond2" id="cond2">
                                        <option value="eq">Equals</option>
                                        <option value="lt">Less Than</option>
                                        <option value="le">Less Than Equals</option>
                                        <option value="gt">Greater Than</option>
                                        <option value="ge">Greater Than Equals</option>
                                        <option value="ne">Not Equals</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label for="value2">Value</label>
                                    <input type="text" class="form-control" name="value2" id="value2">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div id="ind-group" class="form-group">
                                <!-- Topic -->
                                <div class="col-md-4">
                                    <label for="topic3">Please select Topic</label>
                                    <select type="text" onchange="doGo('topic3', 'ind3')" class="form-control input-medium" name="topic3" id="topic3">
                                         <?php
                                          oci_execute($STATEMENT);
                                          echo '<option value="SEL">Select</option>'; 
                                while( ($res = oci_fetch_array($STATEMENT)) != false) {
                                 
                                 echo '<option value="'.$res['CODE']. '"\>' .$res['SHORT_NAME'] . '</option>';                                     
                                            }      
                                            ?>  
                                    </select>

                                </div>
                                <div class="col-md-4">
                                    <!-- Indicator - Make it Chained -->
                                    <label for="ind3">Indicator</label>
                                    <select type="text" class="form-control input-medium" name="ind3" id="ind3">

                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label for="cond3">Condition</label>
                                    <select type="text" class="form-control input-medium" name="cond3" id="cond3">
                                        <option value="eq">Equals</option>
                                        <option value="lt">Less Than</option>
                                        <option value="le">Less Than Equals</option>
                                        <option value="gt">Greater Than</option>
                                        <option value="ge">Greater Than Equals</option>
                                        <option value="ne">Not Equals</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label for="value3">Value</label>
                                    <input type="text" class="form-control" name="value3" id="value3">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div id="ind-group" class="form-group">
                                <!-- Topic -->
                                <div class="col-md-4">
                                    <label for="topic4">Please select Topic</label>
                                    <select type="text" onchange="doGo('topic4', 'ind4')" class="form-control input-medium" name="topic4" id="topic4">
                                         <?php
                                          oci_execute($STATEMENT);
                                          echo '<option value="SEL">Select</option>'; 
                               while( ($res = oci_fetch_array($STATEMENT)) != false) {
                                 
                                 echo '<option value="'.$res['CODE']. '"\>' .$res['SHORT_NAME'] . '</option>';                                     
                                            }      
                                            ?>  

                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <!-- Indicator - Make it Chained -->
                                    <label for="ind4">Indicator</label>
                                    <select type="text" class="form-control input-medium" name="ind4" id="ind4">

                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label for="cond4">Condition</label>
                                    <select type="text" class="form-control input-medium" name="cond4" id="cond4">
                                        <option value="eq">Equals</option>
                                        <option value="lt">Less Than</option>
                                        <option value="le">Less Than Equals</option>
                                        <option value="gt">Greater Than</option>
                                        <option value="ge">Greater Than Equals</option>
                                        <option value="ne">Not Equals</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label for="value4">Value</label>
                                    <input type="text" class="form-control" name="value4" id="value4">
                                </div>
                            </div>
                        </div>

                        <div id="year-group" class="form-group">
                            <label for="year">Year</label>
                            <select type="text" class="form-control" name="syear" id="year">
                                <option value="1995">1995</option>
                                <option value="1996">1996</option>
                                <option value="1997">1997</option>
                                <option value="1998">1998</option>
                                <option value="1999">1999</option>
                                <option value="2000">2000</option>
                                <option value="2001">2001</option>
                                <option value="2002">2002</option>
                                <option value="2003">2003</option>
                                <option value="2004">2004</option>
                                <option value="2005">2005</option>
                                <option value="2006">2006</option>
                                <option value="2007">2007</option>
                                <option value="2008">2008</option>
                                <option value="2009">2009</option>
                                <option value="2010">2010</option>
                                <option value="2011">2011</option>
                                <option value="2012">2012</option>
                                <option value="2013">2013</option>
                                <option value="2014">2014</option>
                                <option value="2015">2015</option>                       
                            </select>
                            <!-- errors will go here -->
                        </div>
                        <button type="submit" class="btn btn-success" >Submit <span class="fa fa-arrow-right"></span></button>

                    </form>
                </div> 
                <div class="row">
                    <div class="col-md-4 col-md-offset-2" id="inddiv1"></div>
                    <div class="col-md-4 col-md-offset-2" id="inddiv2"></div>
                </div>

                <div class="row">
                    <div class="col-md-4 col-md-offset-2" id="inddiv3"></div>
                    <div class="col-md-4 col-md-offset-2" id="inddiv4"></div>
                </div>

            </div>
            <div class="tab-pane fade" id="example1">
                <div>This is where the example content will be</div>
            </div>
        </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

    <script src="country.js"></script> <!-- load our javascript file -->
     <script src="populate.js"></script> <!-- load our javascript file -->
    <script src="jquery.chained.js"></script>
    <!-- HighCharts Charting Framework -->
    <script src="http://code.highcharts.com/highcharts.js"></script>
</body>
</html>