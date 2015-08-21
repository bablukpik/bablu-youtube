<?php
/*
Plugin Name: Bablu Video
Plugin URI: http://faruk/plugins/bablu-youtube
Description: This plugin is for watching video. Easy to access of this plugin so that we can make a good quality video.
Version: 1.1
Author URI: http://faruk/wp
*/


//bablu
 function box($atts, $content=null) {
	 return ('<div class="box_style" id="box_style">'.$content.'</div>');
}
add_shortcode( 'box', 'box' );

 function youtube($atts, $content=null) {
	 return ('<iframe width="420" height="315" src="https://www.youtube.com/embed/'.$content.'" frameborder="0" allowfullscreen></iframe>');
}
add_shortcode( 'youtube', 'youtube' );


//Button add in wordpress editor or TinyMCE

add_filter('mce_buttons', 'our_custom_btn');

function our_custom_btn($buttons) {
   array_push($buttons, 'boxed', 'youtubed');
   return $buttons;
}
 
// Load the TinyMCE plugin : editor_plugin.js (wp2.5)
add_filter('mce_external_plugins', 'myplugin_register_tinymce_javascript');

function myplugin_register_tinymce_javascript($plugin_array) {
   $plugin_array['wptuts'] = plugins_url('js/custom-button.js',__FILE__);
   return $plugin_array;
}

 //bablu_end

function bablu_video_css() {

	echo "
	<style type='text/css'>
	#box_style {
		background-color:green;
	}
	</style>
	";
}

add_action( 'wp_head', 'bablu_video_css' );


function external_css() {

wp_enqueue_style( 'myCSS', plugins_url( 'css/custom.css', __FILE__ ) );
}

add_action( 'wp_enqueue_scripts', 'external_css' );


?>
