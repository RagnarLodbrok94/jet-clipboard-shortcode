<?php
/**
 * Plugin Name: JetEngine - Copy content to clipboard
 * Plugin URI: #
 * Description: Creates a new shortcode for the Dynamic Field widget that allows you to copy content to the clipboard.
 * Version:     1.1.3
 * Author:      Crocoblock
 * Author URI:  https://crocoblock.com/
 * License:     GPL-3.0+
 * License URI: http://www.gnu.org/licenses/gpl-3.0.txt
 * Domain Path: /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Variables
define( 'RAG_JCS__FILE__', __FILE__ );
define( 'RAG_JCS_PATH', plugin_dir_path( RAG_JCS__FILE__ ) );

class Jet_Engine_Clipboard_Shortcode {
	public function __construct() {
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_scripts' ] );
		add_shortcode( 'jet_clipboard', [ $this, 'get_content' ] );
	}

	/**
	 * Enqueue plugin styles
	 */
	public function enqueue_styles() {
		wp_enqueue_style( 'jet_engine_jcs_styles', plugins_url( '/assets/css/styles.min.css', RAG_JCS__FILE__ ) );
	}

	/**
	 * Enqueue plugin script
	 */
	public function enqueue_scripts() {
		wp_enqueue_script( 'jet_engine_jcs_scripts', plugins_url( '/assets/js/scripts.js', RAG_JCS__FILE__ ), [], '1.0.0', true );
	}

	public function get_content( $atts = array() ) {

		$this->enqueue_styles();

		$atts = shortcode_atts( array(
			'copy_text' => '',
			'label'     => '',
			'icon'      => '1',
		), $atts, 'jet_clipboard' );

		if (empty( $atts['copy_text'] ) && !empty( $atts['label'] ) ) {
			$atts['copy_text'] = $atts['label'];
		}

		if ( empty( $atts['copy_text'] ) ) {
			return 0;
		}

		$svg = '<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6 15V2H16V15H6ZM5 16H13V18H3V5H5V16Z" fill="black"/></svg>';

		$icon = apply_filters( 'jet_clipboard_icon_filter', $svg );

		ob_start();

		include RAG_JCS_PATH . 'templates/jet-clipboard.php';

		return ob_get_clean();
	}
}

new Jet_Engine_Clipboard_Shortcode();