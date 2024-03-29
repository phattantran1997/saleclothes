<?php
/**
 * zamura functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package zamura
 */

if ( ! function_exists( 'zamura_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function zamura_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on zamura, use a find and replace
		 * to change 'zamura' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'zamura', get_template_directory() . '/languages' );

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
		add_image_size( 'zamura-home-posts', 900, 600 );
		add_image_size( 'zamura-owl', 2000, 700, array( 'center', 'center' ) );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'zamura' ),
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
		add_theme_support( 'custom-background', apply_filters( 'zamura_custom_background_args', array(
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
		
		add_post_type_support( 'page', 'excerpt' );
		
		// Enable WooCommerce.
		add_theme_support( 'woocommerce' );
		add_filter( 'woocommerce_enqueue_styles', '__return_false' );		
		
	}
endif;
add_action( 'after_setup_theme', 'zamura_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function zamura_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'zamura_content_width', 640 );
}
add_action( 'after_setup_theme', 'zamura_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function zamura_widgets_init() {
	
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'zamura' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'zamura' ),
		'before_widget' => '<section id="%1$s" class="widget widgetContainer %2$s"><div class="widgetContainerInner">',
		'after_widget'  => '</div></section>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );	
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Left Widget Area', 'zamura' ),
		'id'            => 'footer-left',
		'description'   => esc_html__( 'Add widgets here.', 'zamura' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Middle Widget Area', 'zamura' ),
		'id'            => 'footer-middle',
		'description'   => esc_html__( 'Add widgets here.', 'zamura' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Right Widget Area', 'zamura' ),
		'id'            => 'footer-right',
		'description'   => esc_html__( 'Add widgets here.', 'zamura' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );
	
}
add_action( 'widgets_init', 'zamura_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function zamura_scripts() {
	
	wp_enqueue_style( 'zamura-fonts', '//fonts.googleapis.com/css?family=Open+Sans:400,600,700' );
	
	if( get_stylesheet_directory() != get_template_directory() ){
		wp_enqueue_style( 'zamura-parent', esc_url( get_template_directory_uri() ) . '/style.css' );
	}
	
	wp_enqueue_style( 'zamura-style', get_stylesheet_uri() );
	
	wp_enqueue_style( 'zamura-slider-css', get_template_directory_uri() . '/assets/css/slider/owl.carousel.css' );
	wp_enqueue_style( 'zamura-slider-theme', get_template_directory_uri() . '/assets/css/slider/owl.theme.css' );
	wp_enqueue_style( 'zamura-slider-transitions', get_template_directory_uri() . '/assets/css/slider/owl.transitions.css' );	

	wp_enqueue_script( 'zamura-owl', esc_url( get_template_directory_uri() ) . '/assets/js/owl.carousel.js', array('jquery'), '20151215', true );
	
	wp_enqueue_script( 'zamura-general', esc_url( get_template_directory_uri() ) . '/assets/js/general.js', array('jquery'), '20151215', true );

	wp_enqueue_script( 'zamura-skip-link-focus-fix', esc_url( get_template_directory_uri() ) . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'zamura_scripts' );



require get_template_directory() . '/inc/variables.php';

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

function zamura_limitedstring($output, $max_char=100){
	
	$output = str_replace(']]>', ']]&gt;', $output);
    $output = strip_tags($output);
    $output = strip_shortcodes($output);

  	if ((strlen($output)>$max_char)){
        $output = substr($output, 0, $max_char);
		return $output;
   	}else{
      	return $output;
   	}
	
}

function zamura_upgrade(){
	
	wp_enqueue_style('zamura_upgrade', esc_url( get_template_directory_uri() ).'/assets/css/upgrade.css' );
	
}

add_action('customize_controls_print_scripts', 'zamura_upgrade');