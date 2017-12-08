<?php
  function isLoginCorrect($username, $password) {
    global $dbh;
    $stmt = $dbh->prepare('SELECT * FROM users WHERE username = ? AND pword = ?');
    $stmt->execute(array($username, sha1($password)));
    return $stmt->fetch() !== false;
  }

  function addUser($username, $fullname, $password, $confirmPassword, $email, $date) {
	  if($password !== $confirmPassword){
		  return 2;
	  }
	  else {
		global $dbh;
		$stmt = $dbh->prepare('SELECT * FROM users WHERE username = ?');
		$stmt->execute(array($username));
		if($stmt->fetch()!==false){
			return 1;
		}
		else{
			$stmt = $dbh->prepare('INSERT INTO users(username, fullname, pword, email, joined) VALUES(?, ?, ?, ?, ?)');
			$stmt->execute(array($username, $fullname, sha1($password), $email, $date));
			return 0;
		}
	  }
  }

  function getUser($username){
    global $dbh;
    $stmt = $dbh->prepare('SELECT * FROM users WHERE username = ?');
    $stmt->execute(array($username));
    return $stmt->fetch();
  }

  function isPassCorrect($password) {
    global $dbh;
    $stmt = $dbh->prepare('SELECT * FROM users WHERE username = ? AND pword = ?');
    $stmt->execute(array($_SESSION['username'], sha1($password)));
    return $stmt->fetch() !== false;
  }

  function updateEmail($email) {
    global $dbh;
    $stmt = $dbh->prepare('UPDATE users SET email = ? WHERE username = ?');
    $stmt->execute(array($email, $_SESSION['username']));

  }

  function updateName($email) {
    global $dbh;
    $stmt = $dbh->prepare('UPDATE users SET fullname = ? WHERE username = ?');
    $stmt->execute(array($email, $_SESSION['username']));

  }

  function updatePass($password) {
    global $dbh;
    $stmt = $dbh->prepare('UPDATE users SET pword = ? WHERE username = ?');
    $stmt->execute(array(sha1($password), $_SESSION['username']));

  }
?>
