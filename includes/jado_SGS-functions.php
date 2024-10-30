<?php
/**
 * Plugin functions
 *
 * @package Swiper Gallery Slider
 * @since 1.0.0
 */


if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


if ( ! is_admin() ) {


	function jado_SGS( $content ) {


		if ( has_shortcode( $content, 'gallery' ) ) {


			function jado_shortcode_atts_gallery( $out, $jado ) {
				if ( ! isset( $jado['link'] ) ) {
					$out['link'] = 'none';
				}

				$size = get_option( 'jado_size_option' );

				if ( ! isset( $jados['size'] ) ) {

					$out['size'] = $size;

				}

				return $out;
			}

			add_filter( 'shortcode_atts_gallery', 'jado_shortcode_atts_gallery', 10, 4 );

			global $gallery, $wp_query;
			$postid  = $wp_query->post->ID;
			$gallery = get_post_gallery_images( $postid );

			echo( '<div id="jadoslides" class="swiper-container gallery-top"><div class="swiper-wrapper">' );
			$i = 0;
			$c = 1;
			foreach ( $gallery as $image ) {
				echo( '<div class="swiper-slide" style="background-image:url(' . $image . ')" data-hash="slide-' . $c . '"></div>' );
				$i ++;
				$c ++;
			};
			echo( '</div><div class="swiper-pagination"></div><div class="swiper-button-next swiper-button-white"></div><div class="swiper-button-prev swiper-button-white"></div></div><div id="jadothumbs" class="swiper-container gallery-thumbs"><div class="swiper-wrapper">' );
			foreach ( $gallery as $image ) {
				echo( '<div class="swiper-slide" style="background-image:url(' . $image . ')"></div>' );
				$i ++;
			};
			echo( '</div></div>' );

			if ( get_option( 'jado_slider_height' ) == true ) {
				$sliderheightres = get_option( 'jado_slider_height' );
			} else {
				$sliderheightres = '50';
			};
			echo '<script>document.getElementById("jadoslides").style.height = "' . $sliderheightres . 'vw";</script>';
			echo '<script>document.getElementById("jadothumbs").style.height = "' . $sliderheightres / 7 . 'vw";</script>';




			if ( get_option( 'jado_effect_option' ) == true ) {
				$effecttres = get_option( 'jado_effect_option' );
			};
			$jado_effect_option = 'effect : "' . $effecttres . '",fadeEffect: {crossFade: false},';


			if ( get_option( 'jado_pagination_option' ) == true ) {
				$jado_pagination_option = 'pagination: {el: ".swiper-pagination",type: "fraction"},';
			} else {
				echo '<style>.swiper-pagination{display:none;}</style>';
			};


			if ( get_option( 'jado_arrow_option' ) == true ) {
				$jado_arrow_option = 'navigation: {nextEl: ".swiper-button-next",prevEl: ".swiper-button-prev" },';
			} else {
				echo '<style>.swiper-button-white{display:none;}</style>';
			};


            if ( get_option( 'jado_slidesperview_option' ) == true ) {
                $jado_slidesperview_var = get_option( 'jado_slidesperview_option' );
            };
            $jado_slidesperview_option = 'slidesPerView : ' . $jado_slidesperview_var . ',';



            if ( get_option( 'jado_autoplay_option' ) == true ) {
				$jado_autoplay_option = 'autoplay: {delay: 2500, disableOnInteraction: false,},';
			};


			if ( get_option( 'jado_keyboard_option' ) == true ) {
				$jado_keyboard_option = 'keyboard: {enabled: true,},';
			};


			if ( get_option( 'jado_loop_option' ) == true ) {
				$jado_loop_option = 'loop: true,';
			};

            if ( get_option( 'jado_autoheight_option' ) == true ) {
                $jado_autoheight_option = 'autoHeight: true,';
            };


			if ( get_option( 'jado_hash_option' ) == true ) {
				$jado_hash_option = 'hashNavigation: {watchState: true,},';
			};


			if ( get_option( 'jado_thumbnail_option' ) == true ) {
				$jado_thumbnail_option = 'spaceBetween: 0, centeredSlides: true, slidesPerView: 10, touchRatio: 0.2, slideToClickedSlide: true});';
			} else {
				echo '<style>.gallery-thumbs{display:none;}</style>';
			};

			if ( get_option( 'jado_loadjquery_option' ) == true ) {
				echo '<script  src="/wp-includes/js/jquery/jquery.js"></script>';
			} else {
				echo '';
			};


			echo '<script>jQuery(document).ready(function ($) {var galleryTop = new Swiper(".gallery-top", {';


			echo $jado_effect_option;

			if ( isset( $jado_autoplay_option ) ) {
				echo $jado_autoplay_option;
			};

            if ( isset( $jado_slidesperview_option ) ) {
                echo $jado_slidesperview_option;
            };

			if ( isset( $jado_arrow_option ) ) {
				echo $jado_arrow_option;
			};

			if ( isset( $jado_pagination_option ) ) {
				echo $jado_pagination_option;
			};

			if ( isset( $jado_loop_option ) ) {
				echo $jado_loop_option;
			};

            if ( isset( $jado_autoheight_option ) ) {
                echo $jado_autoheight_option;
            };

			if ( isset( $jado_keyboard_option ) ) {
				echo $jado_keyboard_option;
			};

			if ( isset( $jado_keyboard_option ) ) {
				echo $jado_keyboard_option;
			};

			if ( isset( $jado_hash_option ) ) {
				echo $jado_hash_option;
			};

//			echo 'slidesPerView: "auto",';


			echo '});';


			echo 'var galleryThumbs = new Swiper(".gallery-thumbs", {';

			if ( isset( $jado_thumbnail_option ) ) {
				echo $jado_thumbnail_option;
				echo 'galleryTop.controller.control = galleryThumbs;galleryThumbs.controller.control = galleryTop;';
			} else {
				echo '});';
			};


			echo '});</script>';


			echo '<script>jQuery(document).ready(function ($) {$(".gallery-item").remove();$(".gallery-thumbs").prependTo(".gallery"); $(".gallery-top").prependTo(".gallery");});</script>';

		}

		return $content;
	}

	add_filter( 'the_content', 'jado_SGS' );




}