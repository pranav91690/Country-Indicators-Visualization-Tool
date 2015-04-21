// country.js
function doPopulate(name){
     alert("doPopulate");
    var form = document.createuserform;
   

// process the form
$.ajax({
    type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
    url         : 'populate.php', // the url where we want to POST
    data        : ({topic1 : Health}), // our data object
    dataType    : 'json', // what type of data do we expect back from the server
    encode      : true
})



    // using the done promise callback
    .done(function(data) {

 alert("Inside done");
   
var select = document.getElementById("ind1");
for(var i = 0; i < data.actualdata.length; i++) {
    var opt = document.createElement('option');
    opt.text = data.actualdata[i];
    opt.value = data.actualdata[i];
    sel.appendChild(opt);

}

        }

}

function testResults(form)
{
    var str = form.stringn.value;
    var newString = "";
    var strList = str.split(" ");
    for(var i = 0; i < strList.length; i++){
        newWord = strList[i].charAt(0).toUpperCase() + strList[i].slice(1) + ".";       
        newString += newWord + " ";
    }
    document.write(newString);


