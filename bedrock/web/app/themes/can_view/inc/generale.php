<?php

if (!defined('_S_VERSION')) {
    define('_S_VERSION', '1.0.0');
}

function can_view_setup()
{
    load_theme_textdomain('can_view', get_template_directory() . '/languages');
    add_theme_support('automatic-feed-links');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus(
        array(
            'menu-1' => esc_html__('Primary', 'can_view'),
        )
    );
}
add_action('after_setup_theme', 'can_view_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function can_view_content_width()
{
    $GLOBALS['content_width'] = apply_filters('can_view_content_width', 640);
}
add_action('after_setup_theme', 'can_view_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function can_view_widgets_init()
{
    register_sidebar(
        array(
            'name'          => esc_html__('Sidebar', 'can_view'),
            'id'            => 'sidebar-1',
            'description'   => esc_html__('Add widgets here.', 'can_view'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );
}
add_action('widgets_init', 'can_view_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function can_view_scripts()
{

    // wp_enqueue_style('can_view-style', get_stylesheet_uri(), array(), _S_VERSION);

    wp_enqueue_style('style_global', get_template_directory_uri() . '/public/asset/dist/css/global.bundle.css', array(), _S_VERSION);
    wp_enqueue_style('style_utilisateur', get_template_directory_uri() . '/public/asset/dist/css/utilisateur.bundle.css', array(), _S_VERSION);
    wp_enqueue_style('style_recruteur', get_template_directory_uri() . '/public/asset/dist/css/recruteur.bundle.css', array(), _S_VERSION);
    wp_enqueue_style('style_fpdf', get_template_directory_uri() . '/public/asset/dist/css/fpdf.bundle.css', array(), _S_VERSION);



    ///////////////////
    // jQuery
    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js', array(), _S_VERSION, true);
    wp_enqueue_script('micromodal-js', 'https://unpkg.com/micromodal/dist/micromodal.min.js', array(), _S_VERSION, true);

    wp_add_inline_script('jquery','const MYSCRIPT = ' . json_encode(array(
            'ajaxUrl' => admin_url('admin-ajax.php'),
            'home'    => path('/'),
            'theme'   => get_template_directory_uri()
        )), 'before');

    ////////////////////////////
    /// flexslider

    if(is_page_template('template-home.php')) {
        wp_enqueue_script('flexslider-js', get_template_directory_uri() . '/asset/flexslider/jquery.flexslider-min.js', array(),_S_VERSION, true);
        wp_enqueue_script('home-js', get_template_directory_uri() . '/asset/js/home.js', array(),_S_VERSION, true);
        wp_enqueue_script('modal-js', get_template_directory_uri() . '/asset/js/modal.js', array(),_S_VERSION, true);
    }
}
add_action('wp_enqueue_scripts', 'can_view_scripts');
