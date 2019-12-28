<div class="article-item shadow"  itemscope itemtype="http://schema.org/BlogPosting">
    <?php include( 'meta.php' ); ?>
    <div class="article-item__image">
        <?php $thumb = get_the_post_thumbnail($post->ID, 'thumb-big', array('itemprop'=>'image')); if (!empty($thumb)): ?>
        <a href="<?php the_permalink(); ?>" class="article-item__image">
            <?php echo $thumb ?>
        </a>
        <?php endif ?>      
    </div>
    <div class="article-item__info">
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <div class="article-item-stat">
            <span class="info-item"><span class="icon"><img src="<?php bloginfo('template_url'); ?>/images/user-icon.png" alt=""></span><?php the_author(); ?></span>
            <span class="info-item"><span class="icon"><img src="<?php bloginfo('template_url'); ?>/images/category-icon.png" alt=""></span> <?php the_category(', '); ?></span>
            <span class="info-item"><span class="icon"><img src="<?php bloginfo('template_url'); ?>/images/date-icon.png" alt=""></span> <?php the_time("d.m.Y"); ?></span>
        </div>
        <div><?php the_excerpt(""); ?></div>
        <div class="article-item__bottom">  
            <span></span>         
            <a href="<?php the_permalink(); ?>" class="btn btn--blue btn--arrow">Читать дальше</a>
        </div>
    </div>
</div>