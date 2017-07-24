<?php include 'home-controller.php';
      include '../classes/Misc.php';

  if(isset($_GET['job_id'])){
    $job_id = $_GET['job_id'];
    $job = $user->query('SELECT * FROM jobs WHERE job_id = :job_id', array(':job_id' => $job_id));
    // echo '<pre>', print_r($job), '</pre>';
  }
