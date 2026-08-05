<div id="<?php _e( $atts['id'] );?>" data-target="<?php _e('article.orbit-article-db');?>" data-url="<?php _e( $atts['url'] );?>"
	 class="rr-outcomes rgnrfs-link-color rr-outcomes-grid-three-card orbit-three-grid">
	<?php while( $this->query->have_posts() ) : $this->query->the_post(); ?>
  	<?php get_template_part('partials/orbit/grid-outcome-item'); ?>
	<?php endwhile;?>
</div>
