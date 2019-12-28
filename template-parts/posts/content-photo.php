<?php	$image_id = get_post_thumbnail_id();	$image_url = wp_get_attachment_image_src($image_id, 'thumb-big2');$image_url = $image_url[0];	?> 

 <div class="article-list photo" itemscope itemtype="http://schema.org/BlogPosting"  style="background-image:url(<?php echo $image_url; ?>);">
	<?php include( 'meta.php' ); ?>	
	<a href="<?php the_permalink(); ?>">
		<h2><?php the_title(); ?></h2>
		<div class="text"><?php  the_excerpt(); ?></div>
		<div class="rubrick"><?php $category = get_the_category(); echo $category[0]->cat_name; ?></div>
	</a>
</div>   




 