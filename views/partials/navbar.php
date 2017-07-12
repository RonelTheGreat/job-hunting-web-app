
  <nav>
    <div class="top-nav">
      <ul>
        <?php if ($user->isLoggedIn()): ?>
        <li><a href="../controllers/logout.php">LOGOUT</a></li>
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
