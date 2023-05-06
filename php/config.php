<?php
    // If the mysqli_connect() function is successful, it returns a connection object that you can use to interact with the database. If the connection fails, it returns false.

    $conn = mysqli_connect("127.0.0.1", "root", "123", "chatApp"); 
    if (!$conn) {
        echo "error" . mysqli_connect_error(); 
    } else {
        // echo "db connected";
    }; 

?>