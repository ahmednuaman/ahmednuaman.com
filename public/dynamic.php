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
			<div id="intro">
				<h1>
					Ahmed Nuaman
				</h1>
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
										<a href="<?php echo $v->href; ?>">View the project &raquo;</a>
									</p>
								<?php endif; ?>
							</div>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
			<div id="bio">
				
			</div>
		</div>
		<script src="/assets/js/jquery.js"></script>
		<script src="/assets/js/jquery.lettering.js"></script>
		<script src="/assets/js/suitcase.js"></script>
	</body>
</html>
<?php
$h	= preg_replace( '/\s{2,}/im', '', ob_get_contents() );

ob_end_flush();

file_put_contents( 'index.html', $h );
?>