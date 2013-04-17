<?php
/*
Plugin Name: Advanced Custom Fields: Repeater Field Shortcodes
Plugin URI: http://github.com/fahrenheitmarketing/acf-repeater-shortcodes
Description: Adds shortcodes for the ACF repeater addon
Version: 1.0
Author: Jacob Williams
Author URI: http://www.iakob.com/
License: GPL
Copyright: Jacob Williams
*/

add_shortcode( 'acf_repeater', 'acf_repeater_shortcode' );
add_shortcode( 'acf_sub_repeater', 'acf_repeater_shortcode' );
function acf_repeater_shortcode($atts, $content, $tag) {
  $defaults = array(
    'post_id' => null,
    'separator' => '',
    'field' => null,
  );
  $params = array_merge( $defaults, $atts );
  if (!$params['field']) {
    return "";
  }

  $output = array();
  if ( $tag === 'acf_repeater'
      ? get_field( $params['field'], $params['post_id'] )
      : get_sub_field( $params['field'] ) ) {
    while ( has_sub_field( $params['field'], $params['post_id'] ) ) {
      $output[] = do_shortcode( $content );
    }
  }

  return implode( $params['separator'], $output );
}

add_shortcode( 'acf_sub_field', 'acf_sub_field_shortcode' );
function acf_sub_field_shortcode($atts, $content, $tag) {
  if (!isset($atts['field'])) {
    return "";
  }
  $autop = isset($atts['autop']);
  $output = get_sub_field($atts['field']);
  return $autop ? wpautop($output) : $output;
}
