<?php require '../controllers/reg-controller.php'; ?>

<?php include './partials/header.php'; ?>

  <div class="logo">
    <!-- <img src="../assets/img/topnav.png" alt=""> -->
    <a href="home.php"><img src="../assets/img/logo_sample.png" alt=""></a>
  </div>

  <div class="registration-form">
    <h2><i class="fa fa-user-plus" aria-hidden="true"></i> Create a New Account</h2>

    <form action="<?= htmlentities($_SERVER['PHP_SELF']);?>" method="post">

      <input type="text" name="fname" placeholder="First Name" value="<?= ($fname) ?? '';?>">
      <input type="text" name="lname" placeholder="Last Name" value="<?= ($lname) ?? '';?>">
      <input type="text" name="username" placeholder="Username" value="<?= ($username) ?? '';?>" maxlength="15">
      <input type="email" name="email" placeholder="Email Address" value="<?= ($email) ?? '';?>">
      <input type="password" name="password" placeholder="Password" value="<?= ($password) ?? '';?>">
      <input type="password" name="cpassword" placeholder="Re-type Password">
      <button class="primary-btn reg-btn" type="submit" name="register"> I'm in !</button>

    </form>
    <span class="reg-form-footer">Already have an account? </span> <a href="login.php">Sign in</a>
  </div>

<?php include './partials/footer.php'; ?>
