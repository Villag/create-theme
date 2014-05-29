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
$(document).ready(function() {
	$("body").iealert({ support: "ie9" ,title: "What? IE!" ,text: "This version of IE is not supported in any real functional way, support for IE9 <strong>MIGHT</strong> be on the way. If you are using IE, than maybe this site is not for you! I'm kidding....but no really, IE sucks and we don't support it. Smiley Face." });
});
</script>
</head>

<body <?php body_class(); ?>>
<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', '_s' ); ?></a>
<header id="masthead" class="site-header" role="banner">

	<nav id="site-navigation" class="navbar navbar-inverse row-fluid" role="navigation">
		<div class="navbar-inner">
			<h1 class="brand"><a href="<?php echo esc_url( network_home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">Create <strong>Denton</strong></a>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'description' ) ); ?>" class="site-title" rel="home"><?php echo esc_html( get_bloginfo( 'description' ) ); ?></a></h1>
			<div class="skip-link assistive-text"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentytwelve' ); ?>"><?php _e( 'Skip to content', 'twentytwelve' ); ?></a></div>
			<div class="menu-primary-container">

				<a class="btn btn-navbar" data-toggle="collapse" data-target="#menu-secondary">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>

				<ul id="menu-secondary" class="nav nav-collapse collapse pull-right">

					<li class="dropdown">

						<?php
						if( is_user_logged_in() ) {
							global $current_user;
							get_currentuserinfo();
							?>

							<a href="#" class="menu-item dropdown-toggle" data-toggle="dropdown">
								<?php echo get_avatar( $current_user->ID, 25 ); ?>
								<?php echo $current_user->user_login; ?> <b class="caret"></b></a>

							<ul class="dropdown-menu">
								<li class="menu-item">			<a href="#edit-profile" role="button" data-toggle="modal" data-modal-id="edit-profile">Edit profile</a></li>
								<li class="menu-item">			<a href="<?php echo wp_logout_url( get_home_url() ); ?>" title="Logout">Logout</a></li>
								<li class="divider"></li>
								<li class="menu-item">			<a href="#about" data-modal-id="about" role="button" data-toggle="modal" >About</a></li>
								<li class="menu-item">			<a href="https://www.facebook.com/CreateDenton" target="_blank">Like us on Facebook</a></li>
							</ul>

						<?php } else { ?>

						<ul class="dropdown-menu">
							<li class="menu-item">			<a href="#about" data-modal-id="about" role="button" data-toggle="modal" >About</a></li>
							<li class="menu-item">			<a href="#login" data-modal-id="about" role="button" data-toggle="modal" >Login</a></li>
							<li class="menu-item">			<a href="#sign-up" data-modal-id="about" role="button" data-toggle="modal" >Sign Up</a></li>
						</ul>

						<?php } ?>

					</li>

				</ul>

				<ul id="menu-primary" class="nav">
					<li id="filter">
                    	<ul id="filters" class="option-set" data-option-key="filter">
                    		<?php
                    		$professions = get_terms( array( 'profession' ), array( 'hide_empty' => false ) );
							foreach ( $professions as $profession ) { ?>
					       		<li data-filter=".<?php echo $profession->slug; ?>"><a href="#filter"><?php echo $profession->name; ?></a></li>
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