<?php get_header(); ?>
<div class="site-content">
<div class="container">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="row">
<div class="col-lg-2 col-md-2">
<div class="share hidden-xs-down">
<p class="sharecolour"> Share </p>
<ul class="shareitnow">
<li>
<a href="https://twitter.com/share?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>" rel="nofollow noreferrer noopener external" target="_blank">
<i class="fa fa-twitter"></i>
</a>
</li>
<li>
<a href="http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" rel="nofollow noreferrer noopener external" target="_blank"><i class="fa fa-facebook"></i>
</a>
</li>
</ul>
<div class="sep"></div>
<div class="hidden-xs-down">
	<p>Reply</p>
	<ul>
		<li>
			<a class="smoothscroll" href="#comments"><?php echo get_comments_number($post->ID); ?><br> <svg class="svgIcon-use" width="29" height="29" viewBox="0 0 29 29"><path d="M21.27 20.058c1.89-1.826 2.754-4.17 2.754-6.674C24.024 8.21 19.67 4 14.1 4 8.53 4 4 8.21 4 13.384c0 5.175 4.53 9.385 10.1 9.385 1.007 0 2-.14 2.95-.41.285.25.592.49.918.7 1.306.87 2.716 1.31 4.19 1.31.276-.01.494-.14.6-.36a.625.625 0 0 0-.052-.65c-.61-.84-1.042-1.71-1.282-2.58a5.417 5.417 0 0 1-.154-.75zm-3.85 1.324l-.083-.28-.388.12a9.72 9.72 0 0 1-2.85.424c-4.96 0-8.99-3.706-8.99-8.262 0-4.556 4.03-8.263 8.99-8.263 4.95 0 8.77 3.71 8.77 8.27 0 2.25-.75 4.35-2.5 5.92l-.24.21v.32c0 .07 0 .19.02.37.03.29.1.6.19.92.19.7.49 1.4.89 2.08-.93-.14-1.83-.49-2.67-1.06-.34-.22-.88-.48-1.16-.74z"></path></svg></a>
		</li>
	</ul>
</div>
</div>
</div>
<div class="col-lg-8 col-lg-offset-2 col-md-10 post">
<div class="row post-top-meta hidden-md-down">
<div class="col-md-2 col-xs-12"> 
<img class="avatar avatar-72 photo" src="<?php echo esc_url(get_avatar_url(get_the_author_meta( 'ID' ), array('size' => 450))); ?>" height="72" width="72"/>
</div>
<div class="col-md-10 col-xs-12">
<a class="text-capitalize link-dark" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
<?php the_author(); ?>
<span class="btn follow">Follow</span></a>
<span class="author-description d-block"><?php the_author_meta('description'); ?>
</span>
</div>
</div>
<div class="mainheading">
<h1 class="posttitle">
<?php the_title(); ?>
</h1>
<p>
<span class="post-date">
<time class="post-date">
<?php the_time('j F Y'); ?>
</time>
</span>
<span class="dot"></span>
<?php
$mycontent = $post->post_content; // wordpress users only
$word = str_word_count(strip_tags($mycontent));
$m = floor($word / 200);
$s = floor($word % 200 / (200 / 60));
$est = $m . ' min read' . ($m == 1 ? '' : '');
?>
<span class="post-read"><?php echo $est; ?></span>
</p>
</div>
<?php $featured = get_option('featured'); if($featured!=='' && $featured!=='0') { if ( has_post_thumbnail() ) { ?> <div class="thm"><?php the_post_thumbnail('',array('title' => ''.get_the_title().'')); ?></div> <?php } else { } } ?>
<article class="article-post">

<div class="margb-1" id="item-post">
	<?php the_content(); ?>
</div>


</article>
<div class="mt-3 hidden-lg-up share-horizontal">
<p> Share </p>
<ul class="shareitnow">
<li>
<a href="https://twitter.com/share?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>" rel="nofollow noreferrer noopener external" target="_blank">
<i class="fa fa-twitter"></i>
</a>
</li>
<li>
<a href="http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" rel="nofollow noreferrer noopener external" target="_blank"><i class="fa fa-facebook"></i>
</a>
</li>

</ul>
<div class="clearfix"></div>
</div>
<div class="row post-top-meta hidden-lg-up">
<div class="col-md-2 col-xs-4">
<?php
$user = wp_get_current_user();
 
if ( $user ) :
    ?>
    <img class="avatar avatar-72 photo" data-src="<?php echo esc_url( get_avatar_url( $user->ID ) ); ?>"" src="<?php echo esc_url( get_avatar_url( $user->ID ) ); ?>" height="72" width="72"/>
<?php endif; ?>

</div>
<div class="col-md-10 col-xs-8">
<?php the_author(); ?>
<span class="author-description d-block">
<?php the_author_meta('description'); ?>
            </span>
</div>
</div>
<div class="after-post-tags">

<?php the_category() ?>
</div>
<div class="row mb-5 prevnextlinks justify-content-center align-items-center">
<div class="col-md-6 rightborder pl-0">
	<div class="thepostlink"> 

     <?php previous_post_link('
			« %link
			', '%title', false);
		?>
     </div></div>
<div class='col-md-6 text-right pr-0'>
<div class='thepostlink'>
       <?php next_post_link('
			%link  »
			', '%title', false);
		?>


</div>
</div>
</div>
</div>
</div>


</div>


<?php endwhile; endif; ?>
<div class="graybg">
<div class="container"> <div class="row justify-content-center listrecent listrelated">
<?php get_template_part('related'); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="col-md-8"><div id="comments" class="comments-area">
<?php echo get_post_meta($post->ID, "embed", true); ?>
<?php comments_template(); ?>
</div></div>
<?php endwhile; endif; ?>
</div></div></div>


</div>
</div>
</div>

<?php get_template_part('sidebar_right'); ?>
</div>
<?php get_footer(); ?>