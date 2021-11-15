<?php get_header(); ?>
<main class="site-main">
  <section>
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <h2><?php the_title(); ?></h2>
    <p><?php the_content(); ?></p>
  <?php endwhile; else : ?>
    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
  <?php endif; ?>
  </section>
</main>
<?php get_footer(); ?>