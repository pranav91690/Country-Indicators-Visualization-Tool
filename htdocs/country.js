// country.js
function doGo(did, id){
     alert(id);
      // alert(did);
    var dropdown = document.getElementById(did);
    var selectedValue = dropdown.options[dropdown.selectedIndex].value;
    // alert(selectedValue);

 $.ajax({
    type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
    url         : 'populate.php', // the url where we want to POST
    data        : ({topic1 : selectedValue}), // our data object
    dataType    : 'json', // what type of data do we expect back from the server
    encode      : true,
    success     : function(data)
                    {
                       // alert("success");
                       // alert(JSON.stringify(data));
                        // alert(data.actualdata.length);
                        
                    }
}).done(function( data ) {

  // alert("Inside done");


var select = document.getElementById(id);

    for(var i=select.options.length-1; i>=0; i--)
    {
        select.remove(i);
    }

for(var i = 0; i < data.actualdata.length; i++) {
    var opt = document.createElement("option");
   // alert(data.actualdata[i].code);
    opt.text = data.actualdata[i].name;
    select.add(opt);
}
});

}

function validateForm() {
    var t1 = document.forms["myform"]["topic1"].value;
    var i1 = document.forms["myform"]["ind1"].value;
    var v1= document.forms["myform"]["val1"].value;

    var t2= document.forms["myform"]["topic2"].value;
    var i2 = document.forms["myform"]["ind2"].value;
    var v2= document.forms["myform"]["val2"].value;

    var t3= document.forms["myform"]["topic3"].value;
    var i3= document.forms["myform"]["ind3"].value;
    var v3 = document.forms["myform"]["val3"].value;

    var t4 = document.forms["myform"]["topic4"].value;
    var i4= document.forms["myform"]["ind4"].value;
    var v4 = document.forms["myform"]["val4"].value;

    if ( (t1 != null && i1 !=null && v1 !=null) || (t2 != null && i2 !=null && v2 !=null) ||
     (t3 != null && i3 !=null && v3 !=null) || (t4 != null && i4 !=null && v4 !=null)) {
        alert ("validated");
    return true;
    }else{
        document.getElementById('errorMsg').innerHTML = "error msg";
        return false;
    }
}


$(document).ready(function() {
  

// process the Corellation Form
$('#countryform').submit(function(event) {

 alert("Submitted");


// Putting the Form Data in in a variable
var formData = {
    'topic1'            : $('input[name=topic1]').val(),
    'ind1'              : $('input[name=ind1]').val(),
    'cond1'             : $('input[name=cond1]').val,
    'val1'               : $('input[name=val1]').val,
    'topic2'            : $('input[name=topic2]').val(),
    'ind2'              : $('input[name=ind2]').val(),
    'cond2'             : $('input[name=cond2]').val,
    'val2'               : $('input[name=val2]').val,
    'topic3'            : $('input[name=topic3]').val(),
    'ind3'              : $('input[name=ind3]').val(),
    'cond3'             : $('input[name=cond3]').val,
    'val3'               : $('input[name=val3]').val,
    'topic4'            : $('input[name=topic4]').val(),
    'indx4'              : $('input[name=ind4]').val(),
    'cond4'             : $('input[name=cond4]').val,
    'val4'               : $('input[name=val4]').val,
    'syear'             : $('input[name=syear]').val(),
};


// process the form
$.ajax({
    type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
    url         : 'country.php', // the url where we want to POST
    data        : formData, // our data object
    dataType    : 'json', // what type of data do we expect back from the server
    encode      : true
    success     : function(data)
                    {
                        alert("success");
                       alert(JSON.stringify(data));
                      // alert(data.actualdata.length);
                        
                    }

})
    // using the done promise callback
    .done(function(data) {


    // Indicator 1
    $('#inddiv1').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Monthly Average Rainfall'
        },
        subtitle: {
            text: 'Source: WorldClimate.com'
        },
        xAxis: {
            categories: [
                'Jan',
                'Feb',
                'Mar',
                'Apr',
                'May',
                'Jun',
                'Jul',
                'Aug',
                'Sep',
                'Oct',
                'Nov',
                'Dec'
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Rainfall (mm)'
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
            name: 'Tokyo',
            data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]

        }, {
            name: 'New York',
            data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3]

        }, {
            name: 'London',
            data: [48.9, 38.8, 39.3, 41.4, 47.0, 48.3, 59.0, 59.6, 52.4, 65.2, 59.3, 51.2]

        }, {
            name: 'Berlin',
            data: [42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4, 60.4, 47.6, 39.1, 46.8, 51.1]

        }]
    });

    //Indicator2
    $('#inddiv2').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Monthly Average Rainfall'
        },
        subtitle: {
            text: 'Source: WorldClimate.com'
        },
        xAxis: {
            categories: [
                'Jan',
                'Feb',
                'Mar',
                'Apr',
                'May',
                'Jun',
                'Jul',
                'Aug',
                'Sep',
                'Oct',
                'Nov',
                'Dec'
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Rainfall (mm)'
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
            name: 'Tokyo',
            data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]

        }, {
            name: 'New York',
            data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3]

        }, {
            name: 'London',
            data: [48.9, 38.8, 39.3, 41.4, 47.0, 48.3, 59.0, 59.6, 52.4, 65.2, 59.3, 51.2]

        }, {
            name: 'Berlin',
            data: [42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4, 60.4, 47.6, 39.1, 46.8, 51.1]

        }]
    });
    
    // Indicator3
    $('#inddiv3').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Monthly Average Rainfall'
        },
        subtitle: {
            text: 'Source: WorldClimate.com'
        },
        xAxis: {
            categories: [
                'Jan',
                'Feb',
                'Mar',
                'Apr',
                'May',
                'Jun',
                'Jul',
                'Aug',
                'Sep',
                'Oct',
                'Nov',
                'Dec'
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Rainfall (mm)'
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
            name: 'Tokyo',
            data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]

        }, {
            name: 'New York',
            data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3]

        }, {
            name: 'London',
            data: [48.9, 38.8, 39.3, 41.4, 47.0, 48.3, 59.0, 59.6, 52.4, 65.2, 59.3, 51.2]

        }, {
            name: 'Berlin',
            data: [42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4, 60.4, 47.6, 39.1, 46.8, 51.1]

        }]
    });

    //Indicator4
    $('#inddiv4').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Monthly Average Rainfall'
        },
        subtitle: {
            text: 'Source: WorldClimate.com'
        },
        xAxis: {
            categories: [
                'Jan',
                'Feb',
                'Mar',
                'Apr',
                'May',
                'Jun',
                'Jul',
                'Aug',
                'Sep',
                'Oct',
                'Nov',
                'Dec'
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Rainfall (mm)'
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
            name: 'Tokyo',
            data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]

        }, {
            name: 'New York',
            data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3]

        }, {
            name: 'London',
            data: [48.9, 38.8, 39.3, 41.4, 47.0, 48.3, 59.0, 59.6, 52.4, 65.2, 59.3, 51.2]

        }, {
            name: 'Berlin',
            data: [42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4, 60.4, 47.6, 39.1, 46.8, 51.1]

        }]
    });

});

// stop the form from submitting the normal way and refreshing the page
event.preventDefault();
});

// For Chained Topic/Indicator Values
});