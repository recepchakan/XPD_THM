<?php

/*
*css dosyalarının eklendiği kısım.
*/
function load_stylesheets()
{   
    wp_register_script( 'bootstrapjs', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.1/js/bootstrap.min.js', 'null', true );
    wp_enqueue_script('bootstrapjs');
    wp_deregister_script( 'jguery' );
    wp_register_script( 'jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js', 'null', true );
    wp_enqueue_script('jquery');
    wp_register_style( 'bootstrapcss','https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.1/css/bootstrap.min.css' , 'null', false, 'all');
    wp_enqueue_style('bootstrapcss');
    wp_register_style( 'stylesheet', get_template_directory_uri() . '/style.css', array(), false, 'all');
    wp_enqueue_style('stylesheet');
}
add_action('wp_enqueue_scripts','load_stylesheets' );


/*
*Wordpress'te klasik editör kullanmak için
*/
add_filter( 'use_block_editor_for_post_type', '__return_false', 100 );


/*
*Ön izleme desteği
*/
add_theme_support( 'post-thumbnails');
add_image_size( 'small', 300, 300, true );
add_image_size( 'large', 600, 600, true );

/*
*wordpress menu fonksiyonu ekleme düzenleme 
*Ana Menu değişkeni navigasyon menusu
*/
add_theme_support( 'menus');
register_nav_menus( 
   array(
       'nav-menu' => __('Ana Menu', 'theme'),
       'ikinci-menu'=> __('ikinci Menu', 'theme'),
   )
);

/**
 * Register Custom Navigation Walker
 */
function register_navwalker(){
	require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );

/* bootstrap 5'te navwalker için gerekli aşağısı*/
add_filter( 'nav_menu_link_attributes', 'prefix_bs5_dropdown_data_attribute', 20, 3 );
/**
 * Use namespaced data attribute for Bootstrap's dropdown toggles.
 *
 * @param array    $atts HTML attributes applied to the item's `<a>` element.
 * @param WP_Post  $item The current menu item.
 * @param stdClass $args An object of wp_nav_menu() arguments.
 * @return array
 */
function prefix_bs5_dropdown_data_attribute( $atts, $item, $args ) {
    if ( is_a( $args->walker, 'WP_Bootstrap_Navwalker' ) ) {
        if ( array_key_exists( 'data-toggle', $atts ) ) {
            unset( $atts['data-toggle'] );
            $atts['data-bs-toggle'] = 'dropdown';
        }
    }
    return $atts;
}

/* sidebar ayarları*/
register_sidebar( 
    array(
        'name' => 'Page Sidebar',
        'id' => 'sidebar_1',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    )
);
