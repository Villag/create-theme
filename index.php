<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package create
 */

get_header(); ?>

	<div id="primary" class="site-content">
		<main id="content" role="main">

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
				
						<?php if ( 'post' == get_post_type() ) : ?>
						<div class="entry-meta">
							<?php _s_posted_on(); ?>
						</div><!-- .entry-meta -->
						<?php endif; ?>
					</header><!-- .entry-header -->
				
					<?php if ( is_search() ) : // Only display Excerpts for Search ?>
					<div class="entry-summary">
						<?php the_excerpt(); ?>
					</div><!-- .entry-summary -->
					<?php else : ?>
					<div class="entry-content">
						<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', '_s' ) ); ?>
						<?php
							wp_link_pages( array(
								'before' => '<div class="page-links">' . __( 'Pages:', '_s' ),
								'after'  => '</div>',
							) );
						?>
					</div><!-- .entry-content -->
					<?php endif; ?>
				
					<footer class="entry-footer">
						<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
							<?php
								/* translators: used between list items, there is a space after the comma */
								$categories_list = get_the_category_list( __( ', ', '_s' ) );
								if ( $categories_list && _s_categorized_blog() ) :
							?>
							<span class="cat-links">
								<?php printf( __( 'Posted in %1$s', '_s' ), $categories_list ); ?>
							</span>
							<?php endif; // End if categories ?>
				
							<?php
								/* translators: used between list items, there is a space after the comma */
								$tags_list = get_the_tag_list( '', __( ', ', '_s' ) );
								if ( $tags_list ) :
							?>
							<span class="tags-links">
								<?php printf( __( 'Tagged %1$s', '_s' ), $tags_list ); ?>
							</span>
							<?php endif; // End if $tags_list ?>
						<?php endif; // End if 'post' == get_post_type() ?>
				
						<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
						<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', '_s' ), __( '1 Comment', '_s' ), __( '% Comments', '_s' ) ); ?></span>
						<?php endif; ?>
				
						<?php edit_post_link( __( 'Edit', '_s' ), '<span class="edit-link">', '</span>' ); ?>
					</footer><!-- .entry-footer -->
				</article><!-- #post-## -->

			<?php endwhile; ?>

			<?php _s_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>