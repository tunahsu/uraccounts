$(function(){
	var client=new ZeroClipboard($(".clipboard"));
	$(".clipboard").hover(function(){
		$(this).addClass("ho");
	}, 
	function(){
		$(this).removeClass("ho").removeClass("copied");
	});
	client.on("aftercopy", function(event){
		$(".clipboard").addClass("copied");
	});	
	
	$('#myTable').DataTable({
		"lengthMenu": [[25, 50, -1], [25, 50, "All"]]
	});
	
	$(window).scroll(function(){
		if($(this).scrollTop()>50){
			$('#gotop').fadeIn("fast");
		} else{
			$('#gotop').stop().fadeOut("fast");
		}
	});
	$("#gotop").click(function(){
		jQuery("html,body").animate({
			scrollTop:0
		},1000);
	});
	$("#add_web").click(function(){
		window.location.href ="add_website.php";
	});
});
