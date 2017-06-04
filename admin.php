<!DOCTYPE html>
<html>
  <head>
        <title>Test Crowdsourcing</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css/navbar.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="shortcut icon" href="images/favicon.png" />
      	<link rel="stylesheet"  href="css/font-awesome-4.7.0/css/font-awesome.min.css"> <!--icons-->

	      <script type="text/javascript" src="js/boot.js"></script>
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/navbar.js"></script>
    	  <script type="text/javascript" src="js/eval.js"></script>
	      <script type="text/javascript" src="js/markeradd.js"></script>

	      <script src="geojson/worldborders.geojson"></script>

	       <link rel="stylesheet" href="css/leaflet/leaflet.css"/>
	  	   <link rel='stylesheet' href='css/mapbox/mapbox.css' />
		     <script type="text/javascript" src="css/leaflet/leaflet.js"></script>
		     <script type="text/javascript" src='css/mapbox/mapbox.js'></script>
  </head>



<body>


	<?php include("php/config.php"); ?>

  <div class="wrapper">


      <div class="manual">
      <nav class="navbar navbar-default" data-spy="fix" data-offset-top="0">
        <ul class="nav navbar-nav">
          <li><a href="index.php">Home</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="others.php">Others</a></li>
          <li><a href="#">Contact</a></li>
			<?php if (empty($_SESSION['username'])) {   } else { ?>
			  <li><a href="main.php">Main</a></li> 		 <?php } ?>
			<li  class="active"><a href="admin.php"><font color="red">Admin</font></a></li>
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

	  <div id="admincontent">
	   <ul id="smallnav" >
			  <a href="#" onclick="showUser(); 	 $('#hiddendiv').show();  return false;" style="color:red; margin-right: 10px;" >Evaluation</a>
		      <li><a href="newadmin" style="color:red;" onclick="$('#hiddendiv').hide();"  >Source</a></li>
			  <li><a href="results" style="color:red;" onclick="$('#hiddendiv').hide();">Results</a></li>
			  <li><a href="comments" style="color:red;" onclick="$('#hiddendiv').hide();">Comments</a></li>

		  </ul>

		  </div>
      <div class="container">

		  <div id="hiddendiv">
			<form>
			<select name="users" onchange="showUser(this.options[this.selectedIndex].text)">
			  <option value="" selected>Select a country</option>
			  		<option value="images/Maps/Afghanistan.png" selected>Afghanistan</option>
					<option value="images/Maps/Algeria.png">Algeria</option>
					<option value="images/Maps/Argentina.png">Argentina</option>
					<option value="images/Maps/Australia.png">Australia</option>
					<option value="images/Maps/Brazil.png">Brazil</option>
					<option value="images/Maps/Canada.png">Canada</option>
					<option value="images/Maps/Chile.png">Chile</option>
					<option value="images/Maps/China.png">China</option>
					<option value="images/Maps/Colombia.png">Colombia</option>
					<option value="images/Maps/Croatia.png">Croatia</option>

					<option value="images/Maps/Denmark.png">Denmark</option>
					<option value="images/Maps/Egypt.png">Egypt</option>
					<option value="images/Maps/Finland.png">Finland</option>
					<option value="images/Maps/France.png">France</option>
					<option value="images/Maps/Germany.png" >Germany</option>
					<option value="images/Maps/Greece.png">Greece</option>
					<option value="images/Maps/Hungary.png">Hungary</option>
					<option value="images/Maps/India.png">India</option>
					<option value="images/Maps/Indonesia.png">Indonesia</option>
					<option value="images/Maps/Iran.png">Iran</option>

					<option value="images/Maps/Iraq.png">Iraq</option>
					<option value="images/Maps/Italy.png">Italy</option>
					<option value="images/Maps/Japan.png">Japan</option>
					<option value="images/Maps/Kazakhstan.png">Kazakhstan</option>
					<option value="images/Maps/Libya.png">Libya</option>
					<option value="images/Maps/Malaysia.png">Malaysia</option>
					<option value="images/Maps/Mexico.png">Mexico</option>
					<option value="images/Maps/Mongolia.png">Mongolia</option>
					<option value="images/Maps/Morocco.png">Morocco</option>
					<option value="images/Maps/Norway.png">Norway</option>

					<option value="images/Maps/Pakistan.png">Pakistan</option>
					<option value="images/Maps/Peru.png">Peru</option>
					<option value="images/Maps/Poland.png">Poland</option>
					<option value="images/Maps/Portugal.png">Portugal</option>
					<option value="images/Maps/Russia.png">Russia</option>
					<option value="images/Maps/S.Korea.png">S.Korea</option>
					<option value="images/Maps/SaudiArabia.png">Saudi Arabia</option>
					<option value="images/Maps/Somalia.png">Somalia</option>
					<option value="images/Maps/SouthAfrica.png">South Africa</option>
					<option value="images/Maps/Spain.png">Spain</option>

					<option value="images/Maps/Sudan.png">Sudan</option>
					<option value="images/Maps/Sweden.png">Sweden</option>
					<option value="images/Maps/Syria.png">Syria</option>
					<option value="images/Maps/Turkey.png">Turkey</option>
					<option value="images/Maps/Turkmenistan.png">Turkmenistan</option>
					<option value="images/Maps/UK.png">UK</option>
					<option value="images/Maps/Ukraine.png">Ukraine</option>
					<option value="images/Maps/USA.png">USA</option>
					<option value="images/Maps/Uzbekistan.png">Uzbekistan</option>
					<option value="images/Maps/Venezuela.png">Venezuela</option>
			  </select>
			</form>
			<br>

			  <div id="map"></div>

		  </div>

		  	  <div id="newcontainer" ></div>
		 <?php include ('admincontent/eval.php');
		  echo $Avrg_dis;?>
	  </div>


   </div>

	 <script type="text/javascript">


			// geojson map features
	function getCountryColor(continent){
		if(continent=='Africa'){
			return 'red';
		}else if(continent=='Europe'){
			return 'blue';
		}else if(continent=='North America'){
			return 'orange';
		}else if(continent=='South America'){
			return 'green';
		}else if(continent=='Oceania'){
			return 'yellow';
		}else{
			return 'pink';
		}
	}
	function worldbordersStyle(feature){
		return{
			fillColor:getCountryColor(feature.properties.continent),
			weight: 2,
			opacity: 1,
			color: 'black'

				}
	}


  // initialize the map
  var map = L.map('map')
	.setView([43.35, 18.08], 3);
	   map.options.maxZoom = 12;
       map.options.minZoom = 2.5;

  var worldbordersLayer = L.geoJson(
	  worldborders,
	  {style: worldbordersStyle }
  ).addTo(map);

	worldbordersLayer.eachLayer(function (layer) {
    layer.bindPopup(layer.feature.properties.name + ", " +layer.feature.properties.continent);
});




	</script>



	<script type="text/javascript" src="js/signup.js"></script>
   <script type="text/javascript" src="js/login.js"></script>
	<script type="text/javascript" src="js/smallnav.js"></script>

</body>


</html>
