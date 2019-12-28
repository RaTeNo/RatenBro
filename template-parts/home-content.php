<?php

$root_structure_home_h1 = root_get_option( 'structure_home_h1' );
$root_structure_home_text = root_get_option( 'structure_home_text' );

if ( ! empty($root_structure_home_h1 ) || ! empty($root_structure_home_text) || is_customize_preview() ) {

    echo '<div class="home-content">';

    if ( ! empty($root_structure_home_h1) || is_customize_preview() ) {
        echo '<h1 class="home-header">' . $root_structure_home_h1 . '</h1>';
    }
    if ( ( ! empty($root_structure_home_text) || is_customize_preview()) && ! is_paged() ) {
        echo '<div class="home-text">' . $root_structure_home_text . '</div>';
    }

    echo '</div>';

}
