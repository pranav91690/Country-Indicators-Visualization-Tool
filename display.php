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

    .bpad{
        padding: 15px;
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
                    <li >
                        <a href="gendera.php"><font color="FFFFFF">Gender Based Analysis</font></a>
                    </li>
                    <li>
                        <a href="countrya.php"><font color="FFFFFF">Country Based Analysis</font></a>
                    </li>
                    
                    <li>
                        <a href='adddata.html'><font color="FFFFFF">Add Data</font></a>
                    </li>
                    <li class="active">
                        <a href=''><font color="FFFFFF">Tuple Count</font></a>
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
                    Tuple Count
                </a>
            </li>
            <li>
                <a data-toggle="tab" href="#example1" id="example1tab">
                    Modification Log
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade in active" id="correlation">
                <div class="col-md-12">
                    <div class="row col-md-2 bpad">
                        <button type="button"  onclick="doDisplay()" class="btn btn-primary">Fetch Tuple Count</button>
                    </div>
                    <!-- Our Tuple Count Table -->
                    <table class="table" id="tupletable">
                        <thead>
                            <tr>
                                <td>Table Name</td>
                                <td>Count</td>
                            </tr>
                        </thead>
                    </table>
                </div> 
            </div>
            <div class="tab-pane fade" id="example1">
                    <div class="row col-md-2 bpad">
                        <button type="button" class="btn btn-primary">Modification Log</button>
                    </div>                
                    <!-- Our Modification Log Table -->
                    <table class="table" id="modtable">
                        <thead>
                            <tr>
                                <td>Table Name</td>
                                <td>Column Name</td>
                                <td>Old Value</td>
                                <td>New Value</td>
                            </tr>
                        </thead>
                    </table>
            </div>
        </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>