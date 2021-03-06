<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package create
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>

<script type="text/javascript">
jQuery(document).ready(function($) {
	$("body").iealert({ support: "ie9" ,title: "What? IE!" ,text: "This version of IE is not supported in any real functional way, support for IE9 <strong>MIGHT</strong> be on the way. If you are using IE, than maybe this site is not for you! I'm kidding....but no really, IE sucks and we don't support it. Smiley Face." });
});
</script>
</head>

<body <?php body_class(); ?>>
<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', '_s' ); ?></a>
<header id="masthead" class="site-header" role="banner">

	<nav id="site-navigation" class="navbar navbar-inverse row-fluid" role="navigation">
		<div class="navbar-inner">
			<h1 class="brand">
				<a href="<?php echo esc_url( network_home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">Create <strong>Denton</strong></a>
				<span class="site-name btn-group">
					<a class="btn btn-link dropdown-toggle" data-toggle="dropdown" href="#"><?php echo esc_html( get_bloginfo( 'description' ) ); ?>  <span class="custom-caret">&#9660;</span></a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo esc_url( network_home_url( '/digital' ) ); ?>">digital</a></li>
						<li><a href="<?php echo esc_url( network_home_url( '/market' ) ); ?>">market</a></li>
						<li><a href="<?php echo esc_url( network_home_url( '/music' ) ); ?>">music</a></li>
					</ul>
				</span>
			</h1>
			<div class="skip-link assistive-text"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'create' ); ?>"><?php _e( 'Skip to content', 'create' ); ?></a></div>
			<div class="menu-primary-container">

				<ul id="menu-secondary" class="nav pull-right">

					<?php
					if( is_user_logged_in() ) {
						global $current_user;
						get_currentuserinfo();
						?>

						<li class="dropdown">

							<a href="#" class="menu-item dropdown-toggle" data-toggle="dropdown">
								<?php echo get_wp_user_avatar( $current_user->ID, 25 ); ?>
								<span class="username"><?php echo $current_user->user_login; ?></span> <b class="caret"></b></a>

							<ul class="dropdown-menu">
								<li class="menu-item">			<a href="#edit-profile" role="button" data-toggle="modal" data-modal-id="edit-profile">Edit profile</a></li>
								<li class="menu-item">			<a href="#edit-avatar" role="button" data-toggle="modal" data-modal-id="edit-avatar">Edit avatar</a></li>
								<li class="menu-item">			<a href="<?php echo wp_logout_url( get_home_url() ); ?>" title="Logout">Logout</a></li>
							</ul>

						</li>

					<?php } else { ?>
						<li class="menu-item">			<a href="#login" data-modal-id="about" role="button" data-toggle="modal">Login</a></li>
						<li class="menu-item">			<a href="#sign-up" data-modal-id="about" role="button" data-toggle="modal">Sign Up</a></li>
					<?php } ?>

				</ul>

				<ul id="menu-primary" class="nav">
					<li id="filter">
						<ul id="filters" class="option-set" data-option-key="filter">
							<?php
							$user_categories = get_terms( array( 'user_category' ), array( 'hide_empty' => false ) );
							foreach ( $user_categories as $user_category ) { ?>
							<li data-filter=".<?php echo $user_category->slug; ?>"><a href="#filter"><?php echo $user_category->name; ?></a></li>
							<?php } ?>
							<li data-filter="*"><a href="#filter">Reset</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav><!-- #site-navigation -->

	<?php $header_image = get_header_image();
	if ( ! empty( $header_image ) ) : ?>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( $header_image ); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" /></a>
	<?php endif; ?>
</header><!-- #masthead -->

<div id="page" class="hfeed site container-fluid">