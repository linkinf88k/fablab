<?php
/**
 * FabLab Theme Functions and Definitions
 *
 * @package FabLab
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

require_once get_template_directory()
    . '/inc/class-fablab-menu-walker.php';
/**
 * Setup FabLab Theme
 */
function fablab_setup() {
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	// Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );

	// Register navigation menus.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'fablab' ),
	) );

	// Switch default core markup for search form, comment form, and comments to output valid HTML5.
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
		'style',
		'script',
	) );
}
add_action( 'after_setup_theme', 'fablab_setup' );

/**
 * Enqueue scripts and styles.
 */
function fablab_scripts() {
	// Enqueue Google Fonts (Roboto)
	wp_enqueue_style( 'fablab-fonts', 'https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap', array(), null );

	// Enqueue main stylesheet (style.css)
	wp_enqueue_style( 'fablab-style', get_stylesheet_uri(), array(), '1.0.0' );

	// Enqueue Tailwind compiled CSS
	wp_enqueue_style( 'fablab-main', get_template_directory_uri() . '/assets/main.css', array( 'fablab-style' ), '1.0.0' );

	// Enqueue palette overrides after main CSS so color remap wins.
	$theme_overrides_path = get_template_directory() . '/assets/theme-overrides.css';
	$theme_overrides_ver  = file_exists( $theme_overrides_path ) ? (string) filemtime( $theme_overrides_path ) : '1.0.0';
	wp_enqueue_style( 'fablab-theme-overrides', get_template_directory_uri() . '/assets/theme-overrides.css', array( 'fablab-main' ), $theme_overrides_ver );

	// Enqueue Vanilla JS scripts (to be created in Phase 8)
	if ( file_exists( get_template_directory() . '/assets/js/nav.js' ) ) {
		wp_enqueue_script( 'fablab-nav', get_template_directory_uri() . '/assets/js/nav.js', array(), '1.0.0', true );
	}
	if ( file_exists( get_template_directory() . '/assets/js/banner-slider.js' ) ) {
		wp_enqueue_script( 'fablab-banner-slider', get_template_directory_uri() . '/assets/js/banner-slider.js', array(), '1.0.0', true );
	}
	if ( file_exists( get_template_directory() . '/assets/js/about-tabs.js' ) ) {
		$about_tabs_js_path = get_template_directory() . '/assets/js/about-tabs.js';
		$about_tabs_js_ver  = (string) filemtime( $about_tabs_js_path );
		wp_enqueue_script( 'fablab-about-tabs', get_template_directory_uri() . '/assets/js/about-tabs.js', array(), $about_tabs_js_ver, true );
	}
	if ( file_exists( get_template_directory() . '/assets/js/activities-tabs.js' ) ) {
		$activities_tabs_js_path = get_template_directory() . '/assets/js/activities-tabs.js';
		$activities_tabs_js_ver  = (string) filemtime( $activities_tabs_js_path );
		wp_enqueue_script( 'fablab-activities-tabs', get_template_directory_uri() . '/assets/js/activities-tabs.js', array(), $activities_tabs_js_ver, true );
	}
	if ( file_exists( get_template_directory() . '/assets/js/facilities-carousel.js' ) ) {
		wp_enqueue_script( 'fablab-facilities-carousel', get_template_directory_uri() . '/assets/js/facilities-carousel.js', array(), '1.0.0', true );
	}
	if ( file_exists( get_template_directory() . '/assets/js/tabs.js' ) ) {
		wp_enqueue_script( 'fablab-tabs', get_template_directory_uri() . '/assets/js/tabs.js', array(), '1.0.0', true );
	}
	if ( file_exists( get_template_directory() . '/assets/js/modal.js' ) ) {
		wp_enqueue_script( 'fablab-modal', get_template_directory_uri() . '/assets/js/modal.js', array(), '1.0.0', true );
	}
	if ( file_exists( get_template_directory() . '/assets/js/courses-filter.js' ) ) {
		wp_enqueue_script( 'fablab-courses-filter', get_template_directory_uri() . '/assets/js/courses-filter.js', array(), '1.0.0', true );
	}
}
add_action( 'wp_enqueue_scripts', 'fablab_scripts' );

/**
 * Register Custom Post Types
 */
