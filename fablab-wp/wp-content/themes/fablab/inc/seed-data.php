<?php
/**
 * One-time seeder for the 26 demo `course` posts and 6 demo news `post`s.
 *
 * Run via WP-CLI (recommended):
 *   wp eval-file wp-content/themes/fablab/inc/seed-data.php --allow-root
 *
 * Or trigger from wp-admin:
 *   Tools → FabLab Seed Data (requires manage_options).
 *
 * Safe to run more than once: it skips any course/post whose title already
 * exists, and records completion in the `fablab_seed_data_done` option.
 * Delete that option to force a re-run.
 *
 * @package FabLab
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! defined( 'FABLAB_SEED_DATA_LOADED' ) ) {
	define( 'FABLAB_SEED_DATA_LOADED', true );

	/**
	 * Source: fablab/src/data.ts -> courses
	 */
	function fablab_seed_courses_data() {
		return array(
			array( 'name' => 'Lập trình Scratch cơ bản', 'category_slug' => 'lap-trinh-ung-dung', 'category_name' => 'LẬP TRÌNH ỨNG DỤNG', 'description' => 'Khóa học nhập môn lập trình trực quan thông qua kéo thả khối lệnh, kích thích tư duy sáng tạo của học sinh tiểu học.', 'long_description' => 'Khóa học lập trình Scratch cơ bản được thiết kế đặc biệt dành riêng cho trẻ từ 8-11 tuổi. Trẻ sẽ được nhập môn với các kiến thức lập trình cơ bản như biến số, vòng lặp, câu lệnh điều kiện thông qua việc xây dựng các trò chơi tương tác, truyện tranh hoạt hình trực quan. Đây là bước đệm tuyệt vời để hình thành tư duy thuật toán tự nhiên trước khi tiếp xúc với ngôn ngữ lập trình dạng text.', 'image' => 'https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&w=600&q=80', 'target_age' => '8 - 11 tuổi', 'duration' => '24 buổi (3 tháng)' ),
			array( 'name' => 'Lập trình Minecraft Coding', 'category_slug' => 'lap-trinh-ung-dung', 'category_name' => 'LẬP TRÌNH ỨNG DỤNG', 'description' => 'Khôi phục và xây dựng thế giới ảo bằng mã code, học lập trình Python/Java qua thế giới Minecraft đầy sinh động.', 'long_description' => 'Sự kết hợp hoàn hảo giữa trò chơi yêu thích Minecraft và khoa học máy tính. Học sinh sẽ được viết code điều khiển các nhân vật, tự động xây dựng kiến trúc phức tạp trong thế giới 3D của Minecraft, đồng thời làm quen với thuật toán đồ họa học tập không nhàm chán.', 'image' => 'https://images.unsplash.com/photo-1607604276583-eef5d076aa5f?auto=format&fit=crop&w=600&q=80', 'target_age' => '9 - 13 tuổi', 'duration' => '24 buổi (3 tháng)' ),
			array( 'name' => 'Lập trình Python', 'category_slug' => 'lap-trinh-ung-dung', 'category_name' => 'LẬP TRÌNH ỨNG DỤNG', 'description' => 'Ngôn ngữ lập trình phổ biến bậc nhất hiện nay. Rèn luyện tư duy logic, cấu trúc dữ liệu cơ bản đến xây dựng sản phẩm thực tế.', 'long_description' => 'Python là ngôn ngữ lập trình mạnh mẽ, cấu trúc rõ ràng và dễ học. Học sinh THCS sẽ được học từ kiến thức nền tảng như kiểu dữ liệu, mảng, định nghĩa hàm cho đến tiếp cận phân tích dữ liệu cơ bản và lập trình hướng đối tượng cơ bản.', 'image' => 'https://images.unsplash.com/photo-1526374965328-7f61d4dc18c5?auto=format&fit=crop&w=600&q=80', 'target_age' => '11 - 16 tuổi', 'duration' => '32 buổi (4 tháng)' ),
			array( 'name' => 'Lập trình Website', 'category_slug' => 'lap-trinh-ung-dung', 'category_name' => 'LẬP TRÌNH ỨNG DỤNG', 'description' => 'Tự tay thiết kế và lập trình giao diện trang web với HTML5, CSS3 và JavaScript căn bản.', 'long_description' => 'Nắm vững cách thức hoạt động của Internet và thế giới web. Học sinh sẽ tự tay viết mã các trang web cá nhân hay blog, tạo hiệu ứng chuyển động mượt mà và làm quen với các khái niệm thiết kế đáp ứng (Responsive) hiện đại.', 'image' => 'https://images.unsplash.com/photo-1547658719-2f1d87fc08b8?auto=format&fit=crop&w=600&q=80', 'target_age' => '12 - 18 tuổi', 'duration' => '32 buổi (4 tháng)' ),

			array( 'name' => 'Luyện thi Tin học trẻ bảng A', 'category_slug' => 'lap-trinh-thi-dau', 'category_name' => 'LẬP TRÌNH THI ĐẤU', 'description' => 'Chương trình chuyên biệt bồi dưỡng kiến thức Scratch & Python nâng cao phục vụ cho cuộc thi Tin học trẻ Toàn quốc bảng A.', 'long_description' => 'Chương trình bồi dưỡng chuyên biệt bám sát định dạng cấu trúc đề thi Tin học trẻ bảng A cấp trường, quận, tỉnh và toàn quốc. Giúp học sinh làm quen với áp lực phòng thi, giải các bài toán về số học, hình học phẳng phức tạp bằng Scratch một cách tối ưu nhất.', 'image' => 'https://images.unsplash.com/photo-1506784983877-45594efa4cbe?auto=format&fit=crop&w=600&q=80', 'target_age' => 'Học sinh Tiểu học (Lớp 3 - 5)', 'duration' => '40 buổi' ),
			array( 'name' => 'Luyện thi Tin học trẻ bảng B', 'category_slug' => 'lap-trinh-thi-dau', 'category_name' => 'LẬP TRÌNH THI ĐẤU', 'description' => 'Đào tạo giải bài toán tư duy thuật toán, cấu trúc dữ liệu bằng Python học sinh THCS thi bảng B Tin học trẻ.', 'long_description' => 'Chúng tôi giúp học sinh THCS rèn luyện khả năng tư duy giải thuật tốt, ứng dụng tối đa sức mạnh của ngôn ngữ Python hoặc C++ để giải bài toán về xử lý chuỗi, mảng động, cấu trúc lưu trữ và tối ưu hóa thời gian chạy nhằm đem lại kết quả tối đa.', 'image' => 'https://images.unsplash.com/photo-1517842645767-c639042777db?auto=format&fit=crop&w=600&q=80', 'target_age' => 'Học sinh THCS (Lớp 6 - 9)', 'duration' => '40 buổi' ),
			array( 'name' => 'Luyện thi Tin học trẻ bảng C', 'category_slug' => 'lap-trinh-thi-dau', 'category_name' => 'LẬP TRÌNH THI ĐẤU', 'description' => 'Khóa ôn luyện chuyên sâu ngôn ngữ C++/Python, rèn luyện tư duy thuật toán tối ưu cho học sinh THPT bảng C.', 'long_description' => 'Khai thác triệt để các dạng đề thi cấp tỉnh và toàn quốc bảng C. Học viên được hệ thống hóa các dạng thuật toán căn bản và nâng cao: duyệt, quy hoạch động, thuật toán đồ thị cơ bản, hình học tính toán và các kỹ thuật tối ưu hóa mã nguồn hiệu quả.', 'image' => 'https://images.unsplash.com/photo-1618401471353-b98aedd07871?auto=format&fit=crop&w=600&q=80', 'target_age' => 'Học sinh THPT (Lớp 10 - 12)', 'duration' => '48 buổi' ),
			array( 'name' => 'Ôn thi HSG cấp THPT', 'category_slug' => 'lap-trinh-thi-dau', 'category_name' => 'LẬP TRÌNH THI ĐẤU', 'description' => 'Chương trình học thuật mũi nhọn, tập trung cấu trúc dữ liệu lớn, đồ thị, quy hoạch động luyện thi HSG Tin học cấp Tỉnh/Thành phố và Quốc gia.', 'long_description' => 'Được thiết kế cho học viên có đam mê học thuật mãnh liệt. Khóa học mang cấp độ đại học giới thiệu các cấu trúc dữ liệu nâng cao như Cây phân đoạn (Segment Tree), Cây chỉ số nhị phân (Fenwick/BIT), các kỹ thuật quy hoạch động nâng cao và xử lý truy vấn trực tuyến/ngoại tuyến hiệu suất cao.', 'image' => 'https://images.unsplash.com/photo-1510074377623-8cf13fb86c08?auto=format&fit=crop&w=600&q=80', 'target_age' => 'Lớp 10 - 12 (Tuyển chọn học thuật)', 'duration' => '60 buổi' ),

			array( 'name' => 'Lập trình game cơ bản', 'category_slug' => 'lap-trinh-game', 'category_name' => 'LẬP TRÌNH GAME', 'description' => 'Học sinh làm quen với nguyên lý phát triển game 2D, kéo thả nhân vật và lập trình logic chuyển động.', 'long_description' => 'Ở khóa này, các bé sẽ được tiếp cận với lý thuyết thiết kế game: vòng lặp game, phát hiện va chạm, tạo điểm số, thanh máu và cách cấu trúc một màn chơi tuyệt hảo. Giáo trình sử dụng trực quan giúp học sinh hứng thú sáng tác.', 'image' => 'https://images.unsplash.com/photo-1550745165-9bc0b252726f?auto=format&fit=crop&w=600&q=80', 'target_age' => '8 - 11 tuổi', 'duration' => '24 buổi (3 tháng)' ),
			array( 'name' => 'Lập trình game 3D Minecraft', 'category_slug' => 'lap-trinh-game', 'category_name' => 'LẬP TRÌNH GAME', 'description' => 'Tạo lập các kịch bản game nhập vai 3D hoành tráng trong không gian Minecraft huyền thoại.', 'long_description' => 'Khám phá sâu hơn vào lập trình 3D thông qua nền tảng thế giới Minecraft. Học viên học khái niệm về hệ tọa độ 3 chiều (X, Y, Z), lập trình kiến tạo hầm ngục, Boss chiến và lập trình tương tác vật lý sống động.', 'image' => 'https://images.unsplash.com/photo-1511512578047-dfb367046420?auto=format&fit=crop&w=600&q=80', 'target_age' => '10 - 14 tuổi', 'duration' => '24 buổi' ),
			array( 'name' => 'Roblox Studio', 'category_slug' => 'lap-trinh-game', 'category_name' => 'LẬP TRÌNH GAME', 'description' => 'Học lập trình mã nguồn mở với ngôn ngữ Lua, xây dựng thế giới game 3D độc đáo trên nền tảng Roblox.', 'long_description' => 'Sử dụng công cụ chính thức Roblox Studio và lập trình ngôn ngữ Lua chuyên nghiệp. Học viên học cách tạo dựng địa hình, tạo mô hình 3D, lập trình thuộc tính nhân vật, cửa hàng vật phẩm ảo và cách đăng tải game thu hút hàng nghìn người chơi.', 'image' => 'https://images.unsplash.com/photo-1585647347384-2593bc35786b?auto=format&fit=crop&w=600&q=80', 'target_age' => '10 - 15 tuổi', 'duration' => '24 buổi' ),
			array( 'name' => 'Lập trình game chuyên nghiệp với Unity', 'category_slug' => 'lap-trinh-game', 'category_name' => 'LẬP TRÌNH GAME', 'description' => 'Trải nghiệm tạo lập và lập trình các tựa game 3D đỉnh cao sử dụng C# và công cụ Unity Engine chuẩn công nghiệp.', 'long_description' => 'Khóa học đỉnh cao cho các bạn muốn phát triển nghề nghiệp thiết kế game. Học viên sẽ được đào tạo sử dụng Unity Engine chuyên sâu, viết script bằng ngôn ngữ C#, làm quen với Animation State Machines, hệ thống ánh sáng, UI Canvas và vật lý không gian thời gian thực.', 'image' => 'https://images.unsplash.com/photo-1580234810907-b40315b76418?auto=format&fit=crop&w=600&q=80', 'target_age' => '13 - 18 tuổi', 'duration' => '36 buổi' ),

			array( 'name' => 'Lego Junior', 'category_slug' => 'stem-ai-robotics', 'category_name' => 'STEM AI ROBOTICS', 'description' => 'Học tập lắp ráp các mô hình chuyển động từ bộ công cụ Lego Education, giúp phát triển nhận thức không gian và kỹ năng cơ năng.', 'long_description' => 'Lớp học vui nhộn giúp nâng cao vận động tinh và tư duy không gian đa chiều. Các em học sinh nhỏ tuổi tự tin sáng chế lắp ghép các cơ cấu máy cơ từ đơn giản đến phức tạp như ròng rọc, đòn bẩy, bánh răng chuyển hướng truyền lực.', 'image' => 'https://images.unsplash.com/photo-1533709752509-1e343ac01b00?auto=format&fit=crop&w=600&q=80', 'target_age' => '5 - 7 tuổi', 'duration' => '24 buổi' ),
			array( 'name' => 'Lego Wedo', 'category_slug' => 'stem-ai-robotics', 'category_name' => 'STEM AI ROBOTICS', 'description' => 'Kết hợp lắp ráp cơ khí và lập trình kéo thả trực quan điều khiển cảm biến, mô tơ di chuyển.', 'long_description' => 'Tiến thêm một bước vào thế giới robot thông minh, Lego WeDo kết hợp giữa xây dựng thực thể cơ khí và lập trình chuyển động. Khóa học dạy cách nhận biết cảm biến khoảng cách, cảm biến độ nghiêng để robot biết phản ứng thông minh với tác động từ ngoài.', 'image' => 'https://images.unsplash.com/photo-1561557944-6e7860d1a7eb?auto=format&fit=crop&w=600&q=80', 'target_age' => '7 - 10 tuổi', 'duration' => '24 buổi' ),
			array( 'name' => 'Lập trình nâng cao', 'category_slug' => 'stem-ai-robotics', 'category_name' => 'STEM AI ROBOTICS', 'description' => 'Chương trình robot lập trình C/C++ cải tiến nâng tầm kỹ năng cho học sinh giỏi kỹ thuật.', 'long_description' => 'Học lập trình kết hợp tư duy giải thuật với các cấu phần robot phức tạp. Học viên học cách ghi nhận tín hiệu đa kênh đồng thời, phản hồi vòng lặp khép kín PID giúp định hướng chuyển động robot mượt mà tinh vi nhất.', 'image' => 'https://images.unsplash.com/photo-1485827404703-89b55fcc595e?auto=format&fit=crop&w=600&q=80', 'target_age' => '11 - 15 tuổi', 'duration' => '32 buổi' ),
			array( 'name' => 'Lập trình tự động hóa sản phẩm', 'category_slug' => 'stem-ai-robotics', 'category_name' => 'STEM AI ROBOTICS', 'description' => 'Nghiên cứu nguyên lý cảm biến và băng chuyền nhà máy thông minh thu nhỏ, thiết lập chuỗi tự động hóa.', 'long_description' => 'Khóa học hướng nghiệp độc đáo giới thiệu nguyên lý của Cách mạng Công nghiệp 4.0. Học sinh nghiên cứu xây dựng băng tải tự động phân loại màu sắc sản phẩm, cảm biến tiệm cận, xy-lanh khí nén mô hình thông minh.', 'image' => 'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?auto=format&fit=crop&w=600&q=80', 'target_age' => '12 - 16 tuổi', 'duration' => '32 buổi' ),
			array( 'name' => 'Lập trình arduino', 'category_slug' => 'stem-ai-robotics', 'category_name' => 'STEM AI ROBOTICS', 'description' => 'Thiết kế mạch điện tử thông minh, tự tay viết mã điều khiển vi mạch Arduino UNO chế tạo sản phẩm hữu dụng.', 'long_description' => 'Học viên làm quen với kiến thức điện điện tử nền tảng (công thức Ohm, điện trở, bóng LED, rơ-le) kết hợp lập trình vi điều khiển Arduino bằng ngôn ngữ C++. Chế tạo các hệ thống smarthome sáng tạo như tự tưới cây, đèn bật tắt khi có người.', 'image' => 'https://images.unsplash.com/photo-1517055720730-0766a6248e77?auto=format&fit=crop&w=600&q=80', 'target_age' => '11 - 18 tuổi', 'duration' => '32 buổi' ),
			array( 'name' => 'Robotics AI cho học sinh THPT', 'category_slug' => 'stem-ai-robotics', 'category_name' => 'STEM AI ROBOTICS', 'description' => 'Giới thiệu trí tuệ nhân tạo (AI), thị giác máy tính và xử lý hình ảnh ứng dụng trong các siêu robot tự hành.', 'long_description' => 'Khoá học đón đầu xu thế thời đại công nghệ mới. Các bạn học sinh THPT được làm quen với trí tuệ nhân tạo thông qua ngôn ngữ Python và vi máy tính Jetson Nano/Raspberry Pi. Thực hiện huấn luyện mô hình học máy nhận diện cử chỉ, xử lý ảnh camera thời gian thực để dẫn đường robot tự lái tránh chướng ngại vật.', 'image' => 'https://images.unsplash.com/photo-1531746020798-e6953c6e8e04?auto=format&fit=crop&w=600&q=80', 'target_age' => 'Học sinh THPT (Lớp 10 - 12)', 'duration' => '36 buổi' ),

			array( 'name' => 'Luyện thi THPT Quốc Gia môn Tin học', 'category_slug' => 'luyen-thi-thpt', 'category_name' => 'LUYỆN THI THPT QUỐC GIA', 'description' => 'Toàn bộ kiến thức trọng tâm lý thuyết, thực hành máy tính chuẩn đề thi của Bộ GD&ĐT giúp học sinh đạt điểm cao.', 'long_description' => 'Khóa học cung cấp lộ trình tổng ôn tóm gọn lý thuyết mạng máy tính, cơ sở dữ liệu (MS Access/MySQL), hệ điều hành và kỹ năng giải toán thực hành bằng Pascal/C++ bám sát phân phối đề thi THPT QG của Bộ Giáo dục. Tối ưu hóa điểm số và lấy lại căn bản toàn diện.', 'image' => 'https://images.unsplash.com/photo-1434030216411-0b793f4b4173?auto=format&fit=crop&w=600&q=80', 'target_age' => 'Học sinh lớp 12', 'duration' => '32 buổi' ),
		);
	}

	/**
	 * Source: fablab/src/data.ts -> newsPosts
	 */
	function fablab_seed_news_data() {
		return array(
			array( 'title' => 'Hợp tác chiến lược đào tạo STEM giữa FABLAB và Đại học Bách Khoa Hà Nội', 'category_slug' => 'chuong-trinh-hop-tac', 'category_name' => 'Chương trình hợp tác', 'summary' => 'FABLAB Bách Khoa và BK Holdings chính thức chuyển giao phát triển học cụ thông minh thế hệ mới, liên kết Lab nghiên cứu.', 'content' => 'Buổi lễ ký kết có sự dự khán của đại diện Đại học Bách Khoa Hà Nội và lãnh đạo BK Holdings. FABLAB cam kết hỗ trợ toàn bộ phần nghiên cứu lắp đặt trang thiết bị tự động hóa tiên tiến cùng kế hoạch chuyển giao giáo trình giảng dạy STEM Robotics tối tân cho học sinh phổ thông.', 'date' => '2026-06-10', 'image' => 'https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?auto=format&fit=crop&w=600&q=80' ),
			array( 'title' => 'Phát động Giải đấu Robotics quốc tế BK-STEM Cup năm 2026', 'category_slug' => 'chuong-trinh-hop-tac', 'category_name' => 'Chương trình hợp tác', 'summary' => 'Sự kiện thường niên do FABLAB Bách Khoa phối hợp cùng các đối tác công nghệ Samsung & BK Holdings đồng hành tổ chức.', 'content' => 'Giải thi đấu mở ra cơ hội thể hiện tài năng sáng tạo công nghệ STEM lý thú cho hơn 500 đội thi toàn miền Bắc. Đội thắng cuộc sẽ nhận gói học bổng huấn luyện tại nước ngoài và toàn quyền chế tác sản phẩm robot trong FABLAB Bách Khoa.', 'date' => '2026-06-02', 'image' => 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=600&q=80' ),
			array( 'title' => 'Chương trình đưa lập trình Python vào giảng dạy cho 20 trường THCS chất lượng cao', 'category_slug' => 'chuong-trinh-hop-tac', 'category_name' => 'Chương trình hợp tác', 'summary' => 'Dự án phổ cập khoa học máy tính và rèn rũa tư duy dữ liệu miễn phí kéo dài 6 tháng được FABLAB bảo trợ tài trợ học liệu.', 'content' => 'Đoàn giảng viên nòng cốt tốt nghiệp từ Bách Khoa phát động biên soạn lại giáo trình chuẩn hóa toàn ngành công nghệ thông tin cho bậc học trung học cơ sở, hướng tiếp cận giải bài tập thực tiễn bằng lập trình Python đơn giản, dễ nhớ.', 'date' => '2026-05-28', 'image' => 'https://images.unsplash.com/photo-1524178232363-1fb2b075b655?auto=format&fit=crop&w=600&q=80' ),
			array( 'title' => 'Sôi nổi cuộc thi nội bộ FABLAB Hackathon - Mùa hè Sáng tạo', 'category_slug' => 'hoat-dong-noi-bo', 'category_name' => 'Hoạt động nội bộ', 'summary' => 'Các em học sinh các lớp Robotics cùng nhau tranh tài thiết kế robot phân loại rác thải bảo vệ môi trường khu vực Hồ Gươm.', 'content' => 'Trải qua 24 giờ hack không ngủ, những mô hình sáng tạo ấn tượng từ bìa các tông hữu cơ kết hợp cảm biến siêu âm Arduino của các bé đã giành giải nhất tuyệt đối, thể hiện tư duy kết nối kỹ năng sống cao của học viên FABLAB.', 'date' => '2026-06-08', 'image' => 'https://images.unsplash.com/photo-1515187029135-18ee286d815b?auto=format&fit=crop&w=600&q=80' ),
			array( 'title' => 'Lễ tổng kết khóa học lập trình Scratch & Minecraft Mùa xuân 2026 rực rỡ', 'category_slug' => 'hoat-dong-noi-bo', 'category_name' => 'Hoạt động nội bộ', 'summary' => 'Hơn 120 học viên nhỏ tuổi được trao chứng chỉ tốt nghiệp từ BK Holdings cùng những tiếng cười rộn rã hạnh phúc.', 'content' => 'Sự kiện có sự chúc mừng đồng hành của đông đảo giáo viên, quý phụ huynh cùng xem lại đoạn video demo trò chơi độc quyền do chính các bé tự tay thiết kế sau khóa học 3 tháng ngắn ngủi.', 'date' => '2026-05-20', 'image' => 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?auto=format&fit=crop&w=600&q=80' ),
			array( 'title' => 'Hoạt động nâng cao nghiệp vụ sư phạm STEM, kỹ năng đứng lớp cho giáo viên FABLAB', 'category_slug' => 'hoat-dong-noi-bo', 'category_name' => 'Hoạt động nội bộ', 'summary' => 'Khóa huấn luyện kỹ năng truyền cảm hứng, thấu hiểu tâm lý trẻ em và phương pháp học tập đảo ngược (Flipped Classroom).', 'content' => 'FABLAB Bách Khoa luôn chú trọng chất lượng giảng dạy hàng đầu. Khoá đào tạo chuyên sâu tháng 5 mời các thạc sĩ tâm lý giáo dưỡng từ Đại học Sư Phạm dẫn dắt thực hành xử lý tình huống nâng cao trải nghiệm giảng dạy hứng thú nhất.', 'date' => '2026-05-15', 'image' => 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=600&q=80' ),
		);
	}

	/**
	 * Download a remote image and set it as the post's featured image.
	 * Failures are non-fatal: templates already fall back to a default
	 * Unsplash URL when no thumbnail is set.
	 */
	function fablab_seed_attach_image( $post_id, $image_url, $description ) {
		if ( empty( $image_url ) ) {
			return;
		}

		if ( ! function_exists( 'media_sideload_image' ) ) {
			require_once ABSPATH . 'wp-admin/includes/media.php';
			require_once ABSPATH . 'wp-admin/includes/file.php';
			require_once ABSPATH . 'wp-admin/includes/image.php';
		}

		$media_id = media_sideload_image( $image_url, $post_id, $description, 'id' );

		if ( ! is_wp_error( $media_id ) ) {
			set_post_thumbnail( $post_id, $media_id );
		}
	}

	/**
	 * Run the seed. Returns a human-readable log string.
	 */
	function fablab_seed_run() {
		if ( get_option( 'fablab_seed_data_done' ) ) {
			return 'FabLab seed data already ran on ' . get_option( 'fablab_seed_data_done' ) . '. Delete the "fablab_seed_data_done" option to re-run.';
		}

		$log = array();

		foreach ( fablab_seed_courses_data() as $course ) {
			if ( get_page_by_title( $course['name'], OBJECT, 'course' ) ) {
				$log[] = "Skipped (exists): {$course['name']}";
				continue;
			}

			$post_id = wp_insert_post( array(
				'post_type'    => 'course',
				'post_title'   => $course['name'],
				'post_excerpt' => $course['description'],
				'post_content' => $course['long_description'],
				'post_status'  => 'publish',
			) );

			if ( is_wp_error( $post_id ) || ! $post_id ) {
				$log[] = "FAILED: {$course['name']}";
				continue;
			}

			wp_set_object_terms( $post_id, $course['category_slug'], 'course_category' );
			update_post_meta( $post_id, 'long_description', $course['long_description'] );
			update_post_meta( $post_id, 'target_age', $course['target_age'] );
			update_post_meta( $post_id, 'duration', $course['duration'] );

			fablab_seed_attach_image( $post_id, $course['image'], $course['name'] );

			$log[] = "Course created: {$course['name']} (#{$post_id})";
		}

		foreach ( fablab_seed_news_data() as $news ) {
			if ( get_page_by_title( $news['title'], OBJECT, 'post' ) ) {
				$log[] = "Skipped (exists): {$news['title']}";
				continue;
			}

			$term = term_exists( $news['category_slug'], 'category' );
			if ( ! $term ) {
				$term = wp_insert_term( $news['category_name'], 'category', array( 'slug' => $news['category_slug'] ) );
			}
			$term_id = 0;
			if ( ! is_wp_error( $term ) ) {
				$term_id = is_array( $term ) ? $term['term_id'] : $term;
			}

			$post_id = wp_insert_post( array(
				'post_type'     => 'post',
				'post_title'    => $news['title'],
				'post_excerpt'  => $news['summary'],
				'post_content'  => $news['content'],
				'post_status'   => 'publish',
				'post_date'     => $news['date'] . ' 09:00:00',
				'post_category' => $term_id ? array( $term_id ) : array(),
			) );

			if ( is_wp_error( $post_id ) || ! $post_id ) {
				$log[] = "FAILED: {$news['title']}";
				continue;
			}

			fablab_seed_attach_image( $post_id, $news['image'], $news['title'] );

			$log[] = "News post created: {$news['title']} (#{$post_id})";
		}

		update_option( 'fablab_seed_data_done', current_time( 'mysql' ) );

		return implode( "\n", $log );
	}

	/**
	 * Admin-triggered entry point: Tools → FabLab Seed Data.
	 */
	function fablab_seed_register_admin_page() {
		add_management_page(
			__( 'FabLab Seed Data', 'fablab' ),
			__( 'FabLab Seed Data', 'fablab' ),
			'manage_options',
			'fablab-seed-data',
			'fablab_seed_render_admin_page'
		);
	}
	add_action( 'admin_menu', 'fablab_seed_register_admin_page' );

	function fablab_seed_render_admin_page() {
		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}

		$result = '';
		if ( isset( $_POST['fablab_seed_nonce'] ) && wp_verify_nonce( wp_unslash( $_POST['fablab_seed_nonce'] ), 'fablab_seed_data' ) ) {
			$result = fablab_seed_run();
		}
		?>
		<div class="wrap">
			<h1><?php esc_html_e( 'FabLab Seed Data', 'fablab' ); ?></h1>
			<p><?php esc_html_e( 'Creates the 26 demo courses and 6 demo news posts from the original data.ts content. Safe to click only once — re-running is a no-op unless the "fablab_seed_data_done" option is deleted.', 'fablab' ); ?></p>
			<form method="post">
				<?php wp_nonce_field( 'fablab_seed_data', 'fablab_seed_nonce' ); ?>
				<?php submit_button( __( 'Run Seed', 'fablab' ) ); ?>
			</form>
			<?php if ( $result ) : ?>
				<pre style="background:#fff;border:1px solid #ccd0d4;padding:12px;max-width:800px;white-space:pre-wrap;"><?php echo esc_html( $result ); ?></pre>
			<?php endif; ?>
		</div>
		<?php
	}
}

// WP-CLI entry point: `wp eval-file wp-content/themes/fablab/inc/seed-data.php`
if ( defined( 'WP_CLI' ) && WP_CLI ) {
	WP_CLI::log( fablab_seed_run() );
}
