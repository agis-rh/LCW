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
	$('#ajaxsearchform').submit(
	
		function parseResponse() {
			  if ($("#keyword").val() == '') {
				   alert('Isi dulu kata kuncinya');
			  }
                          else {
                              var form_data = {
                                  keyword: $("#keyword").val(),
                                  is_ajax : 1
                              }
			};
			$.ajax({
				type: "POST",
				url: $(this).attr('action'),
				data: form_data,
				success: function(response)
				{
					if(response == "success") {
                                                    $('.hasil-search').fadeIn(2000);
                                                    pindah(11,'');   
                                    }
                                                else {
                                                    $('.hasil-search').fadeOut(2000);
                                                    pindah(11,'');
                                    }
                                }
                    });
			return false;			  
		  }
	  
	  );
//// End Contact Form ////

 });