<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// enqueue css and js //
function custom_css_and_js()
{
    $uri = get_template_directory_uri() . '/assets/css/';

    wp_enqueue_style('main-style', get_stylesheet_directory_uri() . '/style.css', array());
    wp_enqueue_style('custom-style', $uri . '/custom.css', array());

    $jsuri = get_template_directory_uri() . '/assets/js/';

    // wp_enqueue_script('filter-js',get_template_directory_uri().'/filter.js',array());

}
add_action('wp_enqueue_scripts', 'custom_css_and_js');

/**
 * Summary of my_own_mime_types svg file add 
 * @param mixed $mimes
 */
function my_own_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'my_own_mime_types');

/**
 * Summary of custom_menu_add
 * @return void
 */
function vardhaman_theme_setup()
{
    add_theme_support('menus');

    // Register specific menu locations
    register_nav_menus(array(
        'primary' => __('Primary Menu', ' vardhaman'),
        'footer_quick_links' => __('Footer Quick Links', ' vardhaman'),
        'footer_other_links' => __('Footer Other Links', ' vardhaman'),
    ));
}

add_action('after_setup_theme', 'vardhaman_theme_setup');

function vardhaman_footer_setup()
{
    // Footer menu
    register_nav_menus(array(
        'footer' => __('Footer Menu', 'vardhaman'),
    ));

    // Footer widget areas
    register_sidebar(array(
        'name' => __('Footer Column 1', 'vardhaman'),
        'id' => 'footer-1',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
    register_sidebar(array(
        'name' => __('Footer Column 2', 'vardhaman'),
        'id' => 'footer-2',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
    register_sidebar(array(
        'name' => __('Footer Column 3', 'vardhaman'),
        'id' => 'footer-3',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
}
add_action('widgets_init', 'vardhaman_footer_setup');

/**
 * Summary of  vardhaman_add_woocommerce_support
 * ovverrice the woocommerce folder file
 * @return void
 */
function vardhaman_add_woocommerce_support()
{
    add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'vardhaman_add_woocommerce_support');

add_action('pre_get_posts', function ($query) {

    $category_slug = isset($_GET['cat']) ? sanitize_text_field($_GET['cat']) : false;

    if ($category_slug) {
        $query->set('tax_query', array(
            array(
                'taxonomy' => 'product_cat',
                'field' => 'slug',
                'terms' => array($category_slug),
            ),
        ));
    }

});


add_filter('loop_shop_per_page', 'custom_products_per_page', 10);

function custom_products_per_page()
{
    return 8;
}

add_action( 'woocommerce_before_shop_loop', 'custom_auto_category_dropdown', 15 );
