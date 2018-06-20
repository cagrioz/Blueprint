<?php
/**
 * The template part to show posts as ordered.
 *
 * @package    Blueprint
 * @version    1.0
 * @author     author <admin@email.com>
 * @copyright  Copyright (c) 2018, author
 * @link       themeuri
 * @license    http://www.gnu.org/licenses/gpl-2.0.html GNU General Public License v2 or later
 */
?>
<div class="single-module prev-next-posts">
    <div class="row">
        <?php $prevPost = get_previous_post();
            if (!empty( $prevPost )) :
                $args = array('posts_per_page' => 1,'include' => $prevPost->ID);
                $prevPost = get_posts($args);
                foreach ($prevPost as $post) :
                    setup_postdata($post);
        ?>
        <div class="post-prev col6 pull-left">
            <div class="prev-post<?php if ( ! has_post_thumbnail() ) : ?> no-thumb<?php endif; ?>">
                <?php if( has_post_thumbnail() ) : ?>
                <div class="post-thumb">
                    <?php $image          = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'blueprint_thumb' ); ?>
                    <?php $pagination_thumb = aq_resize($image[0],100,100,true,true,true); ?>
                    <a href="<?php echo esc_url( get_permalink() ); ?>">
                        <img src="<?php echo esc_url( $pagination_thumb ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>"/>
                    </a>
                </div>
                <?php endif; ?>
                <?php the_title( sprintf( '<h6><a class="post-link" href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h6>' ); ?>
                <time datetime="<?php echo esc_attr( get_the_time('Y') ); ?>"><?php the_time( get_option('date_format') ); ?></time>
            </div>
        </div>
        <?php
                    wp_reset_postdata();
                endforeach;
            endif;

            $nextPost = get_next_post();
            if (!empty( $nextPost )) :
                $args = array(
                    'posts_per_page' => 1,
                    'include' => $nextPost->ID
                );
                $nextPost = get_posts($args);
                foreach ($nextPost as $post) :
                    setup_postdata($post);
        ?>
            <div class="post-next col6 pull-right">
                <div class="next-post<?php if ( ! has_post_thumbnail() ) : ?> no-thumb<?php endif; ?>">
                    <?php if( has_post_thumbnail() ) : ?>
                    <?php $image      = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'blueprint_thumb' ); ?>
                    <?php $pagination_thumb = aq_resize($image[0],100,100,true,true,true); ?>
                    <a href="<?php echo esc_url( get_permalink() ); ?>">
                        <img src="<?php echo esc_url( $pagination_thumb ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>"/>
                    </a>
                    <?php endif; ?>
                    <?php the_title( sprintf( '<h6><a class="post-link" href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h6>' ); ?>
                    <time datetime="<?php echo esc_attr( get_the_time('Y') ); ?>"><?php the_time( get_option('date_format') ); ?></time>
                </div>
            </div>
        <?php
                    wp_reset_postdata();
                endforeach;
            endif;
        ?>
    </div>
</div>
