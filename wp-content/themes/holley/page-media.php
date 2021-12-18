<?php get_header(); ?>
<main class="site-main">
  <div class="site-main-inner">
    <section class="content-block-bottom content-block-top" id="videos">
      <header class="content-header">
        <h2>Videos</h2>
        <nav class="media-nav">
          <a href="#videos">Videos</a>
          <span>/</span>
          <a href="#photos">Photos</a>
        </nav>
      </header>
      <?php if (have_rows('videos')): ?>
      <div class="column column-max-2">
        <?php while (have_rows('videos')): the_row();
          $video = get_sub_field('video');
        ?>
        <div class="media-wrap">
          <?php
          if ($video) {
            preg_match('/src="(.+?)"/', $video, $matches);
            $src = $matches[1];

            $params = array(
              'enablejsapi'    => 1,
              'iv_load_policy' => 3,
              'rel'            => 0,
              'modestbranding' => 1,
            );

            $new_src = add_query_arg($params, $src);
            $video = str_replace($src, $new_src, $video);
          } ?>
          <div class="video"><?php echo $video; ?></div>
        </div>
        <?php endwhile; ?>
      </div>
      <?php endif; ?>
    </section>
    <hr>
    <section class="content-block-bottom content-block-top" id="photos">
      <header class="content-header">
        <h2>Photos</h2>
        <nav class="media-nav">
          <a href="#videos">Videos</a>
          <span>/</span>
          <a href="#photos">Photos</a>
        </nav>
      </header>
      <?php if (have_rows('photos')): ?>
      <div class="column column-max-2">
        <?php while (have_rows('photos')): the_row();
          $photo = get_sub_field('photo');
        ?>
        <div class="media-wrap">
          <div class="photo">
            <a href="<?php echo $photo; ?>" target="_blank"><img src="<?php echo $photo; ?>" alt=""></a>
          </div>
        </div>
        <?php endwhile; ?>
      </div>
      <?php endif; ?>
    </section>
  </div>
</main>
<?php get_footer(); ?>