<?php
    $mysql = mysqli_connect("localhost" , "root" , "" , "abbsm" , 3306);
    $d = mysqli_query($mysql , "SELECT * FROM chat");
    echo json_encode($d->fetch_all());
?>