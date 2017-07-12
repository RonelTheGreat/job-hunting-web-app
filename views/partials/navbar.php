
  <nav>
    <div class="top-nav">
      <ul>
        <li><a href="../views/login.php">Sign in</a></li>
        <?php if ($user->isLoggedIn()): ?>
        <li><a href="../controllers/logout.php">Sign out</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </nav>
