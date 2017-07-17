<?php require '../classes/User.php';

  // instantiate user object
  $user = new User;
  $db = new User;
  // check if the user is logged in
  if($user->isLoggedIn()){
    $userinfo = $user->getInfo();
    $user_id = $userinfo[0]['user_id'];
  }

  $jobs = $db->query('SELECT * FROM jobs LIMIT 20');

  // echo '<br><br><br><br>';
  // echo '<pre>', print_r($jobs), '</pre>';
