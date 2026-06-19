<?php
/**
 * The template for displaying the footer
 *
 * @package FabLab
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$fablab_contact_address       = get_theme_mod( 'fablab_contact_address', 'A17 Tạ Quang Bửu, Bạch Mai, Hai Bà Trưng, Hà Nội' );
$fablab_contact_hotline       = get_theme_mod( 'fablab_contact_hotline', '094 686 2803' );
$fablab_contact_email         = get_theme_mod( 'fablab_contact_email', 'tuyensinh@fablabbachkhoa.edu.vn' );
$fablab_contact_map_embed_url = get_theme_mod( 'fablab_contact_map_embed_url', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.72970030588!2d105.84518777596205!3d21.003460488647012!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac77be83cb11%3A0xe54fb7dc2bd238fe!2zQTE3IFRhIFF1YW5nIELhu611LCBCw6FjaCBNYWksIEhhaSBCw6AgVHLGsG5nLCBIw6AgTuG7mWksIFZpZXRuYW0!5e0!3m2!1sen!2s!4v1718040000000!5m2!1sen!2s' );
?>
	</main><!-- #main-content-layout -->

	<div class="relative" id="footer-wrapper">
		
		<!-- Decorative Wave Waveform on top of the footer -->
		<div class="absolute top-0 left-0 right-0 h-[100px] -mt-[99px] overflow-hidden z-10 pointer-events-none">
			<svg class="w-full h-full" viewBox="0 0 1440 120" preserveAspectRatio="none">
				<!-- Yellow base wavy layer representing the golden ribbon -->
				<path 
					d="M0,72 C150,12 300,12 450,62 C600,112 750,112 900,52 C1050,7 1200,7 1350,52 C1390,67 1420,72 1440,72 L1440,120 L0,120 Z" 
					fill="#ffffff" 
				/>
				<!-- Dark Green foreground wavy layer -->
				<path 
					d="M0,80 C150,20 300,20 450,70 C600,120 750,120 900,60 C1050,15 1200,15 1350,60 C1390,75 1420,80 1440,80 L1440,120 L0,120 Z" 
					fill="#18181b" 
				/>
			</svg>
		</div>

		<footer class="bg-[#18181b] text-white pt-16 pb-8" id="footer-section">
			<div class="max-w-7xl mx-auto px-4">
				<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-10 border-b border-white/10 pb-12" id="footer-main-grid">
					
					<!-- Column 1: FABLAB Bách Khoa Info (4 Columns) -->
					<div class="lg:col-span-4 space-y-6" id="footer-col-info">
						<div class="flex items-center space-x-2">
							<div class="w-10 h-10 bg-[#ffffff] rounded-lg flex items-center justify-center font-black text-[#f47920] text-lg">FL</div>
							<div class="flex flex-col">
								<span class="text-white font-black text-base tracking-wider leading-none">FABLAB BÁCH KHOA</span>
								<span class="text-[10px] uppercase tracking-widest text-[#ffffff] font-bold">BK HOLDINGS ECOSYSTEM</span>
							</div>
						</div>

						<p class="text-xs text-white/75 leading-relaxed">
							Hệ thống trung tâm sáng tạo khoa học công nghệ chuyển giao giáo trình STEM & Lập trình từ BK Holdings - Đại học Bách Khoa Hà Nội. Ươm mầm kỹ sư tương lai.
						</p>

						<div class="space-y-3.5 text-xs text-white/90">
							<div class="flex items-start space-x-2">
								<?php echo fablab_icon( 'map-pin', 'h-4 w-4 text-[#ffffff] shrink-0 mt-0.5' ); ?>
								<span><strong class="text-white">Địa chỉ:</strong> <?php echo esc_html( $fablab_contact_address ); ?></span>
							</div>
							<div class="flex items-center space-x-2">
								<?php echo fablab_icon( 'phone', 'h-4 w-4 text-[#ffffff] shrink-0' ); ?>
								<span><strong class="text-white">Hotline:</strong> <?php echo esc_html( $fablab_contact_hotline ); ?></span>
							</div>
							<div class="flex items-center space-x-2">
								<?php echo fablab_icon( 'mail', 'h-4 w-4 text-[#ffffff] shrink-0' ); ?>
								<span><strong class="text-white">Email:</strong> <?php echo esc_html( $fablab_contact_email ); ?></span>
							</div>
						</div>

						<!-- Social Media Link Icons -->
						<div class="flex items-center space-x-3.5 pt-2" id="social-links-footer">
							<a 
								href="https://facebook.com" 
								target="_blank" 
								rel="noreferrer" 
								class="w-10 h-10 rounded-full bg-white/10 hover:bg-white hover:text-[#f47920] transition flex items-center justify-center text-white border border-white/20"
								aria-label="Facebook Link"
							>
								<?php echo fablab_icon( 'facebook', 'h-4 w-4' ); ?>
							</a>
							<a 
								href="https://tiktok.com" 
								target="_blank" 
								rel="noreferrer" 
								class="w-10 h-10 rounded-full bg-white/10 hover:bg-white hover:text-[#f47920] transition flex items-center justify-center text-white border border-white/20 text-xs font-black"
								aria-label="TikTok Link"
							>
								TT
							</a>
							<a 
								href="https://youtube.com" 
								target="_blank" 
								rel="noreferrer" 
								class="w-10 h-10 rounded-full bg-white/10 hover:bg-white hover:text-[#f47920] transition flex items-center justify-center text-white border border-white/20"
								aria-label="Youtube Link"
							>
								<?php echo fablab_icon( 'youtube', 'h-4 w-4' ); ?>
							</a>
						</div>
					</div>

					<!-- Column 2: DANH MỤC Links (3 Columns) -->
					<div class="lg:col-span-3 space-y-6" id="footer-col-nav">
						<h4 class="text-sm font-bold text-[#ffffff] uppercase tracking-wider relative pb-2 border-b border-white/20">
							DANH MỤC CHÍNH
						</h4>
						<ul class="space-y-3.5 text-xs text-white/70 list-none p-0">
							<li>
								<a href="<?php echo esc_url( home_url( '/gioi-thieu' ) ); ?>" class="hover:text-white hover:underline hover:font-bold transition flex items-center space-x-1 text-white/85 text-decoration-none">
									<span>Giới thiệu FABLAB</span>
									<?php echo fablab_icon( 'arrow-up-right', 'h-3 w-3' ); ?>
								</a>
							</li>
							<li>
								<a href="<?php echo esc_url( home_url( '/khoa-hoc' ) ); ?>" class="hover:text-white hover:underline hover:font-bold transition flex items-center space-x-1 text-white/85 text-decoration-none">
									<span>Các khóa học sáng tạo</span>
									<?php echo fablab_icon( 'arrow-up-right', 'h-3 w-3' ); ?>
								</a>
							</li>
							<li>
								<a href="<?php echo esc_url( home_url( '/lich-khai-giang' ) ); ?>" class="hover:text-white hover:underline hover:font-bold transition flex items-center space-x-1 text-white/85 text-decoration-none">
									<span>Lịch khai giảng lớp mới</span>
									<?php echo fablab_icon( 'arrow-up-right', 'h-3 w-3' ); ?>
								</a>
							</li>
							<li>
								<a href="<?php echo esc_url( home_url( '/tin-tuc?category=chuong-trinh-hop-tac' ) ); ?>" class="hover:text-white hover:underline hover:font-bold transition flex items-center space-x-1 text-white/85 text-decoration-none">
									<span>Chương trình hợp tác BK</span>
									<?php echo fablab_icon( 'arrow-up-right', 'h-3 w-3' ); ?>
								</a>
							</li>
							<li>
								<a href="<?php echo esc_url( home_url( '/tin-tuc?category=hoat-dong-noi-bo' ) ); ?>" class="hover:text-white hover:underline hover:font-bold transition flex items-center space-x-1 text-white/85 text-decoration-none">
									<span>Tin hoạt động nội bộ</span>
									<?php echo fablab_icon( 'arrow-up-right', 'h-3 w-3' ); ?>
								</a>
							</li>
						</ul>
					</div>

					<!-- Column 3: Google Map Connection (5 Columns) -->
					<div class="lg:col-span-5 space-y-4" id="footer-col-map">
						<h4 class="text-sm font-bold text-[#ffffff] uppercase tracking-wider relative pb-2 border-b border-white/20 flex items-center justify-between">
							<span>BẢN ĐỒ CHỈ ĐƯỜNG</span>
							<span class="text-[10px] text-[#ffffff] font-normal tracking-tight">A17 Tạ Quang Bửu</span>
						</h4>
						
						<div class="w-full aspect-video rounded-xl overflow-hidden border border-white/20 shadow-lg relative bg-black/20" id="maps-iframe-wrapper">
							<iframe
								title="Bản đồ chỉ đường FABLAB Bách Khoa"
								src="<?php echo esc_url( $fablab_contact_map_embed_url ); ?>"
								width="100%"
								height="100%"
								style="border: 0;"
								allowfullscreen=""
								loading="lazy"
								referrerpolicy="no-referrer"
								id="footer-gmap-iframe"
							></iframe>
						</div>
					</div>

				</div>

				<!-- Bottom copyright segment -->
				<div class="flex flex-col sm:flex-row items-center justify-between pt-8 mt-8 text-[11px] text-white/50" id="footer-bottom-segment">
					<p>© 2026 FABLAB Bách Khoa. Bảo lưu mọi quyền. Chuyển giao công nghệ giáo dục số bởi BK Holdings.</p>
					<div class="flex space-x-4 mt-4 sm:mt-0">
						<button id="scroll-to-top-btn" class="bg-transparent border-0 text-white/50 hover:text-white hover:font-bold transition cursor-pointer">Cuộn lên đầu trang ↑</button>
					</div>
				</div>

			</div>
		</footer>

		<!-- FLOATING ACTION BUBBLES -->
		<div class="fixed bottom-6 right-6 z-50 flex flex-col space-y-3" id="floating-actions">
			<!-- Contact Hotline Bubble -->
			<a 
				href="tel:0946862803" 
				class="flex items-center space-x-2 bg-gradient-to-r from-red-600 to-amber-500 text-white font-extrabold text-xs px-4 py-2.5 rounded-full shadow-2xl border border-white/20 transition hover:scale-105 active:scale-95 animate-pulse text-decoration-none"
			>
				<?php echo fablab_icon( 'phone', 'w-4 h-4' ); ?>
				<span>Hotline: 094.686.2803</span>
			</a>

			<!-- Zalo Chat Button -->
			<a 
				href="https://zalo.me/0946862803" 
				target="_blank" 
				rel="noreferrer"
				class="flex items-center justify-center space-x-2 bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-full font-black text-sm shadow-2xl transition hover:scale-105 active:scale-95 border-2 border-white/10 text-decoration-none"
			>
				<span class="w-2.5 h-2.5 rounded-full bg-green-400 animate-ping animate-pulse"></span>
				<span>Liên hệ Zalo</span>
			</a>
		</div>

	</div><!-- #footer-wrapper -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
