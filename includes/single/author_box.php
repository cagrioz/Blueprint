<?php
/**
 * The template part to show author box.
 *
 * @package    Blueprint
 * @version    1.0
 * @author     author <admin@email.com>
 * @copyright  Copyright (c) 2018, author
 * @link       themeuri
 * @license    http://www.gnu.org/licenses/gpl-2.0.html GNU General Public License v2 or later
 */

global $post;

$blueprint_author = get_userdata($post->post_author);
?>

<?php if( ! empty($blueprint_author->description) ): ?>

<div class="single-module author-box">

	<?php echo get_avatar( get_the_author_meta('email'), '100' ); ?>

	<h5 class="author-link"><?php the_author_posts_link(); ?></h5>

	<p><?php echo get_the_author_meta('description'); ?></p>

    <div class="social-profiles">
		<?php blueprint_social_profiles(); ?>
	</div>

</div>

<?php endif; ?>
