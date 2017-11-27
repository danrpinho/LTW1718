<?php
  function isLoginCorrect($username, $password) {
    global $dbh;
    $stmt = $dbh->prepare('SELECT * FROM users WHERE username = ? AND pword = ?');
    $stmt->execute(array($username, $password));
    return $stmt->fetch() !== false;
  }
?>
