<?php

get_header();

//intégrer le début de la page d'accueil
$current_url = home_url($_SERVER['REQUEST_URI']);
if ($current_url=="http://planty.local/"){
    require_once("debut-accueil.php");
}

the_content();

get_footer();

?>