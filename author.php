<?php get_header(); ?>
    <?php
    $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
    ?>
<div class="site-content" style="margin-top: 118px; height: auto !important; min-height: 0px !important;">

	<div class="mainheading homecover forauthor">
	    <div class="row post-top-meta authorpage justify-content-md-center justify-content-lg-center">
	        <div class="col-md-8 col-md-8 col-xs-12 text-center">
	            <h1><?php $fname = get_the_author_meta('first_name');$lname = get_the_author_meta('last_name');$full_name = '';if( empty($fname)){    $full_name = $lname; } elseif( empty( $lname )){     $full_name = $fname; } else {    $full_name = "{$fname} {$lname}"; } echo $full_name; ?></h1>
	            <span class="author-description text-white mt-3 mb-3 d-block"><?php echo $curauth->user_description; ?></i></span>
	            <p class="d-block"> <a target="_blank" href="https://www.facebook.com/<?php echo get_the_author_meta('facebook'); ?>"><i class="fa fa-facebook"></i></a> &nbsp; <a target="_blank" href="https://www.twitter.com/<?php echo get_the_author_meta('twitter'); ?>"><i class="fa fa-twitter"></i></a></p>
	            <p class="margbotneg100"><img class="author-thumb" src="<?php echo esc_url(get_avatar_url(get_the_author_meta( 'ID' ), array('size' => 450))); ?>"></p>
	        </div>
	    </div>
	</div>
	<br/><br/>
	<div class="container">
    	<section class="recent-posts">        
            <div class="row listrecent justify-content-md-center">
                <div class="col-md-8">
                    <div class="section-title text-center"> 
                        <h2>Article by <span> <span class="vcard"><?php $fname = get_the_author_meta('first_name');$lname = get_the_author_meta('last_name');$full_name = '';if( empty($fname)){    $full_name = $lname; } elseif( empty( $lname )){     $full_name = $fname; } else {    $full_name = "{$fname} {$lname}"; } echo $full_name; ?></span></span>
                        </h2> 
                    </div>
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<?php get_template_part('content-author'); ?>
					<?php endwhile; ?>
				</div>
				<div class="clear"></div>
			</div>
			<!-- pagination -->
			<div class="pagination">
			<?php pagenavi(); ?>
			</div>
			<?php else : ?>
			<!-- No posts found -->
			<?php endif; ?>
		</section>
	</div>
<?php get_template_part('sidebar_right'); ?>
</div>
<?php get_footer(); ?>