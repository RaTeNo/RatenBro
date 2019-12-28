<?php

add_shortcode( 'spoiler', 'shortcode_spoiler' );

function shortcode_spoiler( $atts, $content ) {
    extract( shortcode_atts( array(
        'title'         => 'Показать скрытое содержание',
    ), $atts ) );

    $title = esc_attr( $title );

    $out  = '';
    $out .= '<div class="spoiler-box">';
        $out .= '<div class="spoiler-box__title js-spoiler-box-title">' . $title . '</div>';
        $out .= '<div class="spoiler-box__body">' . $content . '</div>';
        $out .= '</div>';

    return $out;
}


/**
 * Columns
 */
add_shortcode( 'raten-col-6-start', 'shortcode_wpshop_col_6_start' );
add_shortcode( 'raten-col-6-end', 'shortcode_wpshop_col_6_end' );

function shortcode_wpshop_col_6_start( $atts, $content ) {
    return '<div class="raten-row"><div class="raten-col-6">' . shortcode_helper($content) . '</div>';
}

function shortcode_wpshop_col_6_end( $atts, $content ) {
    return '<div class="raten-col-6">' . shortcode_helper($content) . '</div></div><!--.raten-row-->';
}



function shortcode_helper( $content ) {
    return do_shortcode( shortcode_unautop( trim( $content ) ) );
}
