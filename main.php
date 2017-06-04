<!DOCTYPE html>
<html>
<head>
  <title>Test Crowdsourcing</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/navbar.css"/>
  <link rel="stylesheet" type="text/css" href="css/style.css"/>          <!-- <style type="text/css"></style>-->
  <link rel="shortcut icon" type="text/css" href="images/favicon.png" />
  <link rel="stylesheet" href="css/leaflet/leaflet.css"/>

 <!-- for icons-->
	<link rel="stylesheet" href="css/font-awesome-4.7.0/css/font-awesome.min.css">

    	<script type="text/javascript" src="js/boot.js"></script>
	    <script   type="text/javascript" src="js/jquery.min.js"></script>

        <script type="text/javascript" src="js/navbar.js"></script>
        <script type="text/javascript" src="js/d3.v3.min.js" charset="utf-8" ></script>  <!-- d3 library-->

		<script type="text/javascript" src="css/leaflet/leaflet.js"></script>
		<script type="text/javascript" src='css/mapbox/mapbox.js'></script>
		 <link href='css/mapbox/mapbox.css' rel='stylesheet' />

	 	<script src="geojson/worldborders.geojson"></script>
</head>
<body>
	<?php 	include("php/config.php");
			    echo '<script>';
   				 echo 'var newname = ' . json_encode($_SESSION['username']) . ';';
    			echo '</script>';
	?>



