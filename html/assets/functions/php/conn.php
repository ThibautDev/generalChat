<?php
function conn($db){
    $servername = gethostbyname('GBE-mysql').":3306";
    $username = "user";
    $password = "9mZiO?5uL#rmZ|9?KITAv_MxF+6%sncW";
    return (new mysqli($servername, $username,$password,$db));
}

//example
//$main->query("INSERT INTO `users` (`username`, `email`, `password`, `language`, `urlpic`) VALUES ('test1', 'test@test.te', 'test', '1', 'none');");
?>
