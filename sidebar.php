<?php
/**
 * Main sidebar template.
 *
 * @package    Blueprint
 * @version    1.0
 * @author     author <admin@email.com>
 * @copyright  Copyright (c) 2018, author
 * @link       themeuri
 * @license    http://www.gnu.org/licenses/gpl-2.0.html GNU General Public License v2 or later
 */

if ( is_active_sidebar( 'sidebar-primary' )  ) :
    dynamic_sidebar( 'sidebar-primary' );
endif;
?>
