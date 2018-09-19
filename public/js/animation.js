$(document).ready(function(){

	//ouvre le menu mobile
	$("#menu-burger").click(function(){
		$("#menu-mobile").show();
	});

	// ferme le menu mobile 
	$(".closeNav").click(function(){
		$("#menu-mobile").hide();
	});

	$("#rea1").flip({
  		axis: 'y',
  		trigger : 'hover'
	});

	$("#rea2").flip({
  		axis: 'y',
  		trigger : 'hover'
	});

	$("#rea3").flip({
  		axis: 'y',
  		trigger : 'hover'
	});

	$("#rea4").flip({
  		axis: 'y',
  		trigger : 'hover'
	});

});
