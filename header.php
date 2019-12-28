<!DOCTYPE html>
<html lang="ru-RU" prefix="og: http://ogp.me/ns# article: http://ogp.me/ns/article#  profile: http://ogp.me/ns/profile# fb: http://ogp.me/ns/fb#">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="format-detection" content="telephone=no">
	<?php wp_head(); ?>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <?php echo raten_get_option( 'code_head' ) ?>
</head>
<body itemscope itemtype="http://schema.org/WebPage" <?php body_class(); ?>>
<?php raten_check_license(); ?>
 <header>
       <div class="container">
			<div class="middle-header">        	

				<?php $site_title_text = get_bloginfo( 'name' );
					  $description = get_bloginfo( 'description', 'display' ); 
				if(!is_front_page()) { $root_logotype = raten_get_option( 'logotype_image' );
						if ( ! empty( $root_logotype ) ) {?>
				<a href="<?php bloginfo('siteurl'); ?>" class="logo-block">
					<span class="logo-block__image">
					<?php
						$root_logotype = raten_get_option( 'logotype_image' );
						if ( ! empty( $root_logotype ) ) {
							echo '<img src="' . $root_logotype . '" alt="' . get_bloginfo('name') . '">';
						}?>					
					</span>					
				</a>
				<?php } } else { $root_logotype = raten_get_option( 'logotype_image' );
						if ( ! empty( $root_logotype ) ) {?>
				<div class="logo-block">
					<span class="logo-block__image">
					<?php
						$root_logotype = raten_get_option( 'logotype_image' );
						if ( ! empty( $root_logotype ) ) {
							echo '<img src="' . $root_logotype . '" alt="' . get_bloginfo('name') . '">';
						}?>					
					</span>					
				</div>
				<?php }} ?>
				<div class="menu">
				<?php wp_nav_menu ( array ( 'theme_location'  => 'header-menu',  
						  'menu'            => '',   
						  'container'       => '',   
						  'container_class' => '',   
						  'container_id'    => '',  
						  'menu_class'      => '',   
						  'menu_id'         => '',  
						  'echo'            => true,  
						  'fallback_cb'     => 'wp_page_menu',  
						  'before'          => '',  
						  'after'           => '',  
						  'link_before'     => '',  
						  'link_after'      => '',  
						  'depth'           => 0  ) );  ?>
				</div>

				<div class="header-search"> 
					<form role="search" method="get" id="searchform" action="/"> 
						<div class="search-block"> 
							<input type="search" name="s" placeholder="Что вы хотели найти?"> 
						</div> 
					</form> 
				</div>

				<div class="mobile-menu">
					<a class="menu-btn"><span></span><span></span><span></span></a>

					<div class="main-menu-content">
						<a class="close"></a>

						<?php wp_nav_menu ( array ( 'theme_location'  => 'header-menu',  
							  'menu'            => '',   
							  'container'       => '',   
							  'container_class' => '',   
							  'container_id'    => '',  
							  'menu_class'      => '',   
							  'menu_id'         => '',  
							  'echo'            => true,  
							  'fallback_cb'     => 'wp_page_menu',  
							  'before'          => '',  
							  'after'           => '',  
							  'link_before'     => '',  
							  'link_after'      => '',  
							  'depth'           => 0  ) );  ?>
					</div>
				</div>
			</div>
        </div>
    </header>


    <main>
        <div class="container <?php if(is_single()) {  ?>single_page<?php } ?>" <?php if(is_single()) {  ?> itemscope itemtype="http://schema.org/Article" <?php } ?>>
            <div class="content-bg">               
                

                <div class="content-block" data-sticky_parent>

                    <?php
                        $ad_options = get_option('raten_ad_options');
                        $ad_visible = ( ! empty( $ad_options['r_before_site_content_visible'] ) ) ? $ad_options['r_before_site_content_visible'] : array();

                        $show_ad = false;
                        if ( is_front_page()    && in_array('home', $ad_visible) )      $show_ad = true;
                        if ( is_single()        && in_array('post', $ad_visible) )      $show_ad = true;
                        if ( is_page()          && in_array('page', $ad_visible) )      $show_ad = true;
                        if ( is_archive()       && in_array('archive', $ad_visible) )   $show_ad = true;
                        if ( is_search()        && in_array('search', $ad_visible) )    $show_ad = true;

                        if ( is_single() && in_array('post', $ad_visible) ) {
                            $show_ad = do_show_ad(
                                $post->ID,
                                isset( $ad_options['r_before_site_content_exclude'] ) ? $ad_options['r_before_site_content_exclude'] : array()
                            );
                        }

                        if ( ! wp_is_mobile() && ! empty( $ad_options['r_before_site_content'] ) && $show_ad ) {
                            echo '<div class="b-r b-r--before-site-content">' . $ad_options['r_before_site_content'] . '</div>';
                        }

                        if ( wp_is_mobile() && ! empty( $ad_options['r_before_site_content_mob'] ) && $show_ad ) {
                            echo '<div class="b-r b-r--before-site-content">' . $ad_options['r_before_site_content_mob'] . '</div>';
                        }
                    ?>


                    <div class="content" >
						<form role="search"  method="get" id="searchform" action="<?php echo home_url( '/' ) ?>" >
	                        <div class="search-block search-block--show-mobile">
	                            <input type="text" name="s" placeholder="Поиск по блогу:">
	                            <button></button>
	                        </div>
	                    </form>


                        <div class="rubrics-mobile">
                            <a class="rubrics-show"> <span class="rubrics-mobile__title">Рубрики блога</span></a>

                                 <?php wp_nav_menu ( array ( 'theme_location'  => 'rubrick-menu',  
                                  'menu'            => '',   
                                  'container'       => '',   
                                  'container_class' => '',   
                                  'container_id'    => '',  
                                  'menu_class'      => '',   
                                  'menu_id'         => '',  
                                  'echo'            => true,  
                                  'fallback_cb'     => 'wp_page_menu',  
                                  'before'          => '',  
                                  'after'           => '',  
                                  'link_before'     => '',  
                                  'link_after'      => '',  
                                  'depth'           => 0  ) );  ?>

                        </div>
