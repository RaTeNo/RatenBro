<?php get_header(); ?>
                        <div class="article__content" data-sticky_parent >
                            <div class="article__left-margin <?php if(raten_get_option('structure_home_sidebar')!='none') { ?>with_sidebar <?php } ?>">
                                <?php if(raten_get_option('structure_home_sidebar')!='none') { get_sidebar(); } ?>
                            </div>
                            <div class="article__middle  <?php if(raten_get_option('structure_home_sidebar')!='none') { ?>with_sidebar <?php } ?>">
                                <?php dimox_breadcrumbs(); ?>
                                <?php  if ( have_posts() ) : while ( have_posts() ) : the_post();  ?>                
                                   <?php get_template_part( 'template-parts/content', 'single' ); ?>
                                <?php endwhile; endif; ?>                               
                                <?php comments_template(); ?>

                                <?php echo raten_get_option( 'code_after_content' ) ?>
                            </div> 

                            <div class="article__right-margin " data-sticky_column>
                                <div class="stic sticky_column">
                                    <script async src="https://usocial.pro/usocial/usocial.js?v=6.1.4" data-script="usocial" charset="utf-8"></script>
                                    <div class="uSocial-Share" data-pid="0a4402c7e63296470bf57ae55da830e5" data-type="share" data-options="round-rect,style3,default,absolute,vertical,size32,eachCounter0,counter0,nomobile" data-social="vk,fb,twi,ok,telegram"></div>
                                </div>
                            </div>
                        </div>

                    </div>

                     

                </div>
            </div>


            <?php get_template_part( 'template-parts/related', 'posts' ); ?>



<?php get_footer(); ?>
