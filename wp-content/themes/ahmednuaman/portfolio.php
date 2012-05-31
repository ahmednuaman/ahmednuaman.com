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
				<h2>
					<?php echo $item[ 'title' ]; ?>
				</h2>
				<div>
					<?php echo $item[ 'content' ]; ?>
				</div>
			</li>
		<?php endforeach; ?>
	</ul>
</div>
<?php the_content(); ?>
<?php get_footer(); ?>