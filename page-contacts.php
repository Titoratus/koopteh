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
			<address class="contact_item"><?php echo get_option('org_addr'); ?></address>
			<div class="contact_item">
				<div class="org_email"><?php echo get_option('admin_email'); ?></div>
				<div class="org_phones">8 (814-2) 76-68-81 <br> 8 (814-2) 70-22-73</div>
			</div>
			<div class="contact_item">Понедельник-суббота: с 8:00 до 19:40. <br> Воскресенье - выходной.</div>
		</div>
	</div>

	<div class="row">
		<div class="col-12 org_map">
			<iframe src="https://yandex.ru/map-widget/v1/-/CBRo74SP9C" width="100%" height="400" frameborder="0" allowfullscreen="true"></iframe>
		</div>
	</div>

</div>
<?php get_footer();