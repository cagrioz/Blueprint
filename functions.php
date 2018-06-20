<?php
/**
 * Blueprint functions and definitions.
 *
 * @package    Blueprint
 * @version    1.0
 * @author     author <admin@email>
 * @copyright  Copyright (c) 2018, author
 * @link       themeuri
 * @license    http://www.gnu.org/licenses/gpl-2.0.html GNU General Public License v2 or later
 */

define( 'BLUEPRINT_VERSION', '1.0' );

/**
 * Basic Setup
 */
include get_template_directory() . '/includes/functions/blueprint_setup.php';
include get_template_directory() . '/includes/functions/blueprint_filters.php';
include get_template_directory() . '/includes/functions/blueprint_helpers.php';
include get_template_directory() . '/includes/functions/aq_resizer.php';
include get_template_directory() . '/includes/tgm/tgm-plugin-registration.php';

/**
 * Live Customizer
 * MetaBox
 */
require get_template_directory() . '/includes/customizer/customizer.php';
include get_template_directory() . '/includes/metabox/format_metabox.php';

function blueprint_error_notice() {
    ?>
    <div class="error notice">
        <p><?php esc_html_e( 'Please delete and install back "Blueprint Addons" Plugin.', 'blueprint' ); ?></p>
    </div>
    <?php
}
add_action( 'admin_notices', 'blueprint_error_notice' );