<?php
$theme_version = '1.0.0';
add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails' );

$thumb_big_sizes  = apply_filters( 'raten_thumb_big_sizes', array( 420, 320, true ) );
$thumb_big_sizes  = apply_filters( 'raten_thumb_big2_sizes', array( 400, 450, true ) );
$thumb_wide_sizes = apply_filters( 'raten_thumb_wide_sizes', array( 330, 140, true ) );
if ( function_exists( 'add_image_size' ) ) {
    add_image_size( 'thumb-big', $thumb_big_sizes[0], $thumb_big_sizes[1], $thumb_big_sizes[2]);
    add_image_size( 'thumb-big2', $thumb_big2_sizes[0], $thumb_big2_sizes[1], $thumb_big2_sizes[2]);
    add_image_size( 'thumb-wide', $thumb_wide_sizes[0], $thumb_wide_sizes[1], $thumb_wide_sizes[2] );
}


register_nav_menus( array( 
  'header-menu' => 'Верхнее меню', 
  'footer-menu' => 'Нижнее меню', 
  'rubrick-menu' => 'Меню рубрик'
));

add_theme_support( 'html5', array(
    'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
  ) );

add_theme_support( 'custom-background', apply_filters( 'revelation_custom_background_args', array(
    'default-color' => 'ffffff',
    'default-image' => '',
  ) ) );

function raten_widgets_init() {
  register_sidebar( array(
    'name'          => 'Sidebar',
    'id'            => 'sidebar-1',
    'description'   => 'Добавьте виджеты',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<div class="widget-header">',
    'after_title'   => '</div>',
  ) );
}
add_action( 'widgets_init', 'raten_widgets_init' );


function raten_scripts() {
    global $theme_version;

    $raten_main_fonts            = raten_get_option( 'typography_family' );
    $raten_main_fonts_headers    = raten_get_option( 'typography_headers_family' );

    global $fonts;
    $fonts_style = array();
    foreach ( $fonts as $key => $val ) {
        $fonts_style[$key] = $val['url'];
    }

    if ( isset( $fonts_style[ $raten_main_fonts ] ) ) {
        wp_enqueue_style('google-fonts', $fonts_style[ $raten_main_fonts ], false);
    }

    if ( isset( $fonts_style[ $raten_main_fonts_headers ] ) && $raten_main_fonts != $raten_main_fonts_headers ) {
        wp_enqueue_style('google-fonts-headers', $fonts_style[ $raten_main_fonts_headers ], false);
    }

    $style_version = apply_filters( 'raten_style_version', $theme_version );

  wp_enqueue_style(  'raten-style',   get_template_directory_uri() . '/css/style.css', array(), $style_version );   
  //wp_enqueue_script( 'raten-scripts2', get_template_directory_uri() . '/js/jquery.sticky-kit.min.js.js', array('jquery'), $style_version, true );
  wp_enqueue_script( 'raten-scripts2', get_template_directory_uri() . '/js/hc-sticky.js', array('jquery'), $style_version, true );
  wp_enqueue_script( 'raten-scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), $style_version, true );

  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
  }
}
function raten_admin_scripts() {
    wp_enqueue_style( 'raten-admin-style', get_template_directory_uri() . '/css/style.admin.css', array(), null );
    wp_enqueue_script( 'raten-admin-scripts', get_template_directory_uri() . '/js/admin.js', array('jquery'), null, true );
}
add_action( 'wp_enqueue_scripts', 'raten_scripts' );
add_action( 'admin_enqueue_scripts', 'raten_admin_scripts' );


/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';


require get_template_directory() . '/inc/admin.php';
/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';


/**
 * WPShop.biz functions
 */
require get_template_directory() . '/inc/wpshopbiz.php';

/**
 * Clear WP
 */
require get_template_directory() . '/inc/clear-wp.php';

/**
 * Pseudo links
 */
require get_template_directory() . '/inc/pseudo-links.php';

/**
 * Sitemap
 */
