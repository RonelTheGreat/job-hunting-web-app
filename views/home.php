<?php require '../controllers/home-controller.php'; ?>

<?php include './partials/header.php'; ?>
<?php include './partials/navbar.php'; ?>

  <main>
    <div class="main">
      <h1>Welcome to a shitty home page <a href="#"><?= ($userinfo[0]['fname']) ?? '';?></a> :D</h1>
    </div>
  </main>

<?php include './partials/footer.php'; ?>
