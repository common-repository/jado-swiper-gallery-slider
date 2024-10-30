<?php
/**
 * Plugin Name: ja.do Swiper Gallery Slider
 * Plugin URI: https://www.ja.do/swiper-gallery-slider-wordpress-plugin/
 * Description: Transform the Wordpress Gallery in a Swiper-Slider. Swiper is a great Slider from <a target="_blank" href="http://idangero.us/donate/?for=Swiper%20Donation">idangero.us</a>. Very simple and fast
 * Author: ja.do GmbH
 * Text Domain: jado-swiper-gallery-slider
 * Version: 1.5
 * Author URI: https://www.ja.do/
 *
 * @package WordPress
 * @author albertaugustin
 *
 * Copyright 2018 Albert Augustin (Email: plugin@ja.do)
 * (ja.do Swiper Gallery Slider) is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.
 *
 * (ja.do Swiper Gallery Slider) is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with (ja.do Swiper Gallery Slider). If not, see http://www.gnu.de/documents/gpl-2.0.en.html
 *
 */


if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! defined( 'jado_SGS_VERSION' ) ) {
	define( 'jado_SGS_VERSION', '1.5' );
}
if ( ! defined( 'jado_SGS_DIR' ) ) {
	define( 'jado_SGS_DIR', dirname( __FILE__ ) );
}

if ( ! defined( 'jado_SGS_URL' ) ) {
	define( 'jado_SGS_URL', plugin_dir_url( __FILE__ ) );
}


require_once( jado_SGS_DIR . '/includes/jado_SGS-functions.php' );
require_once( jado_SGS_DIR . '/includes/jado_SGS-settings.php' );
require_once( jado_SGS_DIR . '/includes/class-jado_SGS-script.php' );