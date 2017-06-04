$(document).ready(function(){

	$("#login").click(function(){
		var username = $("#user_name").val();
		var password = $("#pass_word").val();
		
		var isValid = true;
		
		if(username == ''){
			isValid = false;
			$("#errorUsername").html("<div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Username field cannot be empty</div>");
		}else{
			$("#errorUsername").html("");
		}
		
		
		if(password == ''){
			isValid = false;
			$("#errorPassword").html("<div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Password field cannot be empty</div>");
		}else{
			$("#errorPassword").html("");
		}
			
		
		if(isValid == true){
			$.ajax({
				url:"../php/valid.php",
				type: "POST",
				data: {
					username: username,
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
		$("#errorUsername").html("");
		$("#errorPassword").html("");
		$(".alert-danger").remove();
		$(".alert").remove();
		
	});
	
});