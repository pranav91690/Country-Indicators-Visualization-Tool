// magic.js
function doGo(did, id){
// alert(id);
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
success     : function(data){
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
    opt.value   = data.actualdata[i].code;
    opt.text    = data.actualdata[i].name;
    select.add(opt);
}
});

}// End Of Function doGo

$(document).ready(function() {

// process the Corellation Form
$('#correlationform').submit(function(event) {

    $('.form-group').removeClass('has-error'); // remove the error class
    $('.help-block').remove(); // remove the error text

    // Putting the Form Data in in a variable
    var formData = {
        'topic1'            : $('#topic1').val(),
        'indx'              : $('#indx').val(),
        'topic2'            : $('#topic2').val(),
        'indy'              : $('#indy').val(),
        'country1'          : $('#country1').val(),
        'country2'          : $('#country2').val(),
        'country3'          : $('#country3').val(),
        'country4'          : $('#country4').val(),
        // 'country5'          : $('#country5').val(),
        'syear'             : $('#syear').val(),
        'eyear'             : $('#eyear').val(),
    };

    // process the form
    $.ajax({
        type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
        url         : 'correlation.php', // the url where we want to POST
        data        : formData, // our data object
        dataType    : 'json', // what type of data do we expect back from the server
        encode      : true
    })
        // using the done promise callback
    .done(function(data) {
        
        if (! data.success){
            if (data.errors.topic1) {
                $('#topic1group').addClass('has-error'); // add the error class to show red input
                $('#topic1group').append('<div class="help-block">' + data.errors.topic1 + '</div>'); // add the actual error message under our input
            }

            if (data.errors.topic2) {
                $('#topic2group').addClass('has-error'); // add the error class to show red input
                $('#topic2group').append('<div class="help-block">' + data.errors.topic2 + '</div>'); // add the actual error message under our input
            }

            if (data.errors.indx) {
                $('#indxgroup').addClass('has-error'); // add the error class to show red input
                $('#indxgroup').append('<div class="help-block">' + data.errors.indx + '</div>'); // add the actual error message under our input
            }
            
            if (data.errors.indy) {
                $('#indygroup').addClass('has-error'); // add the error class to show red input
                $('#indygroup').append('<div class="help-block">' + data.errors.indy + '</div>'); // add the actual error message under our input
            }

            if (data.errors.country1) {
                $('#country-group1').addClass('has-error'); // add the error class to show red input
                $('#country-group1').append('<div class="help-block">' + data.errors.country1 + '</div>'); // add the actual error message under our input
            }

            if (data.errors.country2) {
                $('#country-group2').addClass('has-error'); // add the error class to show red input
                $('#country-group2').append('<div class="help-block">' + data.errors.country2 + '</div>'); // add the actual error message under our input
            }

            if (data.errors.country3) {
                $('#country-group3').addClass('has-error'); // add the error class to show red input
                $('#country-group3').append('<div class="help-block">' + data.errors.country3 + '</div>'); // add the actual error message under our input
            }

            if (data.errors.country4) {
                $('#country-group4').addClass('has-error'); // add the error class to show red input
                $('#country-group4').append('<div class="help-block">' + data.errors.country4 + '</div>'); // add the actual error message under our input
            }

            // if (data.errors.country5) {
            //     $('#country-group5').addClass('has-error'); // add the error class to show red input
            //     $('#country-group5').append('<div class="help-block">' + data.errors.country5 + '</div>'); // add the actual error message under our input
            // }                                    

            if (data.errors.syear) {
                $('#syear-group').addClass('has-error'); // add the error class to show red input
                $('#syear-group').append('<div class="help-block">' + data.errors.syear + '</div>'); // add the actual error message under our input
            }

            if (data.errors.eyear) {
                $('#eyear-group').addClass('has-error'); // add the error class to show red input
                $('#eyear-group').append('<div class="help-block">' + data.errors.eyear + '</div>'); // add the actual error message under our input
            }            
        }
        else {

            // for(var k in data.PDATA){
            //     alert(data.PDATA[k]);
            // }
            // Process Data:
            var country1 = []; // Country 1 Data
            var country2 = [];
            var country3 = [];
            var country4 = [];
            // var country5 = [];

            var c1x = data.actualdata.country1.xind; // Country1 X Data
            var c2x = data.actualdata.country2.xind;
            var c3x = data.actualdata.country3.xind;
            var c4x = data.actualdata.country4.xind;
            // var c5x = data.actualdata.country5.xind;

            var c1y = data.actualdata.country1.yind; // Country 1 Y Data
            var c2y = data.actualdata.country2.yind;
            var c3y = data.actualdata.country3.yind;
            var c4y = data.actualdata.country4.yind;
            // var c5y = data.actualdata.country5.yind;

            
            // Country1
            for (var k=0; k<c1x.length; k++){
                if ( Number(c1x[k]) != 0 && Number(c1y[k]) != 0 ){
                    var name = Number($('#syear').val()) + k;
                    country1[k] = {x: Number(c1x[k]),y: Number(c1y[k]), name: name};
                }
            }
            
            // Country2
            for (var k=0; k<c2x.length; k++){
                if (Number(c2x[k]) != 0 && Number(c2y[k]) != 0){
                    var name = Number($('#syear').val()) + k;
                    country2[k] = {x: Number(c2x[k]),y: Number(c2y[k]), name: name};
                }
            }

            // Country3
            for (var k=0; k<c3x.length; k++){
                if (Number(c3x[k]) != 0 && Number(c3y[k]) != 0){
                    var name = Number($('#syear').val()) + k;
                    country3[k] = {x: Number(c3x[k]),y: Number(c3y[k]), name: name};
                }
            }

            // Country4
            for (var k=0; k<c4x.length; k++){
                if (Number(c4x[k]) != 0 && Number(c4y[k]) != 0){
                    var name = Number($('#syear').val()) + k;
                    country4[k] = {x: Number(c4x[k]),y: Number(c4y[k]), name: name};
                }
            }

            // COuntry5
            // for (var k=0; k<c1x.length; k++){
            //     var name = Number($('#eyear').val()) + k;
            //     country5[k] = {x: Number(c5x[k]),y: Number(c5y[k]), name: name};
            // }
            
            //handle the returned data here
            if (country1.length != 0){
            $('#c1').highcharts({
                chart: {
                    type: 'line'
                },
                title: {
                    text: 'Time Line'
                },
                xAxis: {
                    title: {
                        text: $('#indx').text()
                    }
                },
                yAxis: {
                    title: {
                        text: $('#indx').text()
                    }
                },
                plotOptions: {
                    line: {
                        dataLabels: {
                            enabled:true,
                            formatter:function(){
                                return this.point.name;
                            }
                        }
                    }
                },
                series: [{
                    name: $('#country1').text(),
                    data: country1
                }]
            });
            }else{
            $('#c1').text = "No Data for this Country";   
            }

            if (country2.length != 0){
            $('#c2').highcharts({
                chart: {
                    type: 'line'
                },
                title: {
                    text: 'Time Line'
                },
                xAxis: {
                    title: {
                        text: 'IndicatorX'
                    }
                },
                yAxis: {
                    title: {
                        text: 'IndicatorY'
                    }
                },
                plotOptions: {
                    line: {
                        dataLabels: {
                            enabled:true,
                            formatter:function(){
                                return this.point.name;
                            }
                        }
                    }
                },
                series: [{
                    name: $('#country2').val(),
                    data: country2
                }]
            });
            }else{
            $('#c2').text = "No Data for this Country";   
            }

            if (country3.length != 0){
            $('#c3').highcharts({
                chart: {
                    type: 'line'
                },
                title: {
                    text: 'Time Line'
                },
                xAxis: {
                    title: {
                        text: 'IndicatorX'
                    }
                },
                yAxis: {
                    title: {
                        text: 'IndicatorY'
                    }
                },
                plotOptions: {
                    line: {
                        dataLabels: {
                            enabled:true,
                            formatter:function(){
                                return this.point.name;
                            }
                        }
                    }
                },
                series: [{
                    name: $('#country3').val(),
                    data: country3
                }]
            });
            }else{
            $('#c3').text = "No Data for this Country";   
            }

            if (country4.length != 0){
            $('#c4').highcharts({
                chart: {
                    type: 'line'
                },
                title: {
                    text: 'Time Line'
                },
                xAxis: {
                    title: {
                        text: 'IndicatorX'
                    }
                },
                yAxis: {
                    title: {
                        text: 'IndicatorY'
                    }
                },
                plotOptions: {
                    line: {
                        dataLabels: {
                            enabled:true,
                            formatter:function(){
                                return this.point.name;
                            }
                        }
                    }
                },
                series: [{
                    name: $('#country4').val(),
                    data: country4
                }]
            });
            }else{
            $('#c4').text = "No Data for this Country";   
            }

            if (country4.length != 0 || country2.length || country3.length || country1.length){
            $('#save').text("Save");
            $('#save').attr("type","button");
            $('#save').attr("class","btn btn-primary col-md-2 col-md-offset-5");
            $('#save').attr("data-toggle","modal");
            $('#save').attr("data-target","#exampleModal");
            }else{
            $('#save').text("No Data For the Given Input");
            }
            // $('#save').attr("data-whatever","@mdo");
        }

    });

    // stop the form from submitting the normal way and refreshing the page
    event.preventDefault();
});

// For Chained Topic/Indicator Values
// $("#indx").chained("#topic1");
// $("#indy").chained("#topic2");
});