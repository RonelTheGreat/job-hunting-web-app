<?php require '../classes/Database.php';

  class User extends Database{

    private $fname;
    private $lname;
    private $username;
    private $email;
    private $password;
    private $url;


    public function setFname($fname){
      $this->fname = $fname;
    }
    public function getFname(){
      return $this->fname;
    }


    public function setLname($lname){
      $this->lname = $lname;
    }
    public function getLname(){
      return $this->lname;
    }


    public function setUsername($username){
      $this->username = $username;
    }
    public function getUsername(){
      return $this->username;
    }


    public function setEmail($email){
      $this->email = $email;
    }
    public function getEmail(){
      return $this->email;
    }


    public function setPassword($password){
      $this->password = $password;
    }
    public function getPassword(){
      return $this->password;
    }


    /**
    * insert a new user to DB
    */
    public function create(){
      $hashed_password = password_hash($this->password, PASSWORD_DEFAULT);
      try {
        Database::query('INSERT INTO users(fname, lname, username, email, password)
                    VALUES(:fname, :lname, :username, :email, :password)',
                    array(':fname'    => $this->fname,
                          ':lname'    => $this->lname,
                          ':username' => $this->username,
                          ':email'    => $this->email,
                          ':password' => $hashed_password));
        // $this->redirectTo('/job-hunting-web-app/views/login.php');
      } catch (Exception $e) {
        echo $e->getMessage();
      }
    }


    /**
    * authenticate a new registered user (generate login_token and cookie)
    */
    public function authorize(){
      // check if username exists in db
      $user = Database::query('SELECT password, user_id FROM users WHERE username = :username',
                              array(':username' => $this->username));

      if($user){
        // verify password
        if(password_verify($this->password, $user[0]['password'])){
          // generate cookie
          $cstrong = true;
          $cookie = bin2hex(openssl_random_pseudo_bytes(60, $cstrong));

          // generate a token to be saved in db
          $token = sha1($cookie);

          // insert token to db
           Database::query('INSERT INTO login_tokens(token, user_id) VALUES(:token, :user_id)',
                            array(':token'   => $token,
                                  ':user_id' => $user[0]['user_id']));

          // set cookie for the logged in user and redirect to homepage
          setcookie('JHID', $cookie, time() + (7 * 24 * 60 * 60), '/');
          $this->redirectTo('/job-hunting-web-app/views/home.php');
        }
      }
    }


    /**
    * check if the user is logged-in based on the cookie stored
    */
    public function isLoggedIn(){
      if(isset($_COOKIE['JHID'])){
        $cookie = $_COOKIE['JHID'];
        $token = sha1($cookie);
        $user_id = Database::query('SELECT user_id FROM login_tokens WHERE token = :token',
                                    array(':token' => $token));
        if($user_id){
          return $user_id;
        }

      } else {
        return false;
      }
    }


    /**
    * grabs user information based on the logged-in user's id
    */
    public function getInfo(){
      $userid = $this->isLoggedIn()[0]['user_id'];
      $user_info = $this->query('SELECT * FROM users WHERE user_id = :user_id', array(':user_id' => $userid));
      return $user_info;
    }


    /**
    * logout user
    */
    public function logout(){
      $userid = $this->isLoggedIn()[0]['user_id'];
      // expire cookie
      setcookie('JHID', '', time() - (7 * 24 * 60 * 60), '/');
      // unset cookie
      unset($_COOKIE['JHID']);
      // delete cookie from DB and redirect
      $this->query('DELETE FROM login_tokens WHERE user_id = :user_id', array(':user_id' => $userid));
      $this->redirectTo('/job-hunting-web-app/views/login.php');
    }


    /**
    * handles redirections
    *@params url
    */
    public function redirectTo($url){
      $this->url = $url;
      if(isset($_POST)){
        unset($_POST);
      }
      header('Location: ' . $this->url);
    }

  }
