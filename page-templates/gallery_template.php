<?php
/**
 * Template Name: Gallery Page Template
 * Template Post Type: post, page, event, projects
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

get_header();

$container   = get_theme_mod( 'understrap_container_type' );
$sidebar_pos = get_theme_mod( 'understrap_sidebar_position' );
// On WooCommerce pages there is no need for sidebars as they leave
// too little space for WooCommerce itself. We check if WooCommerce
// is active and the current page is a WooCommerce page and we do
?>

<?php digidol_hero_home();?>

<?php get_footer(); ?>