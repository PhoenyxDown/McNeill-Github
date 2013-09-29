<?php
/**
 Template Name: Giving Back
 */
?>
<?php Alink_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<script type="text/javascript">
  $.anystretch("<?php bloginfo('template_directory'); ?>/images/givingback_bg.jpg");
</script>

<div id="nav_sidebar_charities">
	<?php query_posts(array('post_type' => 'charities', 'orderby' => 'name', 'order' => 'ASC'));?>
		<ul>
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); 	?> 
			<li class="charity_nav">
				<a href="<?php echo get_field('charity_url'); ?>">
					<img src="<?php echo get_field('charity_image'); ?>" width="122px" height="64px" title="<?php the_title(); ?>" target="_blank">
				</a>
			</li>
		</ul>
	<?php endwhile; wp_reset_query(); ?>
</div>

<div id="content">
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		<?php
 
			if(get_field('main_heading'))
			{
				echo '<h2>' . get_field('main_heading') . '<br /><span class="subheading">'.get_field('sub_heading').'</span></h2>';
					
			}
 
		?>		
		
		<?php the_content(); ?>
	<?php endwhile; ?>
</div>

<div class="clearboth"></div>



<?php Alink_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>