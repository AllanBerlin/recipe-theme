<?php
/**
 * Template part for displaying the service posts repeater field.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package recipe
 */

$servicePosts = get_field('service_posts');

?>

<?php if( $servicePosts ):
  $servicePostSectionTitle = $servicePosts['section_title'];
  $servicePostsTitle = $servicePosts['title'];
  $servicePostList = $servicePosts['service_post_list'];

  ?>

  <div class="service-posts layout-module" id="<?php echo recipe_remove_special_chars( $servicePostSectionTitle ); ?>">

    <?php if( $servicePostsTitle ): ?>

      <h3 class="title"><strong><?php echo $servicePostsTitle; ?></strong></h3>

    <?php endif; ?>

    <?php if( $servicePostList && count( $servicePostList ) > 0 ): ?>

      <div class="grid grid-three">

        <?php foreach( $servicePostList as $servicePostListItem ):
          $servicePost = $servicePostListItem['service_post'];

          ?>

          <?php if( $servicePost ):
            $post = $servicePost;
            setup_postdata( $post );

            ?>

            <?php get_template_part( 'template-parts/content', 'grid' ); ?>

            <?php wp_reset_postdata(); ?>

          <?php endif; ?>

        <?php endforeach; ?>

      </div>

    <?php endif; ?>

  </div>

<?php endif; ?>