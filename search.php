<?php get_header(); ?>
<div class="container">
	<div class="row">
		<div class="col-md-8">

			<h1 class="page-title">Поиск</h1>
			
			<form role="search" method="get" class="search-form" action="<?php echo site_url('/'); ?>">
				<input type="search" class="search-field" placeholder="Поиск…" value="" name="s" autocomplete="off" spellcheck="false" required>
				<input type="submit" class="search-submit" value="Поиск">
				<p class="search-total">
					<?php $allsearch = new WP_Query("s=$s&showposts=0"); 
					echo "Всего найдено страниц: ".$allsearch->found_posts; ?>
				</p>
			</form>

		<?php if ( have_posts() ) :

			$types = array('news' => 'cat', 'page', 'socs'); ?>

			<ul class="search-tabs">
				<li class="tab-link current" data-tab="tab-1">Новости</li>
				<li class="tab-link" data-tab="tab-2">Страницы</li>
				<li class="tab-link" data-tab="tab-3">Объявления</li>
			</ul>

		<?php
			// Номер таба
			$count = 1;
	    foreach( $types as $key => $type) {

	    	$args = array(
    			"s" => $s,
    			"posts_per_page" => 0
    		);

	    	// Если это категория, рубрика
	    	if ($type == 'cat') {
	    		$args["category_name"] = $key;
	    		$type = $key;
	    	}
	    	else
	    		$args["post_type"] = $type;

    		$allsearch = new WP_Query( $args );
			?>
				<div id="tab-<?php echo $count; ?>" class="tab-content <?php if ($count == 1) echo "tab-current"; ?>">
				<?php
					if ($allsearch->found_posts == 0) {
						echo "Ничего не найдено.";
						continue;
					}

	        while( have_posts() ){
	            the_post();
	            $cat = get_the_category();
	            if( $type == get_post_type() || $cat[0]->slug == $type ){
	                get_template_part( 'template-parts/content', 'search' );
	            }
	        }
	        rewind_posts();
	        $count++;
	    	?>
	    	</div>
	    <?php
	    }

		else : ?>
			<h2 class="nothing-found">Ничего не найдено.</h2>
		<?php endif; ?>
		</div>
	</div>
</div>
<?php
get_footer();
