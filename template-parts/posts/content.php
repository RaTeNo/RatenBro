 <div class="article-list" itemscope itemtype="http://schema.org/BlogPosting">
	<?php include( 'meta.php' ); ?>	
	<a href="<?php the_permalink(); ?>">
		<h2><?php the_title(); ?></h2>
		<div class="text"><?php  the_excerpt(); ?></div>
		<div class="rubrick"><?php $category = get_the_category(); echo $category[0]->cat_name; ?></div>
	</a>
</div>   


