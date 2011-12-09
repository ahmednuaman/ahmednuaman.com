<?php
/*
Template Name: JSON feed
*/

ob_start();

header( 'content-type: application/json' );

$q	= new WP_Query( array(
		'posts_per_page'	=> 5
	));

echo json_encode( $q->get_posts() );