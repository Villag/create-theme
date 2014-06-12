<div class="modal hide fade" id="about">

	<?php $page_data = get_page_by_title( 'about' ); ?>

	<div class="modal-dialog">
		<div class="modal-content">

			<div class="modal-header">

				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

				<h3><?php echo $page_data->post_title; ?></h3>

			</div><!-- .modal-header -->

			<div class="modal-body">

				<div class="row-fluid">

					<div class="span12">

					<?php echo apply_filters('the_content', $page_data->post_content); ?>

					</div>

				</div><!-- .row-fluid -->

			</div><!-- .modal-body -->

		</div>
	</div>

</div><!-- .modal -->