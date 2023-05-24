<?php
    include '../conn.php';

    session_start();

    $user_id = $_SESSION["id"];
    $message = $_POST["message"];
    $language = $_POST["language"];

    $currentTime = date('H:i'); 
    $sendSql = "INSERT INTO $language (userId, message, time) VALUES ('$user_id', '$message', '$currentTime')";

    conn("main")->query($sendSql);
    conn("main")->close();
?>

