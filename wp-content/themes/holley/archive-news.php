<?php get_header(); ?>
<main class="site-main">
  <div class="site-main-inner">
    <section class="content-block-bottom content-block-top">
      <header class="content-header">
        <?php if ($post_type) echo '<h2>'.get_post_type_object($post_type)->labels->name.'</h2>'; ?>
      </header>
      <?php
      $blog_posts = array(
        'post_type'      => 'news',
        'posts_per_page' => '-1',
        'post_status'    => 'publish',
        'orderby'        => 'post_date',
        'order'          => 'DESC',
      );
      $wp_query = new WP_Query($blog_posts);
      if ($wp_query->have_posts()): ?>
      <div class="column">
        <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
        <div class="news-wrap column column-max-2">
          <div class="news-wrap-image">
            <a href="<?php the_permalink(); ?>">
              <div class="img-block" style="background-image: url('<?php echo get_the_post_thumbnail_url($postID, 'large'); ?>');"></div>
            </a>
          </div>
          <div class="news-wrap-text">
            <?php if (get_the_title()) echo '<h3>'.get_the_title().'</h3>'; ?>
            <?php if (has_excerpt()) echo '<p>'.get_the_excerpt().'</p>'; ?>
            <a class="button button-outline" href="<?php the_permalink(); ?>">Read More</a>
          </div>
        </div>
        <?php endwhile; ?>
      </div>
      <?php endif; ?>
    </section>
  </div>
</main>
<?php get_footer(); ?>