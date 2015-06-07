function selesai2(){
	$('#myModal').modal('show');
};

function simpan2(){
	$('#myModal').modal('hide');

	var checkedValue = ""; 
	$( ".ada" ).each(function( index ) { // ambil id
		if ($('.ada')[index].checked) {
			checkedValue = checkedValue + " " + $('.ada')[index].value;
		   	// subtotal = subtotal + " " + ($( this ).text());
		};
	});


	var tgl_masuk = "";
	$(".tanggal").each(function( index ){ // ambil tanggal
		if ($('.ada')[index].checked) {
			tgl_masuk = tgl_masuk + " " + $(this).data("tgl"); //$(".tanggal")[index].value;
		}
	});

	var id_kamar = "";
	$(".kamar").each(function( index ){ // ambil kamar
		if ($('.ada')[index].checked) {
			id_kamar = id_kamar + " " + $(this).data("kmr");
		}
	});

	// alert(tgl_masuk);
    $.ajax(
    {
		url : "http://localhost/psi2/crawatinap/update_data_mawar",
		type: "POST",
		data: {ada:checkedValue, tanggal:tgl_masuk, kamar:id_kamar},
		dataType : "html",
		success: function(data, textStatus, jqXHR)
		{
			// alert("Sukses besar");
			location.reload();
			// console.log(data);
			// $("#ri").html(data);
		},
		error: function(jqXHR, textStatus, errorThrown)
		{
			alert("Request gagal"+jqXHR);
		}
    });

};