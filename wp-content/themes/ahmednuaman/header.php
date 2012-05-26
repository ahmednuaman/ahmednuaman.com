<?php $dir	= get_template_directory_uri(); ?>
<!DOCTYPE html>
<html class="no-js" lang="en" xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta charset="utf-8" />
		<meta name="description" content="<?php bloginfo( 'description' ); ?>" />
		<meta name="author" content="Ahmed Nuaman" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<link type="text/css" rel="stylesheet" href="<?php echo $dir; ?>/assets/css/styles.css" />
		<link type="text/plain" rel="author" href="<?php echo $dir; ?>/humans.txt" />
		<?php wp_head(); ?>
		<title>
			<?php wp_title( ' ~ ', true, 'right' ); ?>
		</title>
	</head>
	<body>