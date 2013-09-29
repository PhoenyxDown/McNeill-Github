<?php
/**
 Template Name: Home
 */
?>
<?php Alink_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<script type="text/javascript">
  $.anystretch("<?php bloginfo('template_directory'); ?>/images/home_bg.jpg");
</script>

<div id="home_content">

<a href="<?php echo home_url(); ?>/approach"><img src="<?php bloginfo('template_directory'); ?>/images/home_slogan.png" alt="" title="" class="home_slogan"></a>

</div>

<?php Alink_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>