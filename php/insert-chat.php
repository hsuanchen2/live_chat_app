<?php 
        session_start(); 

        if (isset($_SESSION["unique_id"])) {
            include_once "config.php"; 
    
            // Fixing the typo in the name of the input field from "meassage" to "message"
            $outgoing_id = mysqli_real_escape_string($conn, $_POST["outgoing_id"]); 
            $incoming_id = mysqli_real_escape_string($conn, $_POST["incoming_id"]); 
            $message = mysqli_real_escape_string($conn, $_POST["message"]); 
    
            if (!empty($message)) {
                // Removing the extra dollar sign in front of $incoming_id
                $sql = mysqli_query($conn, "INSERT INTO message (incoming_msg_id, outgoing_msg_id, msg) VALUES ('{$incoming_id}', '{$outgoing_id}', '{$message}')") or die(mysqli_error($conn)); 
            } 
        } else {
            // Adding the "Location:" prefix to the header function to redirect to login.php
            header("Location: ../login.php");
        }
?>