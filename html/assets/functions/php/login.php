<?php
require 'conn.php';

function errorLogin($errorMessage) {
    echo "<script>
        localStorage.setItem('connection', '$errorMessage');
        window.location.href = '/';
    </script>";
}

$username = $_POST['usernameLogin'];
$password = $_POST['passwordLogin'];

if (empty($username)){
    errorLogin("Empty username");
} else if (empty($password)){
    errorLogin("Empty password");
} else {
    $getIdSql = "
        SELECT `id` FROM `user` WHERE 
        `username` = '$username' && 
        `password` = '" . md5($password) . "'
        ;";

    $result = conn("main")->query($getIdSql);

    $row = $result->fetch_assoc();

    if (empty($row["id"])) {
        errorLogin("Wrong username / password");
    } else {
        echo "id: " . $row["id"];
    }
}

