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
	array( 'id' => 'sc-1', 'name' => 'Lập trình Scratch cơ bản', 'code' => 'SCR-B01', 'date' => '21/06/2026', 'time' => 'Chiều thứ 7 (14h00-16h00) & Sáng Chủ Nhật (8h30-10h30)', 'age' => '8-11 tuổi', 'fee' => '4.800.000đ', 'status' => 'Còn nhận' ),
	array( 'id' => 'sc-2', 'name' => 'Minecraft Coding sáng tạo', 'code' => 'MIN-C02', 'date' => '22/06/2026', 'time' => 'Sáng thứ 7 (9h00 - 11h00)', 'age' => '9-13 tuổi', 'fee' => '5.200.000đ', 'status' => 'Sắp đầy' ),
	array( 'id' => 'sc-3', 'name' => 'Lập trình Python chuyên sâu', 'code' => 'PYT-P01', 'date' => '25/06/2026', 'time' => 'Tối thứ 3 & tối thứ 5 (18h30-20h30)', 'age' => '11-16 tuổi', 'fee' => '6.800.000đ', 'status' => 'Còn nhận' ),
	array( 'id' => 'sc-4', 'name' => 'Robotics Arduino thông minh', 'code' => 'ARD-A03', 'date' => '27/06/2026', 'time' => 'Chiều thứ 7 (16h00 - 18h00)', 'age' => '11-18 tuổi', 'fee' => '7.200.000đ', 'status' => 'Gần đầy' ),
	array( 'id' => 'sc-5', 'name' => 'Roblox Studio (Lập trình Lua)', 'code' => 'ROB-R01', 'date' => '28/06/2026', 'time' => 'Sáng Chủ Nhật (8h30 - 11h00)', 'age' => '10-15 tuổi', 'fee' => '6.000.000đ', 'status' => 'Còn nhận' ),
	array( 'id' => 'sc-6', 'name' => 'Luyện thi Tin học trẻ Bảng A', 'code' => 'THT-A05', 'date' => '30/06/2026', 'time' => 'Chiều thứ 7 & Chiều Chủ nhật (14h00-16h00)', 'age' => 'Lớp 3-5', 'fee' => '8.500.000đ', 'status' => 'Còn nhận' ),
);
?>

<div class="pt-24 pb-16 bg-white animate-fadeIn" id="schedule-page">
	<div class="max-w-7xl mx-auto px-4 space-y-12">
		
		<!-- Title display -->
		<div class="text-center space-y-2">
			<span class="text-[#f47920] font-extrabold uppercase tracking-widest text-xs py-1 px-3 bg-[#f47920]/5 rounded-sm">Linh hoạt học tập</span>
			<h1 class="text-3xl sm:text-4xl font-extrabold text-slate-900">LỊCH KHAI GIẢNG KHÓA MỚI NĂM 2026</h1>
			<p class="max-w-2xl mx-auto text-gray-500 text-xs sm:text-sm">Bảng cập nhật các chiêu sinh mới nhất, lịch khai giảng định kỳ hằng tuần tại hai cơ sở đào tạo của FABLAB Bách Khoa.</p>
			<div class="w-16 h-1 bg-[#f47920] mx-auto rounded-full mt-3"></div>
		</div>

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
							<th class="p-4 sm:p-5">Học phí trọn gói</th>
							<th class="p-4 sm:p-5">Trạng thái</th>
							<th class="p-4 sm:p-5 text-right">Hành động</th>
						</tr>
					</thead>

					<!-- Body -->
					<tbody class="divide-y divide-gray-150 text-xs md:text-sm text-gray-750">
						<?php foreach ( $schedulesData as $sc ) : ?>
							<tr class="hover:bg-slate-50/80 transition-colors" id="row-<?php echo esc_attr( $sc['id'] ); ?>">
								<td class="p-4 sm:p-5">
									<div class="font-extrabold text-slate-900 text-sm"><?php echo esc_html( $sc['name'] ); ?></div>
									<span class="font-mono text-[10px] text-gray-400 font-bold block mt-0.5"><?php echo esc_html( $sc['code'] ); ?></span>
								</td>
								<td class="p-4 sm:p-5 font-bold text-[#f47920]"><?php echo esc_html( $sc['date'] ); ?></td>
								<td class="p-4 sm:p-5 leading-normal max-w-xs"><?php echo esc_html( $sc['time'] ); ?></td>
								<td class="p-4 sm:p-5 font-bold text-gray-650"><?php echo esc_html( $sc['age'] ); ?></td>
								<td class="p-4 sm:p-5 font-black text-amber-700"><?php echo esc_html( $sc['fee'] ); ?></td>
								<td class="p-4 sm:p-5">
									<span class="inline-block px-2 py-1 rounded-md text-[10px] font-bold <?php echo ( $sc['status'] === 'Còn nhận' ) ? 'bg-green-100 text-green-700 border border-green-200' : 'bg-amber-100 text-amber-700 border border-amber-200'; ?>">
										<?php echo esc_html( $sc['status'] ); ?>
									</span>
								</td>
								<td class="p-4 sm:p-5 text-right">
									<a
										href="<?php echo esc_url( home_url( '/#section-contact' ) ); ?>"
										class="inline-block px-4.5 py-2 bg-[#f47920] hover:bg-[#ffffff] hover:text-[#f47920] text-[#ffffff] text-xs font-extrabold rounded-lg transition-all shadow-sm text-decoration-none"
										id="schedule-book-btn-<?php echo esc_attr( $sc['id'] ); ?>"
									>
										Ghi danh
									</a>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>

				</table>
			</div>
		</div>

	</div>
</div>

<?php
get_footer();
