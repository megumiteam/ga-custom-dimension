<?php

class SampleTest extends WP_UnitTestCase {

	protected function setup_postdata()
	{
		global $post;
		global $wp_query;

		$wp_query->is_singular = true;

		$post_id = $this->factory->post->create( array(
			'post_title' => 'Hello',
			'post_author' => 1,
			'post_status' => 'publish',
			'post_date' => '2014-01-01 00:00:00',
		) );
		$post = get_post( $post_id );
		setup_postdata( $post );
	}

	/**
	 * @test
	 */
	function ga_custom_demention_author()
	{
		$this->setup_postdata();
		$this->assertSame( 'admin', GA_Custom_Dimensions::ga_custom_demention_author() );
	}

	/**
	 * @test
	 */
	function ga_custom_demention_published()
	{
		$this->setup_postdata();
		$this->assertSame( '2014/01/01 00:00', GA_Custom_Dimensions::ga_custom_demention_published() );
	}

	/**
	 * @test
	 */
	function get_taxonomies()
	{
		$this->setup_postdata();
		$this->assertSame( 'Uncategorized', GA_Custom_Dimensions::ga_custom_demention_category() );
	}
}

