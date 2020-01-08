<?php 
$orig_post = $post;
global $post;
$categories = get_the_category($post->ID);
if ($categories) {
$category_ids = array();
foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
$args=array(
'category__in' => $category_ids,
'post__not_in' => array($post->ID),
'posts_per_page'=> 3,
'caller_get_posts'=>1
);
$my_query = new wp_query( $args );
if( $my_query->have_posts() ) {
echo '<div id="related-post">
    <div class="row justify-content-center listrecent listrelated">';
while( $my_query->have_posts() ) {
$my_query->the_post();?>
<div class="col-lg-4 col-md-4 col-sm-4">
            <div class="card post height262">
         
<a style="background-image:url(<?php echo get_image(); ?>);" class="thumbimage" href="<?php the_permalink()?>"></a>
<div class="card-block">
                    <h2 class="card-title"><a title="<?php the_title(); ?>" href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2></div>
            </div>
        </div>
<?php
}
echo '</div></div>';
}
}
$post = $orig_post;
wp_reset_query(); ?>