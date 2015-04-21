// country.js
function doGo(did, id){

var dropdown = document.getElementById(did);
var selectedValue = dropdown.options[dropdown.selectedIndex].value;


$.ajax({
type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
url         : 'populate.php', // the url where we want to POST
data        : ({topic1 : selectedValue}), // our data object
dataType    : 'json', // what type of data do we expect back from the server
encode      : true,
success     : function(data){
            }
}).done(function( data ) {

var select = document.getElementById(id);

for(var i=select.options.length-1; i>=0; i--)
{
select.remove(i);
}

for(var i = 0; i < data.actualdata.length; i++) {
    var opt = document.createElement("option");
   // alert(data.actualdata[i].code);
   opt.value = data.actualdata[i].code;
   opt.text = data.actualdata[i].name;
   select.add(opt);
}
});
}


$(document).ready(function() {


// process the Corellation Form
$('#countryform').submit(function(event) {

// Remove the Errors
    $('.form-group').removeClass('has-error'); // remove the error class
    $('.help-block').remove(); // remove the error text

// Putting the Form Data in in a variable
var formData = {
    'topic1'            : $('#topic1').val(),
    'ind1'              : $('#ind1').val(),
    'cond1'             : $('#cond1').val(),
    'val1'              : $('#val1').val(),
    'topic2'            : $('#topic2').val(),
    'ind2'              : $('#ind2').val(),
    'cond2'             : $('#cond2').val(),
    'val2'              : $('#val2').val(),
    'topic3'            : $('#topic3').val(),
    'ind3'              : $('#ind3').val(),
    'cond3'             : $('#cond3').val(),
    'val3'              : $('#val3').val(),
    'topic4'            : $('#topic4').val(),
    'ind4'              : $('#ind4').val(),
    'cond4'             : $('#cond4').val(),
    'val4'              : $('#val4').val(),
    'syear'             : $('#syear').val(),
};
// alert (formData);

// process the form
$.ajax({
    type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
    url         : 'country.php', // the url where we want to POST
    data        : formData, // our data object
    dataType    : 'json', // what type of data do we expect back from the server
    encode      : true

}).done(function(data) {

if (! data.success) {
    $('#topic1group').addClass('has-error'); // add the error class to show red input
    $('#topic1group').append('<div class="help-block">' + data.errors.topic1 + '</div>'); // add the actual error message under our input
    $('#ind1group').addClass('has-error'); // add the error class to show red input
    $('#ind1group').append('<div class="help-block">' + data.errors.ind1 + '</div>'); // add the actual error message under our input
    $('#cond1group').addClass('has-error'); // add the error class to show red input
    $('#cond1group').append('<div class="help-block">' + data.errors.cond1 + '</div>'); // add the actual error message under our input
    $('#value1group').addClass('has-error'); // add the error class to show red input
    $('#value1group').append('<div class="help-block">' + data.errors.value1 + '</div>'); // add the actual error message under our input
}else{

var categories = [];
var idata1     = [];
var idata2     = [];
var idata3     = [];
var idata4     = [];

for( var i in data.actualdata){
    var cdata = data.actualdata[i];
    categories.push(String(cdata['cty']));
    idata1.push(Number(cdata['data1']));
    idata2.push(Number(cdata['data2']));
    idata3.push(Number(cdata['data3']));
    idata4.push(Number(cdata['data4']));
}
// Check if Data Exists for the Given Condition
if(data.actualdata.length){
    // Indicator 1
    $('#inddiv1').highcharts({
        chart: {
            type: 'column'
        },
        xAxis: {
            categories: categories,
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: $('#ind1').text()
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            // name of country , and list of data
            data: idata1//, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]
        }]
    });

    //Indicator2
    $('#inddiv2').highcharts({
        chart: {
            type: 'column'
        },
        xAxis: {
            categories: categories,
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: $('#ind2').val()
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            data: idata2

        }]
    });

    // Indicator3
    $('#inddiv3').highcharts({
        chart: {
            type: 'column'
        },
        xAxis: {
            categories: categories,
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: $('#ind3').val()
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            data: idata3
        }]
    });

    //Indicator4
    $('#inddiv4').highcharts({
        chart: {
            type: 'column'
        },
        xAxis: {
            categories: categories,
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: $('#ind4').val()
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            data: idata4

        }]
    });

// Save Button
    $('#save').text("Save");
    $('#save').attr("type","button");
    $('#save').attr("class","btn btn-primary col-md-2 col-md-offset-5");
    $('#save').attr("data-toggle","modal");
    $('#save').attr("data-target","#exampleModal");
}else{
$('#indiv1').text = "No Data for this Country";  
}// End of No Data Check
}// End of Validation Check
});// End of AJAX Call

// stop the form from submitting the normal way and refreshing the page
event.preventDefault();
});
});