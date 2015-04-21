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
                    <li class="active">
                        <a href=""><font color="FFFFFF">Correlation Analysis </font></a>
                    </li>
                    <li>
                        <a href="gendera.php"><font color="FFFFFF">Gender Based Analysis</font></a>
                    </li>
                    <li>
                        <a href="countrya.php"><font color="FFFFFF">Country Based Analysis</font></a>
                    </li>
                    
                    <li>
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
                    <h2>Correlation Analysis</h2>
                    <p> Compare the relation between two indicators for different countries. Click Example Tab for help!</p>
                    <!-- OUR FORM -->
                    <form action="correlation.php" method="POST" id="correlationform">
                        <div class="row">
                            <!-- Indicator X -->
                            <div id="ind-group" class="form-group">
                                <!-- Topic -->
                                <div class="col-md-4" id="topic1group">
                                    <label for="topic">Topic</label>
                                    <select type="text" class="form-control input-medium" onchange="doGo('topic1', 'indx')" name="topic" id="topic1">

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
                                <div class="col-md-8" id="indxgroup">
                                    <!-- Indicator - Make it Chained -->
                                    <label for="indx">Indicator - X</label>
                                    <select type="text" class="form-control input-medium" name="indx" id="indx">                               
                                    </select>
                                </div>
                                <!-- errors will go here -->
                            </div>
                        </div>

                        <div class="row">
                            <!-- Indicator Y -->
                            <div id="ind-group" class="form-group">
                                <!-- Topic -->
                                <div class="col-md-4" id="topic2group">
                                    <label for="topic">Topic</label>
                                    <select type="text" class="form-control input-medium" onchange="doGo('topic2', 'indy')" name="topic" id="topic2">
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
                                <div class="col-md-8" id="indygroup">
                                    <!-- Indicator - Make it Chained -->
                                    <label for="indy">Indicator - Y</label>
                                    <select type="text" class="form-control input-medium" name="indy" id="indy">
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                        <!-- Country1 -->
                        <div id="country-group1" class="form-group col-md-6">
                            <label for="country1">Country1</label>
                            <select type="text" class="form-control" name="country1" id="country1">     
<?php

$STATEMENT = oci_parse($conn,"SELECT * from Country order by SHORT_NAME asc");
oci_execute($STATEMENT);
echo '<option value="SEL">Select</option>'; 

