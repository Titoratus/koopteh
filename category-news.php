<?php get_header(); ?>
<div class="container">

	<div class="row">
		<div class="col-12"><?php if( function_exists('fw_ext_breadcrumbs') ) { fw_ext_breadcrumbs(); } ?></div>	
	</div>

	<div class="row">
		<div class="col-md-12">
			<h1 class="page-title">Новости</h1>
		</div>
	</div>

	<div class="row">
		<div class="col-md-8">
<?php
		while ( have_posts() ) :
			the_post();
		?>
			<div class="news row">

				<div class="col-9">
					<h3 class="news_title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a></h3>
					<div class="news_desc"><?php the_excerpt(); ?></div>
					<?php koopteh_posted_on(); koopteh_entry_footer(); ?>
				</div>

				<?php if (has_post_thumbnail()): ?>
				<div class="col-md-3">
					<div class="news_img"><?php koopteh_post_thumbnail(); ?></div>
				</div>	
				<?php endif; ?>
				
			</div>
		<?php endwhile; ?>
		</div>

		<div class="col-md-4">
			<?php get_sidebar(); ?>
		</div>		
	</div>
		<div class="row">
			<div class="col-8">
			<?php
				$nav = get_the_posts_pagination( array( "prev_text" => "", "next_text" => "", "screen_reader_text" => "A") );
				$nav = str_replace('<h2 class="screen-reader-text">A</h2>', '', $nav);
				echo $nav;
			?>			
			</div>
		</div>
</div>
<?php
get_footer();
