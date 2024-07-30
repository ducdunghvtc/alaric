<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#">
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
	<meta name="format-detection" content="telephone=no">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
	<link
	rel="stylesheet"
	href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
	/>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="header d-flex justify-content-between">
	<div class="header-left d-flex align-items-center">
		<div class="header-logo d-none d-xxl-block">
			<?php the_custom_logo();?>
		</div>
	</div>
	<div class="container mw-938">
		<div class="header-nav">
			<?php wp_nav_menu(array("theme_location" => "primary-menu"));?>
		</div>
	</div>
	<ul class="d-lg-flex align-items-center list-style-none mt-3q mt-lg-0 w-100 w-lg-unset">
		<li class="ml-lg-3 text-center">
			<a class="m-lg-0 bg-primary bd-radius-20 fs-18 font-utmbebas btn-contact fw-semibold text-light">
				Liên hệ
			</a>
		</li>
	</ul>
	<div class="d-flex align-items-center">
		<button class="header-toggle-navi js-toggle-navi d-xxl-none">
			<span></span>
			<span></span>
			<span></span>
		</button>
	</div>
</header>