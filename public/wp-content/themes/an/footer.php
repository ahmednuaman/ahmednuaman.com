			<footer>
				<span></span>
				<p>&copy; Ahmed Nuaman (that's me) unless it's client work then the copyright sits with its respective owners. As for the blog, that's licensed under a <a href="http://creativecommons.org/licenses/by-sa/2.0/uk/">Creative Commons Attribution-Share Alike 2.0 UK: England &amp; Wales License</a>, unless I (Ahmed Nuaman) state otherwise, so all rights reserved and all wrongs avenged I guess?</p>
				<p>Built using <a href="http://wordpress.org">WordPress</a> because it's awesome. <a href="http://firestartermedia.com/?utm_referrer=ahmednuaman">Looking for web design and development? Try FireStarter Media Limited</a>.</p>
			</footer>
		</div>
		<?php
		$live	= $_SERVER[ 'HTTP_HOST' ] != 'ahmednuaman.local';
		$scripts		= array(
			'jquery-core',
			'jquery-ui',
			'jquery.ba-hashchange',
			'modernizr',
			'suitcase'
		);

		if ( $live )
		{
			$scripts	= array( 'packaged' );
		}

		foreach ( $scripts as $script )
		{
			?>
				<script src="<? echo $js . $script; ?>.js"></script>
			<?php
		}
		?>
		<script>
			var _gaq=[['_setAccount','UA-352545-12'],['_trackPageview'],['_trackPageLoadTime']];
			(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
			g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
			s.parentNode.insertBefore(g,s)}(document,'script'));
		</script>
		<?php wp_footer(); ?>
	</body>
</html>