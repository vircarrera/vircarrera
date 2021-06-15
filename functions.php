<?php


//MENUS
function register_my_menus() {
    register_nav_menus(
      array(
        'menutop' => __( 'Menú superior' ), 
        'menuredes' => __( 'Menú de redes' ),
        'menulegal' => __( 'Menú legal' )
      )
    );
  }
add_action( 'init', 'register_my_menus' );  

// ZONA WIDGETS PIE
if(function_exists('register_sidebar')) {
    register_sidebar(array(
        'name'          => 'Pie',
        'id'            => 'pie',
        'before_widget' => '<div id="%1$s" class="pie__widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="pie__titulos">',
        'after_title'   => '</h3>'
    ));
}

//EXTRACTO
function custom_excerpt_length( $length ) {
	return 16;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

// ELIPSIS
function new_excerpt_more( $more ) {
	return ' ...';
}
add_filter('excerpt_more', 'new_excerpt_more');


//IMAGEN DESTACADA
if ( function_exists( 'add_theme_support' ) ) { 
    add_theme_support( 'post-thumbnails' ); }

// COSAS PARA ESTILOS
function wps_deregister_styles()
{
	wp_dequeue_style('wp-block-library');
}
add_action('wp_print_styles', 'wps_deregister_styles', 100);

function load_css_js()
{
	wp_enqueue_style('mariavirsheet', get_stylesheet_uri(), false, NULL, 'all');
	wp_enqueue_style('flickity', get_template_directory_uri() . '/js/vendor/flickity/flickity.css', false, NULL, 'all');
	wp_enqueue_style('aos', get_template_directory_uri() . '/js/vendor/aos/aos.css', false, NULL, 'all');
	wp_enqueue_style('aos', get_template_directory_uri() . '/js/vendor/aos/aos.css', false, NULL, 'all');

	wp_deregister_script('wp-embed');

	wp_deregister_script('jquery');
	wp_register_script('jquery', get_template_directory_uri() . '/js/jquery.js', NULL, NULL, true);
	wp_enqueue_script('jquery');

	wp_register_script('aos', get_template_directory_uri() . '/js/vendor/aos/aos.js', NULL, NULL, true);
	wp_enqueue_script('aos');

	wp_register_script('carousels', get_template_directory_uri() . '/js/carousels.js', array('jquery'), NULL, false);
	wp_enqueue_script('carousels');

	wp_register_script('flickity', get_template_directory_uri() . '/js/vendor/flickity/flickity.js', NULL, NULL, true);
	wp_enqueue_script('flickity');

	wp_register_script('flickity-lazyload', get_template_directory_uri() . '/js/vendor/flickity/bg-lazyload.js', NULL, NULL, true);
	wp_enqueue_script('flickity-lazyload');


	wp_register_script('functions', get_template_directory_uri() . '/js/functions.js', NULL, NULL, true);
	wp_enqueue_script('functions');

	wp_register_script('base', get_template_directory_uri() . '/js/base.js', NULL, NULL, true);
	wp_enqueue_script('base');

}
add_action('wp_enqueue_scripts', 'load_css_js');

//conversor de imágenes a webp para que pesen menos (prueba)
add_action('init', function() {
    do_action( 'webpc_regenerate_all' );
});

//Quitar los emojis
function disable_wp_emojicons()
{

	// all actions related to emojis
	remove_action('admin_print_styles', 'print_emoji_styles');
	remove_action('wp_head', 'print_emoji_detection_script', 7);
	remove_action('admin_print_scripts', 'print_emoji_detection_script');
	remove_action('wp_print_styles', 'print_emoji_styles');
	remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
	remove_filter('the_content_feed', 'wp_staticize_emoji');
	remove_filter('comment_text_rss', 'wp_staticize_emoji');

	// filter to remove TinyMCE emojis
	add_filter('tiny_mce_plugins', 'disable_emojicons_tinymce');
}
add_action('init', 'disable_wp_emojicons');

function disable_emojicons_tinymce($plugins)
{
	if (is_array($plugins)) {
		return array_diff($plugins, array('wpemoji'));
	} else {
		return array();
	}
}


// Comentarios
// FORMULARIO DE ACCESO A COMENTARIOS
function campos_formulario( $fields) {

    //Variables necesarias básicas como que el email es obligatorio
    $commenter = wp_get_current_commenter();
    $req = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );
	
    // campos por defecto del formulario que vamos a introducir con nuestros cambios
    $fields = array(
		
    // NOMBRE
    'author' =>
	'<input id="author" placeholder="Nombre" 
	class="nombre" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . 
	'" size="30"' . $aria_req . ' />',

    // EMAIL
    'email' =>
	'<input id="email" placeholder="Email" 
	class="email" name="email" type="email" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' />',
	);
	
	return $fields;
    }
    add_filter('comment_form_default_fields', 'campos_formulario');
    
