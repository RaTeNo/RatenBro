 <?php
	global $get_meta , $post, $do_not_duplicate;	
		$check_also_no = 1;
		$check_also_position = 'right';
		
		$do_not_duplicate[] = $post->ID;		
		$orig_post = $post;
		
		
		$categories = get_the_category($post->ID);
		$category_ids = array();
		foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
		$args=array('post__not_in' => $do_not_duplicate ,'posts_per_page'=> $check_also_no , 'category__in'=> $category_ids, 'no_found_rows' => 1, 'orderby' => "rand" );

			
		$check_also_query = new wp_query( $args );
		if( $check_also_query->have_posts() ) :?>
		
		<section id="check-also-box" class="post-listing check-also-<?php echo $check_also_position?>">
			<a href="#" id="check-also-close"></a>

			<div class="block-head">
				<div class="h3">Обратите внимание</div>
			</div>

			<?php while ( $check_also_query->have_posts() ) : $check_also_query->the_post()?>
			<div >
				<?php if ( function_exists("has_post_thumbnail") && has_post_thumbnail() ) : ?>			
				<div class="post-thumbnail">
					<a href="<?php the_permalink(); ?>">
						<?php	$image_id = get_post_thumbnail_id();	$image_url = wp_get_attachment_image_src($image_id, 'full');$image_url = $image_url[0];	?>
						<img class="img" src="<?php echo tuts_custom_img('full', 256, 165);?>" alt="">
						<span class="overlay-icon"></span>
					</a>
				</div>
				<?php endif; ?>			
				<div class="post-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></div>
				<div><?php the_excerpt(); ?></div>
			</div>
			<?php endwhile;?>
		</section>
				
				
		<?php	endif;
		$post = $orig_post;
		wp_reset_query();
 ?>