<?php get_header(); ?>
<div class="container">

	<div class="row">
		<div class="col-12">
			<h1 class="page-title"><?php the_title(); ?></h1>
		</div>
	</div>
		
	<div class="row">
		<div class="col-md-8">
			
		<?php

		$args = array(
		  'post_type'      => 'page',
		  'posts_per_page' => -1,
		  'post_parent'    => $post->ID,
		  'order'          => 'ASC',
		  'orderby'        => 'menu_order'
		);


		$parent = new WP_Query( $args );

		if ( $parent->have_posts() ) : ?>
			<ul class="org-main-info">
		  <?php while ( $parent->have_posts() ) : $parent->the_post(); ?>
		          <li><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></li>
		  <?php endwhile; ?>
		  </ul>

		<?php endif; wp_reset_postdata(); ?>			

		</div>
	</div>
</div>
<?php get_footer();