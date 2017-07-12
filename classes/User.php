<?php require '../classes/Database.php';

  class User extends Database{

    protected $url;


    /**
    * checks if the user is logged-in using the cookie
    */
    public function isLoggedIn(){
      if(isset($_COOKIE['JHID'])){
        $cookie = $_COOKIE['JHID'];
        $token = sha1($cookie);
        $user_id = $this->query('SELECT user_id FROM login_tokens WHERE token = :token',
                                    array(':token' => $token));
        if($user_id){
          return $user_id;
        }
      } else {
        return false;
      }
    }

    /**
    * insert a new user to DB
    */
    public function insertUser($fname, $lname, $username, $email, $password){
      $hashed_password = password_hash($password, PASSWORD_DEFAULT);
      try {
        Database::query('INSERT INTO users(fname, lname, username, email, password)
                    VALUES(:fname, :lname, :username, :email, :password)',
                    array(':fname'    => $fname,
                          ':lname'    => $lname,
                          ':username' => $username,
                          ':email'    => $email,
                          ':password' => $hashed_password));

        $this->redirectTo('/job-hunting-web-app/views/login.php');

      } catch (Exception $e) {
        echo $e->getMessage();
      }
    }


    public function authUser(){

    }


    /**
    * grabs user information
    */
    public function getUserInfo(){
      $userid = $this->isLoggedIn()[0]['user_id'];
      $userdata = $this->query('SELECT * FROM users WHERE user_id = :user_id', array(':user_id' => $userid));
      return $userdata;
    }

    /**
    * handles logout mechanism
    */
    public function logout(){
      $userid = $this->isLoggedIn()[0]['user_id'];
      $cookie = 'Youre not awesome';
      setcookie('JHID', '', time() - (7 * 24 * 60 * 60), '/');
      unset($_COOKIE['JHID']);
      $this->query('DELETE FROM login_tokens WHERE user_id = :user_id', array(':user_id' => $userid));
      $this->redirectTo('/job-hunting-web-app/views/login.php');
    }

    /**
    * handles redirections
    */
    public function redirectTo($url){
      $this->url = $url;
      header('Location: ' . $this->url);
    }
  }
