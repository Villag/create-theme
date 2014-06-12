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
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="navbar-brand"><?php bloginfo( 'name' ); ?></a>
				</div>

				<div class="collapse navbar-collapse" id="menu-primary">
					<ul class="nav navbar-nav option-set" data-option-key="filter">
						<?php
						$user_categories = get_terms( array( 'user_category' ), array( 'hide_empty' => false ) );
						foreach ( $user_categories as $user_category ) { ?>
						<li data-filter=".<?php echo $user_category->slug; ?>"><a href="#filter"><?php echo $user_category->name; ?></a></li>
						<?php } ?>
						<li data-filter="*"><a href="#filter">Reset</a></li>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>

	</header><!-- #masthead -->

	<div id="content" class="site-content">
