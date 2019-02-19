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
		<div class="col-12">
			<h4 class="album-title"><?php the_title(); ?></h4>
			<div class="album-images popup-gallery">
			<?php $imgs = get_field('my_gal_img');
				$imgs = explode(",", $imgs);
				foreach($imgs as $img):
			?>
					<a href="<?php $url = wp_get_attachment_image_src($img, 'full'); echo $url[0]; ?>" title="The Cleaner"><img src="<?php echo $url[0]; ?>" width="200" height="200"></a>
			<?php
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
