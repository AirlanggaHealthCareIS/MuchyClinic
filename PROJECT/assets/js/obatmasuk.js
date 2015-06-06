$(document).ready(function(){
	// alert('Tes');

	$('.pilih').click(function(index){
		// var i = $('.idobat')[id].val();
		var t = $(this).data("idobat");
		var u = $(this).data("namaobat");
		$('#idobatx').val(t);
		$('#namaobatx').val(u);
		//alert(t);		
	});
});