//COPYRIGHT
function display_copyright( $iYear = null, $szSeparator = " - ", $szTail = '. Todos los derechos reservados.' )
{echo '<div class="copyright">' . display_years( $iYear, $szSeparator, false ) . ' &copy; ' . get_bloginfo('name') . $szTail . '</div>';}
function display_years( $iYear = null, $szSeparator = " - ", $bPrint = true )
{
$iCurrentYear = ( date( "Y" ) );
if ( is_int( $iYear ) )
{$iYear = ( $iCurrentYear > $iYear ) ? $iYear = $iYear . $szSeparator . $iCurrentYear : $iYear;
} else {
$iYear = $iCurrentYear;}
if ( $bPrint == true ) echo $iYear; else return $iYear;
}
/*function add_google_analytics() {
    echo '<script src="https://www.google-analytics.com/ga.js" type="text/javascript"></script>';
    echo '<script type="text/javascript">';
    echo 'var pageTracker = _gat._getTracker("UA-XXXXX-X");';
    echo 'pageTracker._trackPageview();';
    echo '</script>';
}
add_action('wp_footer', 'add_google_analytics');*/



function bps_cookie_script () {
?>

<!-- Begin Cookie Consent plugin by Silktide - http://silktide.com/cookieconsent -->
<script type="text/javascript">
window.cookieconsent_options = {"message":"Típico aviso de cookies. Si sigues navegando significa que aceptas su uso.","dismiss":"¡Genial!","learnMore":"Más info","link":"https://www.terapiascontextuales.com/cookies/","theme":"dark-bottom"};
</script>

<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/1.0.10/cookieconsent.min.js"></script>
<!-- End Cookie Consent plugin -->

<?php
}
add_action('wp_head', 'bps_cookie_script');

// PHP para agregar Breadcrumb a WordPress   
function the_breadcrumb() {
	if (!is_home()) {
		echo '<span title="';
		echo get_option('home');
	        echo '">';
		bloginfo('name');
		echo "</span> » ";
		if (is_page_template()) {
				echo " » ";
                echo the_title();

        
                	
		} elseif (is_single()) {
			echo the_title();
		}
	}
}    

// fin del breadcrumb

/* ACF Configuration */

if (function_exists('acf_add_options_page')) {
    $option_page = acf_add_options_page(array(
        'page_title' 	=> 'Opciones',
        'menu_title' 	=> 'Opciones',
    ));
}

/* CUSTOM POST TYPES */

/* CUSTOM TAXONOMY */

// add custom class to tag
function add_class_the_tags($html){
    $postid = get_the_ID();
    $html = str_replace('<a','<a class="class-name"',$html);
    return $html;
}
add_filter('the_tags','add_class_the_tags');



//PERMITIR SUBIR IMÁGENES SVG


function dmc_add_svg_mime_types($mimes) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter('upload_mimes', 'dmc_add_svg_mime_types');


//paginador

?>