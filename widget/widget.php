<?php

/*поиск*/

class WP_search_Widget extends WP_Widget {
     public function __construct() {
           parent::__construct(
                 'widget_WP_search',
                 'Поиск',
                 array( 'description' => __( 'Виджет поиска', 'text_domain' ), )
           );
     }
     public function update( $new_instance, $old_instance ) {
           $instance = array();
           $instance['title'] = strip_tags( $new_instance['title'] );
           return $instance;
     }
     public function form( $instance ) {
?>
           
<?php
     }
     public function widget( $args, $instance ) {
?>
				 <div class="search">
						<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ) ?>" >  
							<div class="input_box">
								<input type="text" name="s" value="" class="input" placeholder="Найдите на сайте то, о чем хотите почитать">
							</div>
							<div class="submit">
								<button type="submit" class="submit_btn">Найти на сайте</button>
							</div>
						</form>
					</div>
<?php
     }
}
add_action( 'widgets_init', function(){
     register_widget( 'WP_search_Widget' );
});
/*подписка*/

class WP_sub_Widget extends WP_Widget {
     public function __construct() {
           parent::__construct(
                 'widget_WP_sub',
                 'Подписка',
                 array( 'description' => __( 'Виджет подписки', 'text_domain' ), )
           );
     }
     public function update( $new_instance, $old_instance ) {
           $instance = array();
           $instance['title'] = strip_tags( $new_instance['title'] );
           return $instance;
     }
     public function form( $instance ) {
?>
           
<?php
     }
     public function widget( $args, $instance ) {
?>

   
					 <div class="subscribe">
						<div class="title">Нравится сайт?<br> Подпишись на новости!</div>
						<div class="desc">Более 800 подписчиков и постоянных читателей сайта, присоединяйся и ты!</div>
						  <form class="" method="post" action="https://smartresponder.ru/subscribe.html" name="SR_form_336773_2" target="_blank">
							<div class="input_box">
								<input type="email" name="field_email" value="" class="input" placeholder="Введите свой e-mail">
							</div>
							<div class="submit">
								<button type="submit" class="submit_btn">Подписаться</button>
							</div>
							<div class="rss"><a href="http://feeds.feedburner.com/magomagiiru" target="_blank"></a></div>
							  <input type="hidden" name="uid" value="705415">
							  <input type="hidden" name="did[]" value="867764">
							  <input type="hidden" name="tid" value="0">
							  <input type="hidden" name="lang" value="ru">
							  <input name="script_url_336773_2" type="hidden" value="https://imgs.smartresponder.ru/on/2660f41fa63a21f8c32d7ea4c07c40d997923909/336773_2">
						</form>
					</div>
<?php
     }
}
add_action( 'widgets_init', function(){
     register_widget( 'WP_sub_Widget' );
});
/*рубрики*/

class WP_category_Widget extends WP_Widget {
     public function __construct() {
           parent::__construct(
                 'widget_WP_category',
                 'Виджет рубрик',
                 array( 'description' => __( 'Виджет рубрик', 'text_domain' ), )
           );
     }
     public function update( $new_instance, $old_instance ) {
           $instance = array();
           $instance['title'] = strip_tags( $new_instance['title'] );
           return $instance;
     }
     public function form( $instance ) {

?>
           <p>
                 <label for="<?php echo $this->get_field_id( 'title' ); ?>">Введите название</label>
                 <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" 
                  name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" 
                  value="<?php echo $instance['title']; ?>" />
           </p>
<?php
     }
     public function widget( $args, $instance ) {
?>
				 <div class="cats block">
						<div class="block_title"><?php echo $instance[ 'title' ]; ?></div>

						<div class="data">
							<ul class="main">
								<?php $args = array(
										'type'                     => 'post',
										'child_of'                 => 0,
										'parent'                   => '',
										'orderby'                  => 'name',
										'order'                    => 'ASC',
										'hide_empty'               => 0,
										'hierarchical'             => 1,
										'exclude'                  => '',
										'include'                  => '',
										'number'                   => 0,
										'taxonomy'                 => 'category',
										'pad_counts'               => false
									);
									$categories = get_categories( $args );
									if( $categories ){
										foreach( $categories as $cat ){ ?>										
										
										<li><a href="<?php echo get_category_link($cat->term_id); ?>"><div class="icon"><img src="<?php echo z_taxonomy_image_url($cat->term_id); ?>" alt=""></div><?php echo $cat->cat_name; ?></a></li>

									<?php 	}
									}?>
							</ul>
						</div>
					</div>
<?php
     }
}
add_action( 'widgets_init', function(){
     register_widget( 'WP_category_Widget' );
});
/*Случайные статьи*/

