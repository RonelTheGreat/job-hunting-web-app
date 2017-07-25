<?php require '../classes/User.php';
      require '../classes/Misc.php';

  $fname = '';
  $lname = '';
  $username = '';
  $email = '';
  $password = '';
  $cpassword = '';
  $hashed_password = '';

  $error_msg= '';

  // capture input data
  if($_SERVER['REQUEST_METHOD'] === 'POST'){

    // validate first name
    if(!empty($_POST['fname'])){
      if(preg_match("/^[a-zA-Z ]*$/", $_POST['fname'])){
        $fname = Misc::sanitize($_POST['fname']);
      } else {
        $error_msg = 'Invalid First name';
      }
    } else {
      $error_msg = 'First name can\'t be empty';
    }

    // validate last name
    if(!empty($_POST['lname'])){
      if(preg_match("/^[a-zA-Z ]*$/", $_POST['lname'])){
        $lname = Misc::sanitize($_POST['lname']);
      } else {
        $error_msg = 'Invalid Last Name';
      }
    } else {
      $error_msg = 'Last name can\'t be empty';
    }

    // validate username
    if(!empty($_POST['username'])){
      if(preg_match("/^[a-zA-Z0-9]*$/", $_POST['username'])){
        if(strlen($_POST['username']) <= 15){
          $username = Misc::sanitize($_POST['username']);
        } else {
          $error_msg = 'Username must be atleast 15 characters';
        }
      } else {
        $error_msg = 'Username must not contain special characters and spaces';
      }
    }

    // validate email
    if(!empty($_POST['email'])){
      if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $email = $_POST['email'];
      } else {
        $error_msg = 'Invalid Email format';
      }
    } else {
      $error_msg = 'Please provide your email address';
    }

    // confirm password
    if(!empty($_POST['cpassword']) && !empty($_POST['password'])){
      if($_POST['password'] == $_POST['cpassword']){
        $password = Misc::sanitize($_POST['password']);
      } else {
        $error_msg = 'Password Don\'t match';
      }
    } else {
      $error_msg = 'Please provide your password';
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
