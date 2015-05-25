
function selesai(){
	$('#myModal').modal('show');
};

function simpan(){
	$('#myModal').modal('hide');
	var pasien = $( "#idpasien" ).val();
	var checkedValue = ""; 
	var inputElements = document.getElementsByClassName('ada');
	for(var i=0; inputElements[i]; ++i){
		if(inputElements[i].checked){
			checkedValue = checkedValue + " " + inputElements[i].value;
		}
	}
    $.ajax(
    {
		url : "http://localhost/psi3/obatkeluarresep/savetokeluar",
		type: "POST",
		data: {ada:checkedValue},
		dataType : "html",
		success: function(data, textStatus, jqXHR)
		{
			alert("sukses "+pasien+" dengan "+data);
		},
		error: function(jqXHR, textStatus, errorThrown)
		{
			alert("Request gagal");
		}
    });
};