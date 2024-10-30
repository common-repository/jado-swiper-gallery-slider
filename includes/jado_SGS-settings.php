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


function jado_options_page_html() {
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}
}


add_action( 'admin_menu', 'jado_create_menu' );

function jado_create_menu() {

	add_menu_page(
		'ja.do – Swiper Gallery Slider',
		'ja.do SGS',
		'manage_options',
		'jado',
		'jado_settings_page'
	);

	add_action( 'admin_init', 'register_jado_settings' );
}


function register_jado_settings() {
	register_setting( 'jado-settings-group', 'jado_slider_height' );
	register_setting( 'jado-settings-group', 'jado_thumbnail_option' );
	register_setting( 'jado-settings-group', 'jado_pagination_option' );
	register_setting( 'jado-settings-group', 'jado_arrow_option' );
	register_setting( 'jado-settings-group', 'jado_autoplay_option' );
    register_setting( 'jado-settings-group', 'jado_slidesperview_option' );
    register_setting( 'jado-settings-group', 'jado_effect_option' );
	register_setting( 'jado-settings-group', 'jado_loadjquery_option' );
	register_setting( 'jado-settings-group', 'jado_loop_option' );
    register_setting( 'jado-settings-group', 'jado_autoheight_option' );
    register_setting( 'jado-settings-group', 'jado_keyboard_option' );
	register_setting( 'jado-settings-group', 'jado_hash_option' );
	register_setting( 'jado-settings-group', 'jado_size_option' );
}

