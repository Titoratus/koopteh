<?php
	include("simple_html_dom.php");
	$html = file_get_contents("http://koopteh.onego.ru/news/line/page_59.html");
	$html = str_get_html($html);

	foreach ($html->find(".fullitem") as $item) {

		echo "<h2>".$item->find(".link-title a", 0)->innertext."</h2>";
		$news = file_get_contents("http://koopteh.onego.ru".$item->find(".link-title a", 0)->attr["href"]);
		$news = str_get_html($news);	

		foreach($news->find(".newsDetail .content") as $new) {

			// Автор
			//$new->find("p", -1)->outertext = "";

			$post_id = wp_insert_post(array (
				'post_type' => 'post',
				'post_title' => $item->find(".link-title a", 0)->innertext,
				'post_status' => 'publish',
				'comment_status' => 'closed',
				'post_category' => array(4),
				'post_content' => $new->innertext
			));
		}

		$attach_ids = array();
		foreach($news->find(".newsDetail .blockGallery .item") as $img) {
			$image_url = $img->attr["href"];
			$image_url = "http://koopteh.onego.ru".$image_url;
			$upload_dir = wp_upload_dir();
			$image_data = file_get_contents( $image_url );
			$filename = basename( $image_url );
			if ( wp_mkdir_p( $upload_dir['path'] ) ) {
			  $file = $upload_dir['path'] . '/' . $filename;
			}
			else {
			  $file = $upload_dir['basedir'] . '/' . $filename;
			}
			file_put_contents( $file, $image_data );
			$wp_filetype = wp_check_filetype( $filename, null );
			$attachment = array(
			  'post_mime_type' => $wp_filetype['type'],
			  'post_title' => $item->find(".link-title a", 0)->innertext,
			  'post_content' => $item->find(".link-title a", 0)->innertext,
			  'post_status' => 'inherit'
			);
			$attach_id = wp_insert_attachment( $attachment, $file );
			array_push($attach_ids, $attach_id);
			require_once( ABSPATH . 'wp-admin/includes/image.php' );
			$attach_data = wp_generate_attachment_metadata( $attach_id, $file );
			wp_update_attachment_metadata( $attach_id, $attach_data );
		}

		$attach_ids = implode (", ", $attach_ids);

		update_field("field_5ca49708ac195", $attach_ids, $post_id);

	}
?>