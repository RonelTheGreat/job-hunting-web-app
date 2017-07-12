<?php require '../controllers/home-controller.php'; ?>

<?php include './partials/header.php'; ?>

<h1>Welcome to a shitty home page <a href="#"><?= ($userinfo[0]['fname']) ?? '';?></a> :D</h1>

<?php include './partials/footer.php'; ?> 
