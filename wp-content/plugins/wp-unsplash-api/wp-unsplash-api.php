<?php
/*
  Plugin Name: WP Unsplash API
  Plugin URI: http://wpus-unsplash-api.com/
  Description: WP Unsplash API allow to set random background images from unsplash api from any specified collection. This plugin provides the real time and easy to understand and looks good.
  Version: 1.0
  Author: Nilesh Modhwadiya
  Author URI: https://nileshmodhwadiya.000webhostapp.com/
  License: Free
  Text Domain: wpus-unsplash-api
*/

class WPUS_Unsplash_API {

	const WPUS_APPLICATION_NAME = 'Test';
	const WPUS_CLIENT_ID = '6c0e62d90773129289de5ca3bb42dcf1642f05234cdd67f8a2d78e9c4b1b3470';

	function __construct() {

		add_action( 'admin_menu', array( $this, 'wpus_add_menu' ) );
		register_activation_hook( __FILE__, array( $this, 'wpus_install' ) );
		register_deactivation_hook( __FILE__, array( $this, 'wpus_uninstall' ) );

		define( 'WPUS_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
		define( 'WPUS_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

		add_shortcode( 'unsplashbackground', array( __CLASS__, 'wpus_unsplash_api_function' ) );

		add_action( 'wp_enqueue_scripts', array( __CLASS__, 'wpus_load_custom_scripts' ) );
	}

	public function wpus_add_menu() {

		add_menu_page( 'WPUS Unsplash API', 'WPUS Unsplash API', 'manage_options', 'wpus-unsplash-api-dashboard', array(
			__CLASS__,
			'wpus_show_page_content'
		), 'dashicons-media-document' );

		add_submenu_page( 'wpus-unsplash-api-dashboard', 'WP Multisite Scheduler Dashboard', 'WP Multisite Scheduler Dashboard', 'manage_options', 'wpus-unsplash-api-dashboard', array(
			__CLASS__,
			'wpus_show_page_content'
		) );

	}

	public function wpus_show_page_content() {
		$page = empty( $_REQUEST['page'] ) ? "" : $_REQUEST['page'];
		if ( $page == "wpus-unsplash-api-dashboard" ) {
			echo "<h2>WP Unsplash API Plugin Note:</h2>";
			?>
            <pre>
            Ex.
            1) [unsplashbackground collection="486835" image_only="yes" width="500px" height="500px"]

            Above example will show only image in section as a background image and it will create section of give dimension.

            2) [unsplashbackground collection="486835"]Any Content[/unsplashbackground]

            Above example will show text and image as a background.
            </pre>
<?php
		}
	}

	public function wpus_unsplash_api_function( $atts, $content = null ) {

		$attributes = shortcode_atts( array(
			'collection' => '486835',
			'image_only' => 'no',
			'width' => '100%',
			'height' => 'auto',
		), $atts );

		$collection_id = $attributes['collection'];
		$url           = "https://api.unsplash.com/photos/random/?client_id=" . constant("WPUS_Unsplash_API::WPUS_CLIENT_ID") . "&collections=" . $collection_id;
		$ch            = curl_init();
		curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ch, CURLOPT_URL, $url );
		$result = curl_exec( $ch );
		$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close( $ch );

		$background_image_url = WPUS_PLUGIN_URL . "image/fallback.jpg";
		$user_link = "";
		$unsplash_link = "";
		$name = "";
        $attribute_link = "";

		if( $status_code == 200) {

			$data = json_decode( $result, true );
			if( isset( $data['urls']['regular'] ) ) {
				$background_image_url = $data['urls']['regular'];
			}
			if( isset( $data['urls']['regular'] ) ) {
				$background_image_url = $data['urls']['regular'];
			}
			if( isset( $data['user']['links']['html'] ) ) {
				$user_link            = $data['user']['links']['html'] . '?utm_source=' . constant("WPUS_Unsplash_API::WPUS_APPLICATION_NAME") . '&utm_medium=referral';
			}
			if( isset( $data['user']['name'] ) ) {
				$name                 = $data['user']['name'];
			}
			$unsplash_link        = 'https://unsplash.com/?utm_source=' . constant("WPUS_Unsplash_API::WPUS_APPLICATION_NAME") . '&utm_medium=referral';
			$attribute_link = 'Photo by <a href="' . $user_link . '" target="_blank">' . $name . '</a> on <a href="' . $unsplash_link . '" target="_blank">Unsplash</a>';
		}

		//just for test START
		//$background_image_url = WPUS_PLUGIN_URL . "/image/fallback.jpg";
		//just for test END
		ob_start();

		if($attributes['image_only'] == "yes"){
			echo '<div style="background: url(' . $background_image_url . '); background-repeat: no-repeat;
background-size: cover; width: ' . $attributes['width'] . '; height: ' . $attributes['height'] . ';">';
			echo '</div>';
        }else{
			echo '<div style="background: url(' . $background_image_url . '); background-repeat: no-repeat;
background-size: cover;">';
			echo do_shortcode( $content );
			echo '<br>';
			if($attribute_link != ""){
				echo '<div class="attribute-link">' . $attribute_link . '</div>';
			}
			echo '</div>';
        }

		return ob_get_clean();
	}

	public function wpus_load_custom_scripts() {
		wp_enqueue_script( 'jquery' );
	}

	public function wpus_install() {
		//code for install
	}

	public function wpus_uninstall() {
		//code for uninstall
	}

}

new WPUS_Unsplash_API();
?>