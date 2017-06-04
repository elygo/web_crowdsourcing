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
    <?php include("valid.php"); ?>
    
    
    
		<!-- Modal login -->
	  <div class="modal" id="Modallogin" tabindex="-1" role="dialog">
		<div class="modal-dialog">
		  <!-- Modal content-->
		  <div class="modal-content">
			<div class="modal-header">
			  <button type="button" class="close" data-dismiss="modal">&times;</button>
			  <h4 class="modal-title">Login form</h4>
			</div>
			
          <div class="modal-body">
				  <span class="text-center"><?php echo $error; ?></span>
           <form action="" method="post" name="login">

				  <div class="loginform">
					<label><b>Username</b></label>
					<br><span id="errorUsername" class="text-center"></span>
					<input type="text" placeholder="Enter Username" name="user_name" id="user_name"required>

					<label><b>Password</b></label>
					<br><span id="errorPassword" class="text-center"></span>  
					<input type="password" placeholder="Enter Password" name="pass_word" id="pass_word" required>

					<button id="login" name="log_in" type="submit">Login</button>
					<input type="checkbox"> Remember me
                <span class="psw">Do not have an account? <a href="#Modalsignup" data-toggle="modal" data-target="#Modalsignup" data-dismiss="modal">Sign Up</a></span>
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