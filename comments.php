

                             <?php if ( have_comments() ) : ?>
                                <div class="content-title">Комментарии <span><?php comments_number("0", "1", "%"); ?></span></div>
                                <ul class="comments">
                                    <?php wp_list_comments('type=comment&callback=mytheme_comment&style=ul'); ?>
                                </ul>
                            
                            <?php else :  ?>   

                            <?php endif; ?>

                            <?php if ('open' == $post->comment_status) : ?>
                            <div class="contact-form contact-form_comment"  id="respond">
                                <div id="reply-title" class="comment-reply-title content-title h2">Оставить комментарий<span><?php cancel_comment_reply_link("Отменить ответ"); ?></span></div>                                
                                <form id="commentform" class="comments-form form" method="post" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php">
                                    <?php if (!is_user_logged_in() ) { ?>
                                    <div class="form-top">
                                        <input type="text" placeholder="Ваше имя:" name="author">
                                        <input type="email" placeholder="Ваш е-mail:"  name="email">
                                        <input type="text" placeholder="Ваш сайт:" name="url">
                                    </div>
                                    <?php } ?>

                                   <textarea id="comment" class="input comment-field" tabindex="1" aria-required="true" name="comment" placeholder="Ваш комментарий"></textarea>

                                    <div class="form-bottom">
                                        <div class="form-bottom__left">
                                            <!-- <div class="form-smiles">
                                                <script type="text/javascript">
                                                    function addsmile($smile){
                                                    document.getElementById('comment').value=document.getElementById('comment').value+' '+$smile+' ';
                                                    }
                                                    </script>
                                                <?php
                                                    global $wpsmiliestrans;
                                                    $wp_smilies = array(
                                                    ':p'        => '20x20-adore.png',
                                                  ':-p'        => '20x20-after_boom.png',  
                                                    '8)'        => '20x20-ah.png',
                                                  '8-)'        => '20x20-amazed.png', 
                                                  ':lang:'      => '20x20-angry.png',
                                                    ':lol:'      => '20x20-bad_smelly.png',
                                                          ':-pp'        => 'smile1.png',  
                                            
                                                                                
                                                  
                                                    );
                                                    $dm_showsmiles = '';
                                                    $dm_smiled = array();
                                                    foreach ($wp_smilies as $tag => $dm_smile) {
                                                        if (!in_array($dm_smile,$dm_smiled)) {
                                                            $dm_smiled[] = $dm_smile;
                                                            $tag = str_replace(' ', '', $tag);
                                                            $dm_showsmiles .= '<img class="wp-smiley" src="'.get_bloginfo('wpurl').'/wp-content/themes/raten/Julianus/'.$dm_smile.'" alt="'.$tag.'" onclick="addsmile(\''.$tag.'\');"/> ';
                                                        }
                                                    }
                                                    echo ''.$dm_showsmiles.'<div class="clear"></div>';
                                                    ?>
                                            </div> -->
                                            <div class="checkbox-block" style="display:none;">
                                               <?php  if(function_exists("show_subscription_checkbox")) { show_subscription_checkbox(); } ?>
                                            </div>
                                            <?php comment_id_fields(); ?> <?php do_action('comment_form', $post->ID); //do_action('google_invre_render_widget_action');?>
                                        </div>

                                        <button type="submit" class="btn btn--yellow">Отправить</button>
                                         
                                    </div>
                                </div>
                            <?php else : // comments are closed ?>                                                                
                            <?php endif; ?>         
