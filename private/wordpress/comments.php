<?php if ( !empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( $_SERVER['SCRIPT_FILENAME'] ) == 'comments.php' ) die ('Please do not load this page directly. Thanks!'); ?>
<br />
<?php if ( have_comments() ) : ?>
	<h3 id="comments"><?php comments_number('No Responses', 'One Response', '% Responses' );?> to &#x201C;<?php the_title(); ?>&#x201D;</h3>
    
    <?php if ( $comments ): ?>
	    <ul class="commentlist">
	        <?php $i = 0; ?>
	        <?php foreach ( $comments as $comment ): ?>
    		    <li id="comment-<?php comment_ID(); ?>" <?php echo  ( $i % 2 ? ' class="altRow"' : '' ) ?>>
                    <?php echo  get_avatar( get_comment_author_email(), 48 ); ?>
                    <?php if ($comment->comment_approved == '0'): ?>  
                        <em><strong>Your comment is awaiting approval</strong></em><br />
                    <?php endif; ?> 
                    <em><?php comment_type(); ?> by <?php comment_author_link(); ?>:</em>
                    <?php comment_text(); ?>  
                    <cite>Posted: <?php comment_date(); ?> at <?php comment_time(); ?>; 
                    <?php comment_reply_link(
                        array('reply_text' => 'Reply to this comment', 'add_below' => 'test', 'depth' => 1),
                        $comment->ID,
                        $post->ID
                    ); ?></cite>
        		</li>
        	    <?php $i++; ?>
    		<?php endforeach; ?>
    	</ul>
	<?php endif; ?>
	
	<div class="navigation">
		<div class="right"><?php next_comments_link(); ?></div>
		<div class="left"><?php previous_comments_link(); ?></div>
	</div>
<?php endif; ?>

<?php if ('open' == $post->comment_status) : ?>
	<p><strong><?php comment_form_title( 'Leave a Reply', 'Leave a Reply to %s' ); ?></strong></p>
	
	<div class="cancel-comment-reply">
		<?php cancel_comment_reply_link(); ?>
	</div>

	<form action="<?php echo get_option( 'siteurl' );?>/wp-comments-post.php" method="post" id="commentform">
		<table border="0" cellspacing="0" cellpadding="5" width="100%">
			<?php if ( $user_ID ) : ?>
				<tr>
					<td colspan="2">
						Logged in as <a href="<?php echo get_option( 'siteurl' );?>/wp-admin/profile.php"><?php echo $user_identity;?></a>. 
						<a href="<?php echo wp_logout_url( get_permalink() ); ?>" title="Log out of this account">Log out &raquo;</a>.
					</td>
				</tr>
			<?php else : ?>
				<tr>
					<th scope="row">
						<label for="commentAuthor">Name <?php echo ( $req ? "(required)" : "");?>:</label>
					</th>
					<td>
						<input type="text" name="author" id="commentAuthor" value="<?php echo $comment_author;?>" size="22" tabindex="1" />
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="commentEmail">Email address (won't be published) <?php echo ( $req ? "(required)" : "");?>:</label>
					</th>
					<td>
						<input type="text" name="email" id="commentEmail" value="<?php echo $comment_author_email;?>" size="22" tabindex="2" />
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="commentURL">Web site URL:</label>
					</th>
					<td>
						<input type="text" name="url" id="commentURL" value="<?php echo $comment_author_url;?>" size="22" tabindex="3" />
					</td>
				</tr>
			<?php endif; ?>
			<tr>
			    <td colspan="2">Your comment:</td>
			</tr>
			<tr>
				<td colspan="2">
					<textarea name="comment" rows="6" cols="30" tabindex="4"></textarea>
					<br />
					Allowed tags: <?php echo  allowed_tags(); ?>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<input name="submit" type="submit" tabindex="5" value="Submit" />
					<?php do_action( 'comment_form', $post->ID ); ?>
					<?php comment_id_fields(); ?>
				</td>
			</tr>
		</table>
	</form>

<?php endif; // If registration required and not logged in ?>
