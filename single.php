<?php get_header(); ?>

<div class="wrap" role="document">
  <div class="content">
    <main class="main">

      <!-- TOP TERRAIN -->
      <!-- <div class="top-terrain" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/pacific-terrain.svg);"></div> -->
       <?php
          $default_bg = get_template_directory_uri() . '/assets/images/pacific-terrain.svg';

          $bg_image = get_theme_mod('rr_bg_image');
          $bg_color = get_theme_mod('rr_bg_color');

          $style = $bg_image
              ? "background-image:url('" . esc_url($bg_image) . "');"
              : ($bg_color
                  ? "background-color:" . esc_attr($bg_color) . ";"
                  : "background-image:url('" . esc_url($default_bg) . "');"
              );
          ?>

          <div class="top-terrain" style="<?php echo $style; ?>"></div>

      <!-- TITLE SECTION -->
      <div class="container outcome-title">
        <div class="row">
          <div class="col-12">
            <div class="breadcrumbs top">
              <h6>

                <?php
                $terms = get_the_terms(get_the_ID(), 'category');
                if (!empty($terms) && !is_wp_error($terms)) {
                  foreach ($terms as $term) {
                    echo '<a href="' . esc_url(get_term_link($term)) . '" class="region">
                            <span>' . esc_html($term->name) . ' </span>
                          </a>';
                  }
                }
                ?>

                <span> / </span>

                <a>
                  <span><?php echo get_post_type_object(get_post_type())->labels->singular_name; ?></span>
                </a>

              </h6>
            </div>
          </div>
        </div>

        <div class="row title-date">
          <div class="col-12 col-md-8">
            <h1 class="title"><?php the_title(); ?></h1>
          </div>

          <div class="col-12 col-md-4 date-location">
            <h6 class="date"><?php echo get_the_date('j F, Y'); ?></h6>
          </div>
        </div>
      </div>

      <!-- CONTENT -->
      <div class="container outcome-content">
        <div class="row">

          <!-- LEFT -->
          <div class="col-12 col-md-8">

            <?php if (has_post_thumbnail()) : ?>
              <img class="post-thumbnail" src="<?php the_post_thumbnail_url('full'); ?>">
            <?php endif; ?>

            <div class="entry-content">
              <?php the_content(); ?>
            </div>

          </div>

          <!-- RIGHT SIDEBAR -->
          <div class="col-12 col-md-4">
            <div class="sidebar">

              <div class="resources">
                <h3>Outcomes</h3>

                <div class="resources-content">

                  <?php
                  // OPTION 1: If using ACF repeater
                  if (function_exists('have_rows') && have_rows('resources')) :
                    while (have_rows('resources')) : the_row();
                      $file = get_sub_field('file');
                      $label = get_sub_field('label');
                      ?>
                      <a href="<?php echo esc_url($file); ?>">
                        <?php echo esc_html($label); ?>
                      </a>
                    <?php endwhile;
                  endif;
                  ?>

                </div>

              </div>

            </div>
          </div>

        </div>
      </div>

      <!-- RELATED -->
      <div class="related-convening-outcomes">
        <div class="container">
          <h6>Related Convenings</h6>

          <div class="row">

            <?php
            $terms = get_the_terms(get_the_ID(), 'category');

            if ($terms) {
              $term_ids = wp_list_pluck($terms, 'term_id');

              $related = new WP_Query([
                'post_type' => get_post_type(),
                'posts_per_page' => 3,
                'post__not_in' => [get_the_ID()],
                'tax_query' => [
                  [
                    'taxonomy' => 'category',
                    'field' => 'term_id',
                    'terms' => $term_ids,
                  ]
                ]
              ]);

              if ($related->have_posts()) :
                while ($related->have_posts()) : $related->the_post();
            ?>

              <div class="col-md-4 mb-4">
                <div class="card">

                  <a class="card-img-top" href="<?php the_permalink(); ?>"
                     style="background-image: url(<?php the_post_thumbnail_url('medium'); ?>);">
                  </a>

                  <div class="card-body">
                    <a href="<?php the_permalink(); ?>" class="title">
                      <h5><?php the_title(); ?></h5>
                    </a>

                    <div>
                      <?php
                      $terms = get_the_terms(get_the_ID(), 'category');
                      if ($terms && !is_wp_error($terms)) {
                        foreach ($terms as $term) {
                          echo '<a href="' . esc_url(get_term_link($term)) . '" class="crumb">'
                               . esc_html($term->name) .
                               '</a> ';
                        }
                      }
                      ?>

                      <i><?php echo get_the_date('j F, Y'); ?></i>
                    </div>

                  </div>
                </div>
              </div>

            <?php
                endwhile;
                wp_reset_postdata();
              endif;
            }
            ?>

          </div>
        </div>
      </div>

    </main>
  </div>
</div>

<?php get_footer(); ?>