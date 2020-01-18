<?php
/*
Template Name: Карта сайта
*/
?>
<?php get_header(); ?>
                        <div class="article__content" data-sticky_parent >
                            <div class="article__left-margin <?php if(raten_get_option('structure_home_sidebar')!='none') { ?>with_sidebar <?php } ?>">
                                <?php if(raten_get_option('structure_home_sidebar')!='none') { get_sidebar(); } ?>
                            </div>
                            <div class="article__middle  <?php if(raten_get_option('structure_home_sidebar')!='none') { ?>with_sidebar <?php } ?>">
                            	<?php dimox_breadcrumbs(); ?>
                            	<h1 class="content-title"><?php the_title();  ?></h1>
                                <?php map(); ?>                

                                <?php echo raten_get_option( 'code_after_content' ) ?>
                            </div>                           
                        </div>

                    </div>

                     

                </div>
            </div>

<?php get_footer(); ?>