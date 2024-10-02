<?php
/**
 * Plugin Name:       WP testing plugin
 * Description:       Just a plugin to test stuff in a plugin.
 * Requires at least: 6.7
 * Requires PHP:      8.0
 * Version:           0.1.0
 * Author:            Colorful Tones
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       demo-plugin
 *
 * @package           demo-plugin
 */

// Define our handy constants.
define( 'DEMO_VERSION', '0.1.0' );
define( 'DEMO_PLUGIN_DIR', __DIR__ );
define( 'DEMO_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

// Register custom post types.
require 'inc/post-types.php';
// Explorations for WP 6.7 release with Block Bindings.
require 'inc/block-bindings-6-7.php';
