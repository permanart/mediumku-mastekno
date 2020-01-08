<?php get_header(); ?>
<div class="site-content">
	<div class="container">
		<section class="recent-posts">
	        <div class="section-title">
	        	<h2><span>
	        		Artikel Terbaru
	        	</span></h2>
	        </div>
			<div class="row masonrygrid listrecent">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php get_template_part('content'); ?>
<?php endwhile; ?>
			</div>
			<div class="clear"></div>
			<!-- pagination -->
			<div class="bottompagination">
				<div class="navigation" id="blog-pager">
			<?php pagenavi(); ?>
				</div>
			</div>
			<?php else : ?>
			<!-- No posts found -->
			<?php endif; ?>
		</section>
	</div>
<?php get_template_part('sidebar_right'); ?>
</div>
<?php get_footer(); ?>