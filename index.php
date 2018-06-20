<?php
/**
 * The main template file.
 *
 * @package    Blueprint
 * @version    1.0
 * @author     author <admin@email.com>
 * @copyright  Copyright (c) 2018, author
 * @link       themeuri
 * @license    http://www.gnu.org/licenses/gpl-2.0.html GNU General Public License v2 or later
 */
get_header(); 

// General Variables
$layout  = get_theme_mod('home_layout', 'std');
$sidebar = get_theme_mod('home_sidebar', 'r_sidebar');
?>
	
	<section class="main-content">
		<div class="container">
            <div class="content-row">

                <main class="<?php echo esc_attr(blueprint_content_class()); ?>">

                	<div class="row">

					<?php
					if ( have_posts() ) :

						/* Start the Loop */
						while ( have_posts() ) : the_post();

							if ( $layout == 'std' ) {

								get_template_part( 'includes/parts/content' );
								
							}

						endwhile;

						blueprint_pagination();

					else :

						get_template_part( 'includes/parts/content', 'none' );

					endif;
					?>
					
					</div>

				</main>
				
				<?php if ( $sidebar !== 'no_sidebar' ) : ?>
				<aside class="<?php echo esc_attr(blueprint_sidebar_class()); ?>">
                    <?php get_sidebar(); ?>
                </aside>
                <?php endif; ?>

			</div>
		</div>
	</section>

<?php get_footer(); ?>