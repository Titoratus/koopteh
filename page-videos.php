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
			    'post_type'=> 'video'
			    );              

			$the_query = new WP_Query( $args );

			if($the_query->have_posts() ) : ?>
			<div class="row">
			<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
				<div class="col-md-6 video">
					<h4 class="video-title"><?php the_title(); ?></h4>
					<?php the_field('video_url'); ?>
				</div>		
			<?php endwhile; ?>
			</div>
		<?php endif; ?>

		</div>
	</div>

</div>
<?php get_footer();