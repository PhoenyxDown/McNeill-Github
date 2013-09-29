<?php
/**

 */
?>
<?php Alink_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<script type="text/javascript">
  $.anystretch("<?php bloginfo('template_directory'); ?>/images/capabilities_bg.jpg");
</script>

<div id="nav_sidebar">
	
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