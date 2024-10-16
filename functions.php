<?php

add_filter('the_content', 'do_shortcode');
date_default_timezone_set('America/Sao_Paulo');
show_admin_bar(false);
add_theme_support('menus', 'widget');
add_post_type_support('page', 'excerpt');
add_post_type_support('post', 'excerpt');
remove_action('init', 'wp_admin_bar_init');
add_theme_support('menus', 'widget');
add_theme_support('title-tag');
/**********************************************************************/
register_nav_menu('menu_principal', 'Menu Principal - Topo');
add_theme_support('post-thumbnails');





/**********************************************************************/
function disable_block_library_css()
{
    wp_dequeue_style('wp-block-library');
   // wp_dequeue_style('wp-block-library-theme');
   // wp_dequeue_style('wc-block-style'); // Se estiver usando o WooCommerce
}
add_action('wp_enqueue_scripts', 'disable_block_library_css', 100);
/**********************************************************************/
$addr = get_template_directory(); 
$addr = str_replace("\\","/", $addr);
require_once "".$addr."/funcoes/reduzir.php"; //include_once "". $addr . "/funcoes/reduzir.php";



/**********************************************************************/

//add_filter('jpeg_quality', function($arg){ return 50; });
