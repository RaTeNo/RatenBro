<!-- Информация -->
<meta itemprop="author" content="<?php the_author(); ?>">
<meta itemprop="datePublished" content="<?php the_time("Y-m-d"); ?>">
<div itemprop="articleSection" style="display:none;"><?php the_category(', '); ?></div>
<meta itemprop="headline" content="<?php the_title(); ?>">
<meta itemprop="articleBody" content="<?php echo wp_trim_words( get_the_content(), 40 );?>">
<?php	$image_id = get_post_thumbnail_id();	$image_url = wp_get_attachment_image_src($image_id, 'full');$image_url = $image_url[0];	?>
<meta content="<?php echo $image_url;?>" itemprop="image">

<meta itemprop="dateModified" content="<?php the_modified_date("Y-m-d") ?>">
<meta itemscope itemprop="mainEntityOfPage" itemType="https://schema.org/WebPage" itemid="<?php the_permalink(); ?>" content="<?php the_title(); ?>">								
  <div itemprop="publisher" itemscope itemtype="https://schema.org/Organization" style="display:none">
	 <div itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
		<img alt="<?php echo get_bloginfo('name'); ?>" itemprop="url image" src="<?php bloginfo('template_directory'); ?>/images/logo.png">
		<meta itemprop="width" content="73">
	</div>
	<meta itemprop="telephone" content="-">
	<meta itemprop="address" content="Россия">
	<meta itemprop="name" content="<?php echo get_bloginfo('name'); ?>">
</div>
<!-- Информация -->