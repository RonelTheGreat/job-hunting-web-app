<?php require '../classes/Database.php';

  class User extends Database{

    private $fname;
    private $lname;
    private $username;
    private $email;
    private $password;
    private $user_id;

    private $url;



    /**
     * construct user credentials
     * @param {string} fname, lname, email, username, password
     */
    public function __construct($fname='', $lname='', $email='', $username='', $password=''){
      $this->fname = $fname;
      $this->lname = $lname;
      $this->email = $email;
      $this->username = $username;
      $this->password = $password;
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
      } catch (Exception $e) {
        echo 'An error has occured! :(';
        // echo $e->getMessage();
      }
    }


    /**
     * authorize a new registered user (generate login_token and cookie)
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
          $this->redirectTo('/jobhunt/views/home.php');
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
        $user = Database::query('SELECT user_id FROM login_tokens WHERE token = :token',
                                    array(':token' => $token));
        if($user){
          return $this->user_id = $user[0]['user_id'];
        }

      } else {
        return false;
      }
    }


    /**
     * grabs user information based on the logged-in user's id
     */
    public function getUserInfo(){
      return $user_info = $this->query('SELECT user_id, fname, lname, username, email FROM users WHERE user_id = :user_id',
                                        array(':user_id' => $this->user_id));
    }


    /**
    * logout user
    */
    public function logout(){
      // expire cookie
      setcookie('JHID', '', time() - (7 * 24 * 60 * 60), '/');
      unset($_COOKIE['JHID']);
      // delete cookie from DB and redirect
      $this->query('DELETE FROM login_tokens WHERE user_id = :user_id', array(':user_id' => $this->user_id));
      $this->redirectTo('/jobhunt/views/login.php');
    }


    /**
    * handles redirections
    * @param url
    */
    public function redirectTo($url){
      $this->url = $url;
      if(isset($_POST)){
        unset($_POST);
      }
      header('Location: ' . $this->url);
      exit;
    }

  }