class WP_random_Widget extends WP_Widget {
     public function __construct() {
           parent::__construct(
                 'widget_WP_random',
                 'Случайные статьи',
                 array( 'description' => __( 'Виджет случаных статей', 'text_domain' ), )
           );
     }
     public function update( $new_instance, $old_instance ) {
           $instance = array();
           $instance['title'] = strip_tags( $new_instance['title'] );
		    $instance['count'] = strip_tags( $new_instance['count'] );
           return $instance;
     }
     public function form( $instance ) {
?>
           <p>
                 <label for="<?php echo $this->get_field_id( 'title' ); ?>">Введите название</label>
                 <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" 
                  name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" 
                  value="<?php echo $instance['title']; ?>" />
           </p>
		     <p>
                 <label for="<?php echo $this->get_field_id( 'count' ); ?>">Количество отображаемых статей</label>
                 <input class="widefat" id="<?php echo $this->get_field_id( 'count' ); ?>" 
                  name="<?php echo $this->get_field_name( 'count' ); ?>" type="text" 
                  value="<?php echo $instance['count']; ?>" />
           </p>
<?php
     }
     public function widget( $args, $instance ) {
?>
				 <div class="articles block">
						<div class="block_title"><?php echo $instance[ 'title' ]; ?></div>

						<div class="data">
							<div class="items">
								<?php	$args = array( 'posts_per_page' => $instance['count'], 'orderby' => 'comment_count', 'order' => 'DESC');   $query1 = new WP_Query($args);
										while($query1->have_posts()) {$query1->the_post(); ?>	
								<div class="item">
									<div class="thumb left"><a href="<?php the_permalink(); ?>">
												<?php if ( has_post_thumbnail() ) {?>
													<?php	$image_id = get_post_thumbnail_id();	$image_url = wp_get_attachment_image_src($image_id, 'full');$image_url = $image_url[0];	?>
													<img src="<?php bloginfo('template_directory'); ?>/timthumb.php?src=<?php echo $image_url; ?>&w=100&h=76&zc=1&q=90" alt="<?php the_title(); ?>"/>
												<?php } else {?>												
													<img src="<?php bloginfo('template_directory'); ?>/timthumb.php?src=<?php echo catch_that_image();  ?>&w=100&h=76&zc=1&q=90" alt="<?php the_title(); ?>"/>
												<?php } ?>
									</a></div>
									<div class="info right">
										<div class="name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
										<div class="date "><?php the_time("d.m.Y  |  H:i"); ?></div>
									</div>
									<div class="clear"></div>
								</div>
							<?php } wp_reset_postdata(); ?>
							</div>
						</div>
					</div>
<?php
     }
}
add_action( 'widgets_init', function(){
     register_widget( 'WP_random_Widget' );
});


/*Баннер*/

class WP_banner_Widget extends WP_Widget {
     public function __construct() {
           parent::__construct(
                 'widget_WP_banner',
                 'Баннер',
                 array( 'description' => __( 'Виджет Баннер', 'text_domain' ), )
           );
     }
     public function update( $new_instance, $old_instance ) {
           $instance = array();
           $instance['title'] = strip_tags( $new_instance['title'] );
		   $instance['img'] = strip_tags( $new_instance['img'] );
		   $instance['link'] = strip_tags( $new_instance['link'] );
           return $instance;
     }
     public function form( $instance ) {
?>
           <p>
                 <label for="<?php echo $this->get_field_id( 'title' ); ?>">Введите название</label>
                 <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" 
                  name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" 
                  value="<?php echo $instance['title']; ?>" />
           </p>
		   <p>
                 <label for="<?php echo $this->get_field_id( 'link' ); ?>">Введите ссылку</label>
                 <input class="widefat" id="<?php echo $this->get_field_id( 'link' ); ?>" 
                  name="<?php echo $this->get_field_name( 'link' ); ?>" type="text" 
                  value="<?php echo $instance['link']; ?>" />
           </p>
		   <p>
                 <label for="<?php echo $this->get_field_id( 'img' ); ?>">Введите ссылку на изображение</label>
                 <input class="widefat" id="<?php echo $this->get_field_id( 'img' ); ?>" 
                  name="<?php echo $this->get_field_name( 'img' ); ?>" type="text" 
                  value="<?php echo $instance['img']; ?>" />
           </p>
<?php
     }
     public function widget( $args, $instance ) {
?>
          
           
          <div class="banner block" id="sticker">
						<div class="title"><?php echo $instance[ 'title' ]; ?></div>
						<div class="data">
							<a href="<?php echo $instance[ 'link' ]; ?> "><img src="<?php echo $instance[ 'img' ]; ?>" alt=""></a>
						</div>
					</div>
<?php
     }
}
add_action( 'widgets_init', function(){
     register_widget( 'WP_banner_Widget' );
});


/*топ комментаоторов*/

class WP_top_Widget extends WP_Widget {
     public function __construct() {
           parent::__construct(
                 'widget_WP_top',
                 'Топ комментаторов',
                 array( 'description' => __( 'Виджет лучших комментаторов', 'text_domain' ), )
           );
     }
     public function update( $new_instance, $old_instance ) {
           $instance = array();
           $instance['title'] = strip_tags( $new_instance['title'] );
           return $instance;
     }
     public function form( $instance ) {
?>
           <p>
                 <label for="<?php echo $this->get_field_id( 'title' ); ?>">Введите название</label>
                 <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" 
                  name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" 
                  value="<?php echo $instance['title']; ?>" />
           </p>
		  
<?php
     }
     public function widget( $args, $instance ) {
?>          
           

					<div class="block users">
						<div class="block_title"><?php echo $instance[ 'title' ]; ?></div>
						<div class="block_data">
							<div class="items">
								
								<?php sp_top_commentator(); ?>
								
								<div class="clear"></div>
							</div>
						</div>
					</div>
<?php
     }
}
add_action( 'widgets_init', function(){
     register_widget( 'WP_banner_Widget' );
});

?>