<?php
/*
Plugin Name: SoJ Manage Posts By Author
Description: Filter posts by author
Author: Jeff Johnson
Version: 2.0
*/

function soj_manage_posts_by_author()
{
	global $user_ID;

	$editable_ids = array();
	$users = get_users();
	foreach( $users as $u ) {
		$count = count_user_posts( $u->ID );
		if( $count > 0 )
			$editable_ids[] = $u->ID;
	}
	
	wp_dropdown_users(
		array(
			'include' => $editable_ids,
			'show_option_all' => __('Any'),
			'name' => 'author',
			'selected' => isset($_GET['author']) ? $_GET['author'] : 0
		)
	);
}

add_action('restrict_manage_posts', 'soj_manage_posts_by_author');
