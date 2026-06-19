<?php
/**
 * Course Category Archive — /khoa-hoc/{danh-muc-khoa-hoc}/
 *
 * Dedicated "lộ trình" (roadmap) page for the queried course_category term:
 * banner (image + title + description) followed by a zigzag alternating
 * list of the courses in that category, ending with a register CTA.
 *
 * @package FabLab
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$queried_term  = get_queried_object();
$term_slug     = ( $queried_term instanceof WP_Term ) ? $queried_term->slug : '';
$term_name     = ( $queried_term instanceof WP_Term ) ? $queried_term->name : '';
$category      = $term_slug ? fablab_get_program_category( $term_slug ) : null;

$roadmap_title = mb_strtoupper( 'Lộ trình ' . ( $category ? $category['name'] : $term_name ) );
$roadmap_image = $category ? $category['image'] : 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=1600&q=80';

// Term description (wp-admin → Khóa học → Danh mục khóa học → Sửa) wins over
// the static fallback copy, so admins can edit this text without touching code.
$term_description = ( $queried_term instanceof WP_Term ) ? term_description( $queried_term ) : '';
$roadmap_subtitle  = ! empty( $term_description ) ? wp_strip_all_tags( $term_description ) : ( $category ? $category['description'] : '' );

$courses_query = new WP_Query( array(
	'post_type'      => 'course',
	'posts_per_page' => -1,
	'orderby'        => 'menu_order title',
	'order'          => 'ASC',
	'tax_query'      => array(
		array(
			'taxonomy' => 'course_category',
			'field'    => 'slug',
			'terms'    => $term_slug,
		),
	),
) );
?>

<!-- Roadmap banner: image + title + description, replaceable via $category['image'] / term description -->
<div class="category-roadmap-banner" style="background-image: url('<?php echo esc_url( $roadmap_image ); ?>');">
	<div class="fablab-banner-overlay"></div>
	<div class="fablab-banner-content">
		<h1 class="fablab-banner-title"><?php echo esc_html( $roadmap_title ); ?></h1>
		<?php if ( ! empty( $roadmap_subtitle ) ) : ?>
			<p class="fablab-banner-subtitle category-roadmap-banner-subtitle"><?php echo esc_html( $roadmap_subtitle ); ?></p>
		<?php endif; ?>
	</div>
</div>

<section class="pt-6 pb-16 bg-[#f9fbf9]" id="category-roadmap-page">
	<div class="max-w-7xl mx-auto px-4">

		<div class="mb-12">
			<a href="<?php echo esc_url( home_url( '/khoa-hoc' ) ); ?>" class="single-post-back">
				<span aria-hidden="true">←</span> Tất cả khóa học
			</a>
		</div>

		<div class="max-w-5xl mx-auto">
			<?php if ( $courses_query->have_posts() ) : ?>
				<div class="roadmap-list">
					<?php
					$step = 0;
					while ( $courses_query->have_posts() ) :
						$courses_query->the_post();
						$step++;
						$course_id    = get_the_ID();
						$target_age   = get_post_meta( $course_id, 'target_age', true ) ?: 'Mọi lứa tuổi';
						$duration     = get_post_meta( $course_id, 'duration', true ) ?: '3 tháng';
						$course_image = get_the_post_thumbnail_url( $course_id, 'large' ) ?: 'https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&w=800&q=80';
						$course_description = get_the_excerpt() ?: wp_trim_words( get_the_content(), 20 );
						$is_reversed  = ( 0 === $step % 2 );
						?>
						<div class="roadmap-row<?php echo $is_reversed ? ' is-reversed' : ''; ?>">
							<div class="roadmap-image-col">
								<span class="roadmap-step-badge"><?php echo esc_html( $step ); ?></span>
								<div class="roadmap-image-wrap">
									<img src="<?php echo esc_url( $course_image ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" referrerpolicy="no-referrer" />
								</div>
							</div>
							<div class="roadmap-text-col">
								<h3 class="roadmap-course-title"><?php the_title(); ?></h3>
								<?php if ( ! empty( $course_description ) ) : ?>
									<p class="roadmap-course-desc"><?php echo esc_html( $course_description ); ?></p>
								<?php endif; ?>
								<ul class="roadmap-course-highlights">
									<li><?php echo fablab_icon( 'users', '' ); ?><span>Độ tuổi: <?php echo esc_html( $target_age ); ?></span></li>
									<li><?php echo fablab_icon( 'clock', '' ); ?><span>Thời lượng: <?php echo esc_html( $duration ); ?></span></li>
								</ul>
								<a href="<?php echo esc_url( get_permalink( $course_id ) ); ?>" class="roadmap-course-link">
									Chi tiết <?php echo fablab_icon( 'chevron-right', 'h-3.5 w-3.5' ); ?>
								</a>
							</div>
						</div>
					<?php endwhile; ?>
				</div>
				<?php wp_reset_postdata(); ?>
			<?php else : ?>
				<div class="text-center py-12 bg-white rounded-2xl border border-dashed border-gray-200">
					<?php echo fablab_icon( 'help-circle', 'h-12 w-12 text-gray-400 mx-auto' ); ?>
					<h3 class="font-extrabold text-lg mt-3 text-neutral-800">Chưa có khóa học trong danh mục này</h3>
					<p class="text-sm text-gray-500 max-w-sm mx-auto mt-1">Quý phụ huynh vui lòng quay lại trang Khóa học để xem các chương trình khác.</p>
				</div>
			<?php endif; ?>
		</div>

		<div class="text-center mt-8">
			<a href="<?php echo esc_url( home_url( '/lien-he/' ) ); ?>" class="roadmap-register-cta">Đăng ký ngay</a>
		</div>

	</div>
</section>

<?php
get_footer();
