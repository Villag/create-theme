<?php
global $current_user;
?>
<div class="modal hide fade" role="dialog" aria-hidden="true" tabindex="-1" id="edit-profile" aria-labelledby="edit-profile-label" data-width="760">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h3 id="edit-profile-label">Edit Profile</h3>
	</div>
	<div class="modal-body">

		<script type="text/javascript">
			jQuery(document).ready(function($) {
				var avatar_local = $('#avatar-local');
				var avatar_social = $('#avatar-social');
				var avatar_gravatar = $('#avatar-gravatar');

				$('input:radio[name="input_11"]').change( function(){
					$(this).parent().siblings().removeClass('selected');
					$(this).parent().addClass('selected');
				});

				$('input:radio[name="input_11"][checked]').each( function() {
					$(this).parent().siblings().removeClass('selected');
					$(this).parent().addClass('selected');
				});

				if(avatar_local.length > 0) {
					$('input[value="avatar_upload"]').next().prepend(avatar_local);
				} else {
					// Don't hide the local version, even if one doesn't exist
				}

				if(avatar_social.length > 0) {
					$('input[value="avatar_social"]').next().prepend(avatar_social);
				} else {
					$('input[value="avatar_social"]').parent('li').hide();
				}

				if(avatar_gravatar.length > 0) {
					$('input[value="avatar_gravatar"]').next().prepend(avatar_gravatar);
				} else {
					$('input[value="avatar_gravatar"]').parent('li').hide();
				}

			});
		</script>
		<style>
			.gform_wrapper li.gfield.gf_list_3col ul.gfield_radio li {
				font-size: 12px;
				line-height: 14px;
				margin: 0 1% 0 0 !important;
				padding: 4px !important;
				width: 30% !important;
			}
			.gform_wrapper li.gfield.gf_list_4col ul.gfield_radio li label {
				margin: 0;
			}
			.gform_wrapper li.avatars li {
				display: block;
				line-height: 20px;
				border: 1px solid #DDD;
				-webkit-border-radius: 4px;
				-moz-border-radius: 4px;
				border-radius: 4px;
				-webkit-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.055);
				-moz-box-shadow: 0 1px 3px rgba(0,0,0,0.055);
				box-shadow: 0 1px 3px rgba(0, 0, 0, 0.055);
				-webkit-transition: all .2s ease-in-out;
				-moz-transition: all .2s ease-in-out;
				-o-transition: all .2s ease-in-out;
				transition: all .2s ease-in-out;
			}
			.gform_wrapper li.selected {
				background: #ffc;
				font-weight: normal;
			}
			.gform_wrapper li.thumbnail {
				margin: 0 0 5px 0;
				padding: 4px !important;
			}
			.gform_wrapper input[type="radio"] {
				display: none;
			}
		</style>

		<?php create_choose_avatar( $current_user->ID ); ?>

		<?php get_sidebar( 'profile' ); ?>

	</div>
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
</div>