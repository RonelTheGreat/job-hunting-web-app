<?php require '../classes/Misc.php';
      require '../classes/User.php';

  $title = '';
  $location = '';
  $description = '';
  $salary = '';
  $jobtype = '';

  $user = new User;

  if($user->isLoggedIn()){
    $user_id = $user->isLoggedIn()[0]['user_id'];
    if($_SERVER['REQUEST_METHOD'] === 'POST'){

      if(!empty($_POST['title'])){
        $title = Misc::sanitize($_POST['title']);
      }

      if(!empty($_POST['location'])){
        $location = Misc::sanitize($_POST['location']);
      }

      if(!empty($_POST['description'])){
        $description = Misc::sanitize($_POST['description']);
      }

      if(!empty($_POST['salary'])){
        $salary = Misc::sanitize($_POST['salary']);
      }

      if(isset($_POST['jobtype'])){
        $jobtype = $_POST['jobtype'];
      }

      if(!empty($title && $location && $description && $salary)){
        // echo '<pre>', print_r($_POST), '</pre>';
        $user->query('INSERT INTO jobs(user_id, title, location, description, salary, job_type)
                    VALUES(:user_id, :title, :location, :description, :salary, :job_type)',
                    array(':user_id'     => $user_id,
                          ':title'       => $title,
                          ':location'    => $location,
                          ':description' => $description,
                          ':salary'      => $salary,
                          ':job_type'    => $jobtype));
        $user->redirectTo('/job-hunting-web-app/views/home.php');
      }
    }
  }
