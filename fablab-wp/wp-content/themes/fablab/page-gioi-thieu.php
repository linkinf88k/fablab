<?php
/**
 * Template Name: About Page
 *
 * @package FabLab
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$about_banner_image    = get_theme_mod( 'fablab_about_banner_image', 'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?auto=format&fit=crop&w=1600&q=80' );
$about_banner_title    = get_theme_mod( 'fablab_about_banner_title', 'VỀ FABLAB BÁCH KHOA' );
$about_banner_subtitle = get_theme_mod( 'fablab_about_banner_subtitle', 'Thành viên hệ sinh thái chuyển giao công nghệ BK Holdings - HUST' );

// Use the Page editor content if the admin has filled it in; otherwise fall back to the sample sections below.
$about_editor_content = '';
if ( have_posts() ) {
	the_post();
	$about_editor_content = trim( get_the_content() );
}
?>

<!-- Banner header (full width, image + title/subtitle editable via Customize → FabLab About Page Banner) -->
<div class="fablab-banner" style="background-image: url('<?php echo esc_url( $about_banner_image ); ?>');">
	<div class="fablab-banner-overlay"></div>
	<div class="fablab-banner-content">
		<span class="fablab-banner-eyebrow">Trang giới thiệu chính thức</span>
		<h1 class="fablab-banner-title"><?php echo esc_html( $about_banner_title ); ?></h1>
		<p class="fablab-banner-subtitle"><?php echo esc_html( $about_banner_subtitle ); ?></p>
		<div class="fablab-banner-divider"></div>
	</div>
</div>

<div class="pt-16 pb-16 bg-white animate-fadeIn" id="about-page">
	<div class="max-w-7xl mx-auto px-4 space-y-16">

		<?php if ( ! empty( $about_editor_content ) ) : ?>

		<!-- Nội dung lấy từ Page Editor (Trang > Giới thiệu) -->
		<div class="page-editor-content">
			<?php echo apply_filters( 'the_content', $about_editor_content ); ?>
		</div>

		<?php else : ?>

		<!-- Section 1: TỔNG QUAN -->
		<div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
			<div class="lg:col-span-5 rounded-2xl overflow-hidden shadow-lg border border-gray-100 aspect-[4/3] bg-gray-100">
				<img 
					src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=800&q=80" 
					alt="Học sinh tại FABLAB" 
					class="w-full h-full object-cover"
					referrerpolicy="no-referrer"
				/>
			</div>
			<div class="lg:col-span-7 space-y-6">
				<h2 class="text-2xl md:text-3xl font-black text-slate-900 flex items-center space-x-2">
					<span class="text-[#f47920]">1.</span> 
					<span>TỔNG QUAN HÌNH THÀNH & TẦM NHÌN</span>
				</h2>
				<div class="space-y-4 text-sm text-gray-700 leading-relaxed font-normal">
					<p>
						<strong>FABLAB Bách Khoa (BK Holdings)</strong> là trung tâm sáng chế mở được đầu tư xây dựng bài bản nhằm khơi dậy tư duy sáng tạo khoa học công nghệ, kỹ năng STEM và tư duy lập trình chuyên sâu cho thế hệ trẻ từ 5 đến 18 tuổi. 
					</p>
					<p>
						Trực thuộc hệ sinh thái số hóa chuyển giao kỹ thuật của <strong>BK Holdings - Đại học Bách Khoa Hà Nội</strong>, chúng tôi tự hào mang đến môi trường học tập lý thuyết đi đôi với thực hành thiết kế chế tác (Maker space). Học sinh của FABLAB không chỉ học gõ code thụ động mà còn được học cách tự tay gia công mô hình vật lý bằng máy in 3D, cắt CNC, lập trình cảm biến robot điều khiển thế giới xung quanh.
					</p>
					<p>
						Tầm nhìn dài hạn của chúng tôi là đưa giáo dục STEM chất lượng cao của Ivy League tiếp cận rộng rãi trẻ em Việt Nam, chuẩn bị hành trang kiến thức vững vàng sẵn sàng cho kỷ nguyên Robot và Trí Tuệ Nhân Tạo (AI) bùng nổ.
					</p>
				</div>
				<div class="flex flex-wrap gap-4 pt-2">
					<div class="bg-[#f47920]/5 rounded-xl p-3 border border-[#f47920]/10 text-xs">
						<span class="font-extrabold text-[#f47920] block">Học tập thực tiễn</span>
						<span class="text-gray-600">80% nội dung là thực hành, lập trình và lắp ghép robot thực tế.</span>
					</div>
					<div class="bg-[#ffffff]/10 rounded-xl p-3 border border-[#ffffff]/30 text-xs">
						<span class="font-extrabold text-[#f47920] block">Chứng chỉ chuẩn BK</span>
						<span class="text-gray-600">Cấp giấy chứng nhận đóng dấu đỏ từ BK Holdings uy tín.</span>
					</div>
				</div>
			</div>
		</div>

		<!-- Section 2: HOẠT ĐỘNG CHÍNH -->
		<div class="bg-slate-50 rounded-3xl p-8 sm:p-12 border border-slate-100 space-y-8">
			<div class="text-center space-y-2">
				<h2 class="text-2xl md:text-3xl font-black text-slate-900">
					2. HOẠT ĐỘNG CHÍNH TẠI TRUNG TÂM
				</h2>
				<p class="text-gray-500 text-xs sm:text-sm">Xây dựng ba trụ cột đào tạo và hỗ trợ giúp trẻ phát triển toàn diện tối đa kỹ năng số.</p>
			</div>

			<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
				
				<!-- Tru cot 1 -->
				<div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm space-y-4">
					<div class="w-11 h-11 bg-[#f47920] text-[#ffffff] rounded-xl flex items-center justify-center font-black">01</div>
					<h3 class="text-lg font-extrabold text-gray-900">Đào Tạo Lập Trình & Sáng Tạo STEM</h3>
					<p class="text-xs text-gray-500 leading-relaxed font-normal">
						Các chương trình giáo dục định hướng từ cơ bản (Scratch, Lego Junior, Minecraft) đến chuyên ngành nâng cao (Python, Arduino, Unity, Robotics AI). Kết hợp hoàn hảo lý thuyết thuật toán và thiết kế thực tế.
					</p>
				</div>

				<!-- Tru cot 2 -->
				<div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm space-y-4">
					<div class="w-11 h-11 bg-[#f47920] text-[#ffffff] rounded-xl flex items-center justify-center font-black">02</div>
					<h3 class="text-lg font-extrabold text-gray-900">Bồi Dưỡng Mũi Nhọn Thi Đấu Quốc Gia</h3>
					<p class="text-xs text-gray-500 leading-relaxed font-normal">
						Các lớp luyện thi Tin học trẻ Toàn quốc (Bảng A, B, C) và bồi dưỡng Học sinh Giỏi cấp Trường/Thành phố/Quốc gia. Học viên cọ xát trực tiếp với đề thi thuật toán khó dưới sự hướng dẫn của các kỷ lục gia Tin học Bách Khoa.
					</p>
				</div>

				<!-- Tru cot 3 -->
				<div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm space-y-4">
					<div class="w-11 h-11 bg-[#f47920] text-[#ffffff] rounded-xl flex items-center justify-center font-black">03</div>
					<h3 class="text-lg font-extrabold text-gray-900">Sân Chơi Ngoại Khóa & Chế Tác</h3>
					<p class="text-xs text-gray-500 leading-relaxed font-normal">
						Tổ chức các cuộc thi chế tạo Hackathon mùa hè, các câu lạc bộ Robot thi đấu Robocon quốc tế, tạo cơ hội cho học sinh tự sáng tác dự án khoa học hữu ích cho trường học và gia đình.
					</p>
				</div>

			</div>
		</div>

		<!-- Section 3: CHƯƠNG TRÌNH HỢP TÁC TRỌNG TÂM -->
		<div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
			<div class="lg:col-span-7 space-y-6">
				<h2 class="text-2xl md:text-3xl font-black text-slate-900">
					3. CHƯƠNG TRÌNH HỢP TÁC CHIẾN LƯỢC
				</h2>
				<div class="space-y-4 text-sm text-gray-750 leading-relaxed font-normal">
					<p>
						FABLAB Bách Khoa không ngừng hợp tác đa phương cùng các tổ chức công nghệ hàng đầu toàn cầu và các trường học phổ thông chất lượng cao trên cả nước. 
					</p>
					<p>
						Chúng tôi vinh dự hợp tác chiến lược cùng <strong>Lego Education Đan Mạch</strong>, <strong>Samsung Vina</strong> và các viện nghiên cứu thuộc trường Đại học tại Singapore để chuyển tải giáo án tiên tiến, đồng thời tài trợ trang bị máy in 3D và linh kiện IoT cho các bạn học sinh nghiên cứu kỹ thuật.
					</p>
					<p>
						Hằng năm, thông qua các chương trình <strong>BK-STEM Cup</strong> hợp tác tài trợ, hàng trăm gói học bổng toàn phần đã được trao đến các bé có hoàn cảnh khó khăn ham học hỏi, giúp việc học công nghệ trở nên công bằng và mở rộng cơ hội phát triển tương lai.
					</p>
				</div>
				<div>
					<a href="<?php echo esc_url( home_url( '/#section-contact' ) ); ?>" class="inline-block px-6 py-3 bg-[#f47920] text-[#ffffff] hover:bg-neutral-800 hover:text-white font-extrabold text-xs rounded-lg transition text-decoration-none">
						ĐĂNG KÝ HỌC THỬ MIỄN PHÍ TRỰC TIẾP TẠI LAB
					</a>
				</div>
			</div>
			<div class="lg:col-span-5 rounded-2xl overflow-hidden shadow-lg border border-gray-100 aspect-[4/3] bg-gray-100">
				<img
					src="https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?auto=format&fit=crop&w=800&q=80"
					alt="Hợp tác đào tạo"
					class="w-full h-full object-cover"
					referrerpolicy="no-referrer"
				/>
			</div>
		</div>

		<?php endif; ?>

	</div>
</div>

<?php
get_footer();
