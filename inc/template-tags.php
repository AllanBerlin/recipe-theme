<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package recipe
 */

if ( ! function_exists( 'recipe_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function recipe_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( '%s', 'post date', 'recipe' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		esc_html_x( 'BY %s', 'post author', 'recipe' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<div class="byline"> ' . $byline . '</div><div class="posted-on">' . $posted_on . '</div>'; // WPCS: XSS OK.

}
endif;

if ( ! function_exists( 'recipe_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function recipe_posted_by() {
		$byline = sprintf(
			esc_html_x( 'BY %s', 'post author', 'recipe' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<div class="byline"> ' . $byline . '</div>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'recipe_get_excerpt' ) ) :
	/**
	 * Prints out word limit for post excerpt on blog listing page.
	 */
	function recipe_get_excerpt() {

    $textarr = array();

		if( have_rows('flexible_work_content') ):
      // loop through the rows of data
      while ( have_rows('flexible_work_content') ) : the_row();

      	$bodyText = get_row_layout() == 'body_text';

      	if ($bodyText) {
      		$text = get_sub_field('text');
          $text = preg_replace("/<([a-z][a-z0-9]*)[^>]*?(\/?)>/i",'<$1$2>', $text);
          $textarr[] = $text;
        }

      endwhile;

    endif;

    if ( isset( $textarr[0] ) ) {
      $excerpt = wp_trim_words( $textarr[0], 40, '<span class="read-more">... Read more</span>' );

			echo $excerpt;
		}
	}
endif;


if ( ! function_exists( 'recipe_get_small_excerpt' ) ) :
	/**
	 * Prints out word limit for post excerpt on related posts.
	 */
	function recipe_get_small_excerpt() {

    $textarr = array();

		if( have_rows('flexible_article_content') ):
			// loop through the rows of data
			while ( have_rows('flexible_article_content') ) : the_row();

				$bodyText = get_row_layout() == 'body_text';

				if ( $bodyText ) {
					$text = get_sub_field('text');
          $text = preg_replace("/<([a-z][a-z0-9]*)[^>]*?(\/?)>/i",'<$1$2>', $text);
          $textarr[] = $text;
				}

			endwhile;

		endif;

    if ( isset( $textarr[0] ) ) {
      $excerpt = wp_trim_words( $textarr[0], 25, '<span class="read-more"> [...] <strong>Read more</strong></span>' );

			echo $excerpt;
		}
	}
endif;

if ( ! function_exists( 'recipe_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function recipe_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'recipe' ) );
		if ( $categories_list && recipe_categorized_blog() ) {
			printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'recipe' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'recipe' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'recipe' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		/* translators: %s: post title */
		comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'recipe' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
		echo '</span>';
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'recipe' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

if ( ! function_exists( 'recipe_article_reading_time' ) ) :
  /**
   * Create an estimation of the reading time for a user of an Article post
   */
  function recipe_article_reading_time() {
    $content = array();

    if( have_rows('flexible_article_content') ):

      while ( have_rows('flexible_article_content') ) : the_row();

        $bodyText = get_row_layout() == 'body_text';

        if ( $bodyText ) {
          $textContent = get_sub_field('section_content');

          if( $textContent['text'] ) {
            $text = strip_tags( $textContent['text'] );
          } else {
            $text = '';
          }

          $content[] = $text;
        }

      endwhile;

    endif;

    $textContent = implode(' ', $content );

    $wordCount = str_word_count( $textContent );

    $readingTime = ceil( $wordCount / 200 );

    $timer = $readingTime == 1 ? ' minute' : ' minutes';

    return $readingTime . $timer;
  }
endif;


if ( ! function_exists( 'recipe_home_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function recipe_home_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'recipe' ) );
			if ( $categories_list && recipe_categorized_blog() ) {
				printf( '<span class="cat-links"><span class="cat-container"> ' . esc_html__( 'IN %1$s', 'recipe' ) . '</span></span>', $categories_list ); // WPCS: XSS OK.
			}
		}
	}
endif;

if ( ! function_exists( 'recipe_entry_tags' ) ) :
	/**
	 * Prints HTML with meta information for tags.
	 */
	function recipe_entry_tags() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html__( ',&nbsp;&nbsp;&nbsp;', 'recipe' ));
			if ( $tags_list ) {
				printf( '<p class="tags">' . esc_html__( 'Tags:' ) . '</p><span class="tags-links">' . esc_html__( '%1$s', 'recipe' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}
	}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function recipe_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'recipe_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'recipe_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so recipe_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so recipe_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in recipe_categorized_blog.
 */
function recipe_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'recipe_categories' );
}
add_action( 'edit_category', 'recipe_category_transient_flusher' );
add_action( 'save_post',     'recipe_category_transient_flusher' );