while( ($res = oci_fetch_array($STATEMENT))) {

echo '<option value="'.$res['CODE']. '"\>' .$res['SHORT_NAME'] . '</option>';                                     
}     
?>                                 
                                <!-- <option value="NPL"> Nepal</option><option value="NLD"> Netherlands</option> <option value="NCL"> New Caledonia</option> <option value="NZL"> New Zealand</option> <option value="NIC"> Nicaragua</option> <option value="NER"> Niger</option> <option value="NGA"> Nigeria</option> <option value="NAC">North America</option> <option value="MNP"> Northern Mariana Islands</option> <option value="NOR"> Norway</option> <option value="OED"> OECD members</option> <option value="OMN"> Oman</option> <option value="OSS"> Other small states</option> <option value="PSS"> Pacific island small states</option> <option value="PAK">Pakistan</option> <option value="PLW"> Palau</option> <option value="PAN"> Panama</option> <option value="PNG"> Papua New Guinea</option> <option value="PRY"> Paraguay</option> <option value="PER"> Peru</option> <option value="PHL"> Philippines</option> <option value="POL"> Poland</option> <option value="PRT"> Portugal</option> <option value="PRI"> Puerto Rico</option> <option value="QAT">Qatar</option> <option value="ROM"> Romania</option> <option value="RUS"> Russia</option> <option value="RWA"> Rwanda</option> <option value="WSM"> Samoa</option> <option value="SMR"> San Marino</option> <option value="STP"> São Tomé and Principe</option> <option value="SAU"> Saudi Arabia</option> <option value="SEN"> Senegal</option> <option value="SRB"> Serbia</option> <option value="SYC"> Seychelles</option> <option value="SLE"> Sierra Leone</option> <option value="SGP"> Singapore</option> <option value="SXM"> Sint Maarten (Dutch part)</option> <option value="SVK"> Slovak Republic</option> <option value="SVN"> Slovenia</option> <option value="SST"> Small states</option> <option value="SLB"> Solomon Islands</option> <option value="SOM"> Somalia</option> <option value="ZAF"> South Africa</option> <option value="SAS"> South Asia</option> <option value="SSD"> South Sudan</option> <option value="ESP"> Spain</option> <option value="LKA"> Sri Lanka</option> <option value="KNA"> St. Kitts and Nevis</option> <option value="LCA"> St. Lucia</option> <option value="MAF"> St. Martin (French part)</option> <option value="VCT"> St. Vincent and the Grenadines</option> <option value="SSF"> Sub-Saharan Africa (all income levels)</option> <option value="SSA"> Sub-Saharan Africa (developing only)</option> <option value="SDN"> Sudan</option> <option value="SUR"> Suriname</option> <option value="SWZ"> Swaziland</option> <option value="SWE"> Sweden</option> <option value="CHE"> Switzerland</option> <option value="SYR"> Syrian Arab Republic</option> <option value="TJK"> Tajikistan</option> <option value="TZA"> Tanzania</option> <option value="THA"> Thailand</option> <option value="BHS"> The Bahamas</option> <option value="GMB"> The Gambia</option> <option value="TMP"> Timor-Leste</option> <option value="TGO"> Togo</option> <option value="TON"> Tonga</option> <option value="TTO"> Trinidad and Tobago</option> <option value="TUN"> Tunisia</option> <option value="TUR"> Turkey</option> <option value="TKM"> Turkmenistan</option> <option value="TCA"> Turks and Caicos Islands</option> <option value="TUV"> Tuvalu</option> <option value="UGA"> Uganda</option> <option value="UKR"> Ukraine</option> <option value="ARE"> United Arab Emirates</option> <option value="GBR"> United Kingdom</option> <option value="USA"> United States</option> <option value="UMC"> Upper middle income</option> <option value="URY"> Uruguay</option> <option value="UZB"> Uzbekistan</option> <option value="VUT"> Vanuatu</option> <option value="VEN"> Venezuela</option> <option value="VNM"> Vietnam</option> <option value="VIR"> Virgin Islands</option> <option value="WBG"> West Bank and Gaza</option> <option value="WLD"> World</option> <option value="YEM"> Yemen</option> <option value="ZMB"> Zambia</option> <option value="ZWE"> Zimbabwe</option> <option value="AFG"> Afghanistan</option> <option value="ALB"> Albania</option> <option value="DZA"> Algeria</option> <option value="ASM">American Samoa</option> <option value="ADO"> Andorra</option> <option value="AGO"> Angola</option> <option value="ATG"> Antigua and Barbuda</option> <option value="ARB"> Arab World</option> <option value="ARG"> Argentina</option> <option value="ARM"> Armenia</option> <option value="ABW"> Aruba</option> <option value="AUS"> Australia</option> <option value="AUT"> Austria</option> <option value="AZE"> Azerbaijan</option> <option value="BHR"> Bahrain</option> <option value="BGD"> Bangladesh</option> <option value="BRB"> Barbados</option> <option value="BLR"> Belarus</option> <option value="BEL"> Belgium</option> <option value="BLZ"> Belize</option> <option value="BEN"> Benin</option> <option value="BMU"> Bermuda</option> <option value="BTN"> Bhutan</option> <option value="BOL"> Bolivia</option> <option value="BIH"> Bosnia and Herzegovina</option> <option value="BWA"> Botswana</option> <option value="BRA"> Brazil</option> <option value="BRN">Brunei</option> <option value="BGR"> Bulgaria</option> <option value="BFA"> Burkina Faso</option> <option value="BDI">Burundi</option> <option value="CPV"> Cabo Verde</option> <option value="KHM"> Cambodia</option> <option value="CMR"> Cameroon</option> <option value="CAN"> Canada</option> <option value="CSS"> Caribbean small states</option> <option value="CYM"> Cayman Islands</option> <option value="CAF"> Central African Republic</option> <option value="CEB"> Central Europe and the Baltics</option> <option value="TCD"> Chad</option> <option value="CHI"> Channel Islands</option> <option value="CHL"> Chile</option> <option value="COM"> Comoros</option> <option value="CHN"> China</option> <option value="COL"> Colombia</option> <option value="COM"> Comoros</option> <option value="COG"> Congo</option> <option value="CRI"> Costa Rica</option> <option value="CIV"> Côte dIvoire</option> <option value="HRV"> Croatia</option> <option value="CUB"> Cuba</option> <option value="CUW"> Curaçao</option> <option value="CYP"> Cyprus</option> <option value="CZE"> Czech Republic</option> <option value="PRK"> Dem. Peoples Rep. Korea</option> <option value="ZAR">Dem. Rep. Congo</option> <option value="DNK"> Denmark</option> <option value="DJI"> Djibouti</option> <option value="DMA"> Dominica</option> <option value="DOM"> Dominican Republic</option> <option value="EAS"> East Asia and Pacific (all income levels)</option> <option value="EAP"> East Asia and Pacific (developing only)</option> <option value="ECU">Ecuador</option> <option value="EGY">Egypt</option> <option value="SLV">El Salvador</option> <option value="GNQ">Equatorial Guinea</option> <option value="ERI"> Eritrea</option> <option value="EST"> Estonia</option> <option value="ETH"> Ethiopia</option> <option value="EMU"> Euro area</option> <option value="ECS"> Europe and Central Asia (all income levels)</option> <option value="ECA"> Europe and Central Asia (developing only)</option> <option value="EUU"> European Union</option> <option value="FRO"> Faeroe Islands</option> <option value="FJI"> Fiji</option> <option value="FIN"> Finland</option> <option value="HIC"> High income</option> <option value="LIC"> Low income</option> <option value="FCS"> Fragile and conflict affected situations</option> <option value="FRA"> France</option> <option value="PYF"> French Polynesia</option> <option value="GAB"> Gabon</option> <option value="GEO"> Georgia</option> <option value="DEU"> Germany</option> <option value="GHA"> Ghana</option> <option value="GRC"> Greece</option> <option value="GRL"> Greenland</option> <option value="GRD"> Grenada</option> <option value="GUM"> Guam</option> <option value="GTM"> Guatemala</option> <option value="GIN"> Guinea</option> <option value="GNB"> Guinea-Bissau</option> <option value="GUY"> Guyana</option> <option value="HTI"> Haiti</option> <option value="HPC"> Heavily indebted poor countries (HIPC)</option> <option value="NOC"> High income: nonOECD</option> <option value="OEC"> High income: OECD</option> <option value="HND"> Honduras</option> <option value="HKG"> Hong Kong SAR, China</option> <option value="HUN"> Hungary</option> <option value="ISL"> Iceland</option> <option value="IND"> India</option> <option value="IDN"> Indonesia</option> <option value="IRN"> Iran</option> <option value="IRQ"> Iraq</option> <option value="IRL"> Ireland</option> <option value="IMY"> Isle of Man</option> <option value="ISR"> Israel</option> <option value="ITA"> Italy</option> <option value="JAM"> Jamaica</option> <option value="JPN"> Japan</option> <option value="JOR"> Jordan</option> <option value="KAZ"> Kazakhstan</option> <option value="KEN"> Kenya</option> <option value="KIR"> Kiribati</option> <option value="KOR"> Korea</option> <option value="KSV"> Kosovo</option> <option value="KWT"> Kuwait</option> <option value="KGZ"> Kyrgyz Republic</option> <option value="LAO"> Lao PDR</option> <option value="LCN"> Latin America and Caribbean (all income levels)</option> <option value="LAC"> Latin America and Caribbean (developing only)</option> <option value="LVA"> Latvia</option> <option value="LDC"> Least developed countries: UN classification</option> <option value="LBN"> Lebanon</option> <option value="LSO"> Lesotho</option> <option value="LBR"> Liberia</option> <option value="LBY"> Libya</option> <option value="LIE"> Liechtenstein</option> <option value="LTU"> Lithuania</option> <option value="LMY"> Low and middle income</option> <option value="LMC"> Lower middle income</option> <option value="LUX"> Luxembourg</option> <option value="MAC"> Macao SAR, China</option> <option value="MKD"> Macedonia</option> <option value="MDG"> Madagascar</option> <option value="MWI"> Malawi</option> <option value="MYS"> Malaysia</option> <option value="MDV"> Maldives</option> <option value="MLI"> Mali</option> <option value="MLT"> Malta</option> <option value="MHL"> Marshall Islands</option> <option value="MRT"> Mauritania</option> <option value="MUS"> Mauritius</option> <option value="MEX"> Mexico</option> <option value="FSM"> Micronesia</option> <option value="MEA"> Middle East and North Africa (all income levels)</option> <option value="MNA"> Middle East and North Africa (developing only)</option> <option value="MIC"> Middle income</option> <option value="MDA"> Moldova</option> <option value="MCO"> Monaco</option> <option value="MNG"> Mongolia</option> <option value="MNE"> Montenegro</option> <option value="MAR"> Morocco</option> <option value="MOZ"> Mozambique</option> <option value="MMR"> Myanmar</option> <option value="NAM"> Namibia</option>  -->
                            </select>
                            <!-- errors will go here -->
                        </div>

                        <div id="country-group2" class="form-group col-md-6">
                            <label for="country2">Country2</label>
                            <select type="text" class="form-control" name="country2" id="country2">
<?php

$STATEMENT = oci_parse($conn,"SELECT * from Country order by SHORT_NAME asc");
oci_execute($STATEMENT);
echo '<option value="SEL">Select</option>'; 

