<?php
	global $connection;

	if(isset($_POST['log_in'])){
		$username = $_POST['user_name'];
		$password = md5($_POST['pass_word']);
		
		$username = mysqli_real_escape_string($connection, $username);
		$password = mysqli_real_escape_string($connection, $password);
		
		$select_query = mysqli_query($connection, "SELECT*FROM Reg_users WHERE username ='$username'" );
		$count = mysqli_num_rows($select_query);
		
		if($count<=0){
			$error = "<div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Please enter correct username/password</div>";
			
		}else{
			while($row=mysqli_fetch_array($select_query)){
			$name = $row['username'];
			$user_email = ['email'];
			$user_pass = $row['password'];
			}
			
			if($username == $name && $password == $user_pass){
				header("Location: index.php");
				
				$_SESSION['username'] = $name; 
			}else{
				$error = "<div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Please enter correct username/password</div>";
			}
		}
	
	}
?>