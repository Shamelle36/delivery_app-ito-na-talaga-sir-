<?php

    $servername = "localhost";
    $db_username = "root";
    $db_password = "";
    $db = "delivery_app";

    $conn = mysqli_connect($servername,$db_username,$db_password,$db);

    if (!$conn){
        die("Connection failed: ". mysqli_connect_error());
    }
