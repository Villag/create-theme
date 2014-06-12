jQuery(document).ready(function($) {

	$('[data-toggle="tooltip"]').tooltip();

	$("#loading").ajaxStart(function(){
		$(this).modal('show');
	}).ajaxStop(function(){
		$(this).modal('hide');
	});

	function create_get_users(e) {
		var xhr;

		if (xhr) {
			xhr.abort();
		}

		var data = {
			action: 'create_get_users',
		};

		xhr = $.ajax({
			type: 'POST',
			url: ajaxurl.ajaxurl,
			data: data,
			dataType: 'json'
		})
			.done(function (response) {

				if (response) {
					try {
						var data = response;
						var source = $("#user").html();
						var template = Handlebars.compile(source);

						$('body').append(template(data));
						var $container = $('.cards');
						// init
						$container.isotope({
							itemSelector : '.card'
						});

						var $optionSets = $('.option-set'), $optionLinks = $optionSets.find('a');

						$optionLinks.click(function(event) {
							console.log('clicked');
							var $this = $(this);

							// don't proceed if already selected
							if ($this.hasClass('selected')) {
								return false;
							}
							var $optionSet = $this.parents('.option-set');
							$optionSet.find('.selected').removeClass('selected');
							$this.parent().addClass('selected');

							var filters = $(this).parent().data('filter');
							$container.isotope({
								filter : filters,
								onLayout : function($elems, instance) {
									if ($container.data('isotope').$filteredAtoms.length <= 1) {
										return false;
									}
								}
							});
							event.preventDefault();
						});

						// When the modal hides, remove the hash from the URL and unblur
						$('.modal').on('hidden', function () {
							window.location.hash = '';
							history.pushState('', document.title, window.location.pathname);
						});

						// When an anchor is clicked, add its ID as a hash to the URL
						$('a').click(function() {

							var hash = $(this).data('modal-id');
							if( typeof hash !== 'undefined' ) {
								window.location.hash = hash;
							}
						});

						// Display a modal if the ID matches the hash in the URL
						$(window.location.hash).modal('show');

						$('body').on('click', 'a[data-modal-id="email-user"]', function(){
							$('.modal').modal('hide'); // Hide any open modals
							var user_id_to		= $( this ).data( 'user-id-to' );
							var user_id_from	= ajaxurl.current_user_id;

							$('#contact-form input[name="user_id_to"]').val( user_id_to );
							$('#contact-form input[name="user_id_from"]').val( user_id_from );
						});

						$('#contact-form').submit(function( event ) {
							create_email_user( this, event, 'submit-contact-form' );
							event.preventDefault();
						});

						$('#user-profile-form').submit(function( event ) {
							create_save_user_profile( this, event, 'submit-user-profile-form' );
							event.preventDefault();
						});

						$.fn.modal.defaults.maxHeight = function(){
							// subtract the height of the modal header and footer
							return $(window).height() - 165;
						};

						var MaxInputs       = 8; //maximum input boxes allowed
						var InputsWrapper   = $("#edit-profile-skills"); //Input boxes wrapper ID
						var Inputs          = $("#edit-profile-skills input"); //Input boxes wrapper ID
						var AddButton       = $("#add-profile-skill"); //Add button ID

						var x = Inputs.length; //initlal text box count
						var FieldCount=1; //to keep track of text box added

						//on add input button click
						$(AddButton).click(function (e) {
							//max input box allowed
							if(x <= MaxInputs) {
								FieldCount++; //text box added increment
								//add input box
								$(InputsWrapper).append('<span><input placeholder="You have more skills?" type="text" tabindex="1" name="skills[]" class="span10" value=""><a href="#" class="btn removeclass">&times;</a></span>');
								x++; //text box increment
							}
							return false;
						});

						$("body").on("click",".removeclass", function(e){ //user click on remove text
							if( x > 1 ) {
								$(this).parent('span').remove(); //remove text box
								x--; //decrement textbox
							}
						return false;
						});

					} catch (err) {

					}
				}
			});

	} create_get_users();

	function create_email_user( data, event, triggerType ) {

		var xhr;

		if (xhr) {
			xhr.abort();
		}

		xhr = $.ajax({
			type: 'POST',
			url: ajaxurl.ajaxurl,
			data: $(data).serialize(),
			dataType: 'json'
		})
			.always(function(response) {

			})
			.done(function (response) {

				if (response) {
					try {
						resetForm($(data));
						$('#email-user .alert').show().text(response.message);
					} catch (err) {

					}
				}
			});

	}

	function create_save_user_profile( data, event, triggerType ) {

		var xhr;

		if (xhr) {
			xhr.abort();
		}

		xhr = $.ajax({
			type: 'POST',
			url: ajaxurl.ajaxurl,
			data: $(data).serialize(),
			dataType: 'json'
		})
			.always(function(response) {

			})
			.done(function (response) {

				if (response) {
					try {
						$('#edit-profile .alert').addClass('success').show().text(response.message);
					} catch (err) {
						$('#edit-profile .alert').addClass('warning').show().text(err);
					}
				}
			});

	}

	function resetForm($form) {
			$form.find('input:text, input:password, input:file, select, textarea').val('');
			$form.find('input:radio, input:checkbox').removeAttr('checked').removeAttr('selected');
		}

});