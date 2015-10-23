<?php
/**
 * @package pacificmagazine
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="index-box">
		

	<header class="entry-header">
	
		<?php
			if (is_sticky()) {
    echo '<i class="fa fa-thumb-tack sticky-post"></i>';
}
		
		?>
			
		

		<?php if ( 'post' == get_post_type() ) : ?>
				<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			/* translators: %s: Name of current post */
			the_excerpt( sprintf(
				__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'pacificmagazine' ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
		?>

		<!--
<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'pacificmagazine' ),
				'after'  => '</div>',
			) );
		?>
-->
	</div><!-- .entry-content -->

	<footer class="entry-footer continue-reading">
    <div class="entry-meta">
			<?php pacificmagazine_posted_on(); ?>
			<?php 
			    if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) { 
			        echo '<span class="comments-link">';
			        comments_popup_link( __( 'Leave a comment', 'pacificmagazine' ), __( '1 Comment', 'pacificmagazine' ), __( '% Comments', 'pacificmagazine' ) );
			        echo '</span>';
			    }
			?>
			<?php edit_post_link( __( ' | Edit', 'pacificmagazine' ), '<span class="edit-link">', '</span>' ); ?>
			
		</div><!-- .entry-meta -->

</footer><!-- .entry-footer -->
	</div><!-- .index-box -->
</article><!-- #post-## -->