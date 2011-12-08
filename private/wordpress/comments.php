<? if ( !empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( $_SERVER['SCRIPT_FILENAME'] ) == 'comments.php' ) die ('Please do not load this page directly. Thanks!'); ?>
<br />
<? if ( have_comments() ) : ?>
	<h3 id="comments"><? comments_number('No Responses', 'One Response', '% Responses' );?> to &#x201C;<? the_title(); ?>&#x201D;</h3>
    
    <? if ( $comments ): ?>
	    <ul class="commentlist">
	        <? $i = 0; ?>
	        <? foreach ( $comments as $comment ): ?>
    		    <li id="comment-<? comment_ID(); ?>" <?= ( $i % 2 ? ' class="altRow"' : '' ) ?>>
                    <?= get_avatar( get_comment_author_email(), 48 ); ?>
                    <? if ($comment->comment_approved == '0'): ?>  
                        <em><strong>Your comment is awaiting approval</strong></em><br />
                    <? endif; ?> 
                    <em><?php comment_type(); ?> by <?php comment_author_link(); ?>:</em>
                    <? comment_text(); ?>  
                    <cite>Posted: <?php comment_date(); ?> at <?php comment_time(); ?>; 
                    <? comment_reply_link(
                        array('reply_text' => 'Reply to this comment', 'add_below' => 'test', 'depth' => 1),
                        $comment->ID,
                        $post->ID
                    ); ?></cite>
        		</li>
        	    <? $i++; ?>
    		<? endforeach; ?>
    	</ul>
	<? endif; ?>
	
	<div class="navigation">
		<div class="right"><? next_comments_link(); ?></div>
		<div class="left"><? previous_comments_link(); ?></div>
	</div>
<? endif; ?>

<? if ('open' == $post->comment_status) : ?>
	<p><strong><? comment_form_title( 'Leave a Reply', 'Leave a Reply to %s' ); ?></strong></p>
	
	<div class="cancel-comment-reply">
		<? cancel_comment_reply_link(); ?>
	</div>

	<form action="<?=get_option( 'siteurl' );?>/wp-comments-post.php" method="post" id="commentform">
		<table border="0" cellspacing="0" cellpadding="5" width="100%">
			<? if ( $user_ID ) : ?>
				<tr>
					<td colspan="2">
						Logged in as <a href="<?=get_option( 'siteurl' );?>/wp-admin/profile.php"><?=$user_identity;?></a>. 
						<a href="<?=wp_logout_url( get_permalink() ); ?>" title="Log out of this account">Log out &raquo;</a>.
					</td>
				</tr>
			<? else : ?>
				<tr>
					<th scope="row">
						<label for="commentAuthor">Name <?=( $req ? "(required)" : "");?>:</label>
					</th>
					<td>
						<input type="text" name="author" id="commentAuthor" value="<?=$comment_author;?>" size="22" tabindex="1" />
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="commentEmail">Email address (won't be published) <?=( $req ? "(required)" : "");?>:</label>
					</th>
					<td>
						<input type="text" name="email" id="commentEmail" value="<?=$comment_author_email;?>" size="22" tabindex="2" />
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="commentURL">Web site URL:</label>
					</th>
					<td>
						<input type="text" name="url" id="commentURL" value="<?=$comment_author_url;?>" size="22" tabindex="3" />
					</td>
				</tr>
			<? endif; ?>
			<tr>
			    <td colspan="2">Your comment:</td>
			</tr>
			<tr>
				<td colspan="2">
					<textarea name="comment" rows="6" cols="30" tabindex="4"></textarea>
					<br />
					Allowed tags: <?= allowed_tags(); ?>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<input name="submit" type="submit" tabindex="5" value="Submit" />
					<? do_action( 'comment_form', $post->ID ); ?>
					<? comment_id_fields(); ?>
				</td>
			</tr>
		</table>
	</form>

<? endif; // If registration required and not logged in ?>
