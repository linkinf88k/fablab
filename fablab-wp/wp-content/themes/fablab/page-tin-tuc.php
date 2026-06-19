<?php
/**
 * Template Name: News Catalog
 *
 * Blog-style layout (ref: teky.edu.vn/blog/): a "Chương trình hợp tác" post
 * grid and a "Hoạt động nội bộ" post grid (each paginated independently),
 * a sidebar with latest posts + upcoming events, and a "LỊCH SỰ KIỆN"
 * event strip at the bottom.
 *
 * @package FabLab
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

// fablab_render_news_section() lives in inc/news-helpers.php.

// Upcoming events — no dedicated CPT yet, so kept as a small static list here
// (same pattern as $schedulesData in page-lich-khai-giang.php).
$upcoming_events = array(
	array(
		'title' => 'Workshop STEM Hè 2026 - Khám phá Robot AI',
		'date'  => '25/06/2026',
		'image' => 'https://images.unsplash.com/photo-1581092335397-9583fe92d232?auto=format&fit=crop&w=600&q=80',
	),
	array(
		'title' => 'Vòng chung kết BK-STEM Cup 2026',
		'date'  => '12/07/2026',
		'image' => 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=600&q=80',
	),
	array(
		'title' => 'Open Day giới thiệu khóa học mùa thu',
		'date'  => '02/08/2026',
		'image' => 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=600&q=80',
	),
);

$latest_posts_query = new WP_Query( array(
	'post_type'      => 'post',
	'posts_per_page' => 5,
	'orderby'        => 'date',
	'order'          => 'DESC',
) );

// Page hero banner (Customize → FabLab News Page Banner)
$tin_tuc_banner_image    = get_theme_mod( 'fablab_tin_tuc_banner_image', 'https://images.unsplash.com/photo-1504711434969-e33886168f5c?auto=format&fit=crop&w=1600&q=80' );
$tin_tuc_banner_title    = get_theme_mod( 'fablab_tin_tuc_banner_title', 'TIN TỨC HOẠT ĐỘNG - SỰ KIỆN' );
$tin_tuc_banner_subtitle = get_theme_mod( 'fablab_tin_tuc_banner_subtitle', 'Tin tức về các cuộc thi công nghệ, hoạt động nội bộ sáng tạo và chương trình hợp tác của FABLAB' );
?>

<!-- Banner header (full width, editable via Customize → FabLab News Page Banner) -->
<div class="fablab-banner" style="background-image: url('<?php echo esc_url( $tin_tuc_banner_image ); ?>');">
	<div class="fablab-banner-overlay"></div>
	<div class="fablab-banner-content">
		<h1 class="fablab-banner-title"><?php echo esc_html( $tin_tuc_banner_title ); ?></h1>
		<?php if ( ! empty( $tin_tuc_banner_subtitle ) ) : ?>
			<p class="fablab-banner-subtitle"><?php echo esc_html( $tin_tuc_banner_subtitle ); ?></p>
		<?php endif; ?>
		<div class="fablab-banner-divider"></div>
	</div>
</div>

<div class="pt-16 pb-12 bg-[#f9fbf9] animate-fadeIn" id="news-catalog-page">
	<div class="max-w-7xl mx-auto px-4 tin-tuc-page-sections">

		<!-- Main content + sidebar -->
		<div class="grid grid-cols-1 lg:grid-cols-12 gap-10">

			<div class="lg:col-span-8 tin-tuc-main-sections">

				<!-- Chương trình hợp tác -->
				<div>
					<h2 class="tin-tuc-section-title">Chương trình hợp tác</h2>
					<?php
					$coop_count = fablab_render_news_section( 'chuong-trinh-hop-tac', 'cthtp' );
					if ( 0 === $coop_count ) :
						?>
						<p class="tin-tuc-empty">Chưa có bài viết trong danh mục này.</p>
					<?php endif; ?>
				</div>

				<!-- Hoạt động nội bộ -->
				<div>
					<h2 class="tin-tuc-section-title">Hoạt động nội bộ</h2>
					<?php
					$internal_count = fablab_render_news_section( 'hoat-dong-noi-bo', 'hdnb' );
					if ( 0 === $internal_count ) :
						?>
						<p class="tin-tuc-empty">Chưa có bài viết trong danh mục này.</p>
					<?php endif; ?>
				</div>

			</div>

			<!-- Sidebar -->
			<div class="lg:col-span-4 space-y-8">

				<div class="tin-tuc-sidebar-widget">
					<h3 class="tin-tuc-sidebar-widget-title">Tin mới nhất</h3>
					<ul class="tin-tuc-sidebar-list">
						<?php if ( $latest_posts_query->have_posts() ) : ?>
							<?php while ( $latest_posts_query->have_posts() ) : $latest_posts_query->the_post(); ?>
								<li>
									<a href="<?php echo esc_url( get_permalink() ); ?>">
										<span class="tin-tuc-sidebar-list-arrow">»</span>
										<?php echo esc_html( get_the_title() ); ?>
									</a>
								</li>
							<?php endwhile; wp_reset_postdata(); ?>
						<?php else : ?>
							<li class="tin-tuc-empty">Chưa có bài viết nào.</li>
						<?php endif; ?>
					</ul>
				</div>

				<div class="tin-tuc-sidebar-widget">
					<h3 class="tin-tuc-sidebar-widget-title">Sự kiện sắp diễn ra</h3>
					<ul class="tin-tuc-sidebar-list">
						<?php foreach ( $upcoming_events as $event ) : ?>
							<li>
								<a href="#section-event-calendar">
									<span class="tin-tuc-sidebar-list-arrow">»</span>
									<?php echo esc_html( $event['title'] ); ?>
								</a>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>

			</div>

		</div>

		<!-- LỊCH SỰ KIỆN -->
		<div id="section-event-calendar">
			<h2 class="tin-tuc-section-title">Lịch sự kiện</h2>
			<div class="event-cards-grid">
				<?php foreach ( $upcoming_events as $event ) : ?>
					<div class="event-card">
						<div class="event-card-image-wrap">
							<img src="<?php echo esc_url( $event['image'] ); ?>" alt="<?php echo esc_attr( $event['title'] ); ?>" loading="lazy" referrerpolicy="no-referrer" />
						</div>
						<div class="event-card-body">
							<span class="event-card-date"><?php echo fablab_icon( 'calendar', '' ); ?><?php echo esc_html( $event['date'] ); ?></span>
							<h3 class="event-card-title"><?php echo esc_html( $event['title'] ); ?></h3>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>

	</div>
</div>

<?php
get_footer();
