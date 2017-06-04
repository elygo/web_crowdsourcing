<!DOCTYPE html>
<html>
<head>
    <title>Test Crowdsourcing</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/navbar.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">          <!-- <style type="text/css"></style>-->
    <link rel="shortcut icon" href="images/favicon.png" />
    <script type="text/javascript" src="js/boot.js"></script>
    <script src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/navbar.js"></script>
</head>
                                                   
<body>
	<?php include("insert.php"); ?>
	
	 <!-- Modal signup  --> 
	  <div class="modal" id="Modalsignup">
		<div class="modal-dialog">
		   <!-- Modal content-->
		  <div class="modal-content">
			<div class="modal-header">
			  <button type="button" class="close" data-dismiss="modal">&times;</button>
			  <h4 class="modal-title">Registration form</h4>
			</div>
			<div class="modal-body">
            
        	<form method="post" action="">
				  <div class="signupform">
					<label><b>Username </b></label><span id="error_Username" class="text-center"></span>
					<input type="text" id="username" placeholder="Enter Username" name="username" required>  
					
					  <label><b>Email </b></label><span id="error_Email" class="text-center"></span>
					<input type="text" id="email" placeholder="Enter Email" name="email" required>

					<label><b>Password </b></label><span id="error_Password" class="text-center"></span>
					<input type="password" id="password" placeholder="Enter Password" name="password" required>

                     <div class="clearfix">
					  <button type="submit" id="signup" name="register" value="Register">Sign Up</button>
					</div>
                      
					<input type="checkbox" > Remember me
					<span class="psw">Already have an account? <a href="#Modallogin" data-toggle="modal" data-target="#Modallogin" data-dismiss="modal">Login</a></span>


				   </div>
         	</form>
            


			</div>
			<div class="modal-footer">
			  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		  </div>

		</div>
	  </div>
	
	</body>
	</html>