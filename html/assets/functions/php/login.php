<?php

require 'conn.php';

$username = $_POST['username'];
$password = md5($_POST['password']);

header('Location: ' . "http://localhost");
?>
