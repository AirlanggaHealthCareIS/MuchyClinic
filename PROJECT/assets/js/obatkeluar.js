
function selesai() {
    $('#myModal').modal('show');
}
;

function simpan() {
    $('#myModal').modal('hide');
    var pasien = $("#idpasien").val();
    var checkedValue = "";
    var subtotal = "";
    var inputElements = document.getElementsByClassName('ada');

    $(".subtotal").each(function(index) {
        if ($('.ada')[index].checked) {
            checkedValue = checkedValue + " " + $('.ada')[index].value;
        }
        ;
    });
// alert("cek = "+checkedValue+" /nsubtotal = "+subtotal);
    $.ajax(
            {
                url: "obatkeluarresep/savetokeluar",
                type: "POST",
                data: {ada: checkedValue, pasien: pasien, subtotal: subtotal},
                dataType: "html",
                success: function(data, textStatus, jqXHR)
                {
                    $("#papanpopup").html(data);
                    $('#myModal2').modal('show');
                },
                error: function(jqXHR, textStatus, errorThrown)
                {
                    // alert("Request gagal" + jqXHR);
                    $("#papanpopup").html(jqXHR+" "+textStatus+" "+errorThrown);
                    $('#myModal2').modal('show');
                }
            });
}
;

function refresh() {
    $('#myModal2').modal('hide');
}

var tot = 0;

$(document).ready(function() {
    $('.ada').change(function() {
    	var index = $(".ada").index(this);
    	if ($(this).is(':checked')) {
    		tot = tot + $(this).data('val');
	    } else {
    		tot = tot - $(this).data('val');
	    }
        $('#total').val(tot);
    });
});

function done_obat_keluar() {
    $('#myModal2').modal('hide');
// window.location.replace("obatkeluar");
    return true;
}