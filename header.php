<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title('|', true, 'right'); ?></title>
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php wp_head(); ?>
</head>
    
<body <?php body_class(); ?>>
<header class="site-header bg-primary pt-3 pb-3">
  
       
  <div class="container-xl d-flex justify-content-between">
    <div class="navbar-brand" >   <?php
                if ( has_custom_logo() ) {
                    the_custom_logo();
                } else {
                    if ( is_front_page() && is_home() ) : ?>
                        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                    <?php else : ?>
                        <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                    <?php endif;
                    $description = get_bloginfo( 'description', 'display' );
                    if ( $description || is_customize_preview() ) : ?>
                        <p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
                    <?php endif;
                }
                ?></div>


    <div class=" justify-content-end" id="navbarSupportedContent">
    
               <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
    </div>
  </div>

</header>
