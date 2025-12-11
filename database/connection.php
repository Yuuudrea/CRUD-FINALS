<?php
    $server = "localhost";
    $user = "root";
    $password = "";
    $database = "youtube";

    $connection = new mysqli(
        $server,
        $user,
        $password,
        $database
    );

     if($connection->connect_error){
        die("Unsuccesful connection");
     }

?>