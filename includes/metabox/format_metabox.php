<?php
/**
 * Blueprint Post Format meta boxes
 *
 * @package    Blueprint
 * @version    1.0
 * @author     author <admin@email.com>
 * @copyright  Copyright (c) 2018, author
 * @link       themeuri
 * @license    http://www.gnu.org/licenses/gpl-2.0.html GNU General Public License v2 or later
 */

/**
 * Register and load admin javascript
 */
function blueprint_admin_js($hook) {
	if ($hook == 'post.php' || $hook == 'post-new.php') {
		wp_enqueue_script( 'blueprint-metabox', get_template_directory_uri() . '/includes/metabox/js/metabox.js', array('jquery'), BLUEPRINT_VERSION, true );

	}
}
add_action('admin_enqueue_scripts','blueprint_admin_js',10,1);

/**
 * Registering meta boxes
 *
 */

add_filter( 'rwmb_meta_boxes', 'Blueprint_Format_Metabox' );

/** Register meta boxes **/
function Blueprint_Format_Metabox( $meta_boxes )
{

	// Better has an underscore as last sign
	$prefix = 'blueprint_';

	// Gallery Format Metabox
	$meta_boxes[] = array(
		'id'         => 'blueprint_gallery_format_metabox',
		'title'      => esc_html__( 'Gallery Format Options', 'blueprint' ),
		'post_types' => array( 'post' ),
		'context'    => 'normal',
		'priority'   => 'high',
		'autosave'   => true,
		'fields'     => array(
			// IMAGE ADVANCED (WP 3.5+)
			array(
				'name'             => esc_html__( 'Upload Gallery Images', 'blueprint' ),
				'id'               => "{$prefix}gallery_format",
				'type'             => 'image_advanced',
				'max_file_uploads' => 10,
			),
		)
	);

	// Video Format Metabox
	$meta_boxes[] = array(
		'id'         => 'blueprint_video_format_metabox',
		'title'      => esc_html__( 'Video Format Options', 'blueprint' ),
		'post_types' => array( 'post' ),
		'context'    => 'normal',
		'priority'   => 'high',
		'autosave'   => true,
		'fields'     => array(
			// TEXTAREA
			array(
				'name' => esc_html__( 'Video Embed Code', 'blueprint' ),
				'id'   => "{$prefix}video_format",
				'type' => 'textarea',
				'cols' => 20,
				'rows' => 1,
			),
		)
	);

	// Audio Format Metabox
	$meta_boxes[] = array(
		'id'         => 'blueprint_audio_format_metabox',
		'title'      => esc_html__( 'Audio Format Options', 'blueprint' ),
		'post_types' => array( 'post' ),
		'context'    => 'normal',
		'priority'   => 'high',
		'autosave'   => true,
		'fields'     => array(
			// TEXTAREA
			array(
				'name' => esc_html__( 'Audio Embed Code', 'blueprint' ),
				'id'   => "{$prefix}audio_format",
				'type' => 'textarea',
				'cols' => 20,
				'rows' => 1,
			),
		)
	);

	return $meta_boxes;
}
