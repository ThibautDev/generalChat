<?php
    include '../conn.php';

    session_start();

    $user_id = $_SESSION["id"];
    $toEdit = $_POST["toEdit"];
    $new = $_POST["new"];

    if ($toEdit = "password") {
        $new = md5($new);
    }

    $changeSql = "UPDATE user SET `$toEdit` = $new WHERE `id` = $user_id;";

    conn("main")->query($sendSql);
    conn("main")->close();
?>

