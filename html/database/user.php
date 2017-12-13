<?php
  function isLoginCorrect($username, $password) {
    global $dbh;
		$stmt = $dbh->prepare('SELECT * FROM users WHERE username = ?');
    $stmt->execute(array($username));
		if( $stmt->fetch() === false){
			return 1;
		}
    $stmt = $dbh->prepare('SELECT * FROM users WHERE username = ? AND pword = ?');
    $stmt->execute(array($username, sha1($password)));
    if( $stmt->fetch() === false){
			return 2;
		} else {
			return 0;
		}
	}



  function addUser($username, $fullname, $password, $confirmPassword, $email, $date) {
	  if($password !== $confirmPassword){
		  return 2;
	  }
	  else if(strlen($password)<8){
		  return 3;
	  }
	  else if(strlen($username) < 4){
		  return 4;
	  }
	  else if(validPass($password) === 0){
		  return 5;
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

  function updatePass($password, $confirmPassword) {
	if($password !== $confirmPassword){
	  return 2;
	}
	else if(strlen($password)<8){
	  return 3;
	}
	else{
		global $dbh;
		$stmt = $dbh->prepare('UPDATE users SET pword = ? WHERE username = ?');
		$stmt->execute(array(sha1($password), $_SESSION['username']));
		return 0;
	}

  }

  function validPass($password){
	  $upperCase=0;
	  $lowerCase=0;
	  $numeral = 0;
	  $other = 0;
	  for($i=0;$i<strlen($password);$i++){
		  if(ord($password[$i]) >= 48 && ord($password[$i]) <= 57){
			  $numeral = 1;
		  }
		  else if(ord($password[$i]) >= 65 && ord($password[$i]) <= 90){
			  $upperCase = 1;
		  }
		  else if(ord($password[$i]) >= 97 && ord($password[$i]) <= 122){
			  $lowerCase = 1;
		  }
		  else{
			  $other=1;
		  }

	  }

	  if(($upperCase + $lowerCase + $numeral + $other)>= 3){
		  return 1;
	  }
	  else{
		 return 0;
  }
 }

 function getUsernames(){
	 global $dbh;
	 $stmt = $dbh->prepare('SELECT username FROM USERS');
	 $stmt->execute();
	 return $stmt->fetchAll();
 }
?>
