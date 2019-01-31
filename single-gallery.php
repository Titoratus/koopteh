<?php get_header(); ?>
<div class="container">

	<div class="row">
		<div class="col-12"><?php if( function_exists('fw_ext_breadcrumbs') ) { fw_ext_breadcrumbs(); } ?></div>	
	</div>
		
	<div class="row">
		<?php
		while ( have_posts() ) :
			the_post();
	?>
		<div class="col-md-3">
			<h4 class="album-title"><?php the_title(); ?></h4>
			<div class="album-images">
			<?php $imgs = get_field('my_gal_img');
				$imgs = explode(",", $imgs);
				foreach($imgs as $img):
					echo wp_get_attachment_image($img);
				endforeach;			
			?>
			</div>
		</div>
	<?php

		endwhile;
		?>
	</div>
</div>
<?php
get_footer();
