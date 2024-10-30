<?php
/*
Plugin Name: iPad Rubberneck Disrupter
Plugin URI: http://wordpress.org/extend/plugins/ipad-rubberneck-disrupter/
Description: Hides the WordPress login password as you type it on your iPad.
Author: cubecolour
Version: 1.0.2
Author URI: http://cubecolour.co.uk/
License: GPLv2

  Copyright 2013-2022 Michael Atkins

  Licenced under the GNU GPL:

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
  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA

*/

/**
 * Add link to the plugins table
 *
 */
add_filter( 'plugin_row_meta', 'cc_ird_meta_links', 10, 2 );
function cc_ird_meta_links( $links, $file ) {

	$plugin = plugin_basename(__FILE__);

	//* create the links
	if ( $file == $plugin ) {
		return array_merge( $links, array( '<a href="https://cubecolour.co.uk/wp">Donate</a>', '<a href="https://twitter.com/cubecolour">Twitter</a>' ) );
	}
	return $links;
}


/**
 * Add custom stylesheet to the login page
 *
 */
function cc_ipad_rubberneck_disrupter_css() {
	echo '<link rel="stylesheet" href="' . plugins_url( 'css/ipad-rubberneck-disrupter.css', __FILE__ ) . '" type="text/css" media="screen" />' . "\n";
}

if(strstr($_SERVER['HTTP_USER_AGENT'],'iPad') || strstr($_SERVER['HTTP_USER_AGENT'],'iPhone') || strstr($_SERVER['HTTP_USER_AGENT'],'iPod')) {
	add_action('login_enqueue_scripts', 'cc_ipad_rubberneck_disrupter_css');
}