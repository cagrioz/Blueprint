<?php
/**
 * The template part to show related posts.
 *
 * @package    Blueprint
 * @version    1.0
 * @author     author <admin@email.com>
 * @copyright  Copyright (c) 2018, author
 * @link       themeuri
 * @license    http://www.gnu.org/licenses/gpl-2.0.html GNU General Public License v2 or later
 */

$orig_post = $post;
global $post;
$categories = get_the_category($post->ID);

if ( $categories ) :

	$category_ids = array();
	foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;

	$args = array(
		'category__in'     => $category_ids,
		'post__not_in'     => array($post->ID),
		'posts_per_page'   => 3,
		'ignore_sticky_posts' => 1,
		'orderby' => 'rand'
	);

	$related_query = new wp_query( $args );

	if ( $related_query->have_posts() ) : ?>

		<div class="single-module related-posts">
			<div class="row">
				<div class="col12">
					<h5 class="module-title"><?php echo esc_html_e('Related Posts', 'blueprint'); ?></h5>
				</div>
				<?php while ( $related_query->have_posts() ) : $related_query->the_post(); ?>
				<div class="col4">
					<?php if(has_post_thumbnail()) : ?><a href="<?php echo esc_url(get_the_permalink()); ?>" class="related-post-image"><?php the_post_thumbnail('blueprint_medium'); ?></a><?php endif; ?>
					<div class="related-post-content">
						<?php the_title( sprintf( '<h6><a class="post-link" href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h6>' ); ?>
                		<time datetime="<?php echo esc_attr( get_the_time('Y') ); ?>"><?php the_time( get_option('date_format') ); ?></time>
					</div>
				</div>
			<?php endwhile; ?>
			</div>
		</div>
		<?php

		endif;
	endif;

	$post = $orig_post;

	wp_reset_postdata();
?>