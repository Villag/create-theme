<li class="item person" style="background: #333;">
	<a class="card" href="#about-createdenton" data-modal-id="about-createdenton" role="button" data-toggle="modal">
		<img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/assets/img/createdenton.png" height="150" width="150" alt="CreateDenton Logo">

		<header class="brief">
			<div class="primary-job">About</div>
		</header>
	</a><!-- .card -->

</li><!-- .card -->

<div id="about-createdenton" class="modal hide fade card-back" tabindex="-1">

	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<header>
			<h3>About CreateDenton</h3>
		</header>
	</div><!-- .modal-header -->

	<div class="modal-body">
		<img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/assets/img/createdenton.png" height="150" width="150" alt="CreateDenton Logo" class="thumbnail avatar pull-right">
		<section class="note">

			<?php $page_data = get_page_by_title( 'about' ); ?>

			<?php if( $page_data ) { echo apply_filters('the_content', $page_data->post_content); } ?>

		</section>
	</div><!-- modal-body -->

</div><!-- .vcard -->