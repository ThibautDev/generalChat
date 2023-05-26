<?php
    header('Content-Type: application/json');

    include '../conn.php';

    $language = $_POST["language"];
    $id = $_POST["id"];

    $getLastMessageSql = "SELECT `userId`, `message`, `time` FROM $language WHERE `id` = $id;";

    $getLastMessageResult = conn("main")->query($getLastMessageSql);
    $getLastMessageRow = $getLastMessageResult->fetch_assoc();

    $userId = $getLastMessageRow["userId"];

    $getUsernameSql = "SELECT `username`, `pic` FROM `user` WHERE `id` = $userId;";

    $getUsernameResult = conn("main")->query($getUsernameSql);
    $getUsernameRow = $getUsernameResult->fetch_assoc();

    $getLastMessageRow["time"] = date("H:i", strtotime($getLastMessageRow["time"]));
    $getLastMessageRow['username'] = $getUsernameRow['username'];
    $getLastMessageRow['pic'] = $getUsernameRow['pic'];

    echo json_encode($getLastMessageRow);
