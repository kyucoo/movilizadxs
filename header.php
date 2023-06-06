<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?> - <?php bloginfo('description'); ?></title>
    <?php wp_head(); ?>
</head>
<body>
<!-- tag manager here -->
<header id="header" class="header">
    <nav class="navbar navbar-expand-lg" role="navigation">
        <div class="container-fluid">
            <div class="wrapp">
                <div class="wrapp__divLogo">
                    <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) );?>">
                    <?php 
                        $custom_logo_id = get_theme_mod( 'custom_logo' );
                        $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                        if ( has_custom_logo() ) {
                            echo ' 
                            <img src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . '">';
                        } else {
                            echo '<h1>' . get_bloginfo('name') . '</h1>';
                        }
                    ?>
                    </a>
                </div>
                <div class="wrapp__divMenu">
                    <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#main-nav" aria-controls="main-nav" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'bordeandino' ); ?>">
                        <span></span>
                        <span></span>
                        <span></span> 
                    </button>
                </div>
                <?php 
                    $atributosMenu = array(
                        'theme_location'  => 'menu-principal',
                        'depth'           => 2,
                        'container'       => 'div', 
                        'container_class' => 'collapse navbar-collapse', 
                        'container_id'    => 'main-nav',
                        'menu_class'      => 'nav navbar-nav', 
                        'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                        'walker'          => new WP_Bootstrap_Navwalker(),
                    );
                    wp_nav_menu($atributosMenu);
                ?>
            </div>
        </div>
    </nav>
</header>