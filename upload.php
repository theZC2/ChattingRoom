<?php
    $mysql = mysqli_connect("localhost" , "root" , "" , "abbsm" , 3306) or die("wcnm");
    $query = "INSERT INTO chat(uname , `data`) VALUES ('".$_GET['name']."' , '".$_GET['data']."');";
    mysqli_query($mysql , $query);
    echo mysqli_error($mysql);
?>