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

// Fetch filtering parameters (consumed by inc/course-catalog.php below)
$selected_category = isset( $_GET['category'] ) ? sanitize_text_field( $_GET['category'] ) : 'all';
$search_query       = isset( $_GET['s'] ) ? sanitize_text_field( $_GET['s'] ) : '';

// Section 1: program overview cards, one per course_category taxonomy term
// (shared with taxonomy-course_category.php's roadmap banner — see inc/program-categories.php)
$program_overviews = fablab_get_program_categories();

// Section 3: teachers carousel (Customize → Trang Khóa Học - Đội Ngũ Giáo Viên)
// Defaults mirror $teacher_defaults in functions.php — get_theme_mod() only
// returns the Customizer's registered default after an admin saves a value
// there, so the frontend fallback has to be supplied here too (same pattern
// as $default_banners in index.php).
$teacher_defaults = array(
	1 => array(
		'name'        => 'ThS. Nguyễn Văn An',
		'achievement' => 'Giảng viên CNTT Đại học Bách Khoa Hà Nội. 8 năm kinh nghiệm đào tạo lập trình thiếu nhi. Dẫn dắt 3 đội tuyển đạt giải Tin học trẻ Toàn quốc.',
		'image'       => 'https://i.pravatar.cc/300?img=11',
	),
	2 => array(
		'name'        => 'CN. Trần Thị Bích',
		'achievement' => 'Cựu sinh viên xuất sắc ngành Khoa học máy tính. Chuyên gia thiết kế giáo trình Scratch & Python cho trẻ em. 5 năm giảng dạy tại FABLAB.',
		'image'       => 'https://i.pravatar.cc/300?img=12',
	),
	3 => array(
		'name'        => 'ThS. Lê Hoàng Nam',
		'achievement' => 'Kỹ sư Robotics, từng huấn luyện đội thi Robocon đạt giải Ba toàn quốc. Đam mê truyền cảm hứng STEM cho học sinh.',
		'image'       => 'https://i.pravatar.cc/300?img=13',
	),
	4 => array(
		'name'        => 'CN. Phạm Thu Hà',
		'achievement' => 'Chuyên gia Game Development với Unity. Từng phát hành 2 game indie trên Steam. Giảng dạy lập trình game tại FABLAB từ 2022.',
		'image'       => 'https://i.pravatar.cc/300?img=14',
	),
	5 => array(
		'name'        => 'ThS. Đỗ Quang Huy',
		'achievement' => 'Huấn luyện viên đội tuyển Tin học trẻ bảng C nhiều năm liền. Cựu thí sinh Olympic Tin học Quốc gia.',
		'image'       => 'https://i.pravatar.cc/300?img=15',
	),
	6 => array(
		'name'        => 'CN. Vũ Minh Anh',
		'achievement' => 'Chuyên gia luyện thi THPT Quốc gia môn Tin học. Tỷ lệ học sinh đạt điểm 8+ trên 90% qua các năm giảng dạy.',
		'image'       => 'https://i.pravatar.cc/300?img=16',
	),
);

$teachers = array();
for ( $i = 1; $i <= 6; $i++ ) {
	$teachers[] = array(
		'name'        => get_theme_mod( "fablab_teacher_{$i}_name", $teacher_defaults[ $i ]['name'] ),
		'achievement' => get_theme_mod( "fablab_teacher_{$i}_achievement", $teacher_defaults[ $i ]['achievement'] ),
		'image'       => get_theme_mod( "fablab_teacher_{$i}_image", $teacher_defaults[ $i ]['image'] ),
	);
}

// Section 4: experience gallery (Customize → Trang Khóa Học - Hình Ảnh Trải Nghiệm)
// Defaults mirror $gallery_defaults in functions.php (same reasoning as above).
$gallery_defaults = array(
	1 => 'https://images.unsplash.com/photo-1596461404969-9ae70f2830c1?auto=format&fit=crop&w=800&q=80',
	2 => 'https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&w=800&q=80',
	3 => 'https://images.unsplash.com/photo-1581092335397-9583fe92d232?auto=format&fit=crop&w=800&q=80',
	4 => 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=800&q=80',
	5 => 'https://images.unsplash.com/photo-1543269865-cbf427effbad?auto=format&fit=crop&w=800&q=80',
	6 => 'https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?auto=format&fit=crop&w=800&q=80',
	7 => 'https://images.unsplash.com/photo-1485827404703-89b55fcc595e?auto=format&fit=crop&w=800&q=80',
	8 => 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?auto=format&fit=crop&w=800&q=80',
);

