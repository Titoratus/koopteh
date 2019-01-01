<footer>
	<?php
	/*
		wp_nav_menu( array(
				'menu' => 'main-menu',
				'menu_class' => 'footer-menu'
		) );	*/
	?>

<?php
	$menu = wp_get_nav_menu_items('main-menu');
?>
	<ul class="footer-menu">
<?php
	$count = 0;

	foreach($menu as $item):

		// set up title and url
		$title = $item->title;
		$link = $item->url;

		// item does not have a parent so menu_item_parent equals 0 (false)
		if ( !$item->menu_item_parent ):

			// save this id for later comparison with sub-menu items
			$parent_id = $item->ID;
?>

	  <li class="item">
	      <h5><?php echo $title; ?></h5>
					
				<?php if ( $title == "Контакты"): ?>
					<div class="footer_contacts">
						<p><i class="fas fa-map-marker-alt"></i> пр. Первомайский, 1A</p>
						<p><i class="fas fa-phone fa-flip-horizontal"></i> 8-(814-2)-70-22-73</p>
						<p><i class="fas fa-envelope"></i> cit@koopteh.onego.ru</p>
						<p>Пн-Пт: с 09:00 до 20:00<br>Сб-Вс: выходной</p>
					</div>
				<?php endif; ?>
	  <?php
		endif;

	  if ( $parent_id == $item->menu_item_parent ):

			if ( !$submenu ): $submenu = true; ?>
				<ul class="sub-menu">
			<?php endif; ?>
					<li><a href="<?php echo $link; ?>" class="title"><?php echo $title; ?></a></li>

			<?php if ( $menu[ $count + 1 ]->menu_item_parent != $parent_id && $submenu ): ?>
				</ul>
			<?php $submenu = false; endif;

			endif; ?>

    <?php if ( $menu[ $count + 1 ]->menu_item_parent != $parent_id ): ?>
    </li>                           
    <?php
    	$submenu = false;
  	endif;

    $count++;

	endforeach;
?>
	</ul>
	
	<div class="footer_designed"><?php echo date('Y'); ?> Designed by E. Starosvteskii</div>
</footer>
<script src="<?php echo get_template_directory_uri(); ?>/js/scripts.min.js"></script>
<?php wp_footer(); ?>
</body>
</html>
