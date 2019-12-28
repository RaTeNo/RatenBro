<?php

/********************************************************************
 * Convert to options
 *******************************************************************/
$raten_theme = wp_get_theme();
$raten_ver = $raten_theme->get( 'Version' );

if ( version_compare( $raten_ver, '2.1.0' ) <= 0 ) {
    update_to_2_1_0();

}

function update_to_2_1_0() {
    // already updated ?
    $raten_options_update = get_option( 'raten_options_update' );
    if ( $raten_options_update == '2.1.0' ) return;

    $options = get_option( 'raten_options', array() );

    $transform = array(
        'raten_color_main'           => 'color_main',
        'raten_color_link'           => 'color_link',
        'raten_color_link_hover'     => 'color_link_hover',
        'raten_color_text'           => 'color_text',
        'raten_color_logo'           => 'color_logo',
        'raten_color_menu_bg'        => 'color_menu_bg',
        'raten_color_menu'           => 'color_menu',

        'raten_logotype'             => 'logotype_image',
        'raten_header_hide_title'    => 'header_hide_title',

        'raten_structure_footer_copyright'   => 'footer_copyright',
        'raten_structure_footer_counters'    => 'footer_counters',

        'raten_structure_home_posts'         => 'structure_home_posts',
        'raten_structure_home_sidebar'       => 'structure_home_sidebar',
        'raten_structure_home_h1'            => 'structure_home_h1',
        'raten_structure_home_text'          => 'structure_home_text',
        'raten_structure_home_position'      => 'structure_home_position',

        'raten_structure_single_sidebar'         => 'structure_single_sidebar',
        'raten_structure_single_thumb'           => 'structure_single_thumb',
        'raten_structure_single_author'          => 'structure_single_author',
        'raten_structure_single_date'            => 'structure_single_date',
        'raten_structure_single_category'        => 'structure_single_category',
        'raten_structure_single_social'          => 'structure_single_social',
        'raten_structure_single_excerpt'         => 'structure_single_excerpt',
        'raten_structure_single_comments_count'  => 'structure_single_comments_count',
        'raten_structure_single_views'           => 'structure_single_views',
        'raten_structure_single_tags'            => 'structure_single_tags',
        'raten_structure_single_social_bottom'   => 'structure_single_social_bottom',
        'raten_structure_single_related'         => 'structure_single_related',
        'raten_structure_single_comments'        => 'structure_single_comments',
        'raten_structure_single_comments_date'   => 'comments_date',
        'raten_structure_single_comments_smiles' => 'comments_smiles',

        'raten_structure_page_sidebar'           => 'structure_page_sidebar',
        'raten_structure_page_related'           => 'structure_page_related',
        'raten_structure_page_comments'          => 'structure_page_comments',

        'raten_structure_archive_posts'          => 'structure_archive_posts',
        'raten_structure_archive_sidebar'        => 'structure_archive_sidebar',
        'raten_structure_archive_description'    => 'structure_archive_description',

        'raten_structure_posts_tag'          => 'structure_posts_tag',
        'raten_structure_posts_author'       => 'structure_posts_author',
        'raten_structure_posts_date'         => 'structure_posts_date',
        'raten_structure_posts_category'     => 'structure_posts_category',
        'raten_structure_posts_excerpt'      => 'structure_posts_excerpt',
        'raten_structure_posts_comments'     => 'structure_posts_comments',
        'raten_structure_posts_views'        => 'structure_posts_views',

        'raten_structure_code_head'          => 'code_head',
        'raten_structure_code_body'          => 'code_body',
        'raten_structure_code_after_content' => 'code_after_content',

        'raten_main_fonts'               => 'typography_family',
        'raten_typography_font_size'     => 'typography_font_size',
        'raten_typography_line_height'   => 'typography_line_height',
        'raten_main_fonts_headers'       => 'typography_headers_family',
    );

    foreach ( $transform as $k => $v ) {
        $mod = get_theme_mod($k, false);
        if ( $mod ) $options[$v] = $mod;
        //remove_theme_mod( $k );
    }

    update_option( 'raten_options', $options );
    update_option( 'raten_options_update', '2.1.0' );
}