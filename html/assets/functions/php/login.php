<?php
require 'conn.php';

if (conn("main")->connect_error) {
    die("Connection failed: " . $main->connect_error);
}



?>
