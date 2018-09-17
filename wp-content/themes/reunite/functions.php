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
    'name'              => 'Actors',
    'singular_name'     => 'Actor',
    'search_items'      => 'Search Actors',
    'all_items'         => 'All Actor',
    'parent_item'       => null,
    'parent_item_colon' => null,
    'edit_item'         => 'Edit Actor',
    'update_item'       => 'Update Actor',
    'add_new_item'      => 'Add New Actor',
    'new_item_name'     => 'New Actor',
    'separate_items_with_commas' => 'Separate actors with commas',
    'add_or_remove_items'        => 'Add or remove an Actor',
    'choose_from_most_used'      => 'Choose from most used Actors',
    'not_found'                  => 'Actors Not found',
    'menu_name'         => 'Actors',
  );

  $args = array(
    'hierarchical'      => false,
    'labels'            => $labels,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
    'rewrite'           => array( 'slug' => 'actor' ),
  );

  register_taxonomy('actor',array('films'),$args);

  
  $labels = array(
    'name'              => 'Years',
    'singular_name'     => 'Year',
    'search_items'      => 'Search Years',
    'all_items'         => 'All Years',
    'parent_item'       => null,
    'parent_item_colon' => null,
    'edit_item'         => 'Edit Year',
    'update_item'       => 'Update Year',
    'add_new_item'      => 'Add New Year',
    'new_item_name'     => 'New Year',
    'separate_items_with_commas' => 'Separate years with commas',
    'add_or_remove_items'        => 'Add or remove a Year',
    'choose_from_most_used'      => 'Choose from most used Years',
    'not_found'                  => 'Not found',
    'menu_name'         => 'Years',
  );

  $args = array(
    'hierarchical'      => false,
    'labels'            => $labels,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
    'rewrite'           => array( 'slug' => 'year' ),
  );

  register_taxonomy('year',array('films'),$args);


  $labels = array(
    'name'                       => 'Countries',
    'singular_name'              => 'Country',
    'search_items'               => 'Countries',
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



// Add Custom Metabox for Ticket Price
add_action( 'add_meta_boxes', 'ticket_price' );
function ticket_price() {
    add_meta_box( 
        'ticket_price',
        __( 'Ticket Price', 'myplugin_textdomain' ),
        'ticket_price_box_content',
        'films',
        'side',
        'high'
    );
}
function ticket_price_box_content( $post ) {
  wp_nonce_field( plugin_basename( __FILE__ ), 'ticket_price_box_content_nonce' );
  echo '<label for="ticket_price"></label>';
  echo '<input type="number" id="product_price" name="product_price" placeholder="enter a price" required />';
}

// Add Custom Metabox for Release Date
add_action( 'add_meta_boxes', 'release_date' );
function release_date() {
    add_meta_box( 
        'release_date',
        __( 'Release Date', 'myplugin_textdomain' ),
        'release_date_box_content',
        'films',
        'side',
        'high'
    );
}
function release_date_box_content( $post ) {
  wp_nonce_field( plugin_basename( __FILE__ ), 'release_date_box_content_nonce' );
  echo '<label for="release_date"></label>';
  echo '<input type="date" id="release_date" name="release_date" placeholder="enter a date" required />';
}