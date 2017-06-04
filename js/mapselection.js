$(document).ready(function(){

		var user = Number(newname.slice(4));
		
		
		$('#countries option:selected').removeAttr('selected');

		$('#countries option:nth-child('+ user +')').attr('selected','selected');
	
});
	