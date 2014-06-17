<?php

/**
 * Enqueue and localize js
 *
 */
function create_register_user_scripts() {
	// Enqueue script
	wp_register_script('create_reg_script', get_template_directory_uri() . '/assets/js/registration.js', array('jquery'), null, false);
	wp_enqueue_script('create_reg_script');

	wp_localize_script( 'create_reg_script', 'create_reg_vars', array(
		'create_ajax_url' => admin_url( 'admin-ajax.php' ),
		)
	);
}
add_action( 'wp_enqueue_scripts', 'create_register_user_scripts', 100 );

/**
 * New User registration
 *
 */
function create_reg_new_user() {

	if( ! isset( $_POST['create_register_nonce'] ) || !wp_verify_nonce( $_POST['create_register_nonce'], 'create_register' ) )
		die( json_encode( __( 'Oops, something went wrong, please try again later.', 'create' ) ) );

	// Post values
	$password	= $_POST['create_register_password'];
	$email		= $_POST['create_register_email'];
	$fullname	= $_POST['create_register_full_name'];

	$fullname_array	= explode( ' ', $fullname );
	$firstname		= isset( $fullname_array[0] );
	$lastname		= isset( $fullname_array[1] );

	if( empty( $firstname ) || empty( $lastname ) ) {
		die(
			json_encode(
				array(
					'success' => false,
					'message' => __( 'Please enter your full name.', 'create' )
				)
			)
		);
	}

	$userdata = array(
		'user_login' => $email,
		'user_pass'	=> $password,
		'user_email' => $email
	);

	$user_id = wp_insert_user( $userdata ) ;

	if ( ! is_wp_error( $user_id ) ) {

		update_user_meta( $user_id, 'user_firstname', $firstname );
		update_user_meta( $user_id, 'user_firstname', $lastname );

		$creds = array();
		$creds['user_login'] = $email;
		$creds['user_password'] = $password;
		$creds['remember'] = true;
		$user = wp_signon( $creds, false );
		if ( is_wp_error($user) ) {
			die(
				json_encode(
					array(
						'success' => false,
						'message' => __( $user->get_error_message(), 'create' )
					)
				)
			);
		} else {
			die(
				json_encode(
					array(
						'success' => true
					)
				)
			);
		}
	} else {
		die(
			json_encode(
				array(
					'success' => false,
					'message' => __( $user_id->get_error_message(), 'create' )
				)
			)
		);
	}
}

add_action( 'wp_ajax_create_register', 'create_reg_new_user' );
add_action( 'wp_ajax_nopriv_create_register', 'create_reg_new_user' );