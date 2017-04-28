<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
      <title><?php bloginfo('name'); ?><?php wp_title(); ?></title>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">

		<header id="masthead" class="site-header bluebg">
				<div class="container">
			<div class="logo inlineblock">
          <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
           <img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
         </a>
			</div>
			<div class="floatright">
         <button type="button" id="navbar-toggle" class="mobile">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>
			              <?php wp_nav_menu(array('theme_location' => 'header-menu', 'container_class' => 'main-menu floatright')); ?>
				</div>
		</header><!-- .site-header -->


	<div id="content" class="site-content">
