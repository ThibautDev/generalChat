<?php
function conn($db){
    $servername = gethostbyname('GBE-mysql').":3306";
    $username = "user";
    $password = "password";
    return (new mysqli($servername, $username,$password,$db));
}

//example
//$main->query("INSERT INTO `users` (`username`, `email`, `password`, `language`, `urlpic`) VALUES ('test1', 'test@test.te', 'test', '1', 'none');");
?>
