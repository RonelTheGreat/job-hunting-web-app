<?php require '../controllers/login-controller.php'; ?>

<?php  include './partials/header.php'; ?>

  <div class="logo">
    <!-- <img src="../assets/img/topnav.png" alt=""> -->
    <a href="home.php" title="Go back to JobHunt"><img src="../assets/img/logo_sample.png" alt=""></a>
  </div>

  <div class="login-form">
    <h3><i class="fa fa-user-o" aria-hidden="true"></i> Sign in to your Account</h3>

    <span class="error"><?= ($error_msg) ?? '';?></span>

    <form action="<?= htmlentities($_SERVER['PHP_SELF']);?>" method="post">
      <p><input type="text" name="username" placeholder="Username" value="<?= ($username)?? ''?>"></p>
      <p><input type="password" name="password" placeholder="Password"></p>
      <button class="primary-btn login-btn" type="submit" name="login">Login</button>
      <p>
        <!-- <span>By signing up, you agree to our Terms of Use and Privacy Policy.</span> -->
        <a href="#">Forgot Password?</a>
        <a class="create-acc-link" href="register.php">Create an Account </a>
      </p>
    </form>
  </div>

<?php include './partials/footer.php'; ?>
