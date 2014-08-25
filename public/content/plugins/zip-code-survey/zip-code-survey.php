<?php
/*
Plugin Name: ZIP Code Survey
Description: Use a map with zip codes to populate fields in a form.
Version: 0.1
License: GPL
Plugin URI: http://lovejoy.io/
Author: Christopher Lovejoy
Author URI: http://lovejoy.io/

==========================================================================

Copyright 2014  Christopher Lovejoy

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

class BCI_ZIP_Code_Survey_Plugin {
  static $instance;

  public function __construct() {
    self::$instance = $this;
    add_action( 'init', array( &$this, 'init' ) );
  }

  public function init() {
    add_action( 'wp_enqueue_scripts', array( $this, 'register_scripts' ) );
    add_shortcode( 'fa', array( $this, 'awesome_codes' ) );
  }

  public function register_scripts() {
    wp_enqueue_style('zip-code-survey', 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false', false, null, false);
  }

  public function awesome_codes($atts) {
    extract(shortcode_atts(array(
      'font'  => '',
    ), $atts));
    $awesome = '<i class="fa '.$font.'"></i>';
    return $awesome;
  }

}

// Bootstrap
new BCI_ZIP_Code_Survey_Plugin;
