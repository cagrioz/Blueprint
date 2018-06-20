<?php
/**
 * The template file for pages.
 *
 * @package    Blueprint
 * @version    1.0
 * @author     author <admin@email.com>
 * @copyright  Copyright (c) 2018, author
 * @link       themeuri
 * @license    http://www.gnu.org/licenses/gpl-2.0.html GNU General Public License v2 or later
 */
get_header(); ?>

<section class="main-content">
	<div class="container">
        <div class="content-row">

            <main class="postbar pull-left">

            	<div class="row">

            	<?php
				if ( have_posts() ) :

					/* Start the Loop */
					while ( have_posts() ) : the_post();

						get_template_part( 'includes/parts/content-page' );

					endwhile;

					blueprint_pagination();

				else :

					get_template_part( 'includes/parts/content', 'none' );

				endif;
				?>

				</div>

			</main>

			<aside class="sidebar pull-right">
                <?php get_sidebar();?>
            </aside>

		</div>
	</div>
</section>

<?php get_footer(); ?>