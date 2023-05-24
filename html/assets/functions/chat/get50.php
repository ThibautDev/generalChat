<?php
    header('Content-Type: application/json');

    include '../conn.php';

    $language = $_POST["language"];

    $get50Sql = "SELECT * FROM $language ORDER BY id desc LIMIT 50;";
    $get50Result = conn("main")->query($get50Sql);

    $rows = array();

    if ($get50Result->num_rows > 0) {
        while ($row = $get50Result->fetch_assoc()) {
            $rows[] = $row;
        }
    }

    $jsonData = json_encode($rows);

    echo $jsonData;

