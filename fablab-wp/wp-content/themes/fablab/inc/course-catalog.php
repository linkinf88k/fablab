<?php
/**
 * Shared course catalog renderer.
 *
 * Included by page-khoa-hoc.php (query-string filtering) and
 * taxonomy-course_category.php (pretty /khoa-hoc/{slug}/ archive URLs).
 * Expects $selected_category ('all' or a course_category term slug) and
 * $search_query to already be set by the including template.
 *
 * @package FabLab
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// 1. Try querying Custom Post Type 'course'
$args = array(
	'post_type'      => 'course',
	'posts_per_page' => -1,
);

if ( $selected_category !== 'all' ) {
	$args['tax_query'] = array(
		array(
			'taxonomy' => 'course_category',
			'field'    => 'slug',
			'terms'    => $selected_category,
		),
	);
}

if ( ! empty( $search_query ) ) {
	$args['s'] = $search_query;
}

$courses_query = new WP_Query( $args );
$courses = array();

if ( $courses_query->have_posts() ) {
	while ( $courses_query->have_posts() ) {
		$courses_query->the_post();

		$course_terms = get_the_terms( get_the_ID(), 'course_category' );
		$course_term  = ( $course_terms && ! is_wp_error( $course_terms ) ) ? $course_terms[0] : null;

		$courses[] = array(
			'id'              => get_the_ID(),
			'name'            => get_the_title(),
			'category'        => $course_term ? $course_term->slug : '',
			'categoryName'    => $course_term ? mb_strtoupper( $course_term->name ) : 'Lập trình',
			'description'     => get_the_excerpt() ?: wp_trim_words( get_the_content(), 20 ),
			'longDescription' => get_post_meta( get_the_ID(), 'long_description', true ) ?: get_the_content(),
			'image'           => get_the_post_thumbnail_url( get_the_ID(), 'large' ) ?: 'https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&w=600&q=80',
			'targetAge'       => get_post_meta( get_the_ID(), 'target_age', true ) ?: 'Mọi lứa tuổi',
			'duration'        => get_post_meta( get_the_ID(), 'duration', true ) ?: '3 tháng',
		);
	}
	wp_reset_postdata();
} else {
	// Fallback mock data if CPT is not yet seeded
	$mock_courses = array(
		array(
			'id' => 'scratch-basic',
			'name' => 'Lập trình Scratch cơ bản',
			'category' => 'lap-trinh-ung-dung',
			'categoryName' => 'LẬP TRÌNH ỨNG DỤNG',
			'description' => 'Khóa học nhập môn lập trình trực quan thông qua kéo thả khối lệnh, kích thích tư duy sáng tạo của học sinh tiểu học.',
			'image' => 'https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&w=600&q=80',
			'targetAge' => '8 - 11 tuổi',
			'duration' => '24 buổi (3 tháng)'
		),
		array(
			'id' => 'minecraft-coding',
			'name' => 'Lập trình Minecraft Coding',
			'category' => 'lap-trinh-ung-dung',
			'categoryName' => 'LẬP TRÌNH ỨNG DỤNG',
			'description' => 'Khôi phục và xây dựng thế giới ảo bằng mã code, học lập trình Python/Java qua thế giới Minecraft đầy sinh động.',
			'image' => 'https://images.unsplash.com/photo-1607604276583-eef5d076aa5f?auto=format&fit=crop&w=600&q=80',
			'targetAge' => '9 - 13 tuổi',
			'duration' => '24 buổi (3 tháng)'
		),
		array(
			'id' => 'python-core',
			'name' => 'Lập trình Python',
			'category' => 'lap-trinh-ung-dung',
			'categoryName' => 'LẬP TRÌNH ỨNG DỤNG',
			'description' => 'Ngôn ngữ lập trình phổ biến bậc nhất hiện nay. Rèn luyện tư duy logic, cấu trúc dữ liệu cơ bản đến xây dựng sản phẩm thực tế.',
			'image' => 'https://images.unsplash.com/photo-1526374965328-7f61d4dc18c5?auto=format&fit=crop&w=600&q=80',
			'targetAge' => '11 - 16 tuổi',
			'duration' => '32 buổi (4 tháng)'
		),
		array(
			'id' => 'web-dev',
			'name' => 'Lập trình Website',
			'category' => 'lap-trinh-ung-dung',
			'categoryName' => 'LẬP TRÌNH ỨNG DỤNG',
			'description' => 'Tự tay thiết kế và lập trình giao diện trang web với HTML5, CSS3 và JavaScript căn bản.',
			'image' => 'https://images.unsplash.com/photo-1547658719-2f1d87fc08b8?auto=format&fit=crop&w=600&q=80',
			'targetAge' => '12 - 18 tuổi',
			'duration' => '32 buổi (4 tháng)'
		),
		array(
			'id' => 'tin-hoc-tre-a',
			'name' => 'Luyện thi Tin học trẻ bảng A',
			'category' => 'lap-trinh-thi-dau',
			'categoryName' => 'LẬP TRÌNH THI ĐẤU',
			'description' => 'Chương trình chuyên biệt bồi dưỡng kiến thức Scratch & Python nâng cao phục vụ cho cuộc thi Tin học trẻ Toàn quốc bảng A.',
			'image' => 'https://images.unsplash.com/photo-1506784983877-45594efa4cbe?auto=format&fit=crop&w=600&q=80',
			'targetAge' => 'Học sinh Tiểu học (Lớp 3 - 5)',
			'duration' => '40 buổi'
		),
		array(
			'id' => 'tin-hoc-tre-b',
			'name' => 'Luyện thi Tin học trẻ bảng B',
			'category' => 'lap-trinh-thi-dau',
			'categoryName' => 'LẬP TRÌNH THI ĐẤU',
			'description' => 'Đào tạo giải bài toán tư duy thuật toán, cấu trúc dữ liệu bằng Python học sinh THCS thi bảng B Tin học trẻ.',
			'image' => 'https://images.unsplash.com/photo-1517842645767-c639042777db?auto=format&fit=crop&w=600&q=80',
			'targetAge' => 'Học sinh THCS (Lớp 6 - 9)',
			'duration' => '40 buổi'
		),
		array(
			'id' => 'tin-hoc-tre-c',
			'name' => 'Luyện thi Tin học trẻ bảng C',
			'category' => 'lap-trinh-thi-dau',
			'categoryName' => 'LẬP TRÌNH THI ĐẤU',
			'description' => 'Khóa ôn luyện chuyên sâu ngôn ngữ C++/Python, rèn luyện tư duy thuật toán tối ưu cho học sinh THPT bảng C.',
			'image' => 'https://images.unsplash.com/photo-1618401471353-b98aedd07871?auto=format&fit=crop&w=600&q=80',
			'targetAge' => 'Học sinh THPT (Lớp 10 - 12)',
			'duration' => '48 buổi'
		),
		array(
			'id' => 'on-hsg-thpt',
			'name' => 'Ôn thi HSG cấp THPT',
			'category' => 'lap-trinh-thi-dau',
			'categoryName' => 'LẬP TRÌNH THI ĐẤU',
			'description' => 'Chương trình học thuật mũi nhọn, tập trung cấu trúc dữ liệu lớn, đồ thị, quy hoạch động luyện thi HSG Tin học cấp Tỉnh/Thành phố và Quốc gia.',
			'image' => 'https://images.unsplash.com/photo-1510074377623-8cf13fb86c08?auto=format&fit=crop&w=600&q=80',
			'targetAge' => 'Lớp 10 - 12 (Tuyển chọn học thuật)',
			'duration' => '60 buổi'
		),
		array(
			'id' => 'game-basic',
			'name' => 'Lập trình game cơ bản',
			'category' => 'lap-trinh-game',
			'categoryName' => 'LẬP TRÌNH GAME',
			'description' => 'Học sinh làm quen với nguyên lý phát triển game 2D, kéo thả nhân vật và lập trình logic chuyển động.',
			'image' => 'https://images.unsplash.com/photo-1550745165-9bc0b252726f?auto=format&fit=crop&w=600&q=80',
			'targetAge' => '8 - 11 tuổi',
			'duration' => '24 buổi (3 tháng)'
		),
		array(
			'id' => 'game-3d-minecraft',
			'name' => 'Lập trình game 3D Minecraft',
			'category' => 'lap-trinh-game',
			'categoryName' => 'LẬP TRÌNH GAME',
			'description' => 'Tạo lập các kịch bản game nhập vai 3D hoành tráng trong không gian Minecraft huyền thoại.',
			'image' => 'https://images.unsplash.com/photo-1511512578047-dfb367046420?auto=format&fit=crop&w=600&q=80',
			'targetAge' => '10 - 14 tuổi',
			'duration' => '24 buổi'
		),
		array(
			'id' => 'roblox-studio',
			'name' => 'Roblox Studio',
			'category' => 'lap-trinh-game',
			'categoryName' => 'LẬP TRÌNH GAME',
			'description' => 'Học lập trình mã nguồn mở với ngôn ngữ Lua, xây dựng thế giới game 3D độc đáo trên nền tảng Roblox.',
			'image' => 'https://images.unsplash.com/photo-1585647347384-2593bc35786b?auto=format&fit=crop&w=600&q=80',
			'targetAge' => '10 - 15 tuổi',
			'duration' => '24 buổi'
		),
		array(
			'id' => 'unity-pro',
			'name' => 'Lập trình game chuyên nghiệp với Unity',
			'category' => 'lap-trinh-game',
			'categoryName' => 'LẬP TRÌNH GAME',
			'description' => 'Trải nghiệm tạo lập và lập trình các tựa game 3D đỉnh cao sử dụng C# và công cụ Unity Engine chuẩn công nghiệp.',
			'image' => 'https://images.unsplash.com/photo-1580234810907-b40315b76418?auto=format&fit=crop&w=600&q=80',
			'targetAge' => '13 - 18 tuổi',
			'duration' => '36 buổi'
		),
		array(
			'id' => 'lego-junior',
			'name' => 'Lego Junior',
			'category' => 'stem-ai-robotics',
			'categoryName' => 'STEM AI ROBOTICS',
			'description' => 'Học tập lắp ráp các mô hình chuyển động từ bộ công cụ Lego Education, giúp phát triển nhận thức không gian và kỹ năng cơ năng.',
			'image' => 'https://images.unsplash.com/photo-1533709752509-1e343ac01b00?auto=format&fit=crop&w=600&q=80',
			'targetAge' => '5 - 7 tuổi',
			'duration' => '24 buổi'
		),
		array(
			'id' => 'lego-wedo2',
			'name' => 'Lego Wedo',
			'category' => 'stem-ai-robotics',
			'categoryName' => 'STEM AI ROBOTICS',
			'description' => 'Kết hợp lắp ráp cơ khí và lập trình kéo thả trực quan điều khiển cảm biến, mô tơ di chuyển.',
			'image' => 'https://images.unsplash.com/photo-1561557944-6e7860d1a7eb?auto=format&fit=crop&w=600&q=80',
			'targetAge' => '7 - 10 tuổi',
			'duration' => '24 buổi'
		),
		array(
			'id' => 'stem-advanced',
			'name' => 'Lập trình nâng cao',
			'category' => 'stem-ai-robotics',
			'categoryName' => 'STEM AI ROBOTICS',
			'description' => 'Chương trình robot lập trình C/C++ cải tiến nâng tầm kỹ năng cho học sinh giỏi kỹ thuật.',
			'image' => 'https://images.unsplash.com/photo-1485827404703-89b55fcc595e?auto=format&fit=crop&w=600&q=80',
			'targetAge' => '11 - 15 tuổi',
			'duration' => '32 buổi'
		),
		array(
			'id' => 'automation-prod',
			'name' => 'Lập trình tự động hóa sản phẩm',
			'category' => 'stem-ai-robotics',
			'categoryName' => 'STEM AI ROBOTICS',
			'description' => 'Nghiên cứu nguyên lý cảm biến và băng chuyền nhà máy thông minh thu nhỏ, thiết lập chuỗi tự động hóa.',
			'image' => 'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?auto=format&fit=crop&w=600&q=80',
			'targetAge' => '12 - 16 tuổi',
			'duration' => '32 buổi'
		),
		array(
			'id' => 'arduino-maker',
			'name' => 'Lập trình arduino',
			'category' => 'stem-ai-robotics',
			'categoryName' => 'STEM AI ROBOTICS',
			'description' => 'Thiết kế mạch điện tử thông minh, tự tay viết mã điều khiển vi mạch Arduino UNO chế tạo sản phẩm hữu dụng.',
			'image' => 'https://images.unsplash.com/photo-1517055720730-0766a6248e77?auto=format&fit=crop&w=600&q=80',
			'targetAge' => '11 - 18 tuổi',
			'duration' => '32 buổi'
		),
		array(
			'id' => 'robot-ai-high',
			'name' => 'Robotics AI cho học sinh THPT',
			'category' => 'stem-ai-robotics',
			'categoryName' => 'STEM AI ROBOTICS',
			'description' => 'Giới thiệu trí tuệ nhân tạo (AI), thị giác máy tính và xử lý hình ảnh ứng dụng trong các siêu robot tự hành.',
			'image' => 'https://images.unsplash.com/photo-1531746020798-e6953c6e8e04?auto=format&fit=crop&w=600&q=80',
			'targetAge' => 'Học sinh THPT (Lớp 10 - 12)',
			'duration' => '36 buổi'
		),
		array(
			'id' => 'luyen-thi-thpt',
			'name' => 'Luyện thi THPT Quốc Gia môn Tin học',
			'category' => 'luyen-thi-thpt',
			'categoryName' => 'LUYỆN THI THPT QUỐC GIA',
			'description' => 'Toàn bộ kiến thức trọng tâm lý thuyết, thực hành máy tính chuẩn đề thi của Bộ GD&ĐT giúp học sinh đạt điểm cao.',
			'image' => 'https://images.unsplash.com/photo-1434030216411-0b793f4b4173?auto=format&fit=crop&w=600&q=80',
			'targetAge' => 'Học sinh lớp 12',
			'duration' => '32 buổi'
		)
	);

	// Filter mock data locally
	foreach ( $mock_courses as $mc ) {
		$category_match = ( $selected_category === 'all' ) || ( $mc['category'] === $selected_category );
		$search_match = empty( $search_query ) ||
						( stripos( $mc['name'], $search_query ) !== false ) ||
						( stripos( $mc['description'], $search_query ) !== false );

		if ( $category_match && $search_match ) {
			$courses[] = $mc;
		}
	}
}

$categories = array(
	array( 'value' => 'all', 'label' => 'TẤT CẢ KHÓA HỌC' ),
	array( 'value' => 'lap-trinh-ung-dung', 'label' => 'LẬP TRÌNH ỨNG DỤNG' ),
	array( 'value' => 'lap-trinh-thi-dau', 'label' => 'LẬP TRÌNH THI ĐẤU' ),
	array( 'value' => 'lap-trinh-game', 'label' => 'LẬP TRÌNH GAME' ),
	array( 'value' => 'stem-ai-robotics', 'label' => 'STEM AI ROBOTICS' ),
	array( 'value' => 'luyen-thi-thpt', 'label' => 'LUYỆN THI THPT' ),
);
?>

<div class="pt-24 pb-16 bg-[#f9fbf9] animate-fadeIn" id="courses-catalog-page">
	<div class="max-w-7xl mx-auto px-4 space-y-10">

		<!-- Header Title -->
		<div class="text-center space-y-2">
			<span class="text-xs font-black uppercase tracking-widest text-[#f47920] py-1 px-3 bg-[#f47920]/5 rounded-md">Chương trình chuẩn hóa BK Holdings</span>
			<h1 class="text-3xl sm:text-4xl font-extrabold text-neutral-900">CHƯƠNG TRÌNH KHÓA HỌC TIÊU BIỂU</h1>
			<p class="text-xs sm:text-sm text-gray-500 max-w-xl mx-auto">Các khóa học được xây dựng có cấu trúc lộ trình từ Đen đến Vàng, phù hợp sự hiếu kỳ khám phá khoa học của từng lứa tuổi học sinh.</p>
			<div class="w-16 h-1 bg-[#f47920] mx-auto rounded-full mt-3"></div>
		</div>

		<!-- Filters control block -->
		<div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5 space-y-4">
			<form method="get" action="<?php echo esc_url( home_url( '/khoa-hoc' ) ); ?>" class="flex flex-col md:flex-row items-center justify-between gap-4">

				<!-- Search Input bar -->
				<div class="relative w-full md:max-w-md">
					<?php echo fablab_icon( 'search', 'absolute left-3 top-1/2 -translate-y-1/2 h-4 w-4 text-gray-400' ); ?>
					<input
						type="text"
						name="s"
						value="<?php echo esc_attr( $search_query ); ?>"
						placeholder="Tìm kiếm tên khóa học, môn học..."
						class="w-full pl-10 pr-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm text-gray-800 focus:outline-none focus:border-[#f47920] focus:bg-white transition"
						id="search-course-input"
					/>
					<?php if ( $selected_category !== 'all' ) : ?>
						<input type="hidden" name="category" value="<?php echo esc_attr( $selected_category ); ?>" />
					<?php endif; ?>
				</div>

				<!-- Total Indicator -->
				<div class="text-xs text-gray-500 font-medium">
					Hiển thị <span class="font-extrabold text-[#f47920]"><?php echo count( $courses ); ?></span> khóa học công nghệ
				</div>

			</form>

			<!-- Categories Grid selectors (link to real /khoa-hoc/{slug}/ taxonomy archives) -->
			<div class="flex flex-wrap gap-2.5 pt-1.5" id="categories-filter-rail">
				<?php foreach ( $categories as $cat ) :
					if ( $cat['value'] === 'all' ) {
						$cat_href = home_url( '/khoa-hoc' );
					} else {
						$cat_term = get_term_by( 'slug', $cat['value'], 'course_category' );
						$cat_link = $cat_term ? get_term_link( $cat_term ) : '';
						$cat_href = ( $cat_term && ! is_wp_error( $cat_link ) ) ? $cat_link : home_url( '/khoa-hoc' );
					}
					?>
					<a
						href="<?php echo esc_url( $cat_href ); ?>"
						class="cursor-pointer px-4 py-2 rounded-lg text-xs font-bold tracking-wide transition-all text-decoration-none <?php echo ( $selected_category === $cat['value'] ) ? 'bg-[#f47920] text-[#ffffff] shadow-sm' : 'bg-gray-100 text-gray-600 hover:bg-gray-200 hover:text-[#f47920]'; ?>"
						id="cat-filter-<?php echo esc_attr( $cat['value'] ); ?>"
					>
						<?php echo esc_html( $cat['label'] ); ?>
					</a>
				<?php endforeach; ?>
			</div>
		</div>

		<!-- Courses list results rendering -->
		<?php if ( count( $courses ) > 0 ) : ?>
			<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="catalog-courses-grid">
				<?php foreach ( $courses as $course ) : ?>
					<div
						class="group bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col justify-between overflow-hidden cursor-pointer course-card-item"
						data-course-id="<?php echo esc_attr( $course['id'] ); ?>"
						id="catalog-card-<?php echo esc_attr( $course['id'] ); ?>"
					>
						<div>
							<div class="relative aspect-video rounded-t-2xl overflow-hidden bg-gray-100">
								<img
									src="<?php echo esc_url( $course['image'] ); ?>"
									alt="<?php echo esc_attr( $course['name'] ); ?>"
									class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
									referrerpolicy="no-referrer"
								/>
								<div class="absolute top-3 left-3 px-2.5 py-1 bg-[#f47920] text-white text-[10px] font-extrabold rounded-md uppercase">
									<?php echo esc_html( $course['categoryName'] ); ?>
								</div>
							</div>

							<div class="p-6 space-y-3.5">
								<div class="flex items-center space-x-2 text-[10px] uppercase font-bold tracking-wider text-[#f47920]/80 bg-[#f47920]/5 py-1 px-2.5 rounded-full w-max">
									<?php echo fablab_icon( 'shield-check', 'h-3.5 w-3.5' ); ?>
									<span><?php echo esc_html( $course['categoryName'] ); ?></span>
								</div>

								<h3 class="text-lg font-extrabold text-gray-900 group-hover:text-[#f47920] transition-colors leading-snug line-clamp-1">
									<?php echo esc_html( $course['name'] ); ?>
								</h3>

								<p class="text-gray-500 text-xs sm:text-sm line-clamp-2 leading-relaxed min-h-[40px]">
									<?php echo esc_html( $course['description'] ); ?>
								</p>
							</div>
						</div>

						<div class="px-6 pb-6 pt-4 border-t border-gray-50 flex items-center justify-between bg-slate-50">
							<div class="text-xs text-slate-500 space-y-0.5">
								<p>Độ tuổi: <strong class="text-slate-800"><?php echo esc_html( $course['targetAge'] ); ?></strong></p>
								<p>Thời lượng: <strong class="text-slate-800"><?php echo esc_html( $course['duration'] ); ?></strong></p>
							</div>
							<button
								class="px-4 py-2 bg-[#f47920]/10 text-[#f47920] font-bold text-xs rounded-lg group-hover:bg-[#f47920] group-hover:text-white transition-all shadow-sm"
							>
								Xem chi tiết
							</button>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		<?php else : ?>
			<div class="text-center py-12 bg-white rounded-2xl border border-dashed border-gray-200">
				<?php echo fablab_icon( 'help-circle', 'h-12 w-12 text-gray-400 mx-auto' ); ?>
				<h3 class="font-extrabold text-lg mt-3 text-neutral-800">Không tìm thấy khóa học phù hợp</h3>
				<p class="text-sm text-gray-500 max-w-sm mx-auto mt-1">Quý phụ huynh vui lòng điều chỉnh bộ lọc hoặc nhập từ khóa tìm kiếm khác để khám phá lớp học.</p>
				<a
					href="<?php echo esc_url( home_url( '/khoa-hoc' ) ); ?>"
					class="mt-4 inline-block px-4 py-2 bg-[#f47920] text-white font-bold text-xs rounded-lg hover:bg-neutral-800 transition text-decoration-none"
				>
					Reset bộ lọc
				</a>
			</div>
		<?php endif; ?>

	</div>
</div>
