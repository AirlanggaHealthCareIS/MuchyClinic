
function selesai(){
	var checkedValue = ""; 
	var inputElements = document.getElementsByClassName('ada');
	for(var i=0; inputElements[i]; ++i){
	      if(inputElements[i].checked){
	           checkedValue = checkedValue + " " + inputElements[i].value;
	      }
	}
	alert("checkedValue = "+checkedValue);

	// var formData = {uip:<?php echo $this->id; ?>, jawaban:jawaban};
 //    $.ajax(
 //    {
 //      url : "functions/save_jawaban.php",
 //      type: "POST",
 //      data : formData,
 //      dataType : "json",
 //      success: function(data, textStatus, jqXHR)
 //      {
 //        $('#info').html(data);
 //      },
 //      error: function(jqXHR, textStatus, errorThrown)
 //      {
 //        $('#info').html("DISSCONNECT");
 //      }
 //    });
};