<?php


function planty_setup() {
  //charge le titre du site
  add_theme_support('title-tag');
  add_theme_support( 'post-thumbnails' );

  //Gestion des menus dans wordpress
  add_theme_support('menus');
  register_nav_menu('header','En tête de la page');
}
add_action('after_setup_theme', 'planty_setup');


//charger la feuille de style du theme actif
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
function theme_enqueue_styles()
{
    wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/style.css', array(), filemtime(get_stylesheet_directory() . '/style.css'));
}
 

//style du menu de l'en-tête
function add_classes_on_li($classes) {
  $classes[] = 'li-menu';
  return $classes;
}
add_filter('nav_menu_css_class','add_classes_on_li',1,1);

function last_menu_class($items) {
  $items[count($items)]->classes[] = 'button';
  return $items;
}
add_filter('wp_nav_menu_objects', 'last_menu_class',1,1);


//Ajouter lien Admin si l'utilisateur connecté est l'administrateur
function add_link_admin($items)
{
  $newitems = ''; 
  $mainMenu = wp_get_nav_menu_items('menu-entete');	

 if(is_user_logged_in())
 {

    if($mainMenu):

      foreach($mainMenu as $navItem):  

        if ($navItem->title == 'Nous rencontrer')
        {  
          $newitems .= '<li class="li-menu"><a href="'.$navItem->url.'" title="'.$navItem->title.'">'.$navItem->title.'</a></li>';
          $newitems .= '<li class="li-menu"><a title="Admin" href="'. admin_url() .'">Admin</a></li>';
        }
        else
        {
          $newitems .= '<li class="button"><a href="'.$navItem->url.'" title="'.$navItem->title.'" class="white">'.$navItem->title.'</a></li>';
        }            

      endforeach;

    endif;
  }
  else
  {
    if($mainMenu):

      foreach($mainMenu as $navItem):  
        
        if ($navItem->title == 'Commander')
        {
          $newitems .= '<li class="button"><a href="'.$navItem->url.'" title="'.$navItem->title.'" class="white">'.$navItem->title.'</a></li>';
        }
        else 
        {
          $newitems .= '<li class="li-menu"><a href="'.$navItem->url.'" title="'.$navItem->title.'">'.$navItem->title.'</a></li>';
        }
      endforeach;
    endif;
  }
  return $newitems;
}
add_filter('wp_nav_menu_items', 'add_link_admin', 1, 1);




                  
           