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

	var $table;

	/** Constructor */
	function __construct() {
		add_shortcode('mem-skills', array($this, 'mem_skills_shortcode'));
		add_action( 'wp_enqueue_scripts', array( $this, 'wp_enqueue_links_scripts' ) );
 		register_activation_hook( __FILE__, array( $this, 'create_table_random_words' ) );


		/* Add a custom API endpoint for random words */
		add_action( 'rest_api_init', function () {
			register_rest_route( 'mem-skills/v1', '/random_words', array(
				'methods' => 'POST',
				'callback' => array( $this, 'gen_random_words'),
			) );
		} );
	}

	function wp_enqueue_links_scripts() {
		wp_enqueue_style( 'letters-test', plugins_url( '/assets/letters-test.css', __FILE__  ) );
		wp_enqueue_style( 'font-awesome', plugins_url( '/assets/font-awesome/css/font-awesome.min.css', __FILE__  ) );
	}

	function create_table_random_words() {
	    global $wpdb;
	    $table = $wpdb->prefix . "random_words";
	    $this->table = $table;

	    $charset_collate = $wpdb->get_charset_collate();
		$sql = "CREATE TABLE `$table` (
			`ID` int(11) NOT NULL AUTO_INCREMENT,
			`words` varchar(255) NOT NULL,
	            PRIMARY KEY (`id`)
	        ) $charset_collate;";
       	$sql_insert = "INSERT INTO `$table` (`words`) VALUES ";
		$sql_insert .= file_get_contents( plugins_url( '/random_words.sql', __FILE__  ) );

	    if ( $wpdb->get_var("SHOW TABLES LIKE '$table'") != $table ) {
	        require_once( ABSPATH . '/wp-admin/includes/upgrade.php' );
	        dbDelta($sql);
	        dbDelta($sql_insert);
	    }
	}

	function mem_skills_shortcode( $atts ) {
		// echo $this->nyeam;
		extract( shortcode_atts( array(
			'type' => '',
		), $atts, 'mem-skils' ) );

		if ($type == 'letters') 
			$this->render_letters_test();

		elseif ($type == 'numbers')
			$this->render_numbers_test();
		

		elseif ( $type == 'words' )
		$this->render_words_test();
	
	}	

	function render_letters_test() {
		wp_enqueue_script( 'letters-test-script', plugins_url('/assets/letters-test.js', __FILE__ ), array(), '1.0.0', true );
		include( plugin_dir_path( __FILE__ ) . 'pages/letters-test.php' );
	}

	function render_numbers_test() {
		include( plugin_dir_path( __FILE__ ) . 'pages/numbers-test.php' );
	}

	function render_words_test() {
		include( plugin_dir_path( __FILE__ ) . 'pages/words-test.php' );
	}

	function gen_random_words( $data ) {
		// return $_GET;
		global $wpdb;
	    $table = $wpdb->prefix . "random_words";

		if ( isset($_POST['how_many']) ) {
			// return true;
			$how_many = $_POST['how_many'];

			$sql = "SELECT DISTINCT words FROM $table
					WHERE words NOT LIKE '% %' ORDER BY RAND() LIMIT $how_many";
			return $wpdb->get_results( $sql ) ;
		}
		else 
			return false;
	}
}
	
	
$Memorization_Skills = new Memorization_Skills;


