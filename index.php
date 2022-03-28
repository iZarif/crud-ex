<?php

require_once("mustacheConf.php");

echo $m->render("index", array("id" => 0, "errText" => "", "errClass" => ""));
?>
