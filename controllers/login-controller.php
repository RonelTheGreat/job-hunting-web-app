<?php require '../classes/User.php';
      require '../classes/Misc.php';

  $username = '';
  $password = '';
  $error_msg = '';

  if($_SERVER['REQUEST_METHOD'] === 'POST'){

    // validate username
    if(!empty($_POST['username'])){
      $username = Misc::sanitize($_POST['username']);
    }

    // validate password
    if(!empty($_POST['password'])){
      $password = Misc::sanitize($_POST['password']);
    }

    // final check
    if(!empty($username && $password)){
      $user = new User('', '', '', $username, $password);
      if(!$user->authorize()){
        $error_msg = 'Incorrect Username or Password';
      }
    } else {
      $error_msg = 'Incorrect Username or Password';
    }
  }
