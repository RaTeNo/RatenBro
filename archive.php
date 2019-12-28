<?php get_header(); ?>

                        <h1><?php single_cat_title(); ?></h1>
                        <div class="articles-content">   
                        	<?php if ( have_posts() ) : ?>                                   
								<?php get_template_part('template-parts/layout/archive', raten_get_option( 'structure_home_posts' )); ?>
							<?php else : ?>
								<?php get_template_part( 'template-parts/content', 'none' ); ?>
							<?php endif; ?>
                        </div>
                        <?php if (  $wp_query->max_num_pages > 1 ) : ?>
                            <script id="true_loadmore">
                            var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
                            var true_posts = '<?php echo serialize($wp_query->query_vars); ?>';
                            var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
                            </script>
                        <?php endif; ?>
                    </div>                   
                </div>
            </div>
            
<?php get_footer(); ?>

