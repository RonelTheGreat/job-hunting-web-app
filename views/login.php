<?php require '../controllers/login-controller.php'; ?>

  <div class="login-form">
    <form action="<?= htmlentities($_SERVER['PHP_SELF']);?>" method="post">
      <p><input type="text" name="username" placeholder="Username" value=""></p>
      <p><input type="password" name="password" placeholder="Password" value=""></p>
      <button type="submit" name="login">Sign in</button>
      <a href="register.php">Create a New Account </a>
    </form>
  </div>
