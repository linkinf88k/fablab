<?php
/**
 * ACF field group for the Course CPT.
 *
 * The category is a real taxonomy (course_category, registered in
 * functions.php) so courses get crawlable /khoa-hoc/{slug}/ archive URLs.
 * It's still assigned from this same ACF metabox via a Taxonomy field
 * (save_terms/load_terms), not a separate native WP taxonomy box.
 *
 * The remaining field names match the post meta keys read directly by the
 * theme templates (single-course.php, inc/seed-data.php) via get_post_meta()
 * — ACF stores values under the same meta key as the field name.
 *
 * @package FabLab
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'acf/init', 'fablab_register_course_acf_fields' );

function fablab_register_course_acf_fields() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	acf_add_local_field_group( array(
		'key'      => 'group_fablab_course',
		'title'    => 'Thông tin khóa học',
		'fields'   => array(
			array(
				'key'           => 'field_fablab_course_category',
				'label'         => 'Danh mục khóa học',
				'name'          => 'course_category',
				'type'          => 'taxonomy',
				'instructions'  => 'Quyết định URL /khoa-hoc/{danh-muc}/ và bộ lọc tại trang Khóa học.',
				'required'      => 1,
				'taxonomy'      => 'course_category',
				'field_type'    => 'select',
				'allow_null'    => 0,
				'add_term'      => 1,
				'save_terms'    => 1,
				'load_terms'    => 1,
				'return_format' => 'id',
				'multiple'      => 0,
			),
			array(
				'key'   => 'field_fablab_target_age',
				'label' => 'Độ tuổi',
				'name'  => 'target_age',
				'type'  => 'text',
			),
			array(
				'key'   => 'field_fablab_duration',
				'label' => 'Thời lượng',
				'name'  => 'duration',
				'type'  => 'text',
			),
			array(
				'key'   => 'field_fablab_class_size',
				'label' => 'Sĩ số lớp',
				'name'  => 'class_size',
				'type'  => 'text',
			),
			array(
				'key'   => 'field_fablab_long_description',
				'label' => 'Mô tả chi tiết',
				'name'  => 'long_description',
				'type'  => 'textarea',
				'rows'  => 6,
			),
		),
		'location' => array(
			array(
				array(
					'param'    => 'post_type',
					'operator' => '==',
					'value'    => 'course',
				),
			),
		),
		'menu_order'            => 0,
		'position'              => 'normal',
		'style'                 => 'default',
		'label_placement'       => 'top',
		'instruction_placement' => 'label',
		'active'                => true,
		'show_in_rest'          => 1,
	) );
}
