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
        'name_admin_bar'      => 'Film',
        'parent_item_colon'   => 'Parent Film:',
        'archives'            => 'Film Archives',
	     	'attributes'          => 'Film Attributes',
        'all_items'           => 'All Films',
        'view_item'           => 'View Film',
        'view_items'          => 'View Films',
        'add_new_item'        => 'Add New Film',
        'add_new'             => 'Add New',
        'edit_item'           => 'Edit Film',
        'update_item'         => 'Update Film',
        'search_items'        => 'Search Film',
        'not_found'           => 'Not Found',
        'not_found_in_trash'  => 'Not found in Trash',
        'featured_image'        => 'Featured Image',
        'set_featured_image'    => 'Set featured image',
     		'remove_featured_image' => 'Remove featured image',
    		'items_list_navigation' => 'Films list navigation',
     		'filter_items_list'     => 'Filter films list',
 
    );
     
// Set other options for Custom Post Type
     
    $args = array(
        'label'               => 'films',
        'description'         => 'Film Gallery',
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor',  'thumbnail', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies'          => array( 'genre', 'country', 'year', 'actor' ),
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
        'rewrite'             => array( 'slug' => 'films', 'with_front' => true, 'pages' => true, ),
        'capability_type'     => 'post',
    );
     
    // Registering your Custom Post Type
    register_post_type( 'films', $args );
 
}
 
/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/
 
add_action( 'init', 'custom_post_type', 0 );

register_activation_hook( __FILE__, 'your_active_hook' );

function your_active_hook() {
    custom_post_type();
    flush_rewrite_rules();
}


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
  wp_nonce_field( basename( __FILE__ ), 'custom_meta_box_nonce' );
  $value = get_post_meta($post->ID, 'ticket_price', true);
  echo '<label for="ticket_price"></label>';
  echo '<input type="number" id="ticket_price" name="ticket_price" placeholder="enter a price" value="' . selected($value, 'else') .'" />';
}

function ticket_price_box_save($post_id)
{
    // if (array_key_exists('ticket_price', $_POST)) {
    //     update_post_meta(
    //         $post_id,
    //         'ticket_price',
    //         $_POST['ticket_price']
    //     );
    // }

      if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
    return;

    if ( !wp_verify_nonce( $_POST['custom_meta_box_nonce'], basename( __FILE__ ) ) )
    return;

    if ( 'page' == $_POST['post_type'] ) {
      if ( !current_user_can( 'edit_page', $post_id ) )
      return;
    } else {
      if ( !current_user_can( 'edit_post', $post_id ) )
      return;
    }
    $ticket_price = $_POST['ticket_price'];
    update_post_meta( $post_id, 'ticket_price', $ticket_price );
}
add_action('save_post', 'ticket_price_box_save');


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
  wp_nonce_field( basename( __FILE__ ), 'custom_meta_box_nonce' );
  $value = get_post_meta($post->ID, 'release_date', true);
  echo '<label for="release_date"></label>';
  echo '<input type="date" id="release_date" name="release_date" placeholder="enter a date" value="' . selected($value, 'else') .'" />';
}

function release_date_box_save($post_id)
{
      if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
    return;

    if ( !wp_verify_nonce( $_POST['custom_meta_box_nonce'], basename( __FILE__ ) ) )
    return;

    if ( 'page' == $_POST['post_type'] ) {
      if ( !current_user_can( 'edit_page', $post_id ) )
      return;
    } else {
      if ( !current_user_can( 'edit_post', $post_id ) )
      return;
    }
    $release_date = $_POST['release_date'];
    update_post_meta( $post_id, 'release_date', $release_date );
}
add_action('save_post', 'release_date_box_save');

//Displaying Custom Post on Front Page
add_action( 'pre_get_posts', 'add_films_to_query' );
 
function add_films_to_query( $query ) {
    if ( is_home() && $query->is_main_query() )
        $query->set( 'post_type', array( 'post', 'films' ) );
    return $query;
}

// You need to flush the rewrite rules once using the after_switch_theme hook. 
// This will make sure that the rewrite rules get flushed automatically after the user 
// has activated the Theme.

function theme_prefix_rewrite_flush() {
    flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'theme_prefix_rewrite_flush' );

// create shortcode to list last 5 films
add_shortcode( 'five-films', 'last_five_films_shortcode' );
function last_five_films_shortcode( $atts ) {
    ob_start();
    $films = new WP_Query( array(
        'post_type' => 'films',
        'posts_per_page' => 5,
        'order' => 'ASC',
        'orderby' => 'title',
    ) );
    if ( $films->have_posts() ) { ?>
        <ul class="film-listing">
            <?php while ( $films->have_posts() ) : $films->the_post(); ?>
            <li id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </li>
            <?php endwhile;
            wp_reset_postdata(); ?>
        </ul>
    <?php $myvariable = ob_get_clean();
    return $myvariable;
    }else{ ?>
       <p>No posts found.</p>
    <?php 
    }
}