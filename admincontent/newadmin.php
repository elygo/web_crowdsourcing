<!DOCTYPE html>
<html>
<head></head>
<body>	
	<h1>Accurate results</h1>
<table id="table">
	 <tr>
		 <th>Country</th>
		 <th>Topleft (lat,long)</th>
		 <th>Topright</th>
		 <th>Bottomleft</th>
		 <th>Bottomright</th>
		 <th>Time</th>
	</tr> 


<?php 
//connection create
$conn = new mysqli("localhost","root","deasperis93","authentication");
//check connection
if ($conn->connect_error){
	die("Connection failed: ". $conn->connect_error);
}

$sel = "SELECT Country, Topleft, Topright, Bottomleft, Bottomright, datetime FROM accurate";
$result = $conn->query($sel);

if ($result->num_rows>0){ 
		while($row=$result->fetch_assoc()){
	?> 
	 <tr><td><?php echo $row["Country"]?></td>
	<td><?php echo $row["Topleft"]?></td>
		 <td><?php echo $row["Topright"]?></td>
		 <td><?php echo $row["Bottomleft"]?></td>
		 <td><?php echo $row["Bottomright"]?></td>
	 <td><?php echo $row["datetime"]?></td></tr>
	

<?php ; //
	
	}

} else {
	echo "0 results";
}

$conn->close();



?>
</table>

<style>
	th, tr {width: 200px;}
	#table {
			border: 1px solid grey;}
	
	td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}
<style>
</body>
</html>	



