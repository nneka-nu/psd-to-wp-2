<?php
/**
 * webportfolio functions and definitions
 */

if ( ! function_exists( 'webportfolio_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function webportfolio_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on webportfolio, use a find and replace
	 * to change 'webportfolio' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'webportfolio', get_template_directory() . '/languages' );

	// Add image size for about section of homepage
	add_image_size( 'about-image', 785, 535, true );

	// Add image size for portfolio single post featured img
	add_image_size( 'single-portfolio', 1170, 740, true );

	// Add image size for portfolio images on homepage
	add_image_size( 'portfolio-470', 470, 427, true );

	// Add image size for portfolio images on homepage
	add_image_size( 'portfolio-570', 570, 427, true );

	// Add image size for portfolio images on homepage
	add_image_size( 'portfolio-670', 670, 427, true );

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
		'menu-1' => esc_html__( 'Primary', 'webportfolio' ),
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
	add_theme_support( 'custom-background', apply_filters( 'webportfolio_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'webportfolio_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function webportfolio_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'webportfolio_content_width', 640 );
}
add_action( 'after_setup_theme', 'webportfolio_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function webportfolio_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'webportfolio' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'webportfolio' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'webportfolio_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function webportfolio_scripts() {
	wp_enqueue_style( 'google-font-fira-sans', '//fonts.googleapis.com/css?family=Fira+Sans:300,300i,400' );
	
	wp_enqueue_style( 'google-font-playfair-display', '//fonts.googleapis.com/css?family=Playfair+Display:700,900' );

	wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );

	wp_enqueue_style( 'webportfolio-style', get_stylesheet_uri(), array(), '1.0.0' );

	wp_enqueue_script( 'webportfolio-script', get_template_directory_uri() . '/js/script.js', array( 'underscore', 'jquery' ), '1.0', true );

	wp_enqueue_script( 'webportfolio-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'webportfolio-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'webportfolio_scripts' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function webportfolio_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'webportfolio_pingback_header' );

function webportfolio_portfolio_posttype() {
    $labels = array(
        'name'                  => 'Portfolio',
        'singular_name'         => 'Work',
        'menu_name'             => 'Portfolio',
        'name_admin_bar'        => 'Work',
        'add_new'               => 'Add New',
        'add_new_item'          => 'Add New Work',
        'new_item'              => 'New Work',
        'edit_item'             => 'Edit Work',
        'view_item'             => 'View Work',
        'all_items'             => 'All Works',
        'search_items'          => 'Search Works',
        'parent_item_colon'     => 'Parent Works:',
        'not_found'             => 'No works found.',
        'not_found_in_trash'    => 'No works found in Trash.'
    );
 
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'portfolio' ),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => null,
				'menu_icon'					 => 'dashicons-portfolio',
        'supports'           => array( 'title', 'editor', 'thumbnail' ),
    );
 
    register_post_type( 'portfolio', $args );
}
add_action( 'init', 'webportfolio_portfolio_posttype' );

function webportfolio_custom_taxonomies() {
	register_taxonomy(
		'portfolio_categories',
		'portfolio',
		array(
			'label'        => __( 'Tags' ),
			'rewrite' 		 => array( 'slug' => 'portfolio-tags' ),
			'show_ui'      => true,
			'hierarchical' => false,
		)
	);
}
add_action( 'init', 'webportfolio_custom_taxonomies' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Additional features to allow styling of the templates.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
