<?php
/**
 * Single Post Template (news)
 *
 * @package FabLab
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

while ( have_posts() ) :
	the_post();

	$post_id        = get_the_ID();
	$categories      = get_the_category( $post_id );
	$category_name   = ! empty( $categories ) ? mb_strtoupper( $categories[0]->name ) : '';
	$post_image      = get_the_post_thumbnail_url( $post_id, 'large' ) ?: 'https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?auto=format&fit=crop&w=1200&q=80';
	?>

	<article class="pt-24 pb-16 bg-[#f9fbf9] animate-fadeIn" id="single-post-page">
		<div class="max-w-4xl mx-auto px-4 space-y-8">

			<a href="<?php echo esc_url( home_url( '/tin-tuc' ) ); ?>" class="single-post-back">
				<span aria-hidden="true">←</span> Quay lại Tin tức
			</a>

			<div class="single-post-image-wrap">
				<img
					src="<?php echo esc_url( $post_image ); ?>"
					alt="<?php echo esc_attr( get_the_title() ); ?>"
					referrerpolicy="no-referrer"
				/>
				<?php if ( ! empty( $category_name ) ) : ?>
					<span class="single-post-badge"><?php echo esc_html( $category_name ); ?></span>
				<?php endif; ?>
			</div>

			<header class="single-post-header">
				<h1 class="single-post-title"><?php the_title(); ?></h1>
				<div class="single-post-meta">
					<span class="single-post-meta-item">
						<?php echo fablab_icon( 'calendar', '' ); ?>
						<?php echo esc_html( get_the_date( 'd/m/Y' ) ); ?>
					</span>
				</div>
			</header>

			<div class="page-editor-content">
				<?php the_content(); ?>
			</div>

		</div>
	</article>

	<?php
endwhile;

get_footer();
