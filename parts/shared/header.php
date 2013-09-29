<header>
	<div id="headerbanner">
			
			<a id="headerlogo" href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>">
				<?php bloginfo('name'); ?>
			</a>
						
			<div id="main_menu">
				<?php wp_nav_menu( array('menu' => 'Main Menu' )); ?>
			</div><!--headernav!-->
		</div><!--headerbanner!-->
</header>