require get_template_directory() . '/inc/sitemap.php';

/**
 * Contact Form
 */


/**
 * Top commentators
 */
require get_template_directory() . '/inc/top-commentators.php';

/**
 * Widgets
 */
require get_template_directory() . '/inc/widgets.php';

/**
 * Shortcodes
 */
require get_template_directory() . '/inc/shortcodes.php';

/**
 * TinyMCE
 */
if ( is_admin() ) {
    require get_template_directory() . '/inc/tinymce.php';
}

/**
 * Comments
 */
require get_template_directory() . '/inc/comments.php';








/**
 * Admin Ad
 */
require get_template_directory() . '/inc/admin-ad.php';



/********************************************************************
 * Editor styles
 *******************************************************************/
function raten_add_editor_style() {
    add_editor_style( 'css/editor-styles.css' );
}
add_action( 'current_screen', 'raten_add_editor_style' );

/********************************************************************
 * Excerpt
 *******************************************************************/
if ( ! function_exists( 'new_excerpt_length' ) ):
function new_excerpt_length($length) {
    return 28;
}
add_filter('excerpt_length', 'new_excerpt_length');
endif;

if ( ! function_exists( 'change_excerpt_more' ) ):
function change_excerpt_more( $more ) {
    return '...';
}
add_filter('excerpt_more', 'change_excerpt_more');
endif;

/********************************************************************
 * Breadcrumbs
 *******************************************************************/
/**
 * Remove last item from breadcrumbs SEO by YOAST
 * http://www.wpdiv.com/remove-post-title-yoast-seo-plugin-breadcrumb/
 */
function adjust_single_breadcrumb( $link_output) {
    if(strpos( $link_output, 'breadcrumb_last' ) !== false ) {
        $link_output = '';
    }
    return $link_output;
}
add_filter('wpseo_breadcrumb_single_link', 'adjust_single_breadcrumb' );

/********************************************************************
 * Микроразметка для изображений
 *******************************************************************/
if ( ! function_exists('microformat_image') ):
    function microformat_image($content) {
        $pattern  = '/<img (.*?) width="(.*?)" height="(.*?)" (.*?)>/i';
        $replace = '<span itemprop="image" itemscope itemtype="https://schema.org/ImageObject"><img itemprop="url image" \\1 width="\\2" height="\\3" \\4/><meta itemprop="width" content="\\2"><meta itemprop="height" content="\\3"></span>';
        $content = preg_replace($pattern, $replace, $content);
        return $content;
    }
    add_filter('the_content', 'microformat_image', 999);
endif;


