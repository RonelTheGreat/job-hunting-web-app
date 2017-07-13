
  <nav>

    <div class="logo">
      <a href="../views/home.php">JobHunter.com<!-- <img src="../assets/img/logo.png" alt=""> --></a>
    </div>

    <div class="top-nav">
      <ul>
        <?php if ($user->isLoggedIn()): ?>
        <li><a href="../controllers/logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> LOGOUT</a></li>
        <?php else:  ?>
        <li>
          <a href="../views/login.php"><i class="fa fa-sign-in" aria-hidden="true"></i> LOGIN</a>
        </li>
        <li>
          <a href="../views/register.php"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> SIGN UP</a>
        </li>
        <?php endif; ?>
      </ul>
    </div>
  </nav>
