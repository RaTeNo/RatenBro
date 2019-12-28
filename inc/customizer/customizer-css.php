<?php


function raten_customizer_css() {

    $raten_skin          = raten_get_option( 'skin' );
    $bg_pattern         = raten_get_option( 'bg_pattern' );

    echo '<style>';

    /********************************************************************
     * Фон
     *******************************************************************/
    // Цвет фона
    $background_color = get_theme_mod( 'background_color', '' );
    if ( ! empty( $background_color ) && ( $background_color == 'fff' || $background_color == 'ffffff') ) {
        echo 'body { background-color: #fff;}';
    }

    // Паттерн
    if ( ! empty( $bg_pattern ) && $bg_pattern != 'no' ) {
        $pattern_url = raten_get_pattern_url( $bg_pattern );
        if ( ! empty( $pattern_url ) ) echo 'body { background-image: url(' . get_bloginfo('template_url') . '/images/backgrounds/' . $pattern_url . ') }';
    }

    // фон шапки
    $header_bg = raten_get_option( 'header_bg' );
    if ( ! empty( $header_bg ) ) {
        echo '@media (min-width: 768px) {';
        echo '.site-header { background-image: url("'. $header_bg .'"); }';
        echo '.site-header-inner {background: none;}';
        echo '}';
    }

    // повторение фона у шапки
    $header_bg_repeat = raten_get_option( 'header_bg_repeat' );
    if ( ! empty( $header_bg_repeat ) ) {
        echo '@media (min-width: 768px) {';
        echo '.site-header { background-repeat: '. $header_bg_repeat .'; }';
        echo '}';
    }

    // расположение фона у шапки
    $header_bg_position = raten_get_option( 'header_bg_position' );
    if ( ! empty( $header_bg_position ) ) {
        echo '@media (min-width: 768px) {';
        echo '.site-header { background-position: '. $header_bg_position .'; }';
        echo '}';
    }





    // отступы у шапки
    $header_padding_top = raten_get_option( 'header_padding_top' );
    if ( ! empty( $header_padding_top ) && $header_padding_top > 0 ) {
        echo '@media (min-width: 768px) {';
        echo '.site-header { padding-top: '. $header_padding_top .'px; }';
        echo '}';
    }

    $header_padding_bottom = raten_get_option( 'header_padding_bottom' );
    if ( ! empty( $header_padding_bottom ) && $header_padding_bottom > 0 ) {
        echo '@media (min-width: 768px) {';
        echo '.site-header { padding-bottom: '. $header_padding_bottom .'px; }';
        echo '}';
    }


    /********************************************************************
     * Цвета
     *******************************************************************/

    // Основной цвет сайта
    $raten_color_main = raten_get_option( 'color_main' );
    if ( ! empty( $raten_color_main ) ) {
        list($r, $g, $b) = sscanf($raten_color_main, "#%02x%02x%02x");
        echo '.page-separator, .pagination .current, .pagination a.page-numbers:hover, .entry-content ul > li:before, .btn, .comment-respond .form-submit input, .mob-hamburger span, .page-links__item, .comments-form button, .article-body ol li:before, .article-body ul li:before, .buttonUp a:after, .feedback .submit button';
        echo ' { background-color: ' . $raten_color_main . ';}';
        echo '.spoiler-box, .entry-content ol li:before, .mob-hamburger, .inp:focus, .search-form__text:focus, .entry-content blockquote, .buttonUp a { border-color: ' . $raten_color_main . ';}';
        echo '.entry-content blockquote:before, .spoiler-box__title:after, .comment-reply-link:hover { color: ' . $raten_color_main . ';}';

       echo ' .buttonUp a { box-shadow: 0 5px 46px rgba('.$r.','.$g.','.$b.', 0.31)}';
        

        if ( $raten_skin == 'skin-1' ) {
            echo '.widget-header, .entry-footer__more { background-color: ' . $raten_color_main . ';}';
        }
    }

    // Основной цвет ссылок
    $color_link = raten_get_option( 'color_link' );
    if ( ! empty( $color_link ) ) {
        echo 'a, .spanlink, .comment-reply-link, .pseudo-link, .raten-pseudo-link, .text_block a, .text-block a { color: ' . $color_link . ';}';
    }

    // Основной цвет ссылок при наведении
    $color_link_hover = raten_get_option( 'color_link_hover' );
    if ( ! empty( $color_link_hover ) ) {
        echo 'a:hover, a:focus, a:active, .spanlink:hover, .comment-reply-link:hover, .pseudo-link:hover { color: ' . $color_link_hover . ';}';
    }

    // Основной цвет текста
    $color_text = raten_get_option( 'color_text' );
    if ( ! empty( $color_text ) ) {
        echo 'body { color: ' . $color_text . ';}';
    }

    // Цвет названия сайта
    $color_logo = raten_get_option( 'color_logo' );
    if ( ! empty( $color_logo ) ) {
        echo '.logo-block__text .site-title, .logo-block__text .site-title a { color: ' . $color_logo . ';}';
    }
    // Цвет фона при наведении
    $color_menu_hover = raten_get_option( 'color_menu_hover' );
    if ( ! empty( $color_menu_hover ) ) {

        echo '.main-menu ul li a:hover, .main-menu ul li.current-menu-item a, .main-menu ul li.current-menu-parent a, .current_page_item a{ background-color: ' . $color_menu_hover . ';}';
    }

    // Фоновый цвет меню
    $color_menu_bg = raten_get_option( 'color_menu_bg' );
    if ( ! empty( $color_menu_bg ) ) {
        echo '.main-navigation, .footer-navigation, .main-navigation ul li .sub-menu, .footer-navigation ul li .sub-menu, .main-menu{ background-color: ' . $color_menu_bg . ';}';
    }

    // Цвет ссылок в меню
    $color_menu = raten_get_option( 'color_menu' );
    if ( ! empty( $color_menu ) ) {
        echo '.main-navigation ul li a, .main-navigation ul li .removed-link, .footer-navigation ul li a, .footer-navigation ul li .removed-link { color: ' . $color_menu . ';}';
    }

     // Цвет карточек
    $color_menu_card = raten_get_option( 'color_menu_card' );
    if ( ! empty( $color_menu_card ) ) {
        echo '.article-item { border-color: ' . $color_menu_card . ';} .article-item a.article-btn{background:' . $color_menu_card . ';}';
    }

    // Цвет карточек при наведении
    $color_menu_card_hover = raten_get_option( 'color_menu_card_hover' );
    if ( ! empty( $color_menu_card_hover ) ) {
        list($r, $g, $b) = sscanf($color_menu_card_hover, "#%02x%02x%02x");
        echo '.article-item:hover a.article-btn {background:' . $color_menu_card_hover . ';}     .article-item:hover { box-shadow: 0px 0px 25px 1px rgba('.$r.','.$g.','.$b.',0.36); border-color: ' . $color_menu_card_hover . ';} .article-item__title a:hover{color:' . $color_menu_card_hover . '}';
    }


    /********************************************************************
     * Типографика
     *******************************************************************/
    $raten_main_fonts            = raten_get_option( 'typography_family' );
    $raten_main_fonts_headers    = raten_get_option( 'typography_headers_family' );

    global $fonts;
    $fonts_css = array();
    foreach ( $fonts as $key => $val ) {
        $fonts_css[$key] = $val['family'];
    }

   /* if ( isset( $fonts_css[$raten_main_fonts] )  ) {
        echo 'body { font-family: '. $fonts_css[$raten_main_fonts] .'; }';
    }*/

    if ( isset( $fonts_css[$raten_main_fonts_headers] )  ) {
        echo '.entry-content h1, .entry-content h2, .entry-content h3, .entry-content h4, .entry-content h5, .entry-content h6, ';
        echo '.entry-image__title h1, .entry-title ';
        echo '{ font-family: '. $fonts_css[$raten_main_fonts_headers] .'; }';
    }

    // Размер шрифта
    $raten_typography_font_size = raten_get_option( 'typography_font_size' );
    if ( ! empty( $raten_typography_font_size ) ) {
        echo '@media (min-width: 576px) { body { font-size: ' . $raten_typography_font_size . 'px;} }';
    }

    // Межстрочный интервал
    $raten_typography_line_height = raten_get_option( 'typography_line_height');
    if ( ! empty( $raten_typography_line_height ) ) {
        echo '@media (min-width: 576px) { body { line-height: ' . $raten_typography_line_height . ';} }';
    }


    /********************************************************************
     * Стрелка вверх
     *******************************************************************/

    // Фоновый цвет стрелки вверх
    $raten_color_arrow_bg = raten_get_option( 'structure_arrow_bg' );
    if ( ! empty( $raten_color_arrow_bg ) ) {
        echo '.scrolltop { background-color: ' . $raten_color_arrow_bg . ';}';
    }

    // Цвет иконки стрелки вверх
    $raten_color_arrow = raten_get_option( 'structure_arrow_color' );
    if ( ! empty( $raten_color_arrow ) ) {
        echo '.scrolltop:after { color: ' . $raten_color_arrow . ';}';
    }

    // Ширина стрелки вверх
    $raten_arrow_width = raten_get_option( 'structure_arrow_width' );
    if ( ! empty( $raten_arrow_width ) ) {
        echo '.scrolltop { width: ' . $raten_arrow_width . 'px;}';
    }

    // Высота стрелки вверх
    $raten_arrow_height = raten_get_option( 'structure_arrow_height' );
    if ( ! empty( $raten_arrow_height ) ) {
        echo '.scrolltop { height: ' . $raten_arrow_height . 'px;}';
    }

    // Выбор иконки стрелки вверх
    $raten_icon = raten_get_option( 'structure_arrow_icon' );
    if ( ! empty( $raten_icon ) ) {
        echo '.scrolltop:after { content: "'. $raten_icon .'"; }';
    }

    // Стрелка вверх на мобильном
    $raten_structure_arrow_mob = raten_get_option( 'structure_arrow_mob' );
    if ( $raten_structure_arrow_mob == 'no' ) {
        echo '@media (max-width: 767px) { .scrolltop { display: none !important;} }';
    }



    echo '</style>';
}
$customizer_styles_position = apply_filters( 'raten_customizer_styles_position', 'wp_head' );
$customizer_styles_priority = apply_filters( 'raten_customizer_styles_priority', 10 );
add_action( $customizer_styles_position, 'raten_customizer_css', $customizer_styles_priority );