<?php if (has_post_thumbnail( $post->ID ) ): ?>
  <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
<div class="card post authorpost">
  	<a class="thumbimage" style="background-image:url(<?php echo $image[0]; ?>)" href="<?php the_permalink() ?>"></a>
	<div class="card-block">
		<h2 class="card-title">
		<a href="<?php the_permalink() ?>">
		<?php the_title(); ?>
		</a>
		</h2>
		<span class="card-text d-block">
		<?php the_excerpt(); ?>
		</span>
		<div class="metafooter">
		<div class="wrapfooter">
			<span class="author-meta">
			<span class="post-name">
			<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
			<?php the_author(); ?>
			</a>
			</span>
			<br/>
			<span class="post-date">
			<time class="published">
			<?php the_time('j F Y'); ?>
			</time>
			</span>
			</span>
			<span class="post-read-more">
			<a href="<?php the_permalink() ?>" title="Read Story">
			<svg class="svgIcon-use" height="25" viewBox="0 0 25 25" width="25">
			<path d="M19 6c0-1.1-.9-2-2-2H8c-1.1 0-2 .9-2 2v14.66h.012c.01.103.045.204.12.285a.5.5 0 0 0 .706.03L12.5 16.85l5.662 4.126a.508.508 0 0 0 .708-.03.5.5 0 0 0 .118-.285H19V6zm-6.838 9.97L7 19.636V6c0-.55.45-1 1-1h9c.55 0 1 .45 1 1v13.637l-5.162-3.668a.49.49 0 0 0-.676 0z" fill-rule="evenodd"></path>
			</svg>
			</a>
			</span>
		</div>
		</div>
	</div>
</div>
<?php endif; ?>