<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/libs.min.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style.min.css">

	<script>function loadFont(t,e,o,n){function a(){if(!window.FontFace)return!1;var t=new FontFace("t",'url("data:application/font-woff2,") format("woff2")',{}),e=t.load();try{e.then(null,function(){})}catch(t){}return"loading"===t.status}var s=navigator.userAgent;if(window.addEventListener&&(!s.match(/(Android (2|3|4.0|4.1|4.2|4.3))|(Opera (Mini|Mobi))/)||s.match(/Chrome/))){var l={};try{l=localStorage||{}}catch(t){}var d="x-font-"+t,r=d+"url",c=d+"css",i=l[r],u=l[c],f=document.createElement("style");if(f.rel="stylesheet",document.head.appendChild(f),!u||i!==e&&i!==o){var w=o&&a()?o:e,m=new XMLHttpRequest;m.open("GET",w),m.onload=function(){m.status>=200&&m.status<400&&(l[r]=w,l[c]=m.responseText,n||(f.textContent=m.responseText))},m.send()}else f.textContent=u}}loadFont("clearsans-bold","<?php echo get_template_directory_uri(); ?>/css/clearsans-bold.css"),loadFont("clearsans-regular","<?php echo get_template_directory_uri(); ?>/css/clearsans-regular.css"),loadFont("clearsans-bolditalic","<?php echo get_template_directory_uri(); ?>/css/clearsans-italic.css"),loadFont("clearsans-italic","<?php echo get_template_directory_uri(); ?>/css/clearsans-bolditalic.css");</script>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header>

<div class="header-top">
	<div class="container">
		<div class="row align-items-center justify-content-between">
			<div class="col-sm-3">
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
			<div class="col-sm-6 header-top-btns">
				<a href="<?php echo get_option('comp_vk'); ?>"><i class="fab fa-vk"></i></a>

				<a class="search-popup" href="#search-form"><i class="fas fa-search"></i></a>
				<div id="search-form" class="zoom-anim-dialog mfp-hide">
					<h5 class="search-form-title">Поиск по сайту</h5>
					<form role="search" method="get" class="search-form" action="<?php echo site_url('/'); ?>">
						<input type="search" class="search-field" placeholder="Поиск…" value="" name="s" autocomplete="off" spellcheck="false" required>
						<input type="submit" class="search-submit" value="Поиск">
					</form>
				</div>

				<a href="http://localhost/koopteh/sitemap_index.xml"><i class="fas fa-sitemap"></i></a>
				<a href="" class="view-btn bvi-panel-open" itemprop="copy">Версия для слабовидящих</a>
			</div>
		</div>
	</div>
</div>


	<div class="container">
		<div class="row align-items-center">

			<div class="col-xl-5 col-lg-6 col-md-8">
					<h6>Частное профессиональное образовательное учреждение</h6>
					<h1><a href="<?php echo get_site_url(); ?>">Петрозаводский кооперативный техникум Карелреспотребсоюза</a></h1>
			</div>

			<div class="col-md-6 offset-xl-1">
			<?php wp_nav_menu( array(
							'menu' => 'main-menu',
							'container' => 'nav',
							'container_class' => 'main-menu') ); ?>
			</div>

		</div>
	</div>
</header>
