<?php
/**
 * The template for displaying image attachments
 */
get_header();

	while ( have_posts() ) : the_post(); ?>

	<section class="light">
		<div class="site-main-content">
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<nav id="image-navigation" class="navigation image-navigation">
					<div class="nav-links">
						<div class="nav-previous"><?php //previous_image_link( false, __( 'Previous Image', XB_THEME_NAME ) ); ?></div><div class="nav-next"><?php //next_image_link( false, __( 'Next Image', XB_THEME_NAME ) ); ?></div>
					</div><!-- .nav-links -->
				</nav><!-- .image-navigation -->

				<header class="entry-header">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</header><!-- .entry-header -->

				<div class="entry-content">

					<div class="entry-attachment">
						<?php
							/**
							 * Filter the default Twenty Fifteen image attachment size.
							 *
							 * TODO: change
							 */
							$image_size = apply_filters( 'xbTheme_attachment_size', 'large' );
							echo wp_get_attachment_image( get_the_ID(), $image_size );
						?>

						<?php if ( has_excerpt() ) : ?>
							<div class="entry-caption">
								<?php the_excerpt(); ?>
							</div><!-- .entry-caption -->
						<?php endif; ?>

					</div><!-- .entry-attachment -->

					<?php
						//the_content();
						wp_link_pages( array(
							'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentyfifteen' ) . '</span>',
							'after'       => '</div>',
							'link_before' => '<span>',
							'link_after'  => '</span>',
							'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>%',
							'separator'   => '<span class="screen-reader-text">, </span>',
						) );
					?>
				</div><!-- .entry-content -->

				<footer class="entry-footer">
					<?php xbTheme_entry_meta(); ?>
				</footer><!-- .entry-footer -->

			</article><!-- #post-## -->
				
			<?php
				// Previous/next post navigation.
				the_post_navigation( array(
					'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', XB_THEME_NAME ),
				) );			
			?>
		</div><!-- .site-main-content -->
	</section><!-- .light-->				
	<section class="dark">
		<div class="site-main-meta">				
			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>
		</div><!-- .article-footer-area -->
	</section><!-- .dark -->			
	<?php
	endwhile;

get_footer(); ?>