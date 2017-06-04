$(document).ready(function() {
					
	//menu clicks
	$('ul#smallnav li a').click(function(){
		var page = $(this).attr('href');
		$('#newcontainer').load('admincontent/'+ page + '.php');
		return false;
		
	
	});
	

});