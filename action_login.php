<?php
include_once('html/includes/init.php');
include_once('html/database/user.php');
  if (isLoginCorrect($_POST['username'], $_POST['password'])) {
    setCurrentUser($_POST['username']);
  }
  header('Location: http://gnomo.fe.up.pt/~up201404302/LTW1718/lists.php');
?>
