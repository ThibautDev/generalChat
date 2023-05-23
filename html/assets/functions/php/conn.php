<?php
function conn($db){
    $servername = gethostbyname('GBE-mysql').":3306";
    $username = "user";
    $password = "password";
    return (new mysqli($servername, $username,$password,$db));
}
?>
