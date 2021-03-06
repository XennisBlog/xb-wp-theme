<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<?php
			if ( is_single() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( sprintf( '<h5 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h5>' );
			endif;
		?>
	</header><!-- .entry-header -->

<?php if ( !is_single() ): ?>
	<div class="row">	
		<div class="three columns">
			<?php xbTheme_post_thumbnail(); ?>
		</div><!-- .columns -->
		<div class="nine columns">
<?php endif; ?>
			<div class="entry-content">
			<?php
				if ( is_single() ) :
					the_content();
				else:
					the_excerpt();
				endif;

				wp_link_pages( array(
					'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', XB_THEME_NAME ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
					'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', XB_THEME_NAME ) . ' </span>%',
					'separator'   => '<span class="screen-reader-text">, </span>',
				) );		
			?>
			</div><!-- .entry-content -->
			<footer class="entry-footer">
				<?php //twentyfifteen_entry_meta(); ?>
				<?php the_date(); ?>
				<?php
				if (get_the_date('c') != get_the_modified_date('c')) {
					echo '(updated: '.get_the_modified_date('j.n').')';
				}
				?>
				<div class="tags"><?php the_tags('Tags: ', ', ', ''); ?></div>
				<div class="category">Category: <?php the_category(' &gt; ', 'multiple'); ?></div>
			</footer><!-- .entry-footer -->	
<?php if ( !is_single() ): ?>			
		</div><!-- .columns -->
	</div><!-- .row -->
<?php endif; ?>
</article>