<?php require '../controllers/home-controller.php';
      require '../classes/Misc.php';
?>

<?php include './partials/header.php'; ?>
<?php include './partials/navbar.php'; ?>

  <main>

    <div class="search">
      <input type="text" name="search" placeholder="Find Jobs">
      <button class="primary-btn search-btn" type="submit" name="search_btn">
        <i class="fa fa-search fa-2x" aria-hidden="true"></i>
      </button>
    </div>

    <!-- Link for posting a new job -->
    <div class="post-job-link">
      <?php if ($user->isLoggedIn()): ?>
      <a href="jobpost.php"><i class="fa fa-pencil"></i> Post a New Job</a>
    <?php endif; ?>
    </div>


    <div class="job-posts">

      <?php foreach ($jobs as $job): ?>
        <div class="job">

          <!-- JOB HEADER -->
          <div class="job-header">
            <!-- Job title -->
            <h3 class="title"><a href="job.php?job_id=<?= $job['job_id'];?>"><?= $job['title']; ?></a></h3>
            <!--  Job Type -->
            <span class="job-type"><i class="fa fa-tag" aria-hidden="true"></i> <?= ucfirst(str_replace('_', '-', $job['job_type']));?></span>
            <!-- Job Location -->
            <span class="location"><i class="fa fa-map-marker" aria-hidden="true"></i> <?= $job['location']; ?></span>
            <!-- Job salary -->
            <span class="salary"><i class="fa fa-money" aria-hidden="true"></i> <?= $job['salary'];?></span>

            <span><i class="fa fa-clock-o" aria-hidden="true"></i> <?= Misc::timeElapsed($job['date_posted']);?></span>
          </div>

          <div class="content">
            <p><?= substr($job['description'], 0, 200); ?>...</p>
            <span><a class=" check-out-job primary-link" href="job.php?job_id=<?= $job['job_id'];?>">Check out this Job</a></span>
          </div>


        </div>
      <?php endforeach; ?>
    </div>
  </main>

<?php include './partials/footer.php'; ?>
