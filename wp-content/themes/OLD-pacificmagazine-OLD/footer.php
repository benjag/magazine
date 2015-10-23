<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package pacificmagazine
 */
?>

	</div><!-- #content -->
	
	<footer id="colophon" class="site-footer" role="contentinfo">
	<?php get_sidebar('footer'); ?>
		<div class="site-info">
		
		<?php pacificmagazine_social_menu(); ?>
			
<a href="<?php echo esc_url( __( 'http://pacificu.edu/', 'pacificmagazine' ) ); ?>"><?php printf( __( 'The magazine of %s', 'pacificmagazine' ), 'Pacific University' ); ?></a> 
			
			<!--
<?php printf( __( 'Theme: %1$s by %2$s.', 'pacificmagazine' ), 'pacificmagazine', '<a href="http://underscores.me/" rel="designer">Underscores.me</a>' ); ?>
-->

		
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
