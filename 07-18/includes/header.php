<!DOCTYPE html>
<html lang=en>
	<head>
		<meta charset="UTF-8" >
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title> Personal blog </title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<link href=/fontawesome/css/all.css rel="stylesheet" type="text/css">
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Indie+Flower&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Lora&family=Montserrat:wght@400;500;700&display=swapdisplay=swap" rel="stylesheet">
	</head>
    <body>
    	<header class="container">             
				<nav class="nav">
					<ul class=menu>
						<?php
							if( !empty( $websiteMenuItems ) )
							{
								foreach( $websiteMenuItems as $item )
								{
									echo( '<li><a href="' . $item->getHref() . '">' . $item->getTitle() . '</a></li>' );
								}
							}

						?>
					</ul>
				</nav>
			</header>