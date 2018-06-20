<?php
/**
 * The template part for displaying post content
 *
 * @package    Blueprint
 * @version    1.0
 * @author     author <admin@email.com>
 * @copyright  Copyright (c) 2018, author
 * @link       themeuri
 * @license    http://www.gnu.org/licenses/gpl-2.0.html GNU General Public License v2 or later
 */

$layout = get_theme_mod('single_sidebar', 'r_sidebar');

if ( $layout !== 'no_sidebar' ) {
    $size   = 'blueprint_std';
    $width  = 865;
    $height = 530;
} else {
    $size   = 'blueprint_full';
    $width  = 1180;
    $height = 650;
}
?>


<article id="post-<?php the_ID(); ?>" <?php post_class('standard col12'); ?>>
	
    <?php
    // GALLERY POST
    if ( has_post_format('gallery') ) : ?>

        <?php $images = rwmb_meta( "blueprint_gallery_format", "type=image&size={$size}" ); ?>
        <div class="post-media gallery">
            <div class="gallery-carousel owl-carousel">

                <?php foreach ( $images as $image ) : ?>
                    <?php $gallery_item = aq_resize($image['url'],$width,$height,true,true,true); ?>
                    <div class='item'>
                        <img src="<?php echo esc_url($gallery_item); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    </div>
                <?php endforeach; ?>

            </div>
        </div>

    <?php
    // VIDEO POST
    elseif ( has_post_format('video') ) : ?>

        <?php $blueprint_video = get_post_meta( $post->ID, "blueprint_video_format", true ); ?>
        <div class="post-media video">
            <div class="video-wrapper">
                <?php
                if ( wp_oembed_get($blueprint_video) ) :
                    echo wp_oembed_get($blueprint_video);
                else :
                    echo wp_kses_post($blueprint_video);
                endif;
                ?>
            </div>
        </div>

    <?php
    // AUDIO POST
    elseif ( has_post_format('audio') ) : ?>

        <?php $blueprint_audio = get_post_meta( $post->ID, "blueprint_audio_format", true ); ?>
        <div class="post-media audio">
            <?php
            if ( wp_oembed_get($blueprint_audio) ) :
                echo wp_oembed_get($blueprint_audio);
            else :
                echo wp_kses_post($blueprint_audio);
            endif;
            ?>
        </div>

    <?php else :
    // STANDARD POST

        if ( has_post_thumbnail() ) : ?>
        <div class="post-media">
            <?php $image          = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), $size ); ?>
            <?php $featured_image = aq_resize($image[0],$width,$height,true,true,true); ?>
            <a href="<?php echo esc_url( get_permalink() ); ?>">
                <img src="<?php echo esc_url( $featured_image ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>"/>
            </a>
        </div>
        <?php endif; ?>

    <?php endif; ?>

	<div class="post-content">
		
        <div class="textcenter">
            <span class="cat"><?php blueprint_get_category(); ?></span>
            <h2 class="post-title"><?php the_title(); ?></h2>      
        </div>

        <div class="post-text">
            <?php the_content(); ?>
        </div>

        <div class="post-footer">

            <?php blueprint_social_share(); ?>

            <?php if ( has_tag() ) : ?>
            <div class="post-tags">
                <?php the_tags("",""); ?>
            </div>
            <?php endif; ?>

        </div>

	</div>

    <?php 

    get_template_part('includes/single/post_pagination');
    get_template_part('includes/single/related_posts');
    get_template_part('includes/single/author_box');

    comments_template( '', true ); 

    ?>

</article><!-- #post-<?php the_ID(); ?> -->