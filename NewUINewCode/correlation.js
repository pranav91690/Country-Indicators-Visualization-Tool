// magic.js
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
        'country5'          : $('#country5').val(),
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
        alert("Reaches JS File");
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

            if (data.errors.country5) {
                $('#country-group5').addClass('has-error'); // add the error class to show red input
                $('#country-group5').append('<div class="help-block">' + data.errors.country5 + '</div>'); // add the actual error message under our input
            }                                    

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
            alert(data.actualdata.table1);
            // alert(data.actualdata.table2);
            // alert("Comes Back from PHP");
            
            var country1 = [{x:1,y:4,name:'2004'},{x:2,y:8,name:'2005'},{x:5,y:4,name:'2006'}];
            var country2 = [{x:1,y:6,name:'2004'},{x:2,y:7,name:'2005'},{x:5,y:13,name:'2006'}];
            // handle the returned data here
            $('#ajax').highcharts({
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
                    name: "Country1",
                    data: country1
                },
                {
                    name: "Country2",
                    data: country2
                }]
            });
        }

    });

    // stop the form from submitting the normal way and refreshing the page
    event.preventDefault();
});

// For Chained Topic/Indicator Values
$("#indx").chained("#topic1");
$("#indy").chained("#topic2");
});