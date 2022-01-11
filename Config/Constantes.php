<?php

$pos = strpos($_SERVER['REQUEST_URI'], '?');
$BasUrl = $pos == -1 ? $_SERVER['REQUEST_URI'] : substr($_SERVER['REQUEST_URI'], 0, $pos);

define("_BASE_URL", $BasUrl);
define("_RESSOURCES_DIR",  "./Ressources");
define("_PRODUCTS_IMAGES_DIR", _RESSOURCES_DIR . "/productimages");

define("_DB_HOST", "localhost");
define("_DB_NAME", "web4shop");
define("_DB_USER", "root");
define("_DB_PASSWORD", "");


?>