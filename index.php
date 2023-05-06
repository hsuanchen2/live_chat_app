<?php 
  session_start(); 
  if (isset($_SESSION['unique_id'])) {
    header("location: users.php");
  }
?>


<?php include_once "head.php";?>

  <body>
    <div class="wrapper">
      <section class="form signup">
        <header>Realtime Chat App</header>
        <form action="#" enctype="multipart/form-data">
          <div class="error-text">Error Message</div>

          <div class="name-details">
            <div class="field input">
              <label for="firstname">First Name</label>
              <input type="text" placeholder="First Name" id="firstname" name="fname" required>
            </div>

            <div class="field input">
              <label for="lastname">Last Name</label>
              <input type="text" placeholder="Last Name" id="lastname" name="lname" required>
            </div>
          </div>

          <div class="field input">
            <label for="email">Email Address</label>
            <input type="email" placeholder="Enter Your Email" id="email" name="email" required>
          </div>

          <div class="field input">
            <label>Password</label>
            <input
              type="password"
              placeholder="Enter New Password"
              id="password"
              name="password"
              required
            >
            <i class="fas fa-eye"></i>
          </div>

          <div class="field image">
            <label>Select Image</label>
            <input name="image" type="file" required>
          </div>

          <div class="field button">
            <input type="submit" value="Continute to Chat">
          </div>

          <div class="link">Already signed up? <a href="login.php">Login now</a></div>
        </form>
      </section>
    </div>
    <script src="javascript/pwdToggle.js"></script>
    <script src="javascript/signup.js"></script>
  </body>
</html>
