<?php
/**
 Template Name: Clients
 */
?>
<?php Alink_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<script src="<?php bloginfo('template_directory'); ?>/js/jquery.nyroModal/jquery.nyroModal.custom.js" type="text/javascript"></script>
<!--[if IE 6]>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.nyroModal/jquery.nyroModal-ie6.min.js"></script>
<![endif]-->

<script type="text/javascript">
  $.anystretch("<?php bloginfo('template_directory'); ?>/images/portfolio_bg.jpg");
</script>

<div id="nav_sidebar">
	<?php wp_nav_menu( array('menu' => 'Portfolio Menu' )); ?>
</div>

<div id="content">
		<?php if(is_page('identity')) {
		query_posts(array('post_type' => 'clients', 'cat' =>'1' , 'orderby' => 'name' , 'order' => 'ASC'));
		}
		?>
		<?php if(is_page('digital')) {
		query_posts(array('post_type' => 'clients', 'cat' =>'13' , 'orderby' => 'name' , 'order' => 'ASC'));
		}
		?>
		<?php if(is_page('print')) {
		query_posts(array('post_type' => 'clients', 'cat' =>'14' , 'orderby' => 'name' , 'order' => 'ASC'));
		}
		?>
		<?php if(is_page('case-studies')) {
		query_posts(array('post_type' => 'clients', 'cat' =>'15' , 'orderby' => 'name' , 'order' => 'ASC'));
		}
		?>
		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="client_logo nyroModal">
				<?php
					// Must be inside a loop.
					
					if ( has_post_thumbnail() ) {
						the_post_thumbnail();
					}
					else {
						echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/thumbplaceholder.jpg" height="97px" width="184px"/>';
					}
					?>
			</a>
		<script type="text/javascript">
			$(function() {
			  $('.nyroModal').nyroModal();
			});
		</script>			
		<?php endwhile; wp_reset_query(); ?>
	
</div>

<div class="clearboth"></div>



<?php Alink_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>