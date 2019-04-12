<?php
if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside class="sidebar-page">
	<ul>
	<?php
		wp_list_pages([
			"child_of" => wp_get_post_parent_id(get_the_ID()),
			"depth" => 1,
			"title_li" => ""
		]);
	?>
	</ul>
</aside>
