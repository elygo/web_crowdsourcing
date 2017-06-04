<!DOCTYPE html>
<html>
<head>
    <title>Test Crowdsourcing</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/navbar.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">          <!-- <style type="text/css"></style>-->
    <link rel="shortcut icon" href="images/favicon.png" />
    <link rel="stylesheet" href="css/font-awesome-4.7.0/css/font-awesome.min.css"> <!--icons-->

	<script type="text/javascript" src="js/boot.js"></script>
    <script src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/navbar.js"></script>
</head>

<body>
	<?php include("php/config.php"); ?>

  <div class="wrapper">
    	<div class="container-fluid">
 	<div class="image">
        <a href="index.html"><img   src="images/header.png" alt="Crowdsourcing" width="85" height="85"></a>
	</div>
 	<h1>Web interface - Crowdsourcing 1.0</h1>
  	</div>

    <div class="manual">
    <nav class="navbar navbar-default" data-spy="affix" data-offset-top="100">
      <ul class="nav navbar-nav">
        <li><a href="index.php">Home</a></li>
        <li  class="active"><a href="about.php">About</a></li>
        <li><a href="others.php">Others</a></li>
        <li><a href="#">Contact</a></li>
		 <?php if (empty($_SESSION['username'])) {   } elseif($_SESSION['username']=='Elyor Farmonov') { ?>
			  <li><a href="main.php">Main</a></li>
			   <li><a href="admin.php"><font color="red">Admin</font></a></li>
			  <?php } else {?>
			    <li><a href="main.php">Main</a></li>
		  		<?php }  ?>
      </ul>
        <ul class="nav navbar-nav navbar-right">
           <?php if (empty($_SESSION['username'])) {  ?>
				<li><a  href="#Modallogin" id="modallinklogin" data-toggle="modal" ><i class="fa fa-sign-in" aria-hidden="true"></i>
Log In</a></li>
			<li><a  href="#Modalsignup" id="modallinksignup" data-toggle="modal"><i class="fa fa-user-plus" aria-hidden="true"></i>
Sign Up</a></li>
					<?php } else { ?>
			<li><a>Welcome <font color="black"><?php echo $_SESSION['username']; ?></font></a></li>
			<li><a  href="php/logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Log Out</a></li>
				 <?php } ?>
         </ul>
    </nav>
    </div>


    <div class="modal-container"></div>

	   <?php include("php/login.php");
            include("php/signup.php");
       ?>
	  <script>
		  <?php  if(isset($_POST['log_in'])) { ?>

		  	$(function(){
				$("#Modallogin").modal('show');
			});

		 <?php }  ?>
		  </script>


    <div class="container">
		<div class="mapdata"></div>
		  <h1>About</h1>
		<h1>About</h1>
		<h1>About</h1>
		<h1>About</h1>
		<h1>About</h1>
		 <h1>About</h1>
		<h1>About</h1>
		<h1>About</h1>
		<h1>About</h1>
		<h1>About</h1>
		<h1>About</h1>
		<h1>About</h1>
		<h1>About</h1>
		<h1>About</h1>
		<h1>About</h1>
    </div>

    <div class="footer">
          <p>Copyright © Farmonov 2017</p>
    </div>

</div>

	<script type="text/javascript" src="js/signup.js"></script>
   <script type="text/javascript" src="js/login.js"></script>

</body>
</html>
