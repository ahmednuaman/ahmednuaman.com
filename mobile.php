<?
// if ( substr_count( $_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip' ) )
// {
// 	ob_start( 'ob_gzhandler' );
// }
// else
// {
// 	ob_start();
// }

$work = simplexml_load_file( 'assets/xml/work.xml' );
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- 
Web Site Designed, Programmed and Maintained by FireStarter Media Limited, www.firestartermedia.com, hello@firestartermedia.com.
The design and code are copyright FireStarter Media Limited.
Copyright (c) FireStarter Media Limited. All rights reserved.
-->
<head>
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<meta name="robots" content="noindex, nofollow" />
	<meta name="viewport" content="width=320; user-scalable=yes; initial-scale=1.0;" />
	<link type="text/css" rel="stylesheet" href="/assets/css/mobile.css" />
	<script type="text/javascript" src="/assets/js/jquery.js"></script>
	<script type="text/javascript" src="/assets/js/suitcase-mobile.js"></script>
	<title>Ahmed Nuaman &mdash; Freelance Designer and Developer &mdash; Portfolio</title>
</head>
<body>
	<div id="container">
		<div id="header">
			<h1><span class="black">Ahmed Nuaman</span><br /><span class="white">Freelance Designer <br />and Developer</span></h1>
			<? if ( !strstr( $_SERVER['HTTP_USER_AGENT'], 'iPhone' ) && !strstr( $_SERVER['HTTP_USER_AGENT'], 'iPod' ) && !strstr( $_SERVER['HTTP_USER_AGENT'], 'Android' ) ): ?>
				<h2>Hold on! This is the mobile version, please <a href="/">click here to go to the computer version &raquo;</a></h2>
			<? endif; ?>
		</div>
		<div id="menu">
			<ul>
				<li><a href="/" class="selected">My Portfolio</a></li>
				<li><a href="/blog">My Blog</a></li>
				<li><a href="http://twitter.com/ahmednuaman">My Tweets</a></li>
				<li><a href="mailto:ahmed@ahmednuaman.com?subject=Enquiry from ahmednuaman.com">Email Me</a></li>
			</ul>
		</div>
		<div id="mobileMainfeature">
			<ul>
				<? foreach ( $work->feature as $feature ): ?>
				<li id="<?=$feature->id;?>" style="background-image: url(<?=str_replace( '.jpg', '_mobile.jpg', $feature->image );?>);">
					<h3><?=htmlspecialchars( $feature->title );?></h3>
				</li>
				<? endforeach; ?>
			</ul>
		</div>
		<h2>About Me</h2>
		<p>I'm a freelance designer and developer with a first class degree in Interaction Design. I have strong knowledge of the web design and development industry and my skills include the design and development of web sites, gadgets and rich media adverts. I'm a self-motivated individual, I'm happy to work as an individual or in a team and believe that it's better to try than to not try at all.</p>
		<p>My skills range from OOP Actionscript 2 &amp; 3, PHP, XHTML, CSS, JavaScript to design and real time video streaming to computer and mobile, and I'm a fully qualified Google AdWords Reseller. As I am comfortable with both design and development needs, I enjoy the challenge of balancing client and business needs in order to achieve the best outcome possible.</p>
		<p>I've got professional knowledge of:</p>
		<ul>
			<li><strong>Server-side</strong>: PHP, Python and MySQL</li>
			<li><strong>Client-side</strong>: XHTML, CSS, JavaScript, Actionscript and MXML</li>
			<li><strong>Programmes</strong>: Photoshop, Illustrator, InDesign, Flash and Flex Builder</li>
			<li><strong>Usability</strong>: KISS, Accessibility and interaction design</li>
			<li><strong>Designing</strong>: Web sites, YouTube brand channels, Rich-Media adverts (for TABS/GCN) and print media</li>
			<li><strong>Programming</strong>: YouTube APIs, GData APIs, Flickr API, Protx 3Dsecure, PayPal API and QTSS</li>
		</ul>
		<p>You can find out more about me by <a href="CV.pdf">downloading my CV</a>.</p>
		<br />
		<h2>Contact Me</h2>
		<ul>
			<li>Phone: <a href="tel:00447811184436">+44 7811 184 436</a></li>
			<li>Email: <a href="mailto:ahmed@ahmednuaman.com?subject=Enquiry from ahmednuaman.com">ahmed@ahmednuaman.com</a></li>
			<li>Social: <a href="http://www.linkedin.com/in/ahmednuaman">LinkedIn</a>, 
						<a href="http://www.krop.com/ahmednuaman/">Krop</a>,
						<a href="http://www.twitter.com/ahmednuaman/">Twitter</a>,
						<a href="http://www.facebook.com/pages/Ahmed-Nuaman-Interactive-Creative-Designer/10517387039">Facebook</a>, 
						<a href="http://technorati.com/claim/2u8rjdv3y3" rel="me">Technorati Profile</a>,
						<a href="http://w3csites.com/profile.asp?u=ahmednuaman">W3C Sites</a></li>
		</ul>
		<br />
		<p>
			&copy; Ahmed Nuaman <?=date('Y');?>. <a href="http://www.firestartermedia.com">Looking for web design? Visit FireStarter Media Limited</a>.<br />
			This site is built with <a href="http://validator.w3.org/check?uri=referer">valid XHTML 1.1</a> and <a href="http://jigsaw.w3.org/css-validator/check/referer">valid CSS 2.1</a>.
		</p>
	</div>
	<script type="text/javascript">
	var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
	document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
	</script>
	<script type="text/javascript">
	try {
	var pageTracker = _gat._getTracker("UA-352545-12");
	pageTracker._trackPageview();
	} catch(err) {}</script>
</body>
</html>