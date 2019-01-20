<article class="search_item container">
	<div class="row align-items-center">

		<div class="col-md-9">
			<h3 class="search_item_title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a></h3>

			<p class="search_item_excerpt"><?php the_excerpt(); ?></p>

			<?php if ( 'post' === get_post_type() ) : ?>
				<?php
				koopteh_posted_on();
				?>
			<?php endif; ?>	

			<?php koopteh_entry_footer(); ?>
		</div>

		<div class="col-md-3">
			<div class="search_item_img"><?php koopteh_post_thumbnail(); ?></div>
		</div>

	</div>
</article>			