while( ($res = oci_fetch_array($STATEMENT))) {

echo '<option value="'.$res['CODE']. '"\>' .$res['SHORT_NAME'] . '</option>';                                     
}     
?>                               
                                <!-- <option value="NPL"> Nepal</option><option value="NLD"> Netherlands</option> <option value="NCL"> New Caledonia</option> <option value="NZL"> New Zealand</option> <option value="NIC"> Nicaragua</option> <option value="NER"> Niger</option> <option value="NGA"> Nigeria</option> <option value="NAC">North America</option> <option value="MNP"> Northern Mariana Islands</option> <option value="NOR"> Norway</option> <option value="OED"> OECD members</option> <option value="OMN"> Oman</option> <option value="OSS"> Other small states</option> <option value="PSS"> Pacific island small states</option> <option value="PAK">Pakistan</option> <option value="PLW"> Palau</option> <option value="PAN"> Panama</option> <option value="PNG"> Papua New Guinea</option> <option value="PRY"> Paraguay</option> <option value="PER"> Peru</option> <option value="PHL"> Philippines</option> <option value="POL"> Poland</option> <option value="PRT"> Portugal</option> <option value="PRI"> Puerto Rico</option> <option value="QAT">Qatar</option> <option value="ROM"> Romania</option> <option value="RUS"> Russia</option> <option value="RWA"> Rwanda</option> <option value="WSM"> Samoa</option> <option value="SMR"> San Marino</option> <option value="STP"> São Tomé and Principe</option> <option value="SAU"> Saudi Arabia</option> <option value="SEN"> Senegal</option> <option value="SRB"> Serbia</option> <option value="SYC"> Seychelles</option> <option value="SLE"> Sierra Leone</option> <option value="SGP"> Singapore</option> <option value="SXM"> Sint Maarten (Dutch part)</option> <option value="SVK"> Slovak Republic</option> <option value="SVN"> Slovenia</option> <option value="SST"> Small states</option> <option value="SLB"> Solomon Islands</option> <option value="SOM"> Somalia</option> <option value="ZAF"> South Africa</option> <option value="SAS"> South Asia</option> <option value="SSD"> South Sudan</option> <option value="ESP"> Spain</option> <option value="LKA"> Sri Lanka</option> <option value="KNA"> St. Kitts and Nevis</option> <option value="LCA"> St. Lucia</option> <option value="MAF"> St. Martin (French part)</option> <option value="VCT"> St. Vincent and the Grenadines</option> <option value="SSF"> Sub-Saharan Africa (all income levels)</option> <option value="SSA"> Sub-Saharan Africa (developing only)</option> <option value="SDN"> Sudan</option> <option value="SUR"> Suriname</option> <option value="SWZ"> Swaziland</option> <option value="SWE"> Sweden</option> <option value="CHE"> Switzerland</option> <option value="SYR"> Syrian Arab Republic</option> <option value="TJK"> Tajikistan</option> <option value="TZA"> Tanzania</option> <option value="THA"> Thailand</option> <option value="BHS"> The Bahamas</option> <option value="GMB"> The Gambia</option> <option value="TMP"> Timor-Leste</option> <option value="TGO"> Togo</option> <option value="TON"> Tonga</option> <option value="TTO"> Trinidad and Tobago</option> <option value="TUN"> Tunisia</option> <option value="TUR"> Turkey</option> <option value="TKM"> Turkmenistan</option> <option value="TCA"> Turks and Caicos Islands</option> <option value="TUV"> Tuvalu</option> <option value="UGA"> Uganda</option> <option value="UKR"> Ukraine</option> <option value="ARE"> United Arab Emirates</option> <option value="GBR"> United Kingdom</option> <option value="USA"> United States</option> <option value="UMC"> Upper middle income</option> <option value="URY"> Uruguay</option> <option value="UZB"> Uzbekistan</option> <option value="VUT"> Vanuatu</option> <option value="VEN"> Venezuela</option> <option value="VNM"> Vietnam</option> <option value="VIR"> Virgin Islands</option> <option value="WBG"> West Bank and Gaza</option> <option value="WLD"> World</option> <option value="YEM"> Yemen</option> <option value="ZMB"> Zambia</option> <option value="ZWE"> Zimbabwe</option> <option value="AFG"> Afghanistan</option> <option value="ALB"> Albania</option> <option value="DZA"> Algeria</option> <option value="ASM">American Samoa</option> <option value="ADO"> Andorra</option> <option value="AGO"> Angola</option> <option value="ATG"> Antigua and Barbuda</option> <option value="ARB"> Arab World</option> <option value="ARG"> Argentina</option> <option value="ARM"> Armenia</option> <option value="ABW"> Aruba</option> <option value="AUS"> Australia</option> <option value="AUT"> Austria</option> <option value="AZE"> Azerbaijan</option> <option value="BHR"> Bahrain</option> <option value="BGD"> Bangladesh</option> <option value="BRB"> Barbados</option> <option value="BLR"> Belarus</option> <option value="BEL"> Belgium</option> <option value="BLZ"> Belize</option> <option value="BEN"> Benin</option> <option value="BMU"> Bermuda</option> <option value="BTN"> Bhutan</option> <option value="BOL"> Bolivia</option> <option value="BIH"> Bosnia and Herzegovina</option> <option value="BWA"> Botswana</option> <option value="BRA"> Brazil</option> <option value="BRN">Brunei</option> <option value="BGR"> Bulgaria</option> <option value="BFA"> Burkina Faso</option> <option value="BDI">Burundi</option> <option value="CPV"> Cabo Verde</option> <option value="KHM"> Cambodia</option> <option value="CMR"> Cameroon</option> <option value="CAN"> Canada</option> <option value="CSS"> Caribbean small states</option> <option value="CYM"> Cayman Islands</option> <option value="CAF"> Central African Republic</option> <option value="CEB"> Central Europe and the Baltics</option> <option value="TCD"> Chad</option> <option value="CHI"> Channel Islands</option> <option value="CHL"> Chile</option> <option value="COM"> Comoros</option> <option value="CHN"> China</option> <option value="COL"> Colombia</option> <option value="COM"> Comoros</option> <option value="COG"> Congo</option> <option value="CRI"> Costa Rica</option> <option value="CIV"> Côte dIvoire</option> <option value="HRV"> Croatia</option> <option value="CUB"> Cuba</option> <option value="CUW"> Curaçao</option> <option value="CYP"> Cyprus</option> <option value="CZE"> Czech Republic</option> <option value="PRK"> Dem. Peoples Rep. Korea</option> <option value="ZAR">Dem. Rep. Congo</option> <option value="DNK"> Denmark</option> <option value="DJI"> Djibouti</option> <option value="DMA"> Dominica</option> <option value="DOM"> Dominican Republic</option> <option value="EAS"> East Asia and Pacific (all income levels)</option> <option value="EAP"> East Asia and Pacific (developing only)</option> <option value="ECU">Ecuador</option> <option value="EGY">Egypt</option> <option value="SLV">El Salvador</option> <option value="GNQ">Equatorial Guinea</option> <option value="ERI"> Eritrea</option> <option value="EST"> Estonia</option> <option value="ETH"> Ethiopia</option> <option value="EMU"> Euro area</option> <option value="ECS"> Europe and Central Asia (all income levels)</option> <option value="ECA"> Europe and Central Asia (developing only)</option> <option value="EUU"> European Union</option> <option value="FRO"> Faeroe Islands</option> <option value="FJI"> Fiji</option> <option value="FIN"> Finland</option> <option value="HIC"> High income</option> <option value="LIC"> Low income</option> <option value="FCS"> Fragile and conflict affected situations</option> <option value="FRA"> France</option> <option value="PYF"> French Polynesia</option> <option value="GAB"> Gabon</option> <option value="GEO"> Georgia</option> <option value="DEU"> Germany</option> <option value="GHA"> Ghana</option> <option value="GRC"> Greece</option> <option value="GRL"> Greenland</option> <option value="GRD"> Grenada</option> <option value="GUM"> Guam</option> <option value="GTM"> Guatemala</option> <option value="GIN"> Guinea</option> <option value="GNB"> Guinea-Bissau</option> <option value="GUY"> Guyana</option> <option value="HTI"> Haiti</option> <option value="HPC"> Heavily indebted poor countries (HIPC)</option> <option value="NOC"> High income: nonOECD</option> <option value="OEC"> High income: OECD</option> <option value="HND"> Honduras</option> <option value="HKG"> Hong Kong SAR, China</option> <option value="HUN"> Hungary</option> <option value="ISL"> Iceland</option> <option value="IND"> India</option> <option value="IDN"> Indonesia</option> <option value="IRN"> Iran</option> <option value="IRQ"> Iraq</option> <option value="IRL"> Ireland</option> <option value="IMY"> Isle of Man</option> <option value="ISR"> Israel</option> <option value="ITA"> Italy</option> <option value="JAM"> Jamaica</option> <option value="JPN"> Japan</option> <option value="JOR"> Jordan</option> <option value="KAZ"> Kazakhstan</option> <option value="KEN"> Kenya</option> <option value="KIR"> Kiribati</option> <option value="KOR"> Korea</option> <option value="KSV"> Kosovo</option> <option value="KWT"> Kuwait</option> <option value="KGZ"> Kyrgyz Republic</option> <option value="LAO"> Lao PDR</option> <option value="LCN"> Latin America and Caribbean (all income levels)</option> <option value="LAC"> Latin America and Caribbean (developing only)</option> <option value="LVA"> Latvia</option> <option value="LDC"> Least developed countries: UN classification</option> <option value="LBN"> Lebanon</option> <option value="LSO"> Lesotho</option> <option value="LBR"> Liberia</option> <option value="LBY"> Libya</option> <option value="LIE"> Liechtenstein</option> <option value="LTU"> Lithuania</option> <option value="LMY"> Low and middle income</option> <option value="LMC"> Lower middle income</option> <option value="LUX"> Luxembourg</option> <option value="MAC"> Macao SAR, China</option> <option value="MKD"> Macedonia</option> <option value="MDG"> Madagascar</option> <option value="MWI"> Malawi</option> <option value="MYS"> Malaysia</option> <option value="MDV"> Maldives</option> <option value="MLI"> Mali</option> <option value="MLT"> Malta</option> <option value="MHL"> Marshall Islands</option> <option value="MRT"> Mauritania</option> <option value="MUS"> Mauritius</option> <option value="MEX"> Mexico</option> <option value="FSM"> Micronesia</option> <option value="MEA"> Middle East and North Africa (all income levels)</option> <option value="MNA"> Middle East and North Africa (developing only)</option> <option value="MIC"> Middle income</option> <option value="MDA"> Moldova</option> <option value="MCO"> Monaco</option> <option value="MNG"> Mongolia</option> <option value="MNE"> Montenegro</option> <option value="MAR"> Morocco</option> <option value="MOZ"> Mozambique</option> <option value="MMR"> Myanmar</option> <option value="NAM"> Namibia</option> -->
                            </select>
                            <!-- errors will go here -->
                        </div>
                        </div>

                        <div class="row">
                        <div id="country-group3" class="form-group col-md-6">
                            <label for="country3">Country3</label>
                            <select type="text" class="form-control" name="country3" id="country3">
