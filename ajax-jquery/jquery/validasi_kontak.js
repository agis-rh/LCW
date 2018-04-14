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
			var subjek = $("#subjek");
			var email = $("#email");
                        var web = $("#web");
			var konten = $("#konten");
			var contactformid = $("#contactformid");
			var url = "kontak.php";
			
				var emailReg = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
				var valid = emailReg.test(email.val());
			
			  if (nama.val() == "") {				  
				   $("#contactwarning").html('<p class="rejectionalert"><span>Silahkan masukan nama lengkap anda !</span></p>').slideDown().delay(4000).slideUp();
				   $('input[type=submit]', $("#ajaxcontactform")).removeAttr('disabled');
				   return false;			   
			  }
                          else if (subjek.val() == "") {
				   $("#contactwarning").html('<p class="rejectionalert"><span>Masukan subjek pesan anda !</span></p>').slideDown().delay(2000).slideUp();
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
                                    nama: $("#nama").val(),
                                    subjek: $("#subjek").val(),
                                    email: $("#email").val(),
                                    web: $("#web").val(),
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
                                                    $('#contactajax').html('<center><p class="success"><p class="sukses">Pesan anda berhasil dikirim, terima kasih telah menghubungi kami...</p></center>');
                                                    $('#contactajax').slideDown().delay(5000).slideUp();
                                                    $("#nama").val('');
                                                    $("#subjek").val('');
                                                    $("#email").val('');
                                                    $("#web").val('');
                                                    $("#konten").val('');
                                                    pindah(6,'');

                                                });   
                                    }
                                                else {
                                                    $("#hide-form").fadeOut(1000, function(){
                                                    $('#contactwarning').html('<p class="rejectionalert"><span>Pesan anda gagal dikirim, silahkan untuk mencoba kembali beberap saat lagi..!</span></p>');
                                                    $('#contactwarning').slideDown().delay(10000).slideUp();
                                                    $("#nama").val('');
                                                    $("#subjek").val('');
                                                    $("#email").val('');
                                                    $("#web").val('');
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