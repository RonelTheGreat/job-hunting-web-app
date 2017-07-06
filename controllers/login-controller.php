<?php require '../classes/Database.php';

  $username = '';
  $password = '';

  if($_SERVER['REQUEST_METHOD'] === 'POST'){

    if(!empty($_POST['username'])){
      $username = $_POST['username'];
    }

    if(!empty($_POST['password'])){
      $password = $_POST['password'];
    }

    if(!empty($username && $password)){
      // check if username exists in db
      $db = new Database;
      $user = $db->query('SELECT password FROM users WHERE username = :username', array(':username' => $username));
      if($user){
        if(password_verify($password, $user[0]['password'])){
          echo '<pre>', print_r($password), '</pre>';
          echo 'Ready to login!';
        }else{
          echo 'Username or Password is incorrect';
        }
      }else{
        echo 'Username or Password is incorrect';
      }

    }else{
      echo 'Please don\'t leave a blank field';
    }
  }
