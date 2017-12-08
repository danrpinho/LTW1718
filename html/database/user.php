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
?>