<?php

$STATEMENT = oci_parse($conn,"SELECT * from Country order by SHORT_NAME asc");
oci_execute($STATEMENT);
echo '<option value="SEL">Select</option>'; 

while( ($res = oci_fetch_array($STATEMENT))) {

echo '<option value="'.$res['CODE']. '"\>' .$res['SHORT_NAME'] . '</option>';                                     
}     
?>                                 
                                <!-- <option value="NPL"> Nepal</option><option value="NLD"> Netherlands</option> <option value="NCL"> New Caledonia</option> <option value="NZL"> New Zealand</option> <option value="NIC"> Nicaragua</option> <option value="NER"> Niger</option> <option value="NGA"> Nigeria</option> <option value="NAC">North America</option> <option value="MNP"> Northern Mariana Islands</option> <option value="NOR"> Norway</option> <option value="OED"> OECD members</option> <option value="OMN"> Oman</option> <option value="OSS"> Other small states</option> <option value="PSS"> Pacific island small states</option> <option value="PAK">Pakistan</option> <option value="PLW"> Palau</option> <option value="PAN"> Panama</option> <option value="PNG"> Papua New Guinea</option> <option value="PRY"> Paraguay</option> <option value="PER"> Peru</option> <option value="PHL"> Philippines</option> <option value="POL"> Poland</option> <option value="PRT"> Portugal</option> <option value="PRI"> Puerto Rico</option> <option value="QAT">Qatar</option> <option value="ROM"> Romania</option> <option value="RUS"> Russia</option> <option value="RWA"> Rwanda</option> <option value="WSM"> Samoa</option> <option value="SMR"> San Marino</option> <option value="STP"> São Tomé and Principe</option> <option value="SAU"> Saudi Arabia</option> <option value="SEN"> Senegal</option> <option value="SRB"> Serbia</option> <option value="SYC"> Seychelles</option> <option value="SLE"> Sierra Leone</option> <option value="SGP"> Singapore</option> <option value="SXM"> Sint Maarten (Dutch part)</option> <option value="SVK"> Slovak Republic</option> <option value="SVN"> Slovenia</option> <option value="SST"> Small states</option> <option value="SLB"> Solomon Islands</option> <option value="SOM"> Somalia</option> <option value="ZAF"> South Africa</option> <option value="SAS"> South Asia</option> <option value="SSD"> South Sudan</option> <option value="ESP"> Spain</option> <option value="LKA"> Sri Lanka</option> <option value="KNA"> St. Kitts and Nevis</option> <option value="LCA"> St. Lucia</option> <option value="MAF"> St. Martin (French part)</option> <option value="VCT"> St. Vincent and the Grenadines</option> <option value="SSF"> Sub-Saharan Africa (all income levels)</option> <option value="SSA"> Sub-Saharan Africa (developing only)</option> <option value="SDN"> Sudan</option> <option value="SUR"> Suriname</option> <option value="SWZ"> Swaziland</option> <option value="SWE"> Sweden</option> <option value="CHE"> Switzerland</option> <option value="SYR"> Syrian Arab Republic</option> <option value="TJK"> Tajikistan</option> <option value="TZA"> Tanzania</option> <option value="THA"> Thailand</option> <option value="BHS"> The Bahamas</option> <option value="GMB"> The Gambia</option> <option value="TMP"> Timor-Leste</option> <option value="TGO"> Togo</option> <option value="TON"> Tonga</option> <option value="TTO"> Trinidad and Tobago</option> <option value="TUN"> Tunisia</option> <option value="TUR"> Turkey</option> <option value="TKM"> Turkmenistan</option> <option value="TCA"> Turks and Caicos Islands</option> <option value="TUV"> Tuvalu</option> <option value="UGA"> Uganda</option> <option value="UKR"> Ukraine</option> <option value="ARE"> United Arab Emirates</option> <option value="GBR"> United Kingdom</option> <option value="USA"> United States</option> <option value="UMC"> Upper middle income</option> <option value="URY"> Uruguay</option> <option value="UZB"> Uzbekistan</option> <option value="VUT"> Vanuatu</option> <option value="VEN"> Venezuela</option> <option value="VNM"> Vietnam</option> <option value="VIR"> Virgin Islands</option> <option value="WBG"> West Bank and Gaza</option> <option value="WLD"> World</option> <option value="YEM"> Yemen</option> <option value="ZMB"> Zambia</option> <option value="ZWE"> Zimbabwe</option> <option value="AFG"> Afghanistan</option> <option value="ALB"> Albania</option> <option value="DZA"> Algeria</option> <option value="ASM">American Samoa</option> <option value="ADO"> Andorra</option> <option value="AGO"> Angola</option> <option value="ATG"> Antigua and Barbuda</option> <option value="ARB"> Arab World</option> <option value="ARG"> Argentina</option> <option value="ARM"> Armenia</option> <option value="ABW"> Aruba</option> <option value="AUS"> Australia</option> <option value="AUT"> Austria</option> <option value="AZE"> Azerbaijan</option> <option value="BHR"> Bahrain</option> <option value="BGD"> Bangladesh</option> <option value="BRB"> Barbados</option> <option value="BLR"> Belarus</option> <option value="BEL"> Belgium</option> <option value="BLZ"> Belize</option> <option value="BEN"> Benin</option> <option value="BMU"> Bermuda</option> <option value="BTN"> Bhutan</option> <option value="BOL"> Bolivia</option> <option value="BIH"> Bosnia and Herzegovina</option> <option value="BWA"> Botswana</option> <option value="BRA"> Brazil</option> <option value="BRN">Brunei</option> <option value="BGR"> Bulgaria</option> <option value="BFA"> Burkina Faso</option> <option value="BDI">Burundi</option> <option value="CPV"> Cabo Verde</option> <option value="KHM"> Cambodia</option> <option value="CMR"> Cameroon</option> <option value="CAN"> Canada</option> <option value="CSS"> Caribbean small states</option> <option value="CYM"> Cayman Islands</option> <option value="CAF"> Central African Republic</option> <option value="CEB"> Central Europe and the Baltics</option> <option value="TCD"> Chad</option> <option value="CHI"> Channel Islands</option> <option value="CHL"> Chile</option> <option value="COM"> Comoros</option> <option value="CHN"> China</option> <option value="COL"> Colombia</option> <option value="COM"> Comoros</option> <option value="COG"> Congo</option> <option value="CRI"> Costa Rica</option> <option value="CIV"> Côte dIvoire</option> <option value="HRV"> Croatia</option> <option value="CUB"> Cuba</option> <option value="CUW"> Curaçao</option> <option value="CYP"> Cyprus</option> <option value="CZE"> Czech Republic</option> <option value="PRK"> Dem. Peoples Rep. Korea</option> <option value="ZAR">Dem. Rep. Congo</option> <option value="DNK"> Denmark</option> <option value="DJI"> Djibouti</option> <option value="DMA"> Dominica</option> <option value="DOM"> Dominican Republic</option> <option value="EAS"> East Asia and Pacific (all income levels)</option> <option value="EAP"> East Asia and Pacific (developing only)</option> <option value="ECU">Ecuador</option> <option value="EGY">Egypt</option> <option value="SLV">El Salvador</option> <option value="GNQ">Equatorial Guinea</option> <option value="ERI"> Eritrea</option> <option value="EST"> Estonia</option> <option value="ETH"> Ethiopia</option> <option value="EMU"> Euro area</option> <option value="ECS"> Europe and Central Asia (all income levels)</option> <option value="ECA"> Europe and Central Asia (developing only)</option> <option value="EUU"> European Union</option> <option value="FRO"> Faeroe Islands</option> <option value="FJI"> Fiji</option> <option value="FIN"> Finland</option> <option value="HIC"> High income</option> <option value="LIC"> Low income</option> <option value="FCS"> Fragile and conflict affected situations</option> <option value="FRA"> France</option> <option value="PYF"> French Polynesia</option> <option value="GAB"> Gabon</option> <option value="GEO"> Georgia</option> <option value="DEU"> Germany</option> <option value="GHA"> Ghana</option> <option value="GRC"> Greece</option> <option value="GRL"> Greenland</option> <option value="GRD"> Grenada</option> <option value="GUM"> Guam</option> <option value="GTM"> Guatemala</option> <option value="GIN"> Guinea</option> <option value="GNB"> Guinea-Bissau</option> <option value="GUY"> Guyana</option> <option value="HTI"> Haiti</option> <option value="HPC"> Heavily indebted poor countries (HIPC)</option> <option value="NOC"> High income: nonOECD</option> <option value="OEC"> High income: OECD</option> <option value="HND"> Honduras</option> <option value="HKG"> Hong Kong SAR, China</option> <option value="HUN"> Hungary</option> <option value="ISL"> Iceland</option> <option value="IND"> India</option> <option value="IDN"> Indonesia</option> <option value="IRN"> Iran</option> <option value="IRQ"> Iraq</option> <option value="IRL"> Ireland</option> <option value="IMY"> Isle of Man</option> <option value="ISR"> Israel</option> <option value="ITA"> Italy</option> <option value="JAM"> Jamaica</option> <option value="JPN"> Japan</option> <option value="JOR"> Jordan</option> <option value="KAZ"> Kazakhstan</option> <option value="KEN"> Kenya</option> <option value="KIR"> Kiribati</option> <option value="KOR"> Korea</option> <option value="KSV"> Kosovo</option> <option value="KWT"> Kuwait</option> <option value="KGZ"> Kyrgyz Republic</option> <option value="LAO"> Lao PDR</option> <option value="LCN"> Latin America and Caribbean (all income levels)</option> <option value="LAC"> Latin America and Caribbean (developing only)</option> <option value="LVA"> Latvia</option> <option value="LDC"> Least developed countries: UN classification</option> <option value="LBN"> Lebanon</option> <option value="LSO"> Lesotho</option> <option value="LBR"> Liberia</option> <option value="LBY"> Libya</option> <option value="LIE"> Liechtenstein</option> <option value="LTU"> Lithuania</option> <option value="LMY"> Low and middle income</option> <option value="LMC"> Lower middle income</option> <option value="LUX"> Luxembourg</option> <option value="MAC"> Macao SAR, China</option> <option value="MKD"> Macedonia</option> <option value="MDG"> Madagascar</option> <option value="MWI"> Malawi</option> <option value="MYS"> Malaysia</option> <option value="MDV"> Maldives</option> <option value="MLI"> Mali</option> <option value="MLT"> Malta</option> <option value="MHL"> Marshall Islands</option> <option value="MRT"> Mauritania</option> <option value="MUS"> Mauritius</option> <option value="MEX"> Mexico</option> <option value="FSM"> Micronesia</option> <option value="MEA"> Middle East and North Africa (all income levels)</option> <option value="MNA"> Middle East and North Africa (developing only)</option> <option value="MIC"> Middle income</option> <option value="MDA"> Moldova</option> <option value="MCO"> Monaco</option> <option value="MNG"> Mongolia</option> <option value="MNE"> Montenegro</option> <option value="MAR"> Morocco</option> <option value="MOZ"> Mozambique</option> <option value="MMR"> Myanmar</option> <option value="NAM"> Namibia</option> -->
                            </select>
                            <!-- errors will go here -->
                        </div>

                        <div id="country-group4" class="form-group col-md-6">
                            <label for="country4">Country4</label>
                            <select type="text" class="form-control" name="country4" id="country4">
