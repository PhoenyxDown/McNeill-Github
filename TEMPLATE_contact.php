<?php
/**
 TEMPLATE NAME: Contact
 */
?>
<?php Alink_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<script type="text/javascript">
  $.anystretch("<?php bloginfo('template_directory'); ?>/images/contactus_bg.jpg");
</script>

<div id="contact_content">
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>		
		<?php the_content(); ?>
	<?php endwhile; ?>

		<div class="contact_map">
		<?php echo do_shortcode('[google-map-v3 width="380" height="300" zoom="15" maptype="roadmap" mapalign="center" directionhint="false" language="default" poweredby="false" maptypecontrol="true" pancontrol="true" zoomcontrol="true" scalecontrol="true" streetviewcontrol="true" scrollwheelcontrol="false" draggable="true" tiltfourtyfive="false" addmarkermashupbubble="false" addmarkermashupbubble="false" addmarkerlist="202 Neal Place High Point, NC 27265{}country.png" bubbleautopan="true" showbike="false" showtraffic="false" showpanoramio="false"]'); ?>
		<a href="http://goo.gl/maps/IKbgF">Get Directions</a>
		</div>
</div>

<div class="clearboth"></div>

<?php Alink_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>