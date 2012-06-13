<?php
/*
Template Name: Portfolio
*/

get_header();
?>
<section id="hero">
	<ul>
		<?php $i = 0; foreach ( ahmed_get_portfolio_items() as $item ): ?>
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
		<?php $i++; endforeach; ?>
	</ul>
	<div id="hero-pagination">
		<?php for ( $x = 0; $x < $i; $x++ ): ?>
			<a href="#hero"></a>
		<?php endfor; ?>
	</div>
</section>
<section id="padding">
	<article id="bio">
		<div>
			<?php the_content(); ?>
		</div>
	</article>
	<hr />
	<article>
		<h3>
			Latest posts
			<a id="bloglink" class="sociallink sprite" href="/blog">
				<span class="hide">
					Read more posts
				</span>
			</a>
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
			<a id="twitterlink" class="sociallink sprite" href="https://twitter.com/intent/user?screen_name=ahmednuaman">
				<span class="hide">
					Follow me
				</span>
			</a>
		</h3>
		<ul class="list" id="tweets">
			<li></li>
		</ul>
	</article>
</section>
<?php get_footer(); ?>