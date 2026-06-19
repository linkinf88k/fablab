<?php
/**
 * Shared metadata for the 5 course_category terms (slug, display name,
 * representative image, short description, marketing highlights).
 *
 * Used by page-khoa-hoc.php (program overview cards) and
 * taxonomy-course_category.php (roadmap banner), so both pages stay in
 * sync when this copy is edited in one place.
 *
 * @package FabLab
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'fablab_get_program_categories' ) ) {
	function fablab_get_program_categories() {
		return array(
			array(
				'slug'        => 'lap-trinh-ung-dung',
				'name'        => 'Lập trình ứng dụng',
				'image'       => 'https://images.unsplash.com/photo-1526374965328-7f61d4dc18c5?auto=format&fit=crop&w=600&q=80',
				'description' => 'Xây dựng tư duy logic và kỹ năng lập trình nền tảng qua Scratch, Python, Web và Minecraft Coding — phù hợp từ học sinh mới bắt đầu đến nâng cao.',
				'highlights'  => array(
					'Lộ trình từ kéo thả trực quan đến viết code thực tế',
					'Thực hành dự án cá nhân mỗi buổi học',
					'Giáo viên đồng hành hỗ trợ riêng khi cần',
				),
			),
			array(
				'slug'        => 'lap-trinh-thi-dau',
				'name'        => 'Lập trình thi đấu',
				'image'       => 'https://images.unsplash.com/photo-1510074377623-8cf13fb86c08?auto=format&fit=crop&w=600&q=80',
				'description' => 'Bồi dưỡng mũi nhọn tranh tài Tin học trẻ và học sinh giỏi với hệ thống bài tập thuật toán chuẩn cấu trúc đề thi.',
				'highlights'  => array(
					'Bộ đề luyện theo từng bảng thi A/B/C',
					'Rèn phản xạ giải thuật trong môi trường có áp lực thời gian',
					'Giáo viên từng đạt thành tích cao tại các kỳ thi Tin học',
				),
			),
			array(
				'slug'        => 'lap-trinh-game',
				'name'        => 'Lập trình game',
				'image'       => 'https://images.unsplash.com/photo-1580234810907-b40315b76418?auto=format&fit=crop&w=600&q=80',
				'description' => 'Biến ý tưởng thành trò chơi thật với Roblox Studio, Minecraft 3D và Unity — học sinh tự thiết kế nhân vật, màn chơi và cơ chế tương tác.',
				'highlights'  => array(
					'Thực hành trên công cụ chuẩn công nghiệp game',
					'Có sản phẩm game hoàn chỉnh sau mỗi khóa',
					'Phát triển tư duy sáng tạo và kể chuyện qua game',
				),
			),
			array(
				'slug'        => 'stem-ai-robotics',
				'name'        => 'STEM AI Robotics',
				'image'       => 'https://images.unsplash.com/photo-1531746020798-e6953c6e8e04?auto=format&fit=crop&w=600&q=80',
				'description' => 'Kết hợp lắp ráp cơ khí, cảm biến và trí tuệ nhân tạo để chế tạo robot tự hành — từ Lego Junior đến Robotics AI chuyên sâu.',
				'highlights'  => array(
					'Thực hành trên bộ Lego Education và Arduino chính hãng',
					'Tiếp cận AI, thị giác máy tính từ sớm',
					'Rèn kỹ năng làm việc nhóm qua dự án chế tác',
				),
			),
			array(
				'slug'        => 'luyen-thi-thpt',
				'name'        => 'Luyện thi THPT QG',
				'image'       => 'https://images.unsplash.com/photo-1434030216411-0b793f4b4173?auto=format&fit=crop&w=600&q=80',
				'description' => 'Hệ thống hóa toàn bộ kiến thức Tin học trọng tâm, luyện đề chuẩn cấu trúc Bộ GD&ĐT giúp học sinh tự tin đạt điểm cao.',
				'highlights'  => array(
					'Tổng ôn lý thuyết và thực hành bám sát đề thi',
					'Luyện đề định kỳ, chấm và sửa bài chi tiết',
					'Hỗ trợ giải đáp thắc mắc ngoài giờ học',
				),
			),
		);
	}
}

if ( ! function_exists( 'fablab_get_program_category' ) ) {
	/**
	 * Look up a single category's metadata by slug. Returns null if unknown.
	 */
	function fablab_get_program_category( $slug ) {
		foreach ( fablab_get_program_categories() as $category ) {
			if ( $category['slug'] === $slug ) {
				return $category;
			}
		}
		return null;
	}
}
