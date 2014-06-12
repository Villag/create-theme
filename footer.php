<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Create
 */
?>

	</div><!-- #content -->

</div><!-- #page -->

<?php wp_footer(); ?>

<?php get_template_part( 'partials/special', 'about' ); ?>

<?php if( is_user_logged_in() ): ?>

	<?php get_template_part( 'partials/modal', 'edit-profile' ); ?>
	<?php get_template_part( 'partials/modal', 'edit-avatar' ); ?>

	<?php get_template_part( 'partials/modal', 'email-user' ); ?>

<?php else: // If user is not logged in ?>

	<?php get_template_part( 'partials/modal', 'sign-up' ); ?>

	<?php get_template_part( 'partials/modal', 'login' ); ?>

<?php endif; ?>

<div id="loading"></div>
</body>
</html>
