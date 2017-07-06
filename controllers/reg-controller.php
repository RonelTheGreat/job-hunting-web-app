
<?php require '../classes/Database.php';

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
      $fname = filter($_POST['fname']);
    }

    if(!empty($_POST['lname'])){
      $lname = filter($_POST['lname']);
    }

    if(!empty($_POST['username'])){
      $username = filter($_POST['username']);
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
      // url to redirect user to home page
      $url = '/jobhunting/views/home.php';

      // instantiate new object
      $db = new Database;
      // insert new user to db
      try {
        $db->query('INSERT INTO users(fname, lname, username, email, password)
                    VALUES(:fname, :lname, :username, :email, :password)',
                    array(':fname'    => $fname,
                          ':lname'    => $lname,
                          ':username' => $username,
                          ':email'    => $email,
                          ':password' => $hashed_password));
        unset($_POST);
        header('Location: ' . $url);
        exit;
      } catch (Exception $e) {
        echo $e->getMessage();
      }

    }

  }

  // filter text input
  function filter($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
  }
