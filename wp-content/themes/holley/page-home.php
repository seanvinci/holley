<?php
get_header();
$preheading = get_field('pre_heading');
$heading = get_field('heading');
$video = get_field('video');
$link_text = get_field('link_text');
$link_url = get_field('link_url'); ?>
<main class="site-main">
  <div class="site-main-inner">
    <section class="content-block-bottom content-block-top">
      <div class="home-callout">
        <header class="home-callout-header">
          <?php if ($preheading) echo '<h3>' .$preheading. '</h3>'; ?>
          <?php if ($heading) echo '<h2>' .$heading. '</h2>'; ?>
        </header>
        <?php if ($video): ?>
        <div class="video">
          <?php echo $video; ?>
        </div>
        <?php endif; ?>
        <?php if ($link_text && $link_url) echo '<a class="button button-solid" href="' .$link_url. '" target="_blank">' .$link_text. '</a>'; ?>
      </div>
    </section>
  </div>
</main>
<?php get_footer(); ?>