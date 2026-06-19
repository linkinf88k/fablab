<?php
/**
 * Template Name: News Catalog
 *
 * @package FabLab
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

// Fetch filtering parameters
$selected_category = isset( $_GET['category'] ) ? sanitize_text_field( $_GET['category'] ) : 'all';

// 1. Try querying standard WordPress posts
$args = array(
	'post_type'      => 'post',
	'posts_per_page' => -1,
);

if ( $selected_category !== 'all' ) {
	$args['category_name'] = $selected_category;
}

$news_query = new WP_Query( $args );
$news_posts = array();

if ( $news_query->have_posts() ) {
	while ( $news_query->have_posts() ) {
		$news_query->the_post();
		
		// Get post categories
		$categories = get_the_category();
		$category_slug = ! empty( $categories ) ? $categories[0]->slug : 'tin-tuc';
		$category_name = ! empty( $categories ) ? $categories[0]->name : 'Tin tức';

		$news_posts[] = array(
			'id'            => get_the_ID(),
			'title'          => get_the_title(),
			'category'      => $category_slug,
			'categoryName'  => mb_strtoupper( $category_name ),
			'summary'       => get_the_excerpt() ?: wp_trim_words( get_the_content(), 25 ),
			'content'       => get_the_content(),
			'date'          => get_the_date( 'd/m/Y' ),
			'image'         => get_the_post_thumbnail_url( get_the_ID(), 'large' ) ?: 'https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?auto=format&fit=crop&w=600&q=80',
		);
	}
	wp_reset_postdata();
} else {
	// Fallback mock data if standard posts are not yet seeded
	$mock_news = array(
		array(
			'id' => 'coop-1',
			'title' => 'Hợp tác chiến lược đào tạo STEM giữa FABLAB và Đại học Bách Khoa Hà Nội',
			'category' => 'chuong-trinh-hop-tac',
			'categoryName' => 'CHƯƠNG TRÌNH HỢP TÁC',
			'summary' => 'FABLAB Bách Khoa và BK Holdings chính thức chuyển giao phát triển học cụ thông minh thế hệ mới, liên kết Lab nghiên cứu.',
			'content' => 'Buổi lễ ký kết có sự dự khán của đại diện Đại học Bách Khoa Hà Nội và lãnh đạo BK Holdings. FABLAB cam kết hỗ trợ toàn bộ phần nghiên cứu lắp đặt trang thiết bị tự động hóa tiên tiến cùng kế hoạch chuyển giao giáo trình giảng dạy STEM Robotics tối tân cho học sinh phổ thông.',
			'date' => '10/06/2026',
			'image' => 'https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?auto=format&fit=crop&w=600&q=80'
		),
		array(
			'id' => 'coop-2',
			'title' => 'Phát động Giải đấu Robotics quốc tế BK-STEM Cup năm 2026',
			'category' => 'chuong-trinh-hop-tac',
			'categoryName' => 'CHƯƠNG TRÌNH HỢP TÁC',
			'summary' => 'Sự kiện thường niên do FABLAB Bách Khoa phối hợp cùng các đối tác công nghệ Samsung & BK Holdings đồng hành tổ chức.',
			'content' => 'Giải thi đấu mở ra cơ hội thể hiện tài năng sáng tạo công nghệ STEM lý thú cho hơn 500 đội thi toàn miền Bắc. Đội thắng cuộc sẽ nhận gói học bổng huấn luyện tại nước ngoài và toàn quyền chế tác sản phẩm robot trong FABLAB Bách Khoa.',
			'date' => '02/06/2026',
			'image' => 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=600&q=80'
		),
		array(
			'id' => 'coop-3',
			'title' => 'Chương trình đưa lập trình Python vào giảng dạy cho 20 trường THCS chất lượng cao',
			'category' => 'chuong-trinh-hop-tac',
			'categoryName' => 'CHƯƠNG TRÌNH HỢP TÁC',
			'summary' => 'Dự án phổ cập khoa học máy tính và rèn rũa tư duy dữ liệu miễn phí kéo dài 6 tháng được FABLAB bảo trợ tài trợ học liệu.',
			'content' => 'Đoàn giảng viên nòng cốt tốt nghiệp từ Bách Khoa phát động biên soạn lại giáo trình chuẩn hóa toàn ngành công nghê thông tin cho bậc học trung học cơ sở, hướng tiếp cận giải bài tập thực tiễn bằng lập trình Python đơn giản, dễ nhớ.',
			'date' => '28/05/2026',
			'image' => 'https://images.unsplash.com/photo-1524178232363-1fb2b075b655?auto=format&fit=crop&w=600&q=80'
		),
		array(
			'id' => 'internal-1',
			'title: ' => 'Sôi nổi cuộc thi nội bộ FABLAB Hackathon - Mùa hè Sáng tạo',
			'title' => 'Sôi nổi cuộc thi nội bộ FABLAB Hackathon - Mùa hè Sáng tạo',
			'category' => 'hoat-dong-noi-bo',
			'categoryName' => 'HOẠT ĐỘNG NỘI BỘ',
			'summary: ' => 'Các em học sinh các lớp Robotics cùng nhau tranh tài thiết kế robot phân loại rác thải bảo vệ môi trường khu vực Hồ Gươm.',
			'summary' => 'Các em học sinh các lớp Robotics cùng nhau tranh tài thiết kế robot phân loại rác thải bảo vệ môi trường khu vực Hồ Gươm.',
			'content' => 'Trải qua 24 giờ hack không ngủ, những mô hình sáng tạo ấn tượng từ bìa các tông hữu cơ kết hợp cảm biến siêu âm Arduino của các bé đã giành giải nhất tuyệt đối, thể hiện tư duy kết nối kỹ năng sống cao của học viên FABLAB.',
			'date' => '08/06/2026',
			'image' => 'https://images.unsplash.com/photo-1515187029135-18ee286d815b?auto=format&fit=crop&w=600&q=80'
		),
		array(
			'id' => 'internal-2',
			'title' => 'Lễ tổng kết khóa học lập trình Scratch & Minecraft Mùa xuân 2026 rực rỡ',
			'category' => 'hoat-dong-noi-bo',
			'categoryName' => 'HOẠT ĐỘNG NỘI BỘ',
			'summary' => 'Hơn 120 học viên nhỏ tuổi được trao chứng chỉ tốt nghiệp từ BK Holdings cùng những tiếng cười rộn rã hạnh phúc.',
			'content' => 'Sự kiện có sự chúc mừng đồng hành của đông đảo giáo viên, quý phụ huynh cùng xem lại đoạn video demo trò chơi độc quyền do chính các bé tự tay thiết kế sau khóa học 3 tháng ngắn ngủi.',
			'date' => '20/05/2026',
			'image' => 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?auto=format&fit=crop&w=600&q=80'
		),
		array(
			'id' => 'internal-3',
			'title' => 'Hoạt động nâng cao nghiệp vụ sư phạm STEM, kỹ năng đứng lớp cho giáo viên FABLAB',
			'category' => 'hoat-dong-noi-bo',
			'categoryName' => 'HOẠT ĐỘNG NỘI BỘ',
			'summary' => 'Khóa huấn luyện kỹ năng truyền cảm hứng, thấu hiểu tâm lý trẻ em và phương pháp học tập đảo ngược (Flipped Classroom).',
			'content' => 'FABLAB Bách Khoa luôn chú trọng chất lượng giảng dạy hàng đầu. Khoá đào tạo chuyên sâu tháng 5 mời các thạc sĩ tâm lý giáo dưỡng từ Đại học Sư Phạm dẫn dắt thực hành xử lý tình huống nâng cao trải nghiệm giảng dạy hứng thú nhất.',
			'date' => '15/05/2026',
			'image' => 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=600&q=80'
		)
	);

	// Filter mock data locally
	foreach ( $mock_news as $mn ) {
		if ( $selected_category === 'all' || $mn['category'] === $selected_category ) {
			$news_posts[] = $mn;
		}
	}
}
?>

<div class="pt-24 pb-16 bg-[#f9fbf9] animate-fadeIn" id="news-catalog-page">
	<div class="max-w-7xl mx-auto px-4 space-y-12">
		
		<!-- Title layout -->
		<div class="text-center space-y-2">
			<span class="text-[#f47920] font-extrabold uppercase tracking-widest text-xs py-1 px-3 bg-[#f47920]/5 rounded-sm">Thông tin chính thống</span>
			<h1 class="text-3xl sm:text-4xl font-extrabold text-slate-905">TIN TỨC HOẠT ĐỘNG - SỰ KIỆN</h1>
			<p class="max-w-2xl mx-auto text-gray-500 text-xs sm:text-sm">Nơi tổng hợp thông tin về các cuộc thi công nghệ quốc tế, hoạt động nội khối sáng tạo và chương trình chuyển giao của FABLAB.</p>
			<div class="w-16 h-1 bg-[#f47920] mx-auto rounded-full mt-3"></div>
		</div>

		<!-- Categorization controls -->
		<div class="flex justify-center space-x-2" id="news-sub-filter-rail">
			<a
				href="<?php echo esc_url( home_url( '/tin-tuc' ) ); ?>"
				class="cursor-pointer px-6 py-2.5 rounded-full text-xs font-bold transition text-decoration-none <?php echo ( $selected_category === 'all' ) ? 'bg-[#f47920] text-[#ffffff] shadow' : 'bg-white text-gray-600 hover:bg-gray-150 border border-gray-150'; ?>"
			>
				Tất cả bài viết
			</a>
			<a
				href="<?php echo esc_url( add_query_arg( 'category', 'chuong-trinh-hop-tac', home_url( '/tin-tuc' ) ) ); ?>"
				class="cursor-pointer px-6 py-2.5 rounded-full text-xs font-bold transition text-decoration-none <?php echo ( $selected_category === 'chuong-trinh-hop-tac' ) ? 'bg-[#f47920] text-[#ffffff] shadow' : 'bg-white text-gray-600 hover:bg-gray-150 border border-gray-150'; ?>"
			>
				Chương trình hợp tác
			</a>
			<a
				href="<?php echo esc_url( add_query_arg( 'category', 'hoat-dong-noi-bo', home_url( '/tin-tuc' ) ) ); ?>"
				class="cursor-pointer px-6 py-2.5 rounded-full text-xs font-bold transition text-decoration-none <?php echo ( $selected_category === 'hoat-dong-noi-bo' ) ? 'bg-[#f47920] text-[#ffffff] shadow' : 'bg-white text-gray-600 hover:bg-gray-150 border border-gray-150'; ?>"
			>
				Hoạt động nội bộ
			</a>
		</div>

		<!-- Feed render layout -->
		<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="news-feed-grid">
			<?php foreach ( $news_posts as $news ) : ?>
				<div 
					class="group bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col justify-between overflow-hidden cursor-pointer news-card-item"
					data-news-id="<?php echo esc_attr( $news['id'] ); ?>"
					id="feed-card-<?php echo esc_attr( $news['id'] ); ?>"
				>
					<div>
						<div class="relative aspect-video rounded-t-2xl overflow-hidden bg-gray-100">
							<img 
								src="<?php echo esc_url( $course['image'] ); // Wait, it's $news['image']! let's use esc_url($news['image']) ?>" 
								src="<?php echo esc_url( $news['image'] ); ?>" 
								alt="<?php echo esc_attr( $news['title'] ); ?>" 
								class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
								referrerpolicy="no-referrer"
							/>
							<div class="absolute top-3 left-3 px-2.5 py-1 bg-[#ffffff] text-[#f47920] text-[10px] font-bold rounded-md">
								<?php echo esc_html( $news['categoryName'] ); ?>
							</div>
						</div>

						<div class="p-6 space-y-3">
							<div class="text-xs text-gray-400">
								<span>Đã đăng: <strong><?php echo esc_html( $news['date'] ); ?></strong></span>
							</div>
							<h3 class="text-base font-extrabold text-gray-900 group-hover:text-[#f47920] transition-colors leading-snug line-clamp-2 min-h-[44px]">
								<?php echo esc_html( $news['title'] ); ?>
							</h3>
							<p class="text-gray-600 text-xs sm:text-sm line-clamp-3 leading-relaxed">
								<?php echo esc_html( $news['summary'] ); ?>
							</p>
						</div>
					</div>

					<div class="px-6 pb-6 pt-4 border-t border-gray-50 flex items-center justify-between bg-slate-50">
						<span class="text-xs text-[#f47920] font-bold uppercase group-hover:underline">
							Đọc toàn văn bài viết
						</span>
						<span class="text-gray-400 text-xs">Phóng viên BK</span>
					</div>
				</div>
			<?php endforeach; ?>
		</div>

	</div>
</div>

<?php
get_footer();
