<?php require '../classes/User.php';

  // instantiate user object
  $user = new User;
  // check if the user is logged in
  if($user->isLoggedIn()){
    $userinfo = $user->getUserInfo();

    // when a user logs out
    if(isset($_GET['logout'])){
      if($_GET['logout'] == 'true'){
        $user->logout();
      }
    }
  }

  $jobs = $user->query('SELECT * FROM jobs ORDER BY date_posted DESC LIMIT 20');


  // echo '<br><br><br><br>';
  // echo '<pre>', print_r($userinfo), '</pre>';
