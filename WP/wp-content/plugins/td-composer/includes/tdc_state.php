<?php
/**
 * Created by ra.
 * Date: 3/4/2016
 */


class tdc_state {


	/**
	 * the current post that we're editing
	 * @var WP_Post
	 */
	private static $post;


	/**
	 * @var bool
	 */
	private static $is_live_editor_iframe;


	/**
	 * @var bool
	 */
	private static $is_live_editor_ajax;


	private static $customized_settings;
	private static $customized_menu_settings;


	/**
	 * @param $new_state bool
	 */
	public static function set_is_live_editor_iframe( $new_state ) {
		if ( isset( self::$is_live_editor_iframe ) ) {
			tdc_util::error(__FILE__, __FUNCTION__, 'The tdc_state::$is_live_editor_iframe is already set' );
		}
		self::$is_live_editor_iframe = $new_state;
	}

	/**
	 * Returns true if we are in the first loaded iframe. Note that ajax requests do not toggle this to true
	 * @return bool
	 */
	public static function is_live_editor_iframe() {
		if ( ! isset( self::$is_live_editor_iframe ) ) {
			tdc_util::error(__FILE__, __FUNCTION__, 'The tdc_state::$is_live_editor_iframe is NOT set' );
		}
		return self::$is_live_editor_iframe;
	}


	/**
	 * @param $new_state
	 */
	public static function set_is_live_editor_ajax( $new_state ) {
		if ( isset( self::$is_live_editor_ajax ) ) {
			tdc_util::error(__FILE__, __FUNCTION__, 'The tdc_state::$is_live_editor_ajax is already set' );
		}
		self::$is_live_editor_ajax = $new_state;
	}


	/**
	 * return true if we are in an ajax request done by the composer. It does not return true if we are in the iframe (ex not ajax)
	 * @return bool
	 */
	public static function is_live_editor_ajax() {
		if ( ! isset( self::$is_live_editor_ajax ) ) {
			tdc_util::error(__FILE__, __FUNCTION__, 'The tdc_state::$is_live_editor_ajax is NOT set' );
		}
		return self::$is_live_editor_ajax;
	}




	/**
	 * Returns the current post/page/CTP that we are editing
	 * @return mixed
	 */
	public static function get_post() {
		if ( ! isset( self::$post ) ) {
			tdc_util::error(__FILE__, __FUNCTION__, 'The tdc_state::$post is NOT set' );
		}
		return self::$post;
	}

	/**
	 * Sets the current post/page/CTP that we are editing
	 * @param WP_Post $post
	 */
	public static function set_post( $post ) {
		if ( isset( self::$post ) ) {
			tdc_util::error(__FILE__, __FUNCTION__, 'The tdc_state::$post is already set' );
		}

		// we can add here additional checks if needed
		if (get_class($post) != 'WP_Post') {
			tdc_util::error(__FILE__, __FUNCTION__, '$post is not a WP_Post class');
			die;
		}
		self::$post = $post;
	}



	public static function get_customized_settings() {
		if ( isset( self::$customized_settings ) ) {
			return self::$customized_settings;
		}
		return false;
	}

	public static function set_customized_settings() {
		if ( isset( $_POST['tdc_customized'] ) && !isset( self::$customized_settings ) ) {
			self::$customized_settings = json_decode( wp_unslash( $_POST['tdc_customized'] ), true );

			if ( isset( self::$customized_settings['menus'] ) ) {

				$menus = self::$customized_settings['menus'];
				foreach ( $menus as $menu_key => $menu_value ) {
					$current_menu_settings = json_decode( $menu_value, true );

					foreach ( $current_menu_settings as $setting ) {
						self::$customized_menu_settings[ $menu_key ][ $setting['name']] = $setting['value'];
					}
				}
			}
		}
	}

	public static function get_customized_menu_settings( $menu_id = null ) {
		if ( isset( self::$customized_menu_settings )  ) {
			if ( isset( $menu_id ) ) {
				if ( isset( self::$customized_menu_settings[ 'existing_menu_' . $menu_id ] ) ) {
					return self::$customized_menu_settings[ 'existing_menu_' . $menu_id ];
				} else {
					return false;
				}
			} else {
				return self::$customized_menu_settings;
			}
		}
		return false;
	}
}