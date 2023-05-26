<?php
    header('Content-Type: application/json');

    include '../conn.php';

    $language = $_POST["language"];

    $get50Sql = "SELECT * FROM ( SELECT * FROM `$language` ORDER BY `id` DESC LIMIT 50 ) as recent ORDER BY id ASC;";
    $get50Result = conn("main")->query($get50Sql);

    $rows = array();

    if ($get50Result->num_rows > 0) {
        while ($row = $get50Result->fetch_assoc()) {
            
            $id = $row['userId'];
            $getUserinfoSql = "SELECT `username`, `pic` FROM `user` WHERE `id` = '$id';";
            $getUserinfoResult = conn("main")->query($getUserinfoSql);
            $getUserinfoRow = $getUserinfoResult->fetch_assoc();

            $row["username"] = $getUserinfoRow["username"];

            $row["time"] = date("H:i", strtotime($row["time"]));
            $row["pic"] = $getUserinfoRow["pic"];
            $rows[] = $row;
        }
    }

    $jsonData = json_encode($rows);

    echo $jsonData;

