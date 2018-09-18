<?php
    $args = array(
      'post_type' => 'films',
      'tax_query' => array(
        array(
          'taxonomy' => 'film_category',
          'field' => 'slug',
          'terms' => 'films'
        )
      )
    );
    $filmss = new WP_Query( $args );
    if( $films->have_posts() ) {
      while( $films->have_posts() ) {
        $films->the_post();
        ?>
          <h1><?php the_title() ?></h1>
          <div class='content'>
             <?php the_content() ?>
             <?php 
               $price = get_post_meta( get_the_ID(), 'ticket_price', true ); 
               echo $price;
             ?>
             <?php
               $date = get_post_meta( get_the_ID(), 'release_date', true ); 
               echo $date;
             ?>
            
          </div>
        <?php
      }
    }
    else {
      echo 'Oh ohm no films!';
    }
  ?>