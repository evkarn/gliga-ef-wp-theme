<?php

function my_pagination() {
	$args = array(
		'prev_next' => False,
		'type'      => 'list'
	);

	echo paginate_links( $args );
}