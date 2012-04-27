<?php
/*
Plugin Name:	TwentyTen Options
Description:	Customize the TwentyTen theme with easy to use options.
Author:			Hassan Derakhshandeh
Version:		0.1
Author URI:		http://tween.ir/


		* 	Copyright (C) 2011  Hassan Derakhshandeh
		*	http://tween.ir/
		*	hassan.derakhshandeh@gmail.com

		This program is free software; you can redistribute it and/or modify
		it under the terms of the GNU General Public License as published by
		the Free Software Foundation; either version 2 of the License, or
		(at your option) any later version.

		This program is distributed in the hope that it will be useful,
		but WITHOUT ANY WARRANTY; without even the implied warranty of
		MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
		GNU General Public License for more details.

		You should have received a copy of the GNU General Public License
		along with this program; if not, write to the Free Software
		Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

class TwentyTen_Rocks {

	private $textdomain;
	private $base_url;

	function __construct() {
		add_action( 'admin_init', array( &$this, 'register_settings' ) );
		add_action( 'admin_menu', array( &$this, 'admin' ) );
		add_action( 'wp_head', array( &$this, 'dynamic_styles' ) );
		$this->base_url = trailingslashit( plugins_url( '', __FILE__ ) );
	}

	function admin() {
		$options_page = add_theme_page(
			__( '2010 Options', $this->textdomain ), // Name of page
			__( '2010 Options', $this->textdomain ), // Label in menu
			'edit_theme_options',                  // Capability required
			'2010-options',                       // Menu slug, used to uniquely identify the page
			array( &$this, 'options_page' )            // Function that renders the options page
		);
		add_action( "admin_print_styles-{$options_page}", array( &$this, 'admin_queue' ) );
	}

	function options_page() {
		$options = get_option( 'twentyten' );
		include_once( dirname( __FILE__ ) . '/views/options.php' );
	}

	function admin_queue() {
		add_thickbox();
		wp_enqueue_style( 'farbtastic' );
		wp_enqueue_style( '2010-admin', plugins_url( 'css/admin.css', __FILE__ ) );
		wp_enqueue_script( '2010-admin', plugins_url( 'js/admin.js', __FILE__ ), array( 'jquery', 'farbtastic' ) );
	}

	function register_settings() {
		register_setting( 'twentyten', 'twentyten' );
	}

	function sanitize_options( $options ) {
		return $options;
	}

	function layouts() {
		return array(
			'cs' => array(
				'value' => 'cs',
				'label' => __( 'Content on left', $this->textdomain ),
			),
			'sc' => array(
				'value' => 'sc',
				'label' => __( 'Content on right', $this->textdomain ),
			),
			'ssc' => array(
				'value' => 'ssc',
				'label' => __( 'Two sidebars on the left', $this->textdomain ),
			),
			'css' => array(
				'value' => 'css',
				'label' => __( 'Two sidebars on the right', $this->textdomain ),
			),
			'scs' => array(
				'value' => 'scs',
				'label' => __( 'Two sidebars', $this->textdomain ),
			),
		);
	}

	function dynamic_styles() {
		echo '<style>';
		$options = get_option( 'twentyten' );
		require_once( dirname( __FILE__ ) . '/css/dynamic.php' );
		echo '</style>';
	}
}
new TwentyTen_Rocks;