<?php
/**
 * Course Category Archive — /khoa-hoc/{danh-muc-khoa-hoc}/
 *
 * Renders the same catalog UI as page-khoa-hoc.php, scoped to the queried
 * course_category term instead of a ?category= query string.
 *
 * @package FabLab
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$queried_term       = get_queried_object();
$selected_category = ( $queried_term instanceof WP_Term ) ? $queried_term->slug : 'all';
$search_query        = isset( $_GET['s'] ) ? sanitize_text_field( $_GET['s'] ) : '';

require get_template_directory() . '/inc/course-catalog.php';

get_footer();
