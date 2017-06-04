$(document).ready(function(){

	$("#signup").click(function(){
		var username = $("#username").val();
		var email = $("#email").val();
		var password = $("#password").val();
		var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		
		var isValid = true;
		
		if(username == ''){
			isValid = false;
			$("#error_Username").html("<div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Username field cannot be empty</div>");
		}else{
			$("#error_Username").html("");
		}
		
		
		if (!filter.test(email)) {
			isValid = false;
			$("#error_Email").html("<div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Enter email address</div>");
		}else{
			$("#error_Email").html("");
		}

		
		if(password == ''){
			isValid = false;
			$("#error_Password").html("<div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Password field cannot be empty</div>");
		}else{
			$("#error_Password").html("");
		}
		
		if(isValid == true){
			$.ajax({
				url:"../php/insert.php",
				type: "POST",
				data: {
					username: username,
					email: email,
					password: password
				},
				success: function(){
					
				}
				
			});
		}else{
			return false;
		}
	});
	
	$(".modal").on("hidden.bs.modal", function(){
		$(this).find(":text, :password").val('').end();
		$("#error_Username").html("");
		$("#error_Email").html("");
		$("#error_Password").html("");
		$(".alert-danger").remove();
		$(".alert").remove();
		
	});
});