<?php
/**
 * в комментариях в ответить ссылку убираем
 */
function comment_reply_link_change_to_span( $link ) {
    global $user_ID;

    if ( get_option( 'comment_registration' ) && ! $user_ID )
        return $link;
    else
        $link = str_replace( '<a', '<span', $link );
        $link = str_replace( '</a>', '</span>', $link );
        $link = str_replace( "rel=\"nofollow\"", "", $link );
        $link = str_replace( 'href=', 'data-href=', $link );
    return $link;
}
add_filter( 'comment_reply_link', 'comment_reply_link_change_to_span' );
