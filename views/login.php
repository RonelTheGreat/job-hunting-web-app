<?php require '../controllers/login-controller.php'; ?>

<?php  include './partials/header.php'; ?>
  <div class="login-form">
    <h3>Sign in to your Account</h3>
    <form action="<?= htmlentities($_SERVER['PHP_SELF']);?>" method="post">
      <p><input type="text" name="username" placeholder="Username" value=""></p>
      <p><input type="password" name="password" placeholder="Password" value=""></p>
      <button class="login-btn" type="submit" name="login">Sign in</button>
      <p>
        <a href="#">Forgot Password?</a>
        <a class="create-acc-link" href="register.php">Create a New Account </a>
      </p>
    </form>
  </div>