function raten_options_defaults() {
    $defaults = apply_filters( 'raten_options_defaults', array(
        'header_padding_top'    => 0,
        'header_padding_bottom' => 0,
        'header_width'          => 'fixed',
        'header_inner_width'    => 'full',
        'header_social'         => 'yes',
        'header_html_block_1'   => '',
        'header_html_block_2'   => '',

        'navigation_main_width'         => 'fixed',
        'navigation_main_inner_width'   => 'full',

        'navigation_footer_width'       => 'fixed',
        'navigation_footer_inner_width' => 'full',

        'footer_width'          => 'fixed',
        'footer_inner_width'    => 'full',
        'footer_social'         => 'yes',
       
        'bg_pattern'            => 'no',

        'header_bg'             => '',
        'header_bg_repeat'      => 'no-repeat',
        'header_bg_position'    => 'center center',

        'logotype_image'        => '',
        'header_hide_title'     => 'no',

        'color_main'            => '#5a80b1',
        'color_link'            => '#000',
        'color_link_hover'      => '#000',
        'color_text'            => '#333333',
        'color_logo'            => '#5a80b1',
        'color_menu_bg'         => '#5a80b1',
        'color_menu'            => '#ffffff',

        'footer_copyright'      => '© %year% ' . get_bloginfo( 'name' ),
        'footer_counters'       => '',
        'footer_text'           => '',

        'structure_home_posts'          => 'post-box',
        'structure_home_sidebar'        => 'right',
        'structure_home_h1'             => '',
        'structure_home_text'           => '',
        'structure_home_position'       => 'bottom',

        'structure_single_sidebar'          => 'right',
        'structure_single_thumb'            => 'yes',
        'structure_single_author'           => 'yes',
        'structure_single_date'             => 'yes',
        'structure_single_category'         => 'yes',
        'structure_single_social'           => 'yes',
        'structure_single_excerpt'          => 'yes',
        'structure_single_comments_count'   => 'yes',
        'structure_single_views'            => 'yes',
        'structure_single_tags'             => 'yes',
        'structure_single_social_bottom'    => 'yes',
        'structure_single_related'          => '6',
        'structure_single_comments'         => 'yes',

        'structure_page_sidebar'            => 'right',
        'structure_page_social'             => 'no',
        'structure_page_thumb'              => 'no',
        'structure_page_social_bottom'      => 'no',
        'structure_page_related'            => '6',
        'structure_page_comments'           => 'no',

        'structure_archive_posts'           => 'post-box',
        'structure_archive_sidebar'         => 'right',
        'structure_archive_description'     => 'top',

        'structure_posts_tag'               => 'div',
        'structure_posts_author'            => 'yes',
        'structure_posts_date'              => 'yes',
        'structure_posts_category'          => 'yes',
        'structure_posts_excerpt'           => 'yes',
        'structure_posts_comments'          => 'yes',
        'structure_posts_views'             => 'yes',

        'structure_social_js'               => 'yes',

        'breadcrumbs_display'               => 'yes',
        'breadcrumbs_home_text'             => 'Главная',

        'code_head'                 => '',
        'code_body'                 => '',
        'code_after_content'        => '',

        'typography_family'         => 'roboto',
        'typography_font_size'      => '16',
        'typography_line_height'    => '1.5',
        'typography_headers_family' => 'roboto',

        'structure_arrow'           => 'yes',
        'structure_arrow_bg'        => '#cccccc',
        'structure_arrow_color'     => '#ffffff',
        'structure_arrow_width'     => '50',
        'structure_arrow_height'    => '50',
        'structure_arrow_icon'      => '\f102',
        'structure_arrow_mob'       => 'no',

        'comments_text_before_submit'   => '',
        'comments_date'                 => 'yes',
        'comments_smiles'               => 'yes',
    ) );
    return $defaults;
}

function raten_options() {
    $raten_options = wp_parse_args(
        get_option( 'raten_options', array() ),
        raten_options_defaults()
    );

    return $raten_options;
}

function raten_get_option( $option ) {
    $raten_options = raten_options();

    return ( isset($raten_options[$option]) ) ? $raten_options[$option] : '' ;
}

function raten_site_header_classes() {
    $option = raten_get_option('header_width');
    $out_class = ( $option == 'fixed' ) ? 'container' : '';

    $classes = apply_filters( 'raten_site_header_classes', $out_class );
    echo $classes;
}

/**
 * Breadcrumbs home text
 */
$breadcrumbs_home_text = raten_get_option( 'breadcrumbs_home_text' );
if ( ! empty( $breadcrumbs_home_text ) ) {
    add_filter( 'wpshop_breadcrumbs_home_text', 'wpshop_breadcrumbs_home_text_change' );
}
function wpshop_breadcrumbs_home_text_change() {
    $breadcrumbs_home_text = raten_get_option( 'breadcrumbs_home_text' );
    return $breadcrumbs_home_text;
}


