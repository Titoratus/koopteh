<?php get_header(); ?>
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
<?php
get_footer();
