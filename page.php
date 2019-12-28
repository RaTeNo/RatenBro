<?php get_header(); ?>

                        <?php dimox_breadcrumbs(); ?>
                        <?php  if ( have_posts() ) : while ( have_posts() ) : the_post();  ?>
                           <?php get_template_part( 'template-parts/content', 'page' ); ?>
                        <?php endwhile; endif?>                          
                        
                        <?php comments_template(); ?> 

                    </div>

                     <?php //get_sidebar(); ?>
                     

                </div>
            </div>



<?php get_footer(); ?>
