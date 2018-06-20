<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package    Blueprint
 * @version    1.0
 * @author     author <admin@email.com>
 * @copyright  Copyright (c) 2018, author
 * @link       themeuri
 * @license    http://www.gnu.org/licenses/gpl-2.0.html GNU General Public License v2 or later
 */

get_header(); 

$err_img 	  = get_theme_mod('err_img', '');
$err_desc  	  = get_theme_mod('err_desc', 'This page isn\'t it. But while you\'re here,');
$err_title 	  = get_theme_mod('err_title', 'Oops! That page can&rsquo;t be found.');
$err_linktext = get_theme_mod('err_linktext', 'how about going home?');

?>

<section class="main-content error-content">
	<div class="container">
        <div class="content-row">

            <main class="col12">
				<div class="row">

					<div class="error-page">
					
						<div class="error-text">

							<?php if ( $err_title ) : ?>
							<h1><?php printf( esc_html__( '%s', 'blueprint' ), $err_title ); ?></h1>
							<?php endif; ?>

							<?php if ( $err_desc ) : ?>
							<p><?php printf( esc_html__( '%s', 'blueprint' ), $err_desc ); ?></p>
							<?php endif; ?>

							<?php if ( $err_linktext ) : ?>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php printf( esc_html__( '%s', 'blueprint' ), $err_linktext ); ?></a>
							<?php endif; ?>

						</div>
						
						<?php if ( $err_img ) : ?>
						<div class="error-img">
							<img src="<?php echo esc_url( get_theme_mod('err_img', '') ); ?>" alt="<?php esc_attr( bloginfo( 'name' ) ); ?>" />
						</div>
						<?php endif; ?>

					</div>

				</div>
			</main>

		</div>
	</div>
</section>

<?php get_footer(); ?>