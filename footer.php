<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
	</div><!-- #main .wrapper -->
</div><!-- #page -->

<?php if( is_user_logged_in() ): ?>

	<?php get_template_part( 'partials/modal', 'edit-profile' ); ?>
	<?php get_template_part( 'partials/modal', 'edit-avatar' ); ?>

	<?php get_template_part( 'partials/modal', 'email-user' ); ?>

<?php else: // If user is not logged in ?>

	<?php get_template_part( 'partials/modal', 'sign-up' ); ?>

	<?php get_template_part( 'partials/modal', 'login' ); ?>

<?php endif; ?>

<?php wp_footer(); ?>

<script type="text/javascript">
var uvOptions = {};
(function() {
	var uv = document.createElement('script'); uv.type = 'text/javascript'; uv.async = true;
	uv.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'widget.uservoice.com/u9wFFHubVFFLBVve28tg.js';
	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(uv, s);
})();
</script>
</body>
</html>