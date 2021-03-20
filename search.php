<?php

/**

 * The template for displaying search results pages.

 *

 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result

 *

 * @package recipe

 */

get_header(); ?>

	<div id="primary" class="primary-content">

		<main id="main" class="site-main layout-body" role="main">

			<div class="main-content">

				<div class="post-list">

					<?php if ( have_posts() ) : ?>

						<?php

						/* Start the Loop */

						while ( have_posts() ) : the_post(); ?>

							<div class="item">

								<?php	get_template_part( 'template-parts/content', 'search' ); ?>

							</div>

						<?php endwhile; ?>

					<?php else : ?>

						<?php get_template_part( 'template-parts/content', 'none' ); ?>

					<?php endif; ?>

				</div>

			</div>

		</main><!-- #main -->

	</div><!-- #primary -->

<?php

get_footer();
