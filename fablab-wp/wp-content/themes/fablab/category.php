<?php
/**
 * Post Category Archive — /category/{slug}/
 *
 * Without this template WordPress fell back all the way to index.php (the
 * homepage), so visiting a news category (e.g. /category/hoat-dong-noi-bo/)
 * rendered the entire homepage instead of a post listing. Same blog-style
 * layout as page-tin-tuc.php: banner, then a two-column grid — main
 * paginated post card grid (.news-card-v2) plus a sidebar with the other
 * categories and latest posts.
 *
 * @package FabLab
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$queried_term      = get_queried_object();
$category_name     = ( $queried_term instanceof WP_Term ) ? $queried_term->name : single_cat_title( '', false );
$term_description  = ( $queried_term instanceof WP_Term ) ? term_description( $queried_term ) : '';
$banner_image       = get_theme_mod( 'fablab_tin_tuc_banner_image', 'https://images.unsplash.com/photo-1504711434969-e33886168f5c?auto=format&fit=crop&w=1600&q=80' );
$banner_subtitle    = ! empty( $term_description ) ? wp_strip_all_tags( $term_description ) : 'Tin tức và hoạt động của FABLAB trong danh mục ' . $category_name;

$latest_posts_query = new WP_Query( array(
	'post_type'      => 'post',
	'posts_per_page' => 5,
	'orderby'        => 'date',
	'order'          => 'DESC',
) );

$other_categories = get_categories( array(
	'exclude'    => ( $queried_term instanceof WP_Term ) ? array( $queried_term->term_id ) : array(),
	'hide_empty' => false,
) );
?>

<div class="fablab-banner" style="background-image: url('<?php echo esc_url( $banner_image ); ?>');">
	<div class="fablab-banner-overlay"></div>
	<div class="fablab-banner-content">
		<h1 class="fablab-banner-title"><?php echo esc_html( mb_strtoupper( $category_name ) ); ?></h1>
		<p class="fablab-banner-subtitle"><?php echo esc_html( $banner_subtitle ); ?></p>
		<div class="fablab-banner-divider"></div>
	</div>
</div>

<div class="pt-16 pb-12 bg-[#f9fbf9] animate-fadeIn" id="category-archive-page">
	<div class="max-w-7xl mx-auto px-4 tin-tuc-page-sections">

		<div>
			<a href="<?php echo esc_url( home_url( '/tin-tuc' ) ); ?>" class="single-post-back">
				<span aria-hidden="true">←</span> Tất cả tin tức
			</a>
		</div>

		<div class="grid grid-cols-1 lg:grid-cols-12 gap-10">

			<div class="lg:col-span-8 tin-tuc-main-sections">
				<div>
					<h2 class="tin-tuc-section-title"><?php echo esc_html( $category_name ); ?></h2>

					<?php if ( have_posts() ) : ?>
						<div class="tin-tuc-cards-grid">
							<?php
							while ( have_posts() ) :
								the_post();
								$post_id = get_the_ID();
								$summary = get_the_excerpt() ?: wp_trim_words( get_the_content(), 20 );
								$thumb   = get_the_post_thumbnail_url( $post_id, 'large' ) ?: 'https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?auto=format&fit=crop&w=600&q=80';
								?>
								<a href="<?php echo esc_url( get_permalink( $post_id ) ); ?>" class="news-card-v2">
									<div class="news-card-v2-img-wrap">
										<img src="<?php echo esc_url( $thumb ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" loading="lazy" referrerpolicy="no-referrer" />
									</div>
									<div class="news-card-v2-body">
										<h3 class="news-card-v2-title"><?php echo esc_html( get_the_title() ); ?></h3>
										<p class="news-card-v2-desc tin-tuc-card-lead"><?php echo esc_html( $summary ); ?></p>
										<span class="news-card-v2-link">Xem thêm →</span>
									</div>
								</a>
							<?php endwhile; ?>
						</div>

						<?php
						global $wp_query;
						if ( $wp_query->max_num_pages > 1 ) :
							?>
							<div class="tin-tuc-pagination">
								<?php echo paginate_links( array( 'prev_text' => '‹', 'next_text' => '›' ) ); ?>
							</div>
						<?php endif; ?>
					<?php else : ?>
						<p class="tin-tuc-empty">Chưa có bài viết trong danh mục này.</p>
					<?php endif; ?>
				</div>
			</div>

			<!-- Sidebar -->
			<div class="lg:col-span-4 space-y-8">

				<?php if ( ! empty( $other_categories ) ) : ?>
					<div class="tin-tuc-sidebar-widget">
						<h3 class="tin-tuc-sidebar-widget-title">Danh mục khác</h3>
						<ul class="tin-tuc-sidebar-list">
							<?php foreach ( $other_categories as $other_cat ) : ?>
								<li>
									<a href="<?php echo esc_url( get_category_link( $other_cat ) ); ?>">
										<span class="tin-tuc-sidebar-list-arrow">»</span>
										<?php echo esc_html( $other_cat->name ); ?>
									</a>
								</li>
							<?php endforeach; ?>
						</ul>
					</div>
				<?php endif; ?>

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

			</div>

		</div>

	</div>
</div>

<?php
get_footer();
