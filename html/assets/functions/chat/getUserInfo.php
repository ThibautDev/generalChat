<?php
header('Content-Type: application/json');
    require '../conn.php';
    session_start();
    $id = $_SESSION['id'];

    $getUsernameSql = "
        SELECT `username` FROM `user` WHERE 
        `id` = '$id'
        ;";
    $getUsernameresult = conn("main")->query($getUsernameSql);
    $row = $getUsernameresult->fetch_assoc();

    $userInfo = array(
        "id" => $_SESSION['id'],
        "username" => $row["username"]
    );

    echo json_encode($userInfo);
?>
