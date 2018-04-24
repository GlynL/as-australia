<?php
/**
 * as-australia functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package as-australia
 */

// for printing variable values with formatting
function vd($var) {
  echo "<pre>";
  print_r($var);
  echo "</pre>";
}

if ( ! function_exists( 'as_australia_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function as_australia_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on as-australia, use a find and replace
		 * to change 'as-australia' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'as-australia', get_template_directory() . '/languages' );

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
		// register_nav_menus( array(
		// 	'menu-1' => esc_html__( 'Primary', 'as-australia' ),
		// ) );

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
		add_theme_support( 'custom-background', apply_filters( 'as_australia_custom_background_args', array(
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
add_action( 'after_setup_theme', 'as_australia_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function as_australia_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'as_australia_content_width', 640 );
}
add_action( 'after_setup_theme', 'as_australia_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function as_australia_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'as-australia' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'as-australia' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'as_australia_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function as_australia_scripts() {
  wp_enqueue_style('as-australia-googlefonts', 'https://fonts.googleapis.com/css?family=Merriweather:700|Open+Sans', false);
  wp_enqueue_style('as-australia-fa', 'https://use.fontawesome.com/releases/v5.0.9/css/all.css');
  wp_enqueue_style( 'as-australia-style', get_stylesheet_uri());
	wp_enqueue_script( 'as-australia-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true);
  wp_enqueue_script( 'as-australia-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true);
  wp_enqueue_script('as-australia-rsvp', get_template_directory_uri() . '/js/rsvp.js', NULL, microtime(), true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' )) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'as_australia_scripts' );

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

/**
 * RSVP Custom API Route
 */

require get_theme_file_path('/inc/rsvp-route.php');


/**
* ADJUSTED QUERIES 
*/

function university_adjust_queries($query) {
  if (!is_admin() && is_post_type_archive('event') && $query->is_main_query()) {
    $query->set('meta_key', 'event_date');
    $query->set('orderby', 'meta_value_num');
    $query->set('order', 'ASC');
    $query->set('meta_query', array(
      array(
        'key' => 'event_date',
        'compare' => '>=',
        'value' => date('Ymd'),
        'type' => 'numeric'
      )
    ));
  };
}

add_action('pre_get_posts', 'university_adjust_queries');


/* ------------------
LOG-IN Logic
--------------------*/

// redirect subscriber accounts out of admin and onto homepage
add_action('admin_init', 'redirectSubsToFrontend');
  
function redirectSubsToFrontend() {
  $ourCurrentUser = wp_get_current_user();
  if (count($ourCurrentUser->roles) === 1 && $ourCurrentUser->roles[0] === 'subscriber') {
    wp_redirect(site_url('/'));
    exit;
  }
}

// remove admin bar for subs
add_action('wp_loaded', 'noSubsAdminBar');
  
function noSubsAdminBar() {
  $ourCurrentUser = wp_get_current_user();
  if (count($ourCurrentUser->roles) === 1 && $ourCurrentUser->roles[0] === 'subscriber') {
    show_admin_bar(false);
  }
}

// change login page logo url
add_filter('login_headerurl', 'ourHeaderUrl');

function ourHeaderUrl() {
  return esc_url(site_url('/'));
}

 // load css on login screen
 add_action('login_enqueue_scripts', 'ourLoginCSS');

 function ourLoginCSS() {
  wp_enqueue_style('as-australia-googlefonts', 'https://fonts.googleapis.com/css?family=Merriweather:700|Open+Sans', false);
  wp_enqueue_style('as-australia-style', get_stylesheet_uri());
 }
 
 add_filter('login_headertitle', 'ourLoginTitle');

 // change title/hover info
 function ourLoginTitle() {
   return get_bloginfo('name');
 }

 add_filter('login_message', 'ourRegisterMessage');

 function ourRegisterMessage($message) {
   if ($message === '<p class="message register">Register For This Site</p>') {
     $message = '<p class="message register">Register</p>';
   };
   return $message;
 }
