<?php get_header(); ?>
                        
                        
                        <?php  if ( have_posts() ) : ?>
						<h1>По вашему запросу "<?php  echo $_GET["s"];?>" найдено:</h1>
                        <div class="articles-content">
                             <?php get_template_part('template-parts/layout/archive', raten_get_option( 'structure_home_posts' )); ?>
                        </div>
                        <?php if (function_exists('wp_corenavi')) wp_corenavi(); ?>
                        <?php else: ?>  
                        <h1>По вашему запросу "<?php  echo $_GET["s"];?>" ничего не найдено...</h1>
                        <div class="article-body text_block">
							<p>Попробуйте изменить запрос или воспользуйтесь картой сайта.</p>
                           <?php  get_template_part( 'template-parts/content', 'none' ); ?>
                        </div>
						<?php get_template_part( 'template-parts/related', 'posts' ) ?>
                        <?php  endif; ?>  
                    </div>                    
                    <?php get_sidebar(); ?> 
                </div>
            </div>
            
<?php get_footer(); ?>