<div class="wrapper">



  <div class="manual">
  <nav class="navbar navbar-default" data-spy="fix" data-offset-top="0">
    <ul class="nav navbar-nav">
      <li><a href="index.php">Home</a></li>
      <li><a href="about.php">About</a></li>
      <li><a href="others.php">Others</a></li>
      <li><a href="#">Contact</a></li>
	  <li class="active"><a href="main.php">Main</a></li>
	  <?php if($_SESSION['username']=='Elyor Farmonov') { ?>

			   <li><a href="admin.php"><font color="red">Admin</font></a></li>
			  <?php } else { }  ?>
    </ul>
	  <ul class="nav navbar-nav navbar-right">
		  <li><a>Welcome <font color="black"><?php echo $_SESSION['username']; ?></font></a></li>
		  <li><a  href="php/logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Log Out</a></li>
		</ul>
  </nav>
  </div>

  <div class="container">
           <h4>In case of problems, press "Help" button below!<br>
			   If you have questions or recommendations, please leave a message <a href="#" id="Message" data-toggle="modal" data-target="#modalMessage">here</a>.</h4><br>

        <div id="map">

			<div class="slider">
            <form>
              <input type="range" orient="horizontal" name="bgopacity" id="bgopacity" value="75" min="0" max="100" step="1" onchange="rangevalue.value=value" title="Change image transparency">
              <output id="rangevalue">75</output>
            </form>
          </div>

			<div class="onoff">
				<button type="button" class="btn btn-default" id="onoff">Zoom, pan off</button>
				<button type="button" class="btn btn-default" id="help" data-toggle="modal" data-target="#modalHelp"><b>Help</b></button>
			</div>

        <div class="buttons">
				<div hidden> <!-- hidden -->
				<select id="countries" name="countries" class="btn btn-default">
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
				</div>
                <button type="button" class="btn btn-default" id="addImage" title="Insert an image">Insert</button>
                <button type="button" class="btn btn-primary" id="ScaleUpXY" title="Scale up in two directions">
					<i class="fa fa-plus" style="font-size:18px"></i>
				</button>
                <button type="button" class="btn btn-primary" id="ScaleDownXY" title="Scale down in two directions">
					<i class="fa fa-minus" style="font-size:18px"></i>
				</button>
                <button type="button" class="btn btn-primary" id="ScaleUpX" title="Scale up in x direction">
					<i class="fa fa-chevron-left" style="font-size:18px" fa-rotate-90></i>
					<i class="fa fa-chevron-right" style="font-size:18px" fa-rotate-90></i>
				</button>
                <button type="button" class="btn btn-primary" id="ScaleDownX" title="Scale down in x direction">
					<i class="fa fa-chevron-right" style="font-size:18px"></i><i class="fa fa-chevron-left" style="font-size:18px"></i>
				</button>
                <button type="button" class="btn btn-primary" id="ScaleUpY" title="Scale up in y direction">
					<span class="icon-stack">
						<i class="fa fa-chevron-down icon-stack-3x" style="font-size:18px"></i>
						<i class="fa fa-chevron-up icon-stack-4x" style="font-size:18px"></i>
					</span>
				</button>
                <button type="button" class="btn btn-primary" id="ScaleDownY" title="Scale down in y direction">
				<span class="icon-stack">
						<i class="fa fa-chevron-down icon-stack-2x" style="font-size:18px"></i>
						<i class="fa fa-chevron-up icon-stack-1x" style="font-size:18px"></i>
					</span>
			</button>


                <button type="button" class="btn btn-primary" id="skewxplus"  title="Skew in x+ direction">
					<span class="icon-stack">
						<i class="fa fa-angle-double-right skewxplusr" style="font-size:18px"></i>
						<i class="fa fa-angle-left skewxplusl" style="font-size:18px"></i>
						</span>
				</button>
				 <button type="button" class="btn btn-primary" id="skewxminus"  title="Skew in x- direction">
					 <span class="icon-stack">
						 <i class="fa fa-angle-right skewxminusr" style="font-size:18px"></i>
						 <i class="fa fa-angle-double-left skewxminusl" style="font-size:18px"></i>
					 </span>
				</button>
				 <button type="button" class="btn btn-primary" id="skewyplus"  title="Skew in y+ direction">
					 <span class="icon-stack">
						 <i class="fa fa-angle-up skewxplusr" style="font-size:18px"></i>
						<i class="fa fa-angle-double-down skewxplusl" style="font-size:18px"></i>
					 </span>
				</button>
				 <button type="button" class="btn btn-primary" id="skewyminus"  title="Skew in y- direction">
					 <span class="icon-stack">
						  <i class="fa fa-angle-down skewxminusr" style="font-size:18px" ></i>
						 <i class="fa fa-angle-double-up skewxminusl" style="font-size:18px"></i>
					 </span>
				</button>


                <button type="button" class="btn btn-primary" id="rotatel" title="Rotate counterclockwise"><i class="fa fa-rotate-left" style="font-size:18px"></i></button>
                <button type="button" class="btn btn-primary" id="rotater"  title="Rotate clockwise"><i class="fa fa-rotate-right" style="font-size:18px"></i></button>


				<button type="button" class="btn btn-primary" id="Place"  title="Place markers"><i class="fa fa-map-marker" style="font-size:18px"></i></button>
        <button onclick="reject()" type="button" class="btn btn-danger" id="Reject"  title="Ignore all changes">Reject</button>

				<input type="submit" class="btn btn-success" name="Submit" value="Submit" id="Submit">
         </div>

	 	</div>


	  <div id="result" style="font-size:18px; color:red;"></div>
	   <div id="show"></div>


							<!-- Modal for help button-->
									<div id="modalHelp" class="modal" role="dialog">
									  <div class="modal-dialog">

										<!-- Modal content-->
										<div class="modal-content">
										  <div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title">Welcome to Crowdsourcing GUI Help</h4>
										  </div>
										  <div class="modal-body">
											<b><p>Instructions</p></b>
											  <p>The given below vector map has to be filled with raster maps of some countries. Please, after finishing the project thoroughly check and submit!</p>
											  <p>Instructions for you</p>
											  <p>Instructions for you</p>
											  <p>Instructions for you</p>
											  <p>Instructions for you</p>
										  </div>
										  <div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										  </div>
										</div>

									  </div>
									</div>


	 							 <!-- Modal for a message-->
									<div id="modalMessage" class="modal" role="dialog">
									  <div class="modal-dialog">

										<!-- Modal content-->
										<div class="modal-content">
										  <div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title">We welcome your thoughts</h4>
										  </div>
										  <div class="modal-body">
										<div class="messageform" style="text-align:left;">
										 <form action="" method="POST">
												<label for="subject" style="text-align:left;">Subject</label>
												<textarea  cols="50" rows="10" id="subject" name="textsubject" placeholder="Enter..." ></textarea>
										 </form>

										</div>


										  </div>
										  <div class="modal-footer">
											  <div id="commentmessage" style="display: inline-block; float:left; color:red;"></div>
											<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
											 <button id="send" type="submit" name="newsend"  class="btn btn-success">Send</button>
										  </div>
										</div>

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
		 /*
     // Map
		 	L.mapbox.accessToken = 'pk.eyJ1IjoicnJhamFwcGFuIiwiYSI6ImNpb2Jta3prcDA0NGp2emx6M21jbWJkam4ifQ.w2R3ZlYBiKBezxUduz7vTg';
      var map = L.mapbox.map('map', 'mapbox.streets')
          .setView([47.509, -0.08], 4);	 */

       // Initialize the SVG layer
	    map._initPathRoot()

	// We simply pick up the SVG from the map object
    	var svg = d3.select("#map").select("svg")
           	g = svg.append("g");


     // button (top-right)
        $('#onoff').click(function()
		{
		  if ($(this).text() == "Zoom, pan off")
		  {
			   map.dragging.disable()
               map.touchZoom.disable()
               map.doubleClickZoom.disable()
               map.scrollWheelZoom.disable()
			  $(this).text("Zoom, pan on ");
		  }
		  else
		  {
			   map.dragging.enable()
               map.touchZoom.enable()
               map.doubleClickZoom.enable()
               map.scrollWheelZoom.enable()
			 $(this).text("Zoom, pan off");
		  };
		});

			// Functions for zoom and pan off during clicking on buttons
		$('.buttons,.slider').mouseover(function() {
			 map.dragging.disable();
               map.touchZoom.disable();
               map.doubleClickZoom.disable();
               map.scrollWheelZoom.disable();
			});

		$('.buttons,.slider').mouseout(function() {
			 map.dragging.enable();
               map.touchZoom.enable();
               map.doubleClickZoom.enable();
               map.scrollWheelZoom.enable();



		  if ($('#onoff').text() == "Zoom, pan on ")
		  {
			   map.dragging.disable()
               map.touchZoom.disable()
               map.doubleClickZoom.disable()
               map.scrollWheelZoom.disable()

		  }
		  else
		  {
			   map.dragging.enable()
               map.touchZoom.enable()
               map.doubleClickZoom.enable()
               map.scrollWheelZoom.enable()

		  };

			});




   //buttons bottom

     //Initiates image

     $("#addImage").one("click",function(){



       var drag = d3.behavior.drag()
            .on("drag", function(d) {
				d.x += d3.event.dx;
                d.y += d3.event.dy;
                d3.select(this).attr("transform", function(d){
          return "translate(" + [ d.x,d.y ] + "), rotate("+d.r+", 0, 0), scale("+d.xscale+","+d.yscale+"), scale("+d.scale+","+d.scale+"), skewX("+d.a+"), skewY("+d.b+")";
                })
            });

      var image=svg.append('image')
                                .attr("x",0) // origin of an image
                                .attr("y",0) // origin y
                                .attr("width",128)
                                .attr("height",128)
                                .attr("xlink:href", $('#countries').val())
                                .attr("id", "image")
                                .data([ {"x":0, "y":0, "r":0 ,"scale":1, "xscale":1 , "yscale":1, "a":0, "b":0} ])
                                .attr("transform","translate(0,0)")
      							.on("mouseenter", function(){ map.dragging.disable(); }) // map dragging affects
								.on("mouseout", function(){map.dragging.enable();})
		 						.call(drag);

    // skew
		 $("#skewxplus").bind("click",function(){
            image.attr("transform", function(d){
                d.a=d.a+0.5;
                return "translate(" + [ d.x,d.y ] + "), rotate("+d.r+", 0, 0), scale("+d.xscale+","+d.yscale+"), scale("+d.scale+","+d.scale+"), skewX("+d.a+"), skewY("+d.b+")";
            });
        });

		 $("#skewxminus").bind("click",function(){
            image.attr("transform", function(d){
                d.a=d.a-0.5;
                return "translate(" + [ d.x,d.y ] + "), rotate("+d.r+", 0, 0), scale("+d.xscale+","+d.yscale+"), scale("+d.scale+","+d.scale+"), skewX("+d.a+"), skewY("+d.b+")";
            });
        });

		 $("#skewyplus").bind("click",function(){
            image.attr("transform", function(d){
                d.b=d.b+0.5;
                return "translate(" + [ d.x,d.y ] + "), rotate("+d.r+", 0, 0), scale("+d.xscale+","+d.yscale+"), scale("+d.scale+","+d.scale+"), skewX("+d.a+"), skewY("+d.b+")";
            });
        });

		 $("#skewyminus").bind("click",function(){
            image.attr("transform", function(d){
                d.b=d.b-0.5;
                return "translate(" + [ d.x,d.y ] + "), rotate("+d.r+", 0, 0), scale("+d.xscale+","+d.yscale+"), scale("+d.scale+","+d.scale+"), skewX("+d.a+"), skewY("+d.b+")";
            });
        });

		//rotate
    	 $("#rotatel").bind("click",function(){
            image.attr("transform", function(d){
                d.r=d.r-0.5;
                return "translate(" + [ d.x,d.y ] + "), rotate("+d.r+", 0, 0), scale("+d.xscale+","+d.yscale+"), scale("+d.scale+","+d.scale+"), skewX("+d.a+"), skewY("+d.b+")";
            });
        });

       	 $("#rotater").bind("click",function(){
            image.attr("transform", function(d){
                d.r=d.r+1;
                return "translate(" + [ d.x,d.y ] + "), rotate("+d.r+", 0, 0), scale("+d.xscale+","+d.yscale+"), scale("+d.scale+","+d.scale+"), skewX("+d.a+"), skewY("+d.b+")";
            });
        });

		 //scale
         $("#ScaleUpX").bind("click",function(){
            image.attr("transform", function(d){
                d.xscale=d.xscale*1.01;
                d.yscale=d.yscale;
                return "translate(" + [ d.x,d.y ] + "), rotate("+d.r+", 0, 0), scale("+d.xscale+","+d.yscale+"), scale("+d.scale+","+d.scale+"), skewX("+d.a+"), skewY("+d.b+")";
            });
        });

       	 $("#ScaleUpY").bind("click",function(){
            image.attr("transform", function(d){
                d.xscale=d.xscale;
                d.yscale=d.yscale*1.01;
                return "translate(" + [ d.x,d.y ] + "), rotate("+d.r+", 0, 0), scale("+d.xscale+","+d.yscale+"), scale("+d.scale+","+d.scale+"), skewX("+d.a+"), skewY("+d.b+")";
            });
        });

       	 $("#ScaleDownX").bind("click",function(){
            image.attr("transform", function(d){
                d.xscale=d.xscale*0.99;
                d.yscale=d.yscale;
                return "translate(" + [ d.x,d.y ] + "), rotate("+d.r+", 0, 0), scale("+d.xscale+","+d.yscale+"), scale("+d.scale+","+d.scale+"), skewX("+d.a+"), skewY("+d.b+")";
            });
        });

      	 $("#ScaleDownY").bind("click",function(){
            image.attr("transform", function(d){
                d.xscale=d.xscale;
                d.yscale=d.yscale*0.99;
                return "translate(" + [ d.x,d.y ] + "), rotate("+d.r+", 0, 0), scale("+d.xscale+","+d.yscale+"), scale("+d.scale+","+d.scale+"), skewX("+d.a+"), skewY("+d.b+")";
            });
        });

         $("#ScaleDownXY").bind("click",function(){
            image.attr("transform", function(d){
                d.scale=d.scale*0.95;
                return "translate(" + [ d.x,d.y ] + "), rotate("+d.r+", 0, 0), scale("+d.xscale+","+d.yscale+"), scale("+d.scale+","+d.scale+"), skewX("+d.a+"), skewY("+d.b+")";
            });
        });

       	 $("#ScaleUpXY").bind("click",function(){
           image.attr("transform", function(d){
                d.scale=d.scale*1.05;
                return "translate(" + [ d.x,d.y ] + "), rotate("+d.r+", 0, 0), scale("+d.xscale+","+d.yscale+"), scale("+d.scale+","+d.scale+"), skewX("+d.a+"), skewY("+d.b+")";

            });
        });



		 // Initial opacity value
		 $("#image").css({
                      opacity: 0.75
                     });








		// 4 corner coordinates
		  $("#Place").one("click",function(){
			  image.attr("transform", function(d){
				  // after rotation and skewing
				  		var  radiansr = (Math.PI/180)*(d.r),
							radiansa = (Math.PI/180)*(d.a),
							radiansb = (Math.PI/180)*(d.b),
							tana = Math.tan(radiansa),
							tanb = Math.tan(radiansb),
							cos = Math.cos(radiansr),
							sin = Math.sin(radiansr),
					// corner coordinates in pixel frame
							toprx = (cos+tanb*(tana*cos-sin))*(d.x+128*d.scale*d.xscale-d.x)+(tana*cos-sin)*(d.y-d.y)+d.x,
							topry = (sin+tanb*(tana*sin+cos))*(d.x+128*d.scale*d.xscale-d.x)+(tana*sin+cos)*(d.y-d.y)+d.y,

							bottomlx =(cos+tanb*(tana*cos-sin))*(d.x-d.x)+(tana*cos-sin)*(d.y+128*d.scale*d.yscale-d.y)+d.x,
							bottomly = (sin+tanb*(tana*sin+cos))*(d.x-d.x)+(tana*sin+cos)*(d.y+128*d.scale*d.yscale-d.y)+d.y,

							bottomrx = (cos+tanb*(tana*cos-sin))*(d.x+128*d.scale*d.xscale-d.x)+(tana*cos-sin)*(d.y+128*d.scale*d.yscale-d.y)+d.x,
							bottomry = (sin+tanb*(tana*sin+cos))*(d.x+128*d.scale*d.xscale-d.x)+(tana*sin+cos)*(d.y+128*d.scale*d.yscale-d.y)+d.y;

				var topleft = map.layerPointToLatLng([d.x,d.y]), // from pixel to lat long

					marktopleft = L.marker(topleft).addTo(map)
								.bindPopup('<strong>Top-left corner of an image</strong>'),

					topright = map.layerPointToLatLng([toprx,topry]),

					marktopright = L.marker(topright).addTo(map)
								.bindPopup('<strong>Top-right corner of an image</strong>'),

					bottomleft = map.layerPointToLatLng([bottomlx,bottomly]),

					markbottomleft = L.marker(bottomleft).addTo(map)
								.bindPopup('<strong>Bottom-left corner of an image</strong>'),

					bottomright = map.layerPointToLatLng([bottomrx,bottomry]),

					markbottomright = L.marker(bottomright).addTo(map)
								.bindPopup('<strong>Bottom-right corner of an image</strong>');

				  $("#Submit").bind("click",function(){

    					var tleft = topleft.toString().slice(7, -1);
						var	tright = topright.toString().slice(7, -1);
						var	bleft = bottomleft.toString().slice(7, -1);
						var	bright = bottomright.toString().slice(7, -1);
						var country = $("select option:selected").text();
					  		$.ajax({
										url: "php/coordinates.php",
										method: "POST",
										data: {country: country, tleft: tleft, tright: tright, bleft: bleft, bright: bright },
										success:function(data){

											$('#result').fadeIn().html("Successfully completed!");

										}

									});


							});





				  return "translate(" + [ d.x,d.y ] + "), rotate("+d.r+", 0, 0), scale("+d.xscale+","+d.yscale+"), scale("+d.scale+","+d.scale+"), skewX("+d.a+"), skewY("+d.b+")";

			  })
			   });

		});




          // transparency
          $('#bgopacity').on('change', function () {
                        console.log($('#bgopacity').val());
                      $("#image").css({
                      opacity: $(this).val() * '.01'
                     });
        		});



		//Reject button
		function reject(){
	   var ask=window.confirm("Do you want to start from the beginning?");
			if (ask) {

			document.location.href = "main.php";

							}
					};


        </script>
  </div>






  <div class="footer">
        <p>Copyright © Farmonov 2017 </p>
</div>

</div>
	<script type="text/javascript" src="js/comment.js"></script>
	<script type="text/javascript" src="js/coordinates.js"></script>
	<script type="text/javascript" src="js/mapselection.js"></script>
</body>
</html>
