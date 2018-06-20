<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11" />

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div class="wrapper">
		
		<!-- Blueprint Header
        ================================================== -->
		<header class="blueprint-header">
			<div class="container">

				<div class="blueprint-logo">
					<?php if ( get_theme_mod('header_logo') ) : ?>
        				<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( get_theme_mod('header_logo') ); ?>" alt="<?php esc_attr( bloginfo( 'name' ) ); ?>"></a>
	                <?php else : ?>
	                    <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
	                <?php endif; ?>
				</div>
				
				<nav class="blueprint-menu">

					<a href="#" class="sidemenu-btn"><i class="fa fa-bars"></i></a>

					<?php blueprint_menu('main-menu'); ?>

					<a href="#" class="search-btn"><i class="fa fa-search"></i></a>

				</nav>

			</div>
		</header>

		<!-- Responsive Menu
        ================================================== -->
        <div class="sidemenu">
            <header>
                <div class="sidemenu-close">
                    <a href="#" class="sidemenu-btn"><i class="fa fa-close"></i></a>
                </div>
                <div class="sidemenu-logo">
                    <?php if ( get_theme_mod('sidemenu_logo', '') ) : ?>
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( get_theme_mod('sidemenu_logo') ); ?>" alt="<?php bloginfo( 'name' ); ?> Logo"></a>
                    <?php else : ?>
	                    <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
                    <?php endif; ?>
                </div>
            </header>

            <?php blueprint_menu('mobile-nav'); ?>

            <div class="social-profiles">

                <?php blueprint_social_profiles(); ?>

            </div>
        </div>

        <!-- Search Popup
        ================================================== -->
        <div class="search-wrapper">
            <a href="#" class="search-btn"><i class="pe-7s-close"></i></a>
            <form class="header-search" method="get" role="search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                <input type="search" placeholder="Search Anything..." value="<?php echo get_search_query(); ?>" name="s">
            </form>
        </div>