<?php

$STATEMENT = oci_parse($conn,"SELECT * from Country order by SHORT_NAME asc");
oci_execute($STATEMENT);
echo '<option value="SEL">Select</option>'; 

while( ($res = oci_fetch_array($STATEMENT))) {

echo '<option value="'.$res['CODE']. '"\>' .$res['SHORT_NAME'] . '</option>';                                     
}     
?>                                 
                                <!-- <option value="NPL"> Nepal</option><option value="NLD"> Netherlands</option> <option value="NCL"> New Caledonia</option> <option value="NZL"> New Zealand</option> <option value="NIC"> Nicaragua</option> <option value="NER"> Niger</option> <option value="NGA"> Nigeria</option> <option value="NAC">North America</option> <option value="MNP"> Northern Mariana Islands</option> <option value="NOR"> Norway</option> <option value="OED"> OECD members</option> <option value="OMN"> Oman</option> <option value="OSS"> Other small states</option> <option value="PSS"> Pacific island small states</option> <option value="PAK">Pakistan</option> <option value="PLW"> Palau</option> <option value="PAN"> Panama</option> <option value="PNG"> Papua New Guinea</option> <option value="PRY"> Paraguay</option> <option value="PER"> Peru</option> <option value="PHL"> Philippines</option> <option value="POL"> Poland</option> <option value="PRT"> Portugal</option> <option value="PRI"> Puerto Rico</option> <option value="QAT">Qatar</option> <option value="ROM"> Romania</option> <option value="RUS"> Russia</option> <option value="RWA"> Rwanda</option> <option value="WSM"> Samoa</option> <option value="SMR"> San Marino</option> <option value="STP"> São Tomé and Principe</option> <option value="SAU"> Saudi Arabia</option> <option value="SEN"> Senegal</option> <option value="SRB"> Serbia</option> <option value="SYC"> Seychelles</option> <option value="SLE"> Sierra Leone</option> <option value="SGP"> Singapore</option> <option value="SXM"> Sint Maarten (Dutch part)</option> <option value="SVK"> Slovak Republic</option> <option value="SVN"> Slovenia</option> <option value="SST"> Small states</option> <option value="SLB"> Solomon Islands</option> <option value="SOM"> Somalia</option> <option value="ZAF"> South Africa</option> <option value="SAS"> South Asia</option> <option value="SSD"> South Sudan</option> <option value="ESP"> Spain</option> <option value="LKA"> Sri Lanka</option> <option value="KNA"> St. Kitts and Nevis</option> <option value="LCA"> St. Lucia</option> <option value="MAF"> St. Martin (French part)</option> <option value="VCT"> St. Vincent and the Grenadines</option> <option value="SSF"> Sub-Saharan Africa (all income levels)</option> <option value="SSA"> Sub-Saharan Africa (developing only)</option> <option value="SDN"> Sudan</option> <option value="SUR"> Suriname</option> <option value="SWZ"> Swaziland</option> <option value="SWE"> Sweden</option> <option value="CHE"> Switzerland</option> <option value="SYR"> Syrian Arab Republic</option> <option value="TJK"> Tajikistan</option> <option value="TZA"> Tanzania</option> <option value="THA"> Thailand</option> <option value="BHS"> The Bahamas</option> <option value="GMB"> The Gambia</option> <option value="TMP"> Timor-Leste</option> <option value="TGO"> Togo</option> <option value="TON"> Tonga</option> <option value="TTO"> Trinidad and Tobago</option> <option value="TUN"> Tunisia</option> <option value="TUR"> Turkey</option> <option value="TKM"> Turkmenistan</option> <option value="TCA"> Turks and Caicos Islands</option> <option value="TUV"> Tuvalu</option> <option value="UGA"> Uganda</option> <option value="UKR"> Ukraine</option> <option value="ARE"> United Arab Emirates</option> <option value="GBR"> United Kingdom</option> <option value="USA"> United States</option> <option value="UMC"> Upper middle income</option> <option value="URY"> Uruguay</option> <option value="UZB"> Uzbekistan</option> <option value="VUT"> Vanuatu</option> <option value="VEN"> Venezuela</option> <option value="VNM"> Vietnam</option> <option value="VIR"> Virgin Islands</option> <option value="WBG"> West Bank and Gaza</option> <option value="WLD"> World</option> <option value="YEM"> Yemen</option> <option value="ZMB"> Zambia</option> <option value="ZWE"> Zimbabwe</option> <option value="AFG"> Afghanistan</option> <option value="ALB"> Albania</option> <option value="DZA"> Algeria</option> <option value="ASM">American Samoa</option> <option value="ADO"> Andorra</option> <option value="AGO"> Angola</option> <option value="ATG"> Antigua and Barbuda</option> <option value="ARB"> Arab World</option> <option value="ARG"> Argentina</option> <option value="ARM"> Armenia</option> <option value="ABW"> Aruba</option> <option value="AUS"> Australia</option> <option value="AUT"> Austria</option> <option value="AZE"> Azerbaijan</option> <option value="BHR"> Bahrain</option> <option value="BGD"> Bangladesh</option> <option value="BRB"> Barbados</option> <option value="BLR"> Belarus</option> <option value="BEL"> Belgium</option> <option value="BLZ"> Belize</option> <option value="BEN"> Benin</option> <option value="BMU"> Bermuda</option> <option value="BTN"> Bhutan</option> <option value="BOL"> Bolivia</option> <option value="BIH"> Bosnia and Herzegovina</option> <option value="BWA"> Botswana</option> <option value="BRA"> Brazil</option> <option value="BRN">Brunei</option> <option value="BGR"> Bulgaria</option> <option value="BFA"> Burkina Faso</option> <option value="BDI">Burundi</option> <option value="CPV"> Cabo Verde</option> <option value="KHM"> Cambodia</option> <option value="CMR"> Cameroon</option> <option value="CAN"> Canada</option> <option value="CSS"> Caribbean small states</option> <option value="CYM"> Cayman Islands</option> <option value="CAF"> Central African Republic</option> <option value="CEB"> Central Europe and the Baltics</option> <option value="TCD"> Chad</option> <option value="CHI"> Channel Islands</option> <option value="CHL"> Chile</option> <option value="COM"> Comoros</option> <option value="CHN"> China</option> <option value="COL"> Colombia</option> <option value="COM"> Comoros</option> <option value="COG"> Congo</option> <option value="CRI"> Costa Rica</option> <option value="CIV"> Côte dIvoire</option> <option value="HRV"> Croatia</option> <option value="CUB"> Cuba</option> <option value="CUW"> Curaçao</option> <option value="CYP"> Cyprus</option> <option value="CZE"> Czech Republic</option> <option value="PRK"> Dem. Peoples Rep. Korea</option> <option value="ZAR">Dem. Rep. Congo</option> <option value="DNK"> Denmark</option> <option value="DJI"> Djibouti</option> <option value="DMA"> Dominica</option> <option value="DOM"> Dominican Republic</option> <option value="EAS"> East Asia and Pacific (all income levels)</option> <option value="EAP"> East Asia and Pacific (developing only)</option> <option value="ECU">Ecuador</option> <option value="EGY">Egypt</option> <option value="SLV">El Salvador</option> <option value="GNQ">Equatorial Guinea</option> <option value="ERI"> Eritrea</option> <option value="EST"> Estonia</option> <option value="ETH"> Ethiopia</option> <option value="EMU"> Euro area</option> <option value="ECS"> Europe and Central Asia (all income levels)</option> <option value="ECA"> Europe and Central Asia (developing only)</option> <option value="EUU"> European Union</option> <option value="FRO"> Faeroe Islands</option> <option value="FJI"> Fiji</option> <option value="FIN"> Finland</option> <option value="HIC"> High income</option> <option value="LIC"> Low income</option> <option value="FCS"> Fragile and conflict affected situations</option> <option value="FRA"> France</option> <option value="PYF"> French Polynesia</option> <option value="GAB"> Gabon</option> <option value="GEO"> Georgia</option> <option value="DEU"> Germany</option> <option value="GHA"> Ghana</option> <option value="GRC"> Greece</option> <option value="GRL"> Greenland</option> <option value="GRD"> Grenada</option> <option value="GUM"> Guam</option> <option value="GTM"> Guatemala</option> <option value="GIN"> Guinea</option> <option value="GNB"> Guinea-Bissau</option> <option value="GUY"> Guyana</option> <option value="HTI"> Haiti</option> <option value="HPC"> Heavily indebted poor countries (HIPC)</option> <option value="NOC"> High income: nonOECD</option> <option value="OEC"> High income: OECD</option> <option value="HND"> Honduras</option> <option value="HKG"> Hong Kong SAR, China</option> <option value="HUN"> Hungary</option> <option value="ISL"> Iceland</option> <option value="IND"> India</option> <option value="IDN"> Indonesia</option> <option value="IRN"> Iran</option> <option value="IRQ"> Iraq</option> <option value="IRL"> Ireland</option> <option value="IMY"> Isle of Man</option> <option value="ISR"> Israel</option> <option value="ITA"> Italy</option> <option value="JAM"> Jamaica</option> <option value="JPN"> Japan</option> <option value="JOR"> Jordan</option> <option value="KAZ"> Kazakhstan</option> <option value="KEN"> Kenya</option> <option value="KIR"> Kiribati</option> <option value="KOR"> Korea</option> <option value="KSV"> Kosovo</option> <option value="KWT"> Kuwait</option> <option value="KGZ"> Kyrgyz Republic</option> <option value="LAO"> Lao PDR</option> <option value="LCN"> Latin America and Caribbean (all income levels)</option> <option value="LAC"> Latin America and Caribbean (developing only)</option> <option value="LVA"> Latvia</option> <option value="LDC"> Least developed countries: UN classification</option> <option value="LBN"> Lebanon</option> <option value="LSO"> Lesotho</option> <option value="LBR"> Liberia</option> <option value="LBY"> Libya</option> <option value="LIE"> Liechtenstein</option> <option value="LTU"> Lithuania</option> <option value="LMY"> Low and middle income</option> <option value="LMC"> Lower middle income</option> <option value="LUX"> Luxembourg</option> <option value="MAC"> Macao SAR, China</option> <option value="MKD"> Macedonia</option> <option value="MDG"> Madagascar</option> <option value="MWI"> Malawi</option> <option value="MYS"> Malaysia</option> <option value="MDV"> Maldives</option> <option value="MLI"> Mali</option> <option value="MLT"> Malta</option> <option value="MHL"> Marshall Islands</option> <option value="MRT"> Mauritania</option> <option value="MUS"> Mauritius</option> <option value="MEX"> Mexico</option> <option value="FSM"> Micronesia</option> <option value="MEA"> Middle East and North Africa (all income levels)</option> <option value="MNA"> Middle East and North Africa (developing only)</option> <option value="MIC"> Middle income</option> <option value="MDA"> Moldova</option> <option value="MCO"> Monaco</option> <option value="MNG"> Mongolia</option> <option value="MNE"> Montenegro</option> <option value="MAR"> Morocco</option> <option value="MOZ"> Mozambique</option> <option value="MMR"> Myanmar</option> <option value="NAM"> Namibia</option> -->
                            </select>
                            <!-- errors will go here -->
                        </div>
                        </div>
