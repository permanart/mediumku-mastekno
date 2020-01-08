<?php
add_theme_support( 'automatic-feed-links' );
function new_excerpt_more( $more ) {
  return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');
function custom_excerpt_length( $length ) {
  return 23;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
function excerpt($limit) {
      $excerpt = explode(' ', get_the_excerpt(), $limit);
      if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'...';
      } else {
        $excerpt = implode(" ",$excerpt);
      } 
      $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
      return $excerpt;
    }
add_filter( 'mce_buttons', 'my_add_next_page_button', 1, 2 );
function my_add_next_page_button( $buttons, $id ){
    if ( 'content' != $id )
        return $buttons;
    array_splice( $buttons, 13, 0, 'wp_page' );
    return $buttons;
}
if ( function_exists( 'add_theme_support' ) ) { 
add_theme_support( 'post-thumbnails' );
}
add_filter( 'wp_title', 'filter_wp_title' );
/**
 * Filters the page title appropriately depending on the current page
 *
 * This function is attached to the 'wp_title' fiilter hook.
 *
 * @uses  get_bloginfo()
 * @uses  is_home()
 * @uses  is_front_page()
 */
function filter_wp_title( $title ) {
  global $page, $paged;

  if ( is_feed() )
    return $title;

  $site_description = get_bloginfo( 'description' );

  $filtered_title = $title . get_bloginfo( 'name' );
  $filtered_title .= ( ! empty( $site_description ) && ( is_home() || is_front_page() ) ) ? ' – ' . $site_description: '';
  $filtered_title .= ( 2 <= $paged || 2 <= $page ) ? ' – ' . sprintf( __( 'Page %s' ), max( $paged, $page ) ) : '';

  return $filtered_title;
}

add_action('init','random_add_rewrite');
function random_add_rewrite() {
   global $wp;
   $wp->add_query_var('random');
   add_rewrite_rule('random/?$', 'index.php?random=1', 'top');
}

add_action('template_redirect','random_template');
function random_template() {
   if (get_query_var('random') == 1) {
           $posts = get_posts('post_type=post&orderby=rand&numberposts=1');
           foreach($posts as $post) {
                   $link = get_permalink($post);
           }
           wp_redirect($link,307);
           exit;
   }
}
function mediumku_footer() { ?>
<div class="container">
  <footer class="footer">
  <p class="pull-left">
    <?php mastekno_about(); ?>
  </p>
<?php if(is_home()){echo"<\x70\x20c\x6c\x61\x73s\x3d\x22p\x75\x6cl\x2dr\x69\x67h\x74\x22>\x54e\x6dp\x6c\x61t\x65 \x42y\x3a \x3c\x61 \x68\x72e\x66\x3d\x22h\x74t\x70s\x3a/\x2f\x77\x77w\x2em\x61\x73t\x65\x6bn\x6f.\x63\x6fm\x2f\x22 \x69d\x3d\x22\x6d\x61\x73t\x65k\x6eo\x22\x20r\x65l\x3d\x22n\x6ff\x6f\x6c\x6co\x77 \x65k\x73t\x65\x72n\x61l\x22\x20t\x69t\x6c\x65\x3d\x22M\x61\x73T\x65k\x6eo\x2ec\x6fm\x22\x3e\x4da\x73\x54e\x6b\x6eo\x2e\x63\x6fm\x3c/\x61>\x2e"; ?><?php }else{echo"\x3cp\x20c\x6ca\x73\x73\x3d\x22p\x75\x6c\x6c-\x72\x69\x67h\x74\x22\x20t\x69t\x6ce\x3d\x22T\x65\x6dp\x6ca\x74e\x20\x42\x79:\x20\x4da\x73T\x65k\x6e\x6f\x2e\x63o\x6d\x22>\x54\x65m\x70\x6ca\x74\x65 \x42y\x3a \x4d\x61\x73T\x65\x6b\x6eo\x2e\x63\x6fm\x3c/\x70>"; } ?>
  </p>
  <div class="clearfix"></div>
  <a class="back-to-top" href="#top">
  <i class="fa fa-angle-up"></i>
  </a>
  </footer>
</div>
<?php if(is_home()){echo"<\x73c\x72i\x70\x74 \x74y\x70e\x3d\x22t\x65x\x74\x2fj\x61\x76\x61\x73\x63\x72i\x70t\x22\x20\x73r\x63=".get_template_directory_uri()."\x2fj\x73\x2fj\x71\x75\x65r\x79.\x6as\x3e<\x2f\x73\x63r\x69\x70t\x3e";}else{echo"\x3cs\x63\x72i\x70t\x20t\x79p\x65=\x22\x74e\x78\x74/\x6aa\x76a\x73c\x72\x69\x70t\x22\x20\x73r\x63=".get_template_directory_uri()."/\x6as\x2f\x6aq\x75e\x72\x79-\x6d\x61\x69\x6e\x2e\x6as\x3e<\x2f\x73\x63\x72\x69p\x74\x3e";} 
wp_footer();
 }
function wpb_set_post_views($postID) {
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
//To keep the count accurate, lets get rid of prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

function wpb_track_post_views ($post_id) {
    if ( !is_single() ) return;
    if ( empty ( $post_id) ) {
        global $post;
        $post_id = $post->ID;    
    }
    wpb_set_post_views($post_id);
}
add_action( 'wp_head', 'wpb_track_post_views');

function wpb_get_post_views($postID){
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}

add_filter( 'the_content', 'prefix_insert_post_ads' );
function prefix_insert_post_ads( $content ) {
  $ad_code = '<div class="ads">'.get_option( 'adssingle' ).'</div>';
  if ( is_single() && ! is_admin() ) {
    return prefix_insert_after_paragraph( $ad_code, 2, $content );
  }
  return $content;
} 
function prefix_insert_after_paragraph( $insertion, $paragraph_id, $content ) {
  $closing_p = '</p>';
  $paragraphs = explode( $closing_p, $content );
  foreach ($paragraphs as $index => $paragraph) {
    if ( trim( $paragraph ) ) {
      $paragraphs[$index] .= $closing_p;
    }
    if ( $paragraph_id == $index + 1 ) {
      $paragraphs[$index] .= $insertion;
    }
  }
  return implode( '', $paragraphs );
}
function get_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $first_img = $matches [1] [0];

  if(empty($first_img)){
    $first_img = get_template_directory_uri()."/images/nothumb.png";
  }
  return $first_img;
}
?>