jQuery(document).ready(function($) {

	/**
	 * When user clicks on button...
	 *
	 */
	$('#register').submit( function(event) {

	/**
	 * Prevent default action, so when user clicks button he doesn't navigate away from page
	 *
	 */
	if (event.preventDefault) {
		event.preventDefault();
	} else {
		event.returnValue = false;
	}

	// If for some reason result field is visible hide it
	$('.result-message').hide();

	// Data to send
	var data = $(this).serialize();

	$.ajax({
		type: 'POST',
		url: create_reg_vars.create_ajax_url,
		dataType: 'json',
		data: $(this).serialize()
	}).done(function (response) {
		// If we have response
		if( response ) {
			console.log(response);

			// Hide 'Please wait' indicator
			$('.indicator').hide();

			if( response.success === true ) {
				location.reload();
			} else {
				$('.result-message').text( response.message ); // If there was an error, display it in results div
				$('.result-message').addClass('alert-danger'); // Add class failed to results div
				$('.result-message').show(); // Show results div
			}
			}
		});
	});
});
