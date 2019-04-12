<?php get_header(); ?>
<section class="section section-top">
	<div class="container">
		<div class="row">

			<div class="col-md-7">
				<div class="ann-carousel owl-carousel">
				<?php
					$args = array(
					    'post_type' => 'post',
					    'category_name' => 'announce'
					    );              

					$the_query = new WP_Query( $args );
					if ($the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();
					?>
						<div class="ann_item item">
							<div class="ann_img"><?php echo get_the_post_thumbnail(); ?></div>
							<div class="ann_info">
								<h3><?php the_title(); ?></h3>
								<div class="ann_desc"><?php the_content(); ?></div>
								<a href="<?php the_permalink(); ?>" class="ann_more">Подробнее</a>
							</div>
						</div>
					<?php
					endwhile;
					endif;
				?>
				</div>			
			</div>

			<div class="col-md-5 last_news">
				<h3>Последние новости</h3>
			<?php
				$args = array(
				    'post_type' => 'post',
				    'category_name' => 'news',
				    'posts_per_page' => 3
				    );              

				$the_query = new WP_Query( $args );
				if ($the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();
				?>
					<div class="last_news_item">
						<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
						<div class="last_news_desc"><?php the_excerpt(); ?></div>
						<span class="posted-on"><?php echo get_the_date(); ?></span>
						<span class="post-views"><?php the_views(); ?></span>
					</div>
				<?php
				endwhile;
				endif;
			?>			
			</div>
		</div>
	</div>
</section>

<section class="section section-specs">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2 class="section-title"><span>Специальности</span></h2>
			</div>			
		</div>

		<div class="row">

			<div class="col-md-8">
				<?php
					$args = array(
						'post_type' => 'speciality',
						'post_status' => 'publish'
					);
					$count = 0;

					$the_query = new WP_Query( $args );
					if ($the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();
						$count++;
					?>
						<div class="tab-content tab-<?php echo $count; if ($count == 1) echo ' tab-current'; ?>">
							<h3><?php the_title(); ?></h3>
							<div class="tab-qualif"><b>Квалификация выпускника:</b> <?php the_field('spec_qualif'); ?></div>
							<div class="tab-time">
								<span><b>Очно:</b> <?php the_field('spec_o_9'); ?></span>
								<span><b>Заочно:</b> <?php the_field('spec_z'); ?></span>
								<a href="<?php the_permalink(); ?>" class="more">Подробнее</a>
							</div>
							<img src="<?php the_field('spec_img'); ?>" alt="">
						</div>
					<?php
					endwhile;
					endif;
				?>
			</div>

			<div class="col-md-4">
				<?php
					$args = array('post_type' => 'speciality');              
					$count = 0;

					$the_query = new WP_Query( $args );
					if ($the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();
						$count++;
					?>
						<div class="tab-link <?php if ($count == 1) echo 'active'; ?>"" data-tab="<?= $count; ?>">
							<?php the_title(); ?>	
						</div>
					<?php
					endwhile;
					endif;
				?>				
			</div>

		</div>
	</div>
</section>

<section class="section section-links">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2 class="section-title"><span>Полезные ссылки</span></h2>

				<?php
					$args = array('post_type' => 'useful_links');              

					$the_query = new WP_Query( $args );
					if ($the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();
					?>
						<a href="<?php the_field('link_url'); ?>" class="u_link">

							<?php echo wp_get_attachment_image( get_field('link_img'), 140, 140, false ); ?>

							<?php the_title(); ?>
						</a>
					<?php
					endwhile;
					endif;
				?>			
			</div>
		</div>		
	</div>
</section>

<?php
get_footer();
