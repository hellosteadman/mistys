<?php add_action('init', 'mistys_init');
function mistys_init() {
	wp_register_script('modernizr', get_template_directory_uri() . '/js/modernizr.js');
	wp_register_script('imagesloaded', get_template_directory_uri() . '/js/jquery.imagesloaded.js', array('jquery'));
	wp_register_script('owl.carousel', get_template_directory_uri() . '/js/owl.carousel.js', array('jquery'));
	wp_register_script('jplayer', get_template_directory_uri() . '/js/jquery.jplayer.js', array('jquery'));
	wp_register_script('hashchange', get_template_directory_uri() . '/js/jquery.hashchange.js', array('jquery'));
	wp_register_script('mistys', get_template_directory_uri() . '/js/functions.js',
		array('jquery', 'owl.carousel', 'imagesloaded', 'jplayer', 'hashchange')
	);
	
	add_theme_support('post-formats');
	add_theme_support('post-thumbnails');
	add_theme_support('automatic-feed-links');
	add_theme_support('html5');
	
	register_nav_menus(
		array(
			'mistys_nav' => 'Header navigation (desktop)',
			'mistys_nav_mobile' => 'Header navigation (mobile)',
			'mistys_additional' => 'Footer navigation'
		)
	);
}

add_action('wp_head', 'mistys_head');
function mistys_head() {
	wp_enqueue_style('thickbox');
	wp_enqueue_script('modernizr');
	wp_enqueue_script('imagesloaded');
	wp_enqueue_script('owl.carousel');
	wp_enqueue_script('thickbox');
	wp_enqueue_script('jplayer');
	wp_enqueue_script('hashchange');
	wp_enqueue_script('mistys');
}

skt_register_theme();

function mistys_timesince($ts = null) {
	if($ts == null) {
		$ts = get_the_time('U');
	}
	
	if(!ctype_digit($ts)) {
		$ts = strtotime($ts);
	}
	
	$diff = time() - $ts;
	if($diff == 0) {
		return 'now';
	}
	
	if($diff > 0) {
		$day_diff = floor($diff / 86400);
		if($day_diff == 0) {
			if($diff < 60) return 'just now';
			if($diff < 120) return '1 minute ago';
			if($diff < 3600) return floor($diff / 60) . ' minutes ago';
			if($diff < 7200) return '1 hour ago';
			if($diff < 86400) return floor($diff / 3600) . ' hours ago';
		}
		
		if($day_diff == 1) return 'Yesterday';
		if($day_diff < 7) return $day_diff . ' days ago';
		if($day_diff < 31) return ceil($day_diff / 7) . ' weeks ago';
		if($day_diff < 60) return 'last month';
		return date('F Y', $ts);
	}
	
	$diff = abs($diff);
	$day_diff = floor($diff / 86400);
	if($day_diff == 0) {
		if($diff < 120) return 'in a minute';
		if($diff < 3600) return 'in ' . floor($diff / 60) . ' minutes';
		if($diff < 7200) return 'in an hour';
		if($diff < 86400) return 'in ' . floor($diff / 3600) . ' hours';
	}
	
	if($day_diff == 1) return 'Tomorrow';
	if($day_diff < 4) return date('l', $ts);
	if($day_diff < 7 + (7 - date('w'))) return 'next week';
	if(ceil($day_diff / 7) < 4) return 'in ' . ceil($day_diff / 7) . ' weeks';
	if(date('n', $ts) == date('n') + 1) return 'next month';
	
	return date('F Y', $ts);
}

function mistys_get_venue_address($venue) {
	$context = $GLOBALS['skt_fundaments'];
	if($taxonomy = $context->find_taxonomy('gig_venue')) {
		return $taxonomy->get_field($venue->term_id, 'address');
	}
}