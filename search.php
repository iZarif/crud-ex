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

$countQuery = "SELECT COUNT(*) FROM accounts WHERE id='" . $id . "'";
$countQueryResult = $db->query($countQuery);
$recordsCount = mysqli_fetch_array($countQueryResult)[0];

$searchQuery = "SELECT * FROM accounts WHERE id='" . $id . "'";
$searchQueryResult = $db->query($searchQuery);
$records = [];

while ($record = mysqli_fetch_assoc($searchQueryResult)) {
    $records[] = $record;
}

echo($m->render("search", array("recordsCount" => $recordsCount, "records" => $records)));

mysqli_close($db);
?>
