<?php
    header('Content-Type: application/json');

    include '../conn.php';

    //$language = $_POST["language"];
    $language = "english";

    $getLastSql = "
        SELECT `id` FROM $language
        ORDER BY `id` DESC LIMIT 1;
    ;";
    $getLastresult = conn("main")->query($getLastSql);
    $row = $getLastresult->fetch_assoc();

    echo json_encode($row);
