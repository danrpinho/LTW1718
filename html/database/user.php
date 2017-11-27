<?php
  function isLoginCorrect($username, $password) {
    global $dbh;
    $stmt = $dbh->prepare('SELECT * FROM users WHERE username = ? AND pword = ?');
    $stmt->execute(array($username, $password));
    return $stmt->fetch() !== false;
  }

  function addUser($username, $fullname, $password, $email, $date) {
      global $dbh;
      $stmt = $dbh->prepare('INSERT INTO users(username, fullname, pword, email, joined) VALUES(?, ?, ?, ?, ?)');
      $stmt->execute(array($username, $fullname, $password, $email, $date));
  }
?>
