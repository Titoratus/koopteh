<?php
if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside class="announce">
	<h2>Объявления</h2>
<?php
	$args = array(
	    'post_type' => 'post',
	    'category_name' => 'announce'
	    );              

	$the_query = new WP_Query( $args );
	if ($the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();
	?>
		<div class="announce_item">
			<h3><?php the_title(); ?></h3>
			<div class="announce_desc"><?php the_content(); ?></div>
		</div>
	<?php
	endwhile;
	endif;
?>
</aside>
