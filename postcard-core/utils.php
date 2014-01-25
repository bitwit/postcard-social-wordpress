<?php

function postcard_get_site_prefix(){
    $prefix = $blog_prefix = '';
    if ( !apache_mod_loaded('mod_rewrite', true) && !iis7_supports_permalinks() )
        $prefix = '/index.php';
    if ( is_multisite() && !is_subdomain_install() && is_main_site() )
        $blog_prefix = '/blog';
    return $prefix . $blog_prefix;
}

function postcard_get_api_endpoint(){
    $permalink_structure = get_option("permalink_structure", "");
    $url = get_option('home') . postcard_get_site_prefix();
    $url .= ($permalink_structure != "") ? "/pc-api/" : "?postcard_api=true";
    return $url;
}