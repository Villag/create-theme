<?php
/**
 * Template Name: Cards
 *
 * Displays all of the user cards.
 *
 * @package Create
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<script id="user" type="text/x-handlebars-template">
				<ul class="cards">
<li class="item person">
	<a class="card" href="#about-createdenton" data-modal-id="about-createdenton" role="button" data-toggle="modal">
		<img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/assets/img/createdenton.png" height="150" width="150" alt="CreateDenton Logo">

		<header class="brief">
			<div class="primary-job">About</div>
		</header>
	</a><!-- .card -->

</li><!-- .card -->
					<?php get_template_part( 'partials/special', 'about' ); ?>

					{{#users}}

					<?php get_template_part( 'partials/card', 'front' ); ?>

				 	{{/users}}
				</ul>

				{{#users}}

					<?php get_template_part( 'partials/card', 'back' ); ?>

				{{/users}}
			</script>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
