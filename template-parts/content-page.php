<div class="container content-page">
	<div class="row">
		<div class="col-12"><?php if( function_exists('fw_ext_breadcrumbs') ) { fw_ext_breadcrumbs(); } ?></div>	
	</div>
		
	<div class="row">
		<div class="col-md-8">

			<article class="page">
				<h1 class="page-title"><?php the_title(); ?></h1>
				<div class="page-content"><?php the_content(); ?></div>
			</article>
			
		</div>
	</div>
</div>
