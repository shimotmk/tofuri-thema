<!DOCTYPE html>
<html lang="ja" prefix="og: http://ogp.me/ns#">

<head>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="format-detection" content="telephone=no">

	<title>TF-30</title>
	<meta name="description" content="">

	<meta property="og:title" content="TF-30">
	<meta property="og:type" content="website">
	<meta property="og:url" content="https://example.com/">
	<meta property="og:image" content="https://example.com/img/ogp.png">
	<meta property="og:site_name" content="TF-30">

	<meta property="og:description" content="">
	<meta name="twitter:card" content="summary_large_image">

	<?php wp_head(); ?>
	<link rel="icon" href="<?php echo get_template_directory_uri() ?>/img/icon-home.png">
</head>

<body>

	<!-- header -->
	<header id="header">
		<div class="inner">
			<?php if (is_home() || is_front_page() ) : //トップページではロゴをh1に、それ以外のページではdivに。 ?>
				<h1 class="header-logo"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1><!-- /header-logo -->
			<?php else : ?>
				<div class="header-logo"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></div><!-- /header-logo -->
			<?php endif; ?>
				<div class="header-sub"><?php bloginfo('description'); //ブログのdescriptionを表示 ?></div><!-- /header-sub -->

				<!-- drawer-content -->
				<div class="drawer-content">
				<?php
				//.drawer-navを置き換えて、スマホ用メニューを動的に表示する
				wp_nav_menu(
				array(
				'container' => false,
				'depth' => 1,
				'theme_location' => 'drawer', //ドロワーメニューをここに表示すると指定
				'container' => 'nav',
				'container_class' => 'drawer-nav',
				'menu_class' => 'drawer-list',
				)
				);
				?>
				</div><!-- /drawer-content -->
		</div><!-- /inner -->
	</header><!-- /header -->

	<!-- header-nav -->
	<nav class="header-nav">
		<div class="inner">
			<?php
			wp_nav_menu(
			//.header-listを置き換えて、PC用メニューを動的に表示する
			array(
			'container' => false,
			'depth' => 1,
			'theme_location' => 'global', //グローバルメニューをここに表示すると指定
			'container' => 'false',
			'menu_class' => 'header-list',
			)
			);
			?>
		</div><!-- /inner -->
	</nav><!-- header-nav -->
