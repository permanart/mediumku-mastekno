<?php
include 'inc/widget.php';
include 'inc/panel.php';
include 'inc/custom.php';
function pd_search_posts_per_page($query) {
    if ( $query->is_search ) {
        $query->set( 'posts_per_page', '6' );
    }
    return $query;
}
add_filter( 'pre_get_posts','pd_search_posts_per_page' );
function register_my_menus() {
register_nav_menus(
array(
'main' => __( 'Header Menu' ),
'bottom' => __( 'Bottom Menu' )
)
);}
?>