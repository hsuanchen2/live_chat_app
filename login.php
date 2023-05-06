<?php 
  session_start(); 
  if (isset($_SESSION['unique_id'])) {
    header("location: users.php");
  }
?>


<?php include_once "head.php";?>

  <body>
    <div class="wrapper">
      <section class="form login">
        <header>Realtime Chat App</header>
        <form>
        <div class="error-text">Error Message</div>
          <div class="field input">
            <label for="email">Email Address</label>
            <input type="email" placeholder="Enter Your Email" id="email" name="email">
          </div>

          <div class="field input">
            <label>Password</label>
            <input
              name="password"
              type="password"
              placeholder="Enter New Password"
              id="password"
            />
            <i class="fas fa-eye"></i>
          </div>

          <div class="field button">
            <input type="submit" value="Continute to Chat" />
          </div>

          <div class="link">Not yet signed up? <a href="index.php">Sign up now!</a></div>
        </form>
      </section>
    </div>
    <script src="javascript/pwdToggle.js"></script>
    <script src="javascript/login.js"></script>
  </body>
</html>
