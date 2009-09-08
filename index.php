<?
if ( strstr( $_SERVER['HTTP_USER_AGENT'], 'iPhone' ) || strstr( $_SERVER['HTTP_USER_AGENT'], 'iPod' ) || strstr( $_SERVER['HTTP_USER_AGENT'], 'Android' ) )
{
	header( 'Location: /mobile.php' );
	
	exit();
}
else
{
	if ( substr_count( $_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip' ) )
	{
		ob_start( 'ob_gzhandler' );
	}
	else
	{
		ob_start();
	}
}

$recommendations = simplexml_load_file( 'assets/xml/recommendations.xml' );
$work = simplexml_load_file( 'assets/xml/work.xml' );
$blog = simplexml_load_file( 'assets/xml/blog.xml' );
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
	<meta name="description" content="The official portfolio of Ahmed Nuaman, Freelance Designer and Developer" />
	<meta name="keywords" content="ahmed, nuaman, ahmednuaman, newman, firestarter, media, firestartermedia, freelance, web, website, designer, developer, php, xhtml, html, css, javascript, mysql, actionscript, flash, photoshop, flex, mxml, youtube, brand, channel, gadget, widget, google, apis, gdata, iphone, ipod, apple, android, g1" />
	<link type="image/x-icon" rel="shortcut icon" href="/favicon.ico" /> 
	<link type="text/css" rel="stylesheet" href="/gzip-service.php?f=assets/css/styles.css" media="all" />
	<link type="application/rss+xml" rel="alternate" title="Ahmed Nuaman &mdash; Freelance Designer and Developer &mdash; Blog RSS Feed" href="http://ahmednuaman.com/blog/feed/" />
	<link type="application/atom+xml" rel="alternate" title="Ahmed Nuaman &mdash; Freelance Designer and Developer &mdash; Blog Atom Feed" href="http://ahmednuaman.com/blog/feed/atom/" />
	<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="http://ahmednuaman.com/blog/wp-includes/wlwmanifest.xml" />
	<script type="text/javascript" src="/gzip-service.php?f=assets/js/jquery.js,assets/js/jquery-easing.js,assets/js/jquery-flash.js,assets/js/jquery-scrollTo.js,assets/js/jquery-tweet.js,assets/js/jquery-ui.js,assets/js/suitcase.js"></script>
	<title>Ahmed Nuaman &mdash; Freelance Designer and Developer &mdash; Portfolio</title>
</head>
<body>
	<div id="container">
		<div id="header">
			<h1><span class="black">Ahmed Nuaman</span> <span class="white">Freelance Designer and Developer</span></h1>
		</div>
		<div id="mainfeature">
			<div id="mainfeatureInner"></div>
		</div>
		<div id="menu">
			<ul>
				<li><a href="/" class="selected" id="portfolio">My Portfolio</a></li>
				<li><a href="/blog" id="blog">My Blog</a></li>
				<li><a href="http://twitter.com/ahmednuaman" id="twitter">My Tweets</a></li>
				<li><a href="mailto:ahmed@ahmednuaman.com?subject=Enquiry from ahmednuaman.com" id="email">Email Me</a></li>
			</ul>
		</div>
		<div id="rightCol">
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
							<a href="http://w3csites.com/profile.asp?u=ahmednuaman">W3C Sites</a></li>
			</ul>
			<br />
			<iframe src="http://www.google.com/talk/service/badge/Show?tk=z01q6amlq5fnfbeju431acikg3tbjrav4slbitg4grjqc7ees3v76kebn10pj8lb7chcd83pjttdg658ea2pek6oce36agv9ppu9a1gulh8ff1u7n64p4q2lnjvs56d0em63hgmikktdhjb2fo4bjgh30c3325d5gnnbjop92&amp;w=200&amp;h=60" frameborder="0" allowtransparency="true" width="200" height="60" class="center"></iframe>
			<br />
			<img src="/assets/image/qr.png" alt="qrcode" class="center border" />
			<br />
			<h2>Recommendations</h2>
			<ul id="recommendations">
				<? foreach ( $recommendations->recommendation as $recommendation ): ?>
				<li>
					<p>&#x201C;<?=trim( $recommendation->description );?>&#x201D;</p>
					<p><?=$recommendation->author;?>, <em><?=$recommendation->title;?></em></p>
				</li>
				<? endforeach; ?>
			</ul>
			<br />
			<h2>Blog Entries</h2>
			<ul id="blogEntries">
				<? foreach ( $blog->channel->item as $entry ): ?>
				<li>
					<p>
						<a href="<?=$entry->link;?>"><?=trim( $entry->title );?></a>
					</p>
					<p>
						<em><?=$entry->description;?></em><br /> 
						<a href="<?=$entry->link;?>">Read more &raquo;</a>
					</p>
				</li>
				<? endforeach; ?>
			</ul>
			<br />
			<h2>Tweets</h2>
			<div id="twitterEntries">
			</div>
		</div>
		<div id="leftCol">
			<h2>My Notable Work</h2>
			<ul class="work">
				<? foreach ( $work->feature as $feature ): ?>
				<li id="<?=$feature->id;?>">
					<h3><?=htmlspecialchars( $feature->title );?></h3>
					<p>
						<?=$feature->description;?>
						<? if ( $feature->link ): ?>
							<a href="http://<?=str_replace( '&', '&amp;', $feature->link );?>" title="Go to <?=htmlspecialchars( $feature->title );?> project web site">Visit this project's web site &raquo;</a>
						<? endif; ?>
					</p>
					<? if ( $feature->thumbnails ): ?>
						<div class="thumbnails">
							<? foreach ( $feature->thumbnails->thumbnail as $thumbnail ): ?>
								<div style="background-image: url(<?=$thumbnail->attributes()->src;?>)" title="<?=htmlspecialchars( $feature->title );?> screenshot">
									<span class="hide"><?=htmlspecialchars( $feature->title );?> screen-shot</span>
								</div>
							<? endforeach; ?>
						</div>
					<? endif; ?>
					<? if ( $feature->tags ): ?>
						<div class="tags">
							<ul>
								<? 
									$tags = get_object_vars( $feature->tags );
									$tags = $tags[ 'tag' ];
									sort( $tags );
								?>
								<? foreach ( $tags as $tag ): ?>
									<li>
										<a href="/blog/tag/<?=$tag;?>"><?=$tag;?></a>
									</li>
								<? endforeach; ?>
							</ul>
						</div>
					<? endif; ?>
					<!-- <p>
						<a href="#" onclick="scrollBackUp()" class="topLink"><small>Top</small></a>
					</p> -->
				</li>
				<? endforeach; ?>
			</ul>
			<h3>Other Work</h3>
			<p><strong>Code</strong></p>
			<ul>
				<li><strong>Actionscript 2</strong> &mdash; built a series of classes for Actionscript 2 that help with the interaction and integration of Google and YouTube APIs</li>
				<li><strong>Actionscript 3</strong> &mdash; extended standard and PureMVC classes to help with the development of Actionscript 3 applications</li>
				<li><strong>PHP</strong> &mdash; created a series of helpers and libraries for tasks such as compressing components, aiding with HTML and authentication</li>
				<li><strong>JavaScript</strong> &mdash; generated a base prototype to help with the agile and speedy development of web sites and JavaScript applications</li>
				<li><strong>Python</strong> &mdash; used Google App Engine and Django framework to built APIs and proxies that aided with the interaction of YouTube and Google projects</li>
			</ul>
			<p><strong>Advertising</strong></p>
			<ul>
				<li><strong>Natwest</strong> &mdash; a series of animated custom creatives for Natwest Cricket Series newsletters</li>
				<li><strong>Visit Iceland</strong> &mdash; a series of animated and interactive MPUs and banners for the Visit Iceland campaign</li>
				<li><strong>Starwoods Westin Paris</strong> &mdash; a microsite for the launch of the new Starwoods Westin Paris hotel</li>
				<li>...and more</li>
			</ul>
			<p><strong>Web sites</strong></p>
			<ul>
				<li><a href="http://www.doctoramal.com">Dr Amal Ahmed</a> &mdash; Flash Front-end with Google Maps API for Flash Integration</li>
				<li><a href="http://www.aliashosting.com">Alias Hosting</a> &mdash; PHP/MySQL Custom System with Domain Whois "look up", Customer Database and PayPal Integration</li>
				<li><a href="http://www.theteams.info">TheTeams.info</a> &mdash; PHP/MySQL Custom System with Customer and Team Management Database and Merch eCommerce System</li>
				<li><a href="http://www.firestartermedia.com">FireStarter Media Limited</a> &mdash; PHP/MySQL Custom System with Back-end CRM and CMS with Integrated Search Engine and APIs</li>
				<li><a href="http://www.eas.eu">European Advisory Service</a> &mdash; ASP.NET CMS, AJAX/PHP API, PHP/MySQL CRM</li>
				<li><a href="http://www.heathfarm.org">Heath Farm</a> &mdash; PHP/MySQL CMS</li>
				<li><a href="http://www.stmarkshospital.org.uk">St Mark's Hospital</a> &mdash; PHP/MySQL CMS, Publication Search-engine and Online Shop with Protx Integration</li>
				<li><a href="http://www.stmarksfoundation.org">St Mark's Hospital Foundation</a> &mdash; PHP/MySQL CMS, Flash JustGiving Widget, Online Donations through Protx</li>
				<li><a href="http://www.communityfostercare.co.uk">Community Foster Care</a> &mdash; PHP/MySQL CMS with sIFR Integration</li>
				<li><a href="http://www.europeanbotanicalforum.org">European Botanical Forum</a> &mdash; PHP/MySQL CMS with Flash Image Banner</li>
				<li><a href="http://www.thedaisychainhairandbeauty.co.uk">The Daisy Chain</a> &mdash; PHP/MySQL CMS with sIFR Integration</li>
				<li><a href="http://www.bsstaging.com">Blackfriars Scenery</a> &mdash; PHP/MySQL/XML CMS with simple FTP Integration</li>
				<li><a href="http://www.blueskylabs.vc">Blue Sky Labs</a> &mdash; PHP/MySQL CMS with Flash Front-end</li>
				<li><a href="http://www.resbond.co.uk">Resbond</a> &mdash; PHP/MySQL custom CMS with Interactive Quote Creator</li>
				<li><a href="http://www.firestartermedia.com/clients/">...and more</a></li>
			</ul>
			<br />
			<p>
				&copy; Ahmed Nuaman <?=date('Y');?>. <a href="http://www.firestartermedia.com">Looking for web design? Visit FireStarter Media Limited</a>.<br />
				This site is built with <a href="http://validator.w3.org/check?uri=referer">valid XHTML 1.1</a> and <a href="http://jigsaw.w3.org/css-validator/check/referer">valid CSS 2.1</a>.
			</p>
		</div>
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
	<a href="http://github.com/ahmednuaman"><img style="position: absolute; top: 0; right: 0; border: 0;" src="http://s3.amazonaws.com/github/ribbons/forkme_right_darkblue_121621.png" alt="Fork me on GitHub" /></a>
</body>
</html>