function mytheme_comment($comment, $args, $depth){  
   $GLOBALS['comment'] = $comment; ?>  
      
       <li class="comments__item" id="comment-<?php comment_ID() ?>">
             <div class="comment-body " itemtype="http://schema.org/Comment" itemscope="itemscope" itemprop="comment" id="comment-<?php comment_ID() ?>">
                  <div class="comments__photo"> <?php echo get_avatar( $comment, $size = '38'); ?></div>
                  <div class="comments__info">
                     <?php $url = get_comment_author_url(); 
                            $author = get_comment_author(); 
                            $author = explode(" ", $author);  $author = explode("+", $author[0]); 
                        $url = mb_substr($url, 7); ?>
                      <div class="comments__head" itemprop="dateCreated" content="<?php comment_date('Y-m-d') ?>"><span itemprop="creator"><?php echo $author[0]; ?> </span><span><?php comment_date("d F Y в H:i"); ?></span></div>
                      <div class="comments__text-content">
                          <div itemprop="text" class="text comment__text"><?php if ($comment->comment_approved == '0') : ?>
                                <em>Ваш комментарий ожидает проверки.</em>
                                <br />
                              <?php endif; ?>
                            <?php comment_text(); ?></div>
                          <div class="comments__footer">
                             <?php   comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
                          </div>
                      </div>

                  </div>
              </div>

  						
<?php  
}  



/* Подсчет количества посещений страниц 
---------------------------------------------------------- */  
add_action('wp_head', 'kama_postviews');  
function kama_postviews() {  
  
/* ------------ Настройки -------------- */  
$meta_key       = 'views';  // Ключ мета поля, куда будет записываться количество просмотров.  
$who_count      = 1;            // Чьи посещения считать? 0 - Всех. 1 - Только гостей. 2 - Только зарегистрированых пользователей.  
$exclude_bots   = 1;            // Исключить ботов, роботов, пауков и прочую нечесть :)? 0 - нет, пусть тоже считаются. 1 - да, исключить из подсчета.  
/* СТОП настройкам */  
  
global $user_ID, $post;  
    if(is_singular()) {  
        $id = (int)$post->ID;  
        static $post_views = false;  
        if($post_views) return true; // чтобы 1 раз за поток  
        $post_views = (int)get_post_meta($id,$meta_key, true);  
        $should_count = false;  
        switch( (int)$who_count ) {  
            case 0: $should_count = true;  
                break;  
            case 1:  
                if( (int)$user_ID == 0 )  
                    $should_count = true;  
                break;  
            case 2:  
                if( (int)$user_ID > 0 )  
                    $should_count = true;  
                break;  
        }  
        if( (int)$exclude_bots==1 && $should_count ){  
            $useragent = $_SERVER['HTTP_USER_AGENT'];  
            $notbot = "Mozilla|Opera"; //Chrome|Safari|Firefox|Netscape - все равны Mozilla  
            $bot = "Bot/|robot|Slurp/|yahoo"; //Яндекс иногда как Mozilla представляется  
            if ( !preg_match("/$notbot/i", $useragent) || preg_match("!$bot!i", $useragent) )  
                $should_count = false;  
        }  
  
        if($should_count)  
            if( !update_post_meta($id, $meta_key, ($post_views+1)) ) add_post_meta($id, $meta_key, 1, true);  
    }  
    return true;  
}  

function wp_corenavi() {
  global $wp_query;
  $pages = '';
  $max = $wp_query->max_num_pages;
  if (!$current = get_query_var('paged')) $current = 1;
  $a['base'] = str_replace(999999999, '%#%', get_pagenum_link(999999999));
  $a['total'] = $max;
  $a['current'] = $current;

  $total = 0; //1 - выводить текст "Страница N из N", 0 - не выводить
  $a['mid_size'] = 3; //сколько ссылок показывать слева и справа от текущей
  $a['end_size'] = 1; //сколько ссылок показывать в начале и в конце
  $a['prev_text'] = 'Назад'; //текст ссылки "Предыдущая страница"
  $a['next_text'] = 'Далее'; //текст ссылки "Следующая страница"

  if ($max > 1) echo '<div class="pagination center">';
  if ($total == 1 && $max > 1) $pages = '<span class="pages">Страница ' . $current . ' из ' . $max . '</span>'."\r\n";
  $pa =  $pages . paginate_links($a);

  $pa = str_replace("page/1/", "", $pa);
  echo $pa;
  if ($max > 1) echo '</div>';
}


