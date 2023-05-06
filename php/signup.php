<?php 
    session_start(); 
    include_once "config.php"; 
    // mysqli_real_escape_string is a PHP function used to escape special characters in a string before it is used in a MySQL query

    // In PHP, an object is considered "truthy"

    $fname = mysqli_real_escape_string($conn, $_POST["fname"]); 
    $lname = mysqli_real_escape_string($conn, $_POST["lname"]); 
    $email = mysqli_real_escape_string($conn, $_POST["email"]); 
    $password = mysqli_real_escape_string($conn, $_POST["password"]); 

    if (!empty($fname) && !empty($lname) && !empty($email) && !empty($password)) { // every input is filled
    // check email

    // FILTER_VALIDATE_EMAIL is a built-in function in PHP that validates whether a given email address is valid or not based on the syntax defined by RFC 822.

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) { // is email valid
            // echo "valid email";         
            // check is this email already exist or not
                $sql = mysqli_query($conn, "SELECT email FROM users WHERE email = '{$email}'");
                if (mysqli_num_rows($sql) > 0) {
                    echo "$email - already exists!";
                } else {
                // check is file uploaded or not
                // isset() is a built-in function in PHP that determines whether a variable is set and is not null. It returns true if the variable exists and has a non-null value, and false otherwise.
                if (isset($_FILES["image"])) {
                    $img_name = $_FILES["image"]["name"]; 
                    $img_type = $_FILES["image"]["type"];
                    $tmp_name = $_FILES["image"]["tmp_name"]; // temproray name to save file in our folder

                    // explode the image
                    // explode is a built-in PHP function that is used to split a string into an array of substrings based on a specified delimiter.
                    $img_explode = explode(".", $img_name);
                    $img_ext = end($img_explode);  

                    $extensions = ["png", "jpeg", "jpg"]; // valid image extension, have to store them in an array. 

                    if (in_array($img_ext, $extensions) === true) {
                        $time = time(); // use current time as unique name of the image. 

                        $new_img_name = $time.$img_name; 
                        if (move_uploaded_file($tmp_name, 'images/'.$new_img_name)) {
                            $status = "Active Now";  // once user signup then status is active.
                        
                            // move the image user uploaded to our file
                            $random_id = rand(time(), 10000000);
                            // insert data into the db table
                            $sql2 = mysqli_query($conn, "INSERT INTO users (unique_id, fname, lastname, email, password, img, status) VALUES ({$random_id}, '{$fname}', '{$lname}','{$email}', '{$password}', '{$new_img_name}', '{$status}')"); 
                            if ($sql2) { // if data inserted successfully
                                $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'"); 
                                if (mysqli_num_rows($sql3) > 0) {
                                    $row = mysqli_fetch_assoc($sql3); 
                                    $_SESSION["unique_id"] = $row["unique_id"]; 
                                    echo "success"; 
                                }
                            } else {
                                echo "Something went wrong";
                            };
                        }
                    } else {
                        echo "Please select an image"; 
                    }
                } else {
                    echo "Please upload an image file, jpg, jpeg, png";
                }
            }
        } else {
            echo $email . "This is not a valid email"; 
        };
    } else {
        echo "All input field are required";
    };
?>