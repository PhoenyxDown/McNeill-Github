<?php
/**
 */
?>
<?php Alink_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<script type="text/javascript">
  $.anystretch("<?php bloginfo('template_directory'); ?>/images/fetch_bg.jpg", {speed: 150});
</script>



<div id="blog_content">
	
	<?php query_posts('posts_per_page=2'); ?>
				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				
						<div id="post-<?php the_ID(); ?>" class="home_excerpt">
							<div class="thumb_sm">
								<?php
									// Must be inside a loop.
									
									if ( has_post_thumbnail() ) {
										the_post_thumbnail();
									}
									else {
										echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/thumbplaceholder.jpg" height="86px" width="110px"/>';
									}
									?>
							</div>
							<h4 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
							<div class="entry-excerpt">
								<?php the_excerpt('read more...'); ?>

							</div><!-- .entry-excerpt -->
							<div class="entry-date">
		                        <p>posted on <?php the_time('M j, Y'); ?></p>    
	                    	</div>
						</div><!-- #post-## -->
						
				<?php endwhile; wp_reset_query(); ?>
</div>

<div id="blog_sidebar">
	
</div>

<div class="clearboth"></div>



<?php Alink_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>