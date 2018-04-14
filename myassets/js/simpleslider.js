//// Start Simple Sliders ////
	$(function() {
		setInterval("rotateDiv()", 10000);
	});
		
		function rotateDiv() {
		var currentDiv=$("#simpleslider div.current");
		var nextDiv= currentDiv.next ();
		if (nextDiv.length ==0)
			nextDiv=$("#simpleslider div:first");
		
		currentDiv.removeClass('current').addClass('previous').slideUp('slow');
		nextDiv.slideDown(2000).addClass('current',function() {
			currentDiv.slideUp('slow', function () {currentDiv.removeClass('previous');});
		});
	
	}
	//// End Simple Sliders //// 