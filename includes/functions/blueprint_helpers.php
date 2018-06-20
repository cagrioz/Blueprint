<?php
/**
 * Blueprint Helpers
 *
 * @package    Blueprint
 * @version    1.0
 * @author     author <admin@email>
 * @copyright  Copyright (c) 2018, author
 * @link       themeuri
 * @license    http://www.gnu.org/licenses/gpl-2.0.html GNU General Public License v2 or later
 */

 /**
  * Display Menu
  * @link https://codex.wordpress.org/Navigation_Menus
  * @since 1.0
  *
  */
if ( ! function_exists('blueprint_menu') ) {
	function blueprint_menu($class = '') {

		if ( has_nav_menu('main-menu') ) {

			wp_nav_menu( array(
				'container'   	 => false,
				'menu_class'     => $class,
				'theme_location' => 'main-menu'
			) );

		} else {
 			echo '<ul><li><a target="_blank" href="'. esc_url( admin_url('nav-menus.php') ) .'" class="no-menu">'. __( 'Add Menu', 'blueprint' ) .'</a></li></ul>';
		}

	}
}

/**
 * Customize the post excerpt more
 *
 * @since 1.0
 */
if ( ! function_exists('blueprint_filter_excerpt_more') ) {
	function blueprint_filter_excerpt_more( $more ) {
		return '..';
	}

	add_filter( 'excerpt_more', 'blueprint_filter_excerpt_more' );
}


 /**
  * The Excerpt
  *
  * @since 1.0
  */
if ( ! function_exists('blueprint_custom_excerpt_length') ) {
	function blueprint_custom_excerpt_length( $length ) {
	 	return 55;
	}

	add_filter( 'excerpt_length', 'blueprint_custom_excerpt_length', 999 );
}


/**
 * Display only one category
 * @since Blueprint 1.0
 */
if ( ! function_exists('blueprint_get_category') ) {
	function blueprint_get_category( $first_cat = false ) {

		global $wp_query;
		$category = get_the_category();

		if ($category) {
			if ( $first_cat === true ) {
			echo '<a href="' . esc_url( get_category_link( $category[0]->term_id ) ) . '">' . $category[0]->cat_name . '</a>';
			} else {
				the_category( '<span class="sep"></span>' );
			}
		}

	}
}


/**
 * Rewrite Categories Widget
 *
 * @since Blueprint 1.0
 */
if ( ! function_exists('blueprint_custom_category_widget') ) {
	function blueprint_custom_category_widget( $links ) {

		$links = str_replace('<a', '<a class="cat"', $links);
		$links = str_replace('</a> (', '</a> <span class="count">(', $links);
		$links = str_replace(')', ')</span>', $links);
		return $links;
	}

	add_filter( 'wp_list_categories', 'blueprint_custom_category_widget' );
}


/**
 * Rewrite Archives Widget
 *
 * @since Blueprint 1.0
 */
if ( ! function_exists('blueprint_custom_archives_widget') ) {
	function blueprint_custom_archives_widget( $links ) {

		$links = str_replace('</a>&nbsp;(', ' <span class="count">(', $links);
		$links = str_replace(')', ')</span></a>', $links);
		return $links;

	}

	add_filter('get_archives_link', 'blueprint_custom_archives_widget');
}


 /**
  * Modifies tag cloud widget arguments to have all tags in the widget same font size.
  *
  * @param array $args Arguments for tag cloud widget.
  * @return array A new modified arguments.
  * @since 1.0
  */
 function blueprint_custom_tag_cloud_widget($args) {
 	$args['largest'] = 12; //largest tag
 	$args['smallest'] = 12; //smallest tag
 	$args['unit'] = 'px'; //tag font unit

 	return $args;
 }
 add_filter( 'widget_tag_cloud_args', 'blueprint_custom_tag_cloud_widget' );


 /**
  * Get the Page Title
  *
  * @since 1.0
  */
