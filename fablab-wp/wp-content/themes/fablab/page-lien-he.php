<?php
/**
 * Template Name: Contact Page
 *
 * @package FabLab
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$contact_banner_image    = get_theme_mod( 'fablab_contact_banner_image', 'https://images.unsplash.com/photo-1521587760476-6c12a4b040da?auto=format&fit=crop&w=1600&q=80' );
$contact_banner_title    = get_theme_mod( 'fablab_contact_banner_title', 'LIÊN HỆ' );
$contact_banner_subtitle = get_theme_mod( 'fablab_contact_banner_subtitle', 'Kết nối cùng FABLAB Bách Khoa - BK Holdings' );

// Same Customizer values used in footer.php, so both stay in sync.
$contact_address       = get_theme_mod( 'fablab_contact_address', 'A17 Tạ Quang Bửu, Bạch Mai, Hai Bà Trưng, Hà Nội' );
$contact_hotline        = get_theme_mod( 'fablab_contact_hotline', '094 686 2803' );
$contact_email          = get_theme_mod( 'fablab_contact_email', 'tuyensinh@fablabbachkhoa.edu.vn' );
$contact_map_embed_url  = get_theme_mod( 'fablab_contact_map_embed_url', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.72970030588!2d105.84518777596205!3d21.003460488647012!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac77be83cb11%3A0xe54fb7dc2bd238fe!2zQTE3IFRhIFF1YW5nIELhu611LCBCw6FjaCBNYWksIEhhaSBCw6AgVHLGsG5nLCBIw6AgTuG7mWksIFZpZXRuYW0!5e0!3m2!1sen!2s!4v1718040000000!5m2!1sen!2s' );
?>

<!-- Banner header (full width, image + title/subtitle editable via Customize → FabLab Contact Page Banner) -->
<div class="fablab-banner" style="background-image: url('<?php echo esc_url( $contact_banner_image ); ?>');">
	<div class="fablab-banner-overlay"></div>
	<div class="fablab-banner-content">
		<h1 class="fablab-banner-title"><?php echo esc_html( $contact_banner_title ); ?></h1>
		<?php if ( ! empty( $contact_banner_subtitle ) ) : ?>
			<p class="fablab-banner-subtitle"><?php echo esc_html( $contact_banner_subtitle ); ?></p>
		<?php endif; ?>
		<div class="fablab-banner-divider"></div>
	</div>
</div>

<div class="pt-16 pb-16 bg-white animate-fadeIn" id="contact-page">
	<div class="max-w-7xl mx-auto px-4">

		<div class="grid grid-cols-1 lg:grid-cols-12 gap-10">

			<!-- Thông tin liên hệ (đồng bộ với Footer, sửa tại Customize → FabLab Contact Info) -->
			<div class="lg:col-span-4">
				<div class="contact-info-card">
					<h2 class="contact-info-heading">FABLAB BÁCH KHOA</h2>
					<div class="contact-info-rows">
						<div class="contact-info-row">
							<?php echo fablab_icon( 'map-pin', '' ); ?>
							<span>
								<span class="contact-info-row-label">Địa chỉ</span>
								<span class="contact-info-row-value"><?php echo esc_html( $contact_address ); ?></span>
							</span>
						</div>
						<div class="contact-info-row">
							<?php echo fablab_icon( 'phone', '' ); ?>
							<span>
								<span class="contact-info-row-label">Hotline</span>
								<span class="contact-info-row-value">
									<a href="tel:<?php echo esc_attr( preg_replace( '/\s+/', '', $contact_hotline ) ); ?>" class="text-decoration-none" style="color: inherit;">
										<?php echo esc_html( $contact_hotline ); ?>
									</a>
								</span>
							</span>
						</div>
						<div class="contact-info-row">
							<?php echo fablab_icon( 'mail', '' ); ?>
							<span>
								<span class="contact-info-row-label">Email</span>
								<span class="contact-info-row-value">
									<a href="mailto:<?php echo esc_attr( $contact_email ); ?>" class="text-decoration-none" style="color: inherit;">
										<?php echo esc_html( $contact_email ); ?>
									</a>
								</span>
							</span>
						</div>
					</div>
				</div>
			</div>

			<!-- Bản đồ chỉ dẫn -->
			<div class="lg:col-span-8">
				<div class="contact-map-wrap">
					<iframe
						title="Bản đồ chỉ đường FABLAB Bách Khoa"
						src="<?php echo esc_url( $contact_map_embed_url ); ?>"
						allowfullscreen=""
						loading="lazy"
						referrerpolicy="no-referrer"
					></iframe>
				</div>
			</div>

		</div>

	</div>
</div>

<?php
get_footer();
