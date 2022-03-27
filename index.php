<?php

require(dirname(__FILE__) . "/libs/Mustache/Autoloader.php");
Mustache_Autoloader::register();

$m = new Mustache_Engine(array(
    "loader" => new Mustache_Loader_FilesystemLoader(dirname(__FILE__) . "/views"),
));

echo $m->render("index", array("errText" => "", "errClass" => ""));
?>
