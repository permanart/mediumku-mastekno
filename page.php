<?php get_header(); ?>
<div class="site-content">
	<div class="container">
		<div class="section-title">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<h2><span><?php the_title(); ?></span></h2>
				<div class="row justify-content-center">
					<div class="col-md-12">
						<article id="post-71" class="post-71 page type-page status-publish hentry">
							<div class="entry-content">
								<?php the_content(); ?>
							</div>
						</article>
					</div>
				</div>
			<?php endwhile; endif; ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>