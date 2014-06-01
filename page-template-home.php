<?php
/**
 * Template Name: Home
 *
 * @package create
 */

get_header(); ?>

	<div id="primary" class="site-content">

		<div id="content" role="main">

			<?php if( is_user_logged_in() ): ?>

			<?php global $current_user; if ( ! create_is_valid_user( $current_user->ID ) ) { ?>
			<div class="row-fluid">
				<div class="alert alert-warning span12">Your profile is not public because it's missing <strong><?php echo create_user_errors( $current_user->ID  ); ?></strong>. Please <a href="#" data-reveal-id="edit-profile" data-animation="fade" data-animationSpeed="12000">edit your profile</a>.</div>
			</div>
			<?php } ?>

			<?php endif; ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<div class="row-fluid">

					<script id="user" type="text/x-handlebars-template">
						<ul id="the-creatives">

							<?php get_template_part( 'partials/special', 'about' ); ?>

							{{#users}}

							<?php get_template_part( 'card-front' ); ?>

						 	{{/users}}
						</ul>

						{{#users}}

							<?php get_template_part( 'card-back' ); ?>

						{{/users}}

					</script>

				</div>

			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->

	</div><!-- #primary -->

<?php get_footer(); ?>