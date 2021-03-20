<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package recipe
 */

get_header(); ?>

	<div id="primary" class="primary-content">

		<main id="main" class="main-content layout-body" role="main">

			<section class="error-404 container">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'recipe' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below?', 'recipe' ); ?></p>

					<?php
					$loop = new WP_Query(
						array(
							'post_type' => 'work',
							'posts_per_page' => -1
						)
					);

					if ( $loop->have_posts() ): ?>

						<div class="grid grid-two">

							<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

								<?php get_template_part( 'template-parts/content', 'grid' ); ?>

							<?php endwhile; ?>

						</div>

						<?php wp_reset_postdata(); ?>

					<?php endif; ?>

				</div><!-- .page-content -->

			</section><!-- .error-404 -->

		</main><!-- #main -->

	</div><!-- #primary -->

<?php
get_footer();
