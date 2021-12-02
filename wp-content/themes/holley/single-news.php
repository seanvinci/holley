<?php get_header(); ?>
<main class="site-main">
  <div class="site-main-inner">
    <section class="content-block-bottom content-block-top">
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <article class="news-single">
        <?php if (get_the_title()) echo '<h2>'.get_the_title().'</h2>'; ?>
        <?php if (the_content()) echo '<p>'.the_content().'</p>'; ?>
        <nav class="news-single-nav right">
          <ul class="unstyled-list inline-list">
            <?php
            $prev_post = get_adjacent_post(false, '', true);
            $next_post = get_adjacent_post(false, '', false);
            if(!empty($prev_post)) echo '<li><a class="button button-outline" href="'.get_permalink($prev_post->ID).'">Prev Post</a></li>';
            if(!empty($next_post)) echo '<li><a class="button button-outline" href="'.get_permalink($next_post->ID).'">Next Post</a></li>'; ?>
          </ul>
        </nav>
      </article>
      <?php endwhile; endif; ?>
    </section>
  </div>
</main>
<?php get_footer(); ?>