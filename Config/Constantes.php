<?php

$pos = strpos($_SERVER['REQUEST_URI'], '?');
$BasUrl = $pos == -1 ? $_SERVER['REQUEST_URI'] : substr($_SERVER['REQUEST_URI'], 0, $pos);

define("_BASE_URL", $BasUrl);
define("_RESSOURCES_DIR",  "./Ressources");
define("_PRODUCTS_IMAGES_DIR", _RESSOURCES_DIR . "/productimages");

?>