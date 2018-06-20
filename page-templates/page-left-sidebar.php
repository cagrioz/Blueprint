<?php 
/**
 * Template Name: Left Sidebar
 * Template Post Type: page
 */
get_header(); ?>

<section class="main-content">
    <div class="container">
        <div class="content-row">

            <main class="postbar pull-right">

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

            <aside class="sidebar pull-left">
                <?php get_sidebar();?>
            </aside>

        </div>
    </div>
</section>

<?php get_footer(); ?>