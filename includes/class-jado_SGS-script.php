<?php
/**
 * Script Class
 *
 * Handles the script and style functionality of plugin
 *
 * @package Swiper Slider and Carousel
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 * Loading Styles and Scripts
 *
 * @package Swiper Gallery Slider
 * @since 1.0.0
 */
function jado_SGSSC( $content ) {

	if ( has_shortcode( $content, 'gallery' ) ) {
		add_action( 'wp_footer', function () {
			wp_register_style( 'jado-swiper-style', jado_SGS_URL . 'assets/css/swiper.css', array(), jado_SGS_VERSION );
			wp_enqueue_style( 'jado-swiper-style' );

			wp_register_script( 'jado-swiper-jquery1', jado_SGS_URL . 'assets/js/swiper-min.js', array( 'jquery' ), jado_SGS_VERSION, true );
			wp_enqueue_script( 'jado-swiper-jquery1' );
		} );

	}

	return $content;
}

add_filter( 'the_content', 'jado_SGSSC' );