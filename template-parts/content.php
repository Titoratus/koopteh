<div class="container">
	<div class="row">
		<div class="col-md-8">
			
			<?php if( function_exists('fw_ext_breadcrumbs') ) { fw_ext_breadcrumbs(); } ?>

			<article class="news_article">
				<h1 class="news-title"><?php the_title(); ?></h1>
				<div class="news-prop news-date">
					<div class="posted-on"><?php the_date(); ?></div>
				</div>
				<div class="news-prop news-views">
					<div class="post-views"><?php if (function_exists('the_views')) { the_views(); } ?></div>
				</div>
			</article>			

			<div class="news-content">
				<?php the_content(); ?>
			</div>

			<div class="news-other row">
				<h2 class="other-title col-12">Ещё новости</h2>
			<?php
				global $post;
				$args = array( 'posts_per_page' => 4, 'category' => 4 );

				$myposts = get_posts( $args );
				foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
						<div class="other-news col-md-6">
							<div class="other-news-date"><i class="fas fa-stopwatch"></i> <?php echo get_the_date(); ?></div>
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</div>
				<?php endforeach; 
				wp_reset_postdata();
			?>			
			</div>

		</div>
	</div>
</div>