<!-- 

                        <div id="country-group5" class="form-group">
                            <label for="country5">Country5</label>
                            <select type="text" class="form-control" name="country5" id="country5">
                                <option value="NPL"> Nepal</option><option value="NLD"> Netherlands</option> <option value="NCL"> New Caledonia</option> <option value="NZL"> New Zealand</option> <option value="NIC"> Nicaragua</option> <option value="NER"> Niger</option> <option value="NGA"> Nigeria</option> <option value="NAC">North America</option> <option value="MNP"> Northern Mariana Islands</option> <option value="NOR"> Norway</option> <option value="OED"> OECD members</option> <option value="OMN"> Oman</option> <option value="OSS"> Other small states</option> <option value="PSS"> Pacific island small states</option> <option value="PAK">Pakistan</option> <option value="PLW"> Palau</option> <option value="PAN"> Panama</option> <option value="PNG"> Papua New Guinea</option> <option value="PRY"> Paraguay</option> <option value="PER"> Peru</option> <option value="PHL"> Philippines</option> <option value="POL"> Poland</option> <option value="PRT"> Portugal</option> <option value="PRI"> Puerto Rico</option> <option value="QAT">Qatar</option> <option value="ROM"> Romania</option> <option value="RUS"> Russia</option> <option value="RWA"> Rwanda</option> <option value="WSM"> Samoa</option> <option value="SMR"> San Marino</option> <option value="STP"> São Tomé and Principe</option> <option value="SAU"> Saudi Arabia</option> <option value="SEN"> Senegal</option> <option value="SRB"> Serbia</option> <option value="SYC"> Seychelles</option> <option value="SLE"> Sierra Leone</option> <option value="SGP"> Singapore</option> <option value="SXM"> Sint Maarten (Dutch part)</option> <option value="SVK"> Slovak Republic</option> <option value="SVN"> Slovenia</option> <option value="SST"> Small states</option> <option value="SLB"> Solomon Islands</option> <option value="SOM"> Somalia</option> <option value="ZAF"> South Africa</option> <option value="SAS"> South Asia</option> <option value="SSD"> South Sudan</option> <option value="ESP"> Spain</option> <option value="LKA"> Sri Lanka</option> <option value="KNA"> St. Kitts and Nevis</option> <option value="LCA"> St. Lucia</option> <option value="MAF"> St. Martin (French part)</option> <option value="VCT"> St. Vincent and the Grenadines</option> <option value="SSF"> Sub-Saharan Africa (all income levels)</option> <option value="SSA"> Sub-Saharan Africa (developing only)</option> <option value="SDN"> Sudan</option> <option value="SUR"> Suriname</option> <option value="SWZ"> Swaziland</option> <option value="SWE"> Sweden</option> <option value="CHE"> Switzerland</option> <option value="SYR"> Syrian Arab Republic</option> <option value="TJK"> Tajikistan</option> <option value="TZA"> Tanzania</option> <option value="THA"> Thailand</option> <option value="BHS"> The Bahamas</option> <option value="GMB"> The Gambia</option> <option value="TMP"> Timor-Leste</option> <option value="TGO"> Togo</option> <option value="TON"> Tonga</option> <option value="TTO"> Trinidad and Tobago</option> <option value="TUN"> Tunisia</option> <option value="TUR"> Turkey</option> <option value="TKM"> Turkmenistan</option> <option value="TCA"> Turks and Caicos Islands</option> <option value="TUV"> Tuvalu</option> <option value="UGA"> Uganda</option> <option value="UKR"> Ukraine</option> <option value="ARE"> United Arab Emirates</option> <option value="GBR"> United Kingdom</option> <option value="USA"> United States</option> <option value="UMC"> Upper middle income</option> <option value="URY"> Uruguay</option> <option value="UZB"> Uzbekistan</option> <option value="VUT"> Vanuatu</option> <option value="VEN"> Venezuela</option> <option value="VNM"> Vietnam</option> <option value="VIR"> Virgin Islands</option> <option value="WBG"> West Bank and Gaza</option> <option value="WLD"> World</option> <option value="YEM"> Yemen</option> <option value="ZMB"> Zambia</option> <option value="ZWE"> Zimbabwe</option> <option value="AFG"> Afghanistan</option> <option value="ALB"> Albania</option> <option value="DZA"> Algeria</option> <option value="ASM">American Samoa</option> <option value="ADO"> Andorra</option> <option value="AGO"> Angola</option> <option value="ATG"> Antigua and Barbuda</option> <option value="ARB"> Arab World</option> <option value="ARG"> Argentina</option> <option value="ARM"> Armenia</option> <option value="ABW"> Aruba</option> <option value="AUS"> Australia</option> <option value="AUT"> Austria</option> <option value="AZE"> Azerbaijan</option> <option value="BHR"> Bahrain</option> <option value="BGD"> Bangladesh</option> <option value="BRB"> Barbados</option> <option value="BLR"> Belarus</option> <option value="BEL"> Belgium</option> <option value="BLZ"> Belize</option> <option value="BEN"> Benin</option> <option value="BMU"> Bermuda</option> <option value="BTN"> Bhutan</option> <option value="BOL"> Bolivia</option> <option value="BIH"> Bosnia and Herzegovina</option> <option value="BWA"> Botswana</option> <option value="BRA"> Brazil</option> <option value="BRN">Brunei</option> <option value="BGR"> Bulgaria</option> <option value="BFA"> Burkina Faso</option> <option value="BDI">Burundi</option> <option value="CPV"> Cabo Verde</option> <option value="KHM"> Cambodia</option> <option value="CMR"> Cameroon</option> <option value="CAN"> Canada</option> <option value="CSS"> Caribbean small states</option> <option value="CYM"> Cayman Islands</option> <option value="CAF"> Central African Republic</option> <option value="CEB"> Central Europe and the Baltics</option> <option value="TCD"> Chad</option> <option value="CHI"> Channel Islands</option> <option value="CHL"> Chile</option> <option value="COM"> Comoros</option> <option value="CHN"> China</option> <option value="COL"> Colombia</option> <option value="COM"> Comoros</option> <option value="COG"> Congo</option> <option value="CRI"> Costa Rica</option> <option value="CIV"> Côte dIvoire</option> <option value="HRV"> Croatia</option> <option value="CUB"> Cuba</option> <option value="CUW"> Curaçao</option> <option value="CYP"> Cyprus</option> <option value="CZE"> Czech Republic</option> <option value="PRK"> Dem. Peoples Rep. Korea</option> <option value="ZAR">Dem. Rep. Congo</option> <option value="DNK"> Denmark</option> <option value="DJI"> Djibouti</option> <option value="DMA"> Dominica</option> <option value="DOM"> Dominican Republic</option> <option value="EAS"> East Asia and Pacific (all income levels)</option> <option value="EAP"> East Asia and Pacific (developing only)</option> <option value="ECU">Ecuador</option> <option value="EGY">Egypt</option> <option value="SLV">El Salvador</option> <option value="GNQ">Equatorial Guinea</option> <option value="ERI"> Eritrea</option> <option value="EST"> Estonia</option> <option value="ETH"> Ethiopia</option> <option value="EMU"> Euro area</option> <option value="ECS"> Europe and Central Asia (all income levels)</option> <option value="ECA"> Europe and Central Asia (developing only)</option> <option value="EUU"> European Union</option> <option value="FRO"> Faeroe Islands</option> <option value="FJI"> Fiji</option> <option value="FIN"> Finland</option> <option value="HIC"> High income</option> <option value="LIC"> Low income</option> <option value="FCS"> Fragile and conflict affected situations</option> <option value="FRA"> France</option> <option value="PYF"> French Polynesia</option> <option value="GAB"> Gabon</option> <option value="GEO"> Georgia</option> <option value="DEU"> Germany</option> <option value="GHA"> Ghana</option> <option value="GRC"> Greece</option> <option value="GRL"> Greenland</option> <option value="GRD"> Grenada</option> <option value="GUM"> Guam</option> <option value="GTM"> Guatemala</option> <option value="GIN"> Guinea</option> <option value="GNB"> Guinea-Bissau</option> <option value="GUY"> Guyana</option> <option value="HTI"> Haiti</option> <option value="HPC"> Heavily indebted poor countries (HIPC)</option> <option value="NOC"> High income: nonOECD</option> <option value="OEC"> High income: OECD</option> <option value="HND"> Honduras</option> <option value="HKG"> Hong Kong SAR, China</option> <option value="HUN"> Hungary</option> <option value="ISL"> Iceland</option> <option value="IND"> India</option> <option value="IDN"> Indonesia</option> <option value="IRN"> Iran</option> <option value="IRQ"> Iraq</option> <option value="IRL"> Ireland</option> <option value="IMY"> Isle of Man</option> <option value="ISR"> Israel</option> <option value="ITA"> Italy</option> <option value="JAM"> Jamaica</option> <option value="JPN"> Japan</option> <option value="JOR"> Jordan</option> <option value="KAZ"> Kazakhstan</option> <option value="KEN"> Kenya</option> <option value="KIR"> Kiribati</option> <option value="KOR"> Korea</option> <option value="KSV"> Kosovo</option> <option value="KWT"> Kuwait</option> <option value="KGZ"> Kyrgyz Republic</option> <option value="LAO"> Lao PDR</option> <option value="LCN"> Latin America and Caribbean (all income levels)</option> <option value="LAC"> Latin America and Caribbean (developing only)</option> <option value="LVA"> Latvia</option> <option value="LDC"> Least developed countries: UN classification</option> <option value="LBN"> Lebanon</option> <option value="LSO"> Lesotho</option> <option value="LBR"> Liberia</option> <option value="LBY"> Libya</option> <option value="LIE"> Liechtenstein</option> <option value="LTU"> Lithuania</option> <option value="LMY"> Low and middle income</option> <option value="LMC"> Lower middle income</option> <option value="LUX"> Luxembourg</option> <option value="MAC"> Macao SAR, China</option> <option value="MKD"> Macedonia</option> <option value="MDG"> Madagascar</option> <option value="MWI"> Malawi</option> <option value="MYS"> Malaysia</option> <option value="MDV"> Maldives</option> <option value="MLI"> Mali</option> <option value="MLT"> Malta</option> <option value="MHL"> Marshall Islands</option> <option value="MRT"> Mauritania</option> <option value="MUS"> Mauritius</option> <option value="MEX"> Mexico</option> <option value="FSM"> Micronesia</option> <option value="MEA"> Middle East and North Africa (all income levels)</option> <option value="MNA"> Middle East and North Africa (developing only)</option> <option value="MIC"> Middle income</option> <option value="MDA"> Moldova</option> <option value="MCO"> Monaco</option> <option value="MNG"> Mongolia</option> <option value="MNE"> Montenegro</option> <option value="MAR"> Morocco</option> <option value="MOZ"> Mozambique</option> <option value="MMR"> Myanmar</option> <option value="NAM"> Namibia</option>
                            </select>
                            <errors will go here -->
                        <!-- </div>  -->

                        <div class="row">
                        <div id="syear-group" class="form-group col-md-6">
                            <label for="syear">Start Year</label>
                            <select type="text" class="form-control" name="syear" id="syear">
