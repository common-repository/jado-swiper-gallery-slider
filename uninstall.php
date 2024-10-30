<?php


if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}

$option_name1 = 'jado_slider_height';
$option_name2 = 'jado_thumbnail_option';
$option_name3 = 'jado_pagination_option';
$option_name4 = 'jado_arrow_option';
$option_name5 = 'jado_autoplay_option';
$option_name6 = 'jado_loadjquery_option';
$option_name7 = 'jado_loop_option';
$option_name8 = 'jado_keyboard_option';
$option_name9 = 'jado_hash_option';
$option_name10 = 'jado_size_option';


delete_option($option_name1);
delete_option($option_name2);
delete_option($option_name3);
delete_option($option_name4);
delete_option($option_name5);
delete_option($option_name6);
delete_option($option_name7);
delete_option($option_name8);
delete_option($option_name9);
delete_option($option_name10);


delete_site_option($option_name1);
delete_site_option($option_name2);
delete_site_option($option_name3);
delete_site_option($option_name4);
delete_site_option($option_name5);
delete_site_option($option_name6);
delete_site_option($option_name7);
delete_site_option($option_name8);
delete_site_option($option_name9);
delete_site_option($option_name10);


// drop a custom database table
/*
global $wpdb;
$wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}mytable");
*/

