<?php
$dir		= get_bloginfo( 'template_directory' ) . '/';
$assets		= $dir . 'assets/';
$css		= $assets . 'css/';
$img		= $assets . 'image/';
$js			= $assets . 'js/';
?>
<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta name="description" content="<?php bloginfo( 'description' ); ?>" />
		<meta name="author" content="<?php bloginfo( 'name' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
		<link type="text/css" rel="stylesheet" href="<?php echo $css; ?>styles.css" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<?php wp_head(); ?>
		<title><? wp_title( ' ~ ', true, 'right' ); ?><?php bloginfo('name'); ?></title>
	</head>
	<body <?php body_class(); ?>>
		<header>
			<div>
				<h1><?php bloginfo( 'name' ); ?></h1>
				<section>
					<nav>
						<?php foreach ( wp_get_nav_menu_items( 'nav' ) as $i => $item ): ?>
							<a href="<?php echo $item->url; ?>"<?php 
								if ( ( is_front_page() && $i === 0 ) || ( !is_front_page() && $i === 1 ) ): 
							?> class="selected"<?php endif; ?>>
								<?php echo $item->title; ?>
								<span></span>
							</a>
						<?php endforeach; ?>
					</nav>
					<?php dynamic_sidebar( 'header' ); ?>
				</section>
			</div>
		</header>
		<div id="container">