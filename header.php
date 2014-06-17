<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Create
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
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'create' ); ?></a>

	<header id="masthead" class="site-header" role="banner">

		<nav class="navbar navbar-default navbar-static-top" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="navbar-brand"><?php bloginfo( 'name' ); ?></a>
					<div class="btn-group verticals">
						<button type="button" class="btn btn-link dropdown-toggle" data-toggle="dropdown">
							Music <span class="caret"></span>
						</button>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#">Music</a></li>
							<li><a href="#">Another action</a></li>
							<li><a href="#">Something else here</a></li>
							<li class="divider"></li>
							<li><a href="#">Separated link</a></li>
						</ul>
					</div>
				</div>

				<div cid="menu-primary">
					<ul class="nav navbar-nav option-set" data-option-key="filter">
						<?php
						$user_categories = get_terms( array( 'user_category' ), array( 'hide_empty' => false ) );
						foreach ( $user_categories as $user_category ) { ?>
						<li data-filter=".<?php echo $user_category->slug; ?>"><a href="#filter"><?php echo $user_category->name; ?></a></li>
						<?php } ?>
						<li data-filter="*"><a href="#filter">Reset</a></li>
					</ul>
				</div><!-- /.navbar-collapse -->

				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu-secondary">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<ul class="nav navbar-nav navbar-right collapse navbar-collapse" id="menu-secondary">

					<?php
					if( is_user_logged_in() ) {
					global $current_user;
					get_currentuserinfo();
					?>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $current_user->user_login; ?> <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li class="menu-item"><a role="button" data-toggle="modal" href="#edit-profile" data-modal-id="edit-profile">Edit profile</a></li>
							<li class="menu-item"><a role="button" data-toggle="modal" href="#edit-avatar" data-modal-id="edit-avatar">Edit avatar</a></li>
							<li class="menu-item"><a href="<?php echo wp_logout_url( get_home_url() ); ?>" title="Logout">Logout</a></li>
						</ul>
					</li>
					<?php } else { ?>
					<li class="menu-item"><a href="#login" data-modal-id="login" role="button" data-toggle="modal" class="btn btn-secondary btn-xs">Login</a></li>
					<li class="menu-item"><a href="#sign-up" data-modal-id="sign-up" role="button" data-toggle="modal" class="btn btn-primary btn-xs">Create a free profile</a></li>
					<?php } ?>
				</ul>
			</div><!-- /.container-fluid -->
		</nav>

	</header><!-- #masthead -->

	<div id="content" class="site-content">
