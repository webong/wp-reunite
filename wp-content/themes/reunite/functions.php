<?php
// Import Style from Unite
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );

function enqueue_parent_styles() {
   wp_enqueue_style( 'unite', get_template_directory_uri().'/style.css' );
}

 //Creating a function to create our CPT
 
function custom_post_type() {
 
// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => 'Films',
        'singular_name'       => 'Film',
        'menu_name'           => 'Films',
        'parent_item_colon'   => 'Parent Film',
        'all_items'           => 'All Films',
        'view_item'           => 'View Film',
        'add_new_item'        => 'Add New Film',
        'add_new'             => 'Add New',
        'edit_item'           => 'Edit Film',
        'update_item'         => 'Update Film',
        'search_items'        => 'Search Film',
        'not_found'           => 'Not Found',
        'not_found_in_trash'  => 'Not found in Trash', 'twentythirteen',
    );
     
// Set other options for Custom Post Type
     
    $args = array(
        'label'               => 'films',
        'description'         => 'Film Gallery',
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        // 'taxonomies'          => array( 'genres', 'country', 'year', 'actor' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */ 
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'rewrite'             => array( 'slug' => 'films' ),
        'capability_type'     => 'post',
        'query_var'           => true,

    );
     
    // Registering your Custom Post Type
    register_post_type( 'films', $args );
 
}
 
/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/
 
add_action( 'init', 'custom_post_type', 0 );

function create_taxonomies() {

  // Add a taxonomy like categories
  $labels = array(
    'name'              => 'Genres',
    'singular_name'     => 'Genre',
    'search_items'      => 'Search Genres',
    'all_items'         => 'All Genres',
    'parent_item'       => 'Parent Genres',
    'parent_item_colon' => 'Parent Genre:',
    'edit_item'         => 'Edit Genre',
    'update_item'       => 'Update Genre',
    'add_new_item'      => 'Add New Genre',
    'new_item_name'     => 'New Genre Name',
    'menu_name'         => 'Genres',
  );

  $args = array(
    'hierarchical'      => true,
    'labels'            => $labels,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
    'rewrite'           => array( 'slug' => 'genre' ),
  );

  register_taxonomy('genre',array('films'),$args);

  // Add a taxonomy like tags
  $labels = array(
    'name'                       => 'Countries',
    'singular_name'              => 'Country',
    'search_items'               => 'Countrys',
    'popular_items'              => 'Popular Countries',
    'all_items'                  => 'All Countries',
    'parent_item'                => null,
    'parent_item_colon'          => null,
    'edit_item'                  => 'Edit Country',
    'update_item'                => 'Update Country',
    'add_new_item'               => 'Add New Country',
    'new_item_name'              => 'New Country Name',
    'separate_items_with_commas' => 'Separate Countries with commas',
    'add_or_remove_items'        => 'Add or remove Countries',
    'choose_from_most_used'      => 'Choose from most used Countries',
    'not_found'                  => 'No Countries found',
    'menu_name'                  => 'Countries',
  );

  $args = array(
    'hierarchical'          => false,
    'labels'                => $labels,
    'show_ui'               => true,
    'show_admin_column'     => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var'             => true,
    'rewrite'               => array( 'slug' => 'country' ),
  );

  register_taxonomy('country','films',$args);
}


/* Hook into the 'init' action so that the function
* Containing our taxonomy registration is not 
* unnecessarily executed. 
*/
 
add_action( 'init', 'create_taxonomies', 0 );