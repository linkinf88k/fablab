<?php
/**
 * The template for displaying all pages
 *
 * @package FabLab
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
?>

<div class="pt-24 pb-16 bg-white animate-fadeIn" id="fallback-page">
	<div class="max-w-7xl mx-auto px-4">
		<?php
		while ( have_posts() ) :
			the_post();
			?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header mb-8 text-center">
					<?php the_title( '<h1 class="entry-title text-3xl sm:text-4xl md:text-5xl font-black text-slate-900 tracking-tight">', '</h1>' ); ?>
					<div class="w-16 h-1 bg-[#f47920] mx-auto rounded-full mt-2"></div>
				</header>

				<div class="entry-content text-gray-700 leading-relaxed max-w-4xl mx-auto space-y-4 font-normal">
					<?php
					the_content();
					?>
				</div>
			</article>
			<?php
		endwhile;
		?>
	</div>
</div>

<?php
get_footer();
