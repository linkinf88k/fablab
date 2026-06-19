<?php
/**
 * Shared rendering helper for page-tin-tuc.php's per-category post grids.
 *
 * @package FabLab
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'fablab_render_news_section' ) ) {
	/**
	 * Renders one paginated post grid (.news-card-v2 cards) for a category
	 * slug, plus pagination if there's more than one page. The page number
	 * is read from $_GET[ $page_param ] so two sections on the same page
	 * can paginate independently.
	 *
	 * @return int Number of posts rendered on the current page (0 = none).
	 */
	function fablab_render_news_section( $category_slug, $page_param ) {
		$current_page = isset( $_GET[ $page_param ] ) ? max( 1, (int) $_GET[ $page_param ] ) : 1;

		$query = new WP_Query( array(
			'post_type'      => 'post',
			'category_name'  => $category_slug,
			'posts_per_page' => 4,
			'paged'          => $current_page,
		) );

		if ( ! $query->have_posts() ) {
			return 0;
		}

		echo '<div class="tin-tuc-cards-grid">';
		while ( $query->have_posts() ) {
			$query->the_post();
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
			<?php
		}
		echo '</div>';

		if ( $query->max_num_pages > 1 ) {
			echo '<div class="tin-tuc-pagination">';
			echo paginate_links( array(
				'base'      => add_query_arg( $page_param, '%#%' ),
				'format'    => '',
				'current'   => $current_page,
				'total'     => $query->max_num_pages,
				'prev_text' => '‹',
				'next_text' => '›',
			) );
			echo '</div>';
		}

		$found = $query->post_count;
		wp_reset_postdata();
		return $found;
	}
}
