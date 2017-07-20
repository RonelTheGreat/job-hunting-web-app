<?php require 'home-controller.php';

  $current_password = '';
  $new_password = '';
  $cnew_password = '';

  if($_SERVER['REQUEST_METHOD'] === 'POST'){

    if(!empty($_POST['current_password'])){
      $user_pass = $user->query('SELECT password FROM users WHERE user_id = :user_id',
                                 array(':user_id' => $userinfo[0]['user_id']));
      if(password_verify($_POST['current_password'], $user_pass[0]['password'])){
        $current_password = $_POST['current_password'];
      }
    }

    if(!empty($_POST['new_password'])){
      $new_password = $_POST['new_password'];
    }

    if(!empty($_POST['cnew_password'])){
      $cnew_password = $_POST['cnew_password'];
    }

    if(!empty($current_password && $new_password && $current_password) && $new_password == $cnew_password){
      $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
      $user->query('UPDATE users SET password = :password WHERE user_id = :user_id',
                    array(':password' => $hashed_password,
                          ':user_id'  => $userinfo[0]['user_id']));
      $user->redirectTo('/job-hunting-web-app/views/home.php');
    }

  }
