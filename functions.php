<?php 

 // Enqueue scripts and styles
function zapdash_theme_custom_enqueue_scripts() {
    // Theme stylesheet
    wp_enqueue_style('swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(), '11.0', 'all');

	 wp_register_style( 'thezap-style', get_template_directory_uri() . '/includes/css/app.css', array(), '5.5', 'all' );
    wp_enqueue_style( 'thezap-style' );
     
	wp_enqueue_script('js-swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array('jquery'), '2.9.2', true);

    wp_enqueue_script('simplePara', 'https://cdn.jsdelivr.net/npm/simple-parallax-js@5.5.1/dist/simpleParallax.min.js', array('jquery'), '5.5.1', false);

	    wp_enqueue_script('devrabbittheme-script', get_template_directory_uri() . '/includes/js/app.js', ['jquery'], wp_get_theme()->get('Version'), true);

}
add_action('wp_enqueue_scripts', 'zapdash_theme_custom_enqueue_scripts');
// Add theme support
function zapdash_theme_custom_setup() {
    // Add support for post thumbnails
    add_theme_support('post-thumbnails');
    // Add support for HTML5 markup
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));
    // Add support for title tag
    add_theme_support('title-tag');
    // Add support for automatic feed links
    add_theme_support('automatic-feed-links');
    // Add support for custom header
    add_theme_support('custom-header', array(
        'default-image' => '',
        'width'         => 1000,
        'height'        => 250,
        'flex-width'    => true,
        'flex-height'   => true,
        'header-text'   => false,
    ));
    // Add support for custom background
    add_theme_support('custom-background', array(
        'default-color' => 'ffffff',
        'default-image' => '',
    ));


    // Add support for custom logo
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ));

    // Add support for custom background
    add_theme_support('custom-background', array(
        'default-color' => 'ffffff',
        'default-image' => '',
    ));

    // Add support for custom menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'zapdash'),
        'footer'  => __('Footer Menu', 'zapdash'),
    ));
    // Add support for post formats
}
add_action('after_setup_theme', 'zapdash_theme_custom_setup');
// Register widget area
function zapdash_theme_custom_widgets_init() {
    register_sidebar(array(
        'name'          => __('Sidebar', 'zapdash'),
        'id'            => 'sidebar-1',
        'description'   => __('Add widgets here.', 'zapdash'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'zapdash_theme_custom_widgets_init');

function tt3child_register_acf_blocks() {
    /**
     * We register our block's with WordPress's handy
     * register_block_type();
     *
     * @link https://developer.wordpress.org/reference/functions/register_block_type/
     */
    register_block_type( __DIR__ . '/blocks/zap-text-block' );
	
}
// Here we call our tt3child_register_acf_block() function on init.
add_action( 'init', 'tt3child_register_acf_blocks' );