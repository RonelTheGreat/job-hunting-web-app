
  <nav>

    <div class="logo">
      <!-- <img src="../assets/img/topnav.png" alt=""> -->
      <a href="home.php" title="Go back to JobHunt"><img src="../assets/img/logo_sample.png" alt=""></a>
    </div>

    <div class="top-nav">

      <?php if ($user->isLoggedIn()): ?>
      <div class="acc-settings">
        <span class="username"><a href="profile.php"><?= $userinfo[0]['username'];?></a>&nbsp <i class="fa fa-chevron-down"></i></span>
        <div class="dropdown">
          <a href="../views/password-reset.php"><i class="fa fa-unlock-alt" aria-hidden="true"></i> RESET PASSWORD</a>
          <a href="../views/profile.php"><i class="fa fa-user-circle"></i> PROFILE</a>
          <form action="<?= htmlentities($_SERVER['PHP_SELF']);?>" method="GET">
            <a href="<?='?logout=true';?>"><i class="fa fa-sign-out" aria-hidden="true"></i> LOGOUT</a>
          </form>

        </div>
      </div>

      <?php else:  ?>
      <ul>
        <li>
          <a href="../views/login.php"><i class="fa fa-sign-in" aria-hidden="true"></i> LOGIN</a>
        </li>
        <li>
          <a href="../views/register.php"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> SIGN UP</a>
        </li>
      </ul>
      <?php endif; ?>
    </div>
  </nav>
