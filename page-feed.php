<?php
/*
Template Name: Обратная  связь
*/
?>
<?php get_header(); ?>

                        <?php dimox_breadcrumbs(); ?>
                        <?php  if ( have_posts() ) : while ( have_posts() ) : the_post();  ?>
                               
                        <h1 class="content-title"><?php the_title();  ?></h1>
                        <div class="article-body text_block">
                            <?php the_content(); ?>
                            <?php endwhile; endif?>
                        </div>

                        <?php if($_GET["success"]!="true") { ?> <div class="data feedback">
                    
                            <form  action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" id="contactForm" method="POST" class="comment-form form" >
                                <div class="line exp">обязательные поля помечены *</div>

                                <div class="columns flex">
                                    <div class="line width1of3">
                                        <div class="field">
                                            <input type="text" name="contactForm_name" value="" class="input" placeholder="Ваше Имя">
                                        </div>
                                    </div>

                                    <div class="line width1of3">
                                        <div class="field">
                                            <input type="email" name="contactForm_email" value="" class="input required" placeholder="* E-mail">
                                        </div>
                                    </div>

                                    <div class="line width1of3">
                                        <div class="field">
                                            <input type="text" name="contactForm_title" value="" class="input" placeholder="Тема">
                                        </div>
                                    </div>
                                </div>


                                <div class="line">
                                    <div class="field">
                                        <textarea name="contactForm_comment" class="input comment-field" placeholder="Текст сообщения"></textarea>
                                    </div>
                                </div>


                                <div class="line agree">
                                    Нажимая кнопку «Отправить», вы соглашаетесь с нашей <a target="_blank" href="<?php the_permalink(3); ?>">политикой конфиденциальности</a>
                                </div>


                                <div class="submit ">
                                    <button type="submit" class="submit_btn btn btn--yellow">
                                        <span>Отправить</span>
                                    </button>
                                </div>
                                <input type="hidden" name="action" value="contact_form">
                                <input type="hidden" name="url" value="<?php the_permalink(); ?>">
                                <?php  do_action('google_invre_render_widget_action'); ?>
                            </form>
                            
                        </div>
                        <?php } ?>
                        <?php if($_GET["success"]=="true") { ?><div class="result_form"><p>Спасибо! Скоро мы свяжемся с Вами!</p></div><?php } ?>

                    </div>

                     <?php //get_sidebar(); ?>

                </div>
            </div>



<?php get_footer(); ?>
