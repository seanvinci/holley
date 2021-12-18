<?php get_header(); ?>
<main class="site-main">
  <div class="site-main-inner">
    <section class="content-block-bottom content-block-top">
      <div class="column">
        <?php if (have_rows('content_sections')): ?>
        <?php while (have_rows('content_sections')): the_row();
          $section_heading = get_sub_field('section_heading');
          $section_body = get_sub_field('section_body');
          $section_image = get_sub_field('section_image');
        ?>
        <div class="about-wrap column column-max-2">
          <div class="about-wrap-text">
            <?php if ($section_heading) echo '<h2>'. $section_heading .'</h2>'; ?>
            <?php if ($section_body) echo $section_body; ?>
          </div>
          <?php if ($section_image): ?>
          <div class="about-wrap-image">
            <img src="<?php echo $section_image; ?>" alt="">
          </div>
          <?php endif; ?>
        </div>
        <?php endwhile; endif; ?>
      </div>
    </section>
  </div>
</main>
<?php get_footer(); ?>