<?php

$STATEMENT = oci_parse($conn,"SELECT * from Year" );
oci_execute($STATEMENT);
echo '<option value="SEL">Select</option>'; 

while( ($res = oci_fetch_array($STATEMENT))) {

echo '<option value="'.$res['CODE']. '"\>' .$res['VALUE'] . '</option>';                                     
}    
?>                                  
                                <!-- <option value="1991">1990</option><option value="1990">1991</option><option value="1992">1992</option><option value="1993">1993</option><option value="1994">1994</option><option value="1995">1995</option><option value="1995">1995</option> <option value="1996">1996</option> <option value="1997">1997</option> <option value="1998">1998</option> <option value="1999">1999</option> <option value="2000">2000</option> <option value="2001">2001</option> <option value="2002">2002</option> <option value="2003">2003</option> <option value="2004">2004</option> <option value="2005">2005</option> <option value="2006">2006</option> <option value="2007">2007</option> <option value="2008">2008</option> <option value="2009">2009</option> <option value="2010">2010</option> <option value="2011">2011</option> <option value="2012">2012</option> <option value="2013">2013</option> <option value="2014">2014</option> <option value="2015">2015</option>  -->
                            </select>
                            <!-- errors will go here -->
                        </div>

                        <div id="eyear-group" class="form-group col-md-6">
                            <label for="eyear">End Year</label>
                            <select type="text" class="form-control" name="eyear" id="eyear">
