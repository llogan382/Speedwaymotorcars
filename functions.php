<?php
/**
 * speedwaymotorcars functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package speedwaymotorcars
 */

if ( ! function_exists( 'speedwaymotorcars_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function speedwaymotorcars_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on speedwaymotorcars, use a find and replace
		 * to change 'speedwaymotorcars' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'speedwaymotorcars', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'speedwaymotorcars' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'speedwaymotorcars_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'speedwaymotorcars_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function speedwaymotorcars_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'speedwaymotorcars_content_width', 640 );
}
add_action( 'after_setup_theme', 'speedwaymotorcars_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function speedwaymotorcars_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'speedwaymotorcars' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'speedwaymotorcars' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'speedwaymotorcars_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function speedwaymotorcars_scripts() {
	wp_enqueue_style( 'speedwaymotorcars-style', get_stylesheet_uri() );

	wp_enqueue_script( 'speedwaymotorcars-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'speedwaymotorcars-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'speedwaymotorcars_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

// Register Custom Post Type
function lwd_speedway_vehicles_cpt() {

	$labels = array(
		'name'                  => _x( 'Vehicles', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Vehicle', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Vehicles', 'text_domain' ),
		'name_admin_bar'        => __( 'Vehicles', 'text_domain' ),
		'archives'              => __( 'Vehicle Archives', 'text_domain' ),
		'attributes'            => __( 'Vehicle Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Vehicle:', 'text_domain' ),
		'all_items'             => __( 'All Vehicles', 'text_domain' ),
		'add_new_item'          => __( 'Add New Vehicle', 'text_domain' ),
		'add_new'               => __( 'Add New Vehicle', 'text_domain' ),
		'new_item'              => __( 'New Vehicle', 'text_domain' ),
		'edit_item'             => __( 'Edit Vehicle', 'text_domain' ),
		'update_item'           => __( 'Update Vehicle', 'text_domain' ),
		'view_item'             => __( 'View Vehicle', 'text_domain' ),
		'view_items'            => __( 'View Vehicles', 'text_domain' ),
		'search_items'          => __( 'Search Vehicles', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into Vehicle', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Vehicle', 'text_domain' ),
		'items_list'            => __( 'Vehicles list', 'text_domain' ),
		'items_list_navigation' => __( 'Vehicles list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter Vehicles list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Vehicle', 'text_domain' ),
		'description'           => __( 'Vehicles', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'page-attributes' ),
		'taxonomies'            => array( 'vehicle_type', ' makers_models', '' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-vault',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'query_var'             => 'vehicle_query',
		'capability_type'       => 'post',
		'show_in_rest'          => true,
	);
	register_post_type( 'lwd_speedway_vehicle', $args );

}
add_action( 'init', 'lwd_speedway_vehicles_cpt', 0 );


// Register Custom Taxonomy
function vehicle_type() {

	$labels = array(
		'name'                       => _x( 'Vehicle Types', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Vehicle Type', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Types', 'text_domain' ),
		'all_items'                  => __( 'All Types', 'text_domain' ),
		'parent_item'                => __( 'Parent Type', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Type:', 'text_domain' ),
		'new_item_name'              => __( 'New Type Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Type', 'text_domain' ),
		'edit_item'                  => __( 'Edit Type', 'text_domain' ),
		'update_item'                => __( 'Update Type', 'text_domain' ),
		'view_item'                  => __( 'View Type', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate Types with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove Types', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Types', 'text_domain' ),
		'search_items'               => __( 'Search Types', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No items', 'text_domain' ),
		'items_list'                 => __( 'Types list', 'text_domain' ),
		'items_list_navigation'      => __( 'Types list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'show_in_rest'               => true,
	);
	register_taxonomy( 'vehicle_type', array( 'lwd_speedway_vehicle' ), $args );

}
add_action( 'init', 'vehicle_type', 0 );

// Register Custom Taxonomy
function makers_models() {

	$labels = array(
		'name'                       => _x( 'Vehicle Makers/Models', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Vehicle Makers/Models', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Makers/Models', 'text_domain' ),
		'all_items'                  => __( 'All Makers/Models', 'text_domain' ),
		'parent_item'                => __( 'Parent Makers/Models', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Maker/Model:', 'text_domain' ),
		'new_item_name'              => __( 'New Type Makers/Models', 'text_domain' ),
		'add_new_item'               => __( 'Add New Makers/Models', 'text_domain' ),
		'edit_item'                  => __( 'Edit Makers/Models', 'text_domain' ),
		'update_item'                => __( 'Update Makers/Models', 'text_domain' ),
		'view_item'                  => __( 'View Makers/Models', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate Makers/Models with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove Makers/Models', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Makers/Models', 'text_domain' ),
		'search_items'               => __( 'Search Makers/Models', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No Makers/Models', 'text_domain' ),
		'items_list'                 => __( 'Makers/Models list', 'text_domain' ),
		'items_list_navigation'      => __( 'Makers/Models list navigation', 'text_domain' ),
	);
	$rewrite = array(
		'slug'                       => 'makers',
		'with_front'                 => true,
		'hierarchical'               => true,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite'                    => $rewrite,
		'show_in_rest'               => true,
	);
	register_taxonomy( 'makers_models', array( 'lwd_speedway_vehicle' ), $args );

}
add_action( 'init', 'makers_models', 0 );

// Register Custom Taxonomy
function lwd_vehicle_colors() {

	$labels = array(
		'name'                       => _x( 'Vehicle Colors', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Vehicle Color', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Colors', 'text_domain' ),
		'all_items'                  => __( 'All Colors', 'text_domain' ),
		'parent_item'                => __( 'Parent Colors', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Colors', 'text_domain' ),
		'new_item_name'              => __( 'New Colors', 'text_domain' ),
		'add_new_item'               => __( 'Add New Colors', 'text_domain' ),
		'edit_item'                  => __( 'Edit Colors', 'text_domain' ),
		'update_item'                => __( 'Update Colors', 'text_domain' ),
		'view_item'                  => __( 'View Colors', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate Colors with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove Colors', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Colors', 'text_domain' ),
		'search_items'               => __( 'Search Colors', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No Colors', 'text_domain' ),
		'items_list'                 => __( 'Colors list', 'text_domain' ),
		'items_list_navigation'      => __( 'Colors list navigation', 'text_domain' ),
	);
	$rewrite = array(
		'slug'                       => 'makers',
		'with_front'                 => true,
		'hierarchical'               => true,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite'                    => $rewrite,
		'show_in_rest'               => true,
	);
	register_taxonomy( 'lwd_vehicle_colors', array( 'lwd_speedway_vehicle' ), $args );

}
add_action( 'init', 'lwd_vehicle_colors', 0 );

// Register Custom Taxonomy
function lwd_interior_features() {

	$labels = array(
		'name'                       => _x( 'Interior Features', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Interior Feature', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Interior Features', 'text_domain' ),
		'all_items'                  => __( 'All Interior Features', 'text_domain' ),
		'parent_item'                => __( 'Parent Interior Features', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Interior Features', 'text_domain' ),
		'new_item_name'              => __( 'New Interior Features', 'text_domain' ),
		'add_new_item'               => __( 'Add New Interior Features', 'text_domain' ),
		'edit_item'                  => __( 'Edit Interior Features', 'text_domain' ),
		'update_item'                => __( 'Update Interior Features', 'text_domain' ),
		'view_item'                  => __( 'View Interior Features', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate Interior Features with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove Interior Features', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Interior Features', 'text_domain' ),
		'search_items'               => __( 'Search Interior Features', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No Interior Features', 'text_domain' ),
		'items_list'                 => __( 'Interior Features list', 'text_domain' ),
		'items_list_navigation'      => __( 'Interior Features list navigation', 'text_domain' ),
	);
	$rewrite = array(
		'slug'                       => 'Interior_Features',
		'with_front'                 => true,
		'hierarchical'               => false,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite'                    => $rewrite,
		'show_in_rest'               => true,
	);
	register_taxonomy( 'lwd_interior_features', array( 'lwd_speedway_vehicle' ), $args );

}
add_action( 'init', 'lwd_interior_features', 0 );

// Register Custom Taxonomy
function lwd_exterior_features() {

	$labels = array(
		'name'                       => _x( 'Exterior Features', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Exterior Feature', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Exterior Features', 'text_domain' ),
		'all_items'                  => __( 'All Exterior Features', 'text_domain' ),
		'parent_item'                => __( 'Parent Exterior Features', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Exterior Features', 'text_domain' ),
		'new_item_name'              => __( 'New Exterior Features', 'text_domain' ),
		'add_new_item'               => __( 'Add New Exterior Features', 'text_domain' ),
		'edit_item'                  => __( 'Edit Exterior Features', 'text_domain' ),
		'update_item'                => __( 'Update Exterior Features', 'text_domain' ),
		'view_item'                  => __( 'View Exterior Features', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate Exterior Features with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove Exterior Features', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Exterior Features', 'text_domain' ),
		'search_items'               => __( 'Search Exterior Features', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No Exterior Features', 'text_domain' ),
		'items_list'                 => __( 'Exterior Features list', 'text_domain' ),
		'items_list_navigation'      => __( 'Exterior Features list navigation', 'text_domain' ),
	);
	$rewrite = array(
		'slug'                       => 'exterior_Features',
		'with_front'                 => true,
		'hierarchical'               => false,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite'                    => $rewrite,
		'show_in_rest'               => true,
	);
	register_taxonomy( 'lwd_exterior_features', array( 'lwd_speedway_vehicle' ), $args );

}
add_action( 'init', 'lwd_exterior_features', 0 );

// Register Custom Taxonomy
function lwd_safety_features() {

	$labels = array(
		'name'                       => _x( 'Safety Features', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Safety Feature', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Safety Features', 'text_domain' ),
		'all_items'                  => __( 'All Safety Features', 'text_domain' ),
		'parent_item'                => __( 'Parent Safety Features', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Safety Features', 'text_domain' ),
		'new_item_name'              => __( 'New Safety Features', 'text_domain' ),
		'add_new_item'               => __( 'Add New Safety Features', 'text_domain' ),
		'edit_item'                  => __( 'Edit Safety Features', 'text_domain' ),
		'update_item'                => __( 'Update Safety Features', 'text_domain' ),
		'view_item'                  => __( 'View Safety Features', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate Safety Features with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove Safety Features', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Safety Features', 'text_domain' ),
		'search_items'               => __( 'Search Safety Features', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No Safety Features', 'text_domain' ),
		'items_list'                 => __( 'Safety Features list', 'text_domain' ),
		'items_list_navigation'      => __( 'Safety Features list navigation', 'text_domain' ),
	);
	$rewrite = array(
		'slug'                       => 'safety_Features',
		'with_front'                 => true,
		'hierarchical'               => false,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite'                    => $rewrite,
		'show_in_rest'               => true,
	);
	register_taxonomy( 'lwd_safety_features', array( 'lwd_speedway_vehicle' ), $args );

}
add_action( 'init', 'lwd_safety_features', 0 );

// Register Custom Taxonomy
function lwd_extra_features() {

	$labels = array(
		'name'                       => _x( 'Extra Features', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Extra Feature', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Extra Features', 'text_domain' ),
		'all_items'                  => __( 'All Extra Features', 'text_domain' ),
		'parent_item'                => __( 'Parent Extra Features', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Extra Features', 'text_domain' ),
		'new_item_name'              => __( 'New Extra Features', 'text_domain' ),
		'add_new_item'               => __( 'Add New Extra Features', 'text_domain' ),
		'edit_item'                  => __( 'Edit Extra Features', 'text_domain' ),
		'update_item'                => __( 'Update Extra Features', 'text_domain' ),
		'view_item'                  => __( 'View Extra Features', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate Extra Features with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove Extra Features', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Extra Features', 'text_domain' ),
		'search_items'               => __( 'Search Extra Features', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No Extra Features', 'text_domain' ),
		'items_list'                 => __( 'Extra Features list', 'text_domain' ),
		'items_list_navigation'      => __( 'Extra Features list navigation', 'text_domain' ),
	);
	$rewrite = array(
		'slug'                       => 'extra_Features',
		'with_front'                 => true,
		'hierarchical'               => false,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite'                    => $rewrite,
		'show_in_rest'               => true,
	);
	register_taxonomy( 'lwd_extra_features', array( 'lwd_speedway_vehicle' ), $args );

}
add_action( 'init', 'lwd_extra_features', 0 );

// Register Custom Taxonomy
function lwd_vehicle_transmission() {

	$labels = array(
		'name'                       => _x( 'Transmissions', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Transmission', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Transmission', 'text_domain' ),
		'all_items'                  => __( 'All Transmissions', 'text_domain' ),
		'parent_item'                => __( 'Parent Transmission', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Transmission', 'text_domain' ),
		'new_item_name'              => __( 'New Transmission', 'text_domain' ),
		'add_new_item'               => __( 'Add New Transmission', 'text_domain' ),
		'edit_item'                  => __( 'EditTransmission', 'text_domain' ),
		'update_item'                => __( 'Update Transmission Features', 'text_domain' ),
		'view_item'                  => __( 'View Transmission', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate Transmission with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove Transmission', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Transmissions', 'text_domain' ),
		'search_items'               => __( 'Search Transmission', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No Transmission', 'text_domain' ),
		'items_list'                 => __( 'Transmission list', 'text_domain' ),
		'items_list_navigation'      => __( 'Transmission list navigation', 'text_domain' ),
	);
	$rewrite = array(
		'slug'                       => 'transmission',
		'with_front'                 => true,
		'hierarchical'               => false,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite'                    => $rewrite,
		'show_in_rest'               => true,
	);
	register_taxonomy( 'lwd_vehicle_trans', array( 'lwd_speedway_vehicle' ), $args );

}
add_action( 'init', 'lwd_vehicle_transmission', 0 );