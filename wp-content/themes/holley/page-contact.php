<?php get_header(); ?>
<main class="site-main">
  <div class="site-main-inner">
    <section class="content-block-bottom content-block-top tac">
      <header class="content-header">
        <h2><?php the_title(); ?></h2>
      </header>
      <div class="column">
        <div><?php echo get_field('contact_wysiwyg'); ?></div>
      </div>
    </section>
  </div>
</main>
<?php get_footer(); ?>