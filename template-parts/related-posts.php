<?php




    $related_count = 15;
    if ( is_numeric($related_count_mod) && $related_count_mod > -1 ) {
        if ( $related_count_mod > 50 ) $related_count_mod = 50;
        $related_count = $related_count_mod;
    }

    // подготавливаем категории
    $category_ids = array();
    $categories = get_the_category($post->ID);
    if ( $categories ) {
        foreach( $categories as $_category ) {
            $category_ids[] = $_category->term_taxonomy_id;
        }
    }

    // делаем первый запрос
    $related_articles = get_posts(array(
        'category__in'      => $category_ids,
        'posts_per_page'    => $related_count,
        //'orderby'           => 'rand',
        'post__not_in'      => array($post->ID),
    ));

    // если не хватило, добираем рандом
    if ( count($related_articles) < $related_count ) {

        // сколько осталось постов
        $delta = $related_count - count($related_articles);

        // убираем текущий пост + уже выведенные
        $post__not_in = array( $post->ID );
        foreach ( $related_articles as $article ) {
            $post__not_in[] = $article->ID;
        }

        $related_articles_second = get_posts(array(
            'posts_per_page'    => $delta,
            'orderby'           => 'rand',
            'post__not_in'      => $post__not_in,
        ));

        // если все ок, объединяем
        if ( ! empty( $related_articles_second ) ) $related_articles = array_merge( $related_articles, $related_articles_second );
    }

    if (!empty($related_articles)) {

        ?>
       <div class="relateds content-block <?php if(is_single()) {echo "padding_single";} ?>" > 
           <div class="content-title">Вам также может быть интересно</div>
            <div class="articles-content">


                    <?php $k=0; foreach ($related_articles as $post) { $k++;
                        setup_postdata($post);  
						
						remove_filter( 'the_content', 'the_content_add_ad', 110);
    					if($k==1 || $k==5 || $k==3 ||  $k==9 || $k==11|| $k==10|| $k==15) { get_template_part( 'template-parts/posts/content'); }
                          if($k==4 || $k==2 || $k==6|| $k==8 || $k==12){ get_template_part( 'template-parts/posts/content', 'photo');}
                          if($k==7 || $k==14){ get_template_part( 'template-parts/posts/content', 'photo-big');}
                          if($k==13){ get_template_part( 'template-parts/posts/content', 'photo-big-white');}

                   }
                    wp_reset_postdata(); ?>
            </div>
        </div>

        <?php
   }


    /**
     * If yarpp enabled
     */
    /*if ( function_exists( 'related_posts' ) && $related_yarpp_enabled ) {
        related_posts();
    }*/

/*}*/