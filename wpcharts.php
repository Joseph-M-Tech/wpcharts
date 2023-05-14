<?php
/**
 * Plugin Name:       WP charts
 * Description:       A data visualization WordPress widget Plugin using Recharts, ReactJs and REST API.
 * Author:            Joseph Mwangi
 * Author URI:        https://#
 * Version:           0.1.0
 * Requires at least: 5.8
 * Requires PHP:      7.0
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       wpcharts
 */

 /**
  * Init Admin  widget.
  *
  * @return void
  */

 function wpcharts_init_menu () {
    wp_add_dashboard_widget( 
        'wpcharts', //$widget_id
        'Recharts', //widget_name
        'wpcharts',//callback function 

    );
}
add_action( 'wp_dashboard_setup', 'wpcharts_init_menu' );
 
 /**
  * Init Admin  Home widget display.
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