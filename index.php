<?php
/**
 * @package QCObjects
 * @version 0.1.1
 */
/*
Plugin Name: QCObjects
Plugin URI: http://wordpress.org/plugins/qcobjects/
Description: This is a plugin that enables QCObjects into Wordpress. QCObjects is an open-source technology based in JavaScript designed to allow web developers to code targeting desktop and mobile devices into a runtime components and objects scope. It is becoming quickly the next generation tool for modern software development.
Author: Jean Machuca
Version: 0.1.1
Author URI: https://qcobjects.dev
*/

// This inserts the header tag for the QCObjects latest version from cdn
function insert_header_script_tag() {
	echo "<script src=\"https://cdn.jsdelivr.net/npm/qcobjects/QCObjects.js\"></script>";
}

add_action( 'wp_head', 'insert_header_script_tag');

function notice_qcobjects(){
	echo "<div id=\"notice_qcobjects\">QCObjects has been installed.</div>";
}

// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'notice_qcobjects' );

// We need some CSS to position the paragraph
function notice_qcobjects_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#notice_qcobjects {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;		
		margin: 0;
		font-size: 11px;
	}
	</style>
	";
}

add_action( 'admin_head', 'notice_qcobjects_css' );

?>
