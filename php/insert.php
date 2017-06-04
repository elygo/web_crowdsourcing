<?php 
	global $connection;
	
	if(isset($_POST['register'])){
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = md5($_POST['password']);
		
		$username = mysqli_real_escape_string($connection, $username);
		$email = mysqli_real_escape_string($connection, $email);
		$password = mysqli_real_escape_string($connection, $password);
		
		$sql = "INSERT INTO Reg_users(username, email, password) VALUES('{$username}','{$email}','{$password}')";
		$query = mysqli_query($connection, $sql);
		header("Location: index.php");
		$_SESSION['username'] = $username; 
	}

?>