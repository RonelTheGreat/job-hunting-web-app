<?php require '../classes/User.php';
      require '../classes/Misc.php';

  $fname = '';
  $lname = '';
  $username = '';
  $email = '';
  $password = '';
  $cpassword = '';
  $hashed_password = '';

  // capture input data
  if($_SERVER['REQUEST_METHOD'] === 'POST'){

    // validate first name
    if(!empty($_POST['fname'])){
      if(preg_match("/^[a-zA-Z ]*$/", $_POST['fname'])){
        $fname = Misc::sanitize($_POST['fname']);
      }
    }

    // validate last name
    if(!empty($_POST['lname'])){
      if(preg_match("/^[a-zA-Z ]*$/", $_POST['lname'])){
        $lname = Misc::sanitize($_POST['lname']);
      }
    }

    // validate username
    if(!empty($_POST['username'])){
      if(preg_match("/^[a-zA-Z0-9]*$/", $_POST['username'])){
        if(strlen($_POST['username']) <= 15){
          $username = Misc::sanitize($_POST['username']);
        }
      }
    }

    // validate email
    if(!empty($_POST['email'])){
      if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $email = $_POST['email'];
      }
    }

    // confirm password
    if(!empty($_POST['cpassword']) && !empty($_POST['password'])){
      if($_POST['password'] == $_POST['cpassword']){
        $password = Misc::sanitize($_POST['password']);
      }
    }

    // final check
    if(!empty($fname && $lname && $username && $email && $password)){

      // instantiate new User object
      $user = new User($fname, $lname, $email, $username, $password);
      // insert new user to db
      $user->create();
      // authorize user
      $user->authorize();
    }

  }
