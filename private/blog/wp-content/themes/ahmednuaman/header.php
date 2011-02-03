<!DOCTYPE html>
<html>
<!-- 
Web Site Designed, Programmed and Maintained by FireStarter Media Limited, www.firestartermedia.com, hello@firestartermedia.com.
The design and code are copyright FireStarter Media Limited.
Copyright (c) FireStarter Media Limited. All rights reserved.
-->
<head>
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<meta name="description" content="The official portfolio of Ahmed Nuaman, Freelance Designer and Developer" />
	<meta name="keywords" content="ahmed, nuaman, ahmednuaman, newman, firestarter, media, firestartermedia, freelance, web, website, designer, developer, php, xhtml, html, css, javascript, mysql, actionscript, flash, photoshop, flex, mxml, youtube, brand, channel, gadget, widget, google, apis, gdata, iphone, ipod, apple, android, g1" />	
	<link type="image/x-icon" rel="shortcut icon" href="/favicon.ico" /> 
	<link rel="pingback" href="<? bloginfo( 'pingback_url' ); ?>" />
	<link type="text/css" rel="stylesheet" href="/assets/css/styles.css" media="all" />
	<link type="text/css" rel="stylesheet" href="<? bloginfo( 'stylesheet_url' ); ?>" media="all" />
	<link type="application/rss+xml" rel="alternate" title="<? bloginfo( 'name' ); ?> RSS Feed" href="<? bloginfo( 'rss2_url' ); ?>" />
	<link type="application/atom+xml" rel="alternate" title="<? bloginfo( 'name' ); ?> Atom Feed" href="<? bloginfo( 'atom_url' ); ?>" />
	<script type="text/javascript" src="/assets/js/jquery.js"></script>
	<title><? bloginfo( 'name' ); wp_title( '&mdash;', true, 'left' ); ?></title>
	<? if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
	<? wp_head(); ?>
</head>
<body>
	<div id="container">
		<div id="header">
			<h1><span class="black">Ahmed Nuaman</span> <span class="white">Freelance Designer and Developer</span></h1>
		</div>
		<div id="blogMainfeature">
			<div id="blogMainfeatureInner"></div>
		</div>
		<div id="menu">
			<ul>
				<li><a href="/" id="portfolio">My Portfolio</a></li>
				<li><a href="/blog" class="selected" id="blog">My Blog</a></li>
				<li><a href="http://twitter.com/ahmednuaman" id="twitter">My Tweets</a></li>
				<li><a href="mailto:ahmed@ahmednuaman.com?subject=Enquiry from ahmednuaman.com" id="email">Email Me</a></li>
				<? // wp_list_pages( array( 'title_li' => '' ) ); ?>
			</ul>
		</div>
		<? get_sidebar(); ?>
		<div id="leftCol">