<?php
    session_start();
    include("./dbconnect.php");
    extract($_POST);


    $update = mysqli_query($conn, "UPDATE clients SET name = '$name' , email = '$email' , number = '$number' where id = '$id'");
    
?>