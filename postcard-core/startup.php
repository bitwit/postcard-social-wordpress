<?php

function postcard_run_startup()
{
    require_once("utils.php");
    $cleaned_endpoint = str_replace(postcard_get_site_prefix(), "", $_SERVER['REQUEST_URI']);
    $request_endpoint = explode("/", $cleaned_endpoint);
    array_shift($request_endpoint); # First slash is useless

    if ($request_endpoint[0] == "pc-api") {
        require_once("PostcardApi.php");
        $api = new PostcardApi();
        array_shift($request_endpoint);
        $endpoint = implode("/", $request_endpoint);
        $api->processRequest($endpoint);
    } else {
        require_once("postcard-functions.php");
        add_shortcode("postcard-gallery", "postcard_process_gallery_shortcode");
        add_shortcode("postcard-feed", "postcard_process_feed_shortcode");
        add_shortcode("postcard-archive", "postcard_process_archive_shortcode");
        add_action('admin_menu', 'postcard_admin_menus');
        add_action( 'wp_enqueue_scripts', 'postcard_enqueue_styles' );
        add_action( 'wp_enqueue_scripts', 'postcard_enqueue_scripts' );
    }
}

function postcard_enqueue_styles()
{
    wp_register_style( 'postcard-style', plugins_url( '/styles/postcard.css', __FILE__ ), array(), '20120208', 'all' );
    wp_enqueue_style( 'postcard-style' );
}

function postcard_enqueue_scripts()
{
    wp_register_script( 'postcard-script', plugins_url( '/scripts/postcard.js', __FILE__ ), array( 'jquery' ) );
    wp_enqueue_script( 'postcard-script' );
}

function postcard_admin_menus()
{
    add_menu_page("Instructions", "Postcard", "edit_themes", "postcard", "display_postcard_instructions");
    add_submenu_page("postcard", "My postcards", "My postcards", "edit_themes", "postcard_settings", "display_postcard_settings");
}

function display_postcard_instructions()
{
    require_once("postcard-functions.php");
    include("admin-pages/instructions.php");
}

function display_postcard_settings()
{
    require_once("postcard-functions.php");
    include("admin-pages/main.php");
}

add_action('wp_head','postcard_meta');
function postcard_meta(){
    if( is_page((int)get_option(POSTCARD_ARCHIVE_PAGE)) && isset($_GET['pc_id']) ){
        require_once("postcard-functions.php");
        require_once("tasks.php");
        $postcard = postcard_get_by_id($_GET['pc_id']);
        include("meta-templates/postcard-meta.php");
    }
}

if ( isset($_GET['page_id']) && $_GET['page_id'] == (int)get_option(POSTCARD_ARCHIVE_PAGE) ) {
    remove_filter('template_redirect', 'redirect_canonical');
}