if ( ! function_exists('blueprint_get_the_title')) {
   function blueprint_get_the_title() {

        $title = '';
	 	if ( is_category() ) :
	 		printf( esc_html__( '%s', 'blueprint' ), single_cat_title('', false) );
	 	elseif ( is_tag() ) :
	 		printf( esc_html__( '%s', 'blueprint' ), single_tag_title('', false) );
	 	elseif ( is_author() ) :
	 		printf( esc_html__( '%s', 'blueprint' ), get_the_author() );
	 	elseif ( is_day() ) :
	 		printf( esc_html__( '%s', 'blueprint' ), get_the_date() );
	 	elseif ( is_month() ) :
	 		printf( esc_html__( '%s', 'blueprint' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'blueprint' ) ) );
	 	elseif ( is_year() ) :
	 		printf( esc_html__( '%s', 'blueprint' ), get_the_date( _x( 'Y', 'yearly archives date format', 'blueprint' ) ) );
	 	else :
	 		esc_html_e( 'Archives', 'blueprint' );
	 	endif;

        return $title;
   }
}


 /**
  * Pagination
  *
  * @since 1.0
  */
 function blueprint_pagination() { ?>
     <div class="col12 pagination">
         <div class="row">
             <div class="col6 prev textleft"><?php previous_posts_link(__( 'Newer Posts', 'blueprint')); ?></div>
             <div class="col6 next textright"><?php next_posts_link(__( 'Older Posts', 'blueprint')); ?></div>
         </div>
     </div>
 	<?php
 }


/**
 * Move Comment Textarea to bottom
 *
 * @since 1.0
 */
if ( ! function_exists('blueprint_move_comment_field_to_bottom') ) {
	function blueprint_move_comment_field_to_bottom( $fields ) {
	    $comment_field = $fields['comment'];
	    unset( $fields['comment'] );
	    $fields['comment'] = $comment_field;

	    return $fields;
	}

	add_filter( 'comment_form_fields', 'blueprint_move_comment_field_to_bottom', 99,1 );
}


/**
 * Comments Layout
 *
 * @since 1.0
 */
if ( ! function_exists('blueprint_comments') ) {
/**
	* The function returns the html form comments.
	*
	* @param array  $comment comments array.
	* @param array  $args comments option.
	* @param number $depth comment depth.
	*/

	function blueprint_comments($comment, $args, $depth) { $GLOBALS['comment'] = $comment; ?>
	   <li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
		   <div class="comment-list-item">
			   <div class="avatar">
				   <?php echo get_avatar($comment,$args['avatar_size']); ?>
			   </div>
			   <div class="comment-content">
				   <h6 class="comment-author author-link"><?php echo get_comment_author_link(); ?></h6>
				   <?php if ($comment->comment_approved == '0') : ?>
					   <em class="wa"><?php esc_html_e('Comment awaiting approval', 'blueprint'); ?></em><br />
				   <?php endif; ?>
				   <div class="comment-text">
					   <?php echo wp_kses_post( apply_filters( 'comment_text', get_comment_text() ) ) ?>
				   </div>
				   <span class="reply">
					   <?php comment_reply_link(array_merge( $args, array('reply_text' => esc_html__('Reply', 'blueprint'), 'depth' => $depth, 'max_depth' => $args['max_depth'])), $comment->comment_ID); ?>
					   <?php edit_comment_link(esc_html__('Edit', 'blueprint')); ?>
				   </span>
			   </div>
		   </div>
	   <?php
	}
}

/**
 * Exclude from search the pages
 *
 * @since 1.0
 */
if ( ! function_exists('blueprint_exclude_all_pages_search') ) {
	function blueprint_exclude_all_pages_search( $query ) {
	    if (
	        ! is_admin()
	        && $query->is_main_query()
	        && $query->is_search
	        && is_user_logged_in()
	    )
	    $query->set( 'post_type', 'post' );
	}

	add_action( 'pre_get_posts','blueprint_exclude_all_pages_search' );
}

/**
 * Socials
 * @return array
 * @since 1.0
 */
if ( ! function_exists('blueprint_socials') ) {
	function blueprint_socials() {
	    
		$socials = array(
			'facebook'     => 'Facebook',
			'twitter'      => 'Twitter',
			'instagram'    => 'Instagram',
			'pinterest'    => 'Pinterest',
			'google-plus'  => 'Google Plus',
			'tumblr'       => 'Tumblr',
			'youtube-plus' => 'Youtube',
			'vimeo'		   => 'Vimeo',
			'dribbble'     => 'Dribbble',
            'linkedin'	   => 'Linkedin',
			'rss'          => 'RSS',
			'steam'        => 'Steam',
			'github'       => 'Github',
			'twitch'       => 'Twitch',
			'reddit'       => 'Reddit',
			'weibo'        => 'Weibo',
			'flickr'	   => 'Flickr'
		);

		return $socials;
	}
}


