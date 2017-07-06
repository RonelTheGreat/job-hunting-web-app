<?php require '../controllers/login-controller.php'; ?>

<?php include './partials/header.php'; ?>

  <form action="<?= htmlentities($_SERVER['PHP_SELF']);?>" method="post">
    <input type="text" name="username" placeholder="Username" value="">
    <input type="password" name="password" placeholder="Password" value="">
    <button type="submit" name="login">Sign in</button>
  </form>

<?php include './partials/footer.php'; ?>
