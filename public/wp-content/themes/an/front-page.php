<?php get_header(); ?>
<div id="top">
	<div id="carousel">
		<ul>
			<?php $cl	= array(); ?>
			<?php query_posts( array( 'post_type' => /*$_front ?*/ 'an_project' /*: 'post'*/, 'posts_per_page' => 10 ) ); ?>
			<?php while ( have_posts() ): the_post(); ?>
				<?php $id	= get_the_ID(); ?>
				<?php $tid	= get_post_thumbnail_id(); ?>
				<?php $l	= get_permalink(); ?>
				<?php $t	= get_the_title(); ?>
				<?php $u	= wp_get_attachment_image_src( $tid, 'an_hero' ); ?>
				<li id="tile_<?php echo $id; ?>" class="large">
					<a href="<?php echo $l; ?>" style="background-image: url(<?php echo $u[ 0 ]; ?>)">
						<h3><?php echo $t; ?></h3>
					</a>
				</li>
				<?php $u	= wp_get_attachment_image_src( $tid, 'an_hero_mobile' ); ?>
				<li id="tile_mobile_<?php echo $id; ?>" class="mobile">
					<a href="<?php echo $l; ?>" style="background-image: url(<?php echo $u[ 0 ]; ?>)">
						<h3><?php echo $t; ?></h3>
					</a>
				</li>
				<?php array_push( $cl, str_replace( '!/', '!/carousel', $l ) ); ?>
			<?php endwhile; ?>
			<?php wp_reset_query(); ?>
		</ul>
	</div>
	<div id="carousel_controls">
		<menu style="width: <?php echo count( $cl ) * 14; ?>px;">
			<?php foreach ( $cl as $l ): ?>
				<a href="<?php echo $l; ?>"></a>
			<?php endforeach; ?>
		</menu>
	</div>
</div>
<div id="main" role="main">
	<div>
		<section class="col">
			<div class="projects">
				<h2>Latest Projects</h2>
				<h2><a href="<?php echo get_post_type_archive_link( 'an_project' ); ?>">See all projects &raquo;</a></h2>
				<menu>
					<?php query_posts( array( 'post_type' => 'an_project', 'posts_per_page' => 6 ) ); ?>
					<?php while ( have_posts() ): the_post(); ?>
						<li>
							<?php $u	= wp_get_attachment_image_src( get_post_thumbnail_id(), 'an_thumbnail' ); ?>
							<a href="<?php echo get_permalink(); ?>" 
								style="background-image: url(<?php echo $u[ 0 ]; ?>)">
								<h3><?php the_title(); ?> &raquo;</h3>
							</a>
						</li>
					<?php endwhile; ?>
					<?php wp_reset_query(); ?>
				</menu>
			</div>
		</section>
		<section class="col">
			<div>
				<h2>Tweets</h2>
				<h2><a href="http://twitter.com/ahmednuaman">Read more tweets &raquo;</a></h2>
				<ul id="tweets">
					<li>Loading tweets....</li>
				</ul>
			</div>
			<div>
				<h2>Posts</h2>
				<h2><a href="/blog/">Read more posts &raquo;</a></h2>
				<ul>
					<?php query_posts( array( 'post_type' => 'post', 'posts_per_page' => 7 ) ); ?>
					<?php while ( have_posts() ): the_post(); ?>
						<li>
							<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
								<?php the_title(); ?>
							</a>
						</li>
					<?php endwhile; ?>
					<?php wp_reset_query(); ?>
				</ul>
			</div>
		</section>
	</div>
	<div class="clearfix">
		<section class="col">
			<h2>Get in touch</h2>
			<p>If you're in a rush, drop me a call on +44 (0) 7811 184 436, add me to Skype as <strong>ahmednuaman</strong>, or add me to iChat/Google Talk as ahmednuaman@gmail.com. Otherwise...</p>
			<ul>
				<?php foreach ( wp_get_nav_menu_items( 'contact' ) as $i => $item ): ?>
					<li>
						<a href="<?php echo $item->url; ?>">
							<?php echo $item->title; ?>
						</a>
					</li>
				<?php endforeach; ?>
			</ul>
		</section>
		<section class="col">
			<h2>A little bit about me</h2>
			<?php the_content(); ?>
		</section>
	</div>
</div>
<?php get_footer(); ?>