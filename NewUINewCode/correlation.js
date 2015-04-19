// magic.js
$(document).ready(function() {

// process the Corellation Form
$('#correlationform').submit(function(event) {
    // Putting the Form Data in in a variable
    var formData = {
        'topic1'            : $('input[name=topic1]').val(),
        'indx'              : $('input[name=indx]').val(),
        'topic2'            : $('input[name=topic2]').val(),
        'indy'              : $('input[name=indy]').val(),
        'country1'          : $('input[name=country1]').val(),
        'country2'          : $('input[name=country2]').val(),
        'country3'          : $('input[name=country3]').val(),
        'country4'          : $('input[name=country4]').val(),
        'country5'          : $('input[name=country5]').val(),
        'syear'             : $('input[name=syear]').val(),
        'eyear'             : $('input[name=eyear]').val(),
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
            alert("Reaches Here");
            alert(JSON.parse(data));
            // jQuery.each(data,function(){
            //     alert(data.actualdata);
            // });
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
                    data: [{x:1,y:4,name:'2004'},{x:2,y:8,name:'2005'},{x:5,y:4,name:'2006'}]
                },
                {
                    name: "Country2",
                    data: [{x:1,y:7,name:'2004'},{x:2,y:19,name:'2005'},{x:5,y:23,name:'2006'}],
                }]
            });

    });

    // stop the form from submitting the normal way and refreshing the page
    event.preventDefault();
});

// For Chained Topic/Indicator Values
$("#indx").chained("#topic1");
});