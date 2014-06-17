<div class="modal fade" role="dialog" aria-hidden="true" tabindex="-1" id="login" >
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">

				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

				<h3>Login</h3>

			</div><!-- .modal-header -->

			<div class="modal-body">

				<div class="row">

					<div class="col-md-6">
						<form role="form">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>


					</div>

					<div class="col-md-6">
						<?php do_action('oa_social_login'); ?>
						<?php wp_login_form( array( 'redirect' => get_home_url(), 'label_username' => __( 'Email' ) )); ?>
					</div>

				</div><!-- .row-fluid -->

			</div><!-- .modal-body -->
		</div>
	</div>

</div><!-- .modal -->