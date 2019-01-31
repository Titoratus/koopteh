<?php get_header(); ?>
<div class="container">

	<div class="row">
		<div class="col-12"><?php if( function_exists('fw_ext_breadcrumbs') ) { fw_ext_breadcrumbs(); } ?></div>	
	</div>

	<div class="row">
		<div class="col-12">
			<h1 class="page-title"><?php the_title(); ?></h1>
		</div>
	</div>

	<div class="row">
		<div class="col-12">
		<?php
			$args = array(
			    'post_type'=> 'gallery'
			    );              

			$the_query = new WP_Query( $args );

			if($the_query->have_posts() ) : ?>
			<div class="row">
			<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
				<div class="col-md-3">
					<h4 class="album-title"><?php the_title(); ?></h4>
					<div class="album-image">
					<?php $imgs = get_field('my_gal_img');
						$imgs = explode(",", $imgs);
					?>
					<a href="<?php echo get_permalink(); ?>"><?php echo wp_get_attachment_image($imgs[0]); ?></a>
					</div>
				</div>		
			<?php endwhile; ?>
			</div>
		<?php endif; ?>

		</div>
	</div>

</div>
<?php get_footer();