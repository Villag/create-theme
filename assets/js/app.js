jQuery(document).ready(function($) {

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
			url: create_theme.ajaxurl,
			data: data,
			dataType: 'json'
		})
			.done(function (response) {
				
				if (response) {
					try {
						console.log(response);
						var data = response;
						var source = $("#user").html();
						var template = Handlebars.compile(source);
		
						$('body').append(template(data));
						var $container = $('#the-creatives');
						// init
						$container.isotope({
						  itemSelector : '.item'
						});
		
						var $optionSets = $('#filter .option-set'), $optionLinks = $optionSets.find('a');
					
						$optionLinks.click(function(event) {
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
							if( hash != null ) {
								window.location.hash = hash;
							}
						});
					
						// Display a modal if the ID matches the hash in the URL
						$(window.location.hash).modal('show');	
					} catch (err) {

					}
				}
			});

	} create_get_users();

});