function fablab_register_post_types() {
	// Course Custom Post Type
	register_post_type( 'course', array(
		'labels'      => array(
			'name'          => __( 'Courses', 'fablab' ),
			'singular_name' => __( 'Course', 'fablab' ),
			'add_new'       => __( 'Add New Course', 'fablab' ),
			'add_new_item'  => __( 'Add New Course', 'fablab' ),
			'edit_item'     => __( 'Edit Course', 'fablab' ),
			'new_item'      => __( 'New Course', 'fablab' ),
			'view_item'     => __( 'View Course', 'fablab' ),
			'search_items'  => __( 'Search Courses', 'fablab' ),
		),
		'public'      => true,
		'has_archive' => true,
		'supports'    => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
		'menu_icon'   => 'dashicons-welcome-learn-more',
		'rewrite'     => array( 'slug' => 'khoa-hoc-cpt' ),
		'show_in_rest' => true,
	) );

	// Facility Custom Post Type
	register_post_type( 'facility', array(
		'labels'      => array(
			'name'          => __( 'Facilities', 'fablab' ),
			'singular_name' => __( 'Facility', 'fablab' ),
			'add_new'       => __( 'Add New Facility', 'fablab' ),
			'add_new_item'  => __( 'Add New Facility', 'fablab' ),
			'edit_item'     => __( 'Edit Facility', 'fablab' ),
		),
		'public'      => true,
		'supports'    => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
		'menu_icon'   => 'dashicons-admin-home',
		'show_in_rest' => true,
	) );

	// Partner Custom Post Type
	register_post_type( 'partner', array(
		'labels'      => array(
			'name'          => __( 'Partners', 'fablab' ),
			'singular_name' => __( 'Partner', 'fablab' ),
			'add_new'       => __( 'Add New Partner', 'fablab' ),
			'add_new_item'  => __( 'Add New Partner', 'fablab' ),
			'edit_item'     => __( 'Edit Partner', 'fablab' ),
		),
		'public'      => true,
		'supports'    => array( 'title', 'thumbnail', 'custom-fields' ),
		'menu_icon'   => 'dashicons-groups',
		'show_in_rest' => true,
	) );

	// Banner Custom Post Type
	register_post_type( 'banner', array(
		'labels'      => array(
			'name'          => __( 'Banners', 'fablab' ),
			'singular_name' => __( 'Banner', 'fablab' ),
			'add_new'       => __( 'Add New Banner', 'fablab' ),
			'add_new_item'  => __( 'Add New Banner', 'fablab' ),
			'edit_item'     => __( 'Edit Banner', 'fablab' ),
		),
		'public'      => true,
		'supports'    => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
		'menu_icon'   => 'dashicons-images-alt2',
		'show_in_rest' => true,
	) );
}
add_action( 'init', 'fablab_register_post_types' );

/**
 * Course Category taxonomy — gives courses real, crawlable archive URLs at
 * /khoa-hoc/{danh-muc-khoa-hoc}/ instead of the old ?category= query string.
 * The term is still assigned from the post edit screen via ACF's Taxonomy
 * field (see inc/acf-fields.php), so meta_box_cb is disabled here to avoid
 * showing WordPress's native taxonomy box too.
 */
function fablab_register_course_taxonomy() {
	register_taxonomy( 'course_category', array( 'course' ), array(
		'labels'            => array(
			'name'          => __( 'Danh mục khóa học', 'fablab' ),
			'singular_name' => __( 'Danh mục khóa học', 'fablab' ),
			'search_items'  => __( 'Tìm danh mục', 'fablab' ),
			'all_items'     => __( 'Tất cả danh mục', 'fablab' ),
			'edit_item'     => __( 'Sửa danh mục', 'fablab' ),
			'update_item'   => __( 'Cập nhật danh mục', 'fablab' ),
			'add_new_item'  => __( 'Thêm danh mục mới', 'fablab' ),
		),
		'hierarchical'      => false,
		'public'            => true,
		'show_ui'           => true,
		'show_admin_column' => true,
		'show_in_rest'      => true,
		'show_in_nav_menus' => false,
		'meta_box_cb'       => false,
		'rewrite'           => array(
			'slug'       => 'khoa-hoc',
			'with_front' => false,
		),
	) );
}
add_action( 'init', 'fablab_register_course_taxonomy' );

