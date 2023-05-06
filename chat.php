<?php
  // if the user is not logged in, redirect to login page
  session_start(); 
  if (!isset($_SESSION["unique_id"])) {
    header("location: login.php"); 
  }
?>


<?php include_once "head.php";?>

  <body>
    <div class="wrapper">
      <section class="chat-area">
        <header>
        <?php 
        //When a form is submitted using the GET method, the form data is appended to the URL as a query string. The query string contains one or more key-value pairs, where the key is the name of the form input and the value is the input value. In this case, the "user_id" value is being extracted from the query string in the URL.

        include_once "php/config.php"; 
        $user_id = mysqli_real_escape_string($conn, $_GET["user_id"]); 
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = '{$user_id}'"); 
        if (mysqli_num_rows($sql) > 0) {
            $row = mysqli_fetch_assoc($sql); 
        }; 
          ?>  
          <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
          <img src="php/images/<?php echo $row["img"] ?>" alt="">
          <div class="details">
            <span><?php echo $row["fname"] . " " . $row["lastname"]?></span>
            <p><?php echo $row["status"]?></p>
          </div>
        </header>

        <div class="chat-box">
          <div class="chat outgoing">
            <div class="details">
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis, officiis.</p>
            </div>
          </div>

          <div class="chat incoming">
            <img src="man.jpg" alt="">
            <div class="details">
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis, officiis.</p>
            </div>
          </div>
        </div>

        <form action="#" class="typing-area" autocomplete="off">
            <input type="text" name="outgoing_id" value="<?php echo $_SESSION["unique_id"];?>" hidden>
            <input type="text" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
            <input class="input-field" type="text" name="message" placeholder="Type a message here....">
            <button><i class="fab fa-telegram-plane"></i></button>
          </form>
      </section>
    </div>

    <script src="javascript/chat.js"></script>
  </body>
</html>
