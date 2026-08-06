<?php
/**
 * The template for displaying category page
 */
get_header();
$category = $wp_query->get_queried_object();
?>
<div class="container">
  <h1 class="archive-page-title text-capitalize font-calibre"><?php _e( $category->name ); ?></h1>
  <?php
    echo RGNRFS_UI_TABS::render( array(
      array(
        'id'      => 'outcomes',
        'title'   => 'Outcomes',
        'content' => "[orbit_query style='grid3-outcome' post_type='outcomes' posts_per_page='9' cat='".$category->term_id."' pagination='1']"
      ),
      array(
        'id'      => 'events',
        'title'   => 'Events',
        'content' => "[orbit_query style='grid3' post_type='events' posts_per_page='9' cat='".$category->term_id."' pagination='1']"
      )
    ), 'cpt' );
  ?>
</div>
<?php get_footer(); ?>
