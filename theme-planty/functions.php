<?php
//charger la feuille de style externe
add_action('wp_style_parent', 'wp_enqueue_styles');
function wp_enqueue_styles(){
    wp_enqueue_style('parent_style', get_template_directory_uri().'/style.css');
}

