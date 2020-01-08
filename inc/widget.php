<?php 
add_action( 'widgets_init', 'popular_widget'); 
function popular_widget() {
register_widget( 'popular_widget_info' );
}
class popular_widget_info extends WP_Widget { 
function popular_widget_info () {
                                $this->WP_Widget('popular_widget_info', 'Popular Posts (Mediumku)', $widget_ops );        } 
public function form( $instance ) {
if ( isset( $instance[ 'name' ]) && isset ($instance[ 'total' ]) ) {
$name = $instance[ 'name' ];
$total = $instance[ 'total' ];
}
else {
$name = __( '', 'srs_widget_title' );
$total = __( '', 'srs_widget_title' );
} ?>
<p>Title: <input class="widefat" name="<?php echo $this->get_field_name( 'name' ); ?>" type="text" value="<?php echo esc_attr( $name );?>" /></p>
<p>Display: <input class="widefat" name="<?php echo $this->get_field_name( 'total' ); ?>" type="number" min="5" value="<?php echo esc_attr( $total ); ?>" /></p> 
<?php
} 
function update($new_instance, $old_instance) { 
$instance = $old_instance; 
$instance['name'] = ( ! empty( $new_instance['name'] ) ) ? strip_tags( $new_instance['name'] ) : ''; 
$instance['total'] = ( ! empty( $new_instance['total'] ) ) ? strip_tags( $new_instance['total'] ) : ''; 
return $instance; 
}  
function widget($args, $instance) {
extract($args);
echo $before_widget;
$name = apply_filters( 'widget_title', $instance['name'] );
$total = empty( $instance['total'] ) ? '&nbsp;' : $instance['total'];
if ( !empty( $name ) ) { echo "<h3><span>" . $name . "</span><i></i></h3>"; };
echo "<ul class='spl'>";
$i = 0;$popularpost = new WP_Query( array( 'posts_per_page' => $total, 'meta_key' => 'wpb_post_views_count', 'orderby' => 'meta_value_num', 'order' => 'DESC'  ) ); while ( $popularpost->have_posts() ) : $popularpost->the_post(); ?>
<?php $i++ ?>
<li>
<div class="img">
<div class="ltr">
<?php if ( has_post_thumbnail() ) { ?> <?php the_post_thumbnail('thumbnail',array('title' => ''.get_the_title().'')); ?> <?php } else { ?><img src="<?php echo get_image(); ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" /><?php } ?>
</div>
</div>
<div class="nf">
<a class="lnk" href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
</div>
</li>
<?php endwhile;
echo "</ul>";
echo $after_widget; //Widget ends printing information
} }

add_action( 'widgets_init', 'recent_widget'); 
function recent_widget() {
register_widget( 'recent_widget_info' );
}
class recent_widget_info extends WP_Widget { 
function recent_widget_info () {
                                $this->WP_Widget('recent_widget_info', 'Recent Posts (Mediumku)', $widget_ops );        } 
public function form( $instance ) {
if ( isset( $instance[ 'name' ]) && isset ($instance[ 'total' ]) ) {
$name = $instance[ 'name' ];
$total = $instance[ 'total' ];
}
else {
$name = __( '', 'srs_widget_title' );
$total = __( '', 'srs_widget_title' );
} ?>
<p>Title: <input class="widefat" name="<?php echo $this->get_field_name( 'name' ); ?>" type="text" value="<?php echo esc_attr( $name );?>" /></p>
<p>Display: <input class="widefat" name="<?php echo $this->get_field_name( 'total' ); ?>" type="number" min="5" value="<?php echo esc_attr( $total ); ?>" /></p> 
<?php
} 
function update($new_instance, $old_instance) { 
$instance = $old_instance; 
$instance['name'] = ( ! empty( $new_instance['name'] ) ) ? strip_tags( $new_instance['name'] ) : ''; 
$instance['total'] = ( ! empty( $new_instance['total'] ) ) ? strip_tags( $new_instance['total'] ) : ''; 
return $instance; 
}  
function widget($args, $instance) {
extract($args);
echo $before_widget;
$name = apply_filters( 'widget_title', $instance['name'] );
$total = empty( $instance['total'] ) ? '&nbsp;' : $instance['total'];
if ( !empty( $name ) ) { echo "<h3><span>" . $name . "</span><i></i></h3>"; };
echo "<ul class='spl'>";
$recent = new WP_Query("post_type=post&showposts=$total"); while($recent->have_posts()) : $recent->the_post(); ?>
<li>
<div class="img">
<div class="ltr">
<?php if ( has_post_thumbnail() ) { ?> <?php the_post_thumbnail('thumbnail',array('title' => ''.get_the_title().'')); ?> <?php } else { ?><img src="<?php echo get_image(); ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" /><?php } ?>
</div>
</div>
<div class="nf">
<a class='lnk' href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
</div>
</li>
<?php endwhile;
echo "</ul>";
echo $after_widget; //Widget ends printing information
} }
function pagenavi($before = '', $after = '', $prelabel = '', $nxtlabel = '', $pages_to_show = 5, $always_show = false) {
	global $request, $posts_per_page, $wpdb, $paged;
	if(empty($prelabel)) {
		$prelabel  = '<strong>&laquo;</strong>';
	}
	if(empty($nxtlabel)) {
		$nxtlabel = '<strong>&raquo;</strong>';
	}
	$half_pages_to_show = round($pages_to_show/2);
	if (!is_single()) {
		if(!is_category()) {
			preg_match('#FROM\s(.*)\sORDER BY#siU', $request, $matches);		
		} else {
			preg_match('#FROM\s(.*)\sGROUP BY#siU', $request, $matches);		
		}
		$fromwhere = $matches[1];
		$numposts = $wpdb->get_var("SELECT COUNT(DISTINCT ID) FROM $fromwhere");
		$max_page = ceil($numposts /$posts_per_page);
		if(empty($paged)) {
			$paged = 1;
		}
		if($max_page > 1 || $always_show) {
			echo $before;
			if ($paged >= ($pages_to_show-1)) {
				echo '<li class="showpage firstpage"><a href="'.get_pagenum_link().'">First </a>';
			}
			previous_posts_link($prelabel);
			for($i = $paged - $half_pages_to_show; $i  <= $paged + $half_pages_to_show; $i++) {
				if ($i >= 1 && $i <= $max_page) {
					if($i == $paged) {
						echo '<li class="active">'.$i.'</li>';
					} else {
						echo '<li><a href="'.get_pagenum_link($i).'">'.$i.'</a></li>';
					}
				}
			}
			next_posts_link($nxtlabel, $max_page);
			if (($paged+$half_pages_to_show) < ($max_page)) {
				echo '<li class="displaypageNum lastpage"><a href="'.get_pagenum_link($max_page).'">Last</a>';
			}
			echo $after;
		}
	}
}
?>