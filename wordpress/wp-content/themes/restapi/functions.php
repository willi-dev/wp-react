<?php

// functions.php

// if( !class_exists('REST_API') ):

	// class REST_API {

		// function __construct(){
			
		// 	add_action( 'rest_api_init', array( $this, 'main_register_rest_route' ) );
		// 	// echo $this->get_menu_html();
		// }

		function main_register_rest_route(){
			// register menu rest api
			register_rest_route( 'app/v1', '/menu', array( 
				'methods' => 'GET',
				'callback' => 'get_menu_html'
			));
		}

		function get_menu(){

		}

		function get_contact_form(){

		}

		function get_menu_html(){
			$menu = wp_nav_menu( array(
				'theme_location' => 'menu_utama',
				'menu_id'        => 'main-menu',
				'echo' 					 => false,
			) ); 
			$menu_array_output = array(
				'menu_html' => htmlentities(json_encode($menu))
			);
			
			return array($menu_array_output);
			// return $menu_array;
		}


		add_action( 'rest_api_init', 'main_register_rest_route' );
	// }

	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'audio',
	) );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'menu_utama'    => __( 'Menu Utama', 'restapi' ),
		'social' => __( 'Social Links Menu', 'restapi' ),
	) );

	// new REST_API();

// endif;