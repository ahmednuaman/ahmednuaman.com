<?php
/*
Template Name: Portfolio
*/

get_header();
?>
<div id="hero">
	<ul>
		<?php foreach ( ahmed_get_portfolio_items() as $item ): ?>
			<li>
				<img src="<?php echo $item[ 'hero' ]; ?>" alt="<?php echo $item[ 'title' ]; ?> hero" />
				<article>
					<h2>
						<?php echo $item[ 'title' ]; ?>
					</h2>
					<p>
						<?php echo $item[ 'content' ]; ?>
					</p>
				</article>
			</li>
		<?php endforeach; ?>
	</ul>
</div>
<article>
	<?php the_content(); ?>
</article>
<hr />
<article>
	<h3>
		Latest posts
	</h3>
	<ul class="list">
		<?php foreach ( ahmed_get_latest_posts() as $item ): ?>
			<li>
				<a href="<?php echo $item[ 'link' ]; ?>" title="<?php echo $item[ 'title' ]; ?>">
					<?php echo $item[ 'title' ]; ?>
				</a>
			</li>
		<?php endforeach; ?>
	</ul>
</article>
<hr />
<article>
	<h3>
		Latest tweets
	</h3>
	<ul class="list" id="tweets">
		<li>
			<a href="" title=""></a>
		</li>
	</ul>
</article>
<?php get_footer(); ?>