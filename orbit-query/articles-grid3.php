<ul id="<?php _e( $atts['id'] );?>" data-target="<?php _e('li.orbit-article-db');?>" data-url="<?php _e( $atts['url'] );?>" class="orbit-three-grid">
	<?php while( $this->query->have_posts() ) : $this->query->the_post();?>
	<li class="list-unstyled">
		<?php get_template_part('template-parts/post', 'common');?>
	</li>
	<?php endwhile;?>
</ul>
