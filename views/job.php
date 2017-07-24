<?php require '../controllers/job-view-controller.php'; ?>

<?php include './partials/header.php'; ?>
<?php include './partials/navbar.php'; ?>

  <div class="job-view">



    <h2 class="title"><?= $job[0]['title'];?></h2>
    <!-- JOB HEADING -->
    <div class="job-view-header">
      <span class="job-type"><i class="fa fa-tag" aria-hidden="true"></i> <?= ucfirst(str_replace('_', '-', $job[0]['job_type']));?></span>
      <!-- Job Location -->
      <span class="location"><i class="fa fa-map-marker" aria-hidden="true"></i> <?= $job[0]['location']; ?></span>
      <!-- Job salary -->
      <span class="salary"><i class="fa fa-money" aria-hidden="true"></i> <?= $job[0]['salary'];?></span>
      <!-- Job posted date -->
      <span><i class="fa fa-clock-o" aria-hidden="true"></i> <?= Misc::timeElapsed($job[0]['date_posted']);?></span>

    </div>

    <div class="job">
      <h3>Description:</h3>
      <div class="job-description">
        <p><?= $job[0]['description'];?></p>
      </div>
      <?php if (!$user->isLoggedIn()): ?>
      <span class="login-to-apply">Want to apply for this Job? <a class="primary-link login-now" href="login.php">Login Now !</a></span>
      <?php else: ?>
      <a class="primary-link apply-now" href="#">Apply Now !</a>
      <?php endif; ?>
    </div>

  </div>
<?php include './partials/footer.php'; ?>
