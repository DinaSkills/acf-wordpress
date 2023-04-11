<?php




/*-----------------------------------------------------------------------------------*/
/* Custom Short Posts
/*-----------------------------------------------------------------------------------*/

/*function create_advanced_posttype() {

 
	// Define the labels used inside the WordPress admin for this custom post type (CPT)
		$labels = array(
			'name'                => _x( 'Short Posts', 'Post Type General Name', 'twentyseventeen_child' ),
			'singular_name'       => _x( 'Short Post', 'Post Type Singular Name', 'twentyseventeen_child' ),
			'add_new'             => __( 'Add New', 'twentyseventeen_child' ),
			'add_new_item'        => __( 'Add New Post', 'twentyseventeen_child' ),
			'edit_item'           => __( 'Edit Post', 'twentyseventeen_child' ),
			'new_item'            => __( 'New Post' ),
			'all_items'           => __( 'All Posts', 'twentyseventeen_child' ),
			'view_item'           => __( 'View Post', 'twentyseventeen_child' ),
			'search_items'        => __( 'Search Short Posts', 'twentyseventeen_child' ),
			'menu_name'           => __( 'Short Posts', 'twentyseventeen_child' ),
			'parent_item_colon'   => __( 'Parent Short Post', 'twentyseventeen_child' ),
			'update_item'         => __( 'Update Short Post', 'twentyseventeen_child' ),
			'not_found'           => __( 'Not Found', 'twentyseventeen_child' ),
			'not_found_in_trash'  => __( 'Not found in Trash', 'twentyseventeen_child' )
		);
		 
	// Define more options for the CPT
		 
		$args = array(
			'label'               => $labels,
			'description'         => __( 'Short Posts information and details', 'twentyseventeen_child' ),
			'labels'              => $labels,
			// Define the allowed features in the post editor
			'supports'            => array( 'title', 'author', 'excerpt', 'thumbnail', 'comments', 'trackbacks', 'page-attributes', 'custom-fields', 'revisions', ),
			// If hierarchical is true then the CPT behaves like a post. If false, it can have parent and child items like a page. 
			'hierarchical'        => true,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			// menu_position defines where in the WP admin menu the CPT appears. 5 puts it right below posts. The higher the number to lower the CPT will be.
			'menu_position'       => 5,
			'can_export'          => true,
			'has_archive'         => true,
			'taxonomies'        => array('post_tag','category' ),
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			  'menu_icon' => 'dashicons-smiley',
			'capability_type'     => 'post',
			'rewrite' => array('slug' => 'wett-tipp',
	'with_front' =>false,
		),
	 
		);
		 
		// Register this CPT
		register_post_type( 'short_posts', $args );
	 
	}
	 
	// hook into the init action and call create_advanced_posttype when it fires
	add_action( 'init', 'create_advanced_posttype', 0 );*/

	function create_advanced_page_anbieter() {

 
		// Define the labels used inside the WordPress admin for this custom post type (CPT)
			$labels = array(
				'name'                => _x( 'Wettanbieter', 'Post Type General Name', 'twentyseventeen_child' ),
				'singular_name'       => _x( 'Wettanbieter', 'Post Type Singular Name', 'twentyseventeen_child' ),
				'add_new'             => __( 'Add New', 'twentyseventeen_child' ),
				'add_new_item'        => __( 'Add New Wettanbieter', 'twentyseventeen_child' ),
				'edit_item'           => __( 'Edit Wettanbieter', 'twentyseventeen_child' ),
				'new_item'            => __( 'New Wettanbieter' ),
				'all_items'           => __( 'All Wettanbieter', 'twentyseventeen_child' ),
				'view_item'           => __( 'View Post', 'twentyseventeen_child' ),
				'search_items'        => __( 'Search Wettanbieter', 'twentyseventeen_child' ),
				'menu_name'           => __( 'Wettanbieter', 'twentyseventeen_child' ),
				'parent_item_colon'   => __( 'Parent Wettanbieter', 'twentyseventeen_child' ),
				'update_item'         => __( 'Update Wettanbieter', 'twentyseventeen_child' ),
				'not_found'           => __( 'Not Found', 'twentyseventeen_child' ),
				'not_found_in_trash'  => __( 'Not found in Trash', 'twentyseventeen_child' )
			);
			 
		// Define more options for the CPT
			 
			$args = array(
					'hierarchical' => true,     
					'labels' => $labels,
					'public' => true,
					'publicly_queryable' => true,
					'show_ui' => true, 
					'show_in_menu' => true, 
					'query_var' => true,
					'rewrite' => true,
					'capability_type' => 'page',
					'has_archive' => false, 
					'menu_position' => 22,
					'menu_icon' => 'dashicons-admin-home',
					'supports' => array( 'title', 'excerpt', 'thumbnail', 'author', 'thumbnail', 'revisions', 'page-attributes', 'custom-fields' )
				); 
		
			 
			// Register this CPT
			register_post_type( 'wettanbieter', $args );
		 
		}
		
		add_action( 'init', 'create_advanced_page_anbieter', 0 );

/*-----------------------------------------------------------------------------------*/
/* SPORTWETTEN-BONUS CUSTOM-TYPE PAGE 
/*-----------------------------------------------------------------------------------*/
/*function create_advanced_page_bonus() {

 
	// Define the labels used inside the WordPress admin for this custom post type (CPT)
		$labels = array(
			'name'                => _x( 'Bonus', 'Post Type General Name', 'twentyseventeen_child' ),
			'singular_name'       => _x( 'Bonus', 'Post Type Singular Name', 'twentyseventeen_child' ),
			'add_new'             => __( 'Add New', 'twentyseventeen_child' ),
			'add_new_item'        => __( 'Add New Bonus', 'twentyseventeen_child' ),
			'edit_item'           => __( 'Edit Bonus', 'twentyseventeen_child' ),
			'new_item'            => __( 'New Bonus' ),
			'all_items'           => __( 'All Bonus', 'twentyseventeen_child' ),
			'view_item'           => __( 'View Bonus', 'twentyseventeen_child' ),
			'search_items'        => __( 'Search Bonus', 'twentyseventeen_child' ),
			'menu_name'           => __( 'Bonus', 'twentyseventeen_child' ),
			'parent_item_colon'   => __( 'Parent Bonus', 'twentyseventeen_child' ),
			'update_item'         => __( 'Update Bonus', 'twentyseventeen_child' ),
			'not_found'           => __( 'Not Found', 'twentyseventeen_child' ),
			'not_found_in_trash'  => __( 'Not found in Trash', 'twentyseventeen_child' )
		);
		 
	// Define more options for the CPT
		 
		$args = array(
				'hierarchical' => true,     
				'labels' => $labels,
				'public' => true,
				'publicly_queryable' => true,
				'show_ui' => true, 
				'show_in_menu' => true, 
				'query_var' => true,
				'rewrite' => true,
				'capability_type' => 'page',
				'has_archive' => false, 
				'menu_position' => 22,
				'menu_icon' => 'dashicons-portfolio',
				'supports' => array( 'title', 'excerpt', 'thumbnail', 'author', 'thumbnail', 'revisions', 'page-attributes', 'custom-fields' )
			); 
	
		 
		// Register this CPT
		register_post_type( 'bonusi', $args );
	 
	}
	
	add_action( 'init', 'create_advanced_page_bonus', 0 );*/
	
	

?>