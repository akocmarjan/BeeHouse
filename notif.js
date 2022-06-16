jQuery(document).ready(function($){
	//open popup
	$('.notif-trigger').on('click', function(event){
		event.preventDefault();
		$('.notif-popup').addClass('hide');
	});

});