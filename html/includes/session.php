<?php
  session_set_cookie_params(0, '/', 'fe.up.pt', true, true);
  session_start();
  function setCurrentUser($username) {
    $_SESSION['username'] = $username;
  }
?>
