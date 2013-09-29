<?php
/**
 Template Name: Fetch
 */
?>
<?php Alink_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<script type="text/javascript">
  $.anystretch("<?php bloginfo('template_directory'); ?>/images/fetch_bg.jpg");
</script>


<div id="blog_wrapper">
	 
	 <?php get_sidebar(); ?> 
	
	<div id="blog_content">
			<?php
				$temp = $wp_query;
				$wp_query= null;
				$wp_query = new WP_Query();
				$wp_query->query('showposts=2'.'&paged='.$paged);
			?>
		
			<?php //query_posts('posts_per_page=2&cat=-1,-13,-14,-15'); ?>
			<?php while ($wp_query->have_posts()) : $wp_query->the_post();	?>
					<div id="post-<?php the_ID(); ?>" class="post-excerpt">
						
						<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<div class="entry-date">
	                        <p><?php the_author_meta ('user_firstname') ?> <?php the_author_meta ('user_lastname') ?>, <?php the_time('M j, Y'); ?></p>    
	                	</div>
	                	
						<div class="entry-excerpt">
							<?php the_excerpt(); ?>
						</div><!-- .entry-excerpt -->
	
					</div><!-- #post-## -->
					
			<?php endwhile; ?>
			<?php if (function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>
			<?php $wp_query = null; $wp_query = $temp;?>

	</div><!--blog_content!-->
	
	
	
</div><!--blog_wrapper!-->

<div class="clearboth"></div>



<?php Alink_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>