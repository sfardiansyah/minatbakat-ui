$(document).ready(function(){
	$(".row .sect").hover(function(){
		var temp = $(this).attr("id");

		$("#" + temp + " .t-box").css("opacity", 1);
		$("#" + temp + " .td-grad").css("opacity", 0);
		$(".title").css("opacity", 0.4);
	}, 
	function(){
		var temp = $(this).attr("id");

		$("#" + temp + " .t-box").css("opacity", 0);
		$("#" + temp + " .td-grad").css("opacity", 1);
		$(".title").css("opacity", 1);
	});
});