function dimox_breadcrumbs() {

  /* === ОПЦИИ === */
  $text['home'] = 'Главная'; // текст ссылки "Главная"
  $text['category'] = '%s'; // текст для страницы рубрики
  $text['search'] = ''; // текст для страницы с результатами поиска
  $text['tag'] = 'Записи с тегом "%s"'; // текст для страницы тега
  $text['author'] = 'Статьи автора %s'; // текст для страницы автора
  $text['404'] = 'Ошибка 404'; // текст для страницы 404
  $text['page'] = 'Страница %s'; // текст 'Страница N'
  $text['cpage'] = 'Страница комментариев %s'; // текст 'Страница комментариев N'

  $wrap_before = '<div class="breadcrumbs">'; // открывающий тег обертки
  $wrap_after = '</div><!-- .breadcrumbs -->'; // закрывающий тег обертки
  $sep =  '<span class="sep">/</span>'; // разделитель между "крошками"
  $sep_before = ''; // тег перед разделителем
  $sep_after = ''; // тег после разделителя
  $show_home_link = 1; // 1 - показывать ссылку "Главная", 0 - не показывать
  $show_on_home = 0; // 1 - показывать "хлебные крошки" на главной странице, 0 - не показывать
  $show_current = 0; // 1 - показывать название текущей страницы, 0 - не показывать
  $before = ''; // тег перед текущей "крошкой"
  $after = ''; // тег после текущей "крошки"
  /* === КОНЕЦ ОПЦИЙ === */

  global $post;
  $home_link = home_url('/');
  $link_before = '';
  $link_after = '';
  $link_attr = ' itemprop="url"';
  $link_in_before = '';
  $link_in_after = '';
  $link = $link_before . '<a href="%1$s"' . $link_attr . '>' . $link_in_before . '%2$s' . $link_in_after . '</a>' . $link_after;
  $frontpage_id = get_option('page_on_front');
  $parent_id = $post->post_parent;
  $sep = ' ' . $sep_before . $sep . $sep_after . ' ';

  if (is_home() || is_front_page()) {

    if ($show_on_home) echo $wrap_before . '<a href="' . $home_link . '" class="home">' . $text['home'] . '</a>' . $wrap_after;

  } else {

    echo $wrap_before;
    if ($show_home_link) echo sprintf($link, $home_link, $text['home']);

    if ( is_category() ) {
      $cat = get_category(get_query_var('cat'), false);
      if ($cat->parent != 0) {
        $cats = get_category_parents($cat->parent, TRUE, $sep);
        $cats = preg_replace("#^(.+)$sep$#", "$1", $cats);
        $cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);
        if ($show_home_link) echo $sep;
        echo $cats;
      }
      if ( get_query_var('paged') ) {
        $cat = $cat->cat_ID;
        echo $sep . sprintf($link, get_category_link($cat), get_cat_name($cat)) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
      } else {
        if ($show_current) echo $sep . $before . sprintf($text['category'], single_cat_title('', false)) . $after;
      }

    } elseif ( is_search() ) {
      if (have_posts()) {
        if ($show_home_link && $show_current) echo $sep;
        if ($show_current) echo $before . sprintf($text['search'], get_search_query()) . $after;
      } else {
        if ($show_home_link) echo $sep;
        echo $before . sprintf($text['search'], get_search_query()) . $after;
      }

    } elseif ( is_day() ) {
      if ($show_home_link) echo $sep;
      echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $sep;
      echo sprintf($link, get_month_link(get_the_time('Y'), get_the_time('m')), get_the_time('F'));
      if ($show_current) echo $sep . $before . get_the_time('d') . $after;

    } elseif ( is_month() ) {
      if ($show_home_link) echo $sep;
      echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y'));
      if ($show_current) echo $sep . $before . get_the_time('F') . $after;

    } elseif ( is_year() ) {
      if ($show_home_link && $show_current) echo $sep;
      if ($show_current) echo $before . get_the_time('Y') . $after;

    } elseif ( is_single() && !is_attachment() ) {
      if ($show_home_link) echo $sep;
      if ( get_post_type() != 'post' ) {
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
        printf($link, $home_link . '/' . $slug['slug'] . '/', $post_type->labels->singular_name);
        if ($show_current) echo $sep . $before . get_the_title() . $after;
      } else {
        $cat = get_the_category(); $cat = $cat[0];
        $cats = get_category_parents($cat, TRUE, $sep);
        if (!$show_current || get_query_var('cpage')) $cats = preg_replace("#^(.+)$sep$#", "$1", $cats);
        $cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);
        echo $cats;
        if ( get_query_var('cpage') ) {
          echo $sep . sprintf($link, get_permalink(), get_the_title()) . $sep . $before . sprintf($text['cpage'], get_query_var('cpage')) . $after;
        } else {
          if ($show_current) echo $before . get_the_title() . $after;
        }
      }

    // custom post type
    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
      $post_type = get_post_type_object(get_post_type());
      if ( get_query_var('paged') ) {
        echo $sep . sprintf($link, get_post_type_archive_link($post_type->name), $post_type->label) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
      } else {
        if ($show_current) echo $sep . $before . $post_type->label . $after;
      }

    } elseif ( is_attachment() ) {
      if ($show_home_link) echo $sep;
      $parent = get_post($parent_id);
      $cat = get_the_category($parent->ID); $cat = $cat[0];
      if ($cat) {
        $cats = get_category_parents($cat, TRUE, $sep);
        $cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);
        echo $cats;
      }
      printf($link, get_permalink($parent), $parent->post_title);
      if ($show_current) echo $sep . $before . get_the_title() . $after;

    } elseif ( is_page() && !$parent_id ) {
      if ($show_current) echo $sep . $before . get_the_title() . $after;

    } elseif ( is_page() && $parent_id ) {
      if ($show_home_link) echo $sep;
      if ($parent_id != $frontpage_id) {
        $breadcrumbs = array();
        while ($parent_id) {
          $page = get_page($parent_id);
          if ($parent_id != $frontpage_id) {
            $breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
          }
          $parent_id = $page->post_parent;
        }
        $breadcrumbs = array_reverse($breadcrumbs);
        for ($i = 0; $i < count($breadcrumbs); $i++) {
          echo $breadcrumbs[$i];
          if ($i != count($breadcrumbs)-1) echo $sep;
        }
      }
      if ($show_current) echo $sep . $before . get_the_title() . $after;

    } elseif ( is_tag() ) {
      if ( get_query_var('paged') ) {
        $tag_id = get_queried_object_id();
        $tag = get_tag($tag_id);
        echo $sep . sprintf($link, get_tag_link($tag_id), $tag->name) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
      } else {
        if ($show_current) echo $sep . $before . sprintf($text['tag'], single_tag_title('', false)) . $after;
      }

    } elseif ( is_author() ) {
      global $author;
      $author = get_userdata($author);
      if ( get_query_var('paged') ) {
        if ($show_home_link) echo $sep;
        echo sprintf($link, get_author_posts_url($author->ID), $author->display_name) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
      } else {
        if ($show_home_link && $show_current) echo $sep;
        if ($show_current) echo $before . sprintf($text['author'], $author->display_name) . $after;
      }

    } elseif ( is_404() ) {
      if ($show_home_link && $show_current) echo $sep;
      if ($show_current) echo $before . $text['404'] . $after;

    } elseif ( has_post_format() && !is_singular() ) {
      if ($show_home_link) echo $sep;
      echo get_post_format_string( get_post_format() );
    }

    echo $wrap_after;

  }
} // end of dimox_breadcrumbs()


