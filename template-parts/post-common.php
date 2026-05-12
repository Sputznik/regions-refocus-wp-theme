<?php
global $post;

// Get featured image
$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
$image_url = ( !empty($thumbnail) && !empty($thumbnail[0]) ) ? $thumbnail[0] : '';

$categories = get_the_category();
?>

<div class="card">
    
    <a class="card-img-top" href="<?php the_permalink(); ?>"
		title="<?php the_title_attribute(); ?>" 
       	style="background-image: url(<?php echo esc_url($image_url); ?>);">
    </a>

    <div class="card-body">

        <h5>
			<a href="<?php echo esc_url(get_permalink()); ?>" class="title">
				<?php echo esc_html(get_the_title()); ?>
			</a>
		</h5>

        <div>
            <?php

				if (!empty($categories) && !is_wp_error($categories)) {

					$total = count($categories);
					$i = 0;

					echo '<span class="crumb">';

					foreach ($categories as $category) {
						$i++;

						echo '<a href="' . esc_url(get_term_link($category)) . '" class="orbit-grid-category">'
							. esc_html($category->name) .
							'</a>';

						// Add comma except for last item
						if ($i < $total) {
							echo ', ';
						}
					}

					echo '</span>';
				}
              ?>

            <i class="orbit-grid-date"><?php echo get_the_date('d F, Y'); ?></i>
        </div>

    </div>

</div>