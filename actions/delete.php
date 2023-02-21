<?php
    session_start();
    include("./dbconnect.php");
    extract($_POST);

    $delete = mysqli_query($conn, "DELETE FROM clients where id = '$id' ");
?>