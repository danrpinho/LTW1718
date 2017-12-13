<?php
    include_once('html/includes/init.php');
    include_once('html/database/user.php');
	/*if ($_SESSION['csrf'] !== $_POST['csrf']) {
        header('Location: index.php');
        die();
    }else{
*/
	$date = date("Y-m-d");

	$username = $_POST['username'];
	$fullname = htmlentities($_POST['fullname'], ENT_QUOTES);
	$password = $_POST['password'];
	$confirmpassword = $_POST['confirmpassword'];
	$email = $_POST['email'];


	$ret=addUser($username, $fullname, $password, $confirmpassword, $email, $date);
	if($ret === 2){
		header('Location: register.php?msg=2&username='.$username.'&fullname='.$fullname.'&email='.$email);
	}
	else if($ret === 3){
		header('Location: register.php?msg=3&username='.$username.'&fullname='.$fullname.'&email='.$email);
	}
	else if($ret === 4){
		header('Location: register.php?msg=4&username='.$username.'&fullname='.$fullname.'&email='.$email);
	}
	else if($ret === 5){
		header('Location: register.php?msg=5&username='.$username.'&fullname='.$fullname.'&email='.$email);
	}
	else if($ret === 1){
		header('Location: register.php?msg=1&username='.$username.'&fullname='.$fullname.'&email='.$email);
	}
	else{
		header('Location: index.php');
	}

?>
