<?php get_header(); ?>
<div id="main" role="main">
	<section>
		<article id="content">
				<h1 id="post-<?php the_ID(); ?>"><?php echo the_title(); ?></h1>
				<?php the_content(); ?>
				<div class="alt">
					<h3>Share the love:</h3>
					<div class="noborder">
						<iframe allowtransparency="true" frameborder="0" scrolling="no" src="http://platform.twitter.com/widgets/tweet_button.html?url=<?php the_permalink(); ?>&amp;via=ahmednuaman&amp;text=<? the_title(); ?>" style="width:130px; height:40px;"></iframe>
						<iframe src="http://www.facebook.com/plugins/like.php?href=<?php the_permalink(); ?>&amp;layout=button_count&amp;show_faces=false&amp;width=100&amp;action=like&amp;font=arial&amp;colorscheme=light&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:100px; height:40px;" allowTransparency="true"></iframe>
					</div>
				</div>
				<nav class="navigation">
					<div class="right"><?php previous_posts_link( 'Newer Entries &raquo;' ); ?></div>
					<div class="left"><?php next_posts_link( '&laquo; Older Entries' ); ?></div>
				</nav>
		</article>
	</section>
</div>
<?php get_footer(); ?>