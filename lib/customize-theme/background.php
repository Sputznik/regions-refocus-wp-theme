<?php
function rr_register_background_section($wp_customize) {

  $wp_customize->add_section('rr_background_section', [
    'title'  => 'Background',
    'panel'  => 'rr_theme_options',
    'priority' => 20,
  ]);

  // Background Color
  $wp_customize->add_setting('rr_bg_color', [
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color',
  ]);

  $wp_customize->add_control(new WP_Customize_Color_Control(
    $wp_customize,
    'rr_bg_color',
    [
      'label'   => 'Background Color',
      'section' => 'rr_background_section',
    ]
  ));

  // Background Image
  $wp_customize->add_setting('rr_bg_image', [
    'sanitize_callback' => 'esc_url_raw',
  ]);

  $wp_customize->add_control(new WP_Customize_Image_Control(
    $wp_customize,
    'rr_bg_image',
    [
      'label'   => 'Background Image',
      'section' => 'rr_background_section',
    ]
  ));
}