<?php
function get_json($s, $r=false)
{
	$a	= json_decode( file_get_contents( $s ) );
	
	if ( is_array( $a ) && $r )
	{
		krsort( $a );
	}
	
	return $a;
}

ob_start();
?>
<!DOCTYPE html>
<html class="no-js" lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="description" content="Ahmed Nuaman's super awesome portfolio of web stuffs" />
		<meta name="author" content="Ahmed Nuaman" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, maximum-scale=1.0, minimum-scale=1.0" />
		<link type="text/css" rel="stylesheet" href="/assets/css/animation.css" />
		<link type="text/css" rel="stylesheet" href="/assets/css/styles.css" />
		<link type="text/plain" rel="author" href="/humans.txt" />
		<title>Portfolio of the illusive Ahmed Nuaman</title>
	</head>
	<body>
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
					<?php foreach ( get_json( './assets/data/menu.json' ) as $v ): ?>
						<a href="<?php echo $v->href; ?>" title="<?php echo $v->title; ?>">
							<?php echo $v->name; ?>
						</a>
					<?php endforeach; ?>
				</div>
			</div>
			<div id="work">
				<ul>
					<?php foreach ( get_json( './assets/data/work.json', true ) as $v ): ?>
						<li id="work-<?php echo $v->name; ?>">
							<div class="thumbnail" style="background-image:url(/assets/image/project/<?php echo $v->name; ?>.jpg)">
								<canvas></canvas>
							</div>
							<div class="info">
								<h3>
									<?php echo $v->title; ?>
								</h3>
								<p>
									<?php echo $v->description; ?>
								</p>
								<?php if ( @$v->href ): ?>
									<p>
										<a href="http://<?php echo $v->href; ?>">View the project &raquo;</a>
									</p>
								<?php endif; ?>
							</div>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
			<div id="bio">
				<div>
					<h3>A quick bio...</h3>
					<div class="cols">
						<p>
							<strong>I design and build web sites and apps.</strong> Most of my projects are development led where I work with the designers and creatives to solve their woes and make their concepts come to life. I also do design and occasionally find myself creating a full experience from wireframes to design and then development, which is awesome.
						</p>
						<p>
							I graduated from Ravensbourne College of Design and Communication in 2007 with a first class BA (hons) in Interaction Design. During my time at college I was very fortunate to work with two very influential tutors (<a href="http://uk.linkedin.com/pub/john-durrant/9/693/5a3">John Durrant</a> and <a href="http://uk.linkedin.com/pub/martin-schmitz/2/735/645">Martin Schmitz</a>) who shaped me into what I am today. Without them, I'd probably be cleaning toilets somewhere.
						</p>
						<p>
							Nowadays I freelance bouncing from project to project. I love it because with the uncertainty of work and the pressure of short deadlines allow me to stay driven to never say no. I love learning new things and I love working on projects that'll push me.
						</p>
						<p>
							<a href="mailto:ahmed@ahmednuaman.com?subject=Enquiry%20from%20web%20site&amp;body=Hi%20Ahmed%2C%20we%20want%20you%20to%20make%20benefit%20to%20our%20glorious%20project..." title="I make benefit for your glorious project">So, how about hiring me?</a>. I usually work remotely at home in my pants but I understand that from time to time I need to shave and clothe myself to come in for meetings, which is cool as I've got a mighty Brompton!
						</p>
					</div>
				</div>
				<div>
					<h3>My social skills</h3>
					<div class="col">
						<h4>Latest blog posts</h4>
						<ul id="posts" class="list">
							<li>Loading posts...</li>
						</ul>
						<p>
							<a href="http://feeds.feedburner.com/ahmednuaman" rel="alternate" type="application/rss+xml" class="noborder"><img src="http://www.feedburner.com/fb/images/pub/feed-icon16x16.png" alt="" style="vertical-align:middle;border:0"/></a> <a href="http://feeds.feedburner.com/ahmednuaman" rel="alternate" type="application/rss+xml" title="My thoughts straight to your feed reader">Subscribe in a reader</a>
						</p>
					</div>
					<div class="col">
						<h4>Latest tweets</h4>
						<ul id="tweets" class="list">
							<li>Loading tweets...</li>
						</ul>
						<p>
							<a href="https://twitter.com/ahmednuaman" class="twitter-follow-button noborder" data-show-count="false" data-lang="en">Follow @ahmednuaman</a>
							<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
						</p>
					</div>
				</div>
				<div id="footer">
					<p>
						&copy; Ahmed Nuaman; remember that because I've got client work on here, they own the respective copyright.
					</p>
				</div>
			</div>
		</div>
		<script src="/assets/js/jquery.js"></script>
		<script src="/assets/js/jquery.lettering.js"></script>
		<script src="/assets/js/suitcase.js"></script>
	</body>
</html>
<?php
$h	= preg_replace( '/\s{2,}/im', '', ob_get_contents() );

$f	= array(
	'<link type="text/css" rel="stylesheet" href="/assets/css/animation.css" />',
	'<script src="/assets/js/jquery.js"></script><script src="/assets/js/jquery.lettering.js"></script><script src="/assets/js/suitcase.js"></script>'
);

$r	= array(
	'',
	'<script src="/assets/js/packaged.js"></script>'
);

$h	= str_replace( $f, $r, $h );

ob_end_flush();

file_put_contents( 'index.html', $h );
?>