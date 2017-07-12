<?php require '../classes/User.php';

  $fname = '';
  $lname = '';
  $username = '';
  $email = '';
  $password = '';
  $cpassword = '';
  $hashed_password = '';

  // capture input data
  if($_SERVER['REQUEST_METHOD'] === 'POST'){

    if(!empty($_POST['fname'])){
      if(preg_match("/^[a-zA-Z ]*$/", filter($_POST['fname']))){
        $fname = $_POST['fname'];
      } else {
        echo 'Invalid Firstname';
      }
    }

    if(!empty($_POST['lname'])){
      if(preg_match("/^[a-zA-Z ]*$/", filter($_POST['lname']))){
        $lname = filter($_POST['lname']);
      }else{
        echo 'Invalid Last Name';
      }
    }

    if(!empty($_POST['username'])){
      if(preg_match("/^[a-zA-Z0-9]*$/", filter($_POST['username']))){
        $username = filter($_POST['username']);
      }else{
        echo 'Username must not contain white spaces and special characters';
      }
    }

    if(!empty($_POST['email'])){
      if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $email = $_POST['email'];
      }
    }

    if(!empty($_POST['cpassword']) && !empty($_POST['password'])){
      if($_POST['password'] == $_POST['cpassword']){
        $password = filter($_POST['password']);
        // hash password before saving to DB
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
      }
    }


    if(!empty($fname && $lname && $username && $email && $password)){

      // instantiate new object
      $user = new User;
      // insert new user to db
      $user->insertUser($fname, $lname, $username, $email, $password);

      // echo '<pre>', print_r($_POST), '</pre>';

    }

  }

  /**
  * filter input data
  *@params $data ; to be escaped
  */
  function filter($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
  }
