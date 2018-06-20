<?php
/**
 * The template for displaying comments.
 *
 * @package    Blueprint
 * @version    1.0
 * @author     author <admin@email.com>
 * @copyright  Copyright (c) 2018, author
 * @link       themeuri
 * @license    http://www.gnu.org/licenses/gpl-2.0.html GNU General Public License v2 or later
 */

/**
 * Add custom HTML just after the opening `<form>` tag in the comment_form() output.
 */
add_action( 'comment_form_before_fields', 'blueprint_comment_form_before' );
function blueprint_comment_form_before(){
     echo '<div class="row">';
}

/**
* Add custom HTML just before the close `<form>` tag in the comment_form() output.
*/
add_action( 'comment_form_after_fields', 'blueprint_comment_form_after' );
function blueprint_comment_form_after(){
   echo '</div>';
}

 /*
  * If the current post is protected by a password and
  * the visitor has not yet entered the password we will
  * return early without loading the comments.
  */
 if ( post_password_required() ) {
 	return;
 }
 ?>

 <div class="comments-area blueprint-comments">

    <h4 class="comments-title"><?php comments_number(esc_html__('No Comments Found','blueprint'), esc_html__('1 Comment','blueprint'), '% ' . esc_html__('Comments','blueprint') ); ?></h4>

 	<?php
 	// You can start editing here -- including this comment!
	if ( have_comments() || comments_open() ) : ?>

 		<ul class="comment-list">
 			<?php
 				wp_list_comments( array(
    				'avatar_size'	=> 70,
    				'max_depth'		=> 5,
    				'short_ping'    => true,
    				'style'			=> 'ul',
    				'callback'		=> 'blueprint_comments',
    				'type'			=> 'all'
 				) );
 			?>
 		</ul>

 		<?php the_comments_navigation();

	  $args = array(
		'id_form'              => 'comment-form',
		'class_form'           => 'blueprint-form',
		'title_reply'          => esc_html__( 'Leave a Reply' ,'blueprint'),
		'title_reply_to'       => esc_html__( 'Leave a Comment to %s'  ,'blueprint'),
		'cancel_reply_link'    => esc_html__( 'Cancel Comment'  ,'blueprint'),
		'must_log_in'          => '<p class="must-log-in">' .  wp_kses_post(sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.' ,'blueprint' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( ) ) ) )) . '</p>',
		'logged_in_as'         => '<p class="logged-in-as">' . wp_kses_post(sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>'  ,'blueprint'), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) ). '</p>',
		'comment_notes_before' => '',
		'comment_notes_after'  => '',
        'comment_field' => '<div class=" formitem"><textarea name="comment" placeholder="'.esc_html__('Comment','blueprint').'"  id="text" class="form-control" rows="10"  maxlength="400" aria-required="true"></textarea></div>',
		'fields' => apply_filters( 'comment_form_default_fields',
		  array(
			'author' => '
				<div class="col6 form-input">
				  <input type="text" placeholder="'.esc_html__('Name','blueprint').'" name="author" id="name" class="form-control" maxlength="100" aria-required="true">
				</div>',

			'email' => '
				<div class="col6 form-input">
				  <input type="email" placeholder="'.esc_html__('Email','blueprint').'" name="email" id="email" class="form-control" maxlength="100" aria-required="true">
				</div>',

			'url' => '
				<div class="col12 form-input">
				  <input type="text" placeholder="'.esc_html__('Website','blueprint').'" name="url" id="url" class="form-control" maxlength="100">
				</div>',
		  )
		)
	  );

 	comment_form($args);

 	else : // Check for have_comments() ?>
       
        <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'blueprint' ); ?></p>

    <?php endif; ?>

 </div><!-- #comments -->