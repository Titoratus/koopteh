<article class="search_item">
		<h3 class="search_item_title"><?php the_title(); ?></h3>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php
			koopteh_posted_on();
			koopteh_posted_by();
			?>
		</div>
		<?php endif; ?>

	<?php koopteh_post_thumbnail(); ?>

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div>

	<div class="entry-footer">
		<?php koopteh_entry_footer(); ?>
	</div>
</article>
