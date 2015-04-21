// country.js
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
   opt.value = data.actualdata[i].code;
   opt.text = data.actualdata[i].name;
   select.add(opt);
}
});

            }



// .js
$(document).ready(function() {

// process the Corellation Form
$('#genderform').submit(function(event) {
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
    // 'country5'          : $('input[name=country5]').val(),
    'syear'             : $('input[name=syear]').val(),
    'eyear'             : $('input[name=eyear]').val(),
};

// process the form
$.ajax({
    type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
    url         : 'gender.php', // the url where we want to POST
    data        : formData, // our data object
    dataType    : 'json', // what type of data do we expect back from the server
    encode      : true
})
    // using the done promise callback
    .done(function(data) {
        // handle the returned data here
    $('#ajax').highcharts({
        chart: {
            type: 'bar'
        },
        title: {
            text: 'Historic World Population by Region'
        },
        subtitle: {
            text: 'Source: Wikipedia.org'
        },
        xAxis: {
            categories: ['Africa', 'America', 'Asia', 'Europe', 'Oceania'],
            title: {
                text: null
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Population (millions)',
                align: 'high'
            },
            labels: {
                overflow: 'justify'
            }
        },
        tooltip: {
            valueSuffix: ' millions'
        },
        plotOptions: {
            bar: {
                dataLabels: {
                    enabled: true
                }
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'top',
            x: -40,
            y: 100,
            floating: true,
            borderWidth: 1,
            backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
            shadow: true
        },
        credits: {
            enabled: false
        },
        series: [{
            name: 'Year 1800',
            data: [107, 31, 635, 203, 2]
        }, {
            name: 'Year 1900',
            data: [133, 156, 947, 408, 6]
        }, {
            name: 'Year 2008',
            data: [973, 914, 4054, 732, 34]
        }]
    });

});

// stop the form from submitting the normal way and refreshing the page
event.preventDefault();
});

// For Chained Topic/Indicator Values
});