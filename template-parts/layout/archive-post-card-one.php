 <?php while ( have_posts() ) : the_post();
  get_template_part( 'template-parts/posts/content', 'card-one');
  endwhile; ?>

