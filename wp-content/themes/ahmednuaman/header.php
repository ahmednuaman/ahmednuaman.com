<?php $dir	= get_template_directory_uri(); ?>
<!DOCTYPE html>
<html class="no-js" lang="en" xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta charset="utf-8" />
		<meta name="description" content="<?php bloginfo( 'description' ); ?>" />
		<meta name="author" content="Ahmed Nuaman" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<meta name="apple-mobile-web-app-capable" content="yes" />
		<link type="text/css" rel="stylesheet" href="<?php echo $dir; ?>/assets/css/styles.css" />
		<link type="text/plain" rel="author" href="<?php echo $dir; ?>/humans.txt" />
		<link type="image/png" rel="icon" href="<?php echo $dir; ?>/assets/image/favicon.ico" />
		<link type="image/png" rel="apple-touch-icon-precomposed" href="<?php echo $dir; ?>/assets/image/icon-57.png" />
		<link type="image/png" rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $dir; ?>/assets/image/icon-72.png" />
		<link type="image/png" rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $dir; ?>/assets/image/icon-114.png" />
		<link type="image/png" rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo $dir; ?>/assets/image/icon-144.png" />
		<?php wp_head(); ?>
		<title>
			<?php wp_title( ' ~ ', true, 'right' ); ?>
			<?php bloginfo( 'name' ); ?>
		</title>
	</head>
	<body>
		<div id="container">
			<header>
				<a href="<?php echo site_url(); ?>" id="logo" class="sprite">
					<span class="hide">
						<?php bloginfo( 'name' ); ?>
					</span>
				</a>
				<nav>
					<?php echo ahmed_menu( 'top' ); ?>
				</nav>
			</header>
			<section id="content">