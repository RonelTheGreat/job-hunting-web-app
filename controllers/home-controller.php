<?php require '../classes/User.php';

  // instantiate user object
  $user = new User;
  // check if the user is logged in
  if($user->isLoggedIn()){
    $userinfo = $user->getUserInfo();
  }else{
    $user->redirectTo('/job-hunting-web-app/views/login.php');
  }
