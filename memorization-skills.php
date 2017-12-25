<?php
   /*
   Plugin Name: Memorization Skills
   Description: Enhancing Memory Skill
   Author: Bryan Dave D. Lucido
   Author URI: https://facebook.com/pancitatcoke
   Version: 0.0.1
   License: GPL2
   */



/**
 * The main class that handles the entire output, content filters, etc., for this plugin.
 *
 * @package Memorization Skills
 * @since 0.1
 */
class Memorization_Skills {

	/** Constructor */
	function __construct() {
		add_shortcode('mem-skills', array($this, 'mem_skills_shortcode'));
		add_action( 'wp_enqueue_scripts', array( $this, 'wp_enqueue_links_scripts' ) );
	}

	function wp_enqueue_links_scripts() {
		wp_enqueue_style( 'letters-test', plugins_url( '/assets/letters-test.css', __FILE__  ) );
		wp_enqueue_style( 'font-awesome', plugins_url( '/assets/font-awesome/css/font-awesome.min.css', __FILE__  ) );
		wp_enqueue_script( 'letters-test-script', plugins_url('/assets/letters-test.js', __FILE__ ), array(), '1.0.0', true );
	}

	function mem_skills_shortcode( $atts ) {
		extract( shortcode_atts( array(
			'type' => '',
		), $atts, 'mem-skils' ) );

		if ($type == 'letters') 
			$this->render_letters_test();

		elseif ( $type == 'numbers' )
			$this->render_numbers_test();
		

		elseif ( $type == 'words' )
		$this->render_words_test();
	
	}	

	function render_letters_test() {
		include( plugin_dir_path( __FILE__ ) . 'pages/letters-test.php' );
	}

	function render_numbers_test() {
		include( plugin_dir_path( __FILE__ ) . 'pages/numbers-test.php' );
	}

	function render_words_test() {
		include( plugin_dir_path( __FILE__ ) . 'pages/words-test.php' );
	}

}
	
	
$Memorization_Skills = new Memorization_Skills;


