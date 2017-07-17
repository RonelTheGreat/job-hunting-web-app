<?php require '../controllers/job-post-controller.php'; ?>

<?php include './partials/header.php';
      //include './partials/navbar.php';
?>

  <div class="logo">
    <a href="home.php" title="Go back to JobHunt"><img src="../assets/img/logo2.png" alt=""></a>
  </div>

  <div class="job-form">
    <h2>Post a New Job</h2>

    <form action="<?= htmlentities($_SERVER['PHP_SELF']);?>" method="post">
      <input type="text" name="title" placeholder="Job Title" value="<?= ($title) ?? '';?>" maxlength="50">
      <input type="text" name="location" placeholder="Specific Location" value="<?= ($location) ?? '';?>">

      <textarea name="description" rows="8" cols="80" placeholder="Description of the Job"></textarea>

      <input class="salary" type="text" name="salary" placeholder="Salary" value="<?= ($salary) ?? '';?>">

      <select class="job-type" name="jobtype">
        <option class="option" value="full_time">Full-time</option>
        <option class="option" value="part_time">Part-time</option>
      </select> <br>

      <button class="postjob-btn primary-btn" type="submit" name="post_job">Post Job</button>
    </form>
  </div>

<?php include './partials/footer.php'; ?>
