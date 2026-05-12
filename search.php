<?php
/**
 * The template for displaying search results pages
 */
get_header();
global $wp_query;
$search_term = get_search_query();

/* $wp_query->found_posts

this count will not work here as we are using shortcode to display posts. this finds all the results, including pages, 
and the count may be inappropriate. so 
we will do a separate query to count only posts.
 */

$post_type_count = new WP_Query( array(
    's' => $search_term,
    'post_type' => 'post',
    'posts_per_page' => -1,
    'fields' => 'ids',
) );
$post_count = $post_type_count->found_posts;
wp_reset_postdata();
?>

<div class="container">
	
  <h1 class="heading-font heading-1 fw-bold mb-32 text-center">
    <?php 
      if ( $post_count > 0 ) {
          printf( __( '(%d) Search Results for: %s' ), $post_count, esc_html( $search_term ) );
      } else {
          echo __( 'Sorry, but nothing matched your search terms. Please try again with different keywords.' );
      }
    ?>
  </h1>
  <hr class="mb-32"/>
</div>


<?php if ( $post_count > 0 ) : ?>
    <div>
      <?php
        echo do_shortcode("[orbit_query post_status='publish' post_type='post' posts_per_page='3' style='grid3' s='" . esc_attr( $search_term ) . "' pagination='1']");
      ?>
    </div>
<?php endif; ?>

<?php get_footer(); ?>
