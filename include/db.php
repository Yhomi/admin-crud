<?php
    $conn=mysqli_connect('localhost','root','','crud_db');
    if(mysqli_connect_error($conn)){
        echo "connection error". mysqli_error();
    }else{
        // echo "Connection Good";
    }
?>