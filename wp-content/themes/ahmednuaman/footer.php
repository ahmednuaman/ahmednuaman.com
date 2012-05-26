			
		</div>
		<?php wp_footer(); ?>
		<?php if ( WP_DEBUG ): ?>
			<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>
			<script src="<?php echo get_template_directory_uri(); ?>/assets/js/suitcase.js"></script>
		<?php else: ?>
			<script src="<?php echo get_template_directory_uri(); ?>/assets/js/packaged.js"></script>
		<?php endif; ?>
	</body>
</html>