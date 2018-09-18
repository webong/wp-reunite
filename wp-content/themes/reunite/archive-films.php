<?php
/**
 * The template for displaying Archive pages.
 * Template Name: Foggy Memories
 * Template Post Type: films
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package reunite
 */

    
   if ( get_query_var('paged') ) $paged = get_query_var('paged');
   if ( get_query_var('page') ) $paged = get_query_var('page');

    $args = array(
    'post_type' => 'films',
    'post_status' => 'publish',
    'posts_per_page' => 10,
    'page' => $paged
    );
    $films = new WP_Query( $args );

    get_header(); 

?>

	<section id="primary" class="content-area col-sm-12 col-md-8 <?php echo of_get_option( 'site_layout' ); ?>">
		<main id="main" class="site-main" role="main">

		<?php if ( $films->have_posts() ) : ?>

			<header class="page-header">
				<?php
					$films->the_archive_title( '<h1 class="page-title">', '</h1>' );
					$films->the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( $films->have_posts() ) : $films->the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
          get_template_part( 'content', get_post_format() );
				?>
        
        <div class="entry-content">
           <?php  
              $price = get_post_meta( get_the_ID(), 'ticket_price', true );
              $date  = get_post_meta( get_the_ID(), 'release_date', true );
              echo 'Ticket Price : '. '' .$price;
              echo '<br>';
              echo 'Release Date : '. '' .$date;

              // $custom = get_post_custom();
              //   foreach($custom as $key => $value) {
              //       echo $key.': '.$value.'<br />';
              //   }
              // // $key_name = get_post_custom_values($key = '');
              // // echo $key_name[0];

           ?>
        </div>
			<?php endwhile; ?>

			<?php unite_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
