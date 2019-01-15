<?php get_header();

		while ( have_posts() ) :
			the_post();

		?>
			<div class="container">

				<div class="row">
					<div class="col-12"><?php if( function_exists('fw_ext_breadcrumbs') ) { fw_ext_breadcrumbs(); } ?></div>	
				</div>

				<div class="row">
					<div class="col-md-12">
						<h1 class="page-title">Наши специальности</h1>
					</div>
				</div>

				<div class="row">
				<?php
					$args = array(
					    'post_type'=> 'speciality'
					    );              

					$the_query = new WP_Query( $args );
					if($the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();
					?>
						<div class="col-md-6">
								<div class="spec_item">
									<h3 class="spec_num"><?php the_field('spec_num'); ?></h3>
									<h2 class="spec_name"><?php the_field('spec_name'); ?></h2>
									<h4 class="spec_qualif"><?php the_field('spec_qualif'); ?></h4>
									<div class="row spec_oz">
										<div class="col-md-5">
											<b>Очно:</b>
											<?php the_field('spec_o'); ?>
										</div>
										<div class="col-md-5 offset-1">
											<b>Заочно:</b>
											<?php the_field('spec_z'); ?>
										</div>										
									</div>

									<div class="spec_desc"><?php echo wp_trim_words(get_field('spec_desc'), 23); ?></div>

									<a class="spec_read" href="<?php the_field('spec_link'); ?>">Подробнее</a>

									<div class="spec_img" style="background: url(<?php echo get_field('spec_img'); ?>); -webkit-background-size: cover; background-size: cover;"></div>
								</div>
						</div>
					<?php
					endwhile;
					endif;					
				?>
				</div>
			</div>
		<?php

		endwhile;

get_footer();