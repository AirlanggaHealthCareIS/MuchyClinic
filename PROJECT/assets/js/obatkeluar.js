
// 	$( document ).ready(function() {
//     console.log( "ready!" );
// });
var varselesai;
function selesai(){
	var checkedValue = ""; 
	var inputElements = document.getElementsByClassName('ada');
	for(var i=0; inputElements[i]; ++i){
	      if(inputElements[i].checked){
	           checkedValue = checkedValue + " " + inputElements[i].value;
	      }
	}
	alert("checkedValue = "+checkedValue);
};