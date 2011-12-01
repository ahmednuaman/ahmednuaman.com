<?php
function get_json($s)
{
	return json_decode( file_get_contents( $s ) );
}

ob_start();
?>
<!DOCTYPE html>
<html class="no-js" lang="en">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta name="description" content="Ahmed Nuaman's super awesome portfolio of web stuffs" />
		<meta name="author" content="Ahmed Nuaman" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link type="text/css" rel="stylesheet" href="/assets/css/styles.css" />
		<link type="text/plain" rel="author" href="/humans.txt" />
		<title>The Portfolio of the illusive Ahmed Nuaman</title>
	</head>
	<body>
		<div id="container">
			<div id="menu">
				<ul>
					<?php foreach ( get_json( './assets/data/menu.json' ) as $v ): ?>
						<li>
							<a href="<?php echo $v->href; ?>" title="<?php echo $v->title; ?>">
								<?php echo $v->name; ?>
							</a>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
			<div id="intro">
				<h1>Hi, I'm Ahmed. I design and build web sites and apps.</h1>
			</div>
			<div id="work">
				
			</div>
		</div>
	</body>
</html>
<?php
$h	= preg_replace( '/\s{2,}/im', '', ob_get_contents() );

ob_end_flush();

file_put_contents( 'index.html', $h );
?>