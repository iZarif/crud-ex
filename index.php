<?php

require_once("mustacheConf.php");

echo $m->render("index", array("errText" => "", "errClass" => ""));
?>
