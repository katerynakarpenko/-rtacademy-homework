<!DOCTYPE html>
<html <?php language_attributes() ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" >
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title> Personal blog </title>
		<link rel="stylesheet" type="text/css" href="<?= get_stylesheet_uri() ?>" media="all">
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Indie+Flower&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Lora&family=Montserrat:wght@400;500;700&display=swapdisplay=swap" rel="stylesheet">
		<?php wp_head(); ?>
	</head>
    <body>
    	<header class="container">  
		<a href="/" class="logo"><h1><?= get_bloginfo( 'name' ) ?></h1></a>           
				<nav class="nav">
					<ul class=menu>
						<?php
							wp_nav_menu(
								[
									'theme_location'  => 'main',
								]
							);
						?>
					</ul>
				</nav>
			</header>