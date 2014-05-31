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

<?php get_template_part( 'modals' ); // Load modals.php ?>

<div class="navbar navbar-inverse navbar-fixed-bottom">
	<div class="navbar-inner">
		<ul class="nav pull-right">
			<li><a href="#about" data-modal-id="about" role="button" data-toggle="modal" >About</a></li>
			<li><a href="https://github.com/Villag/create-denton"><img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/assets/img/github.png"></a></li>
			<li><a href="https://www.facebook.com/CreateDenton"><img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/assets/img/facebook.png"></a></li>
			<li><a href="http://vill.ag" data-toggle="tooltip" data-original-title="A Villag Project" data-placement="top"><img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/assets/img/villag.png"></a></li>
		</ul>
	</div>
</div>

<?php wp_footer(); ?>
<?php //create_first_timer(); ?>
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