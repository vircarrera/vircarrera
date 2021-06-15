<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="google-site-verification" content="WTtsRgPaXLsk9LLhZqXc_WKNnk172lTEbmRqpbKf-NM" />
<title><?php bloginfo('name'); ?></title>
<!-- <link rel="preload" href="//db.onlinewebfonts.com/c/4a24899e94d8236f671c1090cd9e068c?family=Canela" rel="stylesheet" type="text/css"/> -->
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >

<div class="white-noise">

<header class="c-header">  

    <div class="container w-1310">
        
        <a href="<?php echo home_url(); ?>" class="e-logo">
            <!-- <img src="<?php //bloginfo( 'template_url' ); ?>/img/content/logo.png" class="e-logo positive"> -->
            vircarrera
        </a>
        <input type="checkbox" id="check" class="e-check">
        <div class="navcontainer noise">            
            <label for="check" id="simboloheader" class="simbolo">
                <img src="<?php bloginfo( 'template_url' ); ?>/img/backgrounds/simbolo-grande.svg">
            </label>
            <nav class="e-nav --top">     
                <?php wp_nav_menu( array( 
                    'theme_location' => 'menutop', 
                    'container' => 'false', 
                    'menu_class'=>'e-menu --top') 
                    ); 
                ?>
                <div class="e-search">
                    <?php the_widget( 'WP_Widget_Search' ); /* buscador */ ?>   
                </div>
            </nav>
        </div>
    </div> <!-- cierra container w-1310 -->

</header>

<div class="container --main <?php if(!is_front_page()): echo "w-1310"; endif; ?>">