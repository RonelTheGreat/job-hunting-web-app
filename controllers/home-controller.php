<?php require '../classes/User.php';

  // instantiate user object
  $user = new User;
  // check if the user is logged in
  if($user->isLoggedIn()){
    $userinfo = $user->getUserInfo();
  }

  // echo '<pre>', print_r($userinfo), '</pre>'w;
