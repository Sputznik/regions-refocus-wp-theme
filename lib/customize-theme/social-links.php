<?php
function rr_register_social_section($wp_customize) {

  $wp_customize->add_section('rr_social_section', [
    'title'  => 'Social Links',
    'panel'  => 'rr_theme_options',
    'priority' => 30,
  ]);

  for ($i = 1; $i <= 5; $i++) {

    $wp_customize->add_setting("rr_social_title_$i", [
      'sanitize_callback' => 'sanitize_text_field'
    ]);

    $wp_customize->add_control("rr_social_title_$i", [
      'label'   => "Social Title $i",
      'section' => 'rr_social_section',
      'type'    => 'text',
    ]);

    $wp_customize->add_setting("rr_social_link_$i", [
      'sanitize_callback' => 'esc_url_raw'
    ]);

    $wp_customize->add_control("rr_social_link_$i", [
      'label'   => "Social Link $i",
      'section' => 'rr_social_section',
      'type'    => 'url',
    ]);

    $wp_customize->add_setting("rr_social_icon_$i", [
      'sanitize_callback' => 'esc_url_raw'
    ]);

    $wp_customize->add_control(new WP_Customize_Image_Control(
      $wp_customize,
      "rr_social_icon_$i",
      [
        'label'   => "Social Icon $i",
        'section' => 'rr_social_section',
      ]
    ));
  }
}

function rr_social_links() {
  echo '<ul>';

  for ($i = 1; $i <= 5; $i++) {
    $title = get_theme_mod("rr_social_title_$i");
    $link  = get_theme_mod("rr_social_link_$i");
    $icon  = get_theme_mod("rr_social_icon_$i");

    if ($link && $icon) {
      echo '<li>';
      echo '<a href="'. esc_url($link) .'" target="_blank" rel="noopener noreferrer" title="'. esc_attr($title) .'">';
      echo '<img class="rounded-circle" src="'. esc_url($icon) .'" alt="'. esc_attr($title) .'" style="aspect-ratio:1/1;object-fit:cover;">';
      echo '</a>';
      echo '</li>';
    }
  }

  echo '</ul>';
}