// Задаем новое расположение изображений по-умолчанию
function classic_smilies_src( $old, $img ) {
	$mythemes = get_template();
	return site_url( "/wp-content/themes/$mythemes/Julianus/{$img}", __FILE__ );
}
 
// Возвращаем сопоставление символов файлам
add_action( 'init', 'classic_smilies_init', 1 );
function classic_smilies_init() {
	global $wpsmiliestrans;
	$wpsmiliestrans = array(
  ':p'        => '20x20-adore.png',
                                                  ':-p'        => '20x20-after_boom.png',  
                                                    '8)'        => '20x20-ah.png',
                                                  '8-)'        => '20x20-amazed.png', 
                                                  ':lang:'      => '20x20-angry.png',
                                                    ':lol:'      => '20x20-bad_smelly.png',
                                                          ':-pp'        => 'smile1.png',  

	);
	add_filter( 'smilies_src', 'classic_smilies_src', 10, 2 );
 
// Отключаем загрузку скриптов и стилей Emoji
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );	
remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );	
remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
add_filter( 'tiny_mce_plugins', 'classic_smilies_rm_tinymce_emoji' );
add_filter( 'the_content', 'classic_smilies_rm_additional_styles', 11 );
add_filter( 'the_excerpt', 'classic_smilies_rm_additional_styles', 11 );
add_filter( 'comment_text', 'classic_smilies_rm_additional_styles', 21 );
}
 
