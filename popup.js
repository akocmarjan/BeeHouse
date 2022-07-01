jQuery(document).ready(function($){
	//open popup
	$('.cd-popup-trigger').on('click', function(event){
		event.preventDefault();
		$('.cd-popup').addClass('is-visible');
	});
	//open popup update
	$('.cd-popup-trigger-update').on('click', function(event){
		event.preventDefault();
		$('.cd-popup-update').addClass('is-visible');
	});
	
	//close popup
	$('.cd-popup').on('click', function(event){
		if( $(event.target).is('.cd-popup-close') || $(event.target).is('.cd-popup') || $(event.target).is('.cd-button-no') ) {
			event.preventDefault();
			$(this).removeClass('is-visible');
		}
	});
	//close popup update
	$('.cd-popup-update').on('click', function(event){
		if( $(event.target).is('.cd-popup-close') || $(event.target).is('.cd-popup-update') || $(event.target).is('.cd-button-no') ) {
			event.preventDefault();
			$(this).removeClass('is-visible');
		}
	});
	//close popup when clicking the esc keyboard button
	$(document).keyup(function(event){
    	if(event.which=='27'){
    		$('.cd-popup').removeClass('is-visible');
			$('.cd-popup-update').removeClass('is-visible');
	    }
    });

	$('.update-property').on('click', function(event){
	
	});

	$('.update-room').on('click', function(event){
		document.getElementById('roomID_updt').setAttribute('value', $(this).attr('data-room_id'));
		document.getElementById('roomNumber_updt').setAttribute('value', $(this).attr('data-room_number'));
		document.getElementById('slots_updt').setAttribute('value', $(this).attr('data-room_slots'));
		document.getElementById('price_updt').setAttribute('value', $(this).attr('data-room_price'));
		
	});

	$('.del-property').on('click', function(event){
		document.getElementById('del_property_id').setAttribute('value', $(this).attr('data-property_id'));
	});

	$('.del-property').on('click', function(event){
		document.getElementById('del_rand_id').setAttribute('value', $(this).attr('data-rand_id'));
	});


	$('.del-room').on('click', function(event){
		document.getElementById('del_room_id').setAttribute('value', $(this).attr('data-room_id'));
	});

	$('.show-update').on('click', function(event){
		event.preventDefault();
		$('.update-popup-bg').addClass('active');
		$('.update-popup').addClass('active');
		document.getElementById('propertyID_updt').setAttribute('value', $(this).attr('data-property_id'));
		document.getElementById('propertyName_updt').setAttribute('value', $(this).attr('data-property_name'));
		//document.getElementById('categoryID_updt').setAttribute('value', $(this).attr('data-property_category'));
		document.getElementById('region_updt').setAttribute('value', $(this).attr('data-property_region'));
		document.getElementById('province_updt').setAttribute('value', $(this).attr('data-property_province'));
		document.getElementById('city_updt').setAttribute('value', $(this).attr('data-property_city'));
		document.getElementById('barangay_updt').setAttribute('value', $(this).attr('data-property_barangay'));
		document.getElementById('postal_updt').setAttribute('value', $(this).attr('data-property_postal'));
		document.getElementById('availableFor_updt').setAttribute('value', $(this).attr('data-property_availablefor'));
	});

	$('.close-btn').on('click', function(event){
		event.preventDefault();
		$('.update-popup-bg').removeClass('active');
		$('.update-popup').removeClass('active');
	});

	$('.cd-button-no').on('click', function(event){
		event.preventDefault();
		$('.update-popup-bg').removeClass('active');
		$('.update-popup').removeClass('active');
	});

	$('.del-tenant').on('click', function(event){
		document.getElementById('del_tenant_id').setAttribute('value', $(this).attr('data-tenant_id'));
		document.getElementById('del_room_id').setAttribute('value', $(this).attr('data-tenant_room_id'));
	});

	$('.add-application').on('click', function(event){
		document.getElementById('room_id').setAttribute('value', $(this).attr('data-room_id'));
	});
});