$gallery_images = array();
for ( $i = 1; $i <= 8; $i++ ) {
	$gallery_images[] = get_theme_mod( "fablab_gallery_{$i}_image", $gallery_defaults[ $i ] );
}

// Page hero banner (Customize → FabLab Courses Page Banner)
$khoa_hoc_banner_image    = get_theme_mod( 'fablab_khoa_hoc_banner_image', 'https://images.unsplash.com/photo-1503676260728-1c00da094a0b?auto=format&fit=crop&w=1600&q=80' );
$khoa_hoc_banner_title    = get_theme_mod( 'fablab_khoa_hoc_banner_title', 'CHƯƠNG TRÌNH KHÓA HỌC' );
$khoa_hoc_banner_subtitle = get_theme_mod( 'fablab_khoa_hoc_banner_subtitle', 'Các khóa học công nghệ chuẩn hóa BK Holdings dành cho học sinh từ 6 - 18 tuổi' );
?>

<!-- Banner header (full width, editable via Customize → FabLab Courses Page Banner) -->
<div class="fablab-banner" style="background-image: url('<?php echo esc_url( $khoa_hoc_banner_image ); ?>');">
	<div class="fablab-banner-overlay"></div>
	<div class="fablab-banner-content">
		<h1 class="fablab-banner-title"><?php echo esc_html( $khoa_hoc_banner_title ); ?></h1>
		<?php if ( ! empty( $khoa_hoc_banner_subtitle ) ) : ?>
			<p class="fablab-banner-subtitle"><?php echo esc_html( $khoa_hoc_banner_subtitle ); ?></p>
		<?php endif; ?>
		<div class="fablab-banner-divider"></div>
	</div>
</div>

<!-- 1. TỔNG QUAN CHƯƠNG TRÌNH HỌC -->
<section class="pt-16 pb-12 bg-white" id="section-programs-overview">
	<div class="max-w-7xl mx-auto px-4">

		<div class="programs-overview-grid">
			<?php foreach ( $program_overviews as $program ) :
				$term      = get_term_by( 'slug', $program['slug'], 'course_category' );
				$term_link = $term ? get_term_link( $term ) : '';
				$href      = ( $term && ! is_wp_error( $term_link ) ) ? $term_link : home_url( '/khoa-hoc' );
				?>
				<div class="program-card">
					<div class="program-card-image-wrap">
						<img src="<?php echo esc_url( $program['image'] ); ?>" alt="<?php echo esc_attr( $program['name'] ); ?>" referrerpolicy="no-referrer" />
					</div>
					<div class="program-card-body">
						<h3 class="program-card-title"><?php echo esc_html( $program['name'] ); ?></h3>
						<p class="program-card-desc"><?php echo esc_html( $program['description'] ); ?></p>
						<ul class="program-card-highlights">
							<?php foreach ( $program['highlights'] as $highlight ) : ?>
								<li><?php echo fablab_icon( 'check-circle', '' ); ?><span><?php echo esc_html( $highlight ); ?></span></li>
							<?php endforeach; ?>
						</ul>
						<a href="<?php echo esc_url( $href ); ?>" class="program-card-cta">
							Chi tiết <?php echo fablab_icon( 'chevron-right', 'h-3.5 w-3.5' ); ?>
						</a>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- Existing filterable / searchable course catalog (shared with taxonomy-course_category.php) -->


