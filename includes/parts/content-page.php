<?php
/**
 * The template file for content of pages
 *
 * @package    Blueprint
 * @version    1.0
 * @author     author <admin@email.com>
 * @copyright  Copyright (c) 2018, author
 * @link       themeuri
 * @license    http://www.gnu.org/licenses/gpl-2.0.html GNU General Public License v2 or later
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('standard col12'); ?>>
	
	<?php if ( has_post_thumbnail() ) : ?>
	<div class="post-media">

        <?php $image          = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'blueprint_std' ); ?>
        <?php $featured_image = aq_resize($image[0],865,530,true,true,true); ?>
        <img src="<?php echo esc_url( $featured_image ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>"/>

	</div>
	<?php endif; ?>

	<div class="post-content">
		
        <div class="textcenter">
            <h2 class="post-title"><?php the_title(); ?></h2>      
        </div>

        <div class="post-text">
            <?php the_content(); ?>
        </div>

        <div class="post-footer">

            <?php blueprint_social_share(); ?>

            <div class="post-author"><?php echo esc_html_e('by', 'blueprint'); ?> <?php the_author_posts_link(); ?></div>

        </div>

	</div>

    <?php 

    get_template_part('includes/single/post_pagination');
    get_template_part('includes/single/related_posts');
    get_template_part('includes/single/author_box');

    comments_template( '', true ); 

    ?>

</article><!-- #post-<?php the_ID(); ?> -->