<?php

$STATEMENT = oci_parse($conn,"SELECT * from Year" );
oci_execute($STATEMENT);
echo '<option value="SEL">Select</option>'; 

while( ($res = oci_fetch_array($STATEMENT))) {

echo '<option value="'.$res['CODE']. '"\>' .$res['VALUE'] . '</option>';                                     
}    
?>                                  
                                <!-- <option value="1990">1990</option><option value="1991">1991</option><option value="1992">1992</option><option value="1993">1993</option><option value="1994">1994</option><option value="1995">1995</option><option value="1995">1995</option> <option value="1996">1996</option> <option value="1997">1997</option> <option value="1998">1998</option> <option value="1999">1999</option> <option value="2000">2000</option> <option value="2001">2001</option> <option value="2002">2002</option> <option value="2003">2003</option> <option value="2004">2004</option> <option value="2005">2005</option> <option value="2006">2006</option> <option value="2007">2007</option> <option value="2008">2008</option> <option value="2009">2009</option> <option value="2010">2010</option> <option value="2011">2011</option> <option value="2012">2012</option> <option value="2013">2013</option> <option value="2014">2014</option> <option value="2015">2015</option> -->
                            </select>
                            <!-- errors will go here -->
                        </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit <span class="fa fa-arrow-right"></span></button>
                    </form>
                </div> 
                <div class="row">
                    <div class="col-md-6" id="c1"></div>
                    <div class="col-md-6" id="c2"></div>
                </div>

                <div class="row">
                    <div class="col-md-6" id="c3"></div>
                    <div class="col-md-6" id="c4"></div>
                </div>
                <div class="row">
                    <div id="save"></div>
                </div>


                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="exampleModalLabel">Save Your Result!</h4>
                      </div>
                      <div class="modal-body">
                        <form>
                          <div class="form-group">
                            <label for="result-name" class="control-label">Name</label>
                            <input type="text" class="form-control" id="result-name">
                          </div>
                          <div class="form-group">
                            <label for="description" class="control-label">Description</label>
                            <textarea class="form-control" id="Description"></textarea>
                          </div>
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save</button>
                      </div>
                    </div>
                  </div>
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

    <script src="correlation.js"></script> <!-- load our javascript file -->
    <!-- load our javascript file -->
    <!-- // <script src="jquery.chained.js"></script> -->
    <!-- HighCharts Charting Framework -->
    <script src="http://code.highcharts.com/highcharts.js"></script>
</body>
</html>