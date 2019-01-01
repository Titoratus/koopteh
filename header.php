<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/libs.min.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style.min.css">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="header-top">
	<div class="container">
		<div class="row align-items-center justify-content-between">
			<div class="col-md-3">
				<?php
					echo date('d.m.Y').", ";
					switch (date('D')) {
						case "Mon":
							echo "Понедельник";
							break;
						case "Tue":
							echo "Вторник";
							break;
						case "Wed":
							echo "Среда";
							break;
						case "Thu":
							echo "Четверг";
							break;
						case "Fri":
							echo "Пятница";
							break;
						case "Sat":
							echo "Суббота";
							break;
						case "Sun":
							echo "Воскресенье";
							break;
					}
				?>
			</div>
			<div class="col-md-4 header-top-btns">
				<i class="fab fa-vk"></i>
				<i class="fas fa-search"></i>
				<i class="fas fa-sitemap"></i>
				<a href="" class="view-btn">Версия для слабовидящих</a>
			</div>
		</div>
	</div>
</div>

<header>
	<div class="container">
		<div class="row align-items-center">

			<div class="col-md-5">
					<h6>Частное профессиональное образовательное учреждение</h6>
					<h1><a href="<?php echo get_site_url(); ?>">Петрозаводский кооперативный техникум Карелреспотребсоюза</a></h1>
			</div>

			<div class="col-md-6 offset-md-1">
			<?php wp_nav_menu( array(
							'menu' => 'main-menu',
							'container' => 'nav',
							'container_class' => 'main-menu') ); ?>
			</div>

		</div>
	</div>
</header>