/**
 * Seed the 5 known course category terms (idempotent — checks term_exists first).
 */
function fablab_seed_course_category_terms() {
	$terms = array(
		'lap-trinh-ung-dung' => 'LẬP TRÌNH ỨNG DỤNG',
		'lap-trinh-thi-dau'  => 'LẬP TRÌNH THI ĐẤU',
		'lap-trinh-game'     => 'LẬP TRÌNH GAME',
		'stem-ai-robotics'   => 'STEM AI ROBOTICS',
		'luyen-thi-thpt'     => 'LUYỆN THI THPT',
	);

	foreach ( $terms as $slug => $name ) {
		if ( ! term_exists( $slug, 'course_category' ) ) {
			wp_insert_term( $name, 'course_category', array( 'slug' => $slug ) );
		}
	}
}
add_action( 'init', 'fablab_seed_course_category_terms', 11 );

/**
 * Course custom fields (course_category, long_description, target_age,
 * duration, class_size) are registered as an ACF field group.
 * See inc/acf-fields.php.
 */
require_once get_template_directory() . '/inc/acf-fields.php';

/**
 * One-time data seeder (courses + news posts). See inc/seed-data.php.
 */
require_once get_template_directory() . '/inc/seed-data.php';

/**
 * Include helper icons function (to be created in Phase 4)
 */
if ( file_exists( get_template_directory() . '/inc/icons.php' ) ) {
	require_once get_template_directory() . '/inc/icons.php';
} else {
	// Fallback icon function during Phase 2
	function fablab_icon( $name, $class = '' ) {
		return '<span class="fablab-icon icon-' . esc_attr( $name ) . ' ' . esc_attr( $class ) . '"></span>';
	}
}

// Add support for WordPress built-in custom logo
add_theme_support( 'custom-logo', array(
	'height'      => 100,
	'width'       => 400,
	'flex-height' => true,
	'flex-width'  => true,
) );

/**
 * Register Customizer settings for the two header logos.
 * Go to: Appearance → Customize → Site Identity
 */
