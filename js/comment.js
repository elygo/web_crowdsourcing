$(document).ready(function(){

		$('#send').click(function(){

				var text = $('#subject').val();

			if(text==''){
				$('#commentmessage').html("An empty field!");
			}else{

				$.ajax({
					url: "php/comment.php",
					method: "POST",
					data: {comment: text, newname: newname},
					success:function(data){
						$("form").trigger("reset");
						$('#commentmessage').fadeIn().html("Saved, thank you!");
						setTimeOut(function(){
							$('#commentmessage').fadeOut('slow');
						},2000);
					}

				});
			}


	});

});
