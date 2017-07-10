<?php

  $str = '<script>alert("You\'ve been hacked!")</script>';

  if(preg_match("/^[a-zA-z]/", $str)){
    echo 'motherfucker!';
  } else{
    echo 'Doesnt match!';
  }
