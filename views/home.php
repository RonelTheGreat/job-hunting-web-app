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
      <a class="post-job" href="jobpost.php"><i class="fa fa-pencil"></i> Post a New Job</a>
      <?php endif; ?>
    </div>


    <div class="job-posts">
      <?php foreach ($jobs as $job): ?>
        <div class="job">

          <!-- JOB HEADER -->
          <div class="job-header">
            <!-- Job title -->
            <p class="title"><?= $job['title']; ?></p>

            <span class="tag">Job-Type <i class="fa fa-caret-right"></i></span>
            <span class="job-type">Full-time</span>
            <!-- Job Location -->
            <span class="tag">Location <i class="fa fa-caret-right"></i></span>
            <span class="location"><?= $job['location']; ?></span>
            <!-- Job salary -->
            <span class="tag">Salary <i class="fa fa-caret-right"></i></span>
            <span class="salary"><?= $job['salary'];?></span>

            <span class="tag">Posted <i class="fa fa-caret-right"></i></span>
            <span><?= Misc::timeElapsed($job['date_posted']);?></span>
          </div>

          <div class="content">
            <p><?= substr($job['description'], 0, 200); ?>...</p>
            <span><a class="check-out-job" href="job.php">Check out this Job</a></span>
          </div>


        </div>
      <?php endforeach; ?>
    </div>
  </main>

<?php include './partials/footer.php'; ?>