<!-- 2. HÌNH THỨC HỌC -->
<section class="py-14 bg-[#f9fbf9]" id="section-study-format">
	<div class="max-w-7xl mx-auto px-4">
		<div class="text-center mb-10">
			<h2 class="text-2xl md:text-3xl font-black text-gray-900 tracking-tight uppercase">Hình thức học</h2>
			<div class="w-16 h-1 bg-[#f47920] mx-auto rounded-full mt-2"></div>
		</div>

		<div class="study-format-grid">
			<div class="study-format-card">
				<div class="study-format-icon-wrap"><?php echo fablab_icon( 'home', '' ); ?></div>
				<h3 class="study-format-title">Học trực tiếp</h3>
				<ul class="study-format-list">
					<li><?php echo fablab_icon( 'map-pin', '' ); ?><span>Tại FABLAB — Cơ sở 1: <?php echo esc_html( get_theme_mod( 'fablab_contact_address', 'A17 Tạ Quang Bửu, Bạch Mai, Hai Bà Trưng, Hà Nội' ) ); ?></span></li>
					<li><?php echo fablab_icon( 'map-pin', '' ); ?><span>Cơ sở 2: Số 1 Đại Cồ Việt, Hai Bà Trưng, Hà Nội</span></li>
					<li><?php echo fablab_icon( 'check-circle', '' ); ?><span>Tương tác trực tiếp với giáo viên và bạn học, hỗ trợ tức thời</span></li>
					<li><?php echo fablab_icon( 'check-circle', '' ); ?><span>Trải nghiệm đầy đủ trang thiết bị Lab: máy tính, Lego, Arduino, robot...</span></li>
				</ul>
				<a href="#section-trial-register" class="study-format-cta">Đăng ký ngay</a>
			</div>

			<div class="study-format-card">
				<div class="study-format-icon-wrap"><?php echo fablab_icon( 'users', '' ); ?></div>
				<h3 class="study-format-title">Học online</h3>
				<ul class="study-format-list">
					<li><?php echo fablab_icon( 'check-circle', '' ); ?><span>Học online qua nền tảng Zoom/Google Meet, tài liệu số đồng bộ</span></li>
					<li><?php echo fablab_icon( 'check-circle', '' ); ?><span>Học 1 - 1 với giáo viên riêng theo tiến độ cá nhân</span></li>
					<li><?php echo fablab_icon( 'check-circle', '' ); ?><span>Học theo nhóm từ 10 - 12 học viên, vẫn đảm bảo tương tác</span></li>
					<li><?php echo fablab_icon( 'check-circle', '' ); ?><span>Linh hoạt thời gian, học mọi lúc mọi nơi, tiết kiệm di chuyển</span></li>
				</ul>
				<a href="#section-trial-register" class="study-format-cta">Đăng ký ngay</a>
			</div>
		</div>
	</div>
</section>

<!-- 3. ĐỘI NGŨ GIÁO VIÊN -->
<section class="py-14 bg-white" id="section-teachers">
	<div class="max-w-7xl mx-auto px-4">
		<div class="text-center mb-10">
			<h2 class="text-2xl md:text-3xl font-black text-gray-900 tracking-tight uppercase">Đội ngũ giáo viên</h2>
			<div class="w-16 h-1 bg-[#f47920] mx-auto rounded-full mt-2"></div>
		</div>

		<div class="teachers-carousel-wrap">
			<button type="button" class="carousel-arrow-btn carousel-arrow-prev" id="teachers-carousel-prev" aria-label="Giáo viên trước">
				<?php echo fablab_icon( 'chevron-right', '' ); ?>
			</button>

			<div class="teachers-carousel-viewport" id="teachers-carousel-viewport">
				<div class="teachers-carousel-track" id="teachers-carousel-track">
					<?php foreach ( $teachers as $teacher ) :
						if ( empty( $teacher['name'] ) ) {
							continue;
						}
						?>
						<div class="teacher-card">
							<div class="teacher-card-inner">
								<?php if ( ! empty( $teacher['image'] ) ) : ?>
									<div class="teacher-card-photo">
										<img src="<?php echo esc_url( $teacher['image'] ); ?>" alt="<?php echo esc_attr( $teacher['name'] ); ?>" referrerpolicy="no-referrer" />
									</div>
								<?php endif; ?>
								<h3 class="teacher-card-name"><?php echo esc_html( $teacher['name'] ); ?></h3>
								<p class="teacher-card-achievement"><?php echo esc_html( $teacher['achievement'] ); ?></p>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>

			<button type="button" class="carousel-arrow-btn carousel-arrow-next" id="teachers-carousel-next" aria-label="Giáo viên tiếp theo">
				<?php echo fablab_icon( 'chevron-right', '' ); ?>
			</button>
		</div>
	</div>
</section>

