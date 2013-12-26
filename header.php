<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title><?php $title = wp_title(' | ', false, 'right');
		if($title) {
			echo $title;
		}
		
		bloginfo('title'); ?></title>
		
		<link href="http://fonts.googleapis.com/css?family=Alegreya:400,900" rel="stylesheet" />
		<link href="http://fonts.googleapis.com/css?family=Oxygen:400,300,700&amp;subset=latin,latin-ext" rel="stylesheet" />
		<link href="<?php echo get_stylesheet_uri(); ?>" rel="stylesheet" />
		
		<?php wp_head(); ?>
	</head>
	
	<body <?php body_class(); ?>>
		<div id="nav-wrapper">
			<?php wp_nav_menu(
				array(
					'theme_location' => 'mistys_nav',
					'container' => 'nav',
					'container_class' => 'container exclude-mobile',
					'depth' => 1
				)
			);
			
			wp_nav_menu(
				array(
					'theme_location' => 'mistys_nav_mobile',
					'container' => 'nav',
					'container_class' => 'container mobile-only',
					'depth' => 1,
					'items_wrap' => '<a class="menu-toggle" href="javascript:;"></a><ul id="%1$s" class="%2$s menu-closed">%3$s</ul>'
				)
			); ?>
		</div>