<?php
/**
 * geist functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package geist
 */

if ( ! function_exists( 'geist_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function geist_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on geist, use a find and replace
		 * to change 'geist' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'geist', get_template_directory() . '/languages' );

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
			'primary' => esc_html__( 'Primary Menu', 'geist' ),
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

		// Add support for full width images
		add_theme_support( 'align-wide' );
	}
endif;
add_action( 'after_setup_theme', 'geist_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function geist_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'geist_content_width', 1040 );
}
add_action( 'after_setup_theme', 'geist_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function geist_scripts() {
	wp_enqueue_style( 'geist-style', get_stylesheet_uri() );
	wp_enqueue_style( 'geist-screen', get_template_directory_uri() . '/built/screen.css', array(),'20210210' );

	// Dark mode
	if ( get_theme_mod( 'geist_dark_mode_toggle') === 'auto' ){
		wp_enqueue_style( 'geist-dark-mode', get_template_directory_uri() . '/built/dark-mode.css', array(),'20201016' );
	}

	wp_enqueue_script( 'geist-main', get_template_directory_uri() . '/built/main.js', array('jquery'), '20190322', true );

	wp_enqueue_script( 'geist-fitvids', get_template_directory_uri() . '/built/jquery.fitvids.js', array(), '20190322', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'geist_scripts' );

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
 * Estimate time required to read the article
 * https://www.binarymoon.co.uk/2013/10/wordpress-estimated-reading-time/
 *
 * @return string
 */
function geist_estimated_reading_time() {

    $post = get_post();

    $words = str_word_count( strip_tags( $post->post_content ) );
    $minutes = floor( $words / 120 );
    $seconds = floor( $words % 120 / ( 120 / 60 ) );

    if ( 1 <= $minutes ) {
        /* translators: %d: number of minutes a post will take to read, i.e. 10 min read  */
        $estimated_time = sprintf( esc_html__( '%d min read', 'geist' ), esc_html( $minutes ) );
    } else {
        $estimated_time = sprintf( esc_html__( '1 min read', 'geist' ) );
    }

    return $estimated_time;

}

/**
 * Change [...] to ... in excerpt
 */

function geist_new_excerpt_more( $more ) {
    return '...';
}

add_filter('excerpt_more', 'geist_new_excerpt_more');

/**
 * Custom excerpt limit
 * https://codex.wordpress.org/Plugin_API/Filter_Reference/excerpt_length
 *
 * @return string
 */

function geist_custom_excerpt_length( $length ) {
    return 33; //in words
}

add_filter( 'excerpt_length', 'geist_custom_excerpt_length', 999 );

/**
 * Get next post
 */

function geist_next_post(){
	$geist_get_next_post = get_next_post();

	if( $geist_get_next_post ){
		$geist_next_post = new WP_Query(
		    array(
		        'posts_per_page' => 1,
		        'post__in' => array( $geist_get_next_post->ID ),
		        'ignore_sticky_posts' => true
		    )
		);

		if( $geist_next_post->have_posts() ) {
		    //output related posts
		    while( $geist_next_post->have_posts() ) {
		        $geist_next_post->the_post();

		        get_template_part('template-parts/content');
		    }
		    wp_reset_postdata();
		}
	}
}

/**
 * Get previous post
 */

function geist_prev_post(){
	$geist_get_prev_post = get_previous_post();

	if( $geist_get_prev_post ){
		$geist_prev_post = new WP_Query(
		    array(
		        'posts_per_page' => 1,
		        'post__in' => array( $geist_get_prev_post->ID ),
		        'ignore_sticky_posts' => true
		    )
		);

		if( $geist_prev_post->have_posts() ) {
		    //output related posts
		    while( $geist_prev_post->have_posts() ) {
		        $geist_prev_post->the_post();

		        get_template_part('template-parts/content');
		    }
		    wp_reset_postdata();
		}
	}
}

/**
 * Customizer Styles
 */

function geist_customizer_styles() {

	$geist_header_menu_color = get_theme_mod( 'geist_header_menu_color' );
	$geist_header_image_overlay = get_theme_mod( 'geist_header_image_overlay' );

	echo '<style type="text/css">';
		if( $geist_header_menu_color ){
			echo '.nav li a {';
				echo 'color:' . $geist_header_menu_color . ';';
			echo '}';
			echo '.search-button {';
				echo 'color:' . $geist_header_menu_color . ';';
				echo 'border-color:' . $geist_header_menu_color . ';';
			echo '}';
			echo '.social-link svg, .rss-button svg {';
				echo 'fill:' . $geist_header_menu_color . ';';
			echo '}';
		}

		if( $geist_header_image_overlay ){
			echo '.site-header:before {';
				echo 'background:' . 'rgba(0,0,0,' . $geist_header_image_overlay . ')' . ';';
			echo '}';
		}
	echo '</style>';
}
add_action( 'wp_head', 'geist_customizer_styles' );
