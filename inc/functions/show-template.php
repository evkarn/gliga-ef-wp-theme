<?php
add_action('wp_footer', 'show_template');
function show_template() {
	if (current_user_can('manage_options')) {
		global $template;
		echo '<div style="position:fixed; bottom: 10px; right: 10px; background:red; color:white; padding: 10px; z-index: 9999;">';
		echo basename($template);
		echo '</div>';
	}
}