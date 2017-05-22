<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_parent_css' ) ):
    function chld_thm_cfg_parent_css() {
        wp_enqueue_style( 'chld_thm_cfg_parent', trailingslashit( get_template_directory_uri() ) . 'style.css', array(  ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'chld_thm_cfg_parent_css', 10 );

// END ENQUEUE PARENT ACTION


function style_et_script_en_plus() {
  wp_enqueue_style('font_awesome',  get_template_directory_uri() . '-child/assets/font-awesome-4.7.0/font-awesome-4.7.0/css/font-awesome.min.css', array() );
}
add_action( 'wp_enqueue_scripts', 'style_et_script_en_plus' );
