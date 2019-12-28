<?php

### Function: Add Quick Tag For Poll In TinyMCE >= WordPress 2.5
add_action('init', 'urlspan_tinymce_addbuttons');
function urlspan_tinymce_addbuttons() {  
	if(!current_user_can('edit_posts') && ! current_user_can('edit_pages')) {
		return;
	}
	if(get_user_option('rich_editing') == 'true') {
		add_filter("mce_external_plugins", "urlspan_tinymce_addplugin");
		add_filter('mce_buttons', 'urlspan_tinymce_registerbutton');
	}
}
function urlspan_tinymce_registerbutton($buttons) {
//	array_push($buttons, 'separator', 'urlspan');
	array_push($buttons, 'urlspan', 'separator', 'separator');
	return $buttons;
}
function urlspan_tinymce_addplugin($plugin_array) {
	$plugin_array['urlspan'] = get_template_directory_uri() . '/urlspan/editor_plugin.js';
	return $plugin_array;
}

?>