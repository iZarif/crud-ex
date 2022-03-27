<?php

require_once("libs/Mustache/Autoloader.php");
Mustache_Autoloader::register();

$m = new Mustache_Engine(array(
    "loader" => new Mustache_Loader_FilesystemLoader(dirname(__FILE__) . "/views"),
))

?>
