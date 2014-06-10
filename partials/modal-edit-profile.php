<?php
global $current_user;
$blog_id = get_current_blog_id();
$blog_details = get_blog_details( $blog_id );
$user_meta = get_user_meta( $current_user->ID, 'user_meta_'. str_replace( '/', '', $blog_details->path ), true );
?>
<div class="modal hide fade" role="dialog" aria-hidden="true" tabindex="-1" id="edit-profile" aria-labelledby="edit-profile-label" data-width="760">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h3 id="edit-profile-label">Edit Profile</h3>
	</div>
	<div class="modal-body">
		<div class="alert hide"></div>

		<p><a href="#edit-avatar" role="button" data-toggle="modal" data-modal-id="edit-avatar" class="btn">Edit avatar</a></p>

		<form id="user-profile-form" action="<?php the_permalink(); ?>" method="post">

			<div class="row-fluid">
				<div class="span6">
					<label class="control-label" for="subject">First name <sup>*</sup></label>
					<div class="controls">
						<input placeholder="Daniel" type="text" tabindex="1" name="first_name" class="input-xlarge" value="<?php echo get_user_meta( $current_user->ID, 'first_name', true ); ?>" required autofocus>
					</div>
				</div>
				<div class="span6">
					<label class="control-label" for="subject">Last name <sup>*</sup></label>
					<div class="controls">
						<input placeholder="Johns" type="text" tabindex="1" name="last_name" class="input-xlarge" value="<?php echo get_user_meta( $current_user->ID, 'last_name', true ); ?>" required>
					</div>
				</div>
			</div>

			<div class="row-fluid">
				<div class="span6">
					<label class="control-label" for="email">Email <sup>*</sup></label>
					<div class="controls">
						<input placeholder="danieljohns@gmail.com" type="email" tabindex="1" name="email" class="input-xlarge" value="<?php echo isset( $user_meta['email'] ) ? $user_meta['email']: ''; ?>" required>
					</div>
				</div>
				<div class="span6">
					<label class="control-label" for="phone">Phone</label>
					<div class="controls">
						<input placeholder="(123) 456-7890" type="phone" tabindex="1" name="phone" class="input-xlarge" value="<?php echo isset( $user_meta['phone'] ) ? $user_meta['phone']: ''; ?>">
					</div>
				</div>
			</div>

			<div class="row-fluid">
				<div class="span6">
					<label class="control-label" for="subject">Talent <sup>*</sup></label>
					<div class="controls">
						<select name="user_category">
							<option></option>
							<?php
							$selected_user_categories = wp_get_object_terms( $current_user->ID, 'user_category' );
							if ( $selected_user_categories && ! is_wp_error( $selected_user_categories ) ) :

								$selected_user_category_ids = array();
								foreach ( $selected_user_categories as $selected_user_category ) {
									$selected_user_category_ids[] = $selected_user_category->term_id;
								}

								$selected_user_category_ids = join( ' ', $selected_user_category_ids );

							endif;
							$user_categories = get_terms( array( 'user_category' ), array( 'hide_empty' => false ) );
							foreach ( $user_categories as $user_category ) { ?>
								<option value="<?php echo intval( $user_category->term_id ); ?>" <?php selected( $selected_user_category_ids, $user_category->term_id ); ?>><?php echo $user_category->name; ?></option>
							<?php } ?>
						</select>
					</div>
				</div>
				<div class="span6">
					<label class="control-label" for="zip">Zip Code <sup>*</sup></label>
					<div class="controls">
						<select name="zip_code" required>
							<option></option>
							<?php $selected_zip = $user_meta['zip_code']; ?>
							<option<?php selected( $selected_zip, '76201' ); ?>>76201</option>
							<option<?php selected( $selected_zip, '76202' ); ?>>76202</option>
							<option<?php selected( $selected_zip, '76203' ); ?>>76203</option>
							<option<?php selected( $selected_zip, '76204' ); ?>>76204</option>
							<option<?php selected( $selected_zip, '76205' ); ?>>76205</option>
							<option<?php selected( $selected_zip, '76206' ); ?>>76206</option>
							<option<?php selected( $selected_zip, '76207' ); ?>>76207</option>
							<option<?php selected( $selected_zip, '76208' ); ?>>76208</option>
							<option<?php selected( $selected_zip, '76209' ); ?>>76209</option>
						</select>
					</div>
				</div>
			</div>

			<div class="row-fluid">
				<div class="span4">
					<label class="control-label" for="website">Website <sup>*</sup></label>
					<div class="controls">
						<input placeholder="http://danieljohns.com" type="url" tabindex="1" name="website" class="input-large" value="<?php echo isset( $user_meta['website'] ) ? $user_meta['website']: ''; ?>" required>
					</div>
				</div>
				<div class="span4">
					<label class="control-label" for="twitter">Twitter</label>
					<div class="controls">
						<input placeholder="danieljohns" type="text" tabindex="1" name="twitter" class="input-large" value="<?php echo isset( $user_meta['twitter'] ) ? $user_meta['twitter']: ''; ?>">
					</div>
				</div>
				<div class="span4">
					<label class="control-label" for="linkedin">LinkedIn</label>
					<div class="controls">
						<input placeholder="http://linkedin.com/p/danieljohns" type="url" tabindex="1" name="linkedin" class="input-large" value="<?php echo isset( $user_meta['linkedin'] ) ? $user_meta['linkedin']: ''; ?>">
					</div>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="skills">Skills <sup>*</sup></label>
				<div class="row-fluid">
					<div id="edit-profile-skills">
					<?php if( isset( $user_meta['skills'] ) ) { ?>
						<?php foreach( $user_meta['skills']  as $key => $value ) { ?>
						<span><input placeholder="Skill" type="text" tabindex="1" name="skills[]" class="span10" value="<?php echo isset( $value ) ? $value : ''; ?>"><a href="#" class="btn removeclass">&times;</a></span>
						<?php } ?>
					<?php } ?>
					</div>
					<p><button id="add-profile-skill">+</button></p>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="bio">Bio <sup>*</sup></label>
					<div class="controls">
						<textarea placeholder="Keep it light and take the conversation offline" tabindex="5" name="bio" class="input-xxlarge" rows="10" required><?php echo isset( $user_meta['bio'] ) ? $user_meta['bio']: ''; ?></textarea>
					</div>
				</label>
			</div>
			<div class="control-group">
				<div class="controls">
					<button name="submit" type="submit" id="profile-submit" data-text="...Saving" class="btn btn-primary">Save profile</button>
				</div>
			</div>
			<input type="hidden" name="blog_id" value="<?php echo intval( get_current_blog_id() ); ?>">
			<input type="hidden" name="user_id" value="<?php echo intval( $current_user->ID ); ?>">
			<input type="hidden" name="action" value="create_save_user_profile">
			<input type="hidden" name="security" value="<?php echo wp_create_nonce( 'create_save_user_profile_ajax_nonce' ); ?>">
		</form>

	</div>
</div>
