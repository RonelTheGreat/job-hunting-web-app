<?php

  $url = '/job-hunting-web-app/views/login.php';
  setcookie('JHID', $cookie, time() + (7 * 24), '/');
  header('Location: ' . $url);
  exit;