function fablab_customize_register( $wp_customize ) {

	$wp_customize->add_section( 'fablab_header_topbar', array(
		'title'       => __( 'FabLab Header Top Bar', 'fablab' ),
		'priority'    => 31,
		'description' => __( 'Nội dung dòng thông tin phía trên header.', 'fablab' ),
	) );

	$wp_customize->add_setting( 'fablab_top_notice_label', array(
		'default'           => 'TUYEN SINH 2025:',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'fablab_top_notice_label', array(
		'label'   => __( 'Topbar Label', 'fablab' ),
		'section' => 'fablab_header_topbar',
		'type'    => 'text',
	) );

	$wp_customize->add_setting( 'fablab_top_notice_text', array(
		'default'           => 'Khai giảng liên tục các khóa học công nghệ dành cho học sinh từ 6-18 tuổi',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'fablab_top_notice_text', array(
		'label'   => __( 'Topbar Notice Text', 'fablab' ),
		'section' => 'fablab_header_topbar',
		'type'    => 'text',
	) );

	$wp_customize->add_setting( 'fablab_top_phone', array(
		'default'           => '094.686.2803',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'fablab_top_phone', array(
		'label'   => __( 'Topbar Phone', 'fablab' ),
		'section' => 'fablab_header_topbar',
		'type'    => 'text',
	) );

	$wp_customize->add_setting( 'fablab_top_location', array(
		'default'           => 'Hà Nội',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'fablab_top_location', array(
		'label'   => __( 'Topbar Location', 'fablab' ),
		'section' => 'fablab_header_topbar',
		'type'    => 'text',
	) );

	$wp_customize->add_setting( 'fablab_top_email', array(
		'default'           => 'info@fablab.edu.vn',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_email',
	) );
	$wp_customize->add_control( 'fablab_top_email', array(
		'label'   => __( 'Topbar Email', 'fablab' ),
		'section' => 'fablab_header_topbar',
		'type'    => 'email',
	) );

	$wp_customize->add_setting( 'fablab_top_cta_text', array(
		'default'           => 'Đăng ký trải nghiệm',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'fablab_top_cta_text', array(
		'label'   => __( 'Topbar CTA Text', 'fablab' ),
		'section' => 'fablab_header_topbar',
		'type'    => 'text',
	) );

	$wp_customize->add_setting( 'fablab_top_cta_url', array(
		'default'           => home_url( '/#section-contact' ),
		'transport'         => 'refresh',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'fablab_top_cta_url', array(
		'label'   => __( 'Topbar CTA URL', 'fablab' ),
		'section' => 'fablab_header_topbar',
		'type'    => 'url',
	) );

	$wp_customize->add_section( 'fablab_hero_slider', array(
		'title'       => __( 'FabLab Hero Slider', 'fablab' ),
		'priority'    => 32,
		'description' => __( 'Nội dung banner đầu trang (3 slide).', 'fablab' ),
	) );

	$wp_customize->add_setting( 'fablab_hero_eyebrow', array(
		'default'           => 'BK STEM ECOSYSTEM',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'fablab_hero_eyebrow', array(
		'label'   => __( 'Hero Eyebrow', 'fablab' ),
		'section' => 'fablab_hero_slider',
		'type'    => 'text',
	) );

	$hero_defaults = array(
		1 => array(
			'title'    => 'Khám phá công nghệ, sáng tạo tương lai',
			'subtitle' => 'Khám phá công nghệ, sáng tạo tương lai cao đến ngôi nhà của trẻ.',
			'image'    => 'https://images.unsplash.com/photo-1596461404969-9ae70f2830c1?auto=format&fit=crop&w=1200&q=80',
			'badge'    => 'BK-STEM',
			'cta_text' => 'Đăng ký ngay',
			'cta_url'  => home_url( '/#section-contact' ),
		),
		2 => array(
			'title'    => 'Kiến tạo tư duy, chinh phục công nghệ',
			'subtitle' => 'Ươm mầm tư duy logic, tự tin lập trình kéo thả và xây dựng thuật toán cùng Scratch và Python.',
			'image'    => 'https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&w=1200&q=80',
			'badge'    => 'SCRATCH & PYTHON',
			'cta_text' => 'Đăng ký ngay',
			'cta_url'  => home_url( '/#section-contact' ),
		),
		3 => array(
			'title'    => 'Chế tác thông minh, làm chủ robotics',
			'subtitle' => 'Lập trình cảm biến thế hệ mới, hiện thực hóa các ý tưởng sáng tạo cơ khí tự động hóa thông minh.',
			'image'    => 'https://images.unsplash.com/photo-1581092335397-9583fe92d232?auto=format&fit=crop&w=1200&q=80',
			'badge'    => 'ROBOTICS LAB',
			'cta_text' => 'Đăng ký ngay',
			'cta_url'  => home_url( '/#section-contact' ),
		),
	);

	for ( $i = 1; $i <= 3; $i++ ) {
		$wp_customize->add_setting( "fablab_hero_slide_{$i}_title", array(
			'default'           => $hero_defaults[ $i ]['title'],
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( "fablab_hero_slide_{$i}_title", array(
			'label'   => sprintf( __( 'Slide %d Title', 'fablab' ), $i ),
			'section' => 'fablab_hero_slider',
			'type'    => 'text',
		) );

		$wp_customize->add_setting( "fablab_hero_slide_{$i}_subtitle", array(
			'default'           => $hero_defaults[ $i ]['subtitle'],
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( "fablab_hero_slide_{$i}_subtitle", array(
			'label'   => sprintf( __( 'Slide %d Subtitle', 'fablab' ), $i ),
			'section' => 'fablab_hero_slider',
			'type'    => 'text',
		) );

		$wp_customize->add_setting( "fablab_hero_slide_{$i}_image", array(
			'default'           => $hero_defaults[ $i ]['image'],
			'transport'         => 'refresh',
			'sanitize_callback' => 'esc_url_raw',
		) );
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, "fablab_hero_slide_{$i}_image", array(
			'label'    => sprintf( __( 'Slide %d Image', 'fablab' ), $i ),
			'section'  => 'fablab_hero_slider',
			'settings' => "fablab_hero_slide_{$i}_image",
		) ) );

		$wp_customize->add_setting( "fablab_hero_slide_{$i}_badge", array(
			'default'           => $hero_defaults[ $i ]['badge'],
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( "fablab_hero_slide_{$i}_badge", array(
			'label'   => sprintf( __( 'Slide %d Badge', 'fablab' ), $i ),
			'section' => 'fablab_hero_slider',
			'type'    => 'text',
		) );

		$wp_customize->add_setting( "fablab_hero_slide_{$i}_cta_text", array(
			'default'           => $hero_defaults[ $i ]['cta_text'],
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( "fablab_hero_slide_{$i}_cta_text", array(
			'label'   => sprintf( __( 'Slide %d CTA Text', 'fablab' ), $i ),
			'section' => 'fablab_hero_slider',
			'type'    => 'text',
		) );

		$wp_customize->add_setting( "fablab_hero_slide_{$i}_cta_url", array(
			'default'           => $hero_defaults[ $i ]['cta_url'],
			'transport'         => 'refresh',
			'sanitize_callback' => 'esc_url_raw',
		) );
		$wp_customize->add_control( "fablab_hero_slide_{$i}_cta_url", array(
			'label'   => sprintf( __( 'Slide %d CTA URL', 'fablab' ), $i ),
			'section' => 'fablab_hero_slider',
			'type'    => 'url',
		) );
	}

	// --- About Page Banner (page-gioi-thieu.php) ---
	$wp_customize->add_section( 'fablab_about_banner', array(
		'title'       => __( 'FabLab About Page Banner', 'fablab' ),
		'priority'    => 33,
		'description' => __( 'Ảnh nền, tiêu đề và mô tả phụ hiển thị ở đầu trang Giới thiệu.', 'fablab' ),
	) );

	$wp_customize->add_setting( 'fablab_about_banner_image', array(
		'default'           => 'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?auto=format&fit=crop&w=1600&q=80',
		'transport'         => 'refresh',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'fablab_about_banner_image', array(
		'label'    => __( 'Ảnh nền Banner', 'fablab' ),
		'section'  => 'fablab_about_banner',
		'settings' => 'fablab_about_banner_image',
	) ) );

	$wp_customize->add_setting( 'fablab_about_banner_title', array(
		'default'           => 'VỀ FABLAB BÁCH KHOA',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'fablab_about_banner_title', array(
		'label'   => __( 'Tiêu đề Banner', 'fablab' ),
		'section' => 'fablab_about_banner',
		'type'    => 'text',
	) );

	$wp_customize->add_setting( 'fablab_about_banner_subtitle', array(
		'default'           => 'Thành viên hệ sinh thái chuyển giao công nghệ BK Holdings - HUST',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'fablab_about_banner_subtitle', array(
		'label'   => __( 'Mô tả phụ Banner', 'fablab' ),
		'section' => 'fablab_about_banner',
		'type'    => 'text',
	) );

	// --- Contact Page Banner (page-lien-he.php) ---
	$wp_customize->add_section( 'fablab_contact_banner', array(
		'title'       => __( 'FabLab Contact Page Banner', 'fablab' ),
		'priority'    => 33,
		'description' => __( 'Ảnh nền, tiêu đề và mô tả phụ hiển thị ở đầu trang Liên hệ.', 'fablab' ),
	) );

	$wp_customize->add_setting( 'fablab_contact_banner_image', array(
		'default'           => 'https://images.unsplash.com/photo-1521587760476-6c12a4b040da?auto=format&fit=crop&w=1600&q=80',
		'transport'         => 'refresh',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'fablab_contact_banner_image', array(
		'label'    => __( 'Ảnh nền Banner', 'fablab' ),
		'section'  => 'fablab_contact_banner',
		'settings' => 'fablab_contact_banner_image',
	) ) );

	$wp_customize->add_setting( 'fablab_contact_banner_title', array(
		'default'           => 'LIÊN HỆ',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'fablab_contact_banner_title', array(
		'label'   => __( 'Tiêu đề Banner', 'fablab' ),
		'section' => 'fablab_contact_banner',
		'type'    => 'text',
	) );

	$wp_customize->add_setting( 'fablab_contact_banner_subtitle', array(
		'default'           => 'Kết nối cùng FABLAB Bách Khoa - BK Holdings',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'fablab_contact_banner_subtitle', array(
		'label'   => __( 'Mô tả phụ Banner', 'fablab' ),
		'section' => 'fablab_contact_banner',
		'type'    => 'text',
	) );

	// --- Contact Info (shared by footer.php and page-lien-he.php) ---
	$wp_customize->add_section( 'fablab_contact_info', array(
		'title'       => __( 'FabLab Contact Info', 'fablab' ),
		'priority'    => 34,
		'description' => __( 'Địa chỉ, hotline, email và bản đồ — dùng chung cho Footer và trang Liên hệ.', 'fablab' ),
	) );

	$wp_customize->add_setting( 'fablab_contact_address', array(
		'default'           => 'A17 Tạ Quang Bửu, Bạch Mai, Hai Bà Trưng, Hà Nội',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'fablab_contact_address', array(
		'label'   => __( 'Địa chỉ', 'fablab' ),
		'section' => 'fablab_contact_info',
		'type'    => 'text',
	) );

	$wp_customize->add_setting( 'fablab_contact_hotline', array(
		'default'           => '094 686 2803',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'fablab_contact_hotline', array(
		'label'   => __( 'Hotline', 'fablab' ),
		'section' => 'fablab_contact_info',
		'type'    => 'text',
	) );

	$wp_customize->add_setting( 'fablab_contact_email', array(
		'default'           => 'tuyensinh@fablabbachkhoa.edu.vn',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_email',
	) );
	$wp_customize->add_control( 'fablab_contact_email', array(
		'label'   => __( 'Email', 'fablab' ),
		'section' => 'fablab_contact_info',
		'type'    => 'email',
	) );

	$wp_customize->add_setting( 'fablab_contact_map_embed_url', array(
		'default'           => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.72970030588!2d105.84518777596205!3d21.003460488647012!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac77be83cb11%3A0xe54fb7dc2bd238fe!2zQTE3IFRhIFF1YW5nIELhu611LCBCw6FjaCBNYWksIEhhaSBCw6AgVHLGsG5nLCBIw6AgTuG7mWksIFZpZXRuYW0!5e0!3m2!1sen!2s!4v1718040000000!5m2!1sen!2s',
		'transport'         => 'refresh',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'fablab_contact_map_embed_url', array(
		'label'       => __( 'Google Maps Embed URL', 'fablab' ),
		'description' => __( 'Lấy từ Google Maps → Chia sẻ → Nhúng bản đồ → copy phần src="...".', 'fablab' ),
		'section'     => 'fablab_contact_info',
		'type'        => 'url',
	) );

	// --- Logo FABLAB (primary, left) ---
	$wp_customize->add_setting( 'logo_fablab', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logo_fablab', array(
		'label'    => __( 'Logo FABLAB (trái)', 'fablab' ),
		'description' => __( 'Upload logo FABLAB BÁCH KHOA (PNG/SVG nền trong, chiều cao ~40px)', 'fablab' ),
		'section'  => 'title_tagline',
		'settings' => 'logo_fablab',
		'priority' => 8,
	) ) );

	// --- Logo BK Holdings (secondary, right) ---
	$wp_customize->add_setting( 'logo_bk', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logo_bk', array(
		'label'    => __( 'Logo BK Holdings (phải)', 'fablab' ),
		'description' => __( 'Upload logo BK Holdings (PNG/SVG nền trong, chiều cao ~40px)', 'fablab' ),
		'section'  => 'title_tagline',
		'settings' => 'logo_bk',
		'priority' => 9,
	) ) );

	// --- About Section Tabs ---
	$wp_customize->add_section( 'fablab_about_tabs', array(
		'title'       => __( 'FabLab About Tabs', 'fablab' ),
		'priority'    => 33,
		'description' => __( 'Nội dung section Về FabLab (3 tab).', 'fablab' ),
	) );

	$about_tabs = array(
		1 => array(
			'label'       => 'Tổng Quan',
			'title'       => 'Tổng Quan',
			'description' => 'FABLAB Bách Khoa là hệ sinh thái học tập STEM ứng dụng cho học sinh từ tiểu học đến trung học. Chúng tôi tập trung vào trải nghiệm thực hành, tư duy sáng tạo và năng lực giải quyết vấn đề trong môi trường công nghệ hiện đại.',
			'image'       => 'https://images.unsplash.com/photo-1596461404969-9ae70f2830c1?auto=format&fit=crop&w=1200&q=80',
		),
		2 => array(
			'label'       => 'Hoạt Động Chính',
			'title'       => 'Hoạt Động Chính',
			'description' => 'Các hoạt động nổi bật tại FABLAB gồm lập trình Scratch, Python, Robotics, thiết kế 3D và dự án nhóm. Học viên được học theo dự án thật để phát triển kỹ năng công nghệ, thuyết trình và làm việc nhóm.',
			'image'       => 'https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&w=1200&q=80',
		),
		3 => array(
			'label'       => 'Chương Trình Hợp Tác',
			'title'       => 'Chương Trình Hợp Tác',
			'description' => 'FABLAB hợp tác cùng các trường học, doanh nghiệp và tổ chức giáo dục để triển khai chương trình STEM chuẩn quốc tế. Mục tiêu là mở rộng cơ hội tiếp cận công nghệ cho học sinh và tạo nền tảng phát triển bền vững.',
			'image'       => 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=1200&q=80',
		),
	);

	for ( $i = 1; $i <= 3; $i++ ) {
		$tab = $about_tabs[ $i ];

		$wp_customize->add_setting( "fablab_about_tab_{$i}_title", array(
			'default'           => $tab['title'],
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( "fablab_about_tab_{$i}_title", array(
			'label'   => sprintf( __( 'Tab %d - %s - Tiêu đề', 'fablab' ), $i, $tab['label'] ),
			'section' => 'fablab_about_tabs',
			'type'    => 'text',
		) );

		$wp_customize->add_setting( "fablab_about_tab_{$i}_description", array(
			'default'           => $tab['description'],
			'transport'         => 'refresh',
			'sanitize_callback' => 'wp_kses_post',
		) );
		$wp_customize->add_control( "fablab_about_tab_{$i}_description", array(
			'label'   => sprintf( __( 'Tab %d - %s - Mô tả', 'fablab' ), $i, $tab['label'] ),
			'section' => 'fablab_about_tabs',
			'type'    => 'textarea',
		) );

		$wp_customize->add_setting( "fablab_about_tab_{$i}_image", array(
			'default'           => $tab['image'],
			'transport'         => 'refresh',
			'sanitize_callback' => 'esc_url_raw',
		) );
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, "fablab_about_tab_{$i}_image", array(
			'label'    => sprintf( __( 'Tab %d - %s - Hình ảnh', 'fablab' ), $i, $tab['label'] ),
			'section'  => 'fablab_about_tabs',
			'settings' => "fablab_about_tab_{$i}_image",
		) ) );
	}

	// --- Partners Carousel (6 logos) ---
	$wp_customize->add_section( 'fablab_partners', array(
		'title'       => __( 'FabLab Đối Tác (6 logo)', 'fablab' ),
		'priority'    => 34,
		'description' => __( 'Logo đối tác hiển thị ở carousel tự động cuộn trên trang chủ.', 'fablab' ),
	) );

	$partner_defaults = array(
		1 => 'Microsoft IT Academy Program',
		2 => 'Linux Professional Institute',
		3 => 'Oracle Sun',
		4 => 'Palo Alto Networks',
		5 => 'Pearson BTEC',
		6 => 'Cisco Networking Academy',
	);

	for ( $i = 1; $i <= 6; $i++ ) {
		$wp_customize->add_setting( "fablab_partner_{$i}_name", array(
			'default'           => $partner_defaults[ $i ],
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( "fablab_partner_{$i}_name", array(
			'label'   => sprintf( __( 'Đối tác %d - Tên', 'fablab' ), $i ),
			'section' => 'fablab_partners',
			'type'    => 'text',
		) );

		$wp_customize->add_setting( "fablab_partner_{$i}_image", array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'esc_url_raw',
		) );
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, "fablab_partner_{$i}_image", array(
			'label'    => sprintf( __( 'Đối tác %d - Logo', 'fablab' ), $i ),
			'section'  => 'fablab_partners',
			'settings' => "fablab_partner_{$i}_image",
		) ) );

		$wp_customize->add_setting( "fablab_partner_{$i}_url", array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'esc_url_raw',
		) );
		$wp_customize->add_control( "fablab_partner_{$i}_url", array(
			'label'       => sprintf( __( 'Đối tác %d - Link (tùy chọn)', 'fablab' ), $i ),
			'description' => __( 'Để trống nếu logo không cần liên kết.', 'fablab' ),
			'section'     => 'fablab_partners',
			'type'        => 'url',
		) );
	}
}
add_action( 'customize_register', 'fablab_customize_register' );