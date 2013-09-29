<div id="blog_sidebar">
	
	<div class="blog_sidebar_widget">
		<h3>Latest</h3>
		<?php query_posts('posts_per_page=4&cat=-1,-13,-14,-15'); ?>
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
					<div id="post-<?php the_ID(); ?>" class="sidebar-excerpt">
						<div class="sidebar-entry-date">
	                       <?php the_time('M'); ?><br />
	                       <span class="sidebar_day"><strong><?php the_time('j'); ?></strong></span>
	                	</div>
						<h4 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
					</div><!-- sidebar-excerpt -->
					<div class="clearboth"></div>

			<?php endwhile; wp_reset_query(); ?>
	</div><!--sidebar widget!-->
	
	<div class="blog_sidebar_widget">
		<h3>Featured Articles</h3>
		<ul class="featured-title">
			<?php query_posts('posts_per_page=6&cat=18'); ?>
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
			<?php endwhile; wp_reset_query(); ?>
		</ul>
	</div><!--sidebar widget!-->
	
	<div class="blog_sidebar_widget">
		<h3>Follow Us</h3>
		<a href="" class="social" title=""><img src="<?php bloginfo('template_directory'); ?>/images/social_fb.png"></a>
		<a href="" class="social" title=""><img src="<?php bloginfo('template_directory'); ?>/images/social_twit.png"></a>
		<a href="" class="social" title=""><img src="<?php bloginfo('template_directory'); ?>/images/social_gplus.png"></a>
		<a href="" class="social" title=""><img src="<?php bloginfo('template_directory'); ?>/images/social_linked.png"></a>
		<a href="" class="social" title=""><img src="<?php bloginfo('template_directory'); ?>/images/social_rss.png"></a>
	</div><!--sidebar widget!-->

</div><!--blog_sidebar"!-->