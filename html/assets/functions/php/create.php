<?php
require 'conn.php';

function errorCreate($errorMessage) {
    echo "<script>
        localStorage.setItem('create', '$errorMessage');
        window.location.href = '/';
    </script>";
}


$username = $_POST['usernameCreate'];
$email = $_POST['emailCreate'];
$password = $_POST['passwordCreate'];
$passwordMd5 = md5($_POST['passwordCreate']);

if (empty($username)){
    errorCreate("Empty username");
} else if (empty($email)){
    errorCreate("Empty email");
} else if (empty($password)){
    errorCreate("Empty password");
} else {
    $sqlCheck = "SELECT `id` FROM `user` WHERE 
        `username` = '$username' OR 
        `email` = '$email'
        ;";

    $resultCheck = conn("main")->query($sqlCheck);

    $rowCheck = $resultCheck->fetch_assoc();

    if (!empty($rowCheck["id"])) {
        errorCreate("Username or email already used");
    } else {
        $url = "https://this-person-does-not-exist.com";
        $id = "avatar";

        $doc = new DOMDocument();
        @$doc->loadHTMLFile($url);

        $img = $doc->getElementById($id);

        $pic = $url . $img->getAttribute("src");

        conn("main")->query("
            INSERT INTO `user`(`username`, `email`, `password`, `pic`) 
            VALUES (
                '$username',
                '$email',
                '$passwordMd5',
                '$pic'
            )
            ");

        $sqlConnection = "
            SELECT `id` FROM `user` WHERE 
            `username` = '$username' && 
            `password` = '$passwordMd5'
            ;";

        $resultConnection = conn("main")->query($sqlConnection);

        $rowConnection = $resultConnection->fetch_assoc();

        if (empty($rowConnection["id"])) {
            errorCreate("Account creation failed");
        } else {
            $id = $rowConnection["id"];
        }
    }
}
?>
