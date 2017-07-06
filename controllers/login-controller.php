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
      // url to redirect after checking user
      $url = '/job-hunting-web-app/views/home.php';

      // check if username exists in db
      $db = new Database;
      $user = $db->query('SELECT password, user_id FROM users WHERE username = :username', array(':username' => $username));

      if($user){
        if(password_verify($password, $user[0]['password'])){
          // generate cookie
          $cstrong = true;
          $cookie = bin2hex(openssl_random_pseudo_bytes(60, $cstrong));

          // generate a token to be saved in db
          $token = sha1($cookie);
          // insert token to db
           $db->query('INSERT INTO login_tokens(token, user_id) VALUES(:token, :user_id)',
                      array(':token'   => $token,
                            ':user_id' => $user[0]['user_id']));

          // set cookie for the logged in user and redirect to homepage
          setcookie('JHID', $cookie, time() + (7 * 24 * 60 * 60), '/');
          unset($_POST);
          header('Location: ' . $url);
          exit;
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
