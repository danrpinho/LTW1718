<?php
    include_once('html/includes/init.php');
    include_once('html/database/user.php');
    $date = date("Y-m-d");
    $ret=addUser($_POST['username'], $_POST['fullname'], $_POST['password'], $_POST['confirmpassword'], $_POST['email'], $date);
	if($ret === 2){
		header('Location: register.php?msg=2&username='.$_POST['username'].'&fullname='.$_POST['fullname'].'&email='.$_POST['email']);
	}
	else if($ret === 3){
		header('Location: register.php?msg=3&username='.$_POST['username'].'&fullname='.$_POST['fullname'].'&email='.$_POST['email']);
	}
	else if($ret === 4){
		header('Location: register.php?msg=4&username='.$_POST['username'].'&fullname='.$_POST['fullname'].'&email='.$_POST['email']);
	}
	else if($ret === 5){
		header('Location: register.php?msg=5&username='.$_POST['username'].'&fullname='.$_POST['fullname'].'&email='.$_POST['email']);
	}
	else if($ret === 1){
		header('Location: register.php?msg=1&username='.$_POST['username'].'&fullname='.$_POST['fullname'].'&email='.$_POST['email']);
	}
	else{
		header('Location: index.php');
	}

?>
