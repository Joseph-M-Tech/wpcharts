<?php
/**
 * Plugin Name:       wp charts
 * Description:       A Job posting platform made by WordPress.
 * Requires at least: 5.8
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Author:            Maniruzzaman Akash
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       wpcharts
 */

 /**
  * Init Admin Menu.
  *
  * @return void
  */
// add_action( 'admin_menu', 'wpcharts_init_menu' );
//  function wpcharts_init_menu() {
//      add_menu_page( __( 'Job Place', 'wpcharts'), __( 'Job Place', 'wpcharts'), 'manage_options', 'wpcharts', 'wpcharts_admin_page', 'dashicons-admin-post', '2.1' );
//  }

 function wpcharts_init_menu () {
    wp_add_dashboard_widget( 
        'wpcharts', //$widget_id
        'Recharts', //widget_name
        'wpcharts',//callback function 

        // 'Recharts_Dashboard_Widget',//callback function 
        // $control_callback,
        // $callback_args
    );
}
add_action( 'wp_dashboard_setup', 'wpcharts_init_menu' );
 
 /**
  * Init Admin Page.
  *
  * @return void
  */
 function wpcharts_admin_page() {
     require_once plugin_dir_path( __FILE__ ) . 'templates/app.php';
 }


 add_action( 'admin_enqueue_scripts', 'wpcharts_admin_enqueue_scripts' );

/**
 * Enqueue scripts and styles.
 *
 * @return void
 */
function wpcharts_admin_enqueue_scripts() {
    wp_enqueue_style( 'wpcharts-style', plugin_dir_url( __FILE__ ) . 'build/index.css' );
    wp_enqueue_script( 'wpcharts-script', plugin_dir_url( __FILE__ ) . 'build/index.js', array( 'wp-element' ), '1.0.0', true );
}