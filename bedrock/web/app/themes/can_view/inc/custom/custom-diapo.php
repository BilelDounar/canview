<?php


/**
 * Register a custom post type called "diapo".
 *
 * @see get_post_type_labels() for label keys.
 */
function wpdocs_codex_diapo_init() {
    $labels = array(
        'name'                  => _x( 'diapos', 'Post type general name', 'canview' ),
        'singular_name'         => _x( 'diapo', 'Post type singular name', 'canview' ),
        'menu_name'             => _x( 'diapos', 'Admin Menu text', 'canview' ),
        'name_admin_bar'        => _x( 'diapo', 'Add New on Toolbar', 'canview' ),
        'add_new'               => __( 'Nouveau diapo', 'canview' ),
        'add_new_item'          => __( 'Add New diapo', 'canview' ),
        'new_item'              => __( 'New diapo', 'canview' ),
        'edit_item'             => __( 'Edit diapo', 'canview' ),
        'view_item'             => __( 'View diapo', 'canview' ),
        'all_items'             => __( 'All diapos', 'canview' ),
        'search_items'          => __( 'Search diapos', 'canview' ),
        'parent_item_colon'     => __( 'Parent diapos:', 'canview' ),
        'not_found'             => __( 'No diapos found.', 'canview' ),
        'not_found_in_trash'    => __( 'No diapos found in Trash.', 'canview' ),
        'featured_image'        => _x( 'diapo Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'canview' ),
        'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'canview' ),
        'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'canview' ),
        'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'canview' ),
        'archives'              => _x( 'diapo archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'canview' ),
        'insert_into_item'      => _x( 'Insert into diapo', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'canview' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this diapo', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'canview' ),
        'filter_items_list'     => _x( 'Filter diapos list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'canview' ),
        'items_list_navigation' => _x( 'diapos list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'canview' ),
        'items_list'            => _x( 'diapos list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'canview' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'diapo' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 44,
        'menu_icon'          => 'dashicons-format-gallery',
        'supports'           => array( 'title', 'thumbnail'),
    );

    register_post_type( 'diapo', $args );
}

add_action( 'init', 'wpdocs_codex_diapo_init' );