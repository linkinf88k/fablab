<?php
/**
 * Single Course Template
 *
 * @package FabLab
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

while ( have_posts() ) :
	the_post();

	$course_id     = get_the_ID();
	$course_terms  = get_the_terms( $course_id, 'course_category' );
	$course_term   = ( $course_terms && ! is_wp_error( $course_terms ) ) ? $course_terms[0] : null;
	$category_name = $course_term ? mb_strtoupper( $course_term->name ) : 'Lập trình';
	$target_age    = get_post_meta( $course_id, 'target_age', true ) ?: 'Mọi lứa tuổi';
	$duration      = get_post_meta( $course_id, 'duration', true ) ?: '3 tháng';
	$class_size    = get_post_meta( $course_id, 'class_size', true ) ?: '15 - 20 học sinh/lớp';
	$summary       = get_post_meta( $course_id, 'long_description', true ) ?: get_the_excerpt();
	$course_image  = get_the_post_thumbnail_url( $course_id, 'large' ) ?: 'https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&w=900&q=80';
	?>

	<article class="pt-24 pb-16 bg-[#f9fbf9] animate-fadeIn" id="single-course-page">
		<div class="max-w-6xl mx-auto px-4 space-y-12">

			<!-- Top block: ẢNH + thông tin chính (custom grid, see .single-course-hero) -->
			<div class="single-course-hero">

				<!-- ẢNH -->
				<div class="single-course-image-wrap">
					<img
						src="<?php echo esc_url( $course_image ); ?>"
						alt="<?php echo esc_attr( get_the_title() ); ?>"
					/>
					<span class="single-course-badge"><?php echo esc_html( $category_name ); ?></span>
				</div>

				<!-- TÊN KHÓA HỌC / Đối tượng / ND khóa học -->
				<div class="space-y-5">
					<h1 class="single-course-title"><?php the_title(); ?></h1>

					<p class="single-course-meta">
						<strong>Đối tượng:</strong> <?php echo esc_html( $target_age ); ?>
					</p>

					<p class="single-course-summary"><?php echo esc_html( $summary ); ?></p>

					<!-- icon lớp học / icon thời gian -->
					<div class="single-course-stats">
						<span class="single-course-stat">
							<?php echo fablab_icon( 'users', '' ); ?>
							<?php echo esc_html( $class_size ); ?>
						</span>
						<span class="single-course-stat">
							<?php echo fablab_icon( 'clock', '' ); ?>
							<?php echo esc_html( $duration ); ?>
						</span>
					</div>

					<!-- button "ĐĂNG KÝ NGAY" -> link đến form bên dưới -->
					<a href="#course-register-form" class="single-course-cta">Đăng ký ngay</a>
				</div>
			</div>

			<!-- Nội dung khóa học - edit content như bình thường -->
			<div class="single-course-content">
				<?php the_content(); ?>
			</div>

			<!-- Form đăng ký -->
			<div class="single-course-register" id="course-register-form">
				<span class="single-course-register-glow-a"></span>
				<span class="single-course-register-glow-b"></span>

				<h2 class="single-course-register-heading">
					Đăng ký khóa học "<?php echo esc_html( get_the_title() ); ?>"
				</h2>
				<p class="single-course-register-text">
					Hãy để lại thông tin liên hệ chính xác để chuyên viên tuyển sinh của FABLAB liên hệ sắp xếp buổi học thử miễn phí phù hợp cực chất cho bé.
				</p>

				<form id="contact-form-course" class="single-course-register-form">
					<input type="hidden" name="course" value="<?php echo esc_attr( get_the_title() ); ?>" />
					<input type="text" required placeholder="Họ và tên..." />
					<input type="text" required placeholder="Số điện thoại hoặc Email..." />
					<div class="single-course-register-submit">
						<button type="submit">Đăng ký nhận cuộc gọi</button>
					</div>
				</form>
			</div>

		</div>
	</article>

	<?php
endwhile;

get_footer();
