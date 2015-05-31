
function selesai(){
	$('#myModal').modal('show');
};

function simpan(){
	$('#myModal').modal('hide');
	var pasien = $( "#idpasien" ).val();
	var checkedValue = ""; 
	var subtotal = "";
	var inputElements = document.getElementsByClassName('ada');
	// for(var i=0; inputElements[i]; ++i){
	// 	if(inputElements[i].checked){
	// 		checkedValue = checkedValue + " " + inputElements[i].value;
	// 	}
	// }

	$( ".subtotal" ).each(function( index ) {
		if ($('.ada')[index].checked) {
			checkedValue = checkedValue + " " + $('.ada')[index].value;
		   	// subtotal = subtotal + " " + ($( this ).text());
		};
	});
	// alert("cek = "+checkedValue+" /nsubtotal = "+subtotal);
    $.ajax(
    {
		url : "http://localhost/psi3/obatkeluarresep/savetokeluar",
		type: "POST",
		data: {ada:checkedValue, pasien:pasien, subtotal:subtotal},
		dataType : "html",
		success: function(data, textStatus, jqXHR)
		{
			alert(data);
		},
		error: function(jqXHR, textStatus, errorThrown)
		{
			alert("Request gagal"+jqXHR);
		}
    });
};