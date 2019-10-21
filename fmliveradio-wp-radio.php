<?php
/**
 * Plugin Name: WP Radio for fmliveradio
 * Plugin URI:  https://fmliveradio.com
 * Description: Customized for WP Radio.
 * Version:     1.0.0
 * Author:      fmliveradio
 * Author URI:  http://fmliveradio.com
 * Text Domain: wp-radio
 * Domain Path: /languages/
 */

// don't call the file directly
defined( 'ABSPATH' ) || exit();

add_action( 'plugins_loaded', 'fmlive_radio_let_the_journey_begin' );

function fmlive_radio_let_the_journey_begin() {

	if ( ! did_action( 'wp_radio_loaded' ) ) {
		add_action( 'admin_notices', function () { ?>
            <div class="notice notice-error is-dismissible">
                <p><?php esc_html_e( 'WP Radio for fmliveradio requires WP Radio to be installed and activated.', 'wp-radio' ) ?></p>
            </div>
		<?php
		} );

		require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		deactivate_plugins( plugin_basename( __FILE__ ) );

		return false;
	}

	define( 'FMLIVE_RADIO_VERSION', '1.0.0' );
	define( 'FMLIVE_RADIO_ASSETS_URL', plugins_url( '/assets', __FILE__ )  );

	function fmlive_radio_scripts() {
		wp_enqueue_style('fm-live-radio-wp-radio', FMLIVE_RADIO_ASSETS_URL.'/css/frontend.min.css', [], FMLIVE_RADIO_VERSION);
	}

	add_action( 'wp_enqueue_scripts', 'fmlive_radio_scripts' );

}