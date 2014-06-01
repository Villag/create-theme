<div class="modal hide fade" role="dialog" aria-hidden="true" tabindex="-1" id="sign-up" >

	<div class="modal-header">

		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

		<h3>Sign Up</h3>

	</div><!-- .modal-header -->

	<div class="modal-body">

		<div class="row-fluid">

			<div class="span6">
				<?php do_action('oa_social_login'); ?>
			</div>

			<div class="span6">
				<?php echo do_shortcode('[gravityform name="Sign Up" title=false description=false ajax=true]'); ?>
			</div>

		</div><!-- .row-fluid -->

	</div><!-- .modal-body -->

</div><!-- #sign-up -->