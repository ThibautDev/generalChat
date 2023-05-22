<?php

require 'conn.php';

function errorLogin($errorMessage) {
    echo "<script>
        localStorage.setItem('connection', '$errorMessage');
        window.location.href = '/';
    </script>";
}

$username = $_POST['username'];
$password = $_POST['password'];

if (empty($username)){
    errorLogin("Empty username");
} else if (empty($password)){
    errorLogin("Empty password");
}
?>
