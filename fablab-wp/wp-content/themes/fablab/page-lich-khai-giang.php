<?php
/**
 * Template Name: Schedule Page
 *
 * @package FabLab
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$schedulesData = array(
	array( 'id' => 'sc-1', 'name' => 'Lập trình Scratch cơ bản', 'code' => 'SCR-B01', 'date' => '21/06/2026', 'time' => 'Chiều thứ 7 (14h00-16h00) & Sáng Chủ Nhật (8h30-10h30)', 'age' => '8-11 tuổi' ),
	array( 'id' => 'sc-2', 'name' => 'Minecraft Coding sáng tạo', 'code' => 'MIN-C02', 'date' => '22/06/2026', 'time' => 'Sáng thứ 7 (9h00 - 11h00)', 'age' => '9-13 tuổi' ),
	array( 'id' => 'sc-3', 'name' => 'Lập trình Python chuyên sâu', 'code' => 'PYT-P01', 'date' => '25/06/2026', 'time' => 'Tối thứ 3 & tối thứ 5 (18h30-20h30)', 'age' => '11-16 tuổi' ),
	array( 'id' => 'sc-4', 'name' => 'Robotics Arduino thông minh', 'code' => 'ARD-A03', 'date' => '27/06/2026', 'time' => 'Chiều thứ 7 (16h00 - 18h00)', 'age' => '11-18 tuổi' ),
	array( 'id' => 'sc-5', 'name' => 'Roblox Studio (Lập trình Lua)', 'code' => 'ROB-R01', 'date' => '28/06/2026', 'time' => 'Sáng Chủ Nhật (8h30 - 11h00)', 'age' => '10-15 tuổi' ),
	array( 'id' => 'sc-6', 'name' => 'Luyện thi Tin học trẻ Bảng A', 'code' => 'THT-A05', 'date' => '30/06/2026', 'time' => 'Chiều thứ 7 & Chiều Chủ nhật (14h00-16h00)', 'age' => 'Lớp 3-5' ),
);

// Page hero banner (Customize → FabLab Schedule Page Banner)
$lkg_banner_image    = get_theme_mod( 'fablab_lich_khai_giang_banner_image', 'https://images.unsplash.com/photo-1524178232363-1fb2b075b655?auto=format&fit=crop&w=1600&q=80' );
$lkg_banner_title    = get_theme_mod( 'fablab_lich_khai_giang_banner_title', 'LỊCH KHAI GIẢNG KHÓA MỚI 2026' );
$lkg_banner_subtitle = get_theme_mod( 'fablab_lich_khai_giang_banner_subtitle', 'Lịch khai giảng định kỳ hằng tuần tại hai cơ sở đào tạo của FABLAB Bách Khoa' );
?>

<!-- Banner header (full width, editable via Customize → FabLab Schedule Page Banner) -->
<div class="fablab-banner" style="background-image: url('<?php echo esc_url( $lkg_banner_image ); ?>');">
	<div class="fablab-banner-overlay"></div>
	<div class="fablab-banner-content">
		<h1 class="fablab-banner-title"><?php echo esc_html( $lkg_banner_title ); ?></h1>
		<?php if ( ! empty( $lkg_banner_subtitle ) ) : ?>
			<p class="fablab-banner-subtitle"><?php echo esc_html( $lkg_banner_subtitle ); ?></p>
		<?php endif; ?>
		<div class="fablab-banner-divider"></div>
	</div>
</div>

<div class="pt-14 pb-16 bg-white animate-fadeIn" id="schedule-page">
	<div class="max-w-7xl mx-auto px-4 space-y-12">

		<!-- Important Guidelines note -->
		<div class="bg-[#ffffff]/10 border border-[#ffffff]/30 rounded-2xl p-5 text-xs text-gray-700 flex items-start space-x-3 max-w-4xl mx-auto">
			<span class="text-[#f47920] text-lg font-black shrink-0 mt-0.5">🔔 Chú ý:</span>
			<p class="leading-relaxed">
				- Đăng ký ghi danh học viên trước ngày khai giảng tối thiểu 3 ngày sẽ nhận ngay voucher ưu đãi 10% học phí hoặc hũ quà lưu niệm Faber độc quyền từ BK Holdings.<br />
				- Học sinh được quyền đăng ký xếp lớp <strong>học thử thực tế (1 buổi) miễn phí 100%</strong> kiểm tra năng lực trước khi nộp học phí chính thức.
			</p>
		</div>

		<!-- Schedule Table Grid -->
		<div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100" id="schedule-table-box">
			<div class="overflow-x-auto">
				<table class="w-full text-left border-collapse" id="schedule-table">
					
					<!-- Header -->
					<thead class="bg-[#f47920] text-white text-xs md:text-sm font-bold uppercase tracking-wider">
						<tr>
							<th class="p-4 sm:p-5">Mã lớp / Môn đào tạo</th>
							<th class="p-4 sm:p-5">Ngày khai giảng</th>
							<th class="p-4 sm:p-5">Khung giờ đào tạo</th>
							<th class="p-4 sm:p-5">Độ tuổi</th>
						</tr>
					</thead>

					<!-- Body -->
					<tbody class="divide-y divide-gray-100 text-xs md:text-sm text-gray-700">
						<?php foreach ( $schedulesData as $sc ) : ?>
							<tr class="hover:bg-slate-50/80 transition-colors" id="row-<?php echo esc_attr( $sc['id'] ); ?>">
								<td class="p-4 sm:p-5">
									<div class="font-extrabold text-slate-900 text-sm"><?php echo esc_html( $sc['name'] ); ?></div>
									<span class="font-mono text-[10px] text-gray-400 font-bold block mt-0.5"><?php echo esc_html( $sc['code'] ); ?></span>
								</td>
								<td class="p-4 sm:p-5 font-bold text-[#f47920]"><?php echo esc_html( $sc['date'] ); ?></td>
								<td class="p-4 sm:p-5 leading-normal max-w-xs"><?php echo esc_html( $sc['time'] ); ?></td>
								<td class="p-4 sm:p-5 font-bold text-gray-600"><?php echo esc_html( $sc['age'] ); ?></td>
							</tr>
						<?php endforeach; ?>
					</tbody>

				</table>
			</div>
		</div>

		<!-- Đăng ký nhận tư vấn (giống trang chủ) -->
		<div class="max-w-4xl mx-auto px-4">
			<div class="bg-[#ffffff] rounded-3xl p-8 sm:p-10 shadow-xl text-center space-y-6 border border-amber-400 relative overflow-hidden">

				<div class="absolute -right-12 -bottom-12 w-32 h-32 rounded-full bg-[#f47920]/10 blur-md pointer-events-none"></div>
				<div class="absolute -left-12 -top-12 w-32 h-32 rounded-full bg-[#f47920]/10 blur-md pointer-events-none"></div>

				<div class="space-y-2 max-w-xl mx-auto">
					<h2 class="text-2xl md:text-3xl font-black text-gray-900 tracking-tight uppercase">
						ĐĂNG KÝ NHẬN TƯ VẤN
					</h2>
					<p class="text-xs md:text-sm text-gray-800 font-medium">
						Hãy để lại thông tin liên hệ chính xác để chuyên viên tuyển sinh của FABLAB liên hệ sắp xếp buổi
						học thử miễn phí phù hợp cực chất cho bé.
					</p>
				</div>

				<form id="contact-form-lich-khai-giang" class="fablab-lead-form max-w-2xl mx-auto space-y-4">
					<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
						<input type="text" id="lich-khai-giang-contact-name" name="lead_name" required placeholder="Họ và tên..."
							class="w-full px-5 py-3.5 rounded-full border border-amber-400 focus:border-[#f47920] focus:ring-2 focus:ring-[#f47920]/20 bg-white text-gray-900 placeholder-gray-400 text-sm focus:outline-none text-center font-bold shadow-inner" />
						<input type="text" id="lich-khai-giang-contact-info" name="lead_contact" required placeholder="Số điện thoại hoặc Email..."
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

	</div>
</div>

<?php
get_footer();
