<?php
/**
 * Template Name: Courses Catalog
 *
 * @package FabLab
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

// Fetch filtering parameters
$selected_category = isset( $_GET['category'] ) ? sanitize_text_field( $_GET['category'] ) : 'all';
$search_query       = isset( $_GET['s'] ) ? sanitize_text_field( $_GET['s'] ) : '';

require get_template_directory() . '/inc/course-catalog.php';

get_footer();
