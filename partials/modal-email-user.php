<div id="email-user" class="modal hide fade" tabindex="-1">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h3>Email <span id="email-user-first-name"></h3>
	</div><!-- .modal-header -->
	<div class="modal-body">
		<div class="alert hide"></div>
		<form id="contact-form" action="<?php the_permalink(); ?>" method="post" class="form-horizontal">
			<div class="control-group">
				<label class="control-label" for="subject">Subject <sup>*</sup></label>
				<div class="controls">
					<input placeholder="Please enter an email subject" type="text" tabindex="1" name="subject" class="input-xlarge" required autofocus>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="message">Message <sup>*</sup></label>
					<div class="controls">
						<textarea placeholder="Keep it light and take the conversation offline" tabindex="5" name="message" class="input-large" rows="10" required></textarea>
					</div>
				</label>
			</div>
			<div class="control-group">
				<div class="controls">
					<button name="submit" type="submit" id="contact-submit" data-text="...Sending">Send Email</button>
				</div>
			</div>
			<input type="hidden" name="user_id_to">
			<input type="hidden" name="user_id_from">
			<input type="hidden" name="action" value="create_email_user">
			<input type="hidden" name="security" value="<?php echo wp_create_nonce( 'create_email_user_ajax_nonce' ); ?>">
		</form>
	</div><!-- .modal-body -->
</div><!-- #email-user -->