/**
 * Social Profiles
 *
 * @since 1.0
 */
if ( ! function_exists('blueprint_social_profiles') ) {
	function blueprint_social_profiles() { 

    	$socials = blueprint_socials();

		foreach ( $socials as $social => $media ) :
			if ( get_theme_mod('profile_' . $social, '') ) : 
	    		?>
                <a href="<?php echo esc_url( get_theme_mod( 'social_' . $social, '' ) ); ?>"><i class="fa fa-<?php echo esc_html($social); ?>"></i></a>
                <?php
            endif;
		endforeach;

	}
}


/**
 * Social Share
 *
 * @since 1.0
 */
if ( ! function_exists('blueprint_social_share') ) {
	function blueprint_social_share() {
		?>
		<div class="post-share">
		<?php

		if (get_theme_mod('share_facebook')) : ?><a href="#" onclick="window.open('http://www.facebook.com/sharer.php?u=<?php echo esc_url(get_the_permalink()); ?>&amp;t=<?php the_title(); ?>', 'facebookShare', 'width=626,height=436'); return false;" title="<?php echo esc_html_e('Share on Facebook','blueprint'); ?>"><i class="fa fa-facebook"></i></a><?php endif; ?>
	    <?php if(get_theme_mod('share_twitter')) : ?><a href="#" onclick="window.open('http://twitter.com/share?text=<?php the_title(); ?>&amp;url=<?php echo esc_url(get_the_permalink()); ?>', 'twitterShare', 'width=626,height=436'); return false;" title="<?php echo esc_html_e('Tweet This Post','blueprint'); ?>"><i class="fa fa-twitter"></i></a><?php endif; ?>
	    <?php if(get_theme_mod('share_pinterest')) : ?><a href="#" onclick="window.open('http://pinterest.com/pin/create/button/?url=<?php echo esc_url(get_the_permalink()); ?>&amp;description=<?php the_title(); ?>', 'pinterestShare', 'width=626,height=436'); return false;" title="<?php echo esc_html_e('Pin This Post','blueprint'); ?>"><i class="fa fa-pinterest"></i></a><?php endif; ?>
	    <?php if(get_theme_mod('share_google-plus')) : ?><a href="#" onclick="window.open('https://plus.google.com/share?url=<?php echo esc_url(get_the_permalink()); ?>&amp;description=<?php the_title(); ?>', 'gooogleplusShare', 'width=626,height=436'); return false;" title="<?php echo esc_html_e('Google Plus Share','blueprint'); ?>"><i class="fa fa-google-plus"></i></a><?php endif; ?>
	    <?php if(get_theme_mod('share_linkedin')) : ?><a href="#" onclick="window.open('https://www.linkedin.com/shareArticle?url=<?php echo esc_url(get_the_permalink()); ?>&amp;description=<?php the_title(); ?>', 'linkedinShare', 'width=626,height=436'); return false;" title="<?php echo esc_html_e('linkedin Share','blueprint'); ?>"><i class="fa fa-linkedin"></i></a><?php endif; ?>
	    <?php if(get_theme_mod('share_reddit')) : ?><a href="#" onclick="window.open('http://reddit.com/submit?url=<?php echo esc_url(get_the_permalink()); ?>&amp;description=<?php the_title(); ?>', 'redditShare', 'width=626,height=436'); return false;" title="<?php echo esc_html_e('Reddit Share','blueprint'); ?>"><i class="fa fa-reddit"></i></a><?php endif; ?>
	    <?php if(get_theme_mod('share_tumblr')) : ?><a href="#" onclick="window.open('http://www.tumblr.com/share/link?=<?php echo esc_url(get_the_permalink()); ?>&amp;description=<?php the_title(); ?>', 'tumblrShare', 'width=626,height=436'); return false;" title="<?php echo esc_html_e('Tumblr Share','blueprint'); ?>"><i class="fa fa-tumblr"></i></a><?php endif;
	    ?>
		</div>
		<?php
	}
}