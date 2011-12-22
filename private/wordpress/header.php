<?php
ob_start();
?>
<html class="no-js" lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="description" content="Ahmed Nuaman's super awesome portfolio of web stuffs" />
		<meta name="author" content="Ahmed Nuaman" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, maximum-scale=1.0, minimum-scale=1.0" />
		<link type="text/css" rel="stylesheet" href="/assets/css/styles.css" />
		<link type="text/plain" rel="author" href="/humans.txt" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<link type="application/rss+xml" rel="alternate" title="<?php bloginfo( 'name' ); ?> RSS Feed" href="<?php bloginfo( 'rss2_url' ); ?>" />
		<link type="application/atom+xml" rel="alternate" title="<?php bloginfo( 'name' ); ?> Atom Feed" href="<?php bloginfo( 'atom_url' ); ?>" />
		<meta property="og:image" content="http://ahmednuaman.com/assets/image/gravatar.png" />
		<script src="/assets/js/packaged.js"></script>
		<?php wp_head(); ?>
		<title><?php wp_title( ' &mdash; ', true, 'right' ); ?>Blog of the illusive Ahmed Nuaman</title>
	</head>
	<body <?php echo body_class(); ?>>
		<div id="bg"></div>
		<div id="container">
			<div id="intro">
				<div title="Too blue? Click here to go minimalist!">
					<h1>
						Ahmed Nuaman
					</h1>
				</div>
				<hr />
				<h2>
					builder of internets ~ developer of dreams ~ tamer of Dachshunds
				</h2>
			</div>
			<div id="menu">
				<div id="menubar">
					<a href="/#work" title="New and noteable projects">Work</a>
					<a href="/#bio" title="Read all about me">Bio</a>
					<a href="http://careers.stackoverflow.com/ahmednuaman" title="Or resume as they say in America">CV</a>
					<a href="http://github.com/ahmednuaman" title="Check out my coding skillz">Github</a>
					<a href="/blog" title="Read my rants">Blog</a>
					<a href="http://twitter.com/ahmednuaman" title="Read my 140 character rants">Twitter</a>
					<a href="mailto:ahmed@ahmednuaman.com?subject=Enquiry%20from%20web%20site&amp;body=Hi%20Ahmed%2C%20we%20want%20you%20to%20make%20benefit%20to%20our%20glorious%20project..." title="You know you want to">Contact</a>
				</div>
			</div>
			<div id="work">