<?php
/**
 * Blueprint Filters
 *
 * @package    Blueprint
 * @version    1.0
 * @author     author <admin@email>
 * @copyright  Copyright (c) 2018, author
 * @link       themeuri
 * @license    http://www.gnu.org/licenses/gpl-2.0.html GNU General Public License v2 or later
 */

/**
 * Extend the default WordPress body class
 *
 * @param array $classes Classes for the body element.
 * @return array (Maybe) filtered body classes.
 * @since 1.0
 */
 function blueprint_body_classes($classes) {
 	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-primary' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
 }
 add_filter( 'body_class', 'blueprint_body_classes' );


 /**
 * Content Class
 *
 * @since 1.0
 */
 if ( ! function_exists('blueprint_content_class') ) {
    function blueprint_content_class() {
		$sidebar = get_theme_mod('home_sidebar', 'r_sidebar');

		if ( $sidebar == 'no_sidebar' ) {
			$class = 'postbar fullwidth';
		} else {

			if ( $sidebar == 'l_sidebar' ) {
				$class = 'postbar pull-right';
			} else {
				$class = 'postbar pull-left';
			}

		}

		return $class;
    }
}

 /**
 * Sidebar Class
 *
 * @since 1.0
 */
 if ( ! function_exists('blueprint_sidebar_class') ) {
    function blueprint_sidebar_class() {
		$sidebar = get_theme_mod('home_sidebar', 'r_sidebar');

		if ( $sidebar == 'l_sidebar' ) {
			$class = 'sidebar pull-left';
		} else {
			$class = 'sidebar pull-right';
		}

		return $class;
    }
}


 /**
 * Single Content Class
 *
 * @since 1.0
 */
 if ( ! function_exists('blueprint_single_content') ) {
    function blueprint_single_content() {
		$sidebar = get_theme_mod('single_sidebar', 'r_sidebar');

		if ( $sidebar == 'no_sidebar' ) {
			$class = 'postbar fullwidth';
		} else {

			if ( $sidebar == 'l_sidebar' ) {
				$class = 'postbar pull-right';
			} else {
				$class = 'postbar pull-left';
			}

		}

		return $class;
    }
}

 /**
 * Single Sidebar Class
 *
 * @since 1.0
 */
 if ( ! function_exists('blueprint_single_sidebar') ) {
    function blueprint_single_sidebar() {
		$sidebar = get_theme_mod('single_sidebar', 'r_sidebar');

		if ( $sidebar == 'l_sidebar' ) {
			$class = 'sidebar pull-left';
		} else {
			$class = 'sidebar pull-right';
		}

		return $class;
    }
}


 /**
 * Archive Content Class
 *
 * @since 1.0
 */
 if ( ! function_exists('blueprint_archive_content') ) {
    function blueprint_archive_content() {
		$sidebar = get_theme_mod('archive_sidebar', 'r_sidebar');

		if ( $sidebar == 'no_sidebar' ) {
			$class = 'postbar fullwidth';
		} else {

			if ( $sidebar == 'l_sidebar' ) {
				$class = 'postbar pull-right';
			} else {
				$class = 'postbar pull-left';
			}

		}

		return $class;
    }
}

 /**
 * Archive Sidebar Class
 *
 * @since 1.0
 */
 if ( ! function_exists('blueprint_archive_sidebar') ) {
    function blueprint_archive_sidebar() {
		$sidebar = get_theme_mod('archive_sidebar', 'r_sidebar');

		if ( $sidebar == 'l_sidebar' ) {
			$class = 'sidebar pull-left';
		} else {
			$class = 'sidebar pull-right';
		}

		return $class;
    }
}