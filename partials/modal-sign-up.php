<div class="modal hide fade" role="dialog" aria-hidden="true" tabindex="-1" id="sign-up" >

	<div class="modal-header">

		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

		<h3>Sign Up</h3>

	</div><!-- .modal-header -->

	<div class="modal-body">
	
		<div class="alert alert-info">
			<p>CreateDenton is for <strong>indviduals</strong> looking to find and connect with others in our city. We may add business/organization/band/group profiles at some point, but for now profiles are limited to people in order to help put faces to those that make Denton creative!</p>
		</div>

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
