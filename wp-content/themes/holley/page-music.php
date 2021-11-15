<?php get_header(); ?>
<main class="site-main">
  <section class="content-block-bottom content-block-top">
    <header class="content-header">
      <h2><?php the_title(); ?></h2>
    </header>
    <div class="column column-max-3">
      <?php if (have_rows('albums')): ?>
      <?php while (have_rows('albums')): the_row();
        $album_cover = get_sub_field('album_cover');
        $album_title = get_sub_field('album_title');
        $album_link_url = get_sub_field('album_link_url');
      ?>
      <div class="media-wrap">
        <div class="album">
          <a href="<?php echo $album_link_url; ?>">
            <img src="<?php echo $album_cover; ?>" alt="<?php echo $album_title; ?>">
          </a>
        </div>
        <h4>
          <strong><?php echo $album_title; ?></strong><br/>
          <a href="<?php echo $album_link_url; ?>">Stream/Buy</a>
        </h4>
      </div>
      <?php endwhile; endif; ?>
    </div>
  </section>
</main>
<?php get_footer(); ?>