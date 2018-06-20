<?php
/**
 * Blueprint search form.
 *
 * @package    Blueprint
 * @version    1.0
 * @author     author <admin@email.com>
 * @copyright  Copyright (c) 2018, author
 * @link       themeuri
 * @license    http://www.gnu.org/licenses/gpl-2.0.html GNU General Public License v2 or later
 */
?>

<form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <input placeholder="<?php echo esc_attr_x( 'Type and hit enter...', 'placeholder', 'blueprint' ); ?>" type="search" value="<?php echo get_search_query(); ?>" name="s" class="search-form">
</form>