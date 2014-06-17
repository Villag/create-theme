<div class="modal fade" role="dialog" aria-hidden="true" tabindex="-1" id="sign-up" >
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">

				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

				<h3>Sign Up</h3>

			</div><!-- .modal-header -->

			<div class="modal-body">

				<div class="alert alert-info">
					<p>CreateDenton is for <strong>indviduals</strong> looking to find and connect with others in our city. We may add business/organization/band/group profiles at some point, but for now profiles are limited to people in order to help put faces to those that make Denton creative!</p>
				</div>

				<div class="row">

					<div class="col-md-6">

						<form id="login" class="registraion-form" role="form">

							<p><strong>Login</strong></p>

							<div class="form-group">
								<label class="sr-only" for="create_register_email">Email</label>
								<input type="email" name="create_register_email" value="" placeholder="Your Email" class="form-control" />
							</div>

							<div class="form-group">
								<label class="sr-only" for="create_register_password">Password</label>
								<input type="password" name="create_register_password" value="" placeholder="Choose Password" class="form-control" />
							</div>

							<?php wp_nonce_field( 'create_login','create_login_nonce', true, true ); ?>

							<div class="form-group">
								<input type="submit" class="btn btn-primary pull-right" value="Login">
							</div>
							<input type="hidden" name="action" value="create_login">

						</form>

						<?php do_action('oa_social_login'); ?>

					</div>

					<div class="col-md-6">

						<form id="register" class="registraion-form" role="form">

							<p><strong>Need a profile?</strong> Sign up</p>

							<div class="form-group">
								<label class="sr-only" for="create_register_full_name">Full name</label>
								<input type="text" name="create_register_full_name" value="" placeholder="Full Name" class="form-control" />
							</div>

							<div class="form-group">
								<label class="sr-only" for="create_register_email">Email</label>
								<input type="email" name="create_register_email" value="" placeholder="Your Email" class="form-control" />
							</div>

							<div class="form-group">
								<label class="sr-only" for="create_register_password">Password</label>
								<input type="password" name="create_register_password" value="" placeholder="Choose Password" class="form-control" />
							</div>

							<?php wp_nonce_field( 'create_register','create_register_nonce', true, true ); ?>

							<div class="form-group">
								<input type="submit" class="btn btn-primary" value="Sign up for CreateDenton">
							</div>
							<input type="hidden" name="action" value="create_register">

						</form>

						<div class="alert result-message"></div>

					</div><!-- .col-md-6 -->

				</div><!-- .row -->

			</div><!-- .modal-body -->
		</div>
	</div>

</div><!-- #sign-up -->
