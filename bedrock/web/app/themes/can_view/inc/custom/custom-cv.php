<?php
/**
 * Register a custom post type called "cv".
 *
 * @see get_post_type_labels() for label keys.
 */
function wpdocs_codex_cv_init() {
    $labels = array(
        'name'                  => _x( 'cvs', 'Post type general name', 'can_view' ),
        'singular_name'         => _x( 'cv', 'Post type singular name', 'can_view' ),
        'menu_name'             => _x( 'cvs', 'Admin Menu text', 'can_view' ),
        'name_admin_bar'        => _x( 'cv', 'Add New on Toolbar', 'can_view' ),
        'add_new'               => __( 'Add New', 'can_view' ),
        'add_new_item'          => __( 'Add New cv', 'can_view' ),
        'new_item'              => __( 'New cv', 'can_view' ),
        'edit_item'             => __( 'Edit cv', 'can_view' ),
        'view_item'             => __( 'View cv', 'can_view' ),
        'all_items'             => __( 'All cvs', 'can_view' ),
        'search_items'          => __( 'Search cvs', 'can_view' ),
        'parent_item_colon'     => __( 'Parent cvs:', 'can_view' ),
        'not_found'             => __( 'No cvs found.', 'can_view' ),
        'not_found_in_trash'    => __( 'No cvs found in Trash.', 'can_view' ),
        'featured_image'        => _x( 'cv Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'can_view' ),
        'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'can_view' ),
        'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'can_view' ),
        'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'can_view' ),
        'archives'              => _x( 'cv archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'can_view' ),
        'insert_into_item'      => _x( 'Insert into cv', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'can_view' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this cv', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'can_view' ),
        'filter_items_list'     => _x( 'Filter cvs list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'can_view' ),
        'items_list_navigation' => _x( 'cvs list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'can_view' ),
        'items_list'            => _x( 'cvs list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'can_view' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'cv' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'menu_icon'          => 'dashicons-handshake',
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'custom-fields' ),
    );

    register_post_type( 'cv', $args );
}

add_action( 'init', 'wpdocs_codex_cv_init' );




// Taxonomy


/**
 * Register a 'genre' taxonomy for post type 'cv', with a rewrite to match cv CPT slug.
 *
 * @see register_post_type for registering post types.
 */
function wpdocs_create_cv_tax_rewrite() {

    $labels = array(
        'name'              => _x( 'Genres', 'taxonomy general name', 'can_view' ),
        'singular_name'     => _x( 'Genre', 'taxonomy singular name', 'can_view' ),
        'search_items'      => __( 'Search Genres', 'can_view' ),
        'all_items'         => __( 'All Genres', 'can_view' ),
        'parent_item'       => __( 'Parent Genre', 'can_view' ),
        'parent_item_colon' => __( 'Parent Genre:', 'can_view' ),
        'edit_item'         => __( 'Edit Genre', 'can_view' ),
        'update_item'       => __( 'Update Genre', 'can_view' ),
        'add_new_item'      => __( 'Add New Genre', 'can_view' ),
        'new_item_name'     => __( 'New Genre Name', 'can_view' ),
        'menu_name'         => __( 'Genre', 'can_view' ),
    );

    register_taxonomy( 'genre', 'cv', array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'      => array( 'slug' => 'cvs/genre' )
    ) );
}
add_action( 'init', 'wpdocs_create_cv_tax_rewrite', 0 );