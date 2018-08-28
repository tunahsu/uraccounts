$(function(){
	$("#signup-form").on("submit", function(e){
	    e.preventDefault();
	    var data=$("#signup-form").serialize();
	
	    $.ajax({
	    	type:"POST",
	    	url:"process.php",
	    	data:data,
			beforeSend:function(){	
				$("#error").fadeOut();
			},
	    	success:function(response){
				if(response=="ok"){		
					alert("Registered successfully !");
					window.location.href = "index.php";
				}		
				else{				
					$("#error").fadeIn(function(){						
						$("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp;'+ response +' </div>');
						grecaptcha.reset();
					});
				}
	    	}
	    })
	});
});