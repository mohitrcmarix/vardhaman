<?php
// Main theme setup function that initializes theme features
if (! function_exists('curamedix_setup')) :

	function curamedix_setup()
	{
		// Load theme text domain for translation
		load_theme_textdomain('curamedix', get_template_directory() . '/languages');

		// Add default RSS feed links to head
		add_theme_support('automatic-feed-links');

		// Let WordPress manage the document title
		add_theme_support('title-tag');

		// Enable featured images for posts and pages
		add_theme_support('post-thumbnails');

		add_theme_support('custom-logo', array(
			'height'               => 100,
			'width'                => 200,
			'flex-height'          => true,
			'flex-width'           => true,
			'unlink-homepage-logo' => false,
		));

		// Register navigation menu locations
		register_nav_menus(array(
			'main-menu' => __('Main Menu',      'curamedix'),
			'mobile-menu' => __('Mobile Menu',      'curamedix'),
		));

		// Switch default core markup to HTML5
		add_theme_support('html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption'
		));

		// Enable support for different post formats like image, video, gallery, and audio
		add_theme_support('post-formats', array(
			'image',
			'video',
			'gallery',
			'audio',
		));

		// Disable widgets block editor
		remove_theme_support('widgets-block-editor');
	}
endif; // curamedix_setup

// Hook the setup function to the 'after_setup_theme' action
add_action('after_setup_theme', 'curamedix_setup');

// Register widget areas
function curamedix_widgets_init()
{
	// Blog Sidebar
	register_sidebar(array(
		'name'          => __('Blog Sidebar', 'curamedix'),
		'id'            => 'blog-sidebar',
		'description'   => __('This widget will display in blog sidebar.', 'curamedix'),
		'before_widget' => '<div id="%1$s" class="tr-sidebar-widget p-20 tr-radius mb-45 fix %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="tr-sidebar-widget-title mb-20">',
		'after_title'   => '</h3>',
	));
	// Footer widget areas
	register_sidebar(array(
		'name'          => __('Footer widget 01', 'curamedix'),
		'id'            => 'footer-widget-1',
		'description'   => __('This widget will display in footer widget 01.', 'curamedix'),
		'before_widget' => '<div id="%1$s" class="tr-footer-widget tr-footer-col-1 mb-50 %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="tr-footer-widget-title mb-20">',
		'after_title'   => '</h3>',
	));
	register_sidebar(array(
		'name'          => __('Footer widget 02', 'curamedix'),
		'id'            => 'footer-widget-2',
		'description'   => __('This widget will display in footer widget 02.', 'curamedix'),
		'before_widget' => '<div id="%1$s" class="tr-footer-widget tr-footer-col-2 mb-50 %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="tr-footer-widget-title mb-20">',
		'after_title'   => '</h3>',
	));
	register_sidebar(array(
		'name'          => __('Footer widget 03', 'curamedix'),
		'id'            => 'footer-widget-3',
		'description'   => __('This widget will display in footer widget 03.', 'curamedix'),
		'before_widget' => '<div id="%1$s" class="tr-footer-widget tr-footer-col-3 mb-50 %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="tr-footer-widget-title mb-20">',
		'after_title'   => '</h3>',
	));
	register_sidebar(array(
		'name'          => __('Footer widget 04', 'curamedix'),
		'id'            => 'footer-widget-4',
		'description'   => __('This widget will display in footer widget 04.', 'curamedix'),
		'before_widget' => '<div id="%1$s" class="tr-footer-widget tr-footer-col-4 mb-50 %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="tr-footer-widget-title mb-20">',
		'after_title'   => '</h3>',
	));
}
add_action('widgets_init', 'curamedix_widgets_init');


// Enqueue theme stylesheets and JavaScript files
function curamedix_theme_scripts()
{
	// CSS Files
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '5.2.3', 'all');
	wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/fontawesome/css/font-awesome.min.css', array(), '4.7.0', 'all');
	wp_enqueue_style('curamedix-main', get_template_directory_uri() . '/assets/css/style.css', array(), '1.0', 'all');
	wp_enqueue_style('curamedix-style', get_stylesheet_uri()); //root folder stylesheet

	// JS Files
	wp_enqueue_script('bootstrap-bundle', get_template_directory_uri() . '/assets/js/bootstrap.bundle.js', array('jquery'), '5.1.3', true);
	wp_enqueue_script('curamedix-main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0', true);

	// Enable threaded comments when needed
	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
// Hook scripts function to the wp_enqueue_scripts action
add_action('wp_enqueue_scripts', 'curamedix_theme_scripts');
/**
 * Enqueue admin scripts and styles.
 *
 * @return void
 */
function curamedix_enqueue_admin_scripts()
{
	// Only enqueue on admin pages.
	if (! is_admin()) {
		return;
	}

	wp_enqueue_script(
		'curamedix-admin-notice',
		get_template_directory_uri() . '/assets/js/admin-notice.js',
		array(),
		'1.0.0',
		true
	);
}
add_action('admin_enqueue_scripts', 'curamedix_enqueue_admin_scripts');
// Include admin notice after theme activation
require_once('inc/admin-notice.php');

// Set up theme after demo import
function ocdi_after_import_setup() {
    // Assign menus to their locations.
    $main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );

    set_theme_mod( 'nav_menu_locations', array(
            'main-menu' => $main_menu->term_id,
            'mobile-menu' => $main_menu->term_id,
        )
    );

    // Assign front page and posts page (blog page).
    $front_page = get_page_by_path( 'home' );
    $blog_page = get_page_by_path( 'blog' );

    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page->ID );
    update_option( 'page_for_posts', $blog_page->ID );

}
add_action( 'ocdi/after_import', 'ocdi_after_import_setup' );

function mytheme_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );



// Include Kirki customizer framework
if (class_exists('Kirki')) {
	require_once('inc/curamedix-kirki.php');
}
// Include nav walker class
require_once('inc/nav-walker.php');
// Include TGM plugin activation class and plugin registration file
require_once('inc/class-tgm-plugin-activation.php');
require_once('inc/add_plugin.php');
// Include template function
require_once('inc/template-function.php');
// Include admin notice after theme activation
require_once('inc/admin-notice.php');


