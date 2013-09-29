<?php
/**
 Template Name: Fetch
 */
?>
<?php Alink_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<script type="text/javascript">
  $.anystretch("<?php bloginfo('template_directory'); ?>/images/fetch_bg.jpg", {speed: 150});
</script>


<div id="blog_wrapper">
	 
	 <?php get_sidebar(); ?> 
	
	<div id="blog_content">
		
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
					<div id="post-<?php the_ID(); ?>">
						
						<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<div class="entry-date">
	                        <p><?php if( function_exists('ADDTOANY_SHARE_SAVE_KIT') ) { ADDTOANY_SHARE_SAVE_KIT(); } ?><?php the_author_meta ('user_firstname') ?> <?php the_author_meta ('user_lastname') ?>, <?php the_time('M j, Y'); ?>  </p>    
	                	</div>
	                	
						<div class="entry-content">
							<?php the_content(); ?>
						</div><!-- .entry-content -->
	
					</div><!-- #post-## -->
					
			<?php endwhile; wp_reset_query(); ?>
	</div><!--blog_content!-->
	
	
	
</div><!--blog_wrapper!-->

<div class="clearboth"></div>



<?php Alink_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>