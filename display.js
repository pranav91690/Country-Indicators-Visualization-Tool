// country.js
function doDisplay(){
     alert("working");

 

    $.ajax({
    type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
    url         : 'displayCount.php', // the url where we want to POST
    dataType    : 'json', // what type of data do we expect back from the server
    encode      : true,

   }).done(function( data ) {

   alert("Got it");


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