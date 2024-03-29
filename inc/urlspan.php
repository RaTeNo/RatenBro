<?php


/* замена ссылок на боки span */
if ( ! function_exists('replace_link') ) {
    function replace_link($content) {
        $pattern = '/\[urlspan\](.*?)<a (.*?)href=[\"\']([a-zA-Z]+:\/\/)?(.*?)[\"\'](.*?)>(.*?)<\/a>(.*?)\[\/urlspan\]/i';
        $content = preg_replace($pattern, "$1<span class='spanlink' onclick=\"GoTo('_$4')\"><span>$6</span></span>$7", $content);
        return $content;
    }
    add_filter('the_content', 'replace_link');
}

/**
 * GoTo Javascript
 */
function goto_script() {
    ?>
    <script type="text/javascript">function GoTo(link){window.open(link.replace("_","http://"));}</script>
    <?php
}
add_action("wp_footer", "goto_script");


/**
 * подключаем кнопку для визуального редактора
 */
if (file_exists(TEMPLATEPATH . '/inc/urlspan/urlspan.php')) {
    require_once(TEMPLATEPATH . '/inc/urlspan/urlspan.php');
}