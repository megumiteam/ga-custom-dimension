<?php
/*
Plugin Name: ga-custom-dimensions
Version: 0.1.0
Description: ga-custom-dimensions
Author: digitalcube
Text Domain: ga-custom-dimensions
Domain Path: /languages
*/

$ga_custom_dimensions = new GA_Custom_Dimensions();
$ga_custom_dimensions->register();

class GA_Custom_Dimensions {

	public function __construct() {

	}

	public function register()
	{
		add_filter( 'wp_total_hacks_google_analytics', 'do_shortcode' );

		$short_codes = array(
			'ga_custom_demention_author',
			'ga_custom_demention_published',
			'ga_custom_demention_category',
			'ga_custom_demention_media',
		);

		foreach ( $short_codes as $short_code ) {
			add_shortcode( $short_code, array( 'GA_Custom_Dimensions', $short_code ) );
		}
	}

	public static function ga_custom_demention_author()
	{
		if ( ! is_singular() ) {
			return '';
		}

		global $post;
		$u = get_userdata( $post->post_author );
		return $u->display_name;
	}

	public static function ga_custom_demention_published()
	{
		if ( ! is_singular() ) {
			return '';
		}

		global $post;
		$date = strtotime( $post->post_date );
		return date( 'Y/m/d H:i', $date );
	}

	public static function ga_custom_demention_category()
	{
		if ( ! is_singular() ) {
			return '';
		}

		return self::get_taxonomies( 'category' );
	}

	public static function ga_custom_demention_media()
	{
		if ( ! is_singular() ) {
			return '';
		}

		return self::get_taxonomies( 'media' );
	}

	/**
	 * Returns the tax names in the specified taxonomy.
	 *
	 * @access public
	 * @param  string $tax_slug The taxonomie's slug.
	 * @return array  The tax name array.
	 */
	public static function get_taxonomies( $tax_slug )
	{
		global $post;
		$tax_names = array();
		foreach ( wp_get_object_terms( $post->ID, $tax_slug ) as $tax ) {
			return $tax->name;
		}
	}
}
