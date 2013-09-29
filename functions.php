<?php
	/**
	 */

	/* ========================================================================================================================
	
	Required external files
	
	======================================================================================================================== */

	require_once( 'external/alink-utilities.php' );

	/* ========================================================================================================================
	
	Theme specific settings

	======================================================================================================================== */

	add_theme_support('post-thumbnails');
	
	register_nav_menus( array(
	'main' => 'Main Menu',
	'footer_menu' => 'Footer Menu',
	'capabilities_menu' => 'Capabilities Menu',
	'portfolio_menu' => 'Portfolio Menu',
	'approach_menu' => 'Approach Menu',
	'hubspot_menu' => 'Hubspot Menu'
	) );
	
	add_action('init', 'clients_register_post_type');
 
	function clients_register_post_type() {
		register_post_type('clients', array(
	        'labels' => array(
	            'name' => 'Clients',
	            'singular_name' => 'Client',
	            'add_new' => 'Add new client',
	            'edit_item' => 'Edit client',
	            'new_item' => 'New client',
	            'view_item' => 'View client',
	            'search_items' => 'Search clients',
	            'not_found' => 'No clients found',
	            'not_found_in_trash' => 'No clients found in Trash'
	        ),
	        'public' => true,
	        'supports' => array(
	            'title',
	            'editor',
	            'thumbnail'
	        ),
	        'taxonomies' => array('category', 'post_tag') // this is IMPORTANT
	    ));
	    
	    register_post_type('charities', array(
	        'labels' => array(
	            'name' => 'Charities',
	            'singular_name' => 'Charity',
	            'add_new' => 'Add new charity',
	            'edit_item' => 'Edit charity',
	            'new_item' => 'New charity',
	            'view_item' => 'View charity',
	            'search_items' => 'Search charities',
	            'not_found' => 'No charities found',
	            'not_found_in_trash' => 'No charities found in Trash'
	        ),
	        'public' => true,
	        'supports' => array(
	            'title',
	        ),
	    ));
	}
		

	/* ========================================================================================================================
	
	Actions and Filters
	
	======================================================================================================================== */

	add_action( 'wp_enqueue_scripts', 'alink_script_enqueuer' );

	add_filter( 'body_class', array( 'Alink_Utilities', 'add_slug_to_body_class' ) );
	
	function mcneil_excerpt_length( $length ) {
	return 25;
		}
	add_filter( 'excerpt_length', 'mcneil_excerpt_length' );

	function mcneil_continue_reading_link() {
		return '<p class="excerpt_more"><a href="'. get_permalink() . '">' . __( 'read full article &raquo;', 'mcneil' ) . '</a></p>';
}
	function mcneil_auto_excerpt_more( $more ) {
	return '' . mcneil_continue_reading_link();
}
add_filter( 'excerpt_more', 'mcneil_auto_excerpt_more' );

	/* ========================================================================================================================
	
	Custom Post Types - include custom post types and taxonimies here e.g.

	e.g. require_once( 'custom-post-types/your-custom-post-type.php' );
	
	======================================================================================================================== */



	/* ========================================================================================================================
	
	Scripts
	
	======================================================================================================================== */

	/**
	 * Add scripts via wp_head()
	 *
	 * @return void
	 * @author Keir Whitaker
	 */

	function starkers_script_enqueuer() {
		wp_register_script( 'site', get_template_directory_uri().'/js/site.js', array( 'jquery' ) );
		wp_enqueue_script( 'site' );

		wp_register_style( 'screen', get_stylesheet_directory_uri().'/style.css', '', '', 'screen' );
        wp_enqueue_style( 'screen' );
	}	

	/* ========================================================================================================================
	
	Comments
	
	======================================================================================================================== */

	/**
	 * Custom callback for outputting comments 
	 *
	 * @return void
	 * @author Keir Whitaker
	 */
	function alink_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment; 
		?>
		<?php if ( $comment->comment_approved == '1' ): ?>	
		<li>
			<article id="comment-<?php comment_ID() ?>">
				<?php echo get_avatar( $comment ); ?>
				<h4><?php comment_author_link() ?></h4>
				<time><a href="#comment-<?php comment_ID() ?>" pubdate><?php comment_date() ?> at <?php comment_time() ?></a></time>
				<?php comment_text() ?>
			</article>
		<?php endif;
	}
	
	// do not use on live/production servers
	add_action('init','maybe_rewrite_rules');
	function maybe_rewrite_rules( ) {
	
		$ver = filemtime( __FILE__ ); // Get the file time for this file as the version number
		$defaults = array( 'version' => 0, 'time' => time( ) );
		$r = wp_parse_args( get_option( __CLASS__ . '_flush', array( ) ), $defaults );
	
		if ( $r[ 'version' ] != $ver || $r[ 'time' ] + 172800 < time( ) ) { // Flush if ver changes or if 48hrs has passed.
			flush_rewrite_rules();
			// trace( 'flushed' );
			$args = array( 'version' => $ver, 'time' => time( ) );
			if ( ! update_option( __CLASS__ . '_flush', $args ) )
				add_option( __CLASS__ . '_flush', $args );
		}
	
	}