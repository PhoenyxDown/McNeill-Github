<?php
/**

 */
?>

<?php Alink_Utilities::get_template_parts( array( 'parts/shared/html-header' ) ); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<div id="client_lightbox">
	

	<div id="client_bio">
		<h2><?php the_title()?></h2>
		<h3>
			<?php $categories = get_the_category();
				  $separator = ', ';
				  $output = '';
				if($categories){
					foreach($categories as $category) {
					$output .= $category->cat_name . $separator;
					}
				echo trim($output, $separator);
				}
			?>
		</h3>
		<?php the_content(); ?>
	</div>
	
	<div id="client_artwork">
		<?php
 
			if(get_field('portfolio_image'))
			{
				echo '<img src="' . get_field('portfolio_image') . '" class="portfolio_image" />';
			}
		?>
	</div>
	
</div>

<?php endwhile; ?>

<?php Alink_Utilities::get_template_parts( array( 'parts/shared/html-footer' ) ); ?>