function jado_settings_page() {
	?>
    <div class="wrap">
        <h1>ja.do – Swiper Gallery Slider</h1>

        <p>Super simple plugin to transfrom the WordPress galeries in a Swiper Slider.
            <br />More information about the plugin you'll find at:
            <br /><a target="_blank" href="https://www.ja.do/swiper-gallery-slider-wordpress-plugin/">www.ja.do/swiper-gallery-slider-wordpress-plugin</a>
            <br />More about Swiper here: <a href="http://idangero.us/swiper/" target="_blank">idangero.us/swiper/</a>

        <hr>


        <form method="post" action="options.php">
			<?php settings_fields( 'jado-settings-group' ); ?>
			<?php do_settings_sections( 'jado-settings-group' ); ?>
            <table class="form-table">


                <tr>
                    <th scope="row">Slide resulution size: <br/>
                        <small style="color: #aaa;">choose the resolution of the slides</small>
                    </th>
                    <td>
                        <select name="jado_size_option">
                            <option value="large" <?php if ( get_option('jado_size_option') == 'large' ){echo 'selected="selected"';};  ?>>large</option>
                            <option value="full" <?php if ( get_option('jado_size_option') == 'full' ){echo 'selected="selected"';};  ?>>original size</option>
                            <option value="medium" <?php if ( get_option('jado_size_option') == 'medium' ){echo 'selected="selected"';};  ?>>medium</option>
                            <option value="thumbnail" <?php if ( get_option('jado_size_option') == 'thumbnail' ){echo 'selected="selected"';};  ?>>thumbnail</option>
                        </select>
                    </td>
                </tr>


                <tr>
                    <th scope="row">Responsive slider height: <br/>
                        <small style="color: #aaa;">responsive size depends on viewport width</small>
                    </th>
                    <td>

                        <select name="jado_slider_height">
                            <option value="10" <?php if ( get_option('jado_slider_height') == 10 ){echo 'selected="selected"';};  ?>>10</option>
                            <option value="20" <?php if ( get_option('jado_slider_height') == 20 ){echo 'selected="selected"';};  ?>>20</option>
                            <option value="30" <?php if ( get_option('jado_slider_height') == 30 ){echo 'selected="selected"';};  ?>>30</option>
                            <option value="40" <?php if ( get_option('jado_slider_height') == 40 ){echo 'selected="selected"';};  ?>>40</option>
                            <option value="50" <?php if ( get_option('jado_slider_height') == 50 ){echo 'selected="selected"';};  ?>>50</option>
                            <option value="60" <?php if ( get_option('jado_slider_height') == 60 ){echo 'selected="selected"';};  ?>>60</option>
                            <option value="70" <?php if ( get_option('jado_slider_height') == 70 ){echo 'selected="selected"';};  ?>>70</option>
                            <option value="80" <?php if ( get_option('jado_slider_height') == 80 ){echo 'selected="selected"';};  ?>>80</option>
                        </select>

                        VW</td>
                </tr>



                <tr>
                    <th scope="row">Effekt: <br/>
                        <small style="color: #aaa;">choose transition effect for slideshow</small>
                    </th>
                    <td>
                        <select name="jado_effect_option">
                            <option value="slide" <?php if ( get_option('jado_effect_option') == 'slide' ){echo 'selected="selected"';};  ?>>slide</option>
                            <option value="fade" <?php if ( get_option('jado_effect_option') == 'fade' ){echo 'selected="selected"';};  ?>>fade</option>
                            <option value="cube" <?php if ( get_option('jado_effect_option') == 'cube' ){echo 'selected="selected"';};  ?>>cube</option>
                            <option value="coverflow" <?php if ( get_option('jado_effect_option') == 'coverflow' ){echo 'selected="selected"';};  ?>>coverflow</option>
                        </select>
                    </td>
                </tr>



                <tr>
                    <th scope="row">Thumbnails:
                        <br/>
                        <small style="color: #aaa;">display thumbnails under the slides</small>
                    </th>

                    <td><input type="checkbox" name="jado_thumbnail_option"
                               value="false" <?php checked('false', get_option('jado_thumbnail_option', 'true')); ?>"/>
                    </td>

                </tr>



                <tr>
                    <th scope="row">Pagination count:
                        <br/>
                        <small style="color: #aaa;">enable pagination count on slides (Example: 1/8)</small>
                    </th>
                    <td>
                        <input type="checkbox" name="jado_pagination_option"
                               value="false" <?php checked('false', get_option('jado_pagination_option', 'true')); ?>"/>
                    </td>
                </tr>


                <tr>
                    <th scope="row">Navigation arrows:
                        <br/>
                        <small style="color: #aaa;">enable navigation arrows</small>
                    </th>
                    <td>

                        <input type="checkbox" name="jado_arrow_option"
                               value="false" <?php checked('false', get_option('jado_arrow_option', 'true')); ?>"/>
                    </td>
                </tr>

                <tr>
                    <th scope="row">Keyboard control:
                        <br/>
                        <small style="color: #aaa;">navigate the slides with keyboard</small>
                    </th>

                    <td><input type="checkbox" name="jado_keyboard_option"
                               value="false" <?php checked('false', get_option('jado_keyboard_option', 'true')); ?>"/>
                    </td>
                </tr>



                <tr>
                    <th scope="row">Autoplay slider:
                        <br/>
                        <small style="color: #aaa;">autoplay slideshow</small>
                    </th>
                    <td>

                        <input type="checkbox" name="jado_autoplay_option"
                               value="false" <?php checked('false', get_option('jado_autoplay_option', 'true')); ?>"/>
                    </td>
                </tr>



                <tr>
                    <th scope="row">Slides per View:
                        <br/>
                        <small style="color: #aaa;">NOT working with thumbnails and pagination count!</small>
                    </th>
                    <td>
                        <select name="jado_slidesperview_option">
                            <option value="1" <?php if ( get_option('jado_slidesperview_option') == '1' ){echo 'selected="selected"';};  ?>>1</option>
                            <option value="2" <?php if ( get_option('jado_slidesperview_option') == '2' ){echo 'selected="selected"';};  ?>>2</option>
                            <option value="3" <?php if ( get_option('jado_slidesperview_option') == '3' ){echo 'selected="selected"';};  ?>>3</option>
                            <option value="4" <?php if ( get_option('jado_slidesperview_option') == '4' ){echo 'selected="selected"';};  ?>>4</option>
                            <option value="5" <?php if ( get_option('jado_slidesperview_option') == '5' ){echo 'selected="selected"';};  ?>>5</option>
                            <option value="10" <?php if ( get_option('jado_slidesperview_option') == '10' ){echo 'selected="selected"';};  ?>>10</option>
                        </select>
                    </td>
                </tr>


<!--
                <tr>
                    <th scope="row">Auto height:
                        <br/>
                        <small style="color: #aaa;">enable auto height</small>
                    </th>

                    <td><input type="checkbox" name="jado_autoheight_option"
                               value="false" <?php //checked('false', get_option('jado_autoheight_option', 'true')); ?>"/>
                    </td>
                </tr>

                -->



                <tr>
                    <th scope="row">Loop slides:
                        <br/>
                        <small style="color: #aaa;">enable looping the slideshow</small>
                    </th>

                    <td><input type="checkbox" name="jado_loop_option"
                               value="false" <?php checked('false', get_option('jado_loop_option', 'true')); ?>"/>
                    </td>
                </tr>


                <tr>
                    <th scope="row">Hash navigation:
                        <br/>
                        <small style="color: #aaa;">make slides linkable with URL rewriting</small>
                    </th>

                    <td><input type="checkbox" name="jado_hash_option"
                               value="false" <?php checked('false', get_option('jado_hash_option', 'true')); ?>"/>
                    </td>
                </tr>


                <tr>
                    <th scope="row">Display Errors???:
                        <br/>
                        <small style="color: #aaa;">Check to enable jQuery load before the slider. Enable only, if slideshow displayed incorrectly</small>
                    </th>

                    <td><input type="checkbox" name="jado_loadjquery_option"
                               value="false" <?php checked('false', get_option('jado_loadjquery_option', 'true')); ?>"/>
                    </td>
                </tr>


            </table>

			<?php submit_button('Save all settings'); ?>
        </form>

        <hr>
        <small>If you find any error or bug, please send a description of it to <a href="mailto:plugin@ja.do">plugin@ja.do</a>
        </small>
    </div>
	<?php
}