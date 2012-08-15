<?php
/*
Plugin Name:	TwentyTen Options
Description:	Customize the TwentyTen theme with easy to use options.
Author:			Hassan Derakhshandeh
Version:		0.2
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

	var $textdomain;

	function __construct() {
		add_action( 'customize_register', array( &$this, 'customize_register' ) );
		add_action( 'wp_head', array( &$this, 'dynamic_styles' ) );
	}

	function customize_register( $customizer ) {
		$customizer->add_setting( 'logo' );
		$customizer->add_control( new WP_Customize_Image_Control( $customizer, 'logo', array(
			'label' => 'Logo',
			'section' => 'title_tagline',
		) ) );
		$customizer->add_setting( 'logo_width' );
		$customizer->add_control( 'logo_width', array(
			'label' => 'Logo width',
			'section' => 'title_tagline',
			'type' => 'text'
		) );
		$customizer->add_setting( 'logo_height' );
		$customizer->add_control( 'logo_height', array(
			'label' => 'Logo height',
			'section' => 'title_tagline',
			'type' => 'text'
		) );
		$customizer->add_section( 'layouts', array(
			'title' => 'Layouts',
			'priority' => 40
		) );
		$customizer->add_setting( 'layout', array(
			'default' => 'cs'
		) );
		$customizer->add_control( 'layout', array(
			'label' => 'Sidebars layout',
			'section' => 'layouts',
			'type' => 'select',
			'choices' => array(
				'cs' => 'Content on left',
				'sc' => 'Content on right',
				'ssc' =>'Two sidebars on the left',
				'css' => 'Two sidebars on the right',
				'scs' =>'Two sidebars'
			)
		) );
		$customizer->add_section( 'typography', array(
			'title' => 'Typography',
			'priority' => 50
		) );
		$customizer->add_setting( 'header_font', array(
			'default' => 'default'
		) );
		$customizer->add_control( 'header_font', array(
			'label' => 'Headers',
			'section' => 'typography',
			'type' => 'select',
			'choices' => $this->get_google_fonts()
		) );
		$customizer->add_setting( 'link_color' );
		$customizer->add_setting( 'link_hover_color' );
		$customizer->add_setting( 'footer_color' );
		$customizer->add_setting( 'footer_background_color' );
		$customizer->add_setting( 'footer_link_color' );
		$customizer->add_setting( 'footer_link_hover_color' );
		$customizer->add_control( new WP_Customize_Color_Control( $customizer, 'link_color', array(
			'label' => 'Links color',
			'section' => 'colors'
		) ) );
		$customizer->add_control( new WP_Customize_Color_Control( $customizer, 'link_hover_color', array(
			'label' => 'Links hover color',
			'section' => 'colors'
		) ) );
		$customizer->add_control( new WP_Customize_Color_Control( $customizer, 'footer_color', array(
			'label' => 'Footer color',
			'section' => 'colors'
		) ) );
		$customizer->add_control( new WP_Customize_Color_Control( $customizer, 'footer_background_color', array(
			'label' => 'Footer background',
			'section' => 'colors'
		) ) );
		$customizer->add_control( new WP_Customize_Color_Control( $customizer, 'footer_link_color', array(
			'label' => 'Footer link color',
			'section' => 'colors'
		) ) );
		$customizer->add_control( new WP_Customize_Color_Control( $customizer, 'footer_link_hover_color', array(
			'label' => 'Footer link hover color',
			'section' => 'colors'
		) ) );
	}

	function dynamic_styles() {
		$css = '';
		if( $logo = get_theme_mod( 'logo' ) ) $css .= "#site-title a { display: block; width: " . get_theme_mod( 'logo_width' ) . "px; height: ". get_theme_mod( 'logo_height' ) ."px; background: url('$logo') no-repeat; overflow: hidden; text-indent: -9999px;";
		if( $link_color = get_theme_mod( 'link_color' ) ) $css .= "a:link { color: $link_color; }";
		if( $footer_color = get_theme_mod( 'footer_color' ) ) $css .= "#footer, #footer .widget-title { color: $footer_color; }";
		if( $footer_background_color = get_theme_mod( 'footer_background_color' ) ) $css .= "#footer { background: $footer_background_color; }";
		if( $footer_link_color = get_theme_mod( 'footer_link_color' ) ) $css .= "#footer a:link, #footer a:visited { color: $footer_link_color; }";
		if( $footer_link_hover_color = get_theme_mod( 'footer_link_hover_color' ) ) $css .= "#footer a:hover { background: $footer_link_hover_color; }";

		if( $layout = get_theme_mod( 'layout' ) ) {
			switch( $layout ) {
				case 'cs' :
					$css .= '#container { float: left; margin: 0 -240px 0 0; } #content { margin: 0 280px 0 20px; } #primary, #secondary { float: right; } #secondary { clear: right; } ';
					break;
				case 'sc' :
					$css .= '#container { float: right; margin: 0 0 0 -240px; } #content { margin: 0 20px 36px 280px; } #primary, #secondary { float: left; } #secondary { clear: left; }';
					break;
				case 'ssc' :
					$css .= '#container { float: left; margin: 0; } #content { margin: 0 20px 36px 460px; } #primary { float: left; margin-left: -940px; } #secondary { float: left;	margin-left: -700px; }';
					break;
				case 'css' :
					$css .= '#container { float: left; margin: 0; } #content { margin: 0 460px 36px 20px; } #primary { float: left; margin-left: -440px; } #secondary { float: left; 	margin-left: -220px; }';
					break;
				case 'scs' :
					$css .= '#container { float: left; margin: 0; } #content { margin: 0 220px 36px 220px; } #primary { float: left; margin-left: -940px; } #secondary { float: left; 	margin-left: -220px; }';
					break;
			}
		}

		$header_font = get_theme_mod( 'header_font' );
		if( $header_font !== 'default' ) {
			echo '<link rel="stylesheet" href="http://fonts.googleapis.com/css?family='. str_replace( " ","+",$header_font ) .'" />';
			$css .= ".entry-title { font-family: '$header_font', 'Helvetica', arial, serif; }";
		}

		if( $css != '' ) {
			echo '<style>' . $css . '</style>';
		}
	}

	/**
	 * list of Google fonts, taken from webfonts.php gizmo in Gantry Framework
	 * @link http://gantry-framework.org/
	 */
	function get_google_fonts() {
		$fonts = array( 'default' => 'Default' );
		$google_fonts = array( "Aclonica", "Allan", "Allerta", "Allerta Stencil", "Amaranth", "Annie Use Your Telescope", "Anonymous Pro", "Anton", "Architects Daughter", "Arimo", "Artifika", "Arvo", "Asset", "Astloch", "Bangers", "Bentham", "Bevan", "Bigshot One", "Brawler", "Buda", "Cabin", "Cabin Sketch", "Calligraffitti", "Candal", "Cantarell", "Cardo", "Carter One", "Caudex", "Cedarville Cursive", "Cherry Cream Soda", "Chewy", "Coda", "Coming Soon", "Copse", "Corben", "Cousine", "Covered By Your Grace", "Crafty Girls", "Crimson Text", "Crushed", "Cuprum", "Damion", "Dancing Script", "Dawning of a New Day", "Didact Gothic", "Droid Sans", "Droid Sans Mono", "Droid Serif", "EB Garamond", "Expletus Sans", "Fontdiner Swanky", "Francois One", "Geo", "Goblin One", "Goudy Bookletter 1911", "Gravitas One", "Gruppo", "Hammersmith One", "Holtwood One SC", "Homemade Apple", "IM Fell", "Inconsolata", "Indie Flower", "Irish Grover", "Josefin Sans", "Josefin Slab", "Judson", "Jura", "Just Another Hand", "Just Me Again Down Here", "Kameron", "Kenia", "Kranky", "Kreon", "Kristi", "La Belle Aurore", "Lato", "League Script", "Lekton", "Limelight", "Lobster", "Lobster Two", "Lora", "Luckiest Guy", "Maiden Orange", "Mako", "Maven Pro", "Meddon", "MedievalSharp", "Megrim", "Merriweather", "Metrophobic", "Michroma", "Miltonian", "Molengo", "Monofett", "Mountains of Christmas", "Muli", "Neucha", "Neuton", "News Cycle", "Nixie One", "Nobile", "Nova", "Nunito", "OFL Sorts Mill Goudy TT", "Old Standard TT", "Open Sans", "Orbitron", "Oswald", "Over the Rainbow", "PT Sans", "PT Serif", "Pacifico", "Paytone One", "Permanent Marker", "Philosopher", "Play", "Playfair Display", "Podkova", "Puritan", "Quattrocento", "Quattrocento Sans", "Radley", "Raleway", "Redressed", "Reenie Beanie", "Rock Salt", "Rokkitt", "Ruslan Display", "Schoolbell", "Shadows Into Light", "Shanti", "Sigmar One", "Six Caps", "Slackey", "Smythe", "Sniglet", "Special Elite", "Sue Ellen Francisco", "Sunshiney", "Swanky and Moo Moo", "Syncopate", "Tangerine", "Tenor Sans", "Terminal Dosis Light", "The Girl Next Door", "Tinos", "Ubuntu", "Ultra", "UnifrakturCook", "UnifrakturMaguntia", "Unkempt", "VT323", "Varela", "Vibur", "Vollkorn", "Waiting for the Sunrise", "Wallpoet", "Walter Turncoat", "Wire One", "Yanone Kaffeesatz", "Zeyada" );

		foreach( $google_fonts as $key => $value ) {
			$fonts[$value] = $value;
		}
		return $fonts;
	}
}
new TwentyTen_Rocks;