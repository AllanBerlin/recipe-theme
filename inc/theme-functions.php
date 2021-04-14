<?php
/**
 * Custom theme functions.
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
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf( esc_html_x( '%s', 'post date', 'recipe' ), $time_string );

	$byline = sprintf(
		esc_html_x( '%s', 'post author', 'recipe' ),
		'<span class="author"><a class="author-link" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<div class="author-date"><span class="byline"> ' . $byline . '</span> | <span class="posted-on">' . $posted_on . '</span></div>';

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

		echo '<div class="byline"> ' . $byline . '</div>';

	}
endif;

if ( ! function_exists( 'recipe_get_excerpt' ) ) :
	/**
	 * Prints out word limit for post excerpt on blog listing page.
	 */
	function recipe_get_excerpt() {

    $textarr = array();

		if( have_rows('flexible_article_content') ):
      // loop through the rows of data
      while ( have_rows('flexible_article_content') ) : the_row();

      	$bodyText = get_row_layout() == 'body_text';

      	if ( $bodyText ) {
          $textContent = get_sub_field('section_content');
          $text = $textContent['text'];
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
          $textContent = get_sub_field('section_content');
					$text = $textContent['text'];
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

    printf( '<div class="reading-time">' . esc_html__( '%1$s Min Read', 'recipe' ) . '</div>', $readingTime );

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
		// Hide tags for pages.
		if ( get_post_type() === 'post' ):
			$tags = get_the_tags();

			?>

      <ul class="tags-list">

        <?php foreach( $tags as $tag ) :
          $tagName = $tag->name;
          $tagShortName = get_field( 'shortname', $tag->taxonomy . '_' . $tag->term_id );

          if( empty( $tagShortName ) ) {
            $tagShortName = $tagName;
          }

          $tagFontColour = get_field( 'recipe_font_colour', $tag->taxonomy . '_' . $tag->term_id );
          $tagColour = get_field( 'recipe_tag_colour', $tag->taxonomy . '_' . $tag->term_id );

          ?>

          <li class="tag" style="--tag-colour: <?php echo $tagColour; ?>; color: <?php echo $tagFontColour; ?>;">

            <span class="tag-shortname"><?php echo $tagShortName; ?></span>

            <span class="tag-name"><?php echo $tagName; ?></span>

          </li>

        <?php endforeach; ?>

      </ul>

    <?php endif;
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
 * Prints HTML with article breadcrumbs.
 */
function recipe_the_breadcrumb() {
  $delimiter = '>'; // delimiter between crumbs
  $home = 'Home'; // text for the 'Home' link
  $before = '<span class="current">'; // tag before the current crumb
  $after = '</span>'; // tag after the current crumb

  $homeLink = get_bloginfo('url');

  if ( is_single() ) {
    echo '<nav class="breadcrumbs" role="navigation"><a class="breadcrumb" href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';
    if( is_category() ) {
      $thisCat = get_category( get_query_var( 'cat' ), false );

      if( $thisCat->parent != 0 ) {
        echo get_category_parents( $thisCat->parent, true, ' ' . $delimiter . ' ' );
      }
    } elseif( is_single() && !is_attachment() ) {
      $catBase = get_option( 'category_base' );

      if( $catBase ) {
        $catBasePage = get_page_by_title( $catBase );

        echo '<a class="breadcrumb" href="' . get_permalink( $catBasePage->ID ) . '">' . $catBasePage->post_title . '</a> ' . $delimiter . ' ';
      }

      $cat  = get_the_category();
      $cat  = $cat[0];

      echo '<a class="breadcrumb" href="' . get_category_link( $cat ) . '">' . $cat->name . '</a> ' . $delimiter . ' ';

      echo $before . get_the_title() . $after;
    }
    echo '</nav>';
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