// Отключаем Emoji в визуальном редакторе TinyMCE
function classic_smilies_rm_tinymce_emoji( $plugins ) {
	return array_diff( $plugins, array( 'wpemoji' ) );
}
 
// Убираем размеры смайликов равные 1em (новые задаются для класса .wp-smiley)
function classic_smilies_rm_additional_styles( $content ) {
	return str_replace( 'class="wp-smiley" style="height: 1em; max-height: 1em;"', 'class="wp-smiley"', $content );
}

function searchExcludePages($query) {
	if ($query->is_search) {
		$query->set('post_type', 'post');
	}
 
	return $query;
}
 
add_filter('pre_get_posts','searchExcludePages');


 /* ноиндекс страницы пагинации */
function my_meta_noindex () {
		if (
			is_paged() // Все и любые страницы пагинации
		) {echo "".'<meta name="robots" content="noindex,nofollow" />'."\n";}
	}
add_action('wp_head', 'my_meta_noindex', 3); //

function map($cat_id=0){
  $cats = get_categories("parent=$cat_id&hierarchical=false"); 
  if($cats)
  {
    if($cat_id!=0){
      echo "<div class='sub_category'>";
    } 
    foreach ($cats as $cat) 
    {                         
      echo '<p><strong>Категория:</strong> <a class="title_cat" href="'.get_category_link($cat->cat_ID).'">'.$cat->cat_name.'</a><br></p>';
      $args = array( 'posts_per_page' => -1, 'category__in' => $cat->cat_ID);   $query1 = new WP_Query($args);
      while($query1->have_posts()) {$query1->the_post();
        echo '<p><a href="'.get_permalink().'">'.get_the_title().'</a></p>';
       } wp_reset_postdata();       
      echo "<br>";                        
      map($cat->cat_ID);
    }
    if($cat_id!=0){
      echo "</div>";
    } 
  }
  
}



function prefix_send_email_to_admin() {
   $is_valid = apply_filters('google_invre_is_valid_request_filter', true);
  
   if(!$is_valid )
   {

   }
   else
   {
          $from          = 'no-repeat@mail.com';
          $name = trim($_POST['contactForm_name']);
          $email = trim($_POST['contactForm_email']);
          $comments = trim($_POST['contactForm_comment']);
          $title = trim($_POST['contactForm_title']);
          $url = trim($_POST['url']);
          
          $emailTo = get_option("admin_email"); 
          //$emailTo = "rateno@mail.ru"; 
         
          $subject = "Сообщение с сайта с темой: ".$title;
          $body = "Имя: $name \n\nE-mail: $email \n\nСообщение: $comments";
          $headers = 'From: '.$name.' <'.$from.'>' . "\r\n" . 'Reply-To: ' . $email;
          $emailSent =  wp_mail($emailTo, $subject, $body, $headers); 

          if($emailSent == true){
              //echo 1; 
          }
          else
          {
             // echo 2; 
          }
   }   
   wp_redirect($url.'?success=true');
   //wp_die();    
}
add_action( 'admin_post_nopriv_contact_form', 'prefix_send_email_to_admin' );
add_action( 'admin_post_contact_form', 'prefix_send_email_to_admin' );

