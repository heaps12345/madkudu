<?php
/*
 WARNING: This file is part of the core Ultimatum framework. DO NOT edit
 this file under any circumstances.
 */

/**
 *
 * This file is a core Ultimatum file and should not be edited.
 *
 * @package  Ultimatum
 * @author   Wonder Foundry http://www.wonderfoundry.com
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     http://ultimatumtheme.com
 * @version 2.50
 */

add_action( 'ultimatum_after_post', 'ultimatum_get_comments_template',10,1 );

function ultimatum_get_comments_template($instance=array()) {
	global $post;
	if ( ! post_type_supports( $post->post_type, 'comments' ) )
		return;
	if ( is_singular() && $instance['show_comments_form']=='true')
		comments_template( '', true );
}

add_action( 'ultimatum_comments', 'ultimatum_do_comments' );
function ultimatum_do_comments() {
	global $post, $wp_query;
	if ( ! post_type_supports( $post->post_type, 'comments' ) )
		return;
	if ( have_comments() && ! empty( $wp_query->comments_by_type['comment'] ) ) {
		echo '<div id="comments" class="entry-comments">';
			echo apply_filters( 'ultimatum_title_comments', __( '<h3>Comments</h3>', 'ultimatum' ) );
			echo '<ol class="comment-list">';
				do_action( 'ultimatum_list_comments' );
			echo '</ol>';

			//* Comment Navigation
			$prev_link = get_previous_comments_link( apply_filters( 'ultimatum_prev_comments_link_text', '' ) );
			$next_link = get_next_comments_link( apply_filters( 'ultimatum_next_comments_link_text', '' ) );

			if ( $prev_link || $next_link )
				printf( '<div class="navigation"><div class="alignleft">%s</div><div class="alignright">%s</div></div>', $prev_link, $next_link );
		echo '</div>';
	}
	elseif ( 'open' == $post->comment_status && $no_comments_text = apply_filters( 'ultimatum_no_comments_text', '' ) ) {
		echo '<div id="comments">' . $no_comments_text . '</div>';
	}
	elseif ( $comments_closed_text = apply_filters( 'ultimatum_comments_closed_text', '' ) ) {
		echo '<div id="comments">' . $comments_closed_text . '</div>';
	}

}

add_action( 'ultimatum_pings', 'ultimatum_do_pings' );

function ultimatum_do_pings() {
	global $post, $wp_query;
	if ( ! post_type_supports( $post->post_type, 'trackbacks' ) )
		return;
	if ( have_comments() && !empty( $wp_query->comments_by_type['pings'] ) ) {
		?>
		<div id="pings">
			<?php echo apply_filters( 'ultimatum_title_pings', __( '<h3>Trackbacks</h3>', 'ultimatum' ) ); ?>
			<ol class="ping-list">
				<?php do_action( 'ultimatum_list_pings' ); ?>
			</ol>
		</div>
		<?php
	}
	else {
		echo apply_filters( 'ultimatum_no_pings_text', '' );
	}

}

add_action( 'ultimatum_list_comments', 'ultimatum_default_list_comments' );
function ultimatum_default_list_comments() {
	$defaults = array(
		'type'        => 'comment',
		'avatar_size' => 64,
		'callback'    =>  'ultimatum_comment_callback',
	);
	$args = apply_filters( 'ultimatum_comment_list_args', $defaults );
	wp_list_comments( $args );
}

add_action( 'ultimatum_list_pings', 'ultimatum_default_list_pings' );
function ultimatum_default_list_pings() {
	$args = apply_filters( 'ultimatum_ping_list_args', array(
		'type' => 'pings',
	) );
	wp_list_comments( $args );
}

function ultimatum_comment_callback( $comment, array $args, $depth ) {
	$GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
	<article <?php echo 'class="well comment-container" itemtype="http://schema.org/UserComments" itemprop="comment" itemscope="itemscope"'; ?>>
		<?php do_action( 'ultimatum_before_comment' ); ?>

		<header class="comment-header">
			<p <?php echo 'class="comment-author" itemtype="http://schema.org/Person" itemscope="itemscope" itemprop="creator"'; ?>>
				<?php
				echo get_avatar( $comment, $args['avatar_size'] );

				$author = get_comment_author();
				$url    = get_comment_author_url();

				if ( ! empty( $url ) && 'http://' != $url ) {
					$author = sprintf( '<a href="%s" rel="external nofollow" itemprop="url">%s</a>', esc_url( $url ), $author );
				}

				printf( '<span itemprop="name">%s</span>', $author);
				?>
				<span class="comment-meta">
				<?php
				$pattern = '<time itemprop="commentTime" datetime="%s"><a href="%s" itemprop="url">%s %s %s</a></time>';
				printf( $pattern, esc_attr( get_comment_time( 'c' ) ), esc_url( get_comment_link( $comment->comment_ID ) ), esc_html( get_comment_date() ), __( 'at', 'ultimatum' ), esc_html( get_comment_time() ) );

				edit_comment_link( __( '(Edit)', 'ultimatum' ), ' ' );
				?>
			</span>
		 	</p>
		</header>
		<div class="comment-content" itemprop="commentText">
			<?php if ( $comment->comment_approved == '0' ) : ?>
				<p class="alert"><?php echo apply_filters( 'ultimatum_comment_awaiting_moderation', __( 'Your comment is awaiting moderation.', 'ultimatum' ) ); ?></p>
			<?php endif; ?>
			<?php comment_text(); ?>
		</div>
		<?php
		comment_reply_link( array_merge( $args, array(
			'depth'  => $depth,
			'before' => '<div class="comment-reply">',
			'after'  => '</div>',
		) ) );
		?>
		<?php do_action( 'ultimatum_after_comment' ); ?>
	</article>
	<?php
}

add_action( 'ultimatum_comment_form', 'ultimatum_do_comment_form' );
function ultimatum_do_comment_form() {
	global $post, $wp_query;
	if ( ! post_type_supports( $post->post_type, 'comments' ) )
	return;
	comment_form( array( 'format' => 'html5' ) );
}


