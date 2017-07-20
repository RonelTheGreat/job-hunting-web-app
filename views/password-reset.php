<?php require '../controllers/password-reset-controller.php'; ?>


<?php include './partials/header.php'; ?>
<?php include './partials/navbar.php'; ?>

  <div class="password-reset">
    <div class="reset-form">
      <h2><i class="fa fa-unlock-alt" aria-hidden="true"></i> Password Reset</h2>
      <form action="<?= htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
        <input type="password" name="current_password" placeholder="Type Current Password" value="<?= ($current_password) ?? '';?>">
        <input type="password" name="new_password" placeholder="New Password" value="">
        <input type="password" name="cnew_password" placeholder="Confirm New Password" value="">
        <button class="reset-btn primary-btn" type="submit" name="reset_password">RESET</button>
      </form>
    </div>
  </div>

<?php include './partials/footer.php'; ?>
