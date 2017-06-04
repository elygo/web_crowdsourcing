<!DOCTYPE html>
<html>
<head></head>
<body>
	<h1>Ideas, thoughts and suggestions</h1>
<?php 
//connection create
$conn = new mysqli("localhost","root","deasperis93","authentication");
//check connection
if ($conn->connect_error){
	die("Connection failed: ". $conn->connect_error);
}

$sel = "SELECT newname, comment, date_time FROM comments";
$result = $conn->query($sel);

if ($result->num_rows>0){

	while($row=$result->fetch_assoc()){
	?> <div id="box"><div id="info"><h5><span id="namecolor"><?php echo $row["newname"]?></span> 
	<?php echo $row["date_time"]?></h5></div>
	<span id="titlecomment"><?php echo $row["comment"]?></span></div><br> 
	

<?php ; //
	
	}

} else{
	echo "0 results";
}

$conn->close();



?>
<style>
	#namecolor{
		margin: 5px;
		font-size:22px;	
		color:blue;
	}
	#titlecomment{
		margin: 5px;
		font-size:34px;	
		
	}
	#info{
	float:left;
	margin:5px 25px 20px 25px;}
	
	#box {
			border: 1px solid grey;}
<style>
</body>
</html>