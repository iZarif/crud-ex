<?php

require_once("mustacheConf.php");

$db = mysqli_connect("localhost", "root", "7j\"::=4*+p%fsNRb", "base");

if (!$db) {
    echo($m->render("error", array("errText" => "не удалось подключиться к базе данных")));
    exit(1);
}

mysqli_set_charset($db, "utf8mb4");

$id = $_GET["id"];

if (!is_numeric($id) || $id < 0) {
    mysqli_close($db);
    echo($m->render("error", array("errText" => "ID должен быть неотрицательным числом")));
}

$countQuery = sprintf("SELECT COUNT(*) FROM accounts WHERE id='%d'", $id);
$countQueryResult = mysqli_query($db, $countQuery);
$recordsCount = mysqli_fetch_array($countQueryResult)[0];

$searchQuery = sprintf("SELECT * FROM accounts WHERE id='%d'", $id);
$searchQueryResult = mysqli_query($db, $searchQuery);
$records = mysqli_fetch_all($searchQueryResult, MYSQLI_ASSOC);

echo($m->render("search", array("recordsCount" => $recordsCount, "records" => $records)));

mysqli_close($db);
?>