<!-- 4. HÌNH ẢNH HỌC TẬP TRẢI NGHIỆM CÙNG FABLAB BÁCH KHOA -->
<section class="py-14 bg-[#f9fbf9]" id="section-experience-gallery">
	<div class="max-w-7xl mx-auto px-4">
		<div class="text-center mb-10">
			<h2 class="text-2xl md:text-3xl font-black text-gray-900 tracking-tight uppercase">Hình ảnh học tập trải nghiệm cùng FABLAB Bách Khoa</h2>
			<div class="w-16 h-1 bg-[#f47920] mx-auto rounded-full mt-2"></div>
		</div>

		<div class="gallery-grid">
			<?php foreach ( $gallery_images as $index => $image ) :
				if ( empty( $image ) ) {
					continue;
				}
				$gallery_alt = 'Hình ảnh trải nghiệm FABLAB Bách Khoa ' . ( $index + 1 );
				?>
				<div class="gallery-item" data-full-image="<?php echo esc_url( $image ); ?>" data-alt="<?php echo esc_attr( $gallery_alt ); ?>">
					<img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $gallery_alt ); ?>" loading="lazy" referrerpolicy="no-referrer" />
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- Shared lightbox modal for the gallery above -->
<div class="gallery-lightbox-modal" id="gallery-lightbox-modal">
	<button type="button" class="gallery-lightbox-close" id="gallery-lightbox-close" aria-label="Đóng">
		<?php echo fablab_icon( 'x', '' ); ?>
	</button>
	<img src="" alt="" id="gallery-lightbox-image" />
</div>

<!-- 5. ĐĂNG KÝ TRẢI NGHIỆM MIỄN PHÍ -->
<section class="py-14 bg-white" id="section-trial-register">
	<div class="max-w-4xl mx-auto px-4">

		<div class="bg-[#ffffff] rounded-3xl p-8 sm:p-10 shadow-xl text-center space-y-6 border border-amber-400 relative overflow-hidden">

			<div class="absolute -right-12 -bottom-12 w-32 h-32 rounded-full bg-[#f47920]/10 blur-md pointer-events-none"></div>
			<div class="absolute -left-12 -top-12 w-32 h-32 rounded-full bg-[#f47920]/10 blur-md pointer-events-none"></div>

			<div class="space-y-2 max-w-xl mx-auto">
				<h2 class="text-2xl md:text-3xl font-black text-gray-900 tracking-tight uppercase">
					Đăng ký trải nghiệm miễn phí
				</h2>
				<p class="text-xs md:text-sm text-gray-800 font-medium">
					Hãy để lại thông tin liên hệ chính xác để chuyên viên tuyển sinh của FABLAB liên hệ sắp xếp buổi học
					thử miễn phí phù hợp cực chất cho bé.
				</p>
			</div>

			<form id="contact-form-khoa-hoc" class="fablab-lead-form max-w-2xl mx-auto space-y-4">
				<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
					<input type="text" id="khoa-hoc-contact-name" name="lead_name" required placeholder="Họ và tên..."
						class="w-full px-5 py-3.5 rounded-full border border-amber-400 focus:border-[#f47920] focus:ring-2 focus:ring-[#f47920]/20 bg-white text-gray-900 placeholder-gray-400 text-sm focus:outline-none text-center font-bold shadow-inner" />
					<input type="text" id="khoa-hoc-contact-info" name="lead_contact" required placeholder="Số điện thoại hoặc Email..."
						class="w-full px-5 py-3.5 rounded-full border border-amber-400 focus:border-[#f47920] focus:ring-2 focus:ring-[#f47920]/20 bg-white text-gray-900 placeholder-gray-400 text-sm focus:outline-none text-center font-bold shadow-inner" />
				</div>

				<div class="pt-2">
					<button type="submit"
						class="px-10 py-3.5 bg-[#f47920] text-white hover:bg-[#df6a17] hover:text-[#ffffff] transition duration-200 font-extrabold text-sm rounded-full shadow-lg inline-flex items-center space-x-2 cursor-pointer uppercase tracking-wider border-2 border-transparent">
						<span>Đăng ký nhận cuộc gọi</span>
					</button>
				</div>
			</form>
			<div class="fablab-lead-success hidden max-w-2xl mx-auto text-center">
				<p class="text-[#f47920] font-extrabold text-lg">✓ Cảm ơn bạn đã đăng ký!</p>
				<p class="text-gray-600 text-sm mt-1">Chuyên viên tuyển sinh của FABLAB sẽ liên hệ lại với bạn trong thời gian sớm nhất.</p>
			</div>

		</div>

	</div>
</section>

<?php
get_footer();
