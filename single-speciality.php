<?php get_header();

		while ( have_posts() ) :
			the_post();

		?>
		<div class="container spec_page">

				<div class="row">
					<div class="col-12"><?php if( function_exists('fw_ext_breadcrumbs') ) { fw_ext_breadcrumbs(); } ?></div>	
				</div>

				<div class="row spec_page_top">
					<div class="col-md-11 offset-md-1">
						<h5 class="spec_page_num"><?php echo get_field('spec_num'); ?></h5>
						<h1 class="page-title spec_page_title"><?php echo get_field('spec_name'); ?></h1>
						<h6 class="spec_page_qualif">Квалификация выпускника: <?php echo get_field('spec_qualif'); ?></h6>
					</div>
				</div>

				<div class="row justify-content-center">
					<div class="col-md-10 spec_page_desc">
						<?php echo get_field('spec_desc'); ?>
					</div>
				</div>

				<div class="row justify-content-center spec_time_docs">
					<div class="col-md-5 spec_oz">
						<h4>Срок обучения</h4>

						<div class="row">
							<div class="col-md-6">
								<b>Очно:</b>
								<?php echo get_field('spec_o'); ?>
							</div>
							<div class="col-md-6">
								<b>Заочно:</b>
								<?php echo get_field('spec_z'); ?>
							</div>
						</div>

					</div>

					<div class="col-md-5">
						<h4>Необходимые документы</h4>
						<ol class="study_docs">
							<li>Документ об образовании в подлиннике.</li>
							<li>Фото (3*4), 4 шт.</li>
							<li>Копия трудовой книжки (при наличии стажа).</li>
							<li>При изменении фамилии - копию свидетельства о браке.</li>
							<li>Паспорт предъявляется лично при оформлении заявления.</li>
							<li>Для абитуриентов - юношей наличие военного билета или приписного удостоверения обязательно.</li>
						</ol>
					</div>
				</div>

		</div>
		<?php				

		endwhile;

get_footer();
