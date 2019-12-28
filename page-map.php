<?php
/*
Template Name: Карта сайта
*/
?>
<?php get_header(); ?>

                        <?php dimox_breadcrumbs(); ?>                   
                        <h1><?php the_title(); ?></h1>                 
                        
                        <div class="article-body text_block">
                            <?php map(); ?>
                        </div>


                    </div>

                     <?php //get_sidebar(); ?>

                </div>
            </div>



<?php get_footer(); ?>
