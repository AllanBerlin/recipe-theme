<?php
/**
 * Template part for displaying category and page sub navigation elements.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package recipe
 */

?>

<div class="content-navigation">
  <?php
  $currentCat = get_queried_object();
  $args = array( 'child_of' => 'work_categories', );
  $categories = get_categories( $args );

  if ( $categories ) : ?>

    <div class="categories">

      <ul class="categories-list submenu-list">
        <?php
        $cat = get_the_category();
        $currentPage = get_cat_name($cat[0]->parent);

        if ( empty( $currentPage ) ) {
          $currentPage = wp_title('', false);
        }

        if ( $currentPage ) : ?>

          <li class="submenu-filter current-page">

            <button type="button" data-filter="*" class="filter-button"><?php echo trim( strtoupper( $currentPage ) ); ?></button>

          </li>

        <?php endif; ?>

        <?php foreach($categories as $category) : ?>

          <li class="submenu-filter">

            <button type="button" data-filter="<?php echo '.category-'.recipe_remove_special_chars( $category->name ); ?>" class="filter-button"><?php echo strtolower( $category->name ); ?></button>

          </li>

        <?php endforeach; ?>

      </ul>

      <button type="button" class="explore-tags" title="explore by tags">explore by tags</button>

    </div>

  <?php else: ?>

    <h3 class="current-page"><?php echo esc_attr( $currentCat->name ); ?></h3>

  <?php endif; ?>
</div>