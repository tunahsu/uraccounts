$(function(){ 
	$("#user_pass").keypress(function(e){
		code = e.keyCode ? e.keyCode : e.which;
		if(code==13){
			e.preventDefault();
			submitForm();
		}
	});
	
	/* login submit */
	function submitForm(){		
		var data=$("#signin-form").serialize();
				
		$.ajax({	
			type:'POST',
			url:'process.php',
			data:data,
			beforeSend:function(){	
				$("#error").fadeOut();
			},
			success:function(response){						
				if(response=="ok"){		
					$("#signin-form").fadeOut(function(){
						window.location.href = "list.php";
					});
				}
				else{				
					$("#error").fadeIn(function(){						
						$("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+response+' </div>');
					});
				}
			}
		});
		return false;
	}
});