require 'plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
  'http://raten.mcdir.ru/moy/theme.json',
  __FILE__, //Full path to the main plugin file or functions.php.
  'raten'
);

function true_loadmore_scripts() {
  wp_enqueue_script( 'true_loadmore', get_stylesheet_directory_uri() . '/js/loadmore.js', array('jquery') );
}
 
add_action( 'wp_enqueue_scripts', 'true_loadmore_scripts' );

function true_load_posts(){
 
  $args = unserialize( stripslashes( $_POST['query'] ) );
  $args['paged'] = $_POST['page'] + 1; // следующая страница
  $args['post_status'] = 'publish';
 
  // обычно лучше использовать WP_Query, но не здесь
  query_posts( $args );
  // если посты есть
  if( have_posts() ) :
    $k==0;
    // запускаем цикл
    while( have_posts() ): the_post(); $k++;
 
      if($k==1 || $k==5 || $k==3 ||  $k==9 || $k==11|| $k==10|| $k==15) { get_template_part( 'template-parts/posts/content'); }
      if($k==4 || $k==2 || $k==6|| $k==8 || $k==12){ get_template_part( 'template-parts/posts/content', 'photo');}
      if($k==7 || $k==14){ get_template_part( 'template-parts/posts/content', 'photo-big');}
      if($k==13){ get_template_part( 'template-parts/posts/content', 'photo-big-white');}
 
    endwhile;
 
  endif;
  die();
}
 
 
add_action('wp_ajax_loadmore', 'true_load_posts');
add_action('wp_ajax_nopriv_loadmore', 'true_load_posts');


## Добавляем блоки в основную колонку на страницах постов и пост. страниц
add_action('add_meta_boxes', 'myplugin_add_custom_box');
function myplugin_add_custom_box(){
    $screens = array('page' );
    global $post;
    if( "page-feed.php"== get_post_meta( $post->ID, '_wp_page_template', true )  ){
        add_meta_box( 'myplugin_sectionid', 'Политика', 'myplugin_meta_box_callback', $screens );
    }
}

// HTML код блока
function myplugin_meta_box_callback( $post, $meta ){
    $screens = $meta['args'];

    // Используем nonce для верификации
    wp_nonce_field( plugin_basename(__FILE__), 'myplugin_noncename' );

    // значение поля
    $value = get_post_meta( $post->ID, 'my_meta_key', 1 );

    // Поля формы для введения данных
    echo '<label for="myplugin_new_field">' . __("Вставьте ссылку на политику конфиденциальности", 'myplugin_textdomain' ) . '</label> ';
    echo '<input type="text" id="myplugin_new_field" name="myplugin_new_field" value="'. $value .'" size="25" />';
}

## Сохраняем данные, когда пост сохраняется
add_action( 'save_post', 'myplugin_save_postdata' );
function myplugin_save_postdata( $post_id ) {
    // Убедимся что поле установлено.
    if ( ! isset( $_POST['myplugin_new_field'] ) )
        return;

    // проверяем nonce нашей страницы, потому что save_post может быть вызван с другого места.
    if ( ! wp_verify_nonce( $_POST['myplugin_noncename'], plugin_basename(__FILE__) ) )
        return;

    // если это автосохранение ничего не делаем
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) 
        return;

    // проверяем права юзера
    if( ! current_user_can( 'edit_post', $post_id ) )
        return;

    // Все ОК. Теперь, нужно найти и сохранить данные
    // Очищаем значение поля input.
    $my_data = sanitize_text_field( $_POST['myplugin_new_field'] );

    // Обновляем данные в базе данных.
    update_post_meta( $post_id, 'my_meta_key', $my_data );
}