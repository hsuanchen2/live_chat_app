<?php
session_start();

if (isset($_SESSION["unique_id"])) {
    include_once "config.php";
    $outgoing_id = mysqli_real_escape_string($conn, $_POST["outgoing_id"]);
    $incoming_id = mysqli_real_escape_string($conn, $_POST["incoming_id"]);
    $output = "";

    $sql = "SELECT * FROM message 
            LEFT JOIN users ON users.unique_id = message.outgoing_msg_id
            WHERE (outgoing_msg_id = {$outgoing_id} 
            AND incoming_msg_id = {$incoming_id})  
            OR (outgoing_msg_id = {$incoming_id} 
            AND incoming_msg_id = {$outgoing_id}) 
            ORDER BY msg_id ASC";

    $query = mysqli_query($conn, $sql);
    if (mysqli_num_rows($query) > 0) {
        // This is both a condition and an action
        // In each iteration of the loop, the mysqli_fetch_assoc() function is called to fetch the next row of the result set as an associative array, which is then assigned to the $row variable. The loop continues until there are no more rows in the result set.
        while ($row = mysqli_fetch_assoc($query)) {
            // if they are eaual means he/she is the sender
            if ($row["outgoing_msg_id"] === $outgoing_id) {
                $output .= '<div class="chat outgoing">
                            <div class="details">
                            <p>' . $row["msg"] . '</p>
                        </div>
                        </div>';
            } else { // msg receiver
                $output .= '<div class="chat incoming">
                            <img src="php/images/'. $row['img'] . '" alt="">
                            <div class="details">
                            <p> ' .$row['msg']. ' </p>
                        </div>
                        </div>';
            }
        }
        echo $output;
    } 
    
} else {
    // Adding the "Location:" prefix to the header function to redirect to login.php
    header("Location: ../login.php");
}

?>