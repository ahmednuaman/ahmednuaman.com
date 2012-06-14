			</section>
			<hr />
			<footer>
				<p>
					&copy; Ahmed Nuaman <?php echo date( 'Y' ); ?>. The code that's shared here is released under <a href="http://creativecommons.org/licenses/by-sa/3.0/">CC BY-SA</a> license.
				</p>
			</footer>
		</div>
		<?php wp_footer(); ?>
		<?php if ( WP_DEBUG ): ?>
			<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>
			<script src="<?php echo get_template_directory_uri(); ?>/assets/js/suitcase.js"></script>
			
			<?php if ( strstr( $_SERVER[ 'HTTP_USER_AGENT' ], 'iPhone' ) ): ?>
				<script src="http://localhost:8080/target/target-script-min.js#anonymous"></script>
			<?php endif; ?>
			
		<?php else: ?>
			<script src="<?php echo get_template_directory_uri(); ?>/assets/js/packaged.js"></script>

		<?php endif; ?>
	</body>
</html>