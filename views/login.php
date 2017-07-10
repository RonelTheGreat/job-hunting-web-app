<?php require '../controllers/login-controller.php'; ?>

<?php  include './partials/header.php'; ?>

  <div class="sign-in-form">
    <form action="<?= htmlentities($_SERVER['PHP_SELF']);?>" method="post">
      <input type="text" name="username" placeholder="Username" value="">
      <input type="password" name="password" placeholder="Password" value="">
      <button type="submit" name="login">Sign in</button>
      <a href="register.php">Create a New Account </a>
    </form>
  </div>
