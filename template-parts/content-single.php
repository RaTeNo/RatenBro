
                        <?php include( 'posts/meta.php' ); ?>
                        <div class="articles-content"> 
                            <div class="article-main">                               
								<span class="article-main__top">
                                    <span class="article-main__top-left">
                                        <span class="text-icon"><span class="icon"><img src="<?php bloginfo('template_url'); ?>/images/user-icon.png" alt=""></span><?php the_author(); ?></span>
                                        <span class="text-icon"><span class="icon"><img src="<?php bloginfo('template_url'); ?>/images/date-icon.png" alt=""></span><?php the_time("d.m.Y"); ?></span>
                                        <span class="text-icon text-icon--comment"><span class="icon"><img src="<?php bloginfo('template_url'); ?>/images/comments-icon.png" alt=""></span><?php comments_number("0", "1", "%"); ?></span>
                                    </span>
                                    <span class="article-main__top-right">
                                        <span class="text-icon"><span class="icon"><img src="<?php bloginfo('template_url'); ?>/images/category-icon.png" alt=""></span><?php the_category(', '); ?></span>
                                    </span>
                                </span>
                                <span class="article-main__bottom">                                   
                                    <span class="text-icon"><span class="icon"><img src="<?php bloginfo('template_url'); ?>/images/category-icon.png" alt=""></span><?php $category = get_the_category(); echo $category[0]->cat_name; ?></span>
                                </span>
                            </div>

                            <h1 class="article-main__title"><?php the_title(); ?></h1>
                        </div>                       

                        <div class="article-body text_block">
                            <?php the_content(); ?>                            
                        </div>
