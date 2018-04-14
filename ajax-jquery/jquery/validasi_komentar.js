function pindah(waktu, pindah){
	var interval = setInterval(function(){
		waktu  = waktu - 1;
		if(waktu==0) {
			clearInterval(interval);
			window.location= pindah;
		}
    	}, 1000);
}
$(document).ready(function() {
//// Start Contact Form ////
	$('#ajaxcontactform').submit(function(){$('input[type=submit]', this).attr('disabled', 'disabled');});
	$('#ajaxcontactform').submit(
	
		function parseResponse() {
	
			var nama = $("#nama");
			var email = $("#email");
			var konten = $("#konten");
			var contactformid = $("#contactformid");
			
				var emailReg = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
				var valid = emailReg.test(email.val());
			
			  if (nama.val() == "") {				  
				   $("#contactwarning").html('<p class="rejectionalert"><span>Silahkan masukan nama lengkap anda !</span></p>').slideDown().delay(4000).slideUp();
				   $('input[type=submit]', $("#ajaxcontactform")).removeAttr('disabled');
				   return false;			   
			  }
			  else if (email.val() == "" || !valid) {
				   $("#contactwarning").html('<p class="rejectionalert"><span>Masukan alamat email anda dengan benar !!</span></p>').slideDown().delay(2000).slideUp();
				   $('input[type=submit]', $("#ajaxcontactform")).removeAttr('disabled');
				   return false;
			  }
			  else if (konten.val() == "") {
				   $("#contactwarning").html('<p class="rejectionalert"><span>Masukan isi pesan anda !</span></p>').slideDown().delay(2000).slideUp();
				   $('input[type=submit]', $("#ajaxcontactform")).removeAttr('disabled');
				   return false;
			  }

					
                                var form_data = {
                                    id_berita: $("#id_berita").val(),
                                    nama: $("#nama").val(),
                                    email: $("#email").val(),
                                    konten: $("#konten").val(),
                                    is_ajax : 1
			};
			$.ajax({
				type: "POST",
				url: $(this).attr('action'),
				data: form_data,
				success: function(response)
				{
					if(response == "success") {
                                                    $("#hide-form").fadeOut(1000, function(){
                                                    $('#contactajax').html('<center><p class="success"><p class="sukses">Komentar anda berhasil dikirim, dan akan segera kami konfirmasi terlebih dahulu..</p></center>');
                                                    $('#contactajax').slideDown().delay(10000).slideUp();
                                                    $("#nama").val('');
                                                    $("#email").val('');
                                                    $("#konten").val('');
                                                    pindah(11,'');

                                                });   
                                    }
                                                else {
                                                    $("#hide-form").fadeOut(1000, function(){
                                                    $('#contactajax').html('<center><p class="success"><p class="sukses">Komentar anda berhasil dikirim, dan akan segera kami konfirmasi terlebih dahulu..</p></center>');
                                                    $('#contactajax').slideDown().delay(10000).slideUp();
                                                    $("#nama").val('');
                                                    $("#email").val('');
                                                    $("#konten").val('');
                                                    pindah(11,'');
                                                });
                                    }
                                }
                    });
			return false;			  
		  }
	  
	  );
//// End Contact Form ////

 });