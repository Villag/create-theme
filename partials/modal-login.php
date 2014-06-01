<div class="modal hide fade" role="dialog" aria-hidden="true" tabindex="-1" id="login" >

	<div class="modal-header">

		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

		<h3>Login</h3>

	</div><!-- .modal-header -->

	<div class="modal-body">

		<div class="row-fluid">

			<div class="span6">
				<?php do_action('oa_social_login'); ?>
			</div>

			<div class="span6">
				<?php wp_login_form( array( 'redirect' => get_home_url(), 'label_username' => __( 'Email' ) )); ?>
			</div>

		</div><!-- .row-fluid -->

	</div><!-- .modal-body -->

</div><!-- .modal -->