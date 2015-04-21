// magic.js
$(document).ready(function() {

// For Chained Topic/Indicator Values
$("#indx").chained("#topic1");
$("#indy").chained("#topic2");
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

    alert("Reaches here");

    // process the form
    $.ajax({
        type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
        url         : 'correlation.php', // the url where we want to POST
        data        : formData, // our data object
        dataType    : 'json', // what type of data do we expect back from the server
        encode      : true
    })
    //     // using the done promise callback
    .done(function(data) {
            // alert(JSON.parse(data));
            // jQuery.each(data.actualdata,function(i,val){
            //     alert(val);
            // });
            alert("Reaches after the PHP Call");
            var country1 = [{x:1,y:4,name:'2004'},{x:2,y:8,name:'2005'},{x:5,y:4,name:'2006'}];
            var country2 = [{x:1,y:6,name:'2004'},{x:2,y:7,name:'2005'},{x:5,y:13,name:'2006'}];
            var country3 = [{x:1,y:12,name:'2004'},{x:2,y:22,name:'2005'},{x:5,y:45,name:'2006'}];
            var country4 = [{x:1,y:13,name:'2004'},{x:2,y:44,name:'2005'},{x:5,y:55,name:'2006'}];
            var country5 = [{x:1,y:4,name:'2004'},{x:2,y:21,name:'2005'},{x:5,y:41,name:'2006'}];
            // var country1 = data.c1;
            // var country2 = data.c2;
            // var country3 = data.c3;
            // var country4 = data.c4;
            // var country5 = data.c5;

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
                    name: "C1",//formData['country1'],
                    data: country1
                },
                {
                    name: "C2",//formData.['country2'],
                    data: country2
                },
                {
                    name: "C3",//formData.['country3'],
                    data: country3
                },
                {
                    name: "C4",//formData.['country4'],
                    data: country4
                },
                {
                    name: "C5",//formData.['country5'],
                    data: country5
                }]
            });

    });

    // // stop the form from submitting the normal way and refreshing the